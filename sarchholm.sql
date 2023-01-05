-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2023 at 09:30 PM
-- Server version: 10.3.37-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omnixoft_sarchholm`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `project_id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'Ainsley French', '', 'Officiis et possimus ds', '2022-12-07 09:10:58', '2022-12-07 09:28:49'),
(3, 5, 'Chaim Becker update', '', 'Perspiciatis facili update', '2022-12-10 17:08:40', '2022-12-10 17:09:16'),
(4, 6, 'Casey Strong', '1815070743.png', 'Delectus ea commodo', '2022-12-17 14:55:46', '2022-12-17 14:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `amenity_translations`
--

CREATE TABLE `amenity_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenity_translations`
--

INSERT INTO `amenity_translations` (`id`, `amenity_id`, `project_id`, `locale`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'en', 'Ainsley French', '', 'Officiis et possimus ds', '2022-12-07 09:10:58', '2022-12-07 09:28:49'),
(3, 3, 5, 'en', 'Chaim Becker update', '', 'Perspiciatis facili update', '2022-12-10 17:08:40', '2022-12-10 17:09:16'),
(4, 4, 6, 'en', 'Casey Strong', '1815070743.png', 'Delectus ea commodo', '2022-12-17 14:55:46', '2022-12-17 14:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `title`, `slug`, `image`, `body`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 1, 'The most inspiring interior design for your home.', 'the-most-inspiring-interior-design-for-your-home', 'the-most-inspiring-interior-design-for-your-home-2022-01-23-61ecf6c91a4fc.webp', 'Nullam lectus mi, pharetra at consectetur non, pretium eu lectus. In dolor odio, lobortis vel dolor vulputate, venenatis accumsan est. Duis porta, enim eget varius varius, eros magna blandit augue, ultrices viverra ipsum massa quis nibh. Ut finibus mauris ex, sit amet rutrum turpis posuere at. Integer vel purus pharetra justo vulputate aliquam ac eu libero. Aenean pulvinar dignissim purus, sed vulputate nisi mollis a. Curabitur eget aliquet neque. Sed rhoncus dolor nec purus fermentum accumsan. Cras sodales neque vitae tortor bibendum accumsan ut ac eros. Proin dictum posuere sem, non fringilla lacus condimentum non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eu arcu at lorem tristique porta lobortis et dui. Proin varius mi quis lacus ultricies pulvinar. Donec suscipit accumsan risus. Mauris porta, dui in facilisis lacinia, ipsum sapien facilisis ipsum, eget fermentum mauris eros a tellus. Quisque vitae aliquam enim, in consequat purus. Suspendisse ut diam pretium, pharetra justo in, volutpat dolor. Duis consectetur condimentum tortor, in lacinia ipsum facilisis feugiat. Nullam mauris urna, fermentum vitae velit a, pharetra lacinia magna. Mauris malesuada libero eget lacus imperdiet faucibus. Mauris quis aliquet orci, ac mollis justo. Morbi malesuada, urna vitae scelerisque accumsan, nisi massa aliquet velit, id varius lorem lectus a arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet, ipsum at iaculis posuere, tellus diam semper tellus, efficitur tincidunt dui diam ac tellus. Vestibulum gravida massa in tristique consectetur. Vestibulum imperdiet risus sed ipsum varius, in pharetra purus tincidunt. Cras vel nulla accumsan, dictum mi in, porttitor arcu. Vestibulum rutrum blandit ligula, ut pretium leo imperdiet nec. Pellentesque sed neque ante. Donec molestie efficitur elit at elementum. Praesent sed turpis felis. Nunc ultricies, mi sed vehicula posuere, eros velit euismod neque, et placerat urna metus quis mi. Proin nec ligula et arcu ultrices convallis sed ut turpis.', '2022-01-23 06:31:58', '2022-01-23 06:40:09', 'approved'),
(2, 5, 2, '10 benifits of rental that may change your perspective', '10-benifits-of-rental-that-may-change-your-perspective', '10-benifits-of-rental-that-may-change-your-perspective-2022-01-23-61ecfe2a186eb.webp', 'Nullam lectus mi, pharetra at consectetur non, pretium eu lectus. In dolor odio, lobortis vel dolor vulputate, venenatis accumsan est. Duis porta, enim eget varius varius, eros magna blandit augue, ultrices viverra ipsum massa quis nibh. Ut finibus mauris ex, sit amet rutrum turpis posuere at. Integer vel purus pharetra justo vulputate aliquam ac eu libero. Aenean pulvinar dignissim purus, sed vulputate nisi mollis a. Curabitur eget aliquet neque. Sed rhoncus dolor nec purus fermentum accumsan. Cras sodales neque vitae tortor bibendum accumsan ut ac eros. Proin dictum posuere sem, non fringilla lacus condimentum non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eu arcu at lorem tristique porta lobortis et dui. Proin varius mi quis lacus ultricies pulvinar. Donec suscipit accumsan risus. Mauris porta, dui in facilisis lacinia, ipsum sapien facilisis ipsum, eget fermentum mauris eros a tellus. Quisque vitae aliquam enim, in consequat purus. Suspendisse ut diam pretium, pharetra justo in, volutpat dolor. Duis consectetur condimentum tortor, in lacinia ipsum facilisis feugiat. Nullam mauris urna, fermentum vitae velit a, pharetra lacinia magna. Mauris malesuada libero eget lacus imperdiet faucibus. Mauris quis aliquet orci, ac mollis justo. Morbi malesuada, urna vitae scelerisque accumsan, nisi massa aliquet velit, id varius lorem lectus a arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet, ipsum at iaculis posuere, tellus diam semper tellus, efficitur tincidunt dui diam ac tellus. Vestibulum gravida massa in tristique consectetur. Vestibulum imperdiet risus sed ipsum varius, in pharetra purus tincidunt. Cras vel nulla accumsan, dictum mi in, porttitor arcu. Vestibulum rutrum blandit ligula, ut pretium leo imperdiet nec. Pellentesque sed neque ante. Donec molestie efficitur elit at elementum. Praesent sed turpis felis. Nunc ultricies, mi sed vehicula posuere, eros velit euismod neque, et placerat urna metus quis mi. Proin nec ligula et arcu ultrices convallis sed ut turpis.', '2022-01-23 07:05:14', '2022-01-23 07:09:48', 'approved'),
(3, 5, 3, '10 things to know before buying real estate property', '10-things-to-know-before-buying-real-estate-property', '10-things-to-know-before-buying-real-estate-property-2022-01-23-61ecfeb4284f5.webp', 'Nullam lectus mi, pharetra at consectetur non, pretium eu lectus. In dolor odio, lobortis vel dolor vulputate, venenatis accumsan est. Duis porta, enim eget varius varius, eros magna blandit augue, ultrices viverra ipsum massa quis nibh. Ut finibus mauris ex, sit amet rutrum turpis posuere at. Integer vel purus pharetra justo vulputate aliquam ac eu libero. Aenean pulvinar dignissim purus, sed vulputate nisi mollis a. Curabitur eget aliquet neque. Sed rhoncus dolor nec purus fermentum accumsan. Cras sodales neque vitae tortor bibendum accumsan ut ac eros. Proin dictum posuere sem, non fringilla lacus condimentum non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eu arcu at lorem tristique porta lobortis et dui. Proin varius mi quis lacus ultricies pulvinar. Donec suscipit accumsan risus. Mauris porta, dui in facilisis lacinia, ipsum sapien facilisis ipsum, eget fermentum mauris eros a tellus. Quisque vitae aliquam enim, in consequat purus. Suspendisse ut diam pretium, pharetra justo in, volutpat dolor. Duis consectetur condimentum tortor, in lacinia ipsum facilisis feugiat. Nullam mauris urna, fermentum vitae velit a, pharetra lacinia magna. Mauris malesuada libero eget lacus imperdiet faucibus. Mauris quis aliquet orci, ac mollis justo. Morbi malesuada, urna vitae scelerisque accumsan, nisi massa aliquet velit, id varius lorem lectus a arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet, ipsum at iaculis posuere, tellus diam semper tellus, efficitur tincidunt dui diam ac tellus. Vestibulum gravida massa in tristique consectetur. Vestibulum imperdiet risus sed ipsum varius, in pharetra purus tincidunt. Cras vel nulla accumsan, dictum mi in, porttitor arcu. Vestibulum rutrum blandit ligula, ut pretium leo imperdiet nec. Pellentesque sed neque ante. Donec molestie efficitur elit at elementum. Praesent sed turpis felis. Nunc ultricies, mi sed vehicula posuere, eros velit euismod neque, et placerat urna metus quis mi. Proin nec ligula et arcu ultrices convallis sed ut turpis.', '2022-01-23 07:07:32', '2022-01-23 07:09:34', 'approved'),
(4, 3, 2, '7 Simple secrets to totally rocking your Real Estate', '7-simple-secrets-to-totally-rocking-your-real-estate', '7-simple-secrets-to-totally-rocking-your-real-estate-2022-01-23-61ed00ea15889.webp', 'Nullam lectus mi, pharetra at consectetur non, pretium eu lectus. In dolor odio, lobortis vel dolor vulputate, venenatis accumsan est. Duis porta, enim eget varius varius, eros magna blandit augue, ultrices viverra ipsum massa quis nibh. Ut finibus mauris ex, sit amet rutrum turpis posuere at. Integer vel purus pharetra justo vulputate aliquam ac eu libero. Aenean pulvinar dignissim purus, sed vulputate nisi mollis a. Curabitur eget aliquet neque. Sed rhoncus dolor nec purus fermentum accumsan. Cras sodales neque vitae tortor bibendum accumsan ut ac eros. Proin dictum posuere sem, non fringilla lacus condimentum non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eu arcu at lorem tristique porta lobortis et dui. Proin varius mi quis lacus ultricies pulvinar. Donec suscipit accumsan risus. Mauris porta, dui in facilisis lacinia, ipsum sapien facilisis ipsum, eget fermentum mauris eros a tellus. Quisque vitae aliquam enim, in consequat purus. Suspendisse ut diam pretium, pharetra justo in, volutpat dolor. Duis consectetur condimentum tortor, in lacinia ipsum facilisis feugiat. Nullam mauris urna, fermentum vitae velit a, pharetra lacinia magna. Mauris malesuada libero eget lacus imperdiet faucibus. Mauris quis aliquet orci, ac mollis justo. Morbi malesuada, urna vitae scelerisque accumsan, nisi massa aliquet velit, id varius lorem lectus a arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet, ipsum at iaculis posuere, tellus diam semper tellus, efficitur tincidunt dui diam ac tellus. Vestibulum gravida massa in tristique consectetur. Vestibulum imperdiet risus sed ipsum varius, in pharetra purus tincidunt. Cras vel nulla accumsan, dictum mi in, porttitor arcu. Vestibulum rutrum blandit ligula, ut pretium leo imperdiet nec. Pellentesque sed neque ante. Donec molestie efficitur elit at elementum. Praesent sed turpis felis. Nunc ultricies, mi sed vehicula posuere, eros velit euismod neque, et placerat urna metus quis mi. Proin nec ligula et arcu ultrices convallis sed ut turpis.', '2022-01-23 07:16:58', '2022-01-23 07:21:09', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `parent_id`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apartment', NULL, 0, 1, '2022-01-22 09:35:28', '2022-01-22 09:35:28'),
(2, 'Real Estate', NULL, 0, 1, '2022-01-22 09:35:43', '2022-01-22 09:35:43'),
(3, 'Business', NULL, 0, 1, '2022-01-22 09:36:00', '2022-01-22 09:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_translations`
--

CREATE TABLE `blog_category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog_category_translations`
--

INSERT INTO `blog_category_translations` (`id`, `category_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Apartment', '2022-01-22 09:35:28', '2022-01-22 09:35:28'),
(2, 2, 'en', 'Real Estate', '2022-01-22 09:35:43', '2022-01-22 09:35:43'),
(3, 3, 'en', 'Business', '2022-01-22 09:36:00', '2022-01-22 09:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog_tag`
--

INSERT INTO `blog_tag` (`blog_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `blog_translations`
--

CREATE TABLE `blog_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog_translations`
--

INSERT INTO `blog_translations` (`id`, `blog_id`, `locale`, `title`, `slug`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'The most inspiring interior design for your home.', 'the-most-inspiring-interior-design-for-your-home', 'Nullam lectus mi, pharetra at consectetur non, pretium eu lectus. In dolor odio, lobortis vel dolor vulputate, venenatis accumsan est. Duis porta, enim eget varius varius, eros magna blandit augue, ultrices viverra ipsum massa quis nibh. Ut finibus mauris ex, sit amet rutrum turpis posuere at. Integer vel purus pharetra justo vulputate aliquam ac eu libero. Aenean pulvinar dignissim purus, sed vulputate nisi mollis a. Curabitur eget aliquet neque. Sed rhoncus dolor nec purus fermentum accumsan. Cras sodales neque vitae tortor bibendum accumsan ut ac eros. Proin dictum posuere sem, non fringilla lacus condimentum non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eu arcu at lorem tristique porta lobortis et dui. Proin varius mi quis lacus ultricies pulvinar. Donec suscipit accumsan risus. Mauris porta, dui in facilisis lacinia, ipsum sapien facilisis ipsum, eget fermentum mauris eros a tellus. Quisque vitae aliquam enim, in consequat purus. Suspendisse ut diam pretium, pharetra justo in, volutpat dolor. Duis consectetur condimentum tortor, in lacinia ipsum facilisis feugiat. Nullam mauris urna, fermentum vitae velit a, pharetra lacinia magna. Mauris malesuada libero eget lacus imperdiet faucibus. Mauris quis aliquet orci, ac mollis justo. Morbi malesuada, urna vitae scelerisque accumsan, nisi massa aliquet velit, id varius lorem lectus a arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet, ipsum at iaculis posuere, tellus diam semper tellus, efficitur tincidunt dui diam ac tellus. Vestibulum gravida massa in tristique consectetur. Vestibulum imperdiet risus sed ipsum varius, in pharetra purus tincidunt. Cras vel nulla accumsan, dictum mi in, porttitor arcu. Vestibulum rutrum blandit ligula, ut pretium leo imperdiet nec. Pellentesque sed neque ante. Donec molestie efficitur elit at elementum. Praesent sed turpis felis. Nunc ultricies, mi sed vehicula posuere, eros velit euismod neque, et placerat urna metus quis mi. Proin nec ligula et arcu ultrices convallis sed ut turpis.', '2022-01-23 06:31:58', '2022-01-23 06:40:09'),
(2, 2, 'en', '10 benifits of rental that may change your perspective', '10-benifits-of-rental-that-may-change-your-perspective', 'Nullam lectus mi, pharetra at consectetur non, pretium eu lectus. In dolor odio, lobortis vel dolor vulputate, venenatis accumsan est. Duis porta, enim eget varius varius, eros magna blandit augue, ultrices viverra ipsum massa quis nibh. Ut finibus mauris ex, sit amet rutrum turpis posuere at. Integer vel purus pharetra justo vulputate aliquam ac eu libero. Aenean pulvinar dignissim purus, sed vulputate nisi mollis a. Curabitur eget aliquet neque. Sed rhoncus dolor nec purus fermentum accumsan. Cras sodales neque vitae tortor bibendum accumsan ut ac eros. Proin dictum posuere sem, non fringilla lacus condimentum non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eu arcu at lorem tristique porta lobortis et dui. Proin varius mi quis lacus ultricies pulvinar. Donec suscipit accumsan risus. Mauris porta, dui in facilisis lacinia, ipsum sapien facilisis ipsum, eget fermentum mauris eros a tellus. Quisque vitae aliquam enim, in consequat purus. Suspendisse ut diam pretium, pharetra justo in, volutpat dolor. Duis consectetur condimentum tortor, in lacinia ipsum facilisis feugiat. Nullam mauris urna, fermentum vitae velit a, pharetra lacinia magna. Mauris malesuada libero eget lacus imperdiet faucibus. Mauris quis aliquet orci, ac mollis justo. Morbi malesuada, urna vitae scelerisque accumsan, nisi massa aliquet velit, id varius lorem lectus a arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet, ipsum at iaculis posuere, tellus diam semper tellus, efficitur tincidunt dui diam ac tellus. Vestibulum gravida massa in tristique consectetur. Vestibulum imperdiet risus sed ipsum varius, in pharetra purus tincidunt. Cras vel nulla accumsan, dictum mi in, porttitor arcu. Vestibulum rutrum blandit ligula, ut pretium leo imperdiet nec. Pellentesque sed neque ante. Donec molestie efficitur elit at elementum. Praesent sed turpis felis. Nunc ultricies, mi sed vehicula posuere, eros velit euismod neque, et placerat urna metus quis mi. Proin nec ligula et arcu ultrices convallis sed ut turpis.', '2022-01-23 07:05:14', '2022-01-23 07:09:48'),
(3, 3, 'en', '10 things to know before buying real estate property', '10-things-to-know-before-buying-real-estate-property', 'Nullam lectus mi, pharetra at consectetur non, pretium eu lectus. In dolor odio, lobortis vel dolor vulputate, venenatis accumsan est. Duis porta, enim eget varius varius, eros magna blandit augue, ultrices viverra ipsum massa quis nibh. Ut finibus mauris ex, sit amet rutrum turpis posuere at. Integer vel purus pharetra justo vulputate aliquam ac eu libero. Aenean pulvinar dignissim purus, sed vulputate nisi mollis a. Curabitur eget aliquet neque. Sed rhoncus dolor nec purus fermentum accumsan. Cras sodales neque vitae tortor bibendum accumsan ut ac eros. Proin dictum posuere sem, non fringilla lacus condimentum non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eu arcu at lorem tristique porta lobortis et dui. Proin varius mi quis lacus ultricies pulvinar. Donec suscipit accumsan risus. Mauris porta, dui in facilisis lacinia, ipsum sapien facilisis ipsum, eget fermentum mauris eros a tellus. Quisque vitae aliquam enim, in consequat purus. Suspendisse ut diam pretium, pharetra justo in, volutpat dolor. Duis consectetur condimentum tortor, in lacinia ipsum facilisis feugiat. Nullam mauris urna, fermentum vitae velit a, pharetra lacinia magna. Mauris malesuada libero eget lacus imperdiet faucibus. Mauris quis aliquet orci, ac mollis justo. Morbi malesuada, urna vitae scelerisque accumsan, nisi massa aliquet velit, id varius lorem lectus a arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet, ipsum at iaculis posuere, tellus diam semper tellus, efficitur tincidunt dui diam ac tellus. Vestibulum gravida massa in tristique consectetur. Vestibulum imperdiet risus sed ipsum varius, in pharetra purus tincidunt. Cras vel nulla accumsan, dictum mi in, porttitor arcu. Vestibulum rutrum blandit ligula, ut pretium leo imperdiet nec. Pellentesque sed neque ante. Donec molestie efficitur elit at elementum. Praesent sed turpis felis. Nunc ultricies, mi sed vehicula posuere, eros velit euismod neque, et placerat urna metus quis mi. Proin nec ligula et arcu ultrices convallis sed ut turpis.', '2022-01-23 07:07:32', '2022-01-23 07:09:34'),
(4, 4, 'en', '7 Simple secrets to totally rocking your Real Estate', '7-simple-secrets-to-totally-rocking-your-real-estate', 'Nullam lectus mi, pharetra at consectetur non, pretium eu lectus. In dolor odio, lobortis vel dolor vulputate, venenatis accumsan est. Duis porta, enim eget varius varius, eros magna blandit augue, ultrices viverra ipsum massa quis nibh. Ut finibus mauris ex, sit amet rutrum turpis posuere at. Integer vel purus pharetra justo vulputate aliquam ac eu libero. Aenean pulvinar dignissim purus, sed vulputate nisi mollis a. Curabitur eget aliquet neque. Sed rhoncus dolor nec purus fermentum accumsan. Cras sodales neque vitae tortor bibendum accumsan ut ac eros. Proin dictum posuere sem, non fringilla lacus condimentum non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eu arcu at lorem tristique porta lobortis et dui. Proin varius mi quis lacus ultricies pulvinar. Donec suscipit accumsan risus. Mauris porta, dui in facilisis lacinia, ipsum sapien facilisis ipsum, eget fermentum mauris eros a tellus. Quisque vitae aliquam enim, in consequat purus. Suspendisse ut diam pretium, pharetra justo in, volutpat dolor. Duis consectetur condimentum tortor, in lacinia ipsum facilisis feugiat. Nullam mauris urna, fermentum vitae velit a, pharetra lacinia magna. Mauris malesuada libero eget lacus imperdiet faucibus. Mauris quis aliquet orci, ac mollis justo. Morbi malesuada, urna vitae scelerisque accumsan, nisi massa aliquet velit, id varius lorem lectus a arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet, ipsum at iaculis posuere, tellus diam semper tellus, efficitur tincidunt dui diam ac tellus. Vestibulum gravida massa in tristique consectetur. Vestibulum imperdiet risus sed ipsum varius, in pharetra purus tincidunt. Cras vel nulla accumsan, dictum mi in, porttitor arcu. Vestibulum rutrum blandit ligula, ut pretium leo imperdiet nec. Pellentesque sed neque ante. Donec molestie efficitur elit at elementum. Praesent sed turpis felis. Nunc ultricies, mi sed vehicula posuere, eros velit euismod neque, et placerat urna metus quis mi. Proin nec ligula et arcu ultrices convallis sed ut turpis.', '2022-01-23 07:16:58', '2022-01-23 07:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `booking_info` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `order`, `status`, `is_default`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Residential', 0, 0, 1, NULL, '', '2022-01-22 09:09:59', '2022-01-22 09:09:59'),
(2, 'Commercial', 0, 0, 1, NULL, '', '2022-01-22 09:10:14', '2022-01-22 09:10:14'),
(3, 'Land', 0, 0, 1, NULL, '', '2022-01-22 09:10:32', '2022-01-22 09:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Residential', '2022-01-22 09:09:59', '2022-01-22 09:09:59'),
(2, 2, 'en', 'Commercial', '2022-01-22 09:10:14', '2022-01-22 09:10:14'),
(3, 3, 'en', 'Land', '2022-01-22 09:10:32', '2022-01-22 09:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `country_id`, `image`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ميامي', 1, 1, '', 1, NULL, '2022-01-22 08:57:26', '2022-07-14 05:23:16'),
(2, 'Amsterdam', 5, 1, 'amsterdam-2022-01-24-61ee4385357f8.webp', 1, NULL, '2022-01-22 09:00:29', '2022-01-24 06:13:25'),
(3, 'Cortland', 5, 1, 'cortland-2022-01-24-61ee43acd0c22.webp', 1, NULL, '2022-01-22 09:01:30', '2022-01-24 06:14:05'),
(4, 'Beacon', 5, 1, 'beacon-2022-01-24-61ee43de2fa69.webp', 1, NULL, '2022-01-22 09:02:09', '2022-01-24 06:14:54'),
(5, 'Bothell', 4, 1, 'bothell-2022-01-24-61ee4405cd928.webp', 1, NULL, '2022-01-22 09:04:00', '2022-01-24 06:15:34'),
(6, 'Aberdeen', 4, 1, 'aberdeen-2022-01-24-61ee44399031c.webp', 1, NULL, '2022-01-22 09:04:58', '2022-01-24 06:16:25'),
(7, 'Algona', 4, 1, 'algona-2022-01-22-61ebc8d7cef27.webp', 1, NULL, '2022-01-22 09:05:27', '2022-01-22 09:05:27'),
(8, 'Los Angeles', 3, 1, 'los-angeles-2022-01-24-61ee432658b74.webp', 1, NULL, '2022-01-22 09:08:25', '2022-01-24 06:11:50'),
(9, 'Princeton', 2, 1, 'princeton-2022-01-24-61ee42eb2de4d.webp', 1, NULL, '2022-01-22 09:09:13', '2022-01-24 06:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`id`, `city_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Miami', '2022-01-22 08:57:26', '2022-01-22 08:57:26'),
(2, 2, 'en', 'Amsterdam', '2022-01-22 09:00:29', '2022-01-22 09:00:29'),
(3, 3, 'en', 'Cortland', '2022-01-22 09:01:30', '2022-01-22 09:01:30'),
(4, 4, 'en', 'Beacon', '2022-01-22 09:02:09', '2022-01-22 09:02:09'),
(5, 5, 'en', 'Bothell', '2022-01-22 09:04:00', '2022-01-22 09:04:00'),
(6, 6, 'en', 'Aberdeen', '2022-01-22 09:04:58', '2022-01-22 09:04:58'),
(7, 7, 'en', 'Algona', '2022-01-22 09:05:27', '2022-01-22 09:05:27'),
(8, 8, 'en', 'Los Angeles', '2022-01-22 09:08:25', '2022-01-22 09:08:25'),
(9, 9, 'en', 'Princeton', '2022-01-22 09:09:13', '2022-01-22 09:09:13'),
(10, 1, 'ar', 'ميامي', '2022-07-14 05:23:16', '2022-07-14 05:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `likes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `project_id`, `unit_id`, `name`, `phone`, `link`, `likes`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Ava Noble', '97', 'http://sarchholm.omnixoft.com', '21', '2022-12-10 11:30:19', '2023-01-05 14:55:05'),
(3, 3, 4, 'Test Client', '+923113037372', 'http://sarchholm.omnixoft.com', NULL, '2022-12-17 15:03:18', '2022-12-17 15:03:18'),
(4, 6, 5, 'Mohammed Elbalkini', '8582325902', 'http://sarchholm.omnixoft.com', NULL, '2022-12-18 00:15:43', '2022-12-18 00:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `duration_per_visit` bigint(20) DEFAULT NULL,
  `request_for_call` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `client_id`, `unit_id`, `project_id`, `duration_per_visit`, `request_for_call`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 3, 20, 0, '2023-01-03 20:19:22', '2023-01-03 20:19:22'),
(2, 2, 5, 2, 20, 0, '2023-01-03 20:19:49', '2023-01-03 20:19:49'),
(3, 2, 5, 2, 20, 1, '2023-01-05 14:12:46', '2023-01-05 14:12:46'),
(4, 2, 5, 2, 20, 1, '2023-01-05 14:54:10', '2023-01-05 14:54:10'),
(5, 2, 5, 2, 20, 0, '2023-01-05 14:55:05', '2023-01-05 14:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `client_detail_translations`
--

CREATE TABLE `client_detail_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_detail_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `duration_per_visit` bigint(20) DEFAULT NULL,
  `request_for_call` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_detail_translations`
--

INSERT INTO `client_detail_translations` (`id`, `client_detail_id`, `locale`, `client_id`, `unit_id`, `project_id`, `duration_per_visit`, `request_for_call`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 2, 5, 3, 20, 0, '2023-01-03 20:19:22', '2023-01-03 20:19:22'),
(2, 2, 'en', 2, 5, 2, 20, 0, '2023-01-03 20:19:49', '2023-01-03 20:19:49'),
(3, 3, 'en', 2, 5, 2, 20, 1, '2023-01-05 14:12:46', '2023-01-05 14:12:46'),
(4, 4, 'en', 2, 5, 2, 20, 1, '2023-01-05 14:54:10', '2023-01-05 14:54:10'),
(5, 5, 'en', 2, 5, 2, 20, 0, '2023-01-05 14:55:05', '2023-01-05 14:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `client_translations`
--

CREATE TABLE `client_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `likes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_translations`
--

INSERT INTO `client_translations` (`id`, `client_id`, `project_id`, `unit_id`, `locale`, `name`, `phone`, `link`, `likes`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'en', 'Tanner Hansens', '', 'http://localhost/sarchholm', NULL, '2022-12-09 11:50:08', '2022-12-09 12:15:11'),
(2, 2, 1, 2, 'en', 'Ava Noble', '97', 'http://sarchholm.omnixoft.com', '21', '2022-12-10 11:30:19', '2023-01-05 14:55:05'),
(3, 3, 3, 4, 'en', 'Test Client', '+923113037372', 'http://sarchholm.omnixoft.com', NULL, '2022-12-17 15:03:18', '2022-12-17 15:03:18'),
(4, 4, 6, 5, 'en', 'Mohammed Elbalkini', '8582325902', 'http://sarchholm.omnixoft.com', NULL, '2022-12-18 00:15:43', '2022-12-18 00:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USA', NULL, 1, '2022-01-22 08:43:43', '2022-01-22 08:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `country_translations`
--

CREATE TABLE `country_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `country_translations`
--

INSERT INTO `country_translations` (`id`, `country_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'USA', '2022-01-22 08:43:43', '2022-01-22 08:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `credited_by` int(11) NOT NULL,
  `amount` double NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `user_id`, `credited_by`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'added by lion-admin', '2022-01-23 05:17:00', '2022-01-23 05:17:00'),
(2, 2, 2, 0, 'added by tony_stark', '2022-01-23 05:27:28', '2022-01-23 05:27:28'),
(3, 4, 4, 0, 'added by syzofyse', '2022-01-23 05:51:58', '2022-01-23 05:51:58'),
(4, 2, 2, 69, 'added by added by tony_stark', '2022-01-23 09:59:34', '2022-01-23 09:59:34'),
(5, 3, 3, 69, 'added by added by bob_haris', '2022-07-25 08:11:23', '2022-07-25 08:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', '2022-03-15 05:58:50', '2022-03-15 05:58:50'),
(2, 'EURO', '€', '2022-03-15 05:59:05', '2022-03-15 05:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Basketball Court', 'icon', 1, '2022-01-22 09:11:17', '2022-01-22 09:11:17'),
(2, 'Gym', 'icon', 1, '2022-01-22 09:11:35', '2022-01-22 09:11:35'),
(3, 'Swimming Pool', 'icon', 1, '2022-01-22 09:11:47', '2022-01-22 09:11:47'),
(4, 'Washer and Dryer', 'icon', 1, '2022-01-22 09:12:06', '2022-01-22 09:12:06'),
(5, 'No Smoking zone', 'icon', 1, '2022-01-22 09:12:21', '2022-01-22 09:12:21'),
(6, 'Wheelchair Friendly', 'icon', 1, '2022-01-22 09:12:34', '2022-01-22 09:12:34'),
(7, 'Free Parking on premises', 'icon', 1, '2022-01-22 09:12:48', '2022-01-22 09:12:48'),
(8, 'Air Conditioned', 'icon', 1, '2022-01-22 09:13:02', '2022-01-22 09:13:02'),
(9, 'Pet Friendly', 'icon', 1, '2022-01-22 09:13:16', '2022-01-22 09:13:16'),
(10, 'Home Theater', 'icon', 1, '2022-01-22 09:13:34', '2022-01-22 09:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `facility_property`
--

CREATE TABLE `facility_property` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `distance` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `facility_property`
--

INSERT INTO `facility_property` (`id`, `facility_id`, `property_id`, `distance`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 1, NULL, NULL, NULL),
(3, 3, 1, NULL, NULL, NULL),
(4, 4, 1, NULL, NULL, NULL),
(5, 5, 1, NULL, NULL, NULL),
(6, 6, 1, NULL, NULL, NULL),
(7, 7, 1, NULL, NULL, NULL),
(8, 8, 1, NULL, NULL, NULL),
(9, 9, 1, NULL, NULL, NULL),
(10, 10, 1, NULL, NULL, NULL),
(11, 7, 2, NULL, NULL, NULL),
(12, 9, 2, NULL, NULL, NULL),
(13, 1, 3, NULL, NULL, NULL),
(14, 2, 3, NULL, NULL, NULL),
(15, 3, 3, NULL, NULL, NULL),
(16, 4, 3, NULL, NULL, NULL),
(17, 5, 3, NULL, NULL, NULL),
(18, 6, 3, NULL, NULL, NULL),
(19, 7, 3, NULL, NULL, NULL),
(20, 8, 3, NULL, NULL, NULL),
(21, 9, 3, NULL, NULL, NULL),
(22, 10, 3, NULL, NULL, NULL),
(23, 1, 4, NULL, NULL, NULL),
(24, 2, 4, NULL, NULL, NULL),
(25, 3, 4, NULL, NULL, NULL),
(26, 4, 4, NULL, NULL, NULL),
(27, 8, 4, NULL, NULL, NULL),
(28, 9, 4, NULL, NULL, NULL),
(29, 10, 4, NULL, NULL, NULL),
(30, 1, 5, NULL, NULL, NULL),
(31, 2, 5, NULL, NULL, NULL),
(32, 5, 5, NULL, NULL, NULL),
(33, 8, 5, NULL, NULL, NULL),
(34, 9, 5, NULL, NULL, NULL),
(35, 10, 5, NULL, NULL, NULL),
(36, 3, 6, NULL, NULL, NULL),
(37, 4, 6, NULL, NULL, NULL),
(38, 7, 6, NULL, NULL, NULL),
(39, 8, 6, NULL, NULL, NULL),
(40, 9, 6, NULL, NULL, NULL),
(41, 10, 6, NULL, NULL, NULL),
(42, 1, 8, NULL, NULL, NULL),
(43, 2, 8, NULL, NULL, NULL),
(44, 4, 8, NULL, NULL, NULL),
(45, 5, 8, NULL, NULL, NULL),
(46, 8, 8, NULL, NULL, NULL),
(47, 9, 8, NULL, NULL, NULL),
(48, 10, 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facility_translations`
--

CREATE TABLE `facility_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `facility_translations`
--

INSERT INTO `facility_translations` (`id`, `facility_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Basketball Court', '2022-01-22 09:11:17', '2022-01-22 09:11:17'),
(2, 2, 'en', 'Gym', '2022-01-22 09:11:35', '2022-01-22 09:11:35'),
(3, 3, 'en', 'Swimming Pool', '2022-01-22 09:11:47', '2022-01-22 09:11:47'),
(4, 4, 'en', 'Washer and Dryer', '2022-01-22 09:12:06', '2022-01-22 09:12:06'),
(5, 5, 'en', 'No Smoking zone', '2022-01-22 09:12:21', '2022-01-22 09:12:21'),
(6, 6, 'en', 'Wheelchair Friendly', '2022-01-22 09:12:34', '2022-01-22 09:12:34'),
(7, 7, 'en', 'Free Parking on premises', '2022-01-22 09:12:48', '2022-01-22 09:12:48'),
(8, 8, 'en', 'Air Conditioned', '2022-01-22 09:13:02', '2022-01-22 09:13:02'),
(9, 9, 'en', 'Pet Friendly', '2022-01-22 09:13:16', '2022-01-22 09:13:16'),
(10, 10, 'en', 'Home Theater', '2022-01-22 09:13:34', '2022-01-22 09:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_images`
--

CREATE TABLE `header_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `header_images`
--

INSERT INTO `header_images` (`id`, `page`, `url`, `created_at`, `updated_at`) VALUES
(4, 'home', 'home-2022-05-10-627a4b882bdc4.jpg', '2022-03-01 07:10:32', '2022-05-10 11:24:56'),
(5, 'agents', 'agents-2022-05-10-627a4b9ba02a0.jpg', '2022-03-01 07:13:26', '2022-05-10 11:25:16'),
(6, 'about-us', 'about-us-2022-05-10-627a28c2c72cf.jpg', '2022-03-01 07:27:22', '2022-05-10 08:56:35'),
(7, 'news', 'news-2022-05-10-627a28d215f99.jpg', '2022-03-01 07:30:44', '2022-05-10 08:56:50'),
(8, 'single-news', 'single-news-2022-05-10-627a28e05e256.jpg', '2022-03-01 07:31:01', '2022-05-10 08:57:04'),
(9, 'contact', 'contact-2022-05-10-627a29184a736.jpg', '2022-03-01 07:33:17', '2022-05-10 08:58:00'),
(10, 'single-agent', 'single-agent-2022-05-10-627a2925d0803.jpg', '2022-03-01 07:52:38', '2022-05-10 08:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image_path`, `created_at`, `updated_at`, `property_id`) VALUES
(1, '[\"gallery-61ece841013fa.webp\",\"gallery-61ece84137620.webp\",\"gallery-61ece8416f675.webp\",\"gallery-61ece841a5b5f.webp\",\"gallery-61ece841de41e.webp\",\"gallery-61ece8422623b.webp\"]', '[\"gallery-61ece841013fa.webp\",\"gallery-61ece84137620.webp\",\"gallery-61ece8416f675.webp\",\"gallery-61ece841a5b5f.webp\",\"gallery-61ece841de41e.webp\",\"gallery-61ece8422623b.webp\"]', '2022-01-23 05:31:46', '2022-01-23 05:31:46', 1),
(2, '[\"gallery-61ecedd43c63b.webp\",\"gallery-61ecedd47fcf9.webp\",\"gallery-61ecedd4a3e7f.webp\",\"gallery-61ecedd4c9b75.webp\"]', '[\"gallery-61ecedd43c63b.webp\",\"gallery-61ecedd47fcf9.webp\",\"gallery-61ecedd4a3e7f.webp\",\"gallery-61ecedd4c9b75.webp\"]', '2022-01-23 05:55:33', '2022-01-23 05:55:33', 2),
(3, '[\"gallery-61ed28334c30b.webp\",\"gallery-61ed283387b68.webp\",\"gallery-61ed2833bc361.webp\"]', '[\"gallery-61ed28334c30b.webp\",\"gallery-61ed283387b68.webp\",\"gallery-61ed2833bc361.webp\"]', '2022-01-23 10:04:36', '2022-01-23 10:04:36', 3),
(4, '[\"gallery-61ed2bb4917b8.webp\",\"gallery-61ed2bb4b2a53.webp\",\"gallery-61ed2bb4f0348.webp\",\"gallery-61ed2bb5327e5.webp\"]', '[\"gallery-61ed2bb4917b8.webp\",\"gallery-61ed2bb4b2a53.webp\",\"gallery-61ed2bb4f0348.webp\",\"gallery-61ed2bb5327e5.webp\"]', '2022-01-23 10:19:33', '2022-01-23 10:19:33', 4),
(5, '[\"gallery-61ed2cadcb9b9.webp\",\"gallery-61ed2cae3b82e.webp\",\"gallery-61ed2caed2906.webp\",\"gallery-61ed2caef3be9.webp\",\"gallery-61ed2caf1f8ed.webp\",\"gallery-61ed2caf47cdb.webp\",\"gallery-61ed2caf699ee.webp\"]', '[\"gallery-61ed2cadcb9b9.webp\",\"gallery-61ed2cae3b82e.webp\",\"gallery-61ed2caed2906.webp\",\"gallery-61ed2caef3be9.webp\",\"gallery-61ed2caf1f8ed.webp\",\"gallery-61ed2caf47cdb.webp\",\"gallery-61ed2caf699ee.webp\"]', '2022-01-23 10:23:43', '2022-01-23 10:23:43', 5),
(6, '[\"gallery-61ee3e7a9a7c2.webp\",\"gallery-61ee3e7ac86b5.webp\",\"gallery-61ee3e7b029c5.webp\",\"gallery-61ee3e7b5ac84.webp\",\"gallery-61ee3e7baeb29.webp\"]', '[\"gallery-61ee3e7a9a7c2.webp\",\"gallery-61ee3e7ac86b5.webp\",\"gallery-61ee3e7b029c5.webp\",\"gallery-61ee3e7b5ac84.webp\",\"gallery-61ee3e7baeb29.webp\"]', '2022-01-24 05:51:56', '2022-01-24 05:51:56', 6),
(7, '[\"gallery-629606ce2beee.jpg\",\"gallery-629606ce84bc3.jpg\"]', '[\"gallery-629606ce2beee.jpg\",\"gallery-629606ce84bc3.jpg\"]', '2022-05-31 12:15:11', '2022-05-31 12:15:11', 7),
(8, '[\"gallery-62de531f775cc.jpg\",\"gallery-62de531fa4fc4.jpg\",\"gallery-62de531fbaf43.jpg\",\"gallery-62de531fd2e44.jpg\"]', '[\"gallery-62de531f775cc.jpg\",\"gallery-62de531fa4fc4.jpg\",\"gallery-62de531fbaf43.jpg\",\"gallery-62de531fd2e44.jpg\"]', '2022-07-25 08:24:00', '2022-07-25 08:24:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sqm` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`image`)),
  `description` varchar(255) DEFAULT NULL,
  `material` varchar(255) NOT NULL,
  `available` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `project_id`, `building_id`, `name`, `sqm`, `price`, `discount_price`, `image`, `description`, `material`, `available`, `created_at`, `updated_at`) VALUES
(2, 0, 2, 'Justina Marquez', 'Voluptatem qui quod', '985', '783', '[\"1353631044.jpeg\"]', NULL, 'Orli Marsh', 1, '2022-12-09 11:29:38', '2022-12-09 11:29:38'),
(3, 0, 2, 'Jacob Page', 'Error exercitation a', '74', '155', '[\"832118345.png\"]', NULL, 'Rhea Underwood', 0, '2022-12-10 17:13:43', '2022-12-10 17:13:43'),
(4, 3, 2, 'Phelan West', 'Dolor eos sunt cul', '503', '496', '[\"883075611.png\"]', 'asd', 'Aidan Stewart', 1, '2022-12-10 17:14:56', '2022-12-10 21:12:17'),
(5, 6, 4, 'test', '120', '150099', '150000', '[\"1937598254.png\",\"1652495712.jpeg\",\"365427079.jpeg\"]', '', 'ABC-123', 1, '2022-12-18 00:14:48', '2022-12-18 00:14:48'),
(6, 6, 4, 'test', '120', '150099', '150000', '[\"1937598254.png\",\"1652495712.jpeg\",\"365427079.jpeg\"]', '', 'ABC-123', 1, '2022-12-18 00:14:48', '2022-12-18 00:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_translations`
--

CREATE TABLE `inventory_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sqm` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`image`)),
  `description` varchar(255) DEFAULT NULL,
  `material` varchar(255) NOT NULL,
  `available` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_translations`
--

INSERT INTO `inventory_translations` (`id`, `inventory_id`, `project_id`, `building_id`, `locale`, `name`, `sqm`, `price`, `discount_price`, `image`, `description`, `material`, `available`, `created_at`, `updated_at`) VALUES
(2, 2, 0, 2, 'en', 'Justina Marquez', 'Voluptatem qui quod', '985', '783', '[\"1353631044.jpeg\"]', NULL, 'Orli Marsh', 1, '2022-12-09 11:29:38', '2022-12-09 11:29:38'),
(3, 3, 0, 2, 'en', 'Jacob Page', 'Error exercitation a', '74', '155', '[\"832118345.png\"]', NULL, 'Rhea Underwood', 0, '2022-12-10 17:13:43', '2022-12-10 17:13:43'),
(4, 4, 0, 2, 'en', 'Phelan West', 'Dolor eos sunt cul', '503', '496', '[\"883075611.png\"]', 'asd', 'Aidan Stewart', 1, '2022-12-10 17:14:56', '2022-12-10 21:12:17'),
(5, 5, 6, 4, 'en', 'test', '120', '150099', '150000', '[\"1937598254.png\",\"1652495712.jpeg\",\"365427079.jpeg\"]', '', 'ABC-123', 1, '2022-12-18 00:14:48', '2022-12-18 00:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `default` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `locale`, `default`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'ar', 0, '2022-01-23 05:34:23', '2022-01-23 05:34:23'),
(3, 'en', 'en', 0, NULL, NULL),
(12, 'BN', 'bn', 0, '2022-07-18 17:39:31', '2022-07-18 17:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_11_040546_create_countries_table', 1),
(6, '2021_09_11_040744_create_states_table', 1),
(7, '2021_09_11_040809_create_cities_table', 1),
(8, '2021_09_11_040838_create_categories_table', 1),
(9, '2021_09_11_040913_create_packages_table', 1),
(10, '2021_09_11_041028_create_facilities_table', 1),
(11, '2021_09_11_041404_create_properties_table', 1),
(12, '2021_09_11_041451_create_facility_property_table', 1),
(13, '2021_09_11_041535_create_bookings_table', 1),
(14, '2021_09_11_041635_create_package_user_table', 1),
(15, '2021_09_11_041711_create_credits_table', 1),
(16, '2021_09_11_054257_create_currencies_table', 1),
(17, '2021_09_11_054421_create_property_details_table', 1),
(18, '2021_09_13_052504_add_columns_to_users_table', 1),
(19, '2021_09_19_103723_add_is_featured_validity_in_packages_table', 1),
(20, '2021_09_23_052629_add_is_free_column_to_packages_table', 1),
(21, '2021_09_23_155519_add_package_id_to_properties_table', 1),
(22, '2021_09_25_235420_add_credit_to_packages_table', 1),
(23, '2021_09_27_230845_create_images_table', 1),
(24, '2021_09_27_234725_add_property_id_table_to_images_table', 1),
(25, '2021_09_28_133000_change_content_type_to_text_to_property_details_table', 1),
(26, '2021_09_29_154823_add_mobile_office_to_users_table', 1),
(27, '2021_09_30_114538_add_thumbnail_to_properties_table', 1),
(28, '2021_09_30_195519_add_background_image_to_properties_table', 1),
(29, '2021_10_04_115955_create_notifications_table', 1),
(30, '2021_10_07_104212_create_blog_categories_table', 1),
(31, '2021_10_07_104623_create_blogs_table', 1),
(32, '2021_10_07_104716_create_tags_table', 1),
(33, '2021_10_07_115940_add_is_approved_column_to_blogs_table', 1),
(34, '2021_10_10_113626_create_blog_tag_table', 1),
(35, '2021_10_11_094413_create_languages_table', 1),
(36, '2021_10_11_124525_create_city_translations_table', 1),
(37, '2021_10_11_155011_create_blog_translations_table', 1),
(38, '2021_10_11_155252_create_category_translations_table', 1),
(39, '2021_10_11_155342_create_package_translations_table', 1),
(40, '2021_10_11_155430_create_property_translations_table', 1),
(41, '2021_10_11_155456_create_property_detail_translations_table', 1),
(42, '2021_10_11_155526_create_state_translations_table', 1),
(43, '2021_10_11_155551_create_tag_translations_table', 1),
(44, '2021_10_11_155607_create_user_translations_table', 1),
(45, '2021_10_11_160023_create_country_translations_table', 1),
(46, '2021_10_11_160338_create_blog_category_translations_table', 1),
(47, '2021_10_12_151306_create_facility_translations_table', 1),
(48, '2021_10_13_173532_change_description_column_type_string_to_text', 1),
(49, '2021_10_14_150713_rename_column_on_blog_cateogry_translation_table', 1),
(50, '2021_10_20_142924_create_site_infos_table', 1),
(51, '2021_10_24_164740_add_columns_to_site_infos_table', 1),
(52, '2021_10_28_210608_add_color_to_site_infos_table', 1),
(53, '2021_11_02_212007_create_testimonials_table', 1),
(54, '2021_11_02_212345_create_our_partners_table', 1),
(55, '2021_11_02_214726_create_testimonial_translations_table', 1),
(56, '2021_11_02_232421_add_about_us_column_to_site_infos_table', 1),
(57, '2021_12_12_122501_create_paypal_infos_table', 1),
(58, '2021_12_12_133356_create_stripe_infos_table', 1),
(59, '2021_12_20_145624_add_provider_id_to_users_table', 1),
(60, '2021_12_21_114118_change_password_column_to_nullable_to_users_table', 1),
(61, '2021_10_31_134800_add_mi_to_users_table', 2),
(62, '2022_01_28_120227_remove_default_from_site_infoes_table', 2),
(63, '2022_02_28_144711_create_header_images_table', 3),
(64, '2022_07_20_121732_create_services_table', 4),
(65, '2022_07_20_122128_create_projects_table', 4),
(66, '2022_12_05_220835_create_projects_table', 5),
(67, '2022_12_06_130412_create_project_translations_table', 6),
(68, '2022_12_05_232456_create_project_landmarks_table', 7),
(70, '2022_12_06_154407_create_project_landmark_translations_table', 8),
(73, '2022_12_06_223755_create_amenities_table', 11),
(74, '2022_12_06_224435_create_amenity_translations_table', 12),
(75, '2022_12_07_184633_create_inventories_table', 13),
(76, '2022_12_07_184653_create_inventory_translations_table', 14),
(79, '2022_12_08_221815_create_clients_table', 17),
(80, '2022_12_08_222210_create_client_translations_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('220d5898-25d9-47b8-aee8-001152586bc2', 'App\\Notifications\\BookingNotfication', 'App\\Models\\User', 5, '{\"title\":\"Family home in Los Angeles\",\"address\":\"USA, California, Los Angeles\",\"date\":\"09-Apr-1987\",\"time\":\"10.00 am\",\"name\":\"Benedict Jacobson\",\"phone\":\"+1 (154) 893-3951\",\"email\":\"myjax@mailinator.com\",\"message\":\"Deserunt vel autem n\"}', NULL, '2022-05-24 09:55:22', '2022-05-24 09:55:22'),
('8c49e569-bf70-432e-a75b-4efc8c3bba20', 'App\\Notifications\\MessageReceived', 'App\\Models\\User', 2, '{\"name\":\"Abdullah\",\"phone\":\"01817666555\",\"email\":\"admin@lion-coders.com\",\"message\":\"Hello, I am asdfasdfin [Luxury apartment bay view]\"}', '2022-05-23 06:16:27', '2022-05-23 06:16:15', '2022-05-23 06:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `our_partners`
--

CREATE TABLE `our_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `our_partners`
--

INSERT INTO `our_partners` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'partner1', 'partner1-2022-01-23-61ed1a24ea798.webp', '2022-01-23 09:04:37', '2022-01-23 09:04:37'),
(2, 'partner2', 'partner2-2022-01-23-61ed1a461b2b0.webp', '2022-01-23 09:05:10', '2022-01-23 09:05:10'),
(3, 'partner3', 'partner3-2022-01-23-61ed1a7d3c46b.webp', '2022-01-23 09:06:05', '2022-01-23 09:06:05'),
(4, 'partner4', 'partner4-2022-01-23-61ed1ac3ed12c.webp', '2022-01-23 09:07:16', '2022-01-23 09:07:16'),
(5, 'partner5', 'partner5-2022-01-23-61ed1ae15df5f.webp', '2022-01-23 09:07:45', '2022-01-23 09:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `listing` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `is_free` tinyint(1) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `currency_id`, `listing`, `featured`, `package_type`, `order`, `status`, `created_at`, `updated_at`, `is_featured`, `validity`, `is_free`, `credits`) VALUES
(1, 'Standard', '29', 2, '50', '20', 'monthly', 0, 1, '2022-01-22 09:19:11', '2022-01-22 09:19:11', 0, '60', 0, 1),
(2, 'Business', '69', 2, '100', '50', 'monthly', NULL, 1, '2022-01-22 09:25:07', '2022-07-25 08:08:26', 1, '90', 0, 2),
(3, 'Premium', '99', 2, '100', '100', 'monthly', 0, 1, '2022-01-22 09:26:33', '2022-01-22 09:26:33', 0, '100', 0, 1),
(4, 'Free Trial', '00', 2, '10', '2', 'monthly', NULL, 1, '2022-01-22 09:33:24', '2022-01-22 09:33:24', 0, '10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_translations`
--

CREATE TABLE `package_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `package_translations`
--

INSERT INTO `package_translations` (`id`, `package_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Standard', '2022-01-22 09:19:11', '2022-01-22 09:19:11'),
(2, 2, 'en', 'Business', '2022-01-22 09:25:07', '2022-01-22 09:25:07'),
(3, 3, 'en', 'Premium', '2022-01-22 09:26:33', '2022-01-22 09:26:33'),
(4, 4, 'en', 'Free Trial', '2022-01-22 09:33:24', '2022-01-22 09:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `package_user`
--

CREATE TABLE `package_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `is_expired` tinyint(1) NOT NULL,
  `active_at` datetime NOT NULL,
  `expire_at` datetime NOT NULL,
  `price` varchar(255) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `package_user`
--

INSERT INTO `package_user` (`id`, `user_id`, `package_id`, `property_id`, `is_expired`, `active_at`, `expire_at`, `price`, `item`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 0, '2022-01-23 11:17:00', '2050-02-02 11:16:57', '0', '0', 1, NULL, '2022-03-01 18:22:27'),
(2, 2, 4, 1, 0, '2022-01-23 11:27:28', '2050-02-02 11:27:26', '0', '0', 1, NULL, '2022-03-01 18:22:27'),
(3, 4, 4, 1, 0, '2022-01-23 11:51:58', '2050-02-02 11:51:55', '0', '0', 1, NULL, '2022-03-01 18:22:27'),
(4, 2, 2, 1, 0, '2022-01-23 15:59:34', '2050-04-23 15:58:39', '66', '97', 1, NULL, '2022-05-31 12:15:11'),
(5, 5, 1, 1, 0, '2022-01-23 16:14:31', '2050-03-24 16:14:24', '27', '48', 1, NULL, '2022-01-23 10:23:43'),
(6, 2, 1, 1, 1, '2022-05-10 14:28:32', '2022-07-09 14:27:10', '0', '0', 1, NULL, '2022-12-05 16:33:15'),
(7, 3, 2, 1, 0, '2022-07-25 14:11:23', '2022-10-23 14:10:42', '69', '100', 1, NULL, '2022-07-25 08:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `down_payment` int(11) DEFAULT NULL,
  `max_installments` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`id`, `name`, `down_payment`, `max_installments`, `created_at`, `updated_at`) VALUES
(2, 'Caryn Lara update', 3030, 4242, '2022-12-05 21:27:06', '2022-12-05 21:52:52'),
(4, 'Test Term Update', 2000, 20, '2022-12-10 16:57:23', '2022-12-10 16:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_term_translations`
--

CREATE TABLE `payment_term_translations` (
  `id` int(11) NOT NULL,
  `payment_term_id` int(11) DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `down_payment` int(11) DEFAULT NULL,
  `max_installments` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_term_translations`
--

INSERT INTO `payment_term_translations` (`id`, `payment_term_id`, `locale`, `name`, `down_payment`, `max_installments`, `created_at`, `updated_at`) VALUES
(2, 2, 'en', 'Caryn Lara update', 3030, 4242, '2022-12-05 21:27:06', '2022-12-05 21:52:53'),
(4, 4, 'en', 'Test Term Update', 2000, 20, '2022-12-10 16:57:23', '2022-12-10 16:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_infos`
--

CREATE TABLE `paypal_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `sandbox` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `overall_sqm` varchar(255) DEFAULT NULL,
  `project_link` varchar(255) DEFAULT NULL,
  `cover_media_img` longtext DEFAULT NULL,
  `cover_media_vid_url` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `location`, `description`, `overall_sqm`, `project_link`, `cover_media_img`, `cover_media_vid_url`, `created_at`, `updated_at`) VALUES
(1, 'Axel Fitzpatrick', 'Voluptatibus qui quo', 'Qui exercitationem d', '75', 'https://xyz.com', '[\"504438158_jpeg\"]', '[\"\"]', '2022-12-06 16:14:27', '2022-12-06 16:18:36'),
(2, 'Russell Robbins', 'Velit do sequi iusto', 'Proident eum volupt', '324', NULL, '[]', '[\"\"]', '2022-12-07 01:07:18', '2022-12-07 01:07:36'),
(3, 'Ina Richard', 'Architecto error cup', 'Pariatur Nihil omni', 'Minima sequi ab fugi', NULL, '[\"1737643671_png\"]', '[\"Suscipit Nam eum omn\"]', '2022-12-07 09:38:19', '2022-12-07 09:38:19'),
(5, 'Shana Riggs update', 'Non assumenda aperia update', 'Mollitia magna est', 'Veniam ut illum qu update', 'https://xyz.com', '[\"316597466.png\",\"137696944.jpeg\"]', '[\"\",\"\"]', '2022-12-10 17:02:45', '2022-12-15 22:13:43'),
(6, 'Vaughan Saunders', 'Pariatur Proident', 'Ut aute qui molestia', 'Atque anim ipsum est', 'asd', '[\"33209493.jpeg\"]', '[\"Iste deleniti corrup\"]', '2022-12-15 22:15:50', '2022-12-15 22:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `project_buildings`
--

CREATE TABLE `project_buildings` (
  `id` int(11) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `payment_term_ids` varchar(990) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project_buildings`
--

INSERT INTO `project_buildings` (`id`, `project_id`, `payment_term_ids`, `name`, `capacity`, `description`, `code`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, '2', 'Alice Stone', 'Esse placeat enim', 'Illum laboriosam v', 'Minim tempore asper', '0', '2022-12-09 11:29:21', '2022-12-09 11:29:21'),
(3, 5, '[\"4\",\"2\"]', 'Beck Herrera', 'Tempor quia debitis', 'Voluptate vel mollit', 'Culpa commodi ullam', '0', '2022-12-10 21:26:20', '2022-12-10 21:26:20'),
(4, 6, '[\"4\",\"2\"]', 'Ferris Allison', 'Labore dolor quo eve', 'Consectetur consecte', 'Sint impedit accusa', '1', '2022-12-17 14:58:24', '2022-12-17 14:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `project_building_translations`
--

CREATE TABLE `project_building_translations` (
  `project_id` bigint(20) NOT NULL,
  `id` int(11) NOT NULL,
  `project_building_id` int(11) DEFAULT NULL,
  `locale` varchar(990) DEFAULT NULL,
  `payment_term_ids` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project_building_translations`
--

INSERT INTO `project_building_translations` (`project_id`, `id`, `project_building_id`, `locale`, `payment_term_ids`, `name`, `capacity`, `description`, `code`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 'en', '2', 'Alice Stone', 'Esse placeat enim', 'Illum laboriosam v', 'Minim tempore asper', '0', '2022-12-09 11:29:21', '2022-12-09 11:29:21'),
(5, 3, 3, 'en', '[\"4\",\"2\"]', 'Beck Herrera', 'Tempor quia debitis', 'Voluptate vel mollit', 'Culpa commodi ullam', '0', '2022-12-10 21:26:20', '2022-12-10 21:26:20'),
(6, 4, 4, 'en', '[\"4\",\"2\"]', 'Ferris Allison', 'Labore dolor quo eve', 'Consectetur consecte', 'Sint impedit accusa', '1', '2022-12-17 14:58:24', '2022-12-17 14:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `project_landmarks`
--

CREATE TABLE `project_landmarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `map_location` varchar(255) DEFAULT NULL,
  `location_minutes` varchar(255) DEFAULT NULL,
  `location_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_landmarks`
--

INSERT INTO `project_landmarks` (`id`, `project_id`, `name`, `map_location`, `location_minutes`, `location_image`, `created_at`, `updated_at`) VALUES
(4, 5, 'Conan Phillips', 'Nihil sit incidunt', '14', '201210839.png', '2022-12-10 17:06:53', '2022-12-10 17:06:53'),
(5, 5, 'Veronica Anderson', 'Et accusantium nemo', '24', '237101580.png', '2022-12-10 17:07:23', '2022-12-10 17:07:23'),
(6, 6, 'Stella Erickson', 'Aspernatur dolor cum', '11', '1217946030.png', '2022-12-17 14:53:32', '2022-12-17 14:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `project_landmark_translations`
--

CREATE TABLE `project_landmark_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `landmark_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `map_location` varchar(255) DEFAULT NULL,
  `location_minutes` varchar(255) DEFAULT NULL,
  `location_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_landmark_translations`
--

INSERT INTO `project_landmark_translations` (`id`, `landmark_id`, `project_id`, `locale`, `name`, `map_location`, `location_minutes`, `location_image`, `created_at`, `updated_at`) VALUES
(4, 4, 5, 'en', 'Conan Phillips', 'Nihil sit incidunt', '14', '201210839.png', '2022-12-10 17:06:53', '2022-12-10 17:06:53'),
(5, 5, 5, 'en', 'Veronica Anderson', 'Et accusantium nemo', '24', '237101580.png', '2022-12-10 17:07:23', '2022-12-10 17:07:23'),
(6, 6, 6, 'en', 'Stella Erickson', 'Aspernatur dolor cum', '11', '1217946030.png', '2022-12-17 14:53:32', '2022-12-17 14:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `project_translations`
--

CREATE TABLE `project_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `overall_sqm` varchar(255) DEFAULT NULL,
  `project_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_translations`
--

INSERT INTO `project_translations` (`id`, `project_id`, `locale`, `name`, `location`, `description`, `overall_sqm`, `project_link`, `created_at`, `updated_at`) VALUES
(1, 2, 'en', 'Russell Robbins', 'Velit do sequi iusto', 'Proident eum volupt', '324', NULL, '2022-12-06 09:57:07', '2022-12-07 01:07:36'),
(2, 3, 'en', 'Felicia Wiley', 'Incidunt ut id et', 'Voluptatem sapiente', '72', NULL, '2022-12-06 10:03:37', '2022-12-06 10:03:37'),
(3, 1, 'en', 'Axel Fitzpatrick', 'Voluptatibus qui quo', 'Qui exercitationem d', '75', NULL, '2022-12-06 10:14:36', '2022-12-06 16:18:36'),
(4, 2, 'en', 'Russell Robbins', 'Velit do sequi iusto', 'Proident eum volupt', 'Rem qui voluptas inc', NULL, '2022-12-07 01:07:18', '2022-12-07 01:07:18'),
(5, 3, 'en', 'Ina Richard', 'Architecto error cup', 'Pariatur Nihil omni', 'Minima sequi ab fugi', NULL, '2022-12-07 09:38:19', '2022-12-07 09:38:19'),
(7, 5, 'en', 'Shana Riggs update', 'Non assumenda aperia update', 'Mollitia magna est', 'Veniam ut illum qu update', 'https://xyz.com', '2022-12-10 17:02:45', '2022-12-15 22:11:53'),
(8, 6, 'en', 'Vaughan Saunders', 'Pariatur Proident', 'Ut aute qui molestia', 'Atque anim ipsum est', 'asd', '2022-12-15 22:15:50', '2022-12-15 22:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `moderation_status` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `property_id`, `category_id`, `country_id`, `city_id`, `state_id`, `currency_id`, `title`, `type`, `lat`, `lon`, `price`, `status`, `moderation_status`, `is_featured`, `description`, `created_at`, `updated_at`, `package_id`, `thumbnail`, `background_image`) VALUES
(1, 2, 'ZOAC26', 1, 1, 4, 5, 1, 'Villa on Beacon', 'rent', '41.508064', '-73.977554', '7500', 0, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 05:31:46', '2022-03-01 18:22:27', 2, 'villa-on-beacon-2022-01-23-61ece83f966db.webp', 'villa-on-beacon-2022-01-23-61ece84034faf.webp'),
(3, 2, 'ZOAC25', 1, 1, 2, 5, 1, 'Luxury villa in Amsterdam', 'sale', '42.9417412', '-74.1904081', '8500', 1, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:04:36', '2022-01-23 10:08:35', 4, 'luxury-villa-in-amsterdam-2022-01-23-61ed283259c69.webp', 'luxury-villa-in-amsterdam-2022-01-23-61ed2832bffdd.webp'),
(4, 5, 'ZOAC26', 1, 1, 8, 3, 1, 'Family home in Los Angeles', 'rent', '34.052235', '-118.243683', '7500', 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:19:33', '2022-01-24 06:24:40', 5, 'family-home-in-los-angeles-2022-01-24-61ee46276f287.webp', 'family-home-in-los-angeles-2022-01-24-61ee4627c6737.webp'),
(5, 5, 'ZOAC27', 1, 1, 2, 5, 1, 'Duplex Apartment on Amsterdam', 'rent', '42.9417412', '-74.1904081', '7000', 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:23:43', '2022-01-23 10:24:35', 5, 'duplex-apartment-on-amsterdam-2022-01-23-61ed2cad227df.webp', 'duplex-apartment-on-amsterdam-2022-01-23-61ed2cad5da54.webp'),
(6, 2, 'ZOAC28', 2, 1, 9, 2, 1, 'Apartment in Princeton', 'sale', '40.3573', '74.6672', '10000', 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-24 05:51:56', '2022-01-24 06:00:41', 4, 'apartment-in-princeton-2022-01-24-61ee3e791b43e.webp', 'apartment-in-princeton-2022-01-24-61ee3e79ee7d8.webp'),
(7, 2, 'ZOAC28', 2, 1, 4, 5, 1, 'This is test title', 'rent', '2.345', '3.33', '500', 2, 2, 1, 'This is test description.', '2022-05-31 12:15:10', '2022-05-31 12:15:10', 4, 'this-is-test-title-2022-05-31-629606cd60d82.jpg', 'this-is-test-title-2022-05-31-629606cdb95fe.jpg'),
(8, 3, 'ZOAC28', 1, 1, 2, 5, 1, 'Test Title', 'sale', '2.345', '1.3234', '1500', 2, 2, 1, 'a quick brown fox jumps over the lazy dog.', '2022-07-25 08:24:00', '2022-07-25 08:24:00', 7, 'test-title-2022-07-25-62de531e8b688.jpg', 'test-title-2022-07-25-62de531f2e1c4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `property_details`
--

CREATE TABLE `property_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `bed` varchar(255) DEFAULT NULL,
  `bath` varchar(255) DEFAULT NULL,
  `garage` varchar(255) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `room_size` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `property_details`
--

INSERT INTO `property_details` (`id`, `property_id`, `bed`, `bath`, `garage`, `floor`, `room_size`, `content`, `video`, `created_at`, `updated_at`) VALUES
(1, 1, '4', '4', '1', 'First Floor', '150', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', 'https://www.youtube.com/watch?v=v_ATnE02qFs', '2022-01-23 05:31:46', '2022-01-23 05:32:30'),
(3, 3, '4', '3', '1', 'First Floor', '', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', 'https://www.youtube.com/watch?v=v_ATnE02qFs', '2022-01-23 10:04:36', '2022-01-23 10:08:35'),
(4, 4, '3', '2', '2', 'Third Floor', '250', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', 'https://www.youtube.com/watch?v=v_ATnE02qFs', '2022-01-23 10:19:33', '2022-01-23 10:25:40'),
(5, 5, '4', '3', '2', 'First Floor', '160', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', 'https://www.youtube.com/watch?v=v_ATnE02qFs', '2022-01-23 10:23:43', '2022-01-23 10:24:35'),
(6, 6, '4', '3', '2', 'Second Floor', '150', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', 'https://www.youtube.com/watch?v=v_ATnE02qFs', '2022-01-24 05:51:56', '2022-01-24 06:00:41'),
(7, 7, '', '', '', 'First Floor', '', 'This is test Content.', '', '2022-05-31 12:15:10', '2022-05-31 12:15:10'),
(8, 8, '10', '05', '02', 'Second Floor', '200', 'a quick brown fox jumps over the lazy dog.', 'https://youtube.com', '2022-07-25 08:24:00', '2022-07-25 08:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `property_detail_translations`
--

CREATE TABLE `property_detail_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `propertyDetail_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `property_detail_translations`
--

INSERT INTO `property_detail_translations` (`id`, `propertyDetail_id`, `locale`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 05:31:46', '2022-01-23 05:32:30'),
(3, 3, 'en', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:04:36', '2022-01-23 10:08:35'),
(4, 4, 'en', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:19:33', '2022-01-23 10:25:40'),
(5, 5, 'en', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:23:43', '2022-01-23 10:24:35'),
(6, 6, 'en', '&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-24 05:51:56', '2022-01-24 06:00:41'),
(7, 7, 'en', 'This is test Content.', '2022-05-31 12:15:10', '2022-05-31 12:15:10'),
(8, 8, 'en', 'a quick brown fox jumps over the lazy dog.', '2022-07-25 08:24:00', '2022-07-25 08:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `property_translations`
--

CREATE TABLE `property_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `property_translations`
--

INSERT INTO `property_translations` (`id`, `property_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Villa on Beacon', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 05:31:46', '2022-01-23 05:31:46'),
(3, 3, 'en', 'Luxury villa in Amsterdam', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:04:36', '2022-01-23 10:04:36'),
(4, 4, 'en', 'Family home in Los Angeles', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:19:33', '2022-01-23 10:19:33'),
(5, 5, 'en', 'Duplex Apartment on Amsterdam', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-23 10:23:43', '2022-01-23 10:23:43'),
(6, 6, 'en', 'Apartment in Princeton', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta consectetur et porro voluptatem maiores quidem inventore harum explicabo deserunt fuga minima sed, sit nemo expedita. Dolor aliquid rerum recusandae excepturi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, dicta, impedit. Eveniet incidunt provident minima totam aut facilis tenetur quam officia omnis dolorem! Autem iste fugit mollitia rerum quae, veritatis perferendis voluptas magni aliquam consequuntur, minima repellendus eveniet laboriosam iure.', '2022-01-24 05:51:56', '2022-01-24 05:51:56'),
(7, 7, 'en', 'This is test title', 'This is test description.', '2022-05-31 12:15:10', '2022-05-31 12:15:10'),
(8, 8, 'en', 'Test Title', 'a quick brown fox jumps over the lazy dog.', '2022-07-25 08:24:00', '2022-07-25 08:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `site_infos`
--

CREATE TABLE `site_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'title',
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `copy_right` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `yt` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms_condition` longtext DEFAULT NULL,
  `privacy_policy` longtext DEFAULT NULL,
  `color` varchar(255) DEFAULT '6449E7',
  `about_us` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `site_infos`
--

INSERT INTO `site_infos` (`id`, `title`, `logo`, `favicon`, `email`, `phone`, `description`, `address`, `copy_right`, `fb`, `twitter`, `yt`, `pinterest`, `created_at`, `updated_at`, `terms_condition`, `privacy_policy`, `color`, `about_us`) VALUES
(1, 'Sarchholm', 'sarchholm-your-real-estate-solution-2022-07-20-62d7b03708d67.webp', 'sarchholm-your-real-estate-solution-2022-07-20-62d7b03723fce.webp', 'info@sarchholm.com', '+444 435 6348', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio excepturi nam totam sequi, ipsam consequatur repudiandae libero illum.', '13th North Ave, Florida, USA', '©SarchHolm  2022. All rights reserved.', 'https://facebook.com', 'https://twitter.com', 'https://youtube.com', 'https://pinterest.com', '2022-01-22 18:00:00', '2022-09-20 08:46:45', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio excepturi nam totam sequi, ipsam consequatur repudiandae libero illum.', 'privacy Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio excepturi nam totam sequi, ipsam consequatur repudiandae libero illum.', '#6449E7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur quasi natus quia facilis corporis quibusdam ut non laudantium recusandae fugiat rerum ab aliquid accusamus cumque quae, illum id voluptatem ducimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur quasi natus quia facilis corporis quibusdam ut non laudantium recusandae fugiat rerum ab aliquid accusamus cumque quae, illum id voluptatem ducimus');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Florida', 1, NULL, 1, '2022-01-22 08:44:46', '2022-01-22 08:44:46'),
(2, 'New Jersey', 1, NULL, 1, '2022-01-22 08:45:17', '2022-01-22 08:45:17'),
(3, 'California', 1, NULL, 1, '2022-01-22 08:45:39', '2022-01-22 08:45:39'),
(4, 'Washington', 1, NULL, 1, '2022-01-22 08:46:05', '2022-01-22 08:46:05'),
(5, 'New York', 1, NULL, 1, '2022-01-22 08:46:43', '2022-01-22 08:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `state_translations`
--

CREATE TABLE `state_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `state_translations`
--

INSERT INTO `state_translations` (`id`, `state_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Florida', '2022-01-22 08:44:46', '2022-01-22 08:44:46'),
(2, 2, 'en', 'New Jersey', '2022-01-22 08:45:17', '2022-01-22 08:45:17'),
(3, 3, 'en', 'California', '2022-01-22 08:45:39', '2022-01-22 08:45:39'),
(4, 4, 'en', 'Washington', '2022-01-22 08:46:05', '2022-01-22 08:46:05'),
(5, 5, 'en', 'New York', '2022-01-22 08:46:43', '2022-01-22 08:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_infos`
--

CREATE TABLE `stripe_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stripe_infos`
--

INSERT INTO `stripe_infos` (`id`, `status`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Stripe Payments', 'Stripe Payments', '2022-06-06 06:00:25', '2022-06-06 06:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Villa', 0, 1, '2022-01-22 09:39:05', '2022-01-22 09:39:05'),
(2, 'Apartment', 0, 1, '2022-01-22 09:39:17', '2022-01-22 09:39:17'),
(3, 'Condo', 0, 1, '2022-01-22 09:39:28', '2022-01-22 09:39:28'),
(4, 'Interior', 0, 1, '2022-01-22 09:39:43', '2022-01-22 09:39:43'),
(5, 'Family home', 0, 1, '2022-01-22 09:39:56', '2022-01-22 09:39:56'),
(6, 'Luxury villa', 0, 1, '2022-01-22 09:40:16', '2022-01-22 09:40:16'),
(7, 'Real estate', 0, 1, '2022-01-22 09:40:27', '2022-01-22 09:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Villa', '2022-01-22 09:39:05', '2022-01-22 09:39:05'),
(2, 2, 'en', 'Apartment', '2022-01-22 09:39:17', '2022-01-22 09:39:17'),
(3, 3, 'en', 'Condo', '2022-01-22 09:39:28', '2022-01-22 09:39:28'),
(4, 4, 'en', 'Interior', '2022-01-22 09:39:43', '2022-01-22 09:39:43'),
(5, 5, 'en', 'Family home', '2022-01-22 09:39:56', '2022-01-22 09:39:56'),
(6, 6, 'en', 'Luxury villa', '2022-01-22 09:40:16', '2022-01-22 09:40:16'),
(7, 7, 'en', 'Real estate', '2022-01-22 09:40:27', '2022-01-22 09:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `address`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Smith & Sara Williamson', '13th North Ave, Florida, USA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio excepturi nam totam sequi, ipsam consequatur repudiandae libero illum.', 'smith-sara-williamson-2022-01-23-61ed21f678e3a.webp', NULL, '2022-01-23 09:37:58', '2022-01-23 09:37:58'),
(2, 'Bob & Ana Franklin', 'North Carolina, USA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio excepturi nam totam sequi, ipsam consequatur repudiandae libero illum.', 'bob-ana-franklin-2022-01-23-61ed222eba1c4.webp', NULL, '2022-01-23 09:38:55', '2022-01-23 09:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_translations`
--

CREATE TABLE `testimonial_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testimonial_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `testimonial_translations`
--

INSERT INTO `testimonial_translations` (`id`, `testimonial_id`, `name`, `locale`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Smith & Sara Williamson', 'en', '13th North Ave, Florida, USA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio excepturi nam totam sequi, ipsam consequatur repudiandae libero illum.', '2022-01-23 09:37:58', '2022-01-23 09:37:58'),
(2, 2, 'Bob & Ana Franklin', 'en', 'North Carolina, USA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio excepturi nam totam sequi, ipsam consequatur repudiandae libero illum.', '2022-01-23 09:38:55', '2022-01-23 09:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mi` varchar(255) DEFAULT 'mi',
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `mobile_office` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mi`, `f_name`, `l_name`, `username`, `type`, `is_approved`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `title`, `company_name`, `image`, `description`, `skype`, `fb`, `twitter`, `instagram`, `status`, `mobile_office`, `provider_id`) VALUES
(1, 'mi', 'Lion', 'Coders', 'admin', 'admin', 0, 'admin@lion-coders.com', '0222111333', NULL, '$2y$10$5BryVVBccpvExbj.MRnxSOg/Jzqh71KYTBTJu2j4736MkURh8QnT2', NULL, NULL, '2022-01-24 06:21:14', 'Admin', 'SarchHolm', 'admin-2022-01-24-61ee455ac0eec.webp', 'SarchHolm admin.', 'http://skype.com', 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', NULL, '01111222333', NULL),
(2, 'mi', 'Tony', 'Stark', 'tony_stark', 'user', 0, 'tony_stark@sarchholm.com', '+55 255-634-7071', NULL, '$2y$10$vVIQh8IbvAbZTnG2L5HT0O2DS5PTedMYgmiGFgBPfxzAKMb5ckBCu', NULL, '2022-01-23 05:19:58', '2022-01-23 05:23:52', 'Real Estate Agent', 'Zillion Properties.', 'tony-stark-2022-01-23-61ece6680e692.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a.\r\n\r\nUt euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum', 'http://skype.com', 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', NULL, '+55 425-634-7071', NULL),
(3, 'mi', 'Bob', 'Haris', 'bob_haris', 'user', 0, 'bob_haris@sarchholm.com', '+55 255-634-7072', NULL, '$2y$10$10/DOcnyebq6vasw0fUX/O8dOc49oWzvSLYjNQsPS5Ke1Wu8iBf0.', NULL, '2022-01-23 05:20:33', '2022-01-23 05:26:18', 'Sales Executive', 'Zillion Properties', 'bob-haris-2022-01-23-61ece6fabca32.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a.\r\n\r\nUt euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum', 'http://skype.com', 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', NULL, '+55 425-634-7072', NULL),
(5, 'mi', 'Jim', 'Karry', 'jim_karry', 'user', 0, 'jim_karry@sarchholm.com', '+55 255-634-7073', NULL, '$2y$10$bkuyw0Ml6P4wvvY05IePVuTB1rZVtVHVN/XWYeTOwKQ2MaOIp0WuC', NULL, '2022-01-23 06:55:25', '2022-01-23 06:57:13', 'Real Estate Agent', 'Zillion Properties', 'jim-karry-2022-01-23-61ecfc495f8f7.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a.\r\n\r\nUt euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum', 'http://skype.com', 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', NULL, '+55 425-634-7073', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_translations`
--

CREATE TABLE `user_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_translations`
--

INSERT INTO `user_translations` (`id`, `user_id`, `locale`, `f_name`, `l_name`, `title`, `company_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'en', 'Tony', 'Stark', 'Real Estate Agent', 'Zillion Properties.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a.\r\n\r\nUt euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum', '2022-01-23 05:23:52', '2022-01-23 05:23:52'),
(2, 3, 'en', 'Bob', 'Haris', 'Sales Executive', 'Zillion Properties', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a.\r\n\r\nUt euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum', '2022-01-23 05:26:18', '2022-01-23 05:26:18'),
(4, 5, 'en', 'Jim', 'Karry', 'Real Estate Agent', 'Zillion Properties', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a.\r\n\r\nUt euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum', '2022-01-23 06:57:13', '2022-01-23 06:57:13'),
(5, 1, 'en', 'Lion', 'Coders', 'Admin', 'SarchHolm', 'SarchHolm admin.', '2022-01-24 06:21:14', '2022-01-24 06:21:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenity_translations`
--
ALTER TABLE `amenity_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_translations`
--
ALTER TABLE `blog_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_detail_translations`
--
ALTER TABLE `client_detail_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_translations`
--
ALTER TABLE `client_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_property`
--
ALTER TABLE `facility_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_translations`
--
ALTER TABLE `facility_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `header_images`
--
ALTER TABLE `header_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_translations`
--
ALTER TABLE `inventory_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_locale_unique` (`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `our_partners`
--
ALTER TABLE `our_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_translations`
--
ALTER TABLE `package_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_user`
--
ALTER TABLE `package_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_term_translations`
--
ALTER TABLE `payment_term_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_infos`
--
ALTER TABLE `paypal_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_buildings`
--
ALTER TABLE `project_buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_building_translations`
--
ALTER TABLE `project_building_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_landmarks`
--
ALTER TABLE `project_landmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_landmark_translations`
--
ALTER TABLE `project_landmark_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_translations`
--
ALTER TABLE `project_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_user_id_foreign` (`user_id`);

--
-- Indexes for table `property_details`
--
ALTER TABLE `property_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_details_property_id_foreign` (`property_id`);

--
-- Indexes for table `property_detail_translations`
--
ALTER TABLE `property_detail_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_detail_translations_propertydetail_id_foreign` (`propertyDetail_id`);

--
-- Indexes for table `property_translations`
--
ALTER TABLE `property_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_translations_property_id_foreign` (`property_id`);

--
-- Indexes for table `site_infos`
--
ALTER TABLE `site_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `state_translations`
--
ALTER TABLE `state_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_infos`
--
ALTER TABLE `stripe_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_translations`
--
ALTER TABLE `testimonial_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_translations`
--
ALTER TABLE `user_translations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `amenity_translations`
--
ALTER TABLE `amenity_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_translations`
--
ALTER TABLE `blog_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_detail_translations`
--
ALTER TABLE `client_detail_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_translations`
--
ALTER TABLE `client_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_translations`
--
ALTER TABLE `country_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `facility_property`
--
ALTER TABLE `facility_property`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `facility_translations`
--
ALTER TABLE `facility_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_images`
--
ALTER TABLE `header_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory_translations`
--
ALTER TABLE `inventory_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `our_partners`
--
ALTER TABLE `our_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_translations`
--
ALTER TABLE `package_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_user`
--
ALTER TABLE `package_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_term_translations`
--
ALTER TABLE `payment_term_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paypal_infos`
--
ALTER TABLE `paypal_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_buildings`
--
ALTER TABLE `project_buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_building_translations`
--
ALTER TABLE `project_building_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_landmarks`
--
ALTER TABLE `project_landmarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_landmark_translations`
--
ALTER TABLE `project_landmark_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_translations`
--
ALTER TABLE `project_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_details`
--
ALTER TABLE `property_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_detail_translations`
--
ALTER TABLE `property_detail_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_translations`
--
ALTER TABLE `property_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site_infos`
--
ALTER TABLE `site_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `state_translations`
--
ALTER TABLE `state_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stripe_infos`
--
ALTER TABLE `stripe_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial_translations`
--
ALTER TABLE `testimonial_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_translations`
--
ALTER TABLE `user_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_details`
--
ALTER TABLE `property_details`
  ADD CONSTRAINT `property_details_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_detail_translations`
--
ALTER TABLE `property_detail_translations`
  ADD CONSTRAINT `property_detail_translations_propertydetail_id_foreign` FOREIGN KEY (`propertyDetail_id`) REFERENCES `property_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_translations`
--
ALTER TABLE `property_translations`
  ADD CONSTRAINT `property_translations_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
