-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 16, 2014 at 10:37 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Thriller'),
(2, 'Drama'),
(3, 'Family'),
(4, 'Crime'),
(5, 'Mystery'),
(6, 'Sci-Fi'),
(7, 'Fantasy'),
(8, 'Romance'),
(9, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `movie_casts`
--

CREATE TABLE `movie_casts` (
  `movie_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  KEY `movie_id` (`movie_id`,`people_id`),
  KEY `people_id` (`people_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `movie_casts`
--

INSERT INTO `movie_casts` (`movie_id`, `people_id`) VALUES
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(4, 39),
(4, 48),
(4, 50),
(4, 51),
(5, 36),
(5, 37),
(5, 38),
(5, 39),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(8, 31),
(8, 32),
(8, 33),
(8, 34),
(9, 20),
(9, 21),
(9, 22),
(9, 23);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  KEY `movie_id` (`movie_id`,`genre_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`movie_id`, `genre_id`) VALUES
(1, 1),
(1, 4),
(2, 2),
(2, 3),
(3, 2),
(3, 4),
(4, 2),
(5, 2),
(6, 2),
(6, 5),
(6, 6),
(7, 2),
(7, 7),
(7, 8),
(8, 9),
(9, 2),
(9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `movie_item`
--

CREATE TABLE `movie_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_text` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `brief_summary` varchar(500) NOT NULL,
  `storyline` varchar(1000) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `director` int(11) NOT NULL,
  `images` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_text` (`id_text`),
  KEY `director` (`director`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `movie_item`
--

INSERT INTO `movie_item` (`id`, `id_text`, `title`, `time`, `brief_summary`, `storyline`, `rating`, `director`, `images`) VALUES
(1, 'no-good-deed', 'No Good Deed', 84, 'Terri is a devoted wife and mother of two, living an ideal suburban life in Atlanta when Colin, a charming but dangerous escaped convict, shows up at her door claiming car trouble. Terri offers her phone to help him but soon learns that no good deed goes unpunished as she finds herself fighting for survival when he invades her home and terrorizes her family.', 'Terri is a devoted wife and mother of two, living an ideal suburban life in Atlanta when Colin, a charming but dangerous escaped convict, shows up at her door claiming car trouble. Terri offers her phone to help him but soon learns that no good deed goes unpunished as she finds herself fighting for survival when he invades her home and terrorizes her family.', 'PG-13', 24, 2),
(2, 'dolphin-tale-2', 'Dolphin Tale 2', 107, 'The team of people who saved Winter''s life reassemble in the wake of her surrogate mother''s passing in order to find her a companion so she can remain at the Clearwater Marine Hospital.', 'It has been several years since young Sawyer Nelson and the dedicated team at the Clearwater Marine Hospital, headed by Dr. Clay Haskett, rescued Winter. With the help of Dr. Cameron McCarthy, who developed a unique prosthetic tail for the injured dolphin, they were able to save her life. Yet their fight is not over. Winter''s surrogate mother, the very elderly dolphin Panama, has passed away, leaving Winter without the only poolmate she has ever known. However, the loss of Panama may have even greater repercussions for Winter, who, according to USDA regulations, cannot be housed alone, as dolphins'' social behavior requires them to be paired with other dolphins. Time is running out to find a companion for her before the team at Clearwater loses their beloved Winter to another aquarium.', 'PG', 13, 1),
(3, 'the-drop', 'The Drop', 106, 'Bob Saginowski finds himself at the center of a robbery gone awry and entwined in an investigation that digs deep into the neighborhood''s past where friends, families, and foes all work together to make a living - no matter the cost.', 'Follows lonely bartender Bob Saginowski through a covert scheme of funneling cash to local gangsters - \\"money drops\\" - in the underworld of Brooklyn bars. Under the heavy hand of his employer and cousin Marv, Bob finds himself at the center of a robbery gone awry and entwined in an investigation that digs deep into the neighborhood''s past where friends, families, and foes all work together to make a living - no matter the cost.', 'R', 40, 1),
(4, 'the-skeleton-twins', 'The Skeleton Twins', 93, 'Having both coincidentally cheated death on the same day, estranged twins reunite with the possibility of mending their relationship.', 'After ten years of estrangement, twins Maggie and Milo coincidentally cheat death on the same day, prompting them to reunite and confront how their lives went so wrong. As the twins'' reunion reinvigorates them both, they realize that the key to fixing their lives just may lie in fixing their relationship with each other.', 'R', 46, 1),
(5, 'the-disappearance-of-eleanor-rigby', 'The Disappearance of Eleanor Rigby', 122, 'One couple''s story as they try to reclaim the life and love they once knew and pick up the pieces of a past that may be too far gone.', 'One couple''s story as they try to reclaim the life and love they once knew and pick up the pieces of a past that may be too far gone.', 'R', 35, 1),
(6, 'altas-shrugged-who-is-john-galt', 'Atlas Shrugged: Who Is John Galt?', 79, 'Approaching collapse, the nation''s economy is quickly eroding. As crime and fear take over the countryside, the government continues to exert its brutal force against the nation''s most productive who are mysteriously vanishing - leaving behind a wake of despair. One man has the answer. One woman stands in his way. Some will stop at nothing to control him. Others will stop at nothing to save him. He swore by his life. They swore to find him. Who is John Galt? ', 'Approaching collapse, the nation''s economy is quickly eroding. As crime and fear take over the countryside, the government continues to exert its brutal force against the nation''s most productive who are mysteriously vanishing - leaving behind a wake of despair. One man has the answer. One woman stands in his way. Some will stop at nothing to control him. Others will stop at nothing to save him. He swore by his life. They swore to find him. Who is John Galt?', 'PG-13', 1, 3),
(7, 'bird-people', 'Bird People', 127, 'In an airport hotel on the outskirts of Paris, a Silicon Valley engineer abruptly chucks his job, breaks things off with his wife, and holes up in his room. Soon, fate draws him and a young French maid together.', 'In an airport hotel on the outskirts of Paris, a Silicon Valley engineer abruptly chucks his job, breaks things off with his wife, and holes up in his room. Soon, fate draws him and a young French maid together.', 'PG-15', 7, 1),
(8, 'swearnet-the-movie', 'Swearnet: The Movie', 112, 'Fed up with being censored in their post-Trailer Park Boys lives, the out of work stars/world-renowned ''swearists'', Mike Smith, Robb Wells and John Paul Tremblay decide to start their own uncensored network on the internet. ', 'Fed up with being censored in their post-Trailer Park Boys lives, the out of work stars/world-renowned ''swearists'', Mike Smith, Robb Wells and John Paul Tremblay decide to start their own uncensored network on the internet.', 'NR', 30, 2),
(9, 'my-old-lady', 'My Old Lady', 107, 'An American inherits an apartment in Paris that comes with an unexpected resident.', 'An American inherits an apartment in Paris that comes with an unexpected resident.', 'PG-13', 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `movie_writers`
--

CREATE TABLE `movie_writers` (
  `movie_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  KEY `movie_id` (`movie_id`,`people_id`),
  KEY `people_id` (`people_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `movie_writers`
--

INSERT INTO `movie_writers` (`movie_id`, `people_id`) VALUES
(1, 25),
(2, 13),
(2, 14),
(3, 41),
(4, 46),
(4, 47),
(5, 35),
(6, 1),
(6, 2),
(7, 7),
(7, 8),
(8, 30),
(8, 31),
(8, 32),
(9, 19);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`) VALUES
(25, 'Aimee Lagos'),
(10, 'Anaïs Demoustier'),
(16, 'Ashley Judd'),
(39, 'Bill Hader'),
(51, 'Boyd Holbrook'),
(13, 'Charles Martin Smith'),
(18, 'Cozi Zuehlsdorff'),
(46, 'Craig Johnson'),
(41, 'Dennis Lehane'),
(8, 'Guillaume Bréaud'),
(2, 'Harmon Kaslow'),
(27, 'Idris Elba'),
(19, 'Israel Horovitz'),
(44, 'James Gandolfini'),
(1, 'James Manera'),
(36, 'James McAvoy'),
(37, 'Jessica Chastain'),
(32, 'John Paul Tremblay'),
(9, 'Josh Charles'),
(14, 'Karen Janszen'),
(29, 'Kate del Castillo'),
(20, 'Kevin Kline'),
(48, 'Kristen Wiig'),
(21, 'Kristin Scott Thomas'),
(3, 'Kristoffer Polaha'),
(4, 'Laura Regan'),
(28, 'Leslie Bibb'),
(50, 'Luke Wilson'),
(22, 'Maggie Smith'),
(47, 'Mark Heyman'),
(45, 'Matthias Schoenaerts'),
(23, 'Michael Burstin'),
(40, 'Michaël R. Roskam'),
(31, 'Mike Smith'),
(15, 'Morgan Freeman'),
(17, 'Nathan Gamble'),
(35, 'Ned Benson'),
(43, 'Noomi Rapace'),
(7, 'Pascale Ferran'),
(34, 'Patrick Roach'),
(6, 'Peter Mackenzie'),
(12, 'Radha Mitchell'),
(5, 'Rob Morrow'),
(33, 'Robb Wells'),
(11, 'Roschdy Zem'),
(24, 'Sam Miller'),
(26, 'Taraji P. Henson'),
(42, 'Tom Hardy'),
(38, 'Viola Davis'),
(30, 'Warren P. Sonoda');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_casts`
--
ALTER TABLE `movie_casts`
  ADD CONSTRAINT `movie_casts_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_casts_ibfk_2` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `movie_genres_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_item`
--
ALTER TABLE `movie_item`
  ADD CONSTRAINT `movie_item_ibfk_1` FOREIGN KEY (`director`) REFERENCES `people` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `movie_writers`
--
ALTER TABLE `movie_writers`
  ADD CONSTRAINT `movie_writers_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_writers_ibfk_2` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
