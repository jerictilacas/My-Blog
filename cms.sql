-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2021 at 09:25 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(30, 'Programming'),
(32, 'Project Websites');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(49, 173, 'Daniel Ek', 'danielek@spotify.com', 'bad move dude', 'approved', '2019-10-09'),
(41, 143, 'Haze', 'yellyhaze@gmail.com', 'Interesting', 'unapproved', '2019-10-03'),
(42, 143, 'Pein', 'peingaming@gmail.com', 'Savage', 'unapproved', '2019-10-03'),
(43, 174, 'Mark Zuckerberg', 'markzucker@gmail.com', 'You ruined my life dude', 'approved', '2019-10-09'),
(44, 175, 'Jawed Karim', 'jawedkarim@gmail.com', 'i will report this to police', 'approved', '2019-10-09'),
(45, 175, 'Steve Chen', 'stevechen@gmail.com', 'fucking hacker', 'approved', '2019-10-09'),
(46, 175, 'Chad Hurley', 'chadhurley@mobile.com', 'hey this is our youtube', 'approved', '2019-10-09'),
(47, 176, 'Larry Page', 'iamlarry@google.com', 'plagiarism you idiot', 'approved', '2019-10-09'),
(48, 176, 'Sergey Brin', 'serge@google.com', 'this is unacceptable idea', 'approved', '2019-10-09'),
(50, 173, 'Martin Lorentzon', 'lorentzon@spotify.com', 'your end is near man, watch out', 'approved', '2019-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(142, 30, 'The 2019 Web Development (Frontend + Backend) RoadMap', 'Jerico Tilacas', '2019-10-03', 'learn-web-development.jpg', '<p>Hello Guys, I hope you are doing great in 2019. I am sure you all have already made your goals by now and thinking about how to achieve those goals. If one of your goals is to learn to code or to become a web developer in 2019 then I have something great to share with you today, the <strong>2019 Web Developer RoadMap.&nbsp;</strong></p>\r\n<p>This is an excellent illustration on how to become a web developer and guide you on how you can learn and master Web Development.</p>\r\n<p>It is a collection of differenct paths to learning front-end , back-end and all other things a web developer should know. You will not just know about web development but also about essential programming stuff which is important for all kind of programmers and software developers.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>#WebDevelopmentRoadMap2019 #Programmer</strong></p>', 'php, web, html, css', '12', 'Draft'),
(175, 30, 'YouTube Clone from Scratch: JavaScript PHP and MySQL', 'Jerico Tilacas', '2019-10-16', 'youtube.jpg', '<p>I have created a real video upload site like <strong>Youtube&nbsp;</strong>inluding features such as uploading and watching videos, like and comment on other videos.</p>\r\n<p><strong>#Youtube</strong></p>', 'youtube, php, javascript', '14', 'Published'),
(176, 30, 'Google search engine clone: JavaScript PHP and MySQL', 'Jerico Tilacas', '2019-10-16', 'google.jpg', '<p>Kindly visit my very own <strong>Google</strong> search engine website and search for variety information such as websites, pictures and other relevant important things.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>#Google #SearchEngine</strong>&nbsp;</p>', 'google, php, javascript', '17', 'Published'),
(173, 30, 'Spotify Clone from Scratch: JavaScript PHP and MySQL', 'Jerico Tilacas', '2019-10-16', 'spotify.jpg', '<p>I have created my own music streaming service like&nbsp;<strong>Spotify&nbsp;</strong>built with PHP, JavaScript and MySQL and it will surely&nbsp;amaze anybody that sees it<strong>.</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>#Spotify #CreateYourOwnMusic</strong></p>', 'spotify, php, javascript', '12', 'Published'),
(174, 30, 'Social Network from Scratch: JavaScript PHP + MySQL', 'Jerico Tilacas', '2019-10-16', 'facebook.jpg', '<p>I have created a full scale social networking website like Facebook and Twitter including features such as newsfeeds, profiles, friend system, chat system, trending posts and much more!</p>\r\n<p><strong>#Facebook #SocialNetwork #Twitter</strong></p>', 'facebook, php, javascript', '8', 'Published'),
(143, 30, 'Code War + Hactoberfest', 'Jerico Tilacas', '2019-10-03', '0_ngXgBNNdx6iiWP8q.png', '<p>Happy <strong>#Hacktoberfest</strong> 2019 everyone !</p>\r\n<p>In order to celebrate this day, I would like to show you that Code War is ready for this hacktoberfest!</p>\r\n<p>If this is the first time you want to invest in the open source world, I strongly encourage you to read the official Hacktoberfest websites.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>#CodeWar #Hacktoberfest2019 #Programming</strong></p>', 'codes, hack', '10', 'Draft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_image`, `user_role`, `randSalt`) VALUES
(39, 'jerico', 'Jerico', 'Tilacas', 'jerico@leadingedgeweb.com.au', '$2y$10$iusesomecrazystrings2uEcK3WMZXyFipbODMFZ7/9udqooFXAF2', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(33, 'admin', 'Flex', 'Developer', 'root@leadingedgeweb.com.au', '$2y$10$iusesomecrazystrings2uwxqVj7J7zQRBheEH.fn4YwpBoRp5IC6', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(38, 'shiela', 'Shiela Anne', 'Llena', 'shiellyllena@gmail.com', '$2y$10$iusesomecrazystrings2udqX8aP.NMzvV0ELGgSugKdbtyms.Wy.', '', 'subscriber', '$2y$10$iusesomecrazystrings22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
