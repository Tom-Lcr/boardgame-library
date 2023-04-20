<?php

namespace App\DataFixtures;

use App\Entity\Boardgame;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BoardgameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $boardgame = new Boardgame;
        $boardgame->setTitle('Dungeon Petz');
        $boardgame->setDescription('Raise monstrous pets and sell them to demanding Dungeon Lords for fame and fortune.');
        $boardgame->setRatingBoardgameGeek(7.4);
        $boardgame->setReleaseYear(2011);
        $boardgame->setImagePath('https://cf.geekdo-images.com/7JjAm9RM8E2pbu5KCCbsTQ__imagepagezoom/img/Q1k9zrv4xtJzzATDzhddFDxhwUs=/fit-in/1200x900/filters:no_upscale():strip_icc()/pic1103979.jpg');
        $boardgame->setGameType('Worker placement, Auction/Bidding, Hand Management');
        $manager->persist($boardgame);

        $boardgame2 = new Boardgame;
        $boardgame2->setTitle('Cthulhu Wars');
        $boardgame2->setDescription('Armageddon came. Humanity fell. Which Elder God will rule the last remains of Earth?');
        $boardgame2->setRatingBoardgameGeek(7.9);
        $boardgame2->setReleaseYear(2015);
        $boardgame2->setImagePath('https://cf.geekdo-images.com/AUd4nmguSljr9qvkUCF2XQ__imagepage/img/GajZK0XkSX0bFw5zEcW98uXeaaM=/fit-in/900x600/filters:no_upscale():strip_icc()/pic3527761.jpg');
        $boardgame2->setGameType('Board Control, Assymetric, Action Points');
        $manager->persist($boardgame2);

        $boardgame3 = new Boardgame;
        $boardgame3->setTitle('Frosthaven');
        $boardgame3->setDescription('Adventure in the frozen north and build up your outpost throughout an epic campaign.');
        $boardgame3->setRatingBoardgameGeek(8.8);
        $boardgame3->setReleaseYear(2023);
        $boardgame3->setImagePath('https://cf.geekdo-images.com/iEBr5o8AbJi9V9cgQcYROQ__imagepage/img/3h7303cwluGrIhEN6x-wNEWqbng=/fit-in/900x600/filters:no_upscale():strip_icc()/pic6177719.jpg');
        $boardgame3->setGameType('Campaign, Co-Op, Dungeon Crawler, Deck Building');
        $manager->persist($boardgame3);

        $boardgame4 = new Boardgame;
        $boardgame4->setTitle('Spirit Island');
        $boardgame4->setDescription('Island Spirits join forces using elemental powers to defend their home from invaders.');
        $boardgame4->setRatingBoardgameGeek(8.4);
        $boardgame4->setReleaseYear(2017);
        $boardgame4->setImagePath('https://cf.geekdo-images.com/kjCm4ZvPjIZxS-mYgSPy1g__itemrep/img/7AXozbOIxk5MDpn_RNlat4omAcc=/fit-in/246x300/filters:strip_icc()/pic7013651.jpg');
        $boardgame4->setGameType('Board Control, Co-Op, Action Retrieval');
        $manager->persist($boardgame4);

        $manager->flush();

        $this->addReference('boardgame_1', $boardgame);
        $this->addReference('boardgame_2', $boardgame2);
        $this->addReference('boardgame_3', $boardgame3);
        $this->addReference('boardgame_4', $boardgame4);
    }
}