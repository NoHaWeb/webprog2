-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jún 08. 17:34
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `alkalmazottak` (
  `alkalmazott_id` int(11) NOT NULL,
  `alkalmazott_nev` varchar(255) NOT NULL,
  `beosztas` varchar(255) DEFAULT NULL,
  `reszleg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `alkalmazottak` (`alkalmazott_id`, `alkalmazott_nev`, `beosztas`, `reszleg`) VALUES
(1, 'Hanzel Norbert', '1', NULL);

CREATE TABLE `alkalmazotti_tevekenysegek` (
  `tevekenyseg_id` int(11) NOT NULL,
  `alkalmazott_id` int(11) DEFAULT NULL,
  `datum_id` int(11) DEFAULT NULL,
  `tevekenyseg_tipus` varchar(50) DEFAULT NULL,
  `idotartam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `beosztasok` (
  `beo_id` int(11) NOT NULL,
  `beo_nev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `beosztasok` (`beo_id`, `beo_nev`) VALUES
(1, 'Ügyvezető'),
(2, 'Sales'),
(3, 'HR'),
(4, 'Adminisztrátor'),
(5, 'Raktáros'),
(6, 'Eladó');

CREATE TABLE `beszallitok` (
  `beszallito_id` int(11) NOT NULL,
  `beszallito_nev` varchar(255) NOT NULL,
  `kapcsolattarto_nev` varchar(255) DEFAULT NULL,
  `telefon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `beszerzesek` (
  `beszerzes_id` int(11) NOT NULL,
  `beszallito_id` int(11) DEFAULT NULL,
  `termek_id` int(11) DEFAULT NULL,
  `datum_id` int(11) DEFAULT NULL,
  `mennyiseg` int(11) DEFAULT NULL,
  `koltseg` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `datumok` (
  `datum_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `ev` int(11) DEFAULT NULL,
  `negyedev` int(11) DEFAULT NULL,
  `honap` int(11) DEFAULT NULL,
  `nap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `eladasok` (
  `eladas_id` int(11) NOT NULL,
  `termek_id` int(11) DEFAULT NULL,
  `datum_id` int(11) DEFAULT NULL,
  `ugyfel_id` int(11) DEFAULT NULL,
  `mennyiseg` int(11) DEFAULT NULL,
  `osszeg` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(30) NOT NULL,
  `jelszo` varchar(32) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `auth` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `felhasznalok` (`id`, `felhasznalonev`, `jelszo`, `nev`, `auth`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 4),
(2, 'Admin123', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'Admin Admin', 1),
(3, 'Ugyvezeto123', '0c130d848a96f6f09e4db866fe602b6d', 'Ügyvezető Igazgató', 1),
(4, 'Elado123', '346dd5fe016d7b5e6b263dd4a3ebe0c5', 'Eladó Ramóna', 6),
(5, 'Sales123', 'd23c4dcbbe8e4937141264d5a1426d40', 'Sales Sales', 2),
(6, 'NoHa1234', '7da73c1342916d84f6a62a27de716cb5', 'Norbi Ka1234', 1),
(7, 'Raktaros123', '6fb04fa6bac76ef94f60076272d3b963', 'Raktaros123', 5);


CREATE TABLE `kategoriak` (
  `kategoria_id` int(11) NOT NULL,
  `kategoria_nev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `kategoriak` (`kategoria_id`, `kategoria_nev`) VALUES
(0, ''),
(1, 'Elektronika'),
(2, 'Ruházat'),
(3, 'Konyhai eszközök'),
(4, 'Bútor'),
(5, 'Vegyiárú'),
(6, 'Kertész árú'),
(7, 'Horgászkellék'),
(8, 'Játék'),
(9, 'Gyógyászati segédeszköz'),
(10, 'Kelengye'),
(11, 'Orvosi eszközök'),
(12, 'Ital'),
(13, 'Zenecikk'),
(14, 'Sport felszerelés');


CREATE TABLE `raktarak` (
  `raktar_id` int(11) NOT NULL,
  `raktar_nev` varchar(255) NOT NULL,
  `helyszin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `raktarkeszlet_mozgasok` (
  `mozgas_id` int(11) NOT NULL,
  `termek_id` int(11) DEFAULT NULL,
  `datum_id` int(11) DEFAULT NULL,
  `raktar_id` int(11) DEFAULT NULL,
  `mennyiseg` int(11) DEFAULT NULL,
  `mozgas_tipus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `termekek` (
  `termek_id` int(11) NOT NULL,
  `termek_nev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `termekek` (`termek_id`, `termek_nev`) VALUES
(1, 'Televizió'),
(2, 'Nadrág'),
(3, 'Robotgép'),
(4, 'Kanapé'),
(5, 'Mosószer'),
(6, 'Rotagép'),
(7, 'Horog'),
(8, 'Beszélő Robot'),
(9, 'Hőmérő'),
(10, 'Ágytakaró'),
(11, 'Ágytál'),
(12, 'Mojito'),
(13, 'Gitár'),
(14, 'Labda');


CREATE TABLE `termek_kategoriak` (
  `termek_id` int(11) NOT NULL,
  `kategoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `termek_kategoriak` (`termek_id`, `kategoria_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14);


CREATE TABLE `ugyfelek` (
  `ugyfel_id` int(11) NOT NULL,
  `ugyfel_nev` varchar(255) NOT NULL,
  `varos` varchar(255) DEFAULT NULL,
  `orszag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `visszateritesek` (
  `visszaterites_id` int(11) NOT NULL,
  `eladas_id` int(11) DEFAULT NULL,
  `datum_id` int(11) DEFAULT NULL,
  `mennyiseg` int(11) DEFAULT NULL,
  `osszeg` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `alkalmazottak`
  ADD PRIMARY KEY (`alkalmazott_id`);

ALTER TABLE `alkalmazotti_tevekenysegek`
  ADD PRIMARY KEY (`tevekenyseg_id`),
  ADD KEY `alkalmazott_id` (`alkalmazott_id`),
  ADD KEY `datum_id` (`datum_id`);

ALTER TABLE `beosztasok`
  ADD PRIMARY KEY (`beo_id`);

ALTER TABLE `beszallitok`
  ADD PRIMARY KEY (`beszallito_id`);

ALTER TABLE `beszerzesek`
  ADD PRIMARY KEY (`beszerzes_id`),
  ADD KEY `beszallito_id` (`beszallito_id`),
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `datum_id` (`datum_id`);

ALTER TABLE `datumok`
  ADD PRIMARY KEY (`datum_id`);

ALTER TABLE `eladasok`
  ADD PRIMARY KEY (`eladas_id`),
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `datum_id` (`datum_id`),
  ADD KEY `ugyfel_id` (`ugyfel_id`);

ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`kategoria_id`);

ALTER TABLE `raktarak`
  ADD PRIMARY KEY (`raktar_id`);

ALTER TABLE `raktarkeszlet_mozgasok`
  ADD PRIMARY KEY (`mozgas_id`),
  ADD KEY `termek_id` (`termek_id`),
  ADD KEY `datum_id` (`datum_id`),
  ADD KEY `raktar_id` (`raktar_id`);

ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termek_id`);

ALTER TABLE `termek_kategoriak`
  ADD PRIMARY KEY (`termek_id`,`kategoria_id`),
  ADD KEY `kategoria_id` (`kategoria_id`);

ALTER TABLE `ugyfelek`
  ADD PRIMARY KEY (`ugyfel_id`);

ALTER TABLE `visszateritesek`
  ADD PRIMARY KEY (`visszaterites_id`),
  ADD KEY `eladas_id` (`eladas_id`),
  ADD KEY `datum_id` (`datum_id`);

ALTER TABLE `alkalmazottak`
  MODIFY `alkalmazott_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `alkalmazotti_tevekenysegek`
  MODIFY `tevekenyseg_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `beosztasok`
  MODIFY `beo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `beszallitok`
  MODIFY `beszallito_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `beszerzesek`
  MODIFY `beszerzes_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `datumok`
  MODIFY `datum_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `eladasok`
  MODIFY `eladas_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE `kategoriak`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

ALTER TABLE `raktarak`
  MODIFY `raktar_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `raktarkeszlet_mozgasok`
  MODIFY `mozgas_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `termekek`
  MODIFY `termek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

ALTER TABLE `ugyfelek`
  MODIFY `ugyfel_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `visszateritesek`
  MODIFY `visszaterites_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `alkalmazotti_tevekenysegek`
  ADD CONSTRAINT `alkalmazotti_tevekenysegek_ibfk_1` FOREIGN KEY (`alkalmazott_id`) REFERENCES `alkalmazottak` (`alkalmazott_id`),
  ADD CONSTRAINT `alkalmazotti_tevekenysegek_ibfk_2` FOREIGN KEY (`datum_id`) REFERENCES `datumok` (`datum_id`);

ALTER TABLE `beszerzesek`
  ADD CONSTRAINT `beszerzesek_ibfk_1` FOREIGN KEY (`beszallito_id`) REFERENCES `beszallitok` (`beszallito_id`),
  ADD CONSTRAINT `beszerzesek_ibfk_2` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`termek_id`),
  ADD CONSTRAINT `beszerzesek_ibfk_3` FOREIGN KEY (`datum_id`) REFERENCES `datumok` (`datum_id`);

ALTER TABLE `eladasok`
  ADD CONSTRAINT `eladasok_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`termek_id`),
  ADD CONSTRAINT `eladasok_ibfk_2` FOREIGN KEY (`datum_id`) REFERENCES `datumok` (`datum_id`),
  ADD CONSTRAINT `eladasok_ibfk_3` FOREIGN KEY (`ugyfel_id`) REFERENCES `ugyfelek` (`ugyfel_id`);

ALTER TABLE `raktarkeszlet_mozgasok`
  ADD CONSTRAINT `raktarkeszlet_mozgasok_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`termek_id`),
  ADD CONSTRAINT `raktarkeszlet_mozgasok_ibfk_2` FOREIGN KEY (`datum_id`) REFERENCES `datumok` (`datum_id`),
  ADD CONSTRAINT `raktarkeszlet_mozgasok_ibfk_3` FOREIGN KEY (`raktar_id`) REFERENCES `raktarak` (`raktar_id`);

ALTER TABLE `termek_kategoriak`
  ADD CONSTRAINT `termek_kategoriak_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termekek` (`termek_id`),
  ADD CONSTRAINT `termek_kategoriak_ibfk_2` FOREIGN KEY (`kategoria_id`) REFERENCES `kategoriak` (`kategoria_id`);

ALTER TABLE `visszateritesek`
  ADD CONSTRAINT `visszateritesek_ibfk_1` FOREIGN KEY (`eladas_id`) REFERENCES `eladasok` (`eladas_id`),
  ADD CONSTRAINT `visszateritesek_ibfk_2` FOREIGN KEY (`datum_id`) REFERENCES `datumok` (`datum_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;