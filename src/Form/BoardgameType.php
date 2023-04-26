<?php

namespace App\Form;

use App\Entity\Boardgame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoardgameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('ratingBoardgameGeek')
            ->add('releaseYear')
            ->add('imagePath')
            ->add('gameType')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Boardgame::class,
        ]);
    }
}
