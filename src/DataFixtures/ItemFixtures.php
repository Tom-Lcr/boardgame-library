<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $item = new Item;
        $item->setBoardgame($this->getReference('boardgame_1'));
        $item->setPresent(true);
        $manager->persist($item);

        $item2 = new Item;
        $item2->setBoardgame($this->getReference('boardgame_1'));
        $item2->setPresent(false);
        $manager->persist($item2);

        $item3 = new Item;
        $item3->setBoardgame($this->getReference('boardgame_1'));
        $item3->setPresent(false);
        $manager->persist($item3);

        $item4 = new Item;
        $item4->setBoardgame($this->getReference('boardgame_1'));
        $item4->setPresent(true);
        $manager->persist($item4);

        $item5 = new Item;
        $item5->setBoardgame($this->getReference('boardgame_2'));
        $item5->setPresent(true);
        $manager->persist($item5);

        $item6 = new Item;
        $item6->setBoardgame($this->getReference('boardgame_2'));
        $item6->setPresent(true);
        $manager->persist($item6);

        $item7 = new Item;
        $item7->setBoardgame($this->getReference('boardgame_3'));
        $item7->setPresent(false);
        $manager->persist($item7);

        $item8 = new Item;
        $item8->setBoardgame($this->getReference('boardgame_4'));
        $item8->setPresent(true);
        $manager->persist($item8);


        $manager->flush();
    }
}
