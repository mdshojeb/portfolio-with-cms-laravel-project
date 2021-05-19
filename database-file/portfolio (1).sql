-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 05:50 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `about_detail` text NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `name`, `profile`, `email`, `phone`, `about_detail`, `image`) VALUES
(1, 'Shajeeb Mahmud', 'Full stack developer', 'mdshojeb.official@gmail.com', '01533653782', '<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.&nbsp;</p><p>Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. porttitor at sem. Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>', '1617985241.png');

-- --------------------------------------------------------

--
-- Table structure for table `bg_images`
--

CREATE TABLE `bg_images` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bg_images`
--

INSERT INTO `bg_images` (`id`, `image`) VALUES
(1, '1619961418.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', NULL, '2021-05-02 01:27:23', '2021-05-02 01:27:23'),
(2, 'Web Development', NULL, '2021-05-02 01:27:34', '2021-05-02 01:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'contact-bg.jpg',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twetter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `phone`, `email`, `description`, `bg_image`, `facebook`, `twetter`, `linkedin`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmondi 04, Dhaka-1204,Bangladesh.', '01533653782', 'mdshojeb.official@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum dolorem soluta quidem expedita aperiam aliquid at. Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis mollitia inventore?', '608f9ede6553fwork-4.jpg', 'https://facebook.com/shajeebmahmudofficial', 'https://tweeter.com/shajeebmahmud', 'https://linkedin.com/in/mdshojebofficial', NULL, NULL, '2021-05-03 00:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `workes_completed` int(11) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `total_clients` int(11) NOT NULL,
  `awered_won` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `workes_completed`, `years_of_experience`, `total_clients`, `awered_won`, `image`) VALUES
(1, 10, 5, 180, 15, '1618071643.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `intro`
--

CREATE TABLE `intro` (
  `id` int(11) NOT NULL,
  `intro_title` varchar(100) NOT NULL,
  `intro_subtitle` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intro`
--

INSERT INTO `intro` (`id`, `intro_title`, `intro_subtitle`, `image`) VALUES
(1, 'I am Shajeeb Mahmud', 'CEO WorkerZoid,Web Developer,Web Designer,WordPress Theme Customizer', '1617975701.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Robert Neal', 'abc@gmail.com', 'Greetings from my heart', 'Something message. I have been doing well. Your service is very good.', 1, '2021-05-03 02:03:56', '2021-05-03 04:48:44'),
(4, 'Alamin Mia', 'alamin@gmail.com', 'Subject Nehi hey yaar!', 'something what your mind say. I just want to test it. that\'s it.', 1, '2021-05-10 02:40:53', '2021-05-09 20:43:01'),
(5, 'Mahmud Apu', 'mdshojeb.official@gmail.com', 'Greetings from my heart', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum dolorem soluta quidem expedita aperiam aliquid at. Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis mollitia inventore?', 1, '2021-05-10 03:31:41', '2021-05-09 22:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2021_04_30_092824_create_categories_table', 1),
(7, '2021_05_01_141752_create_posts_table', 2),
(11, '2021_05_03_050346_create_contacts_table', 3),
(12, '2021_05_03_070448_create_messages_table', 4),
(15, '2021_05_07_051943_create_website_properties_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `catagory`, `image`) VALUES
(3, 'Portfolio Web Site', 'Web Design', '1618080261.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `status`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'School Management System', 'School-Management-System608ebdfa1d905', '608ebdfa1dcd6skill-image.png', 1, '<p>I am Muhammad Shajeeb Mahmud. I am a professional web designer and developer. I have been working with web technology since 5 years.</p><p><b>School Management System:<br></b>A school management system need some extra features like employee management system, student management system.</p><h4><font color=\"#397b21\"><b><span style=\"font-family: Helvetica;\">About this software:</span></b></font></h4><p><p></p><p></p></p><p><ul></ul></p><ol><li><span style=\"font-family: Helvetica;\"><font color=\"#000000\" style=\"\">Responsive and cross browser compatibe</font></span></li><li><span style=\"font-family: Helvetica;\"><font color=\"#000000\">Responsive and cross browser compatibe</font></span></li><li><span style=\"font-family: Helvetica;\"><font color=\"#000000\" style=\"\">Full customizabel</font></span></li></ol>', '2021-05-02 08:58:02', '2021-05-06 22:34:04'),
(3, 1, 3, 'একটি সফল অনলাইন ক্লাস আয়োজনে লক্ষনীয় বিষয়', 'একটি-সফল-অনলাইন-ক্লাস-আয়োজনে-লক্ষনীয়-বিষয়608f8102c4b20', '608f8102c4ef0unnamed.png', 1, '<p>Amaro porano jaha chay</p>', '2021-05-02 22:50:10', '2021-05-02 22:50:10'),
(4, 2, 3, 'School Management System', 'School-Management-System60914e67ba347', '60914e67ba717psd to html.png', 1, '<p>kya batt hey...ye model to kam kar raha he re baba!</p>', '2021-05-04 07:38:47', '2021-05-04 07:39:04'),
(5, 1, 3, 'My first post in my own website', 'My-first-post-in-my-own-website609155616dac2', '609155616de93psd to html.png', 1, '<h4><b><font color=\"#ff9c00\">How I am feeling?</font></b></h4><p><span style=\"font-family: Verdana;\">I am very happy. Because this is my own system where I can post yaar!I am very happy. Because this is my own system where I can post yaar!I am very happy. Because this is my own system where I can post yaar!I am very happy. Because this is my own system where I can post yaar!I am very happy. Because this is my own system where I can post yaar!I am very happy. Because this is my own system where I can post yaar!I am very happy. Because this is my own system where I can post yaar!I am very happy. Because this is my own system where I can post yaar!I am very happy. Because this is my own system where I can post yaar!</span></p><h5><b>What next?</b></h5><p><span style=\"font-family: Verdana;\">I am going to make an ecommerce website soon. It\'s very important I think to get more confident you know!</span></p>', '2021-05-04 08:08:33', '2021-05-04 08:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `review` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `review`, `image`) VALUES
(2, 'Shajeeb Mahmud', 'Very honest and punctual person. I have been working with him since 2 years. Very Professional with design and development skill.', '1619186709.png'),
(3, 'Robert Neal', 'Very honest and punctual person. I have been working with him since 2 years. Very Professional with design and development skill.', '1619191239.png'),
(5, 'Shajeeb Mahmud', 'Very honest and punctual person', '1619961366.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `services_title` varchar(100) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services_title`, `detail`, `icon`) VALUES
(2, 'WEB DEVELOPMENT', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.', 'fa fa-cogs'),
(3, 'WEB DESIGN', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.', 'fa fa-television'),
(4, 'PHOTOGRAPHY', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia, provident vitae! Magni tempora perferendis eum non provident.', 'fa fa-camera');

-- --------------------------------------------------------

--
-- Table structure for table `service_section_detail`
--

CREATE TABLE `service_section_detail` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_section_detail`
--

INSERT INTO `service_section_detail` (`id`, `detail`) VALUES
(1, 'We are providing several digital services. We can challenge our services is best in the market.');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `title`, `progress`) VALUES
(1, 'HTML', 90),
(2, 'CSS', 75),
(4, 'PHP', 80);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 1 COMMENT '1=user,2=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `role`) VALUES
(2, 'Fahmida Mahmud', 'jaan@gmail.com', '1617961080.png', '$2y$10$jjWOxaKABcwOrmFibiN3v.yyjX1LUteSt6dzyfvnhGeYbqv9aYUoK', 2),
(3, 'Shajeeb Mahmud', 'mdshojeb.official@gmail.com', '1619179213.png', '$2y$10$jjWOxaKABcwOrmFibiN3v.yyjX1LUteSt6dzyfvnhGeYbqv9aYUoK', 2);

-- --------------------------------------------------------

--
-- Table structure for table `website_properties`
--

CREATE TABLE `website_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Portfolio',
  `footer_credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.jpg',
  `show_logo` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_properties`
--

INSERT INTO `website_properties` (`id`, `web_title`, `footer_credit`, `logo`, `icon`, `show_logo`, `created_at`, `updated_at`) VALUES
(1, 'MDSHOJEB', 'All Rights Reserved to Shajeeb Mahmud. This site is developed by MD SHOJEB.', '609aa37379d4flogo.png', '609aa37390013logo_sm.png', 1, NULL, '2021-05-11 09:32:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bg_images`
--
ALTER TABLE `bg_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_section_detail`
--
ALTER TABLE `service_section_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_properties`
--
ALTER TABLE `website_properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bg_images`
--
ALTER TABLE `bg_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `intro`
--
ALTER TABLE `intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_section_detail`
--
ALTER TABLE `service_section_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `website_properties`
--
ALTER TABLE `website_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
