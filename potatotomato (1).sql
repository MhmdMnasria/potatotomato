-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 02:33 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `potatotomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `message` text,
  `branchId` int(11) DEFAULT NULL,
  `applicationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `imageUrl` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `imageUrl` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `location`, `imageUrl`) VALUES
(2, 'Yellow Beuy', 'La Manouba', 'https://images.pexels.com/photos/11251677/pexels-photo-11251677.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
(3, 'pie Olin', 'Sousse', 'https://images.pexels.com/photos/237718/pexels-photo-237718.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');

-- --------------------------------------------------------

--
-- Table structure for table `coefficients`
--

CREATE TABLE `coefficients` (
  `country` varchar(50) DEFAULT NULL,
  `coef` float DEFAULT NULL,
  `symbol` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coefficients`
--

INSERT INTO `coefficients` (`country`, `coef`, `symbol`) VALUES
('Afghanistan', 0.013, 'AFN'),
('Albania', 0.011, 'ALL'),
('Algeria', 0.0074, 'DZD'),
('Andorra', 1.22, 'EUR'),
('Angola', 0.0022, 'AOA'),
('AntiguaandBarbuda', 2.7, 'XCD'),
('Argentina', 0.012, 'ARS'),
('Armenia', 0.0028, 'AMD'),
('Australia', 0.75, 'AUD'),
('Austria', 0.9, 'EUR'),
('Azerbaijan', 1.7, 'AZN'),
('Bahamas', 1, 'BSD'),
('Bahrain', 0.38, 'BHD'),
('Bangladesh', 84.74, 'BDT'),
('Barbados', 2.02, 'BBD'),
('Belarus', 2.63, 'BYN'),
('Belgium', 0.9, 'EUR'),
('Belize', 2.02, 'BZD'),
('Benin', 582.68, 'XOF'),
('Bhutan', 74.49, 'BTN'),
('Bolivia', 6.89, 'BOB'),
('BosniaandHerzegovina', 1.62, 'BAM'),
('Botswana', 11.03, 'BWP'),
('Brazil', 5.31, 'BRL'),
('Brunei', 1.36, 'BND'),
('Bulgaria', 1.65, 'BGN'),
('BurkinaFaso', 582.68, 'XOF'),
('Burundi', 1982, 'BIF'),
('CaboVerde', 89.5, 'CVE'),
('Cambodia', 4096, 'KHR'),
('Cameroon', 582.68, 'XAF'),
('Canada', 1, 'CAD'),
('CentralAfricanRepublic', 582.68, 'XAF'),
('Chad', 582.68, 'XAF'),
('Chile', 805, 'CLP'),
('China', 6.39, 'CNY'),
('Colombia', 3636, 'COP'),
('Comoros', 412.5, 'KMF'),
('CongoBrazzaville', 582.68, 'XAF'),
('CongoKinshasa', 1842, 'CDF'),
('CostaRica', 606.01, 'CRC'),
('Croatia', 6.18, 'HRK'),
('Cuba', 1, 'CUP'),
('Cyprus', 0.9, 'EUR'),
('CzechRepublic', 22.18, 'CZK'),
('Denmark', 6.03, 'DKK'),
('Djibouti', 177.72, 'DJF'),
('Dominica', 2.7, 'XCD'),
('DominicanRepublic', 56.97, 'DOP'),
('Ecuador', 1, 'USD'),
('Egypt', 15.69, 'EGP'),
('ElSalvador', 1, 'USD'),
('EquatorialGuinea', 582.68, 'XAF'),
('Eritrea', 15.15, 'ERN'),
('Estonia', 0.9, 'EUR'),
('Eswatini', 14.52, 'SZL'),
('Ethiopia', 42.43, 'ETB'),
('Fiji', 2.05, 'FJD'),
('Finland', 0.9, 'EUR'),
('France', 0.9, 'EUR'),
('Gabon', 582.68, 'XAF'),
('Gambia', 52.49, 'GMD'),
('Georgia', 3.28, 'GEL'),
('Germany', 0.9, 'EUR'),
('Ghana', 6.05, 'GHS'),
('Greece', 0.9, 'EUR'),
('Grenada', 2.7, 'XCD'),
('Guatemala', 7.74, 'GTQ'),
('Guinea', 582.68, 'GNF'),
('GuineaBissau', 582.68, 'XOF'),
('Guyana', 208.98, 'GYD'),
('Haiti', 73.62, 'HTG'),
('Honduras', 24.59, 'HNL'),
('Hungary', 294.45, 'HUF'),
('Iceland', 123.48, 'ISK'),
('India', 73.19, 'INR'),
('Indonesia', 14243, 'IDR'),
('Iran', 42105, 'IRR'),
('Iraq', 1458, 'IQD'),
('Ireland', 0.9, 'EUR'),
('Israel', 3.28, 'ILS'),
('Italy', 0.9, 'EUR'),
('Jamaica', 148, 'JMD'),
('Japan', 110.26, 'JPY'),
('Jordan', 0.71, 'JOD'),
('Kazakhstan', 425.32, 'KZT'),
('Kenya', 111.37, 'KES'),
('Kiribati', 1, 'AUD'),
('Kosovo', 1, 'EUR'),
('Kuwait', 0.3, 'KWD'),
('Kyrgyzstan', 84.61, 'KGS'),
('Laos', 10592, 'LAK'),
('Latvia', 0.9, 'EUR'),
('Lebanon', 1507.5, 'LBP'),
('Lesotho', 14.47, 'LSL'),
('Liberia', 171.51, 'LRD'),
('Libya', 4.48, 'LYD'),
('Liechtenstein', 1, 'CHF'),
('Lithuania', 0.9, 'EUR'),
('Luxembourg', 0.9, 'EUR'),
('Madagascar', 3924, 'MGA'),
('Malawi', 793, 'MWK'),
('Malaysia', 4.14, 'MYR'),
('Maldives', 15.33, 'MVR'),
('Mali', 582.68, 'XOF'),
('Malta', 0.9, 'EUR'),
('MarshallIslands', 1, 'USD'),
('Mauritania', 357, 'MRU'),
('Mauritius', 43.08, 'MUR'),
('Mexico', 20.3, 'MXN'),
('Micronesia', 1, 'USD'),
('Moldova', 17.26, 'MDL'),
('Monaco', 0.9, 'EUR'),
('Mongolia', 2671, 'MNT'),
('Montenegro', 1.62, 'EUR'),
('Morocco', 8.88, 'MAD'),
('Mozambique', 67.92, 'MZN'),
('MyanmarBurma', 1377.5, 'MMK'),
('Namibia', 14.47, 'NAD'),
('Nauru', 1, 'AUD'),
('Nepal', 118.38, 'NPR'),
('Netherlands', 0.9, 'EUR'),
('NewZealand', 1.42, 'NZD'),
('Nicaragua', 34.74, 'NIO'),
('Niger', 582.68, 'XOF'),
('Nigeria', 432.5, 'NGN'),
('NorthKorea', 900, 'KPW'),
('NorthMacedonia', 51.65, 'MKD'),
('Norway', 10.04, 'NOK'),
('Oman', 0.39, 'OMR'),
('Pakistan', 184.95, 'PKR'),
('Palau', 1, 'USD'),
('Palestine', 3.28, 'ILS'),
('Panama', 1, 'USD'),
('PapuaNewGuinea', 3.44, 'PGK'),
('Paraguay', 6893, 'PYG'),
('Peru', 3.88, 'PEN'),
('Philippines', 49.75, 'PHP'),
('Poland', 3.94, 'PLN'),
('Portugal', 0.9, 'EUR'),
('Qatar', 3.64, 'QAR'),
('Romania', 4.09, 'RON'),
('Russia', 80.52, 'RUB'),
('Rwanda', 1034, 'RWF'),
('SaintKittsandNevis', 2.7, 'XCD'),
('SaintLucia', 2.7, 'XCD'),
('SaintVincentandtheGrenadines', 2.7, 'XCD'),
('Samoa', 2.5, 'WST'),
('SanMarino', 0.9, 'EUR'),
('SaoTomeandPrincipe', 20.87, 'STN'),
('SaudiArabia', 3.75, 'SAR'),
('Senegal', 582.68, 'XOF'),
('Serbia', 99.11, 'RSD'),
('Seychelles', 14.52, 'SCR'),
('SierraLeone', 12260, 'SLL'),
('Singapore', 1.34, 'SGD'),
('Slovakia', 0.9, 'EUR'),
('Slovenia', 0.9, 'EUR'),
('SolomonIslands', 7.95, 'SBD'),
('Somalia', 575, 'SOS'),
('SouthAfrica', 14.47, 'ZAR'),
('SouthKorea', 1198, 'KRW'),
('SouthSudan', 177.72, 'SSP'),
('Spain', 0.9, 'EUR'),
('SriLanka', 204, 'LKR'),
('Sudan', 407, 'SDG'),
('Suriname', 22.75, 'SRD'),
('Sweden', 9.29, 'SEK'),
('Switzerland', 1, 'CHF'),
('Syria', 514, 'SYP'),
('Taiwan', 28.24, 'TWD'),
('Tajikistan', 11.4, 'TJS'),
('Tanzania', 2319, 'TZS'),
('Thailand', 32.89, 'THB'),
('Timor-Leste', 1, 'USD'),
('Togo', 582.68, 'XOF'),
('Tonga', 2.32, 'TOP'),
('TrinidadandTobago', 6.75, 'TTD'),
('Tunisia', 2.76, 'TND'),
('Turkey', 13.55, 'TRY'),
('Turkmenistan', 3.5, 'TMT'),
('Tuvalu', 1, 'AUD'),
('Uganda', 3712, 'UGX'),
('Ukraine', 26.83, 'UAH'),
('UnitedArabEmirates', 3.67, 'AED'),
('UnitedKingdom', 0.78, 'GBP'),
('UnitedStates', 1, 'USD'),
('Uruguay', 43.89, 'UYU'),
('Uzbekistan', 10464, 'UZS'),
('Vanuatu', 113, 'VUV'),
('VaticanCity', 0.9, 'EUR'),
('Venezuela', 1, 'VES'),
('Vietnam', 23092, 'VND'),
('Yemen', 250.37, 'YER'),
('Zambia', 22.56, 'ZMW'),
('Zimbabwe', 84, 'ZWL');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary` decimal(10,0) DEFAULT NULL,
  `hireDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `imageUrl` text,
  `branchId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `position`, `salary`, `hireDate`, `imageUrl`, `branchId`) VALUES
(1, 'bill gates', 'manager', '50000', '2024-03-31 09:26:44', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Bill_Gates_June_2015.jpg/640px-Bill_Gates_June_2015.jpg', 2),
(4, 'elon mask', 'engineer', '30000', '2024-03-31 09:34:06', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRy5QMODyHm-LaMpgXOqMIUHPbQ-Y51jAZR_UJYC-9Dv1IL3ovh', 2),
(5, 'jeff bezos', 'cashier', '2500', '2024-03-31 09:35:50', 'https://pbs.twimg.com/profile_images/1591558315254890500/ETIHb4Nl_400x400.jpg', 2),
(6, 'brat pitt', 'cook', '15000', '2024-03-31 09:39:13', 'https://m.media-amazon.com/images/M/MV5BMjA1MjE2MTQ2MV5BMl5BanBnXkFtZTcwMjE5MDY0Nw@@._V1_FMjpg_UX1000_.jpg', 2),
(7, 'cameron diaz', 'seller', '5000', '2024-03-31 09:39:43', 'https://www.usmagazine.com/wp-content/uploads/2021/08/Benji-Cameron-update-001.jpg?w=800&h=1421&crop=1&quality=40&strip=all', 2),
(8, 'the rock', 'bodyGuard', '1500', '2024-03-31 11:20:28', 'https://m.media-amazon.com/images/M/MV5BOWU1ODBiNGUtMzVjNi00MzdhLTk0OTktOWRiOTIxMWNhOGI2XkEyXkFqcGdeQXVyMTU2OTM5NDQw._V1_FMjpg_UX1000_.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `employeeId` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `passcode` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`employeeId`, `username`, `passcode`) VALUES
(4, 'elon', 'mask');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `imageUrl` text,
  `price` float DEFAULT NULL,
  `branchId` int(11) DEFAULT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `imageUrl`, `price`, `branchId`, `description`) VALUES
(3, 'makeup', 'https://images.pexels.com/photos/7290174/pexels-photo-7290174.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 200, 2, 'Makeup often refers to cosmetics or substances applied to the face or body to enhance or alter one s appearance. This can include products like foundation, lipstick, mascara, eyeshadow, and blush.'),
(4, 'soap', 'https://images.pexels.com/photos/3940335/pexels-photo-3940335.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 15, 2, 'Soap works by emulsifying dirt, oil, and grease, allowing them to be easily rinsed away with water. It is commonly used for personal hygiene, such as washing hands and body, as well as for cleaning household items and surfaces.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branchId` (`branchId`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branchId` (`branchId`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD KEY `employeeId` (`employeeId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branchId` (`branchId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
