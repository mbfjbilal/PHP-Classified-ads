-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 11:26 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

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
  `c_name` varchar(255) NOT NULL,
  `c_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_created_at`) VALUES
(1, 'auto', '2018-07-23 10:05:24'),
(2, 'clothes', '2018-07-23 10:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `p_category_id` int(11) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_slug` varchar(255) NOT NULL,
  `p_body` text NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `p_category_id`, `p_title`, `p_slug`, `p_body`, `p_image`, `p_created_at`) VALUES
(1, 1, 'Post One', 'post-one', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', '2018-07-19 05:41:53'),
(2, 2, 'Post Two', 'post-two', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a rutrum metus. Aliquam erat volutpat. Donec ultrices pharetra urna, at accumsan nisl auctor nec. In finibus tempor dui ac euismod. Proin fermentum dapibus massa sed rhoncus. Integer aliquam elit velit, ac porta mauris accumsan eget. Nunc egestas, lorem non commodo varius, quam nunc eleifend massa, ut sagittis lacus nunc et odio. Sed fringilla tellus in lobortis sollicitudin. Vivamus maximus felis ac lacus rutrum, sed molestie lectus tincidunt. Maecenas pharetra, neque semper rhoncus tempor, metus augue convallis orci, dapibus venenatis neque dui in ligula. Fusce eleifend tincidunt neque in viverra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec magna dolor, commodo et ipsum hendrerit, placerat elementum nibh. Proin et leo eu nisi feugiat malesuada. Donec quam nisi, elementum quis leo ac, luctus gravida ipsum. Vivamus quis neque vel felis imperdiet porta.', '', '2018-07-19 05:50:14'),
(3, 1, 'Post Three', 'post-three', 'This has been edit too.Aenean libero elit, sollicitudin quis turpis lobortis, finibus venenatis dolor. Vivamus sit amet massa mi. Sed rutrum sodales mauris ac malesuada. Suspendisse sagittis, mi a scelerisque porttitor, velit ex mattis est, id dictum tortor magna in justo. Quisque quis mi sodales, sollicitudin erat id, ultricies nulla. Quisque augue orci, vestibulum at erat non, tempus ultricies tortor. Nunc finibus sem sed posuere laoreet. Suspendisse sagittis tortor eget nisl efficitur venenatis. Nullam sit amet enim ex.', '', '2018-07-16 19:00:00'),
(8, 1, 'Post Fiveth', 'post-fiveth', '<p><strong><s><em>This has been edit.</em></s>Lorem ipsum dolor sit </strong>amet, consectetur adipisicing elit. <a id=\"nothing\" name=\"nothing\">Quibusdam sed, officia reiciendis necessitatibus obcaecati eum, quae</a>rat unde illo suscipit placeat nihil voluptatibus ipsa omnis repudiandae<s>, excepturi</s>! Id aperiam eius per<small>ferendis cupiditate exercitationem, mollitia numquam fuga, invent</small>ore <q>quam eaque cumque fugiat, neque repudiandae dolore qui itaque </q>iste asperiores ullam ut eum illum aliquam dignissimos similique! Aperiam aut temporibus optio nulla numquam molestias eum officia maiores aliquid laborum et officiis pariatur, delectus sapiente molestiae sit accusantium a libero, eligendi vero eius laboriosam minus. Nemo quibusdam nesciunt doloribus repellendus expedita necessitatibus velit vero?</p>\r\n', '', '2018-07-23 06:43:43'),
(9, 2, 'Post Sixth', 'post-sixth', '<h3 style=\"color:#aaaaaa;font-style:italic;\">&nbsp;</h3>\r\n\r\n<h3 style=\"color:#aaaaaa;font-style:italic;\">&nbsp;</h3>\r\n\r\n<h3 style=\"color:#aaaaaa;font-style:italic;\"><strong>Pellentesque leo est,</strong> gravida sed elit id,<span class=\"marker\"> aliquet viverra dolor. Donec n</span>ec risus non velit <strong>consectetur accumsan.</strong> Ut vel est arcu. Fusce vitae semper elit. Donec imperdiet,<strong><em> nisi accumsan</em> </strong>mattis bibendum, quam nisi iaculis mi, sed vestibulum libero urna non<s> arcu. Vestibulum venen</s>atis nibh non neque interdum viverra. Nam elementum dictum dolor, ut vestibulum nunc feugiat in. Nam fermentum urna quam, id lobortis enim varius ut. Mauris mattis, neque ac lobortis consequat, orci velit egestas quam, vel sodales mauris leo at tortor. Praesent sagittis diam vitae nisl dictum vehicula. Cras in sodales nisl. Proin vehicula, massa eget laoreet venenatis, nulla tortor vulputate ipsum, eget vehicula erat nisi et nulla. Nulla facilisi. Proin at tempor ligula.</h3>\r\n', '', '2018-07-23 07:46:45'),
(10, 1, 'Post seventh', 'post-seventh', '<p>this is testing post.</p>\r\n', '', '2018-07-23 10:32:20'),
(11, 2, 'test post', 'test-post', '<p>this is a test post.</p>', 'noimage.jpg', '2018-07-24 06:36:40'),
(12, 1, 'test post1', 'test-post1', '<p>another test post</p>', 'No-Image.jpg', '2018-07-24 06:37:31'),
(13, 1, 'test post2', 'test-post2', '<p>test post 2</p>', 'noo-image.jpg', '2018-07-24 06:50:47'),
(14, 2, 'Post Three2', 'post-three2', '<p>fdddsaasdds</p>', 'products-1.jpg', '2018-07-24 07:05:54'),
(15, 2, 'test post23', 'test-post23', '<p>dsdsdsdsds</p>', 'noimage.jpg', '2018-07-24 07:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
