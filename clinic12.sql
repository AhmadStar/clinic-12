-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2018 at 05:52 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinic12`
--
CREATE DATABASE IF NOT EXISTS `clinic12` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clinic12`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_doctor_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `spressur` int(11) NOT NULL,
  `ppressure` int(11) NOT NULL,
  `hrate` int(11) NOT NULL,
  `heate` int(11) NOT NULL,
  `oxidation` int(11) NOT NULL,
  `nbreathing` int(11) NOT NULL,
  `comment_type` smallint(6) NOT NULL DEFAULT '1' COMMENT 'for future use, 1 is default',
  `create_date` int(11) NOT NULL,
  `last_edit_time` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `patient_doctor_id` (`patient_doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `patient_doctor_id`, `comment`, `spressur`, `ppressure`, `hrate`, `heate`, `oxidation`, `nbreathing`, `comment_type`, `create_date`, `last_edit_time`) VALUES
(1, 15, 'dsadas d', 0, 0, 0, 0, 0, 0, 1, 1539206086, 1539206086),
(2, 15, 'ملاحظة تانية', 0, 0, 0, 0, 0, 0, 1, 1539206100, 1539206100),
(3, 4, 'هاذ تعليق من الطبيب', 0, 0, 0, 0, 0, 0, 1, 1539239993, 1539239993),
(4, 13, 'ystyidtyi', 0, 0, 0, 0, 0, 0, 1, 1539246131, 1539246131),
(5, 1, 'Test', 0, 0, 0, 0, 0, 0, 1, 1539264097, 1539264097),
(6, 1, 'asd', 0, 0, 0, 0, 0, 0, 1, 1539297053, 1539297053),
(7, 18, 'التشخيص التهاب قصبات', 0, 0, 0, 0, 0, 0, 1, 1539344838, 1539344838),
(8, 5, 'kjl', 0, 0, 0, 0, 0, 0, 1, 1539358706, 1539358706),
(9, 5, 'kjl', 0, 0, 0, 0, 0, 0, 1, 1539358707, 1539358707),
(10, 5, 'kjl', 0, 0, 0, 0, 0, 0, 1, 1539358707, 1539358707),
(11, 7, 'dsas', 0, 0, 0, 0, 0, 0, 1, 1539469571, 1539469571),
(12, 5, 'dsa', 0, 0, 0, 0, 0, 0, 1, 1539782613, 1539782613),
(13, 20, 'csada', 0, 0, 0, 0, 0, 0, 1, 1539784367, 1539784367),
(14, 13, 'dasdas', 0, 0, 0, 0, 0, 0, 1, 1539784566, 1539784566),
(15, 10, 'بسيبسي', 0, 0, 0, 0, 0, 0, 1, 1539784856, 1539784856),
(16, 20, 'test', 120, 60, 0, 0, 0, 0, 1, 1539786498, 1539786498),
(17, 20, 'test', 120, 80, 0, 0, 0, 0, 1, 1539786521, 1539786521),
(18, 20, 'test 120', 120, 80, 0, 0, 0, 0, 1, 1539786695, 1539786695),
(19, 20, 'test harte rate', 120, 80, 85, 0, 0, 0, 1, 1539787328, 1539787328),
(20, 20, 'heate dasdkjh sadkjsda', 120, 80, 70, 37, 0, 0, 1, 1539787552, 1539787552),
(21, 20, 'oxidation', 100, 0, 60, 33, 17, 0, 1, 1539788244, 1539788244),
(22, 20, 'nbreathing', 120, 80, 60, 37, 99, 12, 1, 1539788395, 1539788395),
(23, 16, 'اختبار', 140, 90, 60, 38, 99, 14, 1, 1539790794, 1539790794),
(24, 0, 'dasd', 3, 4, 5, 6, 7, 8, 1, 1539794233, 1539794233),
(25, 0, 'Test', 1, 2, 3, 4, 5, 6, 1, 1539794346, 1539794346),
(26, 19, 'تعليق', 9, 8, 7, 6, 5, 4, 1, 1539794899, 1539794899),
(27, 19, 'تعليق اخيرااا', 1, 2, 3, 4, 5, 6, 1, 1539795117, 1539795117),
(28, 19, 'dashdkj ahsdkja hskjdhak jsdhkjas hdkjahskdjhaskj dhkjshdkjas hdkjahdkjashdkjh', 1, 1, 2, 1, 1, 1, 1, 1539796891, 1539796891),
(29, 6, 'تعليق', 2, 5, 5, 5, 5, 5, 1, 1539812246, 1539812246),
(30, 20, 'هذ تعليق', 120, 80, 60, 38, 95, 12, 1, 1539863147, 1539863147),
(31, 1, 'شس', 1, 1, 1, 1, 1, 1, 1, 1540170719, 1540170719),
(32, 12, 'هذا تعليق من الطبيب', 120, 80, 11, 88, 31, 312, 1, 1540220941, 1540220941),
(33, 21, 'تعليق الطبيب', 120, 80, 60, 38, 95, 12, 1, 1540310378, 1540310378),
(34, 1, 'هذا تعليق من الطبيب .. هنا نضع تعليق الطبيب ....هنا نضع تعليق الطبيب', 120, 80, 60, 38, 97, 12, 1, 1540572053, 1540572053),
(35, 1, '', 1, 2, 2, 2, 2, 2, 1, 1540639654, 1540639654),
(36, 1, '', 0, 0, 0, 0, 0, 0, 1, 1540639737, 1540639737),
(37, 1, '', 0, 0, 0, 0, 0, 0, 1, 1540639742, 1540639742);

-- --------------------------------------------------------

--
-- Table structure for table `consumes`
--

CREATE TABLE IF NOT EXISTS `consumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `consumes`
--

INSERT INTO `consumes` (`id`, `name`, `count`, `doctor_id`, `date`, `price`) VALUES
(12, 'بسيب يس', 11, 5, '2018-10-13', 11);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `FirstName`, `LastName`, `phone`, `address`, `city`, `country`) VALUES
(1, 'Carine ', 'Schmitt', '40.32.2555', '54, rue Royale', 'Nantes', 'France'),
(2, 'Jean', 'King', '7025551838', '8489 Strong St.', 'Las Vegas', 'USA'),
(3, 'Peter', 'Ferguson', '03 9520 4555', '636 St Kilda Road', 'Melbourne', 'Australia'),
(4, 'Janine ', 'Labrune', '40.67.8555', '67, rue des Cinquante Otages', 'Nantes', 'France'),
(5, 'Jonas ', 'Bergulfsen', '07-98 9555', 'Erling Skakkes gate 78', 'Stavern', 'Norway'),
(6, 'Susan', 'Nelson', '4155551450', '5677 Strong St.', 'San Rafael', 'USA'),
(7, 'Zbyszek ', 'Piestrzeniewicz', '(26) 642-7555', 'ul. Filtrowa 68', 'Warszawa', 'Poland'),
(8, 'Roland', 'Keitel', '+49 69 66 90 2555', 'Lyonerstr. 34', 'Frankfurt', 'Germany'),
(9, 'Julie', 'Murphy', '6505555787', '5557 North Pendale Street', 'San Francisco', 'USA'),
(10, 'Kwai', 'Lee', '2125557818', '897 Long Airport Avenue', 'NYC', 'USA'),
(11, 'Diego ', 'Freyre', '(91) 555 94 44', 'C/ Moralzarzal, 86', 'Madrid', 'Spain'),
(12, 'Christina ', 'Berglund', '0921-12 3555', 'Berguvsvägen  8', 'Luleå', 'Sweden'),
(13, 'Jytte ', 'Petersen', '31 12 3555', 'Vinbæltet 34', 'Kobenhavn', 'Denmark'),
(14, 'Mary ', 'Saveley', '78.32.5555', '2, rue du Commerce', 'Lyon', 'France'),
(15, 'Eric', 'Natividad', '+65 221 7555', 'Bronz Sok.', 'Singapore', 'Singapore'),
(16, 'Jeff', 'Young', '2125557413', '4092 Furth Circle', 'NYC', 'USA'),
(17, 'Kelvin', 'Leong', '2155551555', '7586 Pompton St.', 'Allentown', 'USA'),
(18, 'Juri', 'Hashimoto', '6505556809', '9408 Furth Circle', 'Burlingame', 'USA'),
(19, 'Wendy', 'Victorino', '+65 224 1555', '106 Linden Road Sandown', 'Singapore', 'Singapore'),
(20, 'Veysel', 'Oeztan', '+47 2267 3215', 'Brehmen St. 121', 'Bergen', 'Norway  '),
(21, 'Keith', 'Franco', '2035557845', '149 Spinnaker Dr.', 'New Haven', 'USA'),
(22, 'Isabel ', 'de Castro', '(1) 356-5555', 'Estrada da saúde n. 58', 'Lisboa', 'Portugal'),
(23, 'Martine ', 'Rancé', '20.16.1555', '184, chaussée de Tournai', 'Lille', 'France'),
(24, 'Marie', 'Bertrand', '(1) 42.34.2555', '265, boulevard Charonne', 'Paris', 'France'),
(25, 'Jerry', 'Tseng', '6175555555', '4658 Baden Av.', 'Cambridge', 'USA'),
(26, 'Julie', 'King', '2035552570', '25593 South Bay Ln.', 'Bridgewater', 'USA'),
(27, 'Mory', 'Kentary', '+81 06 6342 5555', '1-6-20 Dojima', 'Kita-ku', 'Japan'),
(28, 'Michael', 'Frick', '2125551500', '2678 Kingston Rd.', 'NYC', 'USA'),
(29, 'Matti', 'Karttunen', '90-224 8555', 'Keskuskatu 45', 'Helsinki', 'Finland'),
(30, 'Rachel', 'Ashworth', '(171) 555-1555', 'Fauntleroy Circus', 'Manchester', 'UK'),
(31, 'Dean', 'Cassidy', '+353 1862 1555', '25 Maiden Lane', 'Dublin', 'Ireland'),
(32, 'Leslie', 'Taylor', '6175558428', '16780 Pompton St.', 'Brickhaven', 'USA'),
(33, 'Elizabeth', 'Devon', '(171) 555-2282', '12, Berkeley Gardens Blvd', 'Liverpool', 'UK'),
(34, 'Yoshi ', 'Tamuri', '(604) 555-3392', '1900 Oak St.', 'Vancouver', 'Canada'),
(35, 'Miguel', 'Barajas', '6175557555', '7635 Spinnaker Dr.', 'Brickhaven', 'USA'),
(36, 'Julie', 'Young', '6265557265', '78934 Hillside Dr.', 'Pasadena', 'USA'),
(37, 'Brydey', 'Walker', '+612 9411 1555', 'Suntec Tower Three', 'Singapore', 'Singapore'),
(38, 'Frédérique ', 'Citeaux', '88.60.1555', '24, place Kléber', 'Strasbourg', 'France'),
(39, 'Mike', 'Gao', '+852 2251 1555', 'Bank of China Tower', 'Central Hong Kong', 'Hong Kong'),
(40, 'Eduardo ', 'Saavedra', '(93) 203 4555', 'Rambla de Cataluña, 23', 'Barcelona', 'Spain'),
(41, 'Mary', 'Young', '3105552373', '4097 Douglas Av.', 'Glendale', 'USA'),
(42, 'Horst ', 'Kloss', '0372-555188', 'Taucherstraße 10', 'Cunewalde', 'Germany'),
(43, 'Palle', 'Ibsen', '86 21 3555', 'Smagsloget 45', 'Århus', 'Denmark'),
(44, 'Jean ', 'Fresnière', '(514) 555-8054', '43 rue St. Laurent', 'Montréal', 'Canada'),
(45, 'Alejandra ', 'Camino', '(91) 745 6555', 'Gran Vía, 1', 'Madrid', 'Spain'),
(46, 'Valarie', 'Thompson', '7605558146', '361 Furth Circle', 'San Diego', 'USA'),
(47, 'Helen ', 'Bennett', '(198) 555-8888', 'Garden House', 'Cowes', 'UK'),
(48, 'Annette ', 'Roulet', '61.77.6555', '1 rue Alsace-Lorraine', 'Toulouse', 'France'),
(49, 'Renate ', 'Messner', '069-0555984', 'Magazinweg 7', 'Frankfurt', 'Germany'),
(50, 'Paolo ', 'Accorti', '011-4988555', 'Via Monte Bianco 34', 'Torino', 'Italy'),
(51, 'Daniel', 'Da Silva', '+33 1 46 62 7555', '27 rue du Colonel Pierre Avia', 'Paris', 'France'),
(52, 'Daniel ', 'Tonini', '30.59.8555', '67, avenue de l''Europe', 'Versailles', 'France'),
(53, 'Henriette ', 'Pfalzheim', '0221-5554327', 'Mehrheimerstr. 369', 'Köln', 'Germany'),
(54, 'Elizabeth ', 'Lincoln', '(604) 555-4555', '23 Tsawassen Blvd.', 'Tsawassen', 'Canada'),
(55, 'Peter ', 'Franken', '089-0877555', 'Berliner Platz 43', 'München', 'Germany'),
(56, 'Anna', 'O''Hara', '02 9936 8555', '201 Miller Street', 'North Sydney', 'Australia'),
(57, 'Giovanni ', 'Rovelli', '035-640555', 'Via Ludovico il Moro 22', 'Bergamo', 'Italy'),
(58, 'Adrian', 'Huxley', '+61 2 9495 8555', 'Monitor Money Building', 'Chatswood', 'Australia'),
(59, 'Marta', 'Hernandez', '6175558555', '39323 Spinnaker Dr.', 'Cambridge', 'USA'),
(60, 'Ed', 'Harrison', '+41 26 425 50 01', 'Rte des Arsenaux 41 ', 'Fribourg', 'Switzerland'),
(61, 'Mihael', 'Holz', '0897-034555', 'Grenzacherweg 237', 'Genève', 'Switzerland'),
(62, 'Jan', 'Klaeboe', '+47 2212 1555', 'Drammensveien 126A', 'Oslo', 'Norway  '),
(63, 'Bradley', 'Schuyler', '+31 20 491 9555', 'Kingsfordweg 151', 'Amsterdam', 'Netherlands'),
(64, 'Mel', 'Andersen', '030-0074555', 'Obere Str. 57', 'Berlin', 'Germany'),
(65, 'Pirkko', 'Koskitalo', '981-443655', 'Torikatu 38', 'Oulu', 'Finland'),
(66, 'Catherine ', 'Dewey', '(02) 5554 67', 'Rue Joseph-Bens 532', 'Bruxelles', 'Belgium'),
(67, 'Steve', 'Frick', '9145554562', '3758 North Pendale Street', 'White Plains', 'USA'),
(68, 'Wing', 'Huang', '5085559555', '4575 Hillside Dr.', 'New Bedford', 'USA'),
(69, 'Julie', 'Brown', '6505551386', '7734 Strong St.', 'San Francisco', 'USA'),
(70, 'Mike', 'Graham', '+64 9 312 5555', '162-164 Grafton Road', 'Auckland  ', 'New Zealand'),
(71, 'Ann ', 'Brown', '(171) 555-0297', '35 King George', 'London', 'UK'),
(72, 'William', 'Brown', '2015559350', '7476 Moss Rd.', 'Newark', 'USA'),
(73, 'Ben', 'Calaghan', '61-7-3844-6555', '31 Duncan St. West End', 'South Brisbane', 'Australia'),
(74, 'Kalle', 'Suominen', '+358 9 8045 555', 'Software Engineering Center', 'Espoo', 'Finland'),
(75, 'Philip ', 'Cramer', '0555-09555', 'Maubelstr. 90', 'Brandenburg', 'Germany'),
(76, 'Francisca', 'Cervantes', '2155554695', '782 First Street', 'Philadelphia', 'USA'),
(77, 'Jesus', 'Fernandez', '+34 913 728 555', 'Merchants House', 'Madrid', 'Spain'),
(78, 'Brian', 'Chandler', '2155554369', '6047 Douglas Av.', 'Los Angeles', 'USA'),
(79, 'Patricia ', 'McKenna', '2967 555', '8 Johnstown Road', 'Cork', 'Ireland'),
(80, 'Laurence ', 'Lebihan', '91.24.4555', '12, rue des Bouchers', 'Marseille', 'France'),
(81, 'Paul ', 'Henriot', '26.47.1555', '59 rue de l''Abbaye', 'Reims', 'France'),
(82, 'Armand', 'Kuger', '+27 21 550 3555', '1250 Pretorius Street', 'Hatfield', 'South Africa'),
(83, 'Wales', 'MacKinlay', '64-9-3763555', '199 Great North Road', 'Auckland', 'New Zealand'),
(84, 'Karin', 'Josephs', '0251-555259', 'Luisenstr. 48', 'Münster', 'Germany'),
(85, 'Juri', 'Yoshido', '6175559555', '8616 Spinnaker Dr.', 'Boston', 'USA'),
(86, 'Dorothy', 'Young', '6035558647', '2304 Long Airport Avenue', 'Nashua', 'USA'),
(87, 'Lino ', 'Rodriguez', '(1) 354-2555', 'Jardim das rosas n. 32', 'Lisboa', 'Portugal'),
(88, 'Braun', 'Urs', '0452-076555', 'Hauptstr. 29', 'Bern', 'Switzerland'),
(89, 'Allen', 'Nelson', '6175558555', '7825 Douglas Av.', 'Brickhaven', 'USA'),
(90, 'Pascale ', 'Cartrain', '(071) 23 67 2555', 'Boulevard Tirou, 255', 'Charleroi', 'Belgium'),
(91, 'Georg ', 'Pipps', '6562-9555', 'Geislweg 14', 'Salzburg', 'Austria'),
(92, 'Arnold', 'Cruz', '+63 2 555 3587', '15 McCallum Street', 'Makati City', 'Philippines'),
(93, 'Maurizio ', 'Moroni', '0522-556555', 'Strada Provinciale 124', 'Reggio Emilia', 'Italy'),
(94, 'Akiko', 'Shimamura', '+81 3 3584 0555', '2-2-8 Roppongi', 'Minato-ku', 'Japan'),
(95, 'Dominique', 'Perrier', '(1) 47.55.6555', '25, rue Lauriston', 'Paris', 'France'),
(96, 'Rita ', 'Müller', '0711-555361', 'Adenauerallee 900', 'Stuttgart', 'Germany'),
(97, 'Sarah', 'McRoy', '04 499 9555', '101 Lambton Quay', 'Wellington', 'New Zealand'),
(98, 'Michael', 'Donnermeyer', ' +49 89 61 08 9555', 'Hansastr. 15', 'Munich', 'Germany'),
(99, 'Maria', 'Hernandez', '2125558493', '5905 Pompton St.', 'NYC', 'USA'),
(100, 'Alexander ', 'Feuer', '0342-555176', 'Heerstr. 22', 'Leipzig', 'Germany'),
(101, 'Dan', 'Lewis', '2035554407', '2440 Pompton St.', 'Glendale', 'USA'),
(102, 'Martha', 'Larsson', '0695-34 6555', 'Åkergatan 24', 'Bräcke', 'Sweden'),
(103, 'Sue', 'Frick', '4085553659', '3086 Ingle Ln.', 'San Jose', 'USA'),
(104, 'Roland ', 'Mendel', '7675-3555', 'Kirchgasse 6', 'Graz', 'Austria'),
(105, 'Leslie', 'Murphy', '2035559545', '567 North Pendale Street', 'New Haven', 'USA'),
(106, 'Yu', 'Choi', '2125551957', '5290 North Pendale Street', 'NYC', 'USA'),
(107, 'Martín ', 'Sommer', '(91) 555 22 82', 'C/ Araquil, 67', 'Madrid', 'Spain'),
(108, 'Sven ', 'Ottlieb', '0241-039123', 'Walserweg 21', 'Aachen', 'Germany'),
(109, 'Violeta', 'Benitez', '5085552555', '1785 First Street', 'New Bedford', 'USA'),
(110, 'Carmen', 'Anton', '+34 913 728555', 'c/ Gobelas, 19-1 Urb. La Florida', 'Madrid', 'Spain'),
(111, 'Sean', 'Clenahan', '61-9-3844-6555', '7 Allen Street', 'Glen Waverly', 'Australia'),
(112, 'Franco', 'Ricotti', '+39 022515555', '20093 Cologno Monzese', 'Milan', 'Italy'),
(113, 'Steve', 'Thompson', '3105553722', '3675 Furth Circle', 'Burbank', 'USA'),
(114, 'Hanna ', 'Moos', '0621-08555', 'Forsterstr. 57', 'Mannheim', 'Germany'),
(115, 'Alexander ', 'Semenov', '+7 812 293 0521', '2 Pobedy Square', 'Saint Petersburg', 'Russia'),
(116, 'Raanan', 'Altagar,G M', '+ 972 9 959 8555', '3 Hagalim Blv.', 'Herzlia', 'Israel'),
(117, 'José Pedro ', 'Roel', '(95) 555 82 82', 'C/ Romero, 33', 'Sevilla', 'Spain'),
(118, 'Rosa', 'Salazar', '2155559857', '11328 Douglas Av.', 'Philadelphia', 'USA'),
(119, 'Sue', 'Taylor', '4155554312', '2793 Furth Circle', 'Brisbane', 'USA'),
(120, 'Thomas ', 'Smith', '(171) 555-7555', '120 Hanover Sq.', 'London', 'UK'),
(121, 'Valarie', 'Franco', '6175552555', '6251 Ingle Ln.', 'Boston', 'USA'),
(122, 'Tony', 'Snowden', '+64 9 5555500', 'Arenales 1938 3''A''', 'Auckland  ', 'New Zealand');

-- --------------------------------------------------------

--
-- Table structure for table `dailyincome`
--

CREATE TABLE IF NOT EXISTS `dailyincome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dailyincome`
--

INSERT INTO `dailyincome` (`id`, `doctor_id`, `date`, `amount`) VALUES
(1, 4, '2018-10-12', 1000),
(2, 5, '2018-10-06', 99),
(3, 4, '2018-10-23', 2000),
(5, 5, '2018-09-30', 1000),
(6, 5, '2018-09-30', 1000),
(7, 7, '2018-09-30', 2000),
(8, 6, '2018-10-28', 3000),
(9, 5, '2018-10-21', 3000),
(10, 4, '2019-01-29', 2000),
(11, 5, '2018-09-29', 3000),
(12, 7, '2018-09-29', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE IF NOT EXISTS `diagnoses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnose_name_en` mediumtext NOT NULL,
  `diagnose_name_ar` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `diagnose_name_en`, `diagnose_name_ar`, `description`) VALUES
(7, 'Diagnose', 'تشخيص', 'هنا نضع وصف التشخيص'),
(8, 'VXS', 'تشخيص', 'وصف التشخيص'),
(9, 'VDT', 'في دي تي', 'وصف التشخيص.'),
(10, 'das d', 'dsa d', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `diagnose_patient`
--

CREATE TABLE IF NOT EXISTS `diagnose_patient` (
  `diagnose_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnose_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id_assign` int(11) NOT NULL,
  `assign_date` int(11) NOT NULL,
  `no_of_item` int(11) DEFAULT NULL,
  `result` text NOT NULL,
  `total_cost` decimal(10,0) DEFAULT NULL,
  `user_id_discharge` int(11) DEFAULT NULL,
  `discharge_date` int(11) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`diagnose_patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `diagnose_patient`
--

INSERT INTO `diagnose_patient` (`diagnose_patient_id`, `diagnose_id`, `patient_id`, `user_id_assign`, `assign_date`, `no_of_item`, `result`, `total_cost`, `user_id_discharge`, `discharge_date`, `memo`) VALUES
(1, 7, 1, 1, 1540215385, 22, 'rrrr', '0', NULL, NULL, 'mmm'),
(2, 7, 1, 1, 1540215546, 99, '99', '0', NULL, NULL, '99'),
(3, 8, 1, 1, 1540215603, 1, '1', '0', NULL, NULL, '1'),
(4, 7, 1, 1, 1540217458, NULL, '1', NULL, NULL, NULL, NULL),
(5, 7, 2, 1, 1540220564, NULL, '1', NULL, NULL, NULL, NULL),
(6, 7, 13, 1, 1540290871, NULL, '1', NULL, NULL, NULL, NULL),
(7, 8, 13, 1, 1540290897, NULL, '1', NULL, NULL, NULL, NULL),
(8, 8, 13, 1, 1540291005, NULL, '1', NULL, NULL, NULL, NULL),
(9, 7, 13, 1, 1540291011, NULL, '2', NULL, NULL, NULL, NULL),
(10, 9, 13, 1, 1540291039, NULL, '????? ???????', NULL, NULL, NULL, NULL),
(11, 7, 21, 1, 1540291271, NULL, '??? ?????? ?? ???????', NULL, NULL, NULL, NULL),
(12, 8, 6, 1, 1540292496, NULL, '???? ? ', NULL, NULL, NULL, NULL),
(13, 7, 1, 1, 1540563784, NULL, '??? ??? ?', NULL, NULL, NULL, NULL),
(14, 7, 1, 1, 1540563910, NULL, '??? ?? ????? ???????', NULL, NULL, NULL, NULL),
(15, 7, 1, 1, 1540571660, NULL, 'fsd fnsd,mfn s,dfn ,sdmffn, smdnf,msdn,f nsd,fm nsd,fmnsd ,mfsdn ,fmsdnf,m sdnf,msd nf,msdnf,sdmn f,smnf ,sdmnf ,msdnf,msd  fm,sdf ', NULL, NULL, NULL, NULL),
(16, 7, 19, 1, 1540572399, NULL, 'fsdm f sdf;l sdf.sd, .,sdm .,smdf. ,s', NULL, NULL, NULL, NULL),
(17, 7, 21, 1, 1540589252, NULL, 'fsdf sdf sd', NULL, NULL, NULL, NULL),
(18, 7, 21, 1, 1540589291, NULL, 'dasdas', NULL, NULL, NULL, NULL),
(19, 7, 2, 1, 1540648866, NULL, '???? ?? ?? ??? ', NULL, NULL, NULL, NULL),
(20, 7, 2, 1, 1540648894, NULL, 'dasdas', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `address`, `phone`, `created_date`) VALUES
(4, 'د.محمد شباط', 'التضامن', '0994364545', '2018-09-06'),
(5, 'د.نور شماس', 'دمشق', '0964536453', '2018-10-06'),
(6, 'د.ماهر ابو صعب', 'دمشق', '09434242342', '2018-10-06'),
(7, 'د.احمد ابو سرور', 'حلب', '09543534534', '2018-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE IF NOT EXISTS `drugs` (
  `drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_name_en` varchar(50) DEFAULT NULL,
  `drug_name_ar` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '0',
  `memo` text,
  PRIMARY KEY (`drug_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`drug_id`, `drug_name_en`, `drug_name_ar`, `category`, `price`, `num`, `memo`) VALUES
(5, 'Doplamin', 'دوبلامين', 'حبوب', '2000', 0, 'ملخص عن الدواء'),
(6, 'citamol', 'سيتامول', 'نوع الدواء', '101', 0, 'ملخص عن الدواء');

-- --------------------------------------------------------

--
-- Table structure for table `drug_patient`
--

CREATE TABLE IF NOT EXISTS `drug_patient` (
  `drug_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id_assign` int(11) NOT NULL,
  `assign_date` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) NOT NULL,
  `user_id_discharge` int(11) DEFAULT NULL,
  `discharge_date` int(11) DEFAULT NULL,
  `memo` text,
  PRIMARY KEY (`drug_patient_id`),
  KEY `drug_id` (`drug_id`),
  KEY `patient_id` (`patient_id`),
  KEY `user_id_assign` (`user_id_assign`),
  KEY `user_id_discharge` (`user_id_discharge`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `drug_patient`
--

INSERT INTO `drug_patient` (`drug_patient_id`, `drug_id`, `patient_id`, `user_id_assign`, `assign_date`, `no_of_item`, `total_cost`, `user_id_discharge`, `discharge_date`, `memo`) VALUES
(1, 5, 15, 1, 1539206177, 7, '14000', 1, 1539299334, ''),
(2, 5, 13, 1, 1539207378, 11, '22000', 1, 1539281061, ''),
(4, 5, 11, 1, 1539241975, 4, '8000', 1, 1539429309, ''),
(5, 5, 14, 1, 1539250386, 1, '2000', NULL, NULL, ''),
(6, 5, 15, 1, 1539263919, 1, '2000', 1, 1539299331, ''),
(7, 5, 15, 1, 1539263938, 33, '66000', 1, 1539299332, ''),
(8, 5, 13, 1, 1539281076, 1, '2000', NULL, NULL, ''),
(11, 5, 12, 1, 1539331889, 1, '2000', NULL, NULL, ''),
(12, 5, 18, 1, 1539344894, 1, '2000', NULL, NULL, ''),
(13, 5, 12, 1, 1539347945, 1, '2000', NULL, NULL, ''),
(14, 5, 12, 1, 1539347945, 1, '2000', NULL, NULL, ''),
(15, 5, 8, 1, 1539469592, 1, '2000', NULL, NULL, ''),
(16, 5, 13, 1, 1539784574, 1, '2000', NULL, NULL, ''),
(17, 5, 5, 1, 1539796260, 1, '2000', NULL, NULL, ''),
(18, 5, 20, 1, 1539807836, 1, '2000', NULL, NULL, ''),
(19, 5, 9, 1, 1539812254, 1, '2000', NULL, NULL, ''),
(20, 5, 20, 1, 1540036257, 1, '2000', NULL, NULL, ''),
(21, 5, 20, 1, 1540036331, 1, '2000', NULL, NULL, ''),
(22, 5, 20, 1, 1540036375, 99, '198000', NULL, NULL, ''),
(23, 5, 20, 1, 1540036401, 1, '2000', NULL, NULL, ''),
(24, 5, 20, 1, 1540036424, 1, '2000', NULL, NULL, ''),
(25, 5, 20, 1, 1540036726, 1, '2000', NULL, NULL, ''),
(26, 5, 20, 1, 1540036867, 1, '2000', NULL, NULL, ''),
(27, 5, 20, 1, 1540036924, 1, '2000', NULL, NULL, ''),
(28, 5, 19, 1, 1540052768, 1, '2000', NULL, NULL, ''),
(29, 5, 16, 1, 1540056965, 1, '2000', NULL, NULL, ''),
(30, 5, 1, 1, 1540201109, 1, '2000', NULL, NULL, ''),
(31, 5, 2, 1, 1540211047, 1, '2000', NULL, NULL, ''),
(32, 5, 21, 1, 1540292075, 10, '20000', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(48) NOT NULL,
  `description` text NOT NULL,
  `roles` bigint(20) unsigned NOT NULL DEFAULT '2',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `name`, `description`, `roles`) VALUES
(1, 'Administrator', '', 1),
(2, 'Guest', '', 2),
(3, 'Doctor', '', 4),
(4, 'X-Ray Agent', '', 8),
(5, 'Laboratory Agent', '', 16),
(6, 'Pharmacy Agent', '', 32),
(7, 'Receptionist', '', 64),
(8, 'Patient', '', 128),
(9, 'اختبار', 'هذه العملية عمليه اختبار', 4);

-- --------------------------------------------------------

--
-- Table structure for table `incentives`
--

CREATE TABLE IF NOT EXISTS `incentives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nurse_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `incentives`
--

INSERT INTO `incentives` (`id`, `nurse_id`, `amount`, `date`) VALUES
(1, 3, 99999, '0000-00-00'),
(2, 3, 2000, '0000-00-00'),
(3, 3, 2000, '0000-00-00'),
(4, 7, 2000, '0000-00-00'),
(5, 7, 3000, '0000-00-00'),
(6, 6, 4000, '2018-10-17'),
(7, 6, 2000, '2018-10-25'),
(8, 6, 3000, '2018-10-05'),
(9, 7, 3000, '0000-00-00'),
(10, 8, 3000, '0000-00-00'),
(11, 7, 2222, '0000-00-00'),
(12, 6, 3000, '2018-10-02'),
(13, 8, 1111, '0000-00-00'),
(14, 6, 1000, '2018-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE IF NOT EXISTS `incomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` enum('static','normal') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `doctor_id`, `patient_id`, `amount`, `date`, `type`) VALUES
(4, 6, 3, 1000, '2018-09-01', 'static'),
(5, 4, 4, 1000, '2018-09-05', 'normal'),
(6, 7, 2, 1000, '2018-09-01', 'normal'),
(9, 4, 3, 2000, '2018-09-01', 'static'),
(11, 7, 4, 2000, '2018-09-08', 'normal'),
(13, 5, 1, 1000, '2018-10-06', 'normal'),
(14, 5, 3, 4000, '2018-10-05', 'normal'),
(15, 5, 1, 1050, '2018-10-13', 'normal'),
(16, 5, 4, 4500, '2018-10-06', 'normal'),
(17, 4, 1, 1500, '2018-10-05', 'normal'),
(18, 5, 2, 1000, '2018-10-06', 'normal'),
(21, 5, 3, 1000, '2018-10-06', 'static'),
(22, 4, 4, 1000, '2018-10-06', 'normal'),
(23, 4, 1, 2000, '2018-10-06', 'normal'),
(24, 5, 2, 1000, '2018-10-06', 'static'),
(25, 5, 1, 3000, '2018-10-06', 'normal'),
(26, 4, 2, 2000, '2018-10-06', 'normal'),
(27, 5, 6, 1000, '2018-10-08', 'static'),
(28, 5, 1, 3000, '2018-10-08', 'normal'),
(29, 5, 2, 1500, '2018-10-08', 'normal'),
(30, 5, 7, 2000, '2018-10-08', 'normal'),
(31, 5, 4, 500, '2018-10-08', 'static'),
(32, 5, 1, 3000, '2018-10-06', 'normal'),
(33, 5, 6, 2000, '2018-10-06', 'normal'),
(34, 5, 0, 2000, '2018-10-05', 'static'),
(35, 5, 0, 3000, '2018-10-05', 'static'),
(36, 7, 0, 99, '2018-10-25', 'static');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name_en` varchar(50) DEFAULT NULL,
  `test_name_ar` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `memo` text,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`test_id`, `test_name_en`, `test_name_ar`, `category`, `price`, `memo`) VALUES
(6, 'Blood analysis', 'تحليل دم', 'نوع التحليل', '2001', 'ملخص عن التحليل'),
(7, 'cbc', 'تعداد عام وصيغة', '', '1400', ''),
(8, 'ASLO', 'ASL0', 'hem', '1000', ''),
(9, 'glocous', 'سكر', '', '1000', 'على الريق\nعشوائي'),
(10, 'PCR', 'بي سي ار', 'صنف التحليل', '1000', ''),
(11, 'Pcr test', 'بي سي ار', 'تحليل', '3000', '');

-- --------------------------------------------------------

--
-- Table structure for table `lab_files`
--

CREATE TABLE IF NOT EXISTS `lab_files` (
  `lab_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_patient_id` int(11) NOT NULL,
  `upload_date` int(11) NOT NULL,
  `path` text NOT NULL,
  `memo` text,
  PRIMARY KEY (`lab_file_id`),
  KEY `lab_patient_id` (`lab_patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lab_patient`
--

CREATE TABLE IF NOT EXISTS `lab_patient` (
  `lab_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `no_of_item` int(10) DEFAULT NULL,
  `user_id_assign` int(11) NOT NULL,
  `assign_date` int(11) NOT NULL,
  `total_cost` decimal(10,0) DEFAULT NULL,
  `user_id_discharge` int(11) DEFAULT NULL,
  `discharge_date` int(11) DEFAULT NULL,
  `memo` text,
  `result` text NOT NULL,
  PRIMARY KEY (`lab_patient_id`),
  KEY `test_id` (`test_id`),
  KEY `patient_id` (`patient_id`),
  KEY `user_id_assign` (`user_id_assign`),
  KEY `user_id_discharge` (`user_id_discharge`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `lab_patient`
--

INSERT INTO `lab_patient` (`lab_patient_id`, `test_id`, `patient_id`, `no_of_item`, `user_id_assign`, `assign_date`, `total_cost`, `user_id_discharge`, `discharge_date`, `memo`, `result`) VALUES
(3, 6, 13, 1, 1, 1539279677, '2000', NULL, NULL, '', '1'),
(4, 8, 13, 1, 1, 1539280212, '1000', 1, 1539280222, '', '1'),
(5, 6, 10, 1, 1, 1539297138, '2000', NULL, NULL, '', '1'),
(6, 7, 2, 1, 1, 1539299067, '1400', NULL, NULL, '', '1'),
(8, 7, 18, 1, 1, 1539345001, '1400', NULL, NULL, '', '1'),
(9, 8, 12, 1, 1, 1539347267, '1000', NULL, NULL, '', '1'),
(10, 9, 12, 1, 1, 1539347521, '1000', NULL, NULL, '', '1'),
(11, 8, 20, 1, 1, 1539784380, '1000', NULL, NULL, '', '1'),
(12, 7, 13, 1, 1, 1539784607, '1400', NULL, NULL, '', '1'),
(13, 6, 5, 1, 1, 1539784868, '2000', NULL, NULL, '', '1'),
(14, 6, 20, 1, 1, 1539802012, '1000', 1, 1540036183, '', '1'),
(15, 6, 20, 1, 1, 1539802049, '1000', NULL, NULL, '', '1'),
(16, 6, 20, 4, 1, 1539805250, '2000', 1, 1540036181, 'dasdasda', '1'),
(17, 6, 20, 99, 1, 1539805966, '198000', 1, 1540036181, '', '1'),
(18, 9, 20, 1, 1, 1539807329, '1000', NULL, NULL, '', '1'),
(19, 8, 20, 99, 1, 1539807353, '99000', 1, 1540036179, '', '1'),
(20, 6, 20, 1, 1, 1539808921, '2000', NULL, NULL, '', '1'),
(21, 8, 20, 1111, 1, 1539808954, '1111000', 1, 1540036175, '', '1'),
(22, 6, 19, 1, 1, 1539810208, '2000', 1, 1539810223, '', '1'),
(23, 7, 19, 1, 1, 1539810210, '1400', 1, 1539810224, '', '1'),
(24, 8, 19, 1, 1, 1539810212, '1000', 1, 1539810225, '', '1'),
(25, 7, 9, 1, 1, 1539812285, '1400', NULL, NULL, '', '1'),
(26, 7, 20, 1, 1, 1540036999, '1400', NULL, NULL, '', '1'),
(27, 6, 20, 1, 1, 1540037032, '2001', NULL, NULL, '', '1'),
(28, 6, 20, 1, 1, 1540038393, '2001', NULL, NULL, '', '33'),
(29, 6, 20, 1, 1, 1540039258, '2001', NULL, NULL, '', '99'),
(30, 6, 20, 1, 1, 1540039355, '2001', NULL, NULL, '', 'هنا نضع نتائج التحليل'),
(31, 6, 20, 1, 1, 1540039971, '2001', NULL, NULL, '', 'نتيجة تحليل الدم'),
(32, 6, 20, 1, 1, 1540040668, '2001', NULL, NULL, '', 'يسشيس'),
(33, 6, 20, 1, 1, 1540040813, '2001', NULL, NULL, '', 'يشسيشسي'),
(34, 6, 20, 1, 1, 1540041006, '2001', NULL, NULL, '', 'تشيانشتياشسنتي اشنست اينتششنسي شستيشس نتياشسن ياشسن ياشسنتياشسن تياشسنت اي'),
(35, 6, 20, 1, 1, 1540041207, '2001', NULL, NULL, '', ''),
(36, 7, 20, 1, 1, 1540041265, '1400', NULL, NULL, '', ''),
(37, 7, 19, 1, 1, 1540052793, '1400', 1, 1540052833, '', ''),
(38, 6, 19, 1, 1, 1540052813, '2001', 1, 1540052834, '', ''),
(39, 8, 19, 1, 1, 1540053386, '1000', NULL, NULL, '', 'النتائج المخبرية للتحليل'),
(40, 9, 19, 1, 1, 1540053549, '1000', NULL, NULL, '', ''),
(41, 7, 19, 1, 1, 1540053708, '1400', NULL, NULL, '', ''),
(42, 6, 19, 1, 1, 1540054649, '2001', NULL, NULL, '', ''),
(43, 7, 19, 1, 1, 1540054707, '1400', NULL, NULL, '', ''),
(44, 6, 19, 1, 1, 1540054998, '2001', NULL, NULL, '', ''),
(45, 6, 16, 1, 1, 1540056573, '2001', NULL, NULL, '', 'csdasd as '),
(46, 6, 15, 1, 1, 1540057570, '2001', NULL, NULL, '', 'يسشي شسي شسي'),
(47, 7, 15, 1, 1, 1540057574, '1400', NULL, NULL, '', 'يشسي شسي '),
(48, 6, 20, 1, 1, 1540149981, '2001', NULL, NULL, '', 'يشسيشس يشسي'),
(49, 9, 1, 1, 1, 1540201125, '1000', NULL, NULL, '', ''),
(50, 6, 2, NULL, 1, 1540220310, NULL, NULL, NULL, NULL, 'نتائج '),
(51, 6, 13, NULL, 1, 1540290915, NULL, NULL, NULL, NULL, 'نتيجة '),
(52, 6, 21, NULL, 1, 1540291464, NULL, NULL, NULL, NULL, 'نتيجة لتحليل المخبرية'),
(53, 6, 1, NULL, 1, 1540559144, NULL, NULL, NULL, NULL, 'hjghjh '),
(54, 6, 1, NULL, 1, 1540563626, NULL, NULL, NULL, NULL, 'هذه هي نتيجة التحليل ');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `login_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `success` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`login_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=245 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`login_id`, `ip_address`, `user_id`, `time`, `success`) VALUES
(1, 0, 1, '2018-09-19 15:00:21', 1),
(2, 0, 1, '2018-09-19 15:00:38', 1),
(3, 0, 1, '2018-09-19 16:45:28', 1),
(4, 0, 1, '2018-09-19 16:45:46', 1),
(5, 0, 1, '2018-09-19 18:45:48', 1),
(6, 0, 1, '2018-09-19 18:45:55', 1),
(7, 0, 1, '2018-09-20 05:05:01', 1),
(8, 0, 1, '2018-09-20 05:05:01', 1),
(9, 0, 2, '2018-09-20 05:05:53', 1),
(10, 0, 1, '2018-09-20 07:29:19', 1),
(11, 0, 2, '2018-09-20 07:34:16', 1),
(12, 0, 1, '2018-09-20 07:59:10', 1),
(13, 0, 1, '2018-09-20 09:16:01', 1),
(14, 0, 1, '2018-09-20 09:21:52', 1),
(15, 0, 1, '2018-09-24 13:09:37', 1),
(16, 0, 1, '2018-09-24 19:56:31', 1),
(17, 0, 1, '2018-09-25 13:28:32', 1),
(18, 0, 1, '2018-09-26 07:25:19', 1),
(19, 0, 2, '2018-09-26 07:31:12', 1),
(20, 0, 2, '2018-09-26 13:27:27', 1),
(21, 0, 2, '2018-09-26 13:27:27', 1),
(22, 0, 1, '2018-09-26 13:27:51', 1),
(23, 0, 1, '2018-09-26 14:01:31', 1),
(24, 0, 1, '2018-09-26 16:55:03', 1),
(25, 0, 1, '2018-09-27 18:50:09', 1),
(26, 0, 1, '2018-09-27 18:50:10', 0),
(27, 0, 1, '2018-09-27 18:50:23', 1),
(28, 0, 1, '2018-09-27 19:17:57', 1),
(29, 0, 1, '2018-09-28 09:16:41', 1),
(30, 0, 1, '2018-09-28 09:16:41', 1),
(31, 0, 1, '2018-09-28 09:45:38', 1),
(32, 0, 1, '2018-09-28 13:18:54', 1),
(33, 0, 1, '2018-09-28 15:26:07', 1),
(34, 0, 2, '2018-09-28 16:22:28', 1),
(35, 0, 1, '2018-09-28 16:23:50', 1),
(36, 0, 1, '2018-09-28 20:48:52', 1),
(37, 0, 1, '2018-09-29 04:21:28', 0),
(38, 0, 1, '2018-09-29 04:21:37', 1),
(39, 0, 1, '2018-09-29 04:36:52', 1),
(40, 0, 1, '2018-09-29 04:37:03', 1),
(41, 0, 1, '2018-09-29 05:30:00', 0),
(42, 0, 1, '2018-09-29 05:30:06', 1),
(43, 0, 1, '2018-09-29 05:49:40', 1),
(44, 0, 1, '2018-09-29 14:40:45', 1),
(45, 0, 1, '2018-09-29 17:48:30', 1),
(46, 0, 1, '2018-09-30 07:10:52', 1),
(47, 0, 1, '2018-09-30 07:10:52', 1),
(48, 0, 1, '2018-09-30 11:10:11', 1),
(49, 0, 1, '2018-09-30 14:11:32', 1),
(50, 1560104100, 1, '2018-10-01 02:01:19', 1),
(51, 1580140481, 1, '2018-10-01 02:03:11', 1),
(52, 1580140481, 1, '2018-10-01 02:16:12', 1),
(53, 3116200846, 1, '2018-10-01 03:41:16', 1),
(54, 1334724339, 1, '2018-10-01 15:42:04', 1),
(55, 1580140481, 1, '2018-10-01 16:07:36', 1),
(56, 1580140481, 1, '2018-10-01 16:40:39', 1),
(57, 1580141125, 1, '2018-10-01 19:29:17', 1),
(58, 1580140481, 1, '2018-10-01 21:01:17', 1),
(59, 1580140481, 1, '2018-10-01 23:49:23', 1),
(60, 1580140481, 1, '2018-10-02 00:28:58', 1),
(61, 1334724339, 1, '2018-10-02 02:28:50', 1),
(62, 1334724339, 1, '2018-10-02 02:32:28', 1),
(63, 1580140481, 2, '2018-10-02 04:48:54', 1),
(64, 1580140481, 1, '2018-10-02 04:49:52', 1),
(65, 1580140481, 1, '2018-10-02 09:24:19', 1),
(66, 83919838, 1, '2018-10-02 15:02:06', 1),
(67, 83919838, 1, '2018-10-02 18:06:35', 1),
(68, 83919838, 1, '2018-10-02 18:11:22', 1),
(69, 83919838, 1, '2018-10-02 19:58:48', 1),
(70, 83919838, 1, '2018-10-02 19:59:09', 1),
(71, 83919838, 1, '2018-10-02 23:53:15', 1),
(72, 83919838, 2, '2018-10-03 00:38:48', 1),
(73, 83919838, 1, '2018-10-03 00:39:37', 1),
(74, 83889942, 1, '2018-10-03 00:55:50', 1),
(75, 83919838, 1, '2018-10-03 01:53:52', 1),
(76, 83919838, 1, '2018-10-03 05:03:57', 1),
(77, 1296312357, 1, '2018-10-03 13:22:44', 1),
(78, 1296312357, 1, '2018-10-03 13:22:44', 1),
(79, 83919838, 1, '2018-10-03 13:54:00', 1),
(80, 83889942, 1, '2018-10-03 14:52:11', 1),
(81, 83892053, 1, '2018-10-03 19:33:35', 1),
(82, 83889942, 1, '2018-10-03 19:40:09', 1),
(83, 83892053, 1, '2018-10-03 20:15:30', 1),
(84, 83892053, 1, '2018-10-03 20:35:05', 1),
(85, 83892053, 1, '2018-10-03 21:27:01', 1),
(86, 83889139, 1, '2018-10-03 22:34:06', 1),
(87, 83889139, 1, '2018-10-03 23:21:16', 1),
(88, 83889139, 1, '2018-10-04 00:33:26', 1),
(89, 3573891083, 1, '2018-10-04 02:45:44', 1),
(90, 83889139, 1, '2018-10-04 04:58:16', 1),
(91, 2342702928, 1, '2018-10-04 10:10:39', 1),
(92, 83889139, 1, '2018-10-04 10:15:29', 1),
(93, 1580146387, 1, '2018-10-04 14:50:14', 1),
(94, 94082398, 1, '2018-10-04 21:14:19', 1),
(95, 3162840589, 1, '2018-10-05 00:41:12', 1),
(96, 3651148258, 1, '2018-10-05 04:12:53', 1),
(97, 3162840589, 1, '2018-10-05 05:08:29', 1),
(98, 3162840589, 1, '2018-10-05 06:12:35', 1),
(99, 3162840589, 1, '2018-10-05 14:45:18', 1),
(100, 83922309, 1, '2018-10-05 15:19:15', 1),
(101, 3162840589, 1, '2018-10-05 18:14:03', 1),
(102, 83922309, 1, '2018-10-05 18:36:29', 1),
(103, 83922309, 1, '2018-10-05 18:36:36', 1),
(104, 1580174492, 1, '2018-10-05 18:45:41', 1),
(105, 3162840589, 1, '2018-10-05 18:46:29', 1),
(106, 3162840589, 1, '2018-10-05 18:56:38', 1),
(107, 3162840589, 1, '2018-10-05 18:57:18', 1),
(108, 1580145601, 1, '2018-10-05 19:26:27', 1),
(109, 83922309, 1, '2018-10-05 23:03:38', 1),
(110, 1580174492, 1, '2018-10-05 23:41:12', 1),
(111, 3162840589, 1, '2018-10-06 02:34:03', 1),
(112, 3162840589, 1, '2018-10-06 02:34:04', 0),
(113, 3162840589, 1, '2018-10-06 02:34:09', 1),
(114, 3162840589, 1, '2018-10-06 06:17:45', 1),
(115, 1760396232, 1, '2018-10-06 10:02:47', 1),
(116, 83923930, 1, '2018-10-06 14:31:43', 1),
(117, 83923930, 1, '2018-10-06 14:56:02', 1),
(118, 83923930, 1, '2018-10-06 14:56:12', 1),
(119, 1760396232, 1, '2018-10-06 15:35:25', 1),
(120, 83923385, 1, '2018-10-06 16:19:26', 1),
(121, 83923930, 1, '2018-10-06 21:44:15', 1),
(122, 1760396232, 1, '2018-10-06 21:53:01', 1),
(123, 1580174492, 1, '2018-10-07 01:11:55', 1),
(124, 83923930, 1, '2018-10-07 04:57:59', 1),
(125, 83923930, 1, '2018-10-07 14:48:35', 1),
(126, 1580142585, 1, '2018-10-07 15:19:06', 1),
(127, 1580142585, 1, '2018-10-07 16:38:37', 1),
(128, 83923385, 1, '2018-10-07 20:56:21', 1),
(129, 83890660, 1, '2018-10-07 21:10:11', 1),
(130, 83890660, 1, '2018-10-07 21:17:33', 1),
(131, 83890660, 1, '2018-10-07 21:30:56', 1),
(132, 83890660, 1, '2018-10-07 21:40:30', 1),
(133, 83890660, 1, '2018-10-07 22:07:36', 1),
(134, 1760396232, 1, '2018-10-07 23:32:38', 1),
(135, 83890660, 1, '2018-10-07 23:49:12', 1),
(136, 83890660, 1, '2018-10-08 02:13:03', 1),
(137, 83890660, 1, '2018-10-08 04:03:38', 1),
(138, 83890660, 1, '2018-10-08 05:17:00', 1),
(139, 1580142920, 1, '2018-10-08 10:13:40', 1),
(140, 83890660, 1, '2018-10-08 14:09:52', 1),
(141, 1580142920, 1, '2018-10-08 14:16:53', 1),
(142, 1760396232, 1, '2018-10-08 14:18:06', 1),
(143, 83890660, 1, '2018-10-08 15:06:42', 1),
(144, 1760396232, 1, '2018-10-08 17:22:39', 1),
(145, 83923213, 1, '2018-10-08 17:23:04', 1),
(146, 83923213, 3, '2018-10-08 17:32:04', 1),
(147, 83923213, 1, '2018-10-08 17:32:57', 1),
(148, 3104379795, 1, '2018-10-08 19:30:39', 1),
(149, 3104379795, 1, '2018-10-08 19:37:05', 1),
(150, 3104379795, 1, '2018-10-08 19:37:59', 1),
(151, 3104379795, 1, '2018-10-08 19:42:18', 1),
(152, 1384761388, 1, '2018-10-08 22:55:57', 1),
(153, 3584806276, 1, '2018-10-08 23:20:37', 1),
(154, 1843673519, 1, '2018-10-08 23:35:32', 1),
(155, 3584806276, 1, '2018-10-08 23:41:54', 1),
(156, 3584806276, 1, '2018-10-08 23:45:30', 1),
(157, 1580142061, 1, '2018-10-08 23:50:02', 1),
(158, 1843673519, 1, '2018-10-09 02:56:49', 1),
(159, 94050898, 1, '2018-10-09 03:07:10', 1),
(160, 1384761388, 1, '2018-10-09 12:40:41', 1),
(161, 1384761402, 1, '2018-10-09 13:13:00', 1),
(162, 520719198, 1, '2018-10-09 15:14:49', 1),
(163, 1384761382, 1, '2018-10-09 17:01:45', 1),
(164, 520719198, 1, '2018-10-09 18:08:44', 1),
(165, 1384761402, 1, '2018-10-09 21:34:22', 1),
(166, 1384761382, 1, '2018-10-10 01:50:19', 1),
(167, 520722647, 1, '2018-10-10 09:35:40', 1),
(168, 83924595, 1, '2018-10-10 16:45:35', 1),
(169, 83924595, 1, '2018-10-10 17:09:11', 1),
(170, 520719198, 1, '2018-10-10 19:20:33', 1),
(171, 1580139967, 1, '2018-10-10 20:15:02', 1),
(172, 83924595, 1, '2018-10-11 01:44:07', 1),
(173, 83924595, 1, '2018-10-11 13:05:25', 1),
(174, 1580139967, 1, '2018-10-11 15:21:26', 1),
(175, 83892004, 1, '2018-10-11 20:16:10', 1),
(176, 83924595, 1, '2018-10-11 21:29:59', 1),
(177, 758675296, 1, '2018-10-12 10:09:34', 1),
(178, 1439464630, 1, '2018-10-12 11:39:15', 1),
(179, 1580144641, 1, '2018-10-12 11:53:30', 1),
(180, 1580144641, 1, '2018-10-12 14:14:28', 1),
(181, 1439464630, 1, '2018-10-12 14:55:45', 1),
(182, 1580144641, 1, '2018-10-12 15:33:19', 1),
(183, 94052191, 1, '2018-10-12 18:43:32', 1),
(184, 2989755416, 1, '2018-10-12 21:37:29', 1),
(185, 1439464630, 1, '2018-10-12 22:38:08', 1),
(186, 94052191, 1, '2018-10-12 22:45:41', 1),
(187, 758675296, 1, '2018-10-12 23:37:43', 1),
(188, 94077560, 1, '2018-10-13 14:34:03', 1),
(189, 0, 1, '2018-10-13 07:46:04', 1),
(190, 0, 1, '2018-10-13 08:13:32', 1),
(191, 0, 1, '2018-10-13 08:13:46', 1),
(192, 0, 1, '2018-10-13 17:24:26', 1),
(193, 0, 1, '2018-10-13 18:28:18', 1),
(194, 0, 1, '2018-10-13 19:03:51', 1),
(195, 0, 1, '2018-10-14 08:43:59', 0),
(196, 0, 1, '2018-10-14 08:44:02', 1),
(197, 0, 1, '2018-10-14 16:08:50', 1),
(198, 0, 1, '2018-10-15 04:39:00', 1),
(199, 0, 1, '2018-10-15 05:30:18', 1),
(200, 0, 1, '2018-10-15 13:28:47', 1),
(201, 0, 1, '2018-10-16 14:57:21', 1),
(202, 0, 1, '2018-10-16 14:57:26', 1),
(203, 0, 1, '2018-10-16 15:23:15', 1),
(204, 0, 1, '2018-10-17 09:59:47', 1),
(205, 0, 1, '2018-10-18 08:43:44', 1),
(206, 0, 1, '2018-10-19 09:36:50', 1),
(207, 0, 1, '2018-10-19 14:07:22', 1),
(208, 0, 1, '2018-10-20 08:19:36', 1),
(209, 0, 1, '2018-10-20 09:20:35', 1),
(210, 0, 1, '2018-10-20 14:21:23', 1),
(211, 0, 1, '2018-10-20 17:40:29', 1),
(212, 0, 1, '2018-10-20 18:13:14', 1),
(213, 0, 1, '2018-10-21 04:24:04', 1),
(214, 0, 1, '2018-10-21 14:50:27', 1),
(215, 0, 1, '2018-10-21 16:18:47', 1),
(216, 0, 1, '2018-10-21 22:01:28', 1),
(217, 0, 1, '2018-10-22 06:23:19', 1),
(218, 0, 1, '2018-10-22 10:35:26', 1),
(219, 0, 1, '2018-10-22 10:36:54', 1),
(220, 0, 1, '2018-10-23 05:30:09', 1),
(221, 0, 1, '2018-10-23 06:32:02', 1),
(222, 0, 1, '2018-10-23 11:55:41', 1),
(223, 0, 1, '2018-10-24 12:28:54', 1),
(224, 0, 1, '2018-10-24 13:19:43', 1),
(225, 0, 1, '2018-10-25 05:06:35', 1),
(226, 0, 1, '2018-10-25 05:06:36', 1),
(227, 0, 1, '2018-10-25 06:28:21', 1),
(228, 0, 1, '2018-10-25 06:28:41', 1),
(229, 0, 1, '2018-10-25 11:20:05', 1),
(230, 0, 1, '2018-10-25 11:26:20', 1),
(231, 0, 1, '2018-10-25 13:53:40', 1),
(232, 0, 1, '2018-10-25 14:15:49', 1),
(233, 0, 1, '2018-10-26 10:04:35', 1),
(234, 0, 1, '2018-10-26 17:38:28', 1),
(235, 0, 1, '2018-10-26 19:26:12', 0),
(236, 0, 1, '2018-10-26 19:26:19', 1),
(237, 0, 1, '2018-10-26 21:30:53', 1),
(238, 0, 1, '2018-10-27 07:03:39', 1),
(239, 0, 1, '2018-10-27 08:41:10', 1),
(240, 0, 1, '2018-10-27 12:09:35', 1),
(241, 0, 1, '2018-10-27 15:55:15', 1),
(242, 0, 1, '2018-10-27 15:58:43', 1),
(243, 0, 1, '2018-10-28 01:25:18', 1),
(244, 0, 1, '2018-10-28 01:41:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE IF NOT EXISTS `nurses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `name`, `age`, `phone`, `address`) VALUES
(6, 'ريم علوش', 22, '094324324', 'دمشق / ركن الدين'),
(7, 'سامر محمد', 33, '0933232323', 'المزة'),
(8, 'ماهر محمد', 33, '093232323', 'دمشق');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `social_id` varchar(12) DEFAULT NULL,
  `id_type` enum('','Tazkara','Passport','Driver License','Bank ID Card') DEFAULT NULL,
  `birth_date` int(11) DEFAULT NULL,
  `create_date` int(11) NOT NULL,
  `picture` text,
  `memo` text,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `last_name`, `fname`, `gender`, `email`, `phone`, `address`, `social_id`, `id_type`, `birth_date`, `create_date`, `picture`, `memo`) VALUES
(1, 'باسم', 'سمير', 'سامر', 1, 'dasd@dsd.com', '03929329', 'Damas', '11', 'Passport', 843177600, 1537459901, NULL, 'ملخص عن حالة المريض'),
(2, 'ماهر', 'محمود', 'سامر', 1, 'nager@sad.com', '0993623827', 'dimashq', '1', 'Tazkara', 662774400, 1537459901, NULL, ''),
(3, 'سمير', 'محمود', 'جميل', 1, 'fsd@fdf.com', '0948374643', 'Damascus', '', 'Tazkara', 844128000, 1538429500, NULL, ''),
(4, 'احمد', 'رمضان', 'خالد', 1, 'm.shbat@gimal.com', '0988766544', 'جديدة عرطوز', '', 'Tazkara', 781315200, 1538743246, NULL, ''),
(5, 'عمير', 'عامر', 'ماهر', 1, 'fsd@fdf.com', '0932323232', 'تضامن', '1', 'Passport', 497491200, 1538899410, NULL, 'ملخص '),
(6, 'عمر', 'علي', 'عمير', 1, 'asdasdas@dsd.com', '0943349343', 'دمشق', '11', 'Passport', 497491200, 1538911427, NULL, ''),
(7, 'سميرة', 'سمير', 'محمود', 0, 'kdjhkjhk@dskj.com', '0974636553', 'حمص', '11', 'Passport', 465955200, 1538912256, NULL, ''),
(8, 'ياسين', 'محمود', 'نصوح', 1, 'fsd@fdf.com', '094324234', 'دمشق', '22', 'Passport', 497577600, 1539027813, NULL, 'ملخض'),
(9, 'ناصر', 'الحلبي', 'محمد', 1, 'mon@dsad.com', '0943432423', 'حلب', '1', 'Driver License', 781574400, 1539038474, NULL, ''),
(10, 'خالد', 'محمد', 'جمال', 1, 'fsd@fdf.com', '0934435347', 'دمشق', '2', 'Driver License', 0, 1539039198, NULL, ''),
(11, 'امير', 'محمد', 'حامد', 1, 'fsd@fdf.com', '099432342', 'دمشق', '1', 'Passport', 497664000, 1539117629, NULL, ''),
(12, 'ماجدة', 'محمود', 'جمال', 1, 'fsd@fdf.com', '0939049349', 'sds', '1', 'Tazkara', 0, 1539172465, NULL, ''),
(13, 'طه', 'علوش', 'عمر', 1, 'emauq@dds.com', '0993623827', 'دمشق', '23', 'Passport', 497750400, 1539204778, NULL, ''),
(14, 'عمران', 'زياد', 'عامر', 1, 'fsd@fdf.com', '9382382983', 'دمشق', '11', 'Bank ID Card', 150595200, 1539205216, NULL, ''),
(15, 'عمران', 'زياد', 'عامر', 1, 'fsd@fdf.com', '9382382983', 'دمشق', '11', 'Bank ID Card', 150595200, 1539205283, NULL, ''),
(16, 'جهاد', 'مصطفى', 'محمد', 1, 'fsd@fdf.com', '0934344554', 'asdas', '2', 'Driver License', 0, 1539278696, NULL, ''),
(17, 'ياسين', 'محمود', 'عماد', 1, 'fsd@fdf.com', '0943543434', 'dadas', '11', 'Tazkara', -1553385600, 1539278781, NULL, ''),
(18, 'زيد', 'محمد', 'اسامة', 1, 'fsd@fdf.com', '0434242342', 'حلب', '11', 'Passport', 497836800, 1539293612, NULL, ''),
(19, 'سامر', 'سمير', 'ماهر', 1, 'fsd@fdf.com', '9382382983', 'eqweqweqwe', '22', 'Tazkara', 844992000, 1539295777, NULL, ''),
(20, 'ريم', 'محمود', 'عادل', 1, 'fsd@fdf.com', '9382382983', 'eqweqweqwe', '1', 'Passport', 844992000, 1539299217, NULL, ''),
(21, 'ماهر', 'مطرب', 'سمير', 1, 'mdaskdaslkj@ljda.com', '094324234', 'دمشق', '22', 'Bank ID Card', 498873600, 1540291224, NULL, ''),
(22, 'مهاب', 'الحسيني', 'جمال', 1, 'sadas@cc.com', '09332323', 'دمشق', '11', 'Passport', 846374400, 1540646403, NULL, ''),
(23, 'جهاد', 'جميل', 'سامر', 1, 'asdasd@asd.com', '094923423', 'دمشق', NULL, NULL, 499219200, 1540646689, NULL, ''),
(24, 'ads', 'das d', 'das', 1, 'sadsa@dsdas.com', '321321', 'dasd', NULL, NULL, 499219200, 1540672163, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_doctor`
--

CREATE TABLE IF NOT EXISTS `patient_doctor` (
  `patient_doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `visit_date` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patient_doctor_id`),
  KEY `patient_id` (`patient_id`),
  KEY `user_id` (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `patient_doctor`
--

INSERT INTO `patient_doctor` (`patient_doctor_id`, `patient_id`, `doctor_id`, `visit_date`, `status`) VALUES
(1, 1, 6, 1540292258, 0),
(2, 3, 6, 1540208709, 0),
(3, 10, 4, 1539784979, 2),
(4, 11, 5, 1539239966, 2),
(5, 12, 5, 1539785002, 2),
(6, 9, 4, 1539812225, 2),
(7, 8, 5, 1539784994, 2),
(8, 7, 5, 1539288497, 1),
(9, 6, 5, 1539784987, 2),
(10, 5, 7, 1539204650, 0),
(11, 4, 5, 1539292389, 1),
(12, 2, 5, 1539299373, 2),
(13, 13, 5, 1539206217, 1),
(14, 14, 5, 1539250366, 1),
(15, 15, 4, 1539206070, 1),
(16, 16, 5, 1539784963, 2),
(17, 17, 5, 1539784948, 2),
(18, 18, 5, 1539299458, 1),
(19, 19, 6, 1539784757, 2),
(20, 20, 6, 1539784746, 2),
(21, 21, 7, 1540291224, 0),
(22, 22, 5, 1540646403, 0),
(23, 23, 5, 1540646689, 0),
(24, 24, 6, 1540672163, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_drugs`
--

CREATE TABLE IF NOT EXISTS `purchased_drugs` (
  `purchased_drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_date` int(11) NOT NULL,
  `purchase_price` decimal(10,0) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) NOT NULL,
  `memo` text,
  PRIMARY KEY (`purchased_drug_id`),
  KEY `drug_id` (`drug_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchased_drugs`
--

INSERT INTO `purchased_drugs` (`purchased_drug_id`, `drug_id`, `user_id`, `purchase_date`, `purchase_price`, `no_of_item`, `total_cost`, `memo`) VALUES
(1, 4, 1, 1538179200, '11', 1, '11', ''),
(2, 5, 1, 1539216000, '100', 10, '1000', ''),
(3, 5, 1, 1539216000, '100', 10, '1000', '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject` text,
  `url` text,
  `description` text,
  `create_date` int(11) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `returned_drugs`
--

CREATE TABLE IF NOT EXISTS `returned_drugs` (
  `returned_drug_id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `return_date` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) NOT NULL,
  `memo` text,
  PRIMARY KEY (`returned_drug_id`),
  KEY `drug_id` (`drug_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nurse_id` int(11) NOT NULL,
  `work_date` date NOT NULL,
  `work_hours` int(11) NOT NULL,
  `hour_price` int(11) NOT NULL,
  `day_fare` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `nurse_id`, `work_date`, `work_hours`, `hour_price`, `day_fare`) VALUES
(1, 3, '2017-09-01', 10, 145, 0),
(2, 3, '2018-10-06', 44, 150, 0),
(3, 4, '2018-10-16', 12, 150, 0),
(4, 6, '2018-09-05', 10, 150, 1500),
(5, 6, '2018-10-20', 9, 150, 1350),
(6, 7, '2018-10-26', 11, 140, 1540),
(7, 8, '2018-10-26', 11, 194, 2134),
(8, 9, '2018-10-11', 12, 140, 0),
(9, 6, '2018-10-27', 10, 150, 1500),
(10, 6, '2018-10-05', 10, 150, 1500),
(11, 6, '2018-10-05', 11, 100, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `userdata_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `position` varchar(40) NOT NULL,
  `social_id` varchar(12) NOT NULL,
  `id_type` enum('','Tazkara','Passport','Driver License','Bank ID Card') DEFAULT 'Tazkara',
  `birth_date` int(11) DEFAULT NULL,
  `create_date` int(11) NOT NULL,
  `picture` text,
  `memo` text,
  PRIMARY KEY (`userdata_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userdata_id`, `user_id`, `first_name`, `last_name`, `fname`, `gender`, `email`, `phone`, `address`, `position`, `social_id`, `id_type`, `birth_date`, `create_date`, `picture`, `memo`) VALUES
(1, 1, 'د.محمد', 'شباط', 'علي', 1, 'admin@sdd.com', '032321', 'Damascus', 'admin', '1', 'Tazkara', 1538006400, 1537380015, NULL, ''),
(2, 2, 'د.نور', 'شماس', 'علي', 1, 'nour@gmail.com', '099392323', 'Damas', 'doctor', '1', 'Tazkara', 1537488000, 1537380075, NULL, ''),
(3, 3, 'مصعب', 'عمير', 'عماد', 1, 'mossab@gmail.com', '0993623827', 'حمص', 'patient', '1', 'Passport', 1540425600, 1538994704, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_last_set` datetime NOT NULL,
  `password_never_expires` tinyint(1) NOT NULL DEFAULT '0',
  `remember_me` varchar(40) NOT NULL,
  `activation_code` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `forgot_code` varchar(40) NOT NULL,
  `forgot_generated` datetime NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL,
  `last_login_ip` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `password_last_set`, `password_never_expires`, `remember_me`, `activation_code`, `active`, `forgot_code`, `forgot_generated`, `enabled`, `last_login`, `last_login_ip`) VALUES
(1, 'admin', '$2a$08$glVINo.dWbH7voqyOzZ4YeyZOUTGSy3jxYXzNLrVPaWJj9ZLesoCy', '2018-09-19 18:00:15', 0, '6878a7fdad4a5aea216f1f66ae1becfac6a62285', '', 1, '', '0000-00-00 00:00:00', 1, '2018-10-28 03:41:30', 0),
(2, 'ahmad', '$2a$08$30kc9L1nLO/sUVG2ExwUs..LqI5C/mMwoVzxPPWk0G1fTeS6T9jhW', '2018-09-19 18:01:15', 0, '6ac3c5aa0002289b0ba7bef6fc38c256869a86c8', '', 1, '', '0000-00-00 00:00:00', 1, '2018-10-02 17:38:48', 83919838),
(3, 'mossab', '$2a$08$5JnDGg5bCUFvYYVsZSf24uUj/skPcMwferFknI8ar7bBFUDsUESrC', '2018-10-08 10:31:44', 0, '', '', 1, '', '0000-00-00 00:00:00', 1, '2018-10-08 10:32:04', 83923213);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `assoc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`assoc_id`),
  KEY `user_id` (`user_id`,`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`assoc_id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(7, 1, 9),
(4, 2, 3),
(8, 2, 9),
(5, 3, 8),
(9, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `xrays`
--

CREATE TABLE IF NOT EXISTS `xrays` (
  `xray_id` int(11) NOT NULL AUTO_INCREMENT,
  `xray_name_en` varchar(50) DEFAULT NULL,
  `xray_name_ar` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `memo` text,
  PRIMARY KEY (`xray_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `xrays`
--

INSERT INTO `xrays` (`xray_id`, `xray_name_en`, `xray_name_ar`, `category`, `price`, `memo`) VALUES
(1, 'Backbones', 'صورة للعمود الفقري', 'صنف الصورة', '2001', 'ملخص عن صورة الاشعه'),
(2, 'chest x-ray', 'صورة الشعه', 'نوع', '2000', 'ملخص عن الصورة');

-- --------------------------------------------------------

--
-- Table structure for table `xray_files`
--

CREATE TABLE IF NOT EXISTS `xray_files` (
  `xray_file_id` int(11) NOT NULL AUTO_INCREMENT,
  `xray_patient_id` int(11) NOT NULL,
  `upload_date` int(11) NOT NULL,
  `path` text NOT NULL,
  `memo` text,
  PRIMARY KEY (`xray_file_id`),
  KEY `xray_patient_id` (`xray_patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xray_patient`
--

CREATE TABLE IF NOT EXISTS `xray_patient` (
  `xray_patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `xray_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id_assign` int(11) NOT NULL,
  `assign_date` int(11) NOT NULL,
  `no_of_item` int(11) NOT NULL DEFAULT '1',
  `total_cost` decimal(10,0) DEFAULT NULL,
  `user_id_discharge` int(11) DEFAULT NULL,
  `discharge_date` int(11) DEFAULT NULL,
  `memo` text,
  `xresult` text NOT NULL,
  PRIMARY KEY (`xray_patient_id`),
  KEY `xray_id` (`xray_id`),
  KEY `patient_id` (`patient_id`),
  KEY `user_id_assign` (`user_id_assign`),
  KEY `user_id_discharge` (`user_id_discharge`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `xray_patient`
--

INSERT INTO `xray_patient` (`xray_patient_id`, `xray_id`, `patient_id`, `user_id_assign`, `assign_date`, `no_of_item`, `total_cost`, `user_id_discharge`, `discharge_date`, `memo`, `xresult`) VALUES
(1, 1, 13, 1, 1539207077, 1, '2000', NULL, NULL, '', ''),
(2, 1, 11, 1, 1539242825, 1, '2000', NULL, NULL, '', ''),
(7, 1, 18, 1, 1539344962, 1, '2000', NULL, NULL, '', ''),
(8, 1, 8, 1, 1539469611, 1, '2000', NULL, NULL, '', ''),
(9, 1, 5, 1, 1539796285, 1, '2000', NULL, NULL, '', ''),
(10, 1, 12, 1, 1539796367, 1, '2000', NULL, NULL, '', ''),
(11, 1, 20, 1, 1539806766, 1, '2000', NULL, NULL, '', ''),
(12, 1, 19, 1, 1539810276, 1, '2000', NULL, NULL, '', ''),
(13, 1, 9, 1, 1539812266, 1, '2000', NULL, NULL, '', ''),
(14, 1, 20, 1, 1540036941, 1, '2001', NULL, NULL, '', ''),
(15, 1, 20, 1, 1540036980, 1, '2001', NULL, NULL, '', ''),
(16, 1, 19, 1, 1540052781, 1, '2001', NULL, NULL, '', ''),
(17, 1, 16, 1, 1540056659, 9, '18009', NULL, NULL, '', 'Ahmad'),
(18, 1, 20, 1, 1540149964, 1, '2001', NULL, NULL, '', 'بسيبسي'),
(19, 1, 1, 1, 1540201139, 1, '2001', NULL, NULL, '', ''),
(20, 1, 2, 1, 1540211059, 1, '2001', NULL, NULL, '', ''),
(21, 1, 1, 1, 1540215184, 99, '198099', NULL, NULL, '', 'das'),
(22, 1, 1, 1, 1540219047, 1, '2001', NULL, NULL, '', 'dasd'),
(23, 1, 1, 1, 1540219062, 1, '2001', NULL, NULL, '', 'new'),
(24, 1, 2, 1, 1540220039, 0, NULL, NULL, NULL, NULL, 'test xx '),
(25, 1, 13, 1, 1540290936, 0, NULL, NULL, NULL, NULL, 'نتيجة صورة الاشعة'),
(26, 2, 21, 1, 1540292102, 0, NULL, NULL, NULL, NULL, ''),
(27, 1, 1, 1, 1540563941, 0, NULL, NULL, NULL, NULL, ''),
(28, 2, 1, 1, 1540563978, 0, NULL, NULL, NULL, NULL, ''),
(29, 2, 1, 1, 1540564060, 0, NULL, NULL, NULL, NULL, 'نتيجة صورة الاشعه ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
