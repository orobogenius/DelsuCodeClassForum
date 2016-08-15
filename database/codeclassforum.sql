-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 01:46 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeclassforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Technology', ''),
(2, 'Politics', ''),
(3, 'Sports', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_thread` int(11) NOT NULL,
  `post_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_thread`, `post_by`) VALUES
(7, 'This thread was created for the web development folks. Feel free to ask any questions concerning web development.\n\nPS: Any post outside web development will be deleted and the poster might get kicked out of the thread.\n\nCheers!!!', '2016-08-12 17:11:27', 15, 4),
(21, 'Nice of you to create a topic for web development. The fun starts now!!!', '2016-08-12 18:25:39', 15, 4),
(23, 'New post', '2016-08-12 18:46:23', 15, 5),
(24, 'The act of designing and developing contents for the web. It involves technologies such as JavaScript, Ajax, PHP, HTML, CSS, Python, SQL etc.\r\n\r\nThis thread was created for the web development folks. Feel free to ask any questions concerning web development.\r\n\r\nPS: Any post outside web development will be deleted and the poster might get kicked out of the thread.\r\n\r\nCheers!!!', '2016-08-12 18:46:59', 15, 5),
(25, 'AI and Robotics, Turing Machine, Automata Theory e.t.c', '2016-08-12 18:49:37', 16, 5),
(26, 'The corrupt nature of Nigerian Politics and the Nigerian Government in General.', '2016-08-12 18:50:06', 17, 5),
(27, 'The law of the common people.', '2016-08-12 18:50:22', 18, 5),
(28, 'The beautiful game of Soccer.', '2016-08-12 18:50:43', 19, 5),
(29, 'I do love automata theory.', '2016-08-12 18:51:17', 16, 4),
(30, 'New Comment', '2016-08-12 19:01:07', 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_name` varchar(50) NOT NULL,
  `thread_date` datetime NOT NULL,
  `thread_desc` text NOT NULL,
  `original_post` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_name`, `thread_date`, `thread_desc`, `original_post`, `cat_id`, `created_by`) VALUES
(15, 'Web Development', '2016-08-12 17:11:27', 'The act of designing and developing contents for the web. It involves technologies such as JavaScript, Ajax, PHP, HTML, CSS, Python, SQL etc.', 'This thread was created for the web development folks. Feel free to ask any questions concerning web development.\r\n\r\nPS: Any post outside web development will be deleted and the poster might get kicked out of the thread.\r\n\r\nCheers!!!', 1, 4),
(16, 'Artificial Intelligence', '2016-08-12 18:49:37', 'AI and Robotics, Turing Machine, Automata Theory e.t.c', 'AI and Robotics, Turing Machine, Automata Theory e.t.c', 1, 5),
(17, 'Corruption in Nigerian Politics', '2016-08-12 18:50:06', 'The corrupt nature of Nigerian Politics and the Nigerian Government in General.', 'The corrupt nature of Nigerian Politics and the Nigerian Government in General.', 2, 5),
(18, 'Law and Order', '2016-08-12 18:50:22', 'The law of the common people.', 'The law of the common people.', 2, 5),
(19, 'Footbal', '2016-08-12 18:50:43', 'The beautiful game of Soccer.', 'The beautiful game of Soccer.', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_level` int(11) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_gender`, `age`, `user_name`, `user_pass`, `user_email`, `user_level`, `reg_date`) VALUES
(1, 'John', 'Smith', 'Male', 18, 'codeclass', '123456', 'orobogenius@gmail.com', 1, '2016-08-05 09:31:41'),
(4, 'Christian', 'Ade', 'Male', 18, 'root', 'this.mysql', 'chrisbails@openmailbox.org', 1, '2016-08-08 13:27:15'),
(5, 'Orobo', 'Ozoka', 'Male', 6, 'orobogenius', '0000000', 'orobolucky@gmail.com', 1, '2016-08-12 18:46:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_thread` (`post_thread`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `created_by` (`created_by`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_thread`) REFERENCES `threads` (`thread_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
