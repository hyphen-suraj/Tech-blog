-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 07:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogging`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(2) NOT NULL,
  `cat_title` varchar(235) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Java'),
(2, 'Python'),
(13, 'OOP'),
(15, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(3) NOT NULL,
  `comm_author` varchar(255) NOT NULL,
  `comm_content` text NOT NULL,
  `comm_date` date NOT NULL,
  `comm_status` varchar(255) NOT NULL,
  `comm_post_id` int(3) NOT NULL,
  `comm_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comm_id`, `comm_author`, `comm_content`, `comm_date`, `comm_status`, `comm_post_id`, `comm_email`) VALUES
(6, 'Suraj kumar jha', 'ddddd', '2020-02-09', 'Unapproved', 1, 'user@admin.com'),
(7, 'Suraj kumar jha', 'vvvvvhjv', '2020-02-09', 'Unapproved', 1, 'user@admin.com'),
(8, 'Suraj kumar jha', 'kjbdjgsfkjhgdfsl', '2020-02-09', 'Approved', 1, 'user@admin.com'),
(9, 'ncjxg.kjxf', 'bbbb', '2020-02-09', 'Approved', 5, 'user@admin.com'),
(10, 'Suraj kumar jha', 'bbb', '2020-02-09', 'Approved', 5, 'event@admin.com'),
(12, '', '', '2020-03-05', 'draft', 9, ''),
(13, 'Suraj kumar jha', '', '2020-03-05', 'draft', 9, ''),
(14, 'Suraj kumar jha', '', '2020-03-05', 'draft', 9, ''),
(15, 'nfuyhjfkj,', 'mngyiulgk;ol/', '2020-03-07', 'Approved', 1, 'kumarjhasuraj6@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(5) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'java', 'dfghjkl', '2020-03-07', 'java.png', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>\r\n', 'AI,machine', 12, 'published'),
(5, 1, 'py', 'xcvbnm,.dsfghjk', '2020-03-07', 'download.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>\r\n', 'AI,machine', 18, 'published'),
(7, 1, 'Ai', 'dfghjkl', '2020-03-07', 'download.jpg', '<p>nbchg</p>\r\n', 'AI,machine,c++', 4, 'published'),
(9, 1, 'fhsgladfsli', 'kjsbgvidhgi', '2020-02-22', 'java.png', 'kjzshkbrydiuethvbiusvyherakbtuheritbuearibthoer', 'AI,machine,c++', 19, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_firstname` varchar(225) NOT NULL,
  `user_lastname` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(225) NOT NULL,
  `rant_solt` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `rant_solt`) VALUES
(20, 'opt6@lpu.com', '123', 'Suraj', 'jhaguukghv', 'event123@admin.com', 'java.png', 'admin', ''),
(21, 'suraj', '321', 'Suraj', 'jhaguukghv', 'event123@admin.com', 'java.png', 'admin', ''),
(22, 'qqq', 'qqq', 'Suraj', 'jha', 'kumarjhasuraj6@gmail.com', '', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
