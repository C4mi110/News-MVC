-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Lis 2017, 19:37
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `news`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

CREATE TABLE `autorzy` (
  `autorzyID` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`autorzyID`, `imie`, `nazwisko`) VALUES
(1, 'Jan', 'Kowalski'),
(2, 'Henryk', 'Okular'),
(3, 'Juliusz', 'Słowacki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupy`
--

CREATE TABLE `grupy` (
  `grupyID` int(11) NOT NULL,
  `nazwa` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `grupy`
--

INSERT INTO `grupy` (`grupyID`, `nazwa`) VALUES
(1, 'Administrator'),
(2, 'Uzytkownik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `komentarzeID` int(11) NOT NULL,
  `newsyID` int(11) NOT NULL,
  `uzytkownicyID` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `zablokowany` varchar(1) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`komentarzeID`, `newsyID`, `uzytkownicyID`, `data`, `tresc`, `zablokowany`) VALUES
(1, 42, 1, '2017-11-02 22:38:57', 'Lorem ipsum dolor sit amet', '0'),
(2, 42, 17, '2017-11-02 22:39:19', 'test ban', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `Tytul` text COLLATE utf8_polish_ci NOT NULL,
  `Tresc` text COLLATE utf8_polish_ci NOT NULL,
  `obrazek` text COLLATE utf8_polish_ci NOT NULL,
  `autorzyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`news_id`, `Data`, `Tytul`, `Tresc`, `obrazek`, `autorzyID`) VALUES
(31, '2017-11-02 22:03:01', 'I artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img1.jpg', 1),
(32, '2017-11-02 22:03:02', 'II artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img2.jpg', 2),
(33, '2017-11-02 22:03:03', 'III artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img1.jpg', 3),
(37, '2017-11-02 22:03:04', 'IV artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img1.jpg', 3),
(38, '2017-11-02 22:03:05', 'V artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img2.jpg', 2),
(39, '2017-11-02 22:03:06', 'VI artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img1.jpg', 1),
(40, '2017-11-02 22:03:07', 'VII artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img1.jpg', 3),
(41, '2017-11-02 22:03:08', 'VIII artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img2.jpg', 2),
(42, '2017-11-02 22:03:09', 'IX artykuÅ‚', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultrices mattis lacus, sed bibendum lacus. Nulla id libero eget ex rutrum facilisis. Ut finibus vehicula erat vitae pellentesque. Nunc turpis velit, fermentum in metus ornare, sodales venenatis massa. Nullam turpis nunc, fermentum eget blandit a, consectetur ac ligula. Maecenas est augue, pellentesque non tincidunt eu, commodo ac orci. Quisque in molestie nisi, non venenatis mi. Quisque sem eros, interdum in malesuada in, volutpat vitae libero. Pellentesque pharetra sit amet diam id convallis. Aliquam pellentesque, metus in finibus laoreet, dui lectus sodales nulla, eu lacinia magna mi quis eros.\r\n\r\nAliquam erat volutpat. Phasellus rhoncus neque risus, sit amet bibendum ex rhoncus a. Suspendisse aliquam eros sit amet ipsum iaculis feugiat. Mauris egestas sapien sem, nec pharetra sem molestie vel. Maecenas eget nulla vel est varius consectetur. Aliquam congue lobortis efficitur. Fusce convallis, lectus vitae dapibus efficitur, ipsum dui dictum elit, in porttitor metus sapien vitae nunc.\r\n\r\nSed commodo diam diam, id ultrices nisl mollis ac. Aenean et molestie nibh. Fusce eleifend imperdiet nibh et feugiat. Donec a quam cursus, tempus sem eu, tincidunt arcu. Aliquam sollicitudin eros orci, ac efficitur justo pellentesque nec. Donec ultricies finibus lectus, nec finibus erat mattis non. Phasellus auctor massa eu justo porttitor gravida. Nulla imperdiet risus quis lacinia dapibus.\r\n\r\nNam vel accumsan risus. Vestibulum vitae metus nec magna hendrerit hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque sollicitudin iaculis egestas. Praesent at porta augue, aliquam aliquam velit. Sed a feugiat sapien, vitae rutrum nunc. Nulla facilisi. Nam sagittis fringilla sem eget eleifend. In magna enim, pellentesque non odio luctus, tincidunt pharetra elit. Nam elementum quam et venenatis fringilla. Sed lacinia lorem nec molestie rutrum. Pellentesque pretium tellus libero. In eu pharetra enim. Pellentesque non dolor ante. Quisque vitae augue fermentum sem placerat malesuada ac sit amet eros. Integer condimentum in turpis quis sodales.\r\n\r\nSuspendisse magna neque, sollicitudin ac massa eget, interdum bibendum mi. Aliquam pharetra cursus urna ac eleifend. Integer lorem odio, placerat at mi a, viverra ullamcorper orci. Vivamus eu lectus eget dui iaculis pretium tempor non velit. Curabitur eu egestas neque, vitae malesuada nulla. Phasellus nec enim nec quam malesuada semper quis sit amet justo. Cras vel feugiat nulla. Duis posuere convallis diam ac pretium. Cras malesuada, lorem quis suscipit viverra, lacus sem venenatis mauris, ut consequat nunc leo ut odio. In at ex purus. Aenean tempus odio massa.', './images/uploads/img1.jpg', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `ocenyID` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `uzytkownicyID` int(11) NOT NULL,
  `newsyID` int(11) NOT NULL,
  `ocena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`ocenyID`, `data`, `uzytkownicyID`, `newsyID`, `ocena`) VALUES
(1, '2017-11-02 22:38:35', 1, 42, 1),
(2, '2017-11-02 22:39:25', 17, 42, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `uzytkownicyID` int(11) NOT NULL,
  `login` varchar(43) CHARACTER SET latin1 NOT NULL,
  `haslo` varchar(43) CHARACTER SET latin1 NOT NULL,
  `grupyID` int(11) NOT NULL,
  `plec` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `dataUr` date NOT NULL,
  `wojewodztwo` text COLLATE utf8_polish_ci NOT NULL,
  `zablokowany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`uzytkownicyID`, `login`, `haslo`, `grupyID`, `plec`, `dataUr`, `wojewodztwo`, `zablokowany`) VALUES
(1, 'Administrator', 'ab2467706ba38309fafcc9d86d79291eacbaaed1', 1, 'M', '1990-10-10', 'dolnoslaskie', 0),
(17, 'user', 'ab2467706ba38309fafcc9d86d79291eacbaaed1', 2, 'M', '1990-10-10', 'dolnoslaskie', 0),
(18, 'hammer', 'ab2467706ba38309fafcc9d86d79291eacbaaed1', 2, 'M', '1990-10-10', 'zachodniopomorskie', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `autorzy`
--
ALTER TABLE `autorzy`
  ADD PRIMARY KEY (`autorzyID`);

--
-- Indexes for table `grupy`
--
ALTER TABLE `grupy`
  ADD PRIMARY KEY (`grupyID`);

--
-- Indexes for table `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`komentarzeID`),
  ADD KEY `uzytkownicyID` (`uzytkownicyID`),
  ADD KEY `newsyID` (`newsyID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `autorzyID` (`autorzyID`);

--
-- Indexes for table `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`ocenyID`),
  ADD KEY `uzytkownicyID` (`uzytkownicyID`,`newsyID`),
  ADD KEY `oceny_ibfk_1` (`newsyID`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`uzytkownicyID`),
  ADD KEY `kategoria` (`grupyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  MODIFY `autorzyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `grupy`
--
ALTER TABLE `grupy`
  MODIFY `grupyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `komentarzeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `ocenyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `uzytkownicyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`uzytkownicyID`) REFERENCES `uzytkownicy` (`uzytkownicyID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarze_ibfk_2` FOREIGN KEY (`newsyID`) REFERENCES `news` (`news_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`autorzyID`) REFERENCES `autorzy` (`autorzyID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD CONSTRAINT `oceny_ibfk_1` FOREIGN KEY (`newsyID`) REFERENCES `news` (`news_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `oceny_ibfk_2` FOREIGN KEY (`uzytkownicyID`) REFERENCES `uzytkownicy` (`uzytkownicyID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `uzytkownicy_ibfk_1` FOREIGN KEY (`grupyID`) REFERENCES `grupy` (`grupyID`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
