-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Dez 2022 um 17:36
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Datenbank: `imsgames`
--
DROP DATABASE IF EXISTS `imsgames`;
CREATE DATABASE IF NOT EXISTS `imsgames` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `imsgames`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comment`
--

DROP TABLE IF EXISTS `comment`;

CREATE TABLE IF NOT EXISTS `comment` (
    `id` INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `comment` TEXT NOT NULL,
    `game_id` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    FOREIGN KEY (`game_id`) REFERENCES `game`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `statistic`
--

DROP TABLE IF EXISTS `statistic`;

CREATE TABLE IF NOT EXISTS `statistic` (
    `id` INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `playtime` INTEGER NOT NULL,
    `highscore` INTEGER NOT NULL,
    `game_id` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    FOREIGN KEY (`game_id`) REFERENCES `game`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `game`
--

DROP TABLE IF EXISTS `game`;

CREATE TABLE IF NOT EXISTS `game` (
    `id` INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(64) NOT NULL,
    `dir` TEXT NOT NULL,
    `description` TEXT NOT NULL
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;

CREATE TABLE IF NOT EXISTS `user` (
    `id` INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(32) NOT NULL UNIQUE,
    `email` VARCHAR(32) UNIQUE,
    `password` VARCHAR(64) NOT NULL
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `request`
--

DROP TABLE IF EXISTS `request`;

CREATE TABLE IF NOT EXISTS `request` (
    `id` INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(32) NOT NULL,
    `link` VARCHAR(64) NOT NULL,
    `text` TEXT NOT NULL
);

--
-- Daten für Tabelle `game`
--
INSERT INTO `game` (`id`, `name`, `dir`, `description`) VALUES
(1, 'TicTacToe', 'TicTacToe', 'Das Ziel ist es, 3 X oder O vertikal, horizontal oder diagonal anzuordnen. \r\nMan spielt entweder zu zweit oder gegen sich selbst. Um ein Symbol zu setzen, muss man nur auf das gewählte Kästchen klicken. Derjenige, welcher zuerst 3 Symbole in der richtigen Anordnung hat, hat gewonnen. Konnte am Ende der Runde noch keine Reihe erzielt werden, gibt es ein Unentschieden. '),
(2, '2048', '2048', 'Das Ziel ist es, eine höchstmögliche Punktzahl zu erlangen.\r\nMan steuert mit den Pfeiltasten. Zwei gliche Zahlen können zusammengeführt werden. Somit erlangt man eine höhere Zahl. Desto höhere Zahlen man zusammenführt, desto mehr Punkte punkte erlangt man.'),
(3, 'Catch The Ball', 'basketball', 'Das Ziel ist es, alle Bälle einzufangen. Damit man dies auch erreichen kann, muss man mit den Pfeiltasten links und rechts die Person steuern. Um einen Ball einzufangen, muss man darunter stehen. Fällt ein Ball auf den Boden, ist GameOver.'),
(4, 'Chicken', 'chicken', 'Das Ziel ist es, so viele Hühner wie möglich \"einzufangen\". Man hat eine begrenzte Zeit, um die Hühner zu bekommen. Um ein Huhn einzufangen, muss man auf dieses klicken. Desto mehr Hühner man anklickt, desto mehr Punkte erreicht man. '),
(5, 'PingPong', 'PingPong', 'In diesem Spiel spielt man gegen den Computer. Das Ziel ist es, so viele Runden wie möglich gegen den Computer zu gewinnen. Der Ball muss immer auf den Schläger treffen, damit der Ball wieder in die andere Richtung spickt. Man steuert mit den Tasten \"w\" und \"s\". Die Taste \"w\" bewegt den Schläger nach oben, \"s\" nach unten.'),
(6, 'Snake', 'Snake', 'Das Ziel dieses spieles ist es, die Schlange so lange wie möglich zu bekommen. Dies kann erreicht werden, indem man üer die roten Kästchen (Äpfel) rutscht. Gesteuert wird mit \"wsad\". \"w\" um nach oben zu schlängeln, \"d\" nach rechts, \"a\" nach links und \"s\" nach unten. Fährt man in sich selbst ist GameOver. Wenn man an die Wand gelangt kommt man auf der anderen wieder heraus.');

COMMIT;