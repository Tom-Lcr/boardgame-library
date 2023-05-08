<?php

namespace App\Controller;

use App\Entity\Boardgame;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoardgameUserController extends AbstractController
{
    #[Route('/boardgame/user', name: 'app_boardgame_user')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
    $orderBy = $request->query->get('orderBy', 'title');
    $searchQuery = $request->query->get('q');

   $form = $this->createFormBuilder()
    ->add('orderBy', ChoiceType::class, [
        'choices' => [
            'Title' => 'title',
            'Rating' => 'rating',
            'Year' => 'year',
        ],
        'data' => $orderBy,
        'attr' => ['onchange' => 'this.form.submit()'],
    ])
    ->setMethod('GET')
    ->getForm();

    $form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
    $orderBy = $form->getData()['orderBy'];
}

switch ($orderBy) {
    case 'rating':
        $orderByParam = ['ratingBoardgameGeek' => 'DESC'];
        break;
    case 'year':
        $orderByParam = ['releaseYear' => 'DESC'];
        break;
    case 'title':
    default:
        $orderByParam = ['title' => 'ASC'];
        break;
}

$boardgamesQueryBuilder = $entityManager->getRepository(Boardgame::class)->createQueryBuilder('b');

if ($searchQuery) {
    $boardgamesQueryBuilder->where('b.title LIKE :query')
        ->setParameter('query', '%'.$searchQuery.'%');
}

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

$boardgamesQueryBuilder->orderBy($orderByColumn, $orderByDirection);

$boardgamesQuery = $boardgamesQueryBuilder->getQuery();
$boardgames = $boardgamesQuery->getResult();

        return $this->render('boardgame_user/index.html.twig', [
            'boardgames' => $boardgames,
            'form' => $form->createView(),
        ]);
    }
}
