-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 18 Οκτ 2015 στις 15:39:43
-- Έκδοση διακομιστή: 5.6.26
-- Έκδοση PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `hotel`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `attdetails`
--

CREATE TABLE IF NOT EXISTS `attdetails` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) DEFAULT '0',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `bcategories`
--

CREATE TABLE IF NOT EXISTS `bcategories` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) DEFAULT '0',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `bposts`
--

CREATE TABLE IF NOT EXISTS `bposts` (
  `ID` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `tags` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) DEFAULT '0',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `link`) VALUES
(71, 0, 27, 28, 'About History of Greeks', '', 'about'),
(73, 0, 15, 24, 'Tour Operator', '', 'blog'),
(74, 73, 16, 17, 'Beaches', '', 'blog&tcat=61'),
(76, 73, 18, 19, 'Attractions', '', 'blog&tcat=63'),
(68, 0, 1, 2, 'Home', '', 'home'),
(69, 0, 3, 12, 'Destinations', '', 'destinations'),
(70, 0, 25, 26, 'News & Articles', '', 'blog&tcat=57'),
(77, 73, 20, 21, 'Activities', '', 'blog&tcat=64'),
(78, 73, 22, 23, 'Nature', '', 'blog&tcat=65'),
(79, 0, 13, 14, 'Accomodation', '', 'blog&tcat=68'),
(80, 69, 4, 5, 'Arta Prefecture', '', 'destination&ca=22'),
(81, 69, 6, 7, 'Thesprotia Prefecture', '', 'destination&ca=18'),
(82, 69, 8, 9, 'Preveza Prefecture', '', 'destination&ca=4'),
(83, 69, 10, 11, 'Ioannina Prefecture', '', 'destination&ca=3');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `cattributes`
--

CREATE TABLE IF NOT EXISTS `cattributes` (
  `ID` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` int(11) NOT NULL,
  `Fname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Lname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `destinations`
--

CREATE TABLE IF NOT EXISTS `destinations` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `story_id` int(11) NOT NULL,
  `lon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `destinations`
--

INSERT INTO `destinations` (`id`, `parent_id`, `image`, `name`, `description`, `body`, `story_id`, `lon`, `lat`, `status`, `created`) VALUES
(3, NULL, 'Photos/Destinations/ioannina6500.jpg', 'Ioannina Prefecture ', '<p>Ioannina, is the capital and largest city of Epirus, an administrative region in north-western Greece. <br /><br /></p>', '<p>It lies at an elevation of approximately 500 metres &nbsp;above sea level, on the western shore of lake Pamvotis. It is located within&nbsp;the Ioannina municipality, and is the capital of Ioannina regional unit and the region of Epirus. Ioannina is located 450 km &nbsp;northwest of Athens, 290 kilometres &nbsp; southwest of Thessaloniki and 80 km &nbsp;east of the port of Igoumenitsa in the Ionian Sea.</p>', 0, '39.664448', ' 20.853366', 'in', '2015-08-05 12:39:00'),
(4, NULL, 'Photos/Destinations/preveza6500.jpg', 'Preveza Prefecture ', '<p>Preveza</p>', '<p>Preveza</p>', 0, '38.959089', '20.750577', 'in', '2015-08-05 12:51:00'),
(5, 4, '../../Photos/Destinations/parga.JPG-1', 'Parga', '<p>Parga is a picturesque small town on the north-western coast of Greece, is situated in a sheltered bay and its houses climb the mountainside from seaside to the top.&nbsp;</p>', '<p>It''s got a castle, one large beach on the other side of the mountain called Valtos Beach, two smaller beaches in town, an island across the bay with a chapel on, a pier for the tourboats and fishingboats in the middle of town and another beach a couple of kilometers south of town in the next village called Lichnos beach.</p>\r\n<p>Parga is surrounded by mountains covered with olive groves. The olive groves are actually more like olive-woods, than groves. The trees are quite large. The only other place where I''ve seen olivetrees this big is at Corfu. Apart from Parga, and some smaller villages nearby, this area, called the Epirus, is mountaneous and rather empty. It is far between the villages.</p>\r\n<p>Parga was a positive surprise. It is sometimes advertised as a small town on the mainland with an island-feeling to it. And that is exactly what it is. It is also still a very genuine greek small town. You get the real greek food at most places (if not all), not the tourist version, and people are just very nice. There are as many greek tourists as people from elsewhere in the world. Wintertime Parga has about 2.500 inhabitants. During tourist-season, many more.</p>\r\n<p>With the nice town, the harbour and its restaurants, the nearby beaches and the good food, Parga is worth a visit. It is a quiet and relaxing place. Not for those who want a lot to do and having a party but for those who want to relax and take it easy and to make trips into the mainland and some of the nearby islands like Paxos and Antipaxos. The big island of Corfu is also not all that far away.</p>\r\n<p>You reach Parga by flying to Preveza Airport and than travel north for about an hour.</p>\r\n<p>The nearest large town is Ioannina in the north, which like Parga, suffered under the rule and occupation of Ali Pasha. During that time the people of Parga were evacuated to Corfu. (More about Ali Pasha here). They eventually came back.</p>', 0, '', '', 'in', '2015-08-05 12:52:00'),
(12, 4, '../../Photos/Destinations/agia-paraskevi-thesprotia.jpg', 'Agia Paraskevi', '<p>Agia Paraskevi</p>', '<p>Agia Paraskevi</p>', 0, '', '', 'in', '2015-08-10 08:42:00'),
(16, 4, '../../Photos/Destinations/agia-pargas.jpg', 'Agia (Parga)', '<p>Agia of Parga is 5km from Parga. It is a mountainous village (400m altitude) in the limits<br />county of Preveza and Thesprotia .</p>', '<p>In Agia you can find Studios and Apartements as also taverns and restaurants with good food.&nbsp;Agia is situated between the tourist areas of Parga , Perdika and Sivota and is a good choice for those who want&nbsp;to have a base for their excursions. Don''t forget to visit the Folklore Museum of Agia.</p>', 0, '', '', 'in', '2015-08-10 18:40:00'),
(17, 4, '../../Photos/Destinations/agiakiriaki.jpg', 'Agia Kyriaki (Parga)', '<p>Agia Kyriaki is located 5 km from Parga. It is a small village with olive groves above the Lichnos beach (3 min by car)<br /><br /></p>', '<p>and very close to the beach of Ai Giannakis (5 mins by car). It has many rooms, apartements and studios.</p>', 0, '', '', 'in', '2015-08-10 19:23:00'),
(18, NULL, '../../Photos/Destinations/igoumenitsa2.jpg-1', 'Thesprotia Prefecture', '<p>Thesprotia is one of the four counties of Epirus. It includes large mountain ranges, great coastline<br />and rich natural environment consisting of forests, rivers, lakes and plains.</p>', '', 0, '', '', 'in', '2015-08-10 20:08:00'),
(33, 3, 'Photos/Destinations/ioannina65000.jpg', 'Ioannina', '<p>Ioannina, is the capital and largest city of Epirus, an administrative region in north-western Greece. &nbsp;</p>\r\n<div class="entry-content">\r\n<p>&nbsp;</p>\r\n</div>', '<p>It lies at an elevation of approximately 500 metres &nbsp;above sea level, on the western shore of lake Pamvotis. It is located within&nbsp;the Ioannina municipality, and is the capital of Ioannina regional unit and the region of Epirus. Ioannina is located 450 km &nbsp;northwest of Athens, 290 kilometres &nbsp; southwest of Thessaloniki and 80 km &nbsp;east of the port of Igoumenitsa in the Ionian Sea.</p>', 0, '', '', 'in', '2015-09-13 15:43:00'),
(21, 18, '../../Photos/Destinations/sivota650.jpg-1', 'Sivota', '<p>Sivota the " Greek Caribbean "</p>', '<p>Sivota is located 12 km from Igoumenitsa&nbsp;among green islets Mavro Oros , St. Nicholas and Bella Braka . Small creeks and the blue Ionian sea create a unique landscape.</p>', 0, '', '', 'in', '2015-08-10 20:20:00'),
(27, 3, 'Photos/Destinations/anilio650.jpg', 'Anilio', '<p>Anilio is a mountainous of Ioannina . It is built at an altitude of 1,060 m. On the slopes of Northern Pindos , opposite Metsovo and in the shadow of the mountain top " Fatzetou " Pindos .</p>', '', 0, '', '', 'in', '2015-09-11 15:18:00'),
(28, 3, 'Photos/Destinations/negades650.jpg', 'Negades', '<p>Negades (alt. 1060 m.), An old country village of Zagoria with special local culture, 48 km. From Ioannina.<br /><br /></p>', '<p>Negades is built on a hillside in an oak forest. Negades hexist since 1312 and experienced significant population growth. During the Ottoman Empire developed a remarkable civilization and highlighted many benefactors who prospered in Moldavia, Wallachia, Austria and Russia.<br />The buildings remind today the years of prosperity of the village and give a picture of absolute harmony with the natural environment.</p>', 0, '', '', 'in', '2015-09-11 15:28:00'),
(29, 3, 'Photos/Destinations/molivdoskepastos650.jpg', 'Molyvdoskepastos', '<p>Molyvdoskepastos is known for the many Byzantine churches. &nbsp;<br /><br /></p>', '<p>Molyvdoskepastos &nbsp;is built on a magnificent natural location with great views.&nbsp;In Molyvdoskepastos village that retains many of the traditional elements, and you can visit the small folklore museum and the raki distillery that exist.</p>', 0, '', '', 'in', '2015-09-11 15:43:00'),
(22, NULL, '../../Photos/Destinations/arta650.jpg-2', 'Arta Prefecture', '<p>The largest part of Arta consists of mountains with rich flora and fauna. Arta has great culture, religion and ancient history.</p>', '', 0, '', '', 'in', '2015-08-10 21:04:00'),
(23, 3, '../../Photos/Destinations/zagorochoria650.jpg', 'Zagorochoria', '<p><br />Zagori, is a region and a municipality in the Pindus mountains in Epirus, in northwestern Greece.&nbsp;</p>', '<p>The seat of the municipality is the village Asprangeloi.&nbsp;It has an area of some 1,000 square kilometres and contains 45 villages known as Zagoria (or Zagorochoria or Zagorohoria), and is in the shape of&nbsp;an upturned equilateral triangle.</p>\r\n<p>The southern corner of the triangle contains the provincial capital, Ioannina, the south-western side is formed&nbsp;by Mount Mitsikeli (1,810m), and the Aoos river and Mount Tymfi constitute the northern side, and the south-eastern side runs along the Varda river&nbsp;to Mount Mavrovouni (2,100m) near Metsovo. &nbsp;</p>', 0, '', '', 'in', '2015-08-11 11:20:00'),
(24, 18, '../../Photos/Destinations/acheron-gliki.jpg', 'Glyki (Acheron Springs)', '<p>Glyki village is in the Straits of Acheron River below the villages of Souli and is a natural border of the counties of&nbsp;Thesprotia and Preveza .</p>', '<p>Acheron River is ideal for nature lovers and has been characterized&nbsp;as Great Beauty Area and belongs to the European Network of Protected Areas Nature 2000 (Natura 2000).<br />The springs of the river and the gorge will impress you. Glyki offers hotels,&nbsp;rooms and apartments. Also organized alternative tourism units operate in the area.</p>', 0, '', '', 'in', '2015-08-11 11:54:00'),
(26, 18, '../../Photos/Destinations/igoumenitsa2.jpg-2', 'Igoumenitsa', '<p>Igoumenitsa the capital of Thesprotia</p>', '', 0, '', '', 'in', '2015-09-07 18:11:00'),
(25, 3, '../../Photos/Destinations/metsovo650.jpg', 'Metsovo', '<p>Metsovo is a town in Epirus on the mountains of Pindus in northern Greece, between Ioannina to the north and Meteora to the south.</p>', '', 0, '', '', 'in', '2015-08-20 11:31:00'),
(32, 18, 'Photos/Destinations/perdika650.jpg', 'Perdika', '', '', 0, '', '', 'in', '2015-09-12 19:03:00'),
(30, 3, 'Photos/Destinations/papigo650.jpg', 'Papigo ', '<p>Papigo is very close to Vikos Gorge and within the National Park Vikos-Aoos. &nbsp;<br /><br /></p>', '<p>The area attracts tourists throughout the year. The climatic conditions follow the peculiarity of the ecosystem of the national park, with extensive snowfall winter and humid summer. The flora and fauna is very diverse.</p>', 0, '', '', 'in', '2015-09-11 15:55:00'),
(31, 18, 'Photos/Destinations/plataria650.jpg', 'Plataria', '<p>Plataria village lies in a deep bay between Syvota and Igoumenista.</p>', '<p>It is used mostly as a yacht port but in the last few years it has started developing as a resort. Plataria has a small center next to the port, with a couple of tavernas and a narrow promenade along the beach. There is also a supermarket and filling station. The beach itself is about 1 km long and sandy, some beach facilities like parasols and sunbeds are offered by two or three beach cafes. Compared to the lively Syvota (10 km away), it is very quiet both in the day and in the evening.</p>', 0, '', '', 'in', '2015-09-11 17:10:00'),
(34, 4, 'Photos/Destinations/preveza66500.jpg', 'Preveza', '<p>Preveza is the capital of Preveza Perfecture in Epirus, located at the mouth of the Ambracian Gulf.</p>', '<p>The Aktio-Preveza Immersed Tunnel, connects Preveza to Aktio in western Acarnania&nbsp;in the region of Aetolia-Acarnania. The ruins of the ancient city of Nicopolis lie 7 kilometres north of the city.</p>', 0, '', '', 'in', '2015-09-13 15:52:00'),
(35, 22, 'Photos/Destinations/arta6500.jpg', 'Arta', '<p>Arta is a city in northwestern Greece, capital of the regional unit of Arta, which is part of Epirus region.<br /><br /></p>', '<p>The city was known in ancient times as Ambracia. Arta is known for the medieval bridge over the Arachthos River.&nbsp;Arta is also known for its ancient sites from the era of Pyrrhus of Epirus and its well-preserved 13th-century castle. &nbsp;Arta''s Byzantine history is reflected in its many Byzantine churches.</p>', 0, '', '', 'in', '2015-09-13 16:07:00'),
(36, NULL, 'Photos/Destinations/athens-primary.jpg', 'Athens', 'Fifth-century Athens is the Greek city-state of Athens', ' in the time from 480 BC-404 BC. This was a period of Athenian political hegemony, economic growth and cultural flourishing formerly known as the Golden Age of Athens with the later part The Age of Pericles. The period began in 478 BC after defeat of the Persian invasion, when an Athenian-led coalition of city-states, known as the Delian League, confronted the Persians to keep the liberated Asian Greek cities free. After peace was made with Persia in the mid 5th century BCE, what started as an alliance of independent city-states became an Athenian empire when Athens abandoned the pretense of parity among its allies and relocated the Delian League treasury from Delos to Athens, where it funded the building of the Athenian Acropolis and put half its population on the public payroll and maintained dominating naval power in the Greek world.', 1, '37.983879', '23.727614', 'in', '2015-10-18 00:00:00'),
(37, NULL, 'Photos/Destinations/12167367_10206235221453651_1604026283_n.jpg', 'Sparta', '', '', 1, '37.076411', '22.422305', 'in', '2015-10-18 00:00:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `State` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `ProductName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ProductPrice` double NOT NULL,
  `SubTotal` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `ID` int(11) NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `photographer` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('published','hide') COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `gcategories`
--

CREATE TABLE IF NOT EXISTS `gcategories` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `entity_id` int(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `lon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `mcategories`
--

CREATE TABLE IF NOT EXISTS `mcategories` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) DEFAULT '0',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `mcategories`
--

INSERT INTO `mcategories` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `link`) VALUES
(63, 0, 7, 8, 'Attractions', '', ''),
(64, 0, 9, 10, 'Activities', '', ''),
(66, 0, 13, 14, 'Shopping', '', ''),
(57, 0, 1, 2, 'Articles', '<p>General articles and news posts</p>', ''),
(65, 0, 11, 12, 'Nature', '', ''),
(60, 0, 3, 4, 'Information', '<p>This category have all the usefull information about a destination.</p>', ''),
(61, 0, 5, 6, 'Beaches', '<p>This category have all the beaches from a destination.</p>', ''),
(68, 0, 15, 16, 'Accomodation', '', '');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Country` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Postal_Code` int(5) NOT NULL,
  `Post_Method` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Payment_Method` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Cost` double NOT NULL,
  `State` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Date` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pagems`
--

CREATE TABLE IF NOT EXISTS `pagems` (
  `ID` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `context` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pcategories`
--

CREATE TABLE IF NOT EXISTS `pcategories` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) DEFAULT '0',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pdfs`
--

CREATE TABLE IF NOT EXISTS `pdfs` (
  `id` int(11) NOT NULL,
  `entity_id` int(100) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `status` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `destination_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`ID`, `image`, `title`, `description`, `body`, `author`, `category`, `created`, `status`, `tags`, `destination_id`) VALUES
(70, 'Photos/', 'History of Igoumenitsa', 'In ancient times Igoumenitsa was known as Titani, (Gitani, Gitana, Goumani) and was one of the most important towns of the Kingdom of Thesprotis during the 4th century BC, covering 28 hectares. The circumference of its walls was 2,400 metres. The walls had four gates. Internal walls, in the shape of a sickle, divided the city in half. Its most noteworthy tower, located at the top of the hill, was round, and is thought to have been a religious sanctuary. Excavations have revealed a theatre which seats 2,500 and ruins of two temples.\r\n\r\nThe city was a meeting place of the Epirote League (Livy 42.38.1). A spur near Philiates between the Kalamas River, the acropolis had a fine semicircular tower. A small theater, towers, and gateways which are still visible. The Kalamas may have been navigable to this point. The city was destroyed by the Romans in 167 BC and later on it was annexed into the Roman Empire. It was ruled by Ottoman Empire and was renamed as "Reşadiye" in 1909 honour of Mehmet V, Ottoman Sultan between 1909 and 1918. During Italo-Turkish War, Hamidiye torpedo boat was sunk by an Italian destroyer on December 30, 1912 in here.\r\n\r\nAfter the liberation of the region from Ottoman rule during the Balkan wars in 1913, the city name was Grava   which means "cave" in ancient Greek and in 1938 became head of the prefecture of Thesprotia and renamed to Igoumenitsa.\r\n\r\nFollowing World War II, the Muslim Cham Albanian residents of Igoumenitsa were expelled to neighbouring Albania after large parts of them collaborated with the invading German forces. ', '', '8', '60', '2015-09-11', 'published', '', 26),
(71, 'Photos/', 'Traffic to Athens', 'The Athens, Greece via Ship, or Plane, or train.ELEFTHERIOS VENIZELOS international airport in Athens opened to ... Built to serve 21m passengers a year, it has suffered a steep decline in traffic since the onset ofI think this is a bad description of the Athens Airport.', '', '8', '60', '2015-09-11', 'published', '', 36),
(72, 'Photos/', 'General information', 'General information from Athens Info Guide, the most complete information ... word ', '', '8', '60', '2015-09-11', 'published', '', 36),
(73, 'Photos/', 'Traffic to Ioannina', 'Ioannina is served by Ioannina National Airport.\r\nThe Via Egnatia highway, known in Greece as the Egnatia Odos, (part of the E90) passes by Ioannina. It links the west coast port of Igoumenitsa with the Turkish border.\r\nAir Sea Lines flew from Lake Pamvotis to Corfu with seaplanes. Air Sea Lines has suspended flights from Corfu to Ioannina since 2007.\r\nLong-distance buses (Ktel) travel daily to Athens (6 - 6.5 hours) and Thessaloniki (3 hours)..', '', '8', '60', '2015-09-11', 'published', '', 3),
(74, 'Photos/', 'History of Metsovo', 'In 15th century Metsovo came under the Ottoman rule and became part of the Sanjak of Ioannina. Throughout the late period of Ottoman \r\nrule (18th century-1913) the Greek and Aromanian population of the region (Northern Pindus) suffered from Albanian raiders. \r\nAlso, in one occasion in the local Greek revolt of 1854 the town was plundered by Ottoman troops and the men of Theodoros Grivas, \r\nformer general of the Greek military, during their struggle for control of the town.During the First Balkan War, Metsovo was burnt by bands.\r\n In the last 10 days of October 1912, troops of volunteers from Crete together with about 340 soldiers of the tactical Greek Army under the \r\ncommand of Lieutenant Colonel Mitsas advance through Thessaly to the then Greek-Turkish border on the peaks east of Metsovo.\r\n\r\nOn October 31, 1912, the Greek troops assisted by rebel groups from Epirus and volunteers from Metsovo,\r\n having crossed the Katara-Zygos mountain ridge overnight, attack the Turkish garrison of Metsovo, which then comprised 205 soldiers and two cannons. \r\nThe battle lasted until 4 p.m. when the Ottoman soldiers inside the besieged Turkish garrison raised a white flag and surrendered.', '', '8', '60', '2015-09-11', 'published', '', 25),
(75, 'Photos/', 'Ski Resort Metsovo ', 'Ski Resort Metsovo 4 km. From Metsovo, on the national road Ioannina - Trikala, near the Curse. The slopes are relatively easy and short length. From November 2005 operates the artificial ski slope with plastic carpet (unique in Greece) having length 270 m., Width 12 m., Also works racetrack tubing length 72 m. Consisting of two turns. The descent to the inner tube on an apron is an incredible experience worth trying!', '', '8', '60', '2015-09-11', 'published', '', 25),
(76, 'Photos/', 'Myth of Acheron River', 'In ancient Greek mythology, Acheron was known as the river of woe, and was one of the five rivers of the Greek underworld. \r\nIn the Homeric poems the Acheron was described as a river of Hades, into which Cocytus and Phlegethon both flowed. \r\n\r\nThe Roman poet Virgil called it the principal river of Tartarus, from which the Styx and Cocytus both sprang. \r\nThe newly dead would be ferried across the Acheron by Charon in order to enter the Underworld. \r\n\r\n Acheron had been a son of Helios and either Gaia or Demeter, who had been turned into the Underworld \r\nriver bearing his name after he refreshed the Titans with drink during their contest with Zeus. By this myth, Acheron is also the father\r\n of Ascalaphus by either Orphne[8] or Gorgyra. \r\n\r\nThe river called Acheron with the nearby ruins of the Necromanteion is found near Parga on the mainland opposite Corfu. \r\nAnother branch of Acheron was believed to surface at the Acherusian cape (now Karadeniz Ereğli in Turkey) and was seen by \r\nthe Argonauts according to Apollonius of Rhodes. Greeks who settled in Italy identified the Acherusian lake into which Acheron \r\nflowed with Lake Avernus. Plato in his Phaedo identified Acheron as the second greatest river in the world, excelled only by Oceanus.\r\n\r\n\r\nFollowing Greek mythology, Charon ferries souls across the Acheron to Hell. Those who were neutral in life sit on the banks\r\nHe claimed that Acheron flowed in the opposite direction from Oceanus beneath the earth under desert places. \r\n\r\nThe word is also occasionally used as a synecdoche for Hades itself.\r\nVirgil mentions Acheron with the other infernal rivers in his description of the underworld in Book VI of the Aeneid.  In Book VII, line 312 he gives to Juno the famous saying, flectere si nequeo superos, Acheronta movebo:  ''If I cannot bend the will of Heaven, I shall move Hell.'' The same words were used by Sigmund Freud as the dedicatory motto for his seminal book The Interpretation of Dreams, figuring Acheron as psychological underworld beneath the conscious mind.\r\n\r\nThe Acheron was sometimes referred to as a lake or swamp in Greek literature, as in Aristophanes'' The Frogs and Euripides'' Alcestis.\r\n\r\nIn Dante''s Inferno, the Acheron river forms the border of Hell. Following Greek mythology, Charon ferries souls across this river to Hell.\r\nThose who were neutral in life sit on the banks.', '', '8', '60', '2015-09-11', 'published', '', 24),
(77, 'Photos/', 'History of Zagori', 'The passage of the Slavs during the early Byzantine period is testified to by numerous placenames.\r\nUnder the Byzantine Empire, Zagori occasionally attracted groups of soldiers who built villages and settled there. \r\nSeveral monasteries were endowed, including the monastery of Votsa near the village of Greveniti and the monastery o\r\nf the Transfiguration near Kleidonia, founded in the 7th century by the Byzantine Emperor Constantine IV Pogonatus\r\n and the monastery of St John of Rogovou near Tsepelovo founded in 1028 by the sister of Emperor Romanos III Argyros.\r\n\r\nFrom 1204 to 1337 the region was part of the local Despotate of Epirus. In the 14th century, when various Albanian \r\nclans made incursions into Epirus, Zagori formed a bastion of Hellenism in Epirus and was the source of soldiers\r\n that served in the Ioannina garrison. As a result of the campaigns of Andronikos III Paleologos in 1337,\r\n the Despotate of Epirus and, therefore, Zagori along with Ioannina and the surrounding region came again briefly under Byzantine rule.\r\n\r\nThe region came under Serbian rule in 1348 and the Despotate of Epirus was reformed and was under Latin rule\r\n by Carlo II Tocco when Ioannina and Zagori fell to the Turks in 1430, at the time of Sultan Murad II. \r\nZagori (which then only consisted of 14 villages) «bowed the knee», which meant in practice that there were \r\nobligations between delegations of the two sides and a sum in tax was agreed upon in exchange for very considerable \r\nprivileges: autonomy, administrative independence, and a ban on Turks crossing the borders into the area.\r\n', '', '8', '60', '2015-09-11', 'published', '', 23),
(78, 'Photos/', 'Vikos Gorge', 'As the heart of the Vikos–Aoös National Park, the Vikos Gorge is the largest and most picturesque among the gorges of Zagori. \r\nhe Vikos Gorge collects the waters of a number of small rivers that form the Voidomatis river which flows through the gorge. \r\nThe Vikos Gorge at 990m deep is one of the deepest in the world, indeed the deepest in proportion to its width. \r\nThe Vikos Gorge is also a site of major scientific interest, because it is in almost virgin condition, is a haven \r\nfor endangered species and contains many and varied ecosystems.', '', '8', '60', '2015-09-11', 'published', '', 23),
(79, 'Photos/', 'History of Arta', 'Despite the existence several churches from the 9th and 10th centuries, Arta is first attested only in the late 11th century. \r\nIn the Komnenian period, the city flourished as a commercial centre, with links to Venice, and quickly rose to become an archbishopric (by 1157).\r\n By the end of the 12th century, Arta probably formed a distinct fiscal district (episkepsis) within the wider theme of Nicopolis.\r\n\r\nIn 1205, after the fall of Constantinople to the Fourth Crusade, Arta became the capital of the Despotate of Epirus.\r\n It continued to prosper under its new rulers, despite repeated attempts by another Greek successor state, the Empire of Nicaea (and after 1261,\r\n the restored Byzantine Empire), to subdue Epirus. As late as the 15th century, the Chronicle of the Tocco attests to the prosperity of Arta and\r\n its fertile region, "with many water buffaloes, cows, and horses", and a lively commercial activity in dried meat, lard, ham, furs,\r\n and indigo drawing merchants from Venice and Dubrovnik. Archaeological finds also attest to a local ceramic industry.\r\n Fortified in 1227, Arta was briefly occupied in 1259, following the Battle of Pelagonia, by the Nicaeans. \r\n The restored Byzantine emperors continued their assaults, but it was not until 1338 that Andronikos III Palaiologos\r\n finally secured control of the city, only for it to be wrested from the Byzantines a few years later by the Serbian Empire of Stephen Dushan.\r\n Serbian rule was followed by Albanian rule (1358-1416), when the city fell to Carlo I Tocco, Count of Cephalonia and Zakynthos.\r\n The city remained in Tocco hands until 1449, when the Ottoman Empire captured it. \r\n', '', '8', '60', '2015-09-11', 'published', '', 22),
(80, 'Photos/', 'Archaeological Museum of Arta', '\r\nThe Archaeological Museum of Arta is a museum in Arta. It was established in 1973 as the Archaeological collection of Arta, \r\nand used to be housed in the 13th-century Paregoretissa church. The collection has now been moved to a brand new,\r\n purpose-built museum building which opened in 2009. The new museum building is located by the river, close to the historical bridge.\r\n\r\n \r\nThe bulk of the collection are excavations from the ancient city of Ambracia, the "Koudounotrypa" cave, and several other sites in Arta \r\nregional unit. Of note are numerous funerary stelae and burial offerings from cemeteries of ancient Ambracia. \r\n\r\nThe exhibition includes three main sections: the public life, the cemeteries, and the private life of Ambraciotes, whilst at the \r\nstart and end of the exhibition there are individual smaller sections covering the birth and fall of Ambracia, respectively.\r\n\r\nThe bulk of the collection from the city of Arta come from excavations of the two cemeteries housed outside the walls of the ancient \r\ncity of Ambracia (east and southwest), from public buildings such as the small and large Greek Theatre, the Temple of Apollo and the \r\nPrytaneion, houses and other building residues, as well as ceramic and other laboratories, discovered by archaeological research.\r\n\r\nThe museum''s exhibition spans a wide time period, from the Paleolithic up to the Roman period. The majority of exhibits belongs \r\nto the Hellenistic era, an era that coincides with the highest economic and civil growth in the heyday of Ambracia, at which time \r\nthe city was the capital of Epirus.\r\n\r\n', '', '8', '60', '2015-09-11', 'published', '', 22),
(81, 'Photos/nikopolis650.jpg', 'Ancient Nikopolis', 'Ancient Nicopolis  or Actia Nicopolis was a great city of Epirus.', 'Nicopolis founded by Octavian in commemoration of his victory in 31 BC over Antony and Cleopatra at the Battle of Actium nearby. It was later the capital of the Roman province of Epirus Vetus.\r\n', '8', '63', '2015-09-11', 'published', '', 0),
(82, 'Photos/ioanninacastle650.jpg', ' Ioannina Castle', 'The Ioannina Castle  is the fortified old town of the city of Ioannina in northwestern Greece.', ' The present fortification dates largely to the reconstruction under Ali Pasha in the late Ottoman period, but incorporates also pre-existing Byzantine and ancient Greek elements.', '8', '63', '2015-09-11', 'published', '', 0),
(83, 'Photos/pisina6500.jpg', 'Pisina', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(84, 'Photos/megaammos650.jpg', 'Mega Ammos', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(85, 'Photos/nautilos650.jpg', 'Nautilos', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(86, '../../Photos/drepano650.jpg-1', 'Drepano', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(87, 'Photos/karvouno650.jpg', 'Karvouno', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(88, 'Photos/megadrafi650.jpg', 'Mega Drafi', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(89, 'Photos/zavia650.jpg', 'Zavia', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(90, 'Photos/kamini650.jpg', 'Kamini', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(91, 'Photos/aigiannakis650.jpg', 'Ai Giannakis', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(92, 'Photos/loutsa650.jpg', 'Loutsa', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(93, 'Photos/skala650.jpg', 'Skala', '', '', '8', '61', '2015-09-11', 'published', '', 0),
(94, 'Photos/karavostasiriver650.jpg', 'Karavostasi River', '', '', '8', '65', '2015-09-12', 'published', '', 0),
(95, 'Photos/anthousawaterfall650.jpg', 'Anthousa watermill', '', '', '8', '65', '2015-09-12', 'published', '', 5),
(96, 'Photos/kalodikilake650.jpg', 'Kalodiki lake', '', '', '8', '65', '2015-09-12', 'published', '', 5),
(98, 'Photos/hotel.jpg-1', 'Hotel Ideal', ' Description and Services. The Hotel Hesperia is the right choice for visitors who are searching for a combination of charm, peace and quiet, and a convenient ', 'Description and Services. The Hotel Hesperia is the right choice for visitors who are searching for a combination of charm, peace and quiet, and a convenient Description and Services. The Hotel Hesperia is the right choice for visitors who are searching for a combination of charm, peace and quiet, and a convenient ', '8', '68', '2015-09-14', 'published', '', 36),
(45, 'Photos/', 'About Parga', 'Spread across a large area, this destination is nothing if not diverse. Choosing a single place to focus your time, that is a true challenge. There are attractions everywhere so be ready to come back another day, and after some time here, that&rsquo;s exactly what you&rsquo;ll want to do. Exploring the Area The biggest cities are along the coast. History &hellip;', 'Spread across a large area, this destination is nothing if not diverse. Choosing a single place to focus your time, that is a true challenge. There are attractions everywhere so be ready to come back another day, and after some time here, that&rsquo;s exactly what you&rsquo;ll want to do. Exploring the Area The biggest cities are along the coast. History &hellip;', '8', '60', '2015-08-10', 'published', '', 5),
(46, 'Photos/', 'History of Parga', 'Parga was known in ancient times as Paragiros, Paragea and Ypargos where it''s current name came from. It was ancient Toryni as Ptolemy and Plutarch say. The Normans built the first fort in the 14th century and since then Parga passed in the hands of Venetians,&nbsp; French, Britishand&nbsp; Turks', 'Parga was known in ancient times as Paragiros, Paragea and Ypargos where it''s current name came from. It was ancient Toryni as Ptolemy and Plutarch say. The Normans built the first fort in the 14th century and since then Parga passed in the hands of Venetians,&nbsp; French, Britishand&nbsp; Turks', '8', '60', '2015-08-10', 'published', '', 5),
(47, '../../Photos/plakero.jpg', 'Plakiero ', '<p>The morphology of the beach Plakiero is impressive Like rock cutted by knife. Plakiero is an isolated beach with few visitors. y end up in San Sostis.</p>', '<p>The access is difficult with a low car. You also have to leave your vehicle 200 meters from the beach and follow the path, which is a little bit difficult in the last meters. Pakiero is a rare creation of nature. Actually it is not a sandy beach but a single rock that has this shape. It''s perfect for sunbathing and skinny dipping. Located on the road to St.Sostis last refueling station is the village Anthousa. This route is part of a network of paths and dirt roads from Valtos and Anthousa, where the</p>', '8', '61', '2015-08-11', 'published', '', 5),
(48, '../../Photos/aisostis600.jpg', 'Agios Sostis', '<p>Ai Sostis beach is near the church of St. Sostis a few kilometers from the beautifull village Anthousa.&nbsp;</p>', '<p>Agios Sostis beach is located 2 km from the village of Anthousa.</p>\r\n<p>Access by car includes some difficult points, especially for low cars. Those who decide to visit the beach and enjoy the calm and clear waters, it would be necessary to arrange for supplies.</p>\r\n<p>After Anthousa where there are mini markets, cafes etc will not find anything else. Do not forget to visit the church of Agios Sostis that is built into the rock. Also, many choose to follow this route on foot as the area is ideal for walks. There are many alternative routes leading to other secluded beaches, Valtos beach, Mills of Anthousa and other</p>', '8', '61', '2015-08-11', 'published', '', 5),
(49, '../../Photos/ammopouli-beach-parga-greece.jpg', 'Amopouli ', '<p>Amopouli is a small beach in island of Parga</p>', '', '8', '61', '2015-08-11', 'published', '', 5),
(50, '../../Photos/alonaki-parga.jpg', 'Alonaki ', '<p>Alonaki is an exotic beach with clear and warm water.&nbsp;</p>', '<p>It is not organized and there is only one canteen. Alonaki is about 20 to 30 mins from Parga and you can visit the beach only by car. You must be careful not to miss the exit from the road to Preveza. If you don''t have a car it worth to rent one.</p>', '8', '61', '2015-08-11', 'published', '', 4),
(51, '../../Photos/karavostasi.jpg', 'Karavostasi ', '<p>Karavostasi is a long sandy beach in the foot of ancient city Elina.&nbsp;</p>', '<p>Karavostasi is a very nice beach in the coastal road to Igoumenitsa. It is an organized beach with beach bars, and water sports. Also you can combine your swim with the visit to ancient Elina (Dimokastro) and the walk to the river in the forest of Karavostasi.</p>', '8', '61', '2015-08-11', 'published', '', 5),
(52, '../../Photos/limanaki-valtos-parga-beach.jpg', 'Limanaki ', '<p>Limanaki is a small and peacefull beach in the Valtos Gulf.</p>', '<p>&nbsp;You can reach Limanaki in a few minutes, only by boat, canoe, pedalo, even swimming but it''s not suggested in high season. When you arrive in Limanaki beach you will have a feeling of isolation and in seconds you will forget the noise of Valtos Beach. Also you will be able to see Parga from a differnt view.</p>', '8', '61', '2015-08-11', 'published', '', 5),
(53, '../../Photos/lichnos.jpg-1', 'Lichnos ', '<p>Organized and beautiful beach. One of the longest beaches of Parga with rich nature. Lichnos has a very nice beach blue waters and lush vegetation.&nbsp;</p>', '<p>It is well organized beach, with many activities and watersports available for the guests, water ski, canoeing, water bike, jet ski, diving, etc. There are cafes, restaurants with good food, hotels, rooms and camping. Access is very easy by car and by the turn to the beach, several trails starts going through the woods and they end up in the church of St.George and St. Helena, perhaps the point with the best and most wonderful views of Parga.</p>', '8', '61', '2015-08-11', 'published', '', 5),
(54, '../../Photos/kryoneri.jpg', 'Kryoneri ', '<p>Kryoneri Beach is located in the town center of Parga.Opposite stands the Island of Virgin. It is a picturesque beach where opposite is the hallmark of Parga Greece, the Virgin Island.&nbsp;</p>', '<p>Access to the island is very easy. Visitors can go there with pedal boat (5 min), with a sea bot (3min) or swimming! Left of Kryoneri beach is the rock Skordas(Garlick) and even left the rock Kremidas (Onion). Access to Kryoneri is very easy, you need to walk only a few steps if you live in Parga. This beach receives many visitors, mostly families. On the way to the beach you will find dozens of restaurants, cafes, souvenir shops and handmade works from the tradition of Parga.</p>', '8', '61', '2015-08-11', 'published', '', 5),
(55, '../../Photos/valtos-beach-3.jpg-1', 'Valtos ', '<p>Valtos is the most popular beach in Parga. Clean water, water activities, restaurants and accommodation all in one beautifull environment.&nbsp;</p>', '<p>Valtos or Chrysogyali (Golden beach) is an organized beach with many beach bars, restaurants, resorts, schools for watersports and games.</p>\r\n<p>During the summer months there is a unique thermal effect suitable for the sport of windsurfing. Valtos beach also has a port for the purposes of sailing boats. In Valtos beach you will see the historic church of St. Spyridon built practically on the sand and just 5 minutes from the beach you will find the Monastery of Vlacherna.</p>\r\n<p>From the beach of Valtos you can follow the path to Anthousa, one of the most beautiful in the area, passing by the old mills. It is easily accessible on foot from the picturesque stairs of the Castle of Parga or by car. Also you can get the boat that makes the trip Parga - Valtos regularly</p>', '8', '61', '2015-08-11', 'published', '', 5),
(56, '../../Photos/spartila-1.jpg', 'Spartila ', '<p>Spartila is a secluded beach with amazing water a few km from Anthousa village.</p>', '', '8', '61', '2015-08-11', 'published', '', 5),
(57, '../../Photos/agia-paraskevi-thesprotia.jpg', 'Agia Paraskevi', '<p>Agia Paraskevi is one of the most picturesque beaches near Parga with white sand and pebble.&nbsp;</p>', '<p>100 meters from the beach is to green islet where you can very easily visit. Next to the beach is the church of Agia Paraskevi.</p>', '8', '61', '2015-08-11', 'published', '', 20),
(58, '../../Photos/sarakiniko-parga.jpg', 'Sarakiniko ', '<p>Sarakiniko is a&nbsp; beautiful organized small beach</p>', '', '8', '61', '2015-08-11', 'published', '', 5),
(59, '../../Photos/mikriammos6.jpg-1', 'Mikri Ammos', '<p>Mikri Ammos is a very small beach with a beach bar.</p>', '', '8', '61', '2015-08-11', 'published', '', 21),
(60, '../../Photos/Dodona.jpg', 'Ancient Dodona', '<p>The ancient theater of Dodona, one of the largest and best preserved ancient theaters in the world with a capacity of 17,000 spectators.</p>', '', '8', '63', '2015-08-11', 'published', '', 3),
(61, '../../Photos/necromancy-parga-greece.jpg', 'Necromancy', '<p>Necromancy, the gate to the underworld, here mortals entering Hades, home of the dead.</p>', '', '8', '63', '2015-08-11', 'published', '', 24),
(62, '../../Photos/elea4.jpg', 'Ancient Elea ', '<p>Elea was the capital of the League of Thesprotians from its inception up to 335 to 330/325 BC around and continued to flourish untill the Hellenistic period.</p>', '', '8', '63', '2015-08-11', 'published', '', 18),
(63, '../../Photos/gitani1.jpg', 'Ancient Gitani ', '<p>Gitani was the second capital of Thesprotians chronologically and was one of the major centers of Ionio.</p>', '', '8', '63', '2015-08-11', 'published', '', 18),
(64, '../../Photos/orraon1.jpg', 'Ancient Orraon', '<p>Orraon, walled city- Fortress of the Ancient Molossos, destroyed and abandoned by the Romans 167BC.</p>', '', '8', '63', '2015-08-11', 'published', '', 18),
(65, '../../Photos/french-fortress.jpg', 'French Fortress ', '<p>French Fortress in Island of Parga</p>', '', '8', '63', '2015-08-11', 'published', '', 5),
(66, '../../Photos/castle-parga-greece.jpg', ' Castle of Parga', '<p>The Castle of Parga is located on the top of a hill overlooking the town and was used to protect the town from the mainland and the sea.&nbsp;</p>', '<p>It was initially built in the 11th century by the residents of Parga to protect it from the pirates and the Turks.</p>\r\n<p>In the 13th century, as their control of the region increased, the Venetians rebuilt the castle to fortify the area.</p>\r\n<p>In 1452, Parga and the castle was occupied by the Ottomans for two years. During that time part of the castle was demolished.</p>\r\n<p>In 1537 the Ottoman admiral Hayreddin Barbarossa burnt and destroyed Parga''s fortress and the houses. Within before the reconstruction of the castle in 1572 by Venetians, the Turkish demolished it once again.</p>\r\n<p>The Venetians rebuilt for third and last time a perfect strong fortress that stayed impregnable until 1819, despite the attacks especially of Ali Pasa of Ioannina, who besieges them from the castle of Agia-Anthousa. Venetians created a perfect defence plan, which in combination with the natural fortification made the fortress. Outside the castle, eight towers placed in different positions completed the defence.<br />Inside the narrow space of citadel there were 400 houses, located in a way so that they occupied only a little room, far away from the seaside. On this castle the free-besieged population of Parga and Souli fought epic battles and kept their freedom for centuries. From the faucet &ldquo;Kremasma&rdquo; the tanks of the castle and the houses were provided with water. The castle for its provision used the two bays: of Valtos and Pogonia. When Parga was sold to the Ottomans, Ali Pasha enhanced it even more and put on its top its harem and its Turkish bath, improving radically the rooms of the castle. On the arched gate of entrance, on the wall, you can see the winged lion of Agios Markos, the name &ldquo;ANTONIO BERVASS 1764&rdquo;, emblems of Ali Pasha, two-headed eagles and relative inscriptions. Archways, gun emplacement rooms, supplies lodges, strong bastions with gun safe boxes, safe boxes of small arms, secret passage to the sea, barracks, jails, warehouses and two block-houses at the last defense line: prove the perfection of the defense plan, which along with the natural fortification made the fortress unconquered.</p>', '8', '63', '2015-08-11', 'published', '', 5),
(67, '../../Photos/anthousa-castle.jpg', 'Castle of Anthousa ', '<p>The castle of Anthousa built by Ali Pasha in order to siege Parga.</p>', '', '8', '63', '2015-08-11', 'published', '', 5),
(68, '../../Photos/souli-castle.jpg', 'Souli Castle', '<p>The castle was built by Ali Pasha after his victory against the heroic fighters of Souli.</p>', '', '8', '63', '2015-08-11', 'published', '', 18),
(69, '../../Photos/paramythia-castle.jpg', 'Paramythia Castle', '<p>Castle St. Donatos or Paramythia''s castle built by Justinian in the 6th century</p>', '', '8', '63', '2015-08-11', 'published', '', 18);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `vat` double NOT NULL,
  `author` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `status` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `att_1` int(11) NOT NULL,
  `att_2` int(11) NOT NULL,
  `att_3` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `stories`
--

INSERT INTO `stories` (`id`, `title`, `description`, `body`) VALUES
(1, 'Classic Ancient Greece', 'Classic Ancient GreeceClassic Ancient GreeceClassic Ancient Greece', '<p>Classic Ancient GreeceClassic Ancient GreeceClassic Ancient Greece</p> <img src=''Photos/12166465_10206235205293247_1309411805_n.jpg'' alt=''athens'' />');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `type` varchar(200) CHARACTER SET latin1 NOT NULL,
  `size` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','regular') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'regular'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`ID`, `First_Name`, `Last_Name`, `username`, `Email`, `password`, `role`) VALUES
(8, 'Ανέστης', 'Σταμάτης', 'admin', 'cactuserp@gmail.com', 'c0d58eff88302ba59864f1fe8b9fef6dc0ecb1b8', 'admin'),
(9, '', '', 'anestis', '', '952266ca89d5b114453f5193d4ea8466f0bbdd66', 'admin'),
(10, '', '', 'federation', '', '2e107f07b9954ee77b80325dff6a5a0339f050d9', 'admin');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `xmlproducts`
--

CREATE TABLE IF NOT EXISTS `xmlproducts` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPTION` text COLLATE utf8_unicode_ci NOT NULL,
  `IMAGE` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `CATEGORY` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2147483648 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `attdetails`
--
ALTER TABLE `attdetails`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `bcategories`
--
ALTER TABLE `bcategories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `bposts`
--
ALTER TABLE `bposts`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `cattributes`
--
ALTER TABLE `cattributes`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `gcategories`
--
ALTER TABLE `gcategories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `mcategories`
--
ALTER TABLE `mcategories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `pagems`
--
ALTER TABLE `pagems`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `pcategories`
--
ALTER TABLE `pcategories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `pdfs`
--
ALTER TABLE `pdfs`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `xmlproducts`
--
ALTER TABLE `xmlproducts`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `attdetails`
--
ALTER TABLE `attdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT για πίνακα `bcategories`
--
ALTER TABLE `bcategories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT για πίνακα `bposts`
--
ALTER TABLE `bposts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT για πίνακα `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT για πίνακα `cattributes`
--
ALTER TABLE `cattributes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT για πίνακα `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT για πίνακα `details`
--
ALTER TABLE `details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT για πίνακα `galleries`
--
ALTER TABLE `galleries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT για πίνακα `gcategories`
--
ALTER TABLE `gcategories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT για πίνακα `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `mcategories`
--
ALTER TABLE `mcategories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT για πίνακα `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT για πίνακα `pagems`
--
ALTER TABLE `pagems`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT για πίνακα `pcategories`
--
ALTER TABLE `pcategories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT για πίνακα `pdfs`
--
ALTER TABLE `pdfs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT για πίνακα `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=276;
--
-- AUTO_INCREMENT για πίνακα `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT για πίνακα `xmlproducts`
--
ALTER TABLE `xmlproducts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2147483648;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
