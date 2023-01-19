-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: ian. 19, 2023 la 06:29 PM
-- Versiune server: 5.7.36
-- Versiune PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `motouau`
--
CREATE DATABASE IF NOT EXISTS `motouau` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `motouau`;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `brands`
--

INSERT INTO `brands` (`brand_id`, `name`) VALUES
('AGV', 'AGV'),
('ALP', 'Alpinestars'),
('ARH', 'Airoh'),
('SC', 'Scorpion'),
('THR', 'THOR');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
('CST', 'Casti'),
('EOFF', 'Echipamente offroad'),
('ESTR', 'Echipamente strada');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `billing_address` varchar(50) DEFAULT NULL,
  `shipping_address` varchar(50) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `customers`
--

INSERT INTO `customers` (`customer_id`, `username`, `email`, `password`, `full_name`, `billing_address`, `shipping_address`, `country`, `phone`) VALUES
(1, 'tudordragos', 'tudordragos@gmail.com', 'abc123', 'Tudor Dragos', 'Strada Egretei 27', 'Strada Egretei 27', 'Romania', 726382537),
(2, 'adrianbaila', 'adrianbaila@gmail.com', 'adrian1', NULL, NULL, NULL, NULL, NULL),
(3, 'alexandrachivu', 'alexandrachivu@gmail.com', 'alex123', NULL, NULL, NULL, NULL, NULL),
(4, 'ionution', 'ionution@gmail.com', 'ion123', NULL, NULL, NULL, NULL, NULL),
(5, 'ralucapuchiu', 'ralucapuchiu@gmail.com', 'raluca123', NULL, NULL, NULL, NULL, NULL),
(6, 'anamaria', 'anamaria@gmail.com', 'anam12', NULL, NULL, NULL, NULL, NULL),
(7, 'andreipetre', 'andreipetre@gmail.com', 'petre123', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_line_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipping_address` varchar(50) NOT NULL,
  `order_email` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_status_id` int(11) NOT NULL,
  PRIMARY KEY (`order_line_id`),
  KEY `foreign3` (`customer_id`),
  KEY `foreign4` (`product_id`),
  KEY `foreign6` (`order_status_id`),
  KEY `foreign7` (`order_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `status`) VALUES
(1, 'Finalizata'),
(2, 'In livrare'),
(3, 'In progres'),
(4, 'Primita');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `brand_id` varchar(5) NOT NULL,
  `price` double(7,2) NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL,
  `stock` int(11) NOT NULL,
  `subcategory_id` varchar(5) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `foreign2` (`subcategory_id`),
  KEY `foreign5` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `brand_id`, `price`, `image`, `date`, `stock`, `subcategory_id`) VALUES
(1, 'Casca integrala SCORPION EXO-R1 AIR CARBON CORPUS II', 'Scorpion prezina noua gama EXO R1. Avand un aspect agresiv, aerodinamic, fante de aerisire generose si o inchidere sigura, aceasta casca este ideala pentru cei ce iubesc viteza si adrenalina, fiind potrivita atat pe strada cat si pe circuit. Asadar, daca esti dependent de adrenalina si senzatii tari, Exo R1 este casca ce te completeaza perfect.', 'SC', 2245.50, 'images/casca1.jpg', '2023-01-19', 100, 'INT'),
(14, 'Casca integrala SCORPION EXO 1400 AIR ATTUNE', 'Casca moto Scorpion Exo 1400 Air este alegerea optima din intreaga paleta de casti premium de pe piata, fiind recomandata pentru toti pasionatii de sport/touring, garantand un confort crescut, multiple dotari tehnice si siguranta superioara.', 'SC', 1665.00, 'images/casca2.jpg', '2023-01-19', 80, 'INT'),
(15, 'Casca modulara flip-back SCORPION EXO-TECH PRIMUS', 'Casca Scorpion Exo-Tech Primus nu este doar o casca  flip-back modulara ci chiar un model care iti fura privirea datorita formei moderne ce o incadreaza ca si design in zona castilor integrale.', 'SC', 1665.00, 'images/casca3.jpg', '2023-01-19', 50, 'FLP'),
(16, 'Casca Flip-up SCORPION EXO 920 EVO SOLID', 'Casca filp-up SCORPION EXO 920 EVO este alegerea optima pentru toti pasionatii de sport/touring garantand un confort crescut, multiple dotari tehnice si siguranta superioara.', 'SC', 715.90, 'images/casca4.jpg', '2023-01-19', 60, 'FLP'),
(17, 'Combinezon de piele 2 piese Alpinestars Gp Force Chaser', 'Daca iti doresti sa iesi pe circuit sau doar sa ai parte de cea mai buna protectie pe strada, combinezonul moto din doua piese este alegerea ideala in ceea ce priveste siguranta si confortul. Fiind confectionat din piele de bovina de inalta calitate si avand panouri elastice dinamice inserate in zonele cheie, siguranta, protectia si libertatea de miscare sunt asigurate. Perforatiile de la nivelul stratului exterior sunt amplasate strategic pentru a maximiza circulatia aerului. Protectiile nivel 2 de pe umeri, coate, genunchi, precum si sliderele de la nivelul genunchilor, asigura un nivel ridicat de siguranta in caz de impact. Pentru un upgrade suplimentar au fost pregatite buzunare speciale pentru protectiile Macna de spate si piept.', 'ALP', 4050.00, 'images/comb1.jpg', '2023-01-19', 30, 'COMB'),
(18, 'Combinezon de piele 2 piese Alpinestars Gp Force Phantom', 'Daca iti doresti sa iesi pe circuit sau doar sa ai parte de cea mai buna protectie pe strada, combinezonul moto din doua piese este alegerea ideala in ceea ce priveste siguranta si confortul. Fiind confectionat din piele de bovina de inalta calitate si avand panouri elastice dinamice inserate in zonele cheie, siguranta, protectia si libertatea de miscare sunt asigurate. Perforatiile de la nivelul stratului exterior sunt amplasate strategic pentru a maximiza circulatia aerului. Protectiile nivel 2 de pe umeri, coate, genunchi, precum si sliderele de la nivelul genunchilor, asigura un nivel ridicat de siguranta in caz de impact. Pentru un upgrade suplimentar au fost pregatite buzunare speciale pentru protectiile de spate si piept.', 'ALP', 4500.00, 'images/comb2.jpg', '2023-01-19', 20, 'COMB'),
(19, 'Geaca de piele sport ALPINESTARS GP FORCE', 'O geaca superba cu un design sport, este construita dintr-o piele premium cu insertii textile elastice strategic amplasate. Geaca, care poate fi purtata impreuna cu pantalonii Alpinestars, este confortabila si vine insotita de protectii performante.', 'ALP', 1995.90, 'images/gci1.jpg', '2023-01-19', 20, 'GCI'),
(20, 'Geaca de piele sport/touring Alpinestars STELLA GP PLUS R V3', 'O geaca superba cu un design sport, STELLA GP PLUS R V3 este construita dintr-o piele premium cu insertii textile elastice strategic amplasate. Geaca, care poate fi purtata impreuna cu pantalonii Alpinestars Stella Missile, este confortabila si vine insotita de protectii performante.', 'ALP', 2090.95, 'images/gci2.jpg', '2023-01-19', 15, 'GCI'),
(21, 'Cizme sport/touring Alpinestars SMX-6 V2 Honda Edition', 'Cizmele SMX-6 V2 Honda incorporeaza un nou design ce permit mai multa flexibilitate si o profilare anatomica. Dotate cu cele mai inovatoare caracteristici dezvoltate de catre Alpinestars, se remarca atat pentru utilizare stradala cat si pentru pilotatul ocazional pe circuit. Fiecare componenta a cizmelor, au fost proiectate pentru a oferi riderului un avantaj crucial din punct de vedere al protectiei, ergonomiei si confortului.', 'ALP', 1304.90, 'images/cizme1.jpg', '2023-01-19', 25, 'CZM'),
(22, 'Cizme sport/touring ALPINESTARS SMX PLUS GORE-TEX', 'SMX Plus V2 GTX imbina perfect stilul sportiv cu noile caracteristici avansate de protectie. Departamentul de dezvoltare Alpinestars a reusit sa imbine perfect protectia si performanta intr-o pereche de cizme ce iti ofera tot confortul de care ai nevoie in moemntul in care te urci pe motor.', 'ALP', 2069.90, 'images/cizme2.jpg', '2023-01-19', 30, 'CZM'),
(23, 'Casca cross-enduro Airoh Twist 2.0 Cairoli Replica', 'Simtiti diferenta in design si caracteristici a noii casti Scorpion VX-16. Casca are toate atuurile modelului anterior, incluzand sistemul AirFit, un camp vizual larg si extensie pentru cozoroc, in timp ce noua tehnologie laser cut 3D folosita pentru decuparea obrajilor face ca potrivirea sa fie mult imbunatatita iar spatiul de la obraji sa ofere confort si o sustinere sigura.', 'ARH', 685.00, 'images/cascacross1.jpg', '2023-01-19', 50, 'CRS'),
(24, 'Casca cross-enduro SCORPION EXO VX-16 AIR SOUL', 'Simtiti diferenta in design si caracteristici a noii casti Scorpion VX-16. Casca are toate atuurile modelului anterior VX-15, incluzand sistemul AirFit, un camp vizual larg si extensie pentru cozoroc, in timp ce noua tehnologie laser cut 3D folosita pentru decuparea obrajilor face ca potrivirea sa fie mult imbunatatita iar spatiul de la obraji sa ofere confort si o sustinere sigura. Greutatea a fost mult redusa datorita noii carcase \"advanced thermoplastic shell\", incepand cu 1150 grame pentru marimea S/M. Toate aceste caracteristici impreuna cu noul design ce respecta trendul castilor off road,  fac din VX-16 un model ce va scrie o noua pagina in istoria castilor Scorpion.', 'THR', 785.95, 'images/cascacross2.jpg', '2023-01-19', 35, 'CRS'),
(25, 'Ochelari moto Cross-Enduro THOR COMBAT SAND BLAST SAND', 'Testati si certificati conform standardelor europene EN 1938:2010;\r\nSuporta sistemul Total Vision (vandut separat);\r\nGeanta din plus pentru depozitare inclusa;\r\nCurea ajustabila cu silicon pentru o buna fixare;\r\nSpuma pentru sigilare dintr-un singur strat de 12mm pentru o buna fixare;\r\nPregatiti pentru Tear-Off  (vandut separat);\r\nLentila anti-ceata, rezistenta la zgarieturi cu protectie UV;', 'THR', 180.00, 'images/ochelari1.jpg', '2023-01-19', 45, 'OCH'),
(26, 'Ochelari moto Cross-Enduro THOR COMBAT FLUORESCENT ORANGE', 'Testati si certificati conform standardelor europene EN 1938:2010;\r\nSuporta sistemul Total Vision (vandut separat);\r\nGeanta din plus pentru depozitare inclusa;\r\nCurea ajustabila cu silicon pentru o buna fixare;\r\nSpuma pentru sigilare dintr-un singur strat de 12mm pentru o buna fixare;\r\nPregatiti pentru Tear-Off  (vandut separat);\r\nLentila anti-ceata, rezistenta la zgarieturi cu protectie UV;', 'THR', 165.00, 'images/ochelari2.jpg', '2023-01-19', 40, 'OCH'),
(27, 'Geaca cross-enduro Alpinestars VENTURE R', 'Caracteristici:\r\n-Materiale cu o excelenta rezistenta la abraziune, 600D nylon si poliester\r\n-Porturi de admisie aer cu fermoare plasate strategic pentru un flux optim de aer atunci cand sunt deschise, doua de evacuare pe spate\r\n-Tratament de impermeabilizare\r\n-Doua buzunare pentru maini pe fata\r\n-Un buzunar etans cu fermoar la piept\r\n-Buzunar mare la spate\r\n-Sistem reglabil de inchidere a mansetelor\r\n-Intarituri PU film pentru coate si umeri', 'ALP', 1125.50, 'images/geacacross1.jpg', '2023-01-19', 25, 'GCR'),
(28, 'Geaca enduro/adventure ALPINESTARS VENTURE XT', 'Caracteristici:\r\n-Materiale cu o excelenta rezistenta la abraziune, 600D nylon si poliester\r\n-Porturi de admisie aer cu fermoare plasate strategic pentru un flux optim de aer atunci cand sunt deschise, doua de evacuare pe spate\r\n-Tratament de impermeabilizare\r\n-Doua buzunare pentru maini pe fata\r\n-Un buzunar etans cu fermoar la piept\r\n-Buzunar mare la spate', 'ALP', 1215.90, 'images/geacacross2.jpg', '2023-01-19', 25, 'GCR'),
(29, 'Cizme cross-enduro ALPINESTARS TECH 3 BOOT', 'Componente precurbate turnate prin injectie;\r\nSisteme de prindere a cataramelor turnate prin injectie;\r\nCurelele regalbile permit reglarea optima in functie de preferinte si de anatomia picioarelor;\r\nPe partea laterala, cizmele sunt prevazute cu placa rezistenta la abraziune turnata prin injectie, cu protectie integrata pentru schimbator;', 'ALP', 1135.00, 'images/cizmecross1.jpg', '2023-01-19', 20, 'CZCR'),
(30, 'Cizme Cross-Enduro Thor Radial', 'Componente precurbate turnate prin injectie;\r\nSisteme de prindere a cataramelor turnate prin injectie;\r\nCurelele regalbile permit reglarea optima in functie de preferinte si de anatomia picioarelor;\r\nPe partea laterala, cizmele sunt prevazute cu placa rezistenta la abraziune turnata prin injectie, cu protectie integrata pentru schimbator;', 'THR', 764.50, 'images/cizmecross2.jpg', '2023-01-19', 35, 'CZCR');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategory_id` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` varchar(5) NOT NULL,
  PRIMARY KEY (`subcategory_id`),
  KEY `foreign1` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `name`, `category_id`) VALUES
('COMB', 'Combinezoane', 'ESTR'),
('CRS', 'Casti cross-enduro', 'CST'),
('CZCR', 'Cizme cross-enduro', 'EOFF'),
('CZM', 'Cizme', 'ESTR'),
('FLP', 'Casti flip-up', 'CST'),
('GCI', 'Geci', 'ESTR'),
('GCR', 'Geci cross-enduro', 'EOFF'),
('INT', 'Casti integrale', 'CST'),
('OCH', 'Ochelari cross-enduro', 'EOFF');

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `foreign3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `foreign4` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `foreign6` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`order_status_id`);

--
-- Constrângeri pentru tabele `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `foreign2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`),
  ADD CONSTRAINT `foreign5` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);

--
-- Constrângeri pentru tabele `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `foreign1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
