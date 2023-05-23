-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 23 mei 2023 om 10:37
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boardgame_library`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boardgame`
--

CREATE TABLE `boardgame` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rating_boardgame_geek` double DEFAULT NULL,
  `release_year` int(11) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `game_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `boardgame`
--

INSERT INTO `boardgame` (`id`, `title`, `description`, `rating_boardgame_geek`, `release_year`, `image_path`, `game_type`) VALUES
(5, 'Dungeon Petz', 'Raise monstrous pets and sell them to demanding Dungeon Lords for fame and fortune.', 7.4, 2011, 'https://cf.geekdo-images.com/7JjAm9RM8E2pbu5KCCbsTQ__imagepagezoom/img/Q1k9zrv4xtJzzATDzhddFDxhwUs=/fit-in/1200x900/filters:no_upscale():strip_icc()/pic1103979.jpg', 'Worker placement, Auction/Bidding, Hand Management'),
(6, 'Cthulhu Wars', 'Armageddon came. Humanity fell. Which Elder God will rule the last remains of Earth?', 7.9, 2015, 'https://cf.geekdo-images.com/AUd4nmguSljr9qvkUCF2XQ__imagepage/img/GajZK0XkSX0bFw5zEcW98uXeaaM=/fit-in/900x600/filters:no_upscale():strip_icc()/pic3527761.jpg', 'Board Control, Assymetric, Action Points'),
(7, 'Frosthaven', 'Adventure in the frozen north and build up your outpost throughout an epic campaign.', 8.8, 2023, 'https://cf.geekdo-images.com/iEBr5o8AbJi9V9cgQcYROQ__imagepage/img/3h7303cwluGrIhEN6x-wNEWqbng=/fit-in/900x600/filters:no_upscale():strip_icc()/pic6177719.jpg', 'Campaign, Co-Op, Dungeon Crawler, Deck Building'),
(8, 'Spirit Island', 'Island Spirits join forces using elemental powers to defend their home from invaders.', 8.4, 2017, 'https://cf.geekdo-images.com/kjCm4ZvPjIZxS-mYgSPy1g__itemrep/img/7AXozbOIxk5MDpn_RNlat4omAcc=/fit-in/246x300/filters:strip_icc()/pic7013651.jpg', 'Board Control, Co-Op, Action Retrieval'),
(9, 'Vagrant Song', 'Six trainhoppers hop aboard a ghost train and must work together to escape.', 7.8, 2022, 'https://cf.geekdo-images.com/ZCyi6vHQz8SQtCq-OFHofg__itemrep/img/oRN_fslKH94BQL97-2KwFspJDC8=/fit-in/246x300/filters:strip_icc()/pic6221727.jpg', 'Action points, co-op, dice-rolling'),
(10, 'Beast', 'Hunters cooperate to track and take down ancient Beasts threatening their settlements', 7.9, 2023, 'https://cf.geekdo-images.com/-9NLgO6ASOHgZtMtamqjxw__itemrep/img/8XSz9ORoG2ciTwnwrQ4xn-1r3_k=/fit-in/246x300/filters:strip_icc()/pic6418160.png', 'Hidden movement, Hand management, Action Drafting'),
(12, 'Ark Nova', 'Plan and build a modern, scientifically managed zoo to support conservation projects.', 8.5, 2021, 'https://cf.geekdo-images.com/SoU8p28Sk1s8MSvoM4N8pQ__itemrep/img/IRqrT7kOqPQilogauyQkOnLx-HU=/fit-in/246x300/filters:strip_icc()/pic6293412.jpg', 'Economic, Euro, Hand Management, Income'),
(13, 'Brass: Birmingham', 'Build networks, grow industries, and navigate the world of the Industrial Revolution.', 8.6, 2018, 'https://cf.geekdo-images.com/x3zxjr-Vw5iU4yDPg70Jgw__itemrep/img/giNUMut4HAl-zWyQkGG0YchmuLI=/fit-in/246x300/filters:strip_icc()/pic3490053.jpg', 'Economic, Euro, Industry, Hand Management, Income, Loans'),
(14, 'Scythe', 'Five factions vie for dominance in a war-torn, mech-filled, dieselpunk 1920s Europe.', 7.6, 2016, 'https://cf.geekdo-images.com/7k_nOxpO9OGIjhLq2BUZdA__itemrep/img/RVh5N-_HcMziJ3M6Q1eLTlj8XIQ=/fit-in/246x300/filters:strip_icc()/pic3163924.jpg', 'Economic, Fighting, Territoy Building, Conflict Resolution, End Game Bonuses'),
(15, 'Wingspan', 'Attract a beautiful and diverse collection of birds to your wildlife preserve.', 8.1, 2019, 'https://cf.geekdo-images.com/yLZJCVLlIx4c7eJEWUNJ7w__itemrep/img/DR7181wU4sHT6gn6Q1XccpPxNHg=/fit-in/246x300/filters:strip_icc()/pic4458123.jpg', 'Animals, Strategy, Card Game, Hand Management, Dice Rolling, End Game Bonuses'),
(16, 'Blood Rage', 'Ragnarök has come! Secure your place in Valhalla in epic Viking battles.', 8, 2015, 'https://cf.geekdo-images.com/HkZSJfQnZ3EpS214xtuplg__itemrep/img/ZSJhCapvtPoiIQZ1XdfO-qgUuFY=/fit-in/246x300/filters:strip_icc()/pic2439223.jpg', 'Fantasy, Fighting, Miniatures, Strategy, Action Points, Area Majority, Card Play Conflict Resolution, Action Points'),
(17, 'Dune: Imperium', 'Influence, intrigue, and combat in the universe of Dune.', 8.4, 2020, 'https://cf.geekdo-images.com/PhjygpWSo-0labGrPBMyyg__itemrep/img/3_xJ0tO5L62bUp2oRfjeVS0DHX0=/fit-in/246x300/filters:strip_icc()/pic5666597.jpg', 'Sci-Fi, Political, Novel-based, Card Play Conflict Resolution, Deck Building, Delayed Purchase'),
(18, 'Heat: Pedal to the Metal', 'Manage your race car\'s speed to keep from overheating.', 8.2, 2022, 'https://cf.geekdo-images.com/-vOrd4bOspibyohYExLqWg__itemrep/img/mSj0nZUY3ofhIXFZJLGzF-6MQTg=/fit-in/246x300/filters:strip_icc()/pic6940449.png', 'Racing, Sports, Catch the Leader, Deck Building, Hand Management'),
(19, 'Terraforming Mars', 'Compete with rival CEOs to make Mars habitable and build your corporate empire.', 8.4, 2016, 'https://cf.geekdo-images.com/wg9oOLcsKvDesSUdZQ4rxw__itemrep/img/IwUOQfhP5c0KcRJBY4X_hi3LpsY=/fit-in/246x300/filters:strip_icc()/pic3536616.jpg', 'Economic, Environmental, Sci-Fi, Territory Building, Closed Drafiting, Contracts, Encolsure, Hand Management'),
(20, 'Kingdom Death: Monster', 'Try to survive in a nightmarish world that lies under eternal darkness.', 8.5, 2015, 'https://cf.geekdo-images.com/LenzJBOHboAGU0cUIqAZPQ__itemrep/img/mHmTpkCqNygzH3Ue2KJKIMeI9G0=/fit-in/246x300/filters:strip_icc()/pic2931007.jpg', 'Fantasy, Horror, Miniatures, Co-op, Dice Rolling, Grid Movement, Role Playing'),
(21, 'Paladins of the West Kingdom', 'Invaders are coming from everywhere. Keep the faith and defend your homeland.', 8, 2019, 'https://cf.geekdo-images.com/4nhokcLdYoo6ulbZ1rmGgA__itemrep/img/2YT-EqfAb6vwxDSrFQMSm-luQAs=/fit-in/246x300/filters:strip_icc()/pic4462987.png', 'Strategy, Medieval, End Game Bonueses, Worker Placement, Open Drafting, Solo');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230418112924', '2023-04-18 11:33:16', 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `boardgame_id` int(11) DEFAULT NULL,
  `present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `item`
--

INSERT INTO `item` (`id`, `boardgame_id`, `present`) VALUES
(1, 5, 1),
(2, 5, 0),
(3, 5, 0),
(4, 5, 1),
(5, 6, 1),
(6, 6, 1),
(7, 7, 0),
(8, 8, 1),
(9, 5, 0),
(10, 6, 0),
(11, 5, 1),
(12, 12, 1),
(13, 10, 1),
(14, 16, 1),
(15, 13, 1),
(16, 6, 1),
(17, 7, 1),
(18, 18, 1),
(19, 20, 1),
(20, 21, 1),
(21, 14, 1),
(22, 8, 1),
(23, 19, 1),
(24, 9, 1),
(25, 15, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `roles`) VALUES
(1, '$2y$13$8Q2XnFWC88CcDOkL8p6TxOJnD9soAKSIPYMg05jn2a50jG2qcKgBa', 'tom@mail.com', '[\"ROLE_ADMIN\"]'),
(2, '$2y$13$1Kb9zCN3kjCgBihCGoigQeXt8ByVXWqOSK/mywU02FRYzXsC4jknO', 'bram@mail.com', '[]'),
(3, '$2y$13$Y3KrafXZbPMKVPhdgKh61Owe8ZMHHpbYjYX5ycxdHARjJUXu8jxkO', 'chris@mail.com', '[]'),
(4, '$2y$13$tqFm1Ag/9JpUBoXiQ2qgfuRjoDeCCEuEIUcxFrs0SQv946biOiAlm', 'marianne@mail.com', '[]'),
(5, '$2y$13$EH2wfy06IMPIe.7tBfNN2.njVolGqlgo0byi6X/UIHf1.Z3GskX3a', 'sina@mail.com', '[]'),
(6, '$2y$13$y/vZI3dtmgr7n42edJwCOuCmTBFtGJ25M.jFIOIQqgaMw/0xQ4wp6', 'guillaume@mail.com', '[]');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `boardgame`
--
ALTER TABLE `boardgame`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1F1B251EB1A27A21` (`boardgame_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `boardgame`
--
ALTER TABLE `boardgame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_1F1B251EB1A27A21` FOREIGN KEY (`boardgame_id`) REFERENCES `boardgame` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
