-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jan 11. 12:36
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mindenallat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `profilID` int(11) NOT NULL,
  `cim` varchar(75) NOT NULL,
  `allat_kat` varchar(100) NOT NULL,
  `allat_fele` varchar(100) NOT NULL,
  `allat_fajta` varchar(120) NOT NULL,
  `allat_kora` int(11) NOT NULL,
  `allat_neme` varchar(100) NOT NULL,
  `allat_szine` varchar(100) NOT NULL,
  `allat_ara` int(11) NOT NULL,
  `kepek` varchar(1000) NOT NULL,
  `allat_leiras` varchar(2000) NOT NULL,
  `teny_nev` varchar(500) NOT NULL,
  `teny_email` varchar(100) NOT NULL,
  `teny_tel` varchar(20) NOT NULL,
  `teny_cim` varchar(500) NOT NULL,
  `kiemelt` int(11) DEFAULT NULL,
  `torolve` int(11) DEFAULT NULL,
  `megtekintes` int(11) DEFAULT NULL,
  `datum` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`ID`, `profilID`, `cim`, `allat_kat`, `allat_fele`, `allat_fajta`, `allat_kora`, `allat_neme`, `allat_szine`, `allat_ara`, `kepek`, `allat_leiras`, `teny_nev`, `teny_email`, `teny_tel`, `teny_cim`, `kiemelt`, `torolve`, `megtekintes`, `datum`) VALUES
(35375, 12045, 'Szép Ló', 'Haziallat', 'Kecske', 'Terrier', 25, 'Nőstény', 'Barna', 59000, '659fc9feb47415.46944637.webp,', 'Nagyon szép a ló, tökéletes minden és tényleg nagyon jó', 'Mihály Ádám', 'adammihaly05@gmail.com', '+381691460672', '24000, Szabadka, Szerbia, Jasenovacka 26/B', NULL, NULL, NULL, '2024-01-11 11:59:11'),
(37008, 12045, 'Szép németjuhász', 'Haziallat', 'Kutya', 'Németjuhász', 36, 'Hím', 'Fekete', 50000, '659e7e1f0545b3.13449659.webp,659e7e1f057e57.71490762.webp,', 'Nagyon szép kutya. Hív és okos. Be van tanítva. Tudja a következőket: ül, fekszik, pacsi', 'Mihály Ádám', 'adammihaly05@gmail.com', '+381691460672', '24000, Szabadka, Szerbia, Jasenovacka 26/B', NULL, NULL, NULL, '2024-01-10 12:23:11');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `token` varchar(100) NOT NULL,
  `v_code` int(11) DEFAULT NULL,
  `ver` int(11) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `posts` int(11) DEFAULT NULL,
  `datum` datetime DEFAULT current_timestamp(),
  `csomag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `pwd`, `token`, `v_code`, `ver`, `ip`, `posts`, `datum`, `csomag`) VALUES
(12045, 'Adamcsoficsial', 'admihmac05@gmail.com', '$2y$10$gmdoYyhAIN4XU0wRjbKP5eAvCEhG/M1.tjdOVmrZrPTRLdyraT7wC', '34297238018210391', 96123, 1, '127.0.0.1', 2, '2024-01-09 22:21:28', NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `profilID` (`profilID`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`profilID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
