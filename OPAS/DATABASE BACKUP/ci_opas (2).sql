-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 05:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_opas`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `c_user_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_belongs_to` int(11) NOT NULL,
  `c_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_user_id`, `c_name`, `c_belongs_to`, `c_created_at`) VALUES
(1, 1, 'Laptops', 1, '2018-08-11 09:55:25'),
(2, 1, 'Iphone', 1, '2018-08-11 09:55:47'),
(3, 1, 'Microsoft', 2, '2018-08-11 09:56:15'),
(4, 1, 'Monitors', 2, '2018-08-11 09:56:26'),
(5, 1, 'Cafe', 3, '2018-08-11 09:56:39'),
(6, 1, 'Fast food', 3, '2018-08-11 09:57:03'),
(7, 1, 'Restaurants', 4, '2018-08-11 09:57:42'),
(8, 1, 'Food Track', 4, '2018-08-11 09:57:58'),
(9, 1, 'Farms', 2, '2018-08-11 09:58:22'),
(10, 1, 'Mens Wears', 3, '2018-08-11 09:58:36'),
(11, 1, 'It Jobs', 1, '2018-08-11 09:58:50'),
(12, 1, 'Bus', 2, '2018-08-11 09:59:09'),
(13, 1, 'Cats', 3, '2018-08-11 09:59:27'),
(14, 1, 'Cleaning', 1, '2018-08-11 09:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_message` text NOT NULL,
  `comment_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_name`, `comment_email`, `comment_message`, `comment_created_at`) VALUES
(1, 15, 'bilal', 'bilal@gmail.com', 'Great post', '2018-07-30 07:05:03'),
(2, 14, 'bilal', 'bilal@gmail.com', 'Great job', '2018-07-30 07:16:06'),
(3, 14, 'farooq', 'farooq@gmail.com', 'Nice work.', '2018-07-30 07:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `m_c_id` int(11) NOT NULL,
  `m_c_name` varchar(255) NOT NULL,
  `m_c_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`m_c_id`, `m_c_name`, `m_c_created_at`) VALUES
(1, 'Electronics', '2018-08-11 13:27:59'),
(2, 'Restaurants', '2018-08-11 13:27:59'),
(3, 'Real Estate', '2018-08-11 13:28:18'),
(4, 'Shoppings', '2018-08-11 13:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `p_category_id` int(11) NOT NULL,
  `p_user_id` int(11) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_slug` varchar(255) NOT NULL,
  `p_body` text NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `p_category_id`, `p_user_id`, `p_title`, `p_slug`, `p_body`, `p_image`, `p_created_at`) VALUES
(1, 2, 1, 'post one', 'post-one', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non odio a erat pharetra molestie. Phasellus auctor nisl vitae arcu sagittis ultrices. Sed ipsum velit, efficitur sed ligula ac, euismod mattis massa. Vivamus scelerisque sodales rutrum. Vivamus pellentesque, sem vitae tristique pretium, augue dui hendrerit diam, non gravida purus odio quis massa. Vivamus vitae velit neque. Vivamus aliquam porttitor sapien. Proin vulputate arcu pharetra, consequat sapien a, dictum tortor. Aenean iaculis dictum vestibulum.</p>', 'noimage.jpg', '2018-08-08 10:54:25'),
(2, 5, 1, 'post two', 'post-two', '<p>Duis rhoncus aliquet dictum. Etiam eget lacus non mi tempus tempus non nec ante. Suspendisse potenti. Morbi a porttitor tellus. In efficitur dolor quis leo tempor sollicitudin. Nullam leo leo, elementum ac sapien id, laoreet sodales dolor. Morbi ultrices diam ipsum, ut aliquet nibh fermentum commodo. Vivamus tincidunt risus eu dolor commodo porta ut a tortor. Duis luctus libero id odio fringilla rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin elit risus, interdum nec volutpat sit amet, lobortis id dolor. Sed augue felis, dictum id nunc eu, egestas tempor odio. Maecenas tincidunt metus in luctus venenatis.</p>\r\n', 'noimage.jpg', '2018-08-08 10:54:48'),
(3, 3, 2, 'post one', 'post-one', '<p>Proin eu risus ipsum. Curabitur efficitur sapien nulla, vel scelerisque ante ullamcorper nec. Mauris eu malesuada purus. Proin non fermentum odio. Phasellus eu pulvinar eros, in molestie justo. Quisque dui nulla, viverra a imperdiet quis, scelerisque eget nunc. Integer lobortis arcu eget risus commodo semper. Sed at ultricies urna. Quisque eget tellus lorem. Nullam iaculis odio dolor, at dictum metus hendrerit vel.</p>', 'noimage.jpg', '2018-08-08 10:57:06'),
(4, 4, 2, 'post two', 'post-two', '<p>Morbi tristique aliquam condimentum. Vestibulum porttitor, nunc et consequat sodales, nunc lectus suscipit tellus, a laoreet risus purus id purus. Quisque eu aliquet nisi, eget commodo velit. Morbi cursus ut ex id pretium. In porta malesuada tellus, vel pulvinar quam mattis et. Maecenas cursus blandit dapibus. Aliquam erat volutpat. Etiam nec nisl auctor, euismod leo id, porttitor sem. Nunc mi diam, aliquam ac placerat ut, rhoncus ut tellus. Nunc gravida consectetur laoreet. Integer enim dui, vestibulum quis dictum sed, efficitur sit amet diam.</p>', 'noimage.jpg', '2018-08-08 10:57:25'),
(5, 4, 2, 'post two', 'post-two', '<p>Morbi tristique aliquam condimentum. Vestibulum porttitor, nunc et consequat sodales, nunc lectus suscipit tellus, a laoreet risus purus id purus. Quisque eu aliquet nisi, eget commodo velit. Morbi cursus ut ex id pretium. In porta malesuada tellus, vel pulvinar quam mattis et. Maecenas cursus blandit dapibus. Aliquam erat volutpat. Etiam nec nisl auctor, euismod leo id, porttitor sem. Nunc mi diam, aliquam ac placerat ut, rhoncus ut tellus. Nunc gravida consectetur laoreet. Integer enim dui, vestibulum quis dictum sed, efficitur sit amet diam.</p>', 'noimage.jpg', '2018-08-08 10:57:25'),
(6, 1, 1, 'post three', 'post-three', '<p>Mauris at erat viverra, convallis justo eu, facilisis dolor. Integer sollicitudin consequat porttitor. Maecenas id viverra ante. Curabitur dictum elit convallis turpis sagittis dapibus. Suspendisse aliquet et tortor a tempor. Nunc aliquam dapibus diam et cursus. Donec posuere ac eros a porttitor. Duis massa ligula, pellentesque vitae iaculis a, condimentum non purus. Praesent aliquam quam ac ex pulvinar rhoncus. In vehicula erat felis. Cras molestie sem non cursus varius. Curabitur tempor diam et elit scelerisque pellentesque. Donec hendrerit cursus tortor, ac viverra ipsum pellentesque in.</p>\r\n', 'noimage.jpg', '2018-08-08 10:57:52'),
(7, 6, 1, 'post four', 'post-four', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'noimage.jpg', '2018-08-11 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_zipcode` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `u_register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_zipcode`, `u_email`, `username`, `password`, `u_register_date`) VALUES
(1, 'bilal', '47070', 'bilal@gmail.com', 'bilal', '5ae1c881ad1d8d750f15c232a3232379', '2018-07-31 07:25:04'),
(2, 'farooq', '4568', 'farooq@gmail.com', 'farooq', '7a1c7943385e8cb8dc0b74ff4d3c9844', '2018-07-31 07:26:44'),
(3, 'muhammad', '98788', 'm@gmail.com', 'muhammad', 'a7777999e260290f68a1455cacdabf6c', '2018-07-31 07:37:38'),
(4, 'abcef', '09089', 'abcdef@g.com', 'abcdef', 'e80b5017098950fc58aad83c8c14978e', '2018-07-31 07:39:28'),
(5, 'jhkjhkjh', 'jkh8890', 'hkjH@jhjkh.kjhkj', 'jkhkhkh', 'dcddb75469b4b4875094e14561e573d8', '2018-07-31 07:40:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`m_c_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `m_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
