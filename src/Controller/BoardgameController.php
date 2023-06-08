<?php

namespace App\Controller;

use App\Entity\Item;
use App\Form\ItemType;
use App\Entity\Boardgame;
use App\Form\BoardgameType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoardgameController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/boardgames', name: 'app_boardgame')]
    //Generate boardgame list
public function show(Request $request, EntityManagerInterface $entityManager): Response 
{
$orderBy = $request->query->get('orderBy', 'title'); //default order is by title
$searchQuery = $request->query->get('q');// get search input

$form = $this->createFormBuilder()
    ->add('orderBy', ChoiceType::class, [
        'choices' => [
            'Title' => 'title',   // Possibilities to order by: title, rating, year
            'Rating' => 'rating',
            'Year' => 'year',
        ],
        'data' => $orderBy,
        'attr' => ['onchange' => 'this.form.submit()'], // on selection of new criteria form gets submitted
    ])
    ->setMethod('GET')
    ->getForm();

    $form->handleRequest($request);
// if form is submitted order data gets saved in variable $orderBy
if ($form->isSubmitted() && $form->isValid()) { 
    $orderBy = $form->getData()['orderBy'];
}

//New querybuilder
$boardgamesQueryBuilder = $entityManager->getRepository(Boardgame::class)->createQueryBuilder('b');
// if a search term is true
if ($searchQuery) {
    $boardgamesQueryBuilder->where('b.title LIKE :query') 
        ->setParameter('query', '%'.$searchQuery.'%'); //titles in database will get looked up based on searchquery
}


// based on the value of $orderby two variables get declared based on what the data needs to get ordered by
if ($orderBy == 'rating') { 
    $orderByColumn = 'b.ratingBoardgameGeek';
    $orderByDirection = 'DESC';
} else if ($orderBy == 'year') {
    $orderByColumn = 'b.releaseYear';
    $orderByDirection = 'DESC';
} else {
    $orderByColumn = 'b.title';
    $orderByDirection = 'ASC';
}

$boardgamesQueryBuilder->orderBy($orderByColumn, $orderByDirection); //boardgames get orderded

$boardgamesQuery = $boardgamesQueryBuilder->getQuery(); //retrieve list of boardgames based on search
$boardgames = $boardgamesQuery->getResult(); //save them in variable $boardgames

//display boardgames list with search and order form
return $this->render('boardgames/show.html.twig', [ 
    'boardgames' => $boardgames,
    'form' => $form->createView(),
]);
}

#[Route('/boardgames/{id}', name: 'app_boardgame_single')]
     
    public function showSingle(Boardgame $boardgame): Response
    {
        return $this->render('boardgames/single.html.twig', [
            'boardgame' => $boardgame,
        ]);
    }

   

    #[Route('/boardgames/new', name: 'app_boardgame_new')]
    public function new(Request $request): Response
    {
        $boardgame = new Boardgame();
        $form = $this->createForm(BoardgameType::class, $boardgame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($boardgame);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_boardgame');
        }

        return $this->render('boardgames/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/boardgames/edit/{id}', name: 'app_boardgame_edit', methods: ['GET', 'POST'])]
    public function edit(Boardgame $boardgame, Request $request): Response
    {
        $form = $this->createForm(BoardgameType::class, $boardgame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('app_boardgame');
        }

        return $this->render('boardgames/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/boardgames/delete/{id}', name: 'app_boardgame_delete', methods: ['POST', 'DELETE'])]
    public function delete(Request $request, Boardgame $boardgame): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boardgame->getId(), $request->request->get('_token'))) {
            $this->entityManager->remove($boardgame);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('app_boardgame');
    }

    #[Route('/boardgames/add-item/{id}', name: 'app_boardgame_add_item', methods: ['POST'])]
public function addItem(Boardgame $boardgame): RedirectResponse
{
    $item = new Item();
    $item->setBoardgame($boardgame)
        ->setPresent(true);

    $boardgame->addItem($item);
    $this->entityManager->persist($item);
    $this->entityManager->flush();

    return $this->redirectToRoute('app_boardgame');
}



        
    }

