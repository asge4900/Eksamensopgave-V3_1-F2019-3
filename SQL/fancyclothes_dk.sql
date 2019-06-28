-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 06 2019 kl. 08:59:04
-- Serverversion: 10.1.40-MariaDB
-- PHP-version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fancyclothes.dk`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `category`
--

CREATE TABLE `category` (
  `categoryId` int(2) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'Jakker'),
(2, 'Bukser'),
(3, 'Skjorter'),
(4, 'Strik'),
(5, 'T-shirts & Tank tops'),
(6, 'Tasker');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `productId` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `imgSrc` varchar(200) NOT NULL,
  `imgAlt` varchar(50) NOT NULL,
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` varchar(1000) NOT NULL,
  `userId` int(5) NOT NULL,
  `stars` int(1) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`productId`, `title`, `imgSrc`, `imgAlt`, `published`, `content`, `userId`, `stars`, `category`) VALUES
(1, 'Lækker læderjakke', 'img/produkt1.jpg', 'Lækker læderjakke', '2019-06-25 08:06:19', 'Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha\'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.', 2, 3, 'Jakker'),
(2, 'Samsøe & Samsøe trøje', 'img/produkt2.jpg', 'Samsøe & Samsøe trøje', '2019-06-26 11:33:42', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eros lectus, maximus in lorem varius, condimentum auctor ante. Nulla nec quam eleifend, lacinia nulla eget, fringilla odio. Maecenas sodales porttitor auctor. Nam nec lorem nibh. Fusce hendrerit semper ante sit amet iaculis. Fusce est purus, consequat eu porttitor nec, interdum id elit. Sed nec urna fringilla, pulvinar dolor vel, tincidunt elit. Proin ac tempor justo. Etiam vehicula tempus nisi sit amet iaculis. Morbi velit mauris, luctus ut ante sed, varius facilisis felis.', 2, 3, 'tshirts'),
(3, 'test', 'img/produkt3.jpg', 'test', '2019-06-25 11:59:41', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum ante metus, eu eleifend massa dictum eget. Pellentesque et tortor at velit iaculis laoreet non ac tellus. Integer convallis mauris eu turpis rhoncus vestibulum. Pellentesque efficitur a nisi sit amet porta. Aliquam finibus eget ligula non laoreet. Etiam pretium tellus nec eros laoreet, eget consequat augue maximus. Vivamus condimentum sapien nulla, nec venenatis nisi vehicula id. Suspendisse venenatis pellentesque nunc, quis dictum magna.', 2, 5, 'skjorter'),
(4, 'test', 'img/produkt4.jpg', 'test', '2019-06-25 12:02:53', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget quam dui. Etiam fringilla quis mi ut finibus. Sed ullamcorper arcu sit amet tellus cursus pretium. Vivamus ultricies pellentesque arcu a iaculis. Etiam at tempor nisi. Nulla facilisi. Maecenas ullamcorper pulvinar dolor, ultricies vehicula velit sagittis ac. Duis ac rutrum mauris, at hendrerit purus.', 2, 1, 'bukser'),
(5, 'test', 'img/produkt5.jpg', 'test', '2019-06-26 11:32:42', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet interdum sapien, vel sagittis nisl. Sed eu lacus nec nulla vulputate congue. Maecenas sagittis ligula vitae leo accumsan, at convallis diam hendrerit. Nullam et elementum libero. Vestibulum in sapien in mauris imperdiet fermentum. Nulla sed tellus eu metus efficitur suscipit ac et ante. Vestibulum blandit dolor velit, id tempus orci ultrices nec. Nullam tristique metus nisi, ut faucibus libero mollis in. Nam varius, purus eu pharetra ultrices, ex magna rhoncus orci, vulputate vulputate mauris risus sit amet odio. Suspendisse potenti. Integer viverra justo vitae urna ornare sagittis. Donec varius tellus et lectus venenatis, tempus rhoncus elit pellentesque. Nam arcu turpis, porttitor quis elementum vel, tincidunt vitae orci.', 2, 1, 'tshirts'),
(6, 'test', 'test', 'test', '2019-06-27 09:31:02', 'erggrd', 4, 1, 'skjorter');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `userId` int(5) NOT NULL,
  `dbUsername` varchar(50) NOT NULL,
  `dbPassword` varchar(255) NOT NULL,
  `accessLevel` int(1) NOT NULL DEFAULT '3',
  `dbEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`userId`, `dbUsername`, `dbPassword`, `accessLevel`, `dbEmail`) VALUES
(1, 'Admin', 'admin123', 1, 'admin@hotmail.com'),
(2, 'Asger', 'asger123', 2, 'asger@hotmail.com'),
(3, 'Klaus', 'klaus123', 3, 'klaus@email.com'),
(4, 'tøj', 'tøj123', 3, 'toj@hotmail.com');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `userId` (`userId`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `userId_2` (`userId`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
