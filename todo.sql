-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 09:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists`
(
    `ID`         int(10) NOT NULL,
    `id_user`    int(10) UNSIGNED NOT NULL,
    `title`      varchar(50) CHARACTER SET utf8 NOT NULL,
    `color`      varchar(24) CHARACTER SET utf8 NOT NULL,
    `updated_at` datetime                       NOT NULL DEFAULT current_timestamp(),
    `created_at` datetime                       NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`ID`, `id_user`, `title`, `color`, `updated_at`, `created_at`)
VALUES 
    (-3, 0, 'Tomorrow', 'bg-cyan-500', '2022-05-09 20:21:04', '2022-05-09 20:21:04'),
    (-2, 0, 'Today', 'bg-blue-500', '2022-05-09 03:56:32', '2022-05-09 03:56:32'),
    (-1, 0, 'General', 'bg-green-500', '2022-05-09 03:56:32', '2022-05-09 03:56:32');


-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks`
(
    `ID`          int(11) NOT NULL,
    `id_user`     int(10) UNSIGNED NOT NULL,
    `id_list`     int(11) NOT NULL,
    `title`       varchar(50) NOT NULL,
    `description` varchar(500) DEFAULT NULL,
    `deadline`    datetime     DEFAULT NULL,
    `priority`    varchar(25)  DEFAULT NULL,
    `is_complete` int(1) NOT NULL,
    `created_at`  datetime    NOT NULL,
    `updated_at`  datetime    NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `ID`         int(10) UNSIGNED NOT NULL,
    `name`       varchar(200) NOT NULL,
    `email`      varchar(400) NOT NULL,
    `password`   varchar(64)  NOT NULL,
    `created_at` datetime     NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
    ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
    ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
    MODIFY `ID` int (10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
    MODIFY `ID` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `ID` int (10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
