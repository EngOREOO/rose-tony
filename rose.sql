-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2025 at 10:14 AM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rose`
--

-- --------------------------------------------------------

--
-- Table structure for table `1`
--

CREATE TABLE `1` (
  `id` bigint NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint UNSIGNED NOT NULL,
  `top_image` text COLLATE utf8mb4_unicode_ci,
  `head_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paragraph` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci,
  `under_video_image` text COLLATE utf8mb4_unicode_ci,
  `why_choose_us` text COLLATE utf8mb4_unicode_ci,
  `our_mission` text COLLATE utf8mb4_unicode_ci,
  `our_principles` text COLLATE utf8mb4_unicode_ci,
  `side_images` json DEFAULT NULL,
  `partners_logos` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `top_image`, `head_text`, `paragraph`, `video_url`, `under_video_image`, `why_choose_us`, `our_mission`, `our_principles`, `side_images`, `partners_logos`, `created_at`, `updated_at`) VALUES
(1, 'about_us/images/01JS27BN3407G5EYE8QDHK5KJ8.jpg', 'هيدر من نحن احنا مين', '<p dir=\"rtl\">محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي محتوي</p>', 'https://www.youtube.com/watch?v=_sI_Ps7JSEk', 'about_us/images/01JS1V10AFKF4F60J9YX5WHEQK.png', '<h2>Why Choose Us</h2><p>Do so written as raising parlors spirits mr elderly. Made late in of high hold. Carried females of up highest calling. Limits marked led silent dining her she far. Sir but elegance marriage dwelling likewise position old pleasure men dissimilar themselves. Simplicity no of casted as great day hours men. Stuff front to do allow to asked he. Is allowance instantly strangers applauded discourse. Dissimilar themselves simplicity no of contrasted as.</p><p><br></p>', '<p><strong>Our Mission<br></strong><br></p><p>Ignorant saw her her drawings marriage laughter. Case oh an that or away sigh do here upon. Acuteness you exquisite ourselves now end forfeited. Enquire ye without it is garrets up himself. Interest our nor received followed was.</p>', '<p><strong>Our Principles<br></strong><br></p><p>Ignorant saw her her drawings marriage laughter. Case oh an that or away sigh do here upon. Acuteness you exquisite ourselves now end forfeited. Enquire ye without it is garrets up himself. Interest our nor received followed was.</p>', '[\"about_us/side_images/01JS1V10AH4PB2RMCWCTS325YA.jpg\", \"about_us/side_images/01JS1V10AJN0S4M91R9MJRJ8Q8.jpg\", \"about_us/side_images/01JS1V10AK5BANK796NBR5XM85.jpg\", \"about_us/side_images/01JS1V10AK5BANK796NBR5XM86.jpg\"]', '[{\"logo\": \"about_us/partners/brand_1_1.svg\"}, {\"logo\": \"about_us/partners/brand_1_1.svg\"}, {\"logo\": \"about_us/partners/brand_1_1.svg\"}, {\"logo\": \"about_us/partners/brand_1_1.svg\"}]', '2025-04-17 10:19:23', '2025-04-17 19:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `application_benefits`
--

CREATE TABLE `application_benefits` (
  `id` bigint UNSIGNED NOT NULL,
  `about_us_id` bigint UNSIGNED NOT NULL,
  `benefit_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` json DEFAULT NULL,
  `header_image` text COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `author`, `slug`, `tags`, `header_image`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'The Ultimate Guide To Marketing Strategies to Improve Sales', '<p>Continued advancements in technology will further change how fashion is created, marketed, &amp; consumed. Virtual reality, artificial intelligence, and blockchain are expected to play significant roles. Fashion is heavily influenced by cultural movements, social changes, and historical events. For example, the 1960s saw the rise of the hippie movement, which brought bohemian styles to the forefront. Public figures and social media influencers have a significant impact on fashion trends. Collaborations between celebrities and brands are common. Affordable, trendy clothing that is quickly produced and brought to market to meet current consumer demands. Brands like Zara and H&amp;M are known for this model.</p><p><br></p><blockquote>Growing awareness and demand for sustainable fashion are pushing brands to adopt eco-friendly materials and ethical manufacturing processes. For example, the 1960s saw the rise of the hippie movement, which brought bohemian styles to the forefront.</blockquote><p><br></p><p>Major cities like Paris, Milan, New York, and London host biannual fashion weeks where designers showcase their latest collections. Events like Pitti Uomo and Magic Las Vegas are important for networking and discovering new trends and products. The rise of online shopping, social media. InJunations like 3D printing, smart textiles, and virtual fitting rooms are transforming how fashion is designed, produced, and sold.</p><p><br></p>', '01JS7ET1G6NM43R6KQ5YCK464R.jpg', 'admin', 'test', '\"tws\"', NULL, 1, 1, '2025-04-19 14:41:18', '2025-04-19 14:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Yellow Duck', 'brands/01JRAHG83M2TE57YRFHWWZ5R9E.avif', '2025-04-08 09:10:24', '2025-04-08 09:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:3;', 1745223783),
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1745223783;', 1745223783),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1745247335),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1745247335;', 1745247335);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'روزفيوم', '2025-03-26 01:40:26', '2025-03-26 01:40:26'),
(2, 'تنت', '2025-03-26 01:40:36', '2025-03-26 01:40:36'),
(3, 'عروض بيرفيوم', '2025-03-26 12:20:43', '2025-03-26 12:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact_questions`
--

CREATE TABLE `contact_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_questions`
--

INSERT INTO `contact_questions` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', 'ahmed@mail.com', 'test message', '2025-04-08 09:51:44', '2025-04-08 09:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `contact_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_paragraph` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `address`, `phone`, `email`, `map_url`, `image`, `contact_head`, `contact_paragraph`, `contact_button_text`, `created_at`, `updated_at`) VALUES
(1, '15 Maniel Lane, Front\nLine Berlin\n', '+163 6547 9658\n+163 3698 3478', 'admin@mail.com\nuser@mail.com', 'https://html.themeholy.com/erna/demo/contact-3.html', '01JS7BXBF37KTP78B8QRKB1C5B.png', 'Get In Touch', 'test', 'submit', '2025-04-08 08:45:11', '2025-04-19 13:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int NOT NULL DEFAULT '0',
  `rating_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_reviews`
--

INSERT INTO `customer_reviews` (`id`, `name`, `rate`, `rating_text`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 4, 'كلام كتير بقي', '2025-04-08 09:01:40', '2025-04-08 09:01:40'),
(2, 'احمد العميل', 5, 'رأي العميل كلام كلام كلام  كلام كلام كلام كلام كلام كلام كلام كلام كلام كلام كلام كلام كلام كلام كلام', '2025-04-17 13:37:10', '2025-04-17 13:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_help_section`
--

CREATE TABLE `faq_help_section` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Need Help?',
  `description` text COLLATE utf8mb4_unicode_ci,
  `notice` text COLLATE utf8mb4_unicode_ci,
  `form_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Have any Question',
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Ask Question Now',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_help_section`
--

INSERT INTO `faq_help_section` (`id`, `title`, `description`, `notice`, `form_title`, `button_text`, `created_at`, `updated_at`) VALUES
(1, 'Need Help?', 'If you have an issue or question that requires immediate assistance, you can click the button below...', 'Please allow 06 – 12 business days from the time your package arrives...', 'Have Any Question', 'Ask Question Now', '2025-04-08 09:40:06', '2025-04-08 09:40:06'),
(2, 'صص', 'ض', 'ض', 'ض', 'ض', '2025-04-13 17:50:48', '2025-04-13 17:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `footer_menu_items`
--

CREATE TABLE `footer_menu_items` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'customer_service or orders_return',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `about_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_hours_weekday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_hours_weekend` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_store_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `focus_keywords` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `name`, `image`, `description`, `meta_tags`, `meta_description`, `focus_keywords`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'llslsl', 'categories/01JRTAJN6SN9TTTF1TCNBHBT2N.avif', 'sdcs', '\"\\u0633\\u0633\"', '<p dir=\"rtl\">نشنن</p>', '\"\\u0621\"', '[\"test\"]', '2025-04-14 12:17:14', '2025-04-14 12:23:55'),
(2, 'منتجات العناية بالبشرة', 'categories/01JS9AG7DXW3YHKKKPK4XQFYYF.jpg', NULL, '', NULL, '', '', '2025-04-20 08:04:31', '2025-04-20 08:04:31'),
(3, 'wwwwwwwwwwww', 'categories/01JS9FWET929J5J9BMPTB1AQCZ.webp', 'wwwwwwwwww', 'wd,sc,w', '<p>wfww</p>', 'dd,dvd,svd', '/lls', '2025-04-20 09:38:35', '2025-04-20 09:38:35'),
(4, 'منتجات العناية بالبشرة', 'categories/01JSA7Q8TWSW9TR4RG6AVXT52T.webp', 'اي حاجه ', 'ميتا,ميتا ميتا,انا ميتا,ميتتااااا', '<p dir=\"rtl\"><strong>هااي ديسكرستلانشسلا&nbsp;</strong></p><p><br></p>', 'اي حاجه', 'hay', '2025-04-20 16:35:11', '2025-04-20 16:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(9, 'App\\Models\\Product', 2, '14041eb9-019f-4f54-a2cd-6cdf8f221bb7', 'product_images', '91', '01JQ3X2NBQ5GPV645APMJZ7N4M.webp', 'image/webp', 'public', 'public', 56416, '[]', '[]', '[]', '[]', 1, '2025-03-24 11:02:19', '2025-03-24 11:02:19'),
(10, 'App\\Models\\Product', 3, '3736bfb8-07d1-4301-b51e-1301131b33f9', 'product_images', '911111', '01JQ3X4CX1601ZHM45SK0TCWSR.webp', 'image/webp', 'public', 'public', 75082, '[]', '[]', '[]', '[]', 1, '2025-03-24 11:03:16', '2025-03-24 11:03:16'),
(11, 'App\\Models\\Product', 4, '15d1b4fd-1579-45a8-b661-9938d3122b03', 'product_images', '911', '01JQ3X6587PMV6FQVEJSWDAH0V.webp', 'image/webp', 'public', 'public', 71236, '[]', '[]', '[]', '[]', 1, '2025-03-24 11:04:14', '2025-03-24 11:04:14'),
(12, 'App\\Models\\Product', 5, 'f5f49633-a743-43d9-b893-b4d28659323c', 'product_images', '91111', '01JQ3X769SSY1YPDH90H9GQ5BK.webp', 'image/webp', 'public', 'public', 72856, '[]', '[]', '[]', '[]', 1, '2025-03-24 11:04:48', '2025-03-24 11:04:48'),
(13, 'App\\Models\\Product', 6, '128260f1-1a90-4ce4-aa81-153a8b1d02f1', 'product_images', '9111', '01JQ3X8DYHPCC1GNMGB9SJSVSQ.webp', 'image/webp', 'public', 'public', 84968, '[]', '[]', '[]', '[]', 1, '2025-03-24 11:05:28', '2025-03-24 11:05:28'),
(14, 'App\\Models\\Testimonial', 2, 'e77c3187-f8af-41fc-878a-94a21aea079b', 'testimonial_images', 'r01', '01JQ40EFNCH41NWNG68K0F7SR6.webp', 'image/webp', 'public', 'public', 17918, '[]', '[]', '[]', '[]', 1, '2025-03-24 12:01:12', '2025-03-24 12:01:12'),
(15, 'App\\Models\\Testimonial', 2, '7e4e48e1-47df-4622-8fd4-9eb5f9b5aa59', 'testimonial_images', 'r00001', '01JQ40EFNVYA9JVFC78EG789JP.webp', 'image/webp', 'public', 'public', 26136, '[]', '[]', '[]', '[]', 2, '2025-03-24 12:01:12', '2025-03-24 12:01:12'),
(16, 'App\\Models\\Testimonial', 2, '1252db1c-4fa6-415f-b747-88770fb42ac5', 'testimonial_images', 'r10', '01JQ40EFNZ8B7F3534VZ8HJG7Z.webp', 'image/webp', 'public', 'public', 18912, '[]', '[]', '[]', '[]', 3, '2025-03-24 12:01:12', '2025-03-24 12:01:12'),
(17, 'App\\Models\\Testimonial', 2, '50e6328a-5091-481e-bfa5-5fe0f444f3c8', 'testimonial_images', 'r000020', '01JQ40EFP2Z2Z8DWHWZ5AC83CY.webp', 'image/webp', 'public', 'public', 31570, '[]', '[]', '[]', '[]', 4, '2025-03-24 12:01:12', '2025-03-24 12:01:12'),
(18, 'App\\Models\\Testimonial', 2, '31ce7ef6-2380-43a4-9b90-a6dc85138c78', 'testimonial_images', 'r0200', '01JQ40EFP6FWPD8YPK871RD66N.webp', 'image/webp', 'public', 'public', 32236, '[]', '[]', '[]', '[]', 5, '2025-03-24 12:01:12', '2025-03-24 12:01:12'),
(19, 'App\\Models\\Testimonial', 2, '0bb95501-4797-4caf-b73c-ad738e119007', 'testimonial_images', 'r0200-1', '01JQ40EFP9C2V712CE7H3FDA14.webp', 'image/webp', 'public', 'public', 27036, '[]', '[]', '[]', '[]', 6, '2025-03-24 12:01:12', '2025-03-24 12:01:12'),
(20, 'App\\Models\\Product', 7, '9bc35b3a-1057-49c2-8682-f5d548d07603', 'product_images', 'بابل-جم-1-512x512', '01JQ81T6A0GSA93X68GRQBGDFH.webp', 'image/webp', 'public', 'public', 23486, '[]', '[]', '[]', '[]', 1, '2025-03-26 01:42:02', '2025-03-26 01:42:02'),
(21, 'App\\Models\\Product', 8, 'a4a9f53c-3145-4335-8400-ce80cbd7ebd6', 'product_images', 'rosemary-hair-per-3-512x512', '01JQ8220K7PD8KS57F76H4N8JF.webp', 'image/webp', 'public', 'public', 69688, '[]', '[]', '[]', '[]', 1, '2025-03-26 01:46:19', '2025-03-26 01:46:19'),
(22, 'App\\Models\\Product', 9, '6200d964-b3cf-46ae-becc-67914c3e2ecb', 'product_images', 'rosemary-hair-per-4-512x512', '01JQ82AMM40Z04Z1S22THDH9XY.webp', 'image/webp', 'public', 'public', 29296, '[]', '[]', '[]', '[]', 1, '2025-03-26 01:51:01', '2025-03-26 01:51:01'),
(23, 'App\\Models\\Product', 10, 'e22a1c00-42e4-455a-be28-b5d6704ecf31', 'product_images', 'rosemary-hair-per-1-512x512', '01JQ82D86DXHKQR29298QS9QCV.webp', 'image/webp', 'public', 'public', 18924, '[]', '[]', '[]', '[]', 1, '2025-03-26 01:52:27', '2025-03-26 01:52:27'),
(24, 'App\\Models\\Product', 11, 'ac4fb926-83b3-49f5-889a-78d0726a280e', 'product_images', 'rosemary-hair-per-2-512x512', '01JQ82MB5DNV8N0HFYZ04YDYP5.webp', 'image/webp', 'public', 'public', 23614, '[]', '[]', '[]', '[]', 1, '2025-03-26 01:56:19', '2025-03-26 01:56:19'),
(25, 'App\\Models\\Product', 12, '5a9b546d-6a06-44c6-b438-dc23e87782bf', 'product_images', 'rosemary-hair-per-5-512x512', '01JQ8302R52SFXJZTVXCP703JX.webp', 'image/webp', 'public', 'public', 30248, '[]', '[]', '[]', '[]', 1, '2025-03-26 02:02:44', '2025-03-26 02:02:44'),
(27, 'App\\Models\\Testimonial', 3, 'ccfda1b3-e7af-4756-8606-05e1e0629cf4', 'testimonial_images', 'rev-6-768x756', '01JQ8ACJZJ75S44ZYGFCYMGKJ9.webp', 'image/webp', 'public', 'public', 42458, '[]', '[]', '[]', '[]', 1, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(28, 'App\\Models\\Testimonial', 3, 'a4ccfd0d-702f-4986-9da6-352e5fde628c', 'testimonial_images', 'rev-5-768x756', '01JQ8ACJZQHYJQTV6VQ7BF5Q1D.webp', 'image/webp', 'public', 'public', 41802, '[]', '[]', '[]', '[]', 2, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(29, 'App\\Models\\Testimonial', 3, 'd455dbd9-cbc7-47a7-a927-c249226fa385', 'testimonial_images', 'rev-4-768x756', '01JQ8ACJZVMWRXF1KPGWX049QE.webp', 'image/webp', 'public', 'public', 48110, '[]', '[]', '[]', '[]', 3, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(30, 'App\\Models\\Testimonial', 3, 'ae5423bf-616b-4829-bd52-75fafe6bdafd', 'testimonial_images', 'rev-9-768x756', '01JQ8ACJZYQTBE42VK076RRR3Z.webp', 'image/webp', 'public', 'public', 37064, '[]', '[]', '[]', '[]', 4, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(31, 'App\\Models\\Testimonial', 3, 'be66248f-a36e-47ff-a8e5-66aa4a067c68', 'testimonial_images', 'rev-3-768x756', '01JQ8ACK01QAQNX2RQP587GDNP.webp', 'image/webp', 'public', 'public', 49110, '[]', '[]', '[]', '[]', 5, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(32, 'App\\Models\\Testimonial', 3, '93501536-6bd8-481e-93fc-a6fd900f19f9', 'testimonial_images', 'rev-1-768x756', '01JQ8ACK04W4226KZK7NASAFYQ.webp', 'image/webp', 'public', 'public', 44588, '[]', '[]', '[]', '[]', 6, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(33, 'App\\Models\\Testimonial', 3, '1522da24-6368-491a-b0da-103fb122699a', 'testimonial_images', 'rev-7-768x756', '01JQ8ACK092EDYGEXR3KQZTYFB.webp', 'image/webp', 'public', 'public', 40020, '[]', '[]', '[]', '[]', 7, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(34, 'App\\Models\\Testimonial', 3, 'd3772c9a-6b36-4683-bc5b-e2bcdb9533c1', 'testimonial_images', 'rev-9-768x756', '01JQ8ACK0D641H5F97A6H644E7.webp', 'image/webp', 'public', 'public', 37064, '[]', '[]', '[]', '[]', 8, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(35, 'App\\Models\\Testimonial', 3, '1c68284c-dd81-4fdb-85c2-f860d01fd362', 'testimonial_images', 'rev-2-768x756', '01JQ8ACK0HD5Z1AZF9G2VQTZG3.webp', 'image/webp', 'public', 'public', 44818, '[]', '[]', '[]', '[]', 9, '2025-03-26 04:11:54', '2025-03-26 04:11:54'),
(36, 'App\\Models\\Product', 14, 'da1da2ad-fdb6-4ace-8e2f-15189378d9df', 'product_images', 'rosefume-2-300x300', '01JQ96R96YHEMEPYX5JZP4MM86.webp', 'image/webp', 'public', 'public', 5742, '[]', '[]', '[]', '[]', 1, '2025-03-26 12:27:37', '2025-03-26 12:27:37'),
(37, 'App\\Models\\Product', 15, 'b16a3860-098d-43d2-984a-8653a205115c', 'product_images', 'rosefume-3-300x300', '01JQ96T0KE9DRCTER4BX0QK90H.webp', 'image/webp', 'public', 'public', 6266, '[]', '[]', '[]', '[]', 1, '2025-03-26 12:28:34', '2025-03-26 12:28:34'),
(38, 'App\\Models\\Product', 16, 'f91a1a80-4f3e-4d00-881a-06dedfcde092', 'product_images', 'rosefume-1-300x300', '01JQ96VK0N0WW1FPZ036E5MVGX.webp', 'image/webp', 'public', 'public', 6228, '[]', '[]', '[]', '[]', 1, '2025-03-26 12:29:25', '2025-03-26 12:29:25'),
(40, 'App\\Models\\Product', 18, 'ca4b5808-3d80-4aa7-958a-4624c12b172d', 'product_images', 'bg0', '01JQ9E97EYY7K1E9RKGG36VMDD.webp', 'image/webp', 'public', 'public', 44034, '[]', '[]', '[]', '[]', 1, '2025-03-26 14:39:12', '2025-03-26 14:39:12'),
(41, 'App\\Models\\Product', 2, '10dc1ee8-a918-40a4-be5a-97c64786fd9c', 'product_images', 'سكراب القهوة و الحليب .jpg', '01JS9T8E37GD4D87HVECZ49W1Y.webp', 'image/webp', 'public', 'public', 156572, '[]', '[]', '[]', '[]', 2, '2025-04-20 12:39:53', '2025-04-20 12:39:53'),
(42, 'App\\Models\\Product', 2, '574fb94e-1198-4de0-8513-c6ec96508d39', 'product_images', 'سكراب الكراميل و الحليب .jpg', '01JS9T8E4MV14JHW0B9BJB34EX.webp', 'image/webp', 'public', 'public', 160338, '[]', '[]', '[]', '[]', 3, '2025-04-20 12:39:53', '2025-04-20 12:39:53'),
(43, 'App\\Models\\Product', 2, '82b6568e-c263-4163-a5ed-6758ca8a8b2d', 'product_images', 'سكراب اللافندر .jpg', '01JS9T8E500HPS9EJZEZSZ5E7J.webp', 'image/webp', 'public', 'public', 137562, '[]', '[]', '[]', '[]', 4, '2025-04-20 12:39:53', '2025-04-20 12:39:53'),
(44, 'App\\Models\\Product', 19, 'a520bc07-0017-4294-88ca-f2bac569cd2b', 'product_images', 'سكراب القهوة و الحليب .jpg', '01JS9TKJDS2T8E43YT7P79TRD2.webp', 'image/webp', 'public', 'public', 156572, '[]', '[]', '[]', '[]', 1, '2025-04-20 12:45:58', '2025-04-20 12:45:58'),
(45, 'App\\Models\\Product', 19, '191f7a3e-f19b-4e3b-9284-997cd74e2a4a', 'product_images', 'سكراب الكراميل و الحليب .jpg', '01JS9TKJE3X4AVMGCN2J05A08Q.webp', 'image/webp', 'public', 'public', 160338, '[]', '[]', '[]', '[]', 2, '2025-04-20 12:45:58', '2025-04-20 12:45:58'),
(46, 'App\\Models\\Product', 19, '279e9824-2dfe-4009-8e44-f8bfa64d3afa', 'product_images', 'سكراب اللافندر .jpg', '01JS9TKJEBK5JZH20MJHN0M075.webp', 'image/webp', 'public', 'public', 137562, '[]', '[]', '[]', '[]', 3, '2025-04-20 12:45:58', '2025-04-20 12:45:58'),
(47, 'App\\Models\\Product', 20, '0e8f4d7a-1514-4df3-8b3c-67f6275fc232', 'product_images', 'سكراب القهوة و الحليب .jpg', '01JSA83XY74F5ZTDJY4FJ43B94.webp', 'image/webp', 'public', 'public', 156572, '[]', '[]', '[]', '[]', 1, '2025-04-20 16:42:05', '2025-04-20 16:42:05'),
(48, 'App\\Models\\Product', 20, '18017ebc-d039-4b64-b52e-3a7774a342d8', 'product_images', 'سكراب الكراميل و الحليب .jpg', '01JSA83XYYAFAWQJK15PJF1ESS.webp', 'image/webp', 'public', 'public', 160338, '[]', '[]', '[]', '[]', 2, '2025-04-20 16:42:05', '2025-04-20 16:42:05'),
(49, 'App\\Models\\Product', 20, 'ab94a524-d189-43b3-acfe-0554276e8b97', 'product_images', 'سكراب اللافندر .jpg', '01JSA83XZ66TYY80YG9J48KXPG.webp', 'image/webp', 'public', 'public', 137562, '[]', '[]', '[]', '[]', 3, '2025-04-20 16:42:05', '2025-04-20 16:42:05'),
(50, 'App\\Models\\Product', 20, '4ecd846f-7c75-4082-9ddb-335d0ffc7ee6', 'product_images', 'products3 (1)', '01JSA83XZE8X7Z3X2F35AP46WP.webp', 'image/webp', 'public', 'public', 30272, '[]', '[]', '[]', '[]', 4, '2025-04-20 16:42:05', '2025-04-20 16:42:05'),
(51, 'App\\Models\\Product', 20, '06f8365d-ceef-4918-88f8-4f532f425654', 'product_images', 'products', '01JSA83XZMY8J3VG7R9SNNQ2J1.webp', 'image/webp', 'public', 'public', 34880, '[]', '[]', '[]', '[]', 5, '2025-04-20 16:42:05', '2025-04-20 16:42:05'),
(52, 'App\\Models\\Product', 21, '2d93dbd4-1bed-47f7-a8f6-637d4e1c7a1e', 'product_images', 'سكراب الكراميل و الحليب .jpg', '01JSBQ2W6V9N5M4A4HGMFW67RG.webp', 'image/webp', 'public', 'public', 160338, '[]', '[]', '[]', '[]', 1, '2025-04-21 06:22:54', '2025-04-21 06:22:54'),
(53, 'App\\Models\\Product', 21, '9a6a51ee-6bb7-467b-a532-fd8c03bd5600', 'product_images', 'products-2', '01JSBQ2W7JMG125C6VTT84C5KC.webp', 'image/webp', 'public', 'public', 34366, '[]', '[]', '[]', '[]', 2, '2025-04-21 06:22:54', '2025-04-21 06:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_23_224024_create_products_table', 1),
(5, '2025_03_23_224031_create_testimonials_table', 1),
(6, '2025_03_23_224038_create_orders_table', 1),
(7, '2025_03_23_224752_create_media_table', 2),
(8, '2025_03_24_054812_add_color_to_orders_table', 3),
(9, '2025_04_08_102614_create_about_us_table', 4),
(10, '2025_04_08_103844_create_contact_us_table', 5),
(11, '2025_04_08_105349_create_about_us_table', 6),
(12, '2025_04_08_105406_create_application_benefits_table', 7),
(13, '2025_04_08_105421_create_customer_reviews_table', 8),
(14, '2025_04_08_105437_create_brands_table', 9),
(15, '2025_04_08_113636_create_faq_help_section_table', 10),
(16, '2025_04_08_114105_create_faq_categories_table', 11),
(17, '2025_04_08_114221_create_faqs_table', 12),
(18, '2025_04_08_114349_create_contact_questions_table', 13),
(19, '2025_04_14_124906_create_home_categories_table', 14),
(20, '2025_04_19_175000_create_blogs_table', 15),
(21, '2025_04_20_124543_update_products_table', 16),
(22, '2025_04_21_104600_create_product_reviews_table', 17),
(23, '2025_04_21_105000_add_status_to_product_reviews_table', 18),
(24, '2025_04_21_120502_add_seo_fields_to_products_table', 19),
(25, '2025_04_21_164700_create_footer_settings_table', 20),
(26, '2025_04_21_164800_create_footer_menu_items_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_quantity` int NOT NULL DEFAULT '1',
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `payment_method` enum('cash_on_delivery') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash_on_delivery',
  `status` enum('pending','processing','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selected_colors` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL,
  `benefits` text COLLATE utf8mb4_unicode_ci,
  `ingredients` text COLLATE utf8mb4_unicode_ci,
  `usage` text COLLATE utf8mb4_unicode_ci,
  `advatigs` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `precautions` text COLLATE utf8mb4_unicode_ci,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_after` decimal(10,2) DEFAULT NULL,
  `customer_reviews` text COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT '0',
  `variation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scents_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `colors_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `in_stock` tinyint(1) DEFAULT '1',
  `gift_products` longtext COLLATE utf8mb4_unicode_ci,
  `related_products` longtext COLLATE utf8mb4_unicode_ci,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_input_type` enum('upload','link') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'link',
  `video_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` json DEFAULT NULL,
  `partners_logos` json DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `focus_keywords` json DEFAULT NULL,
  `advantages` longtext COLLATE utf8mb4_unicode_ci,
  `home_categories_id` bigint UNSIGNED DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_robots` json DEFAULT NULL,
  `meta_keywords` json DEFAULT NULL,
  `og_locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar_AR',
  `og_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product',
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `og_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_author_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_tags` json DEFAULT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image_secure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image_width` int DEFAULT NULL,
  `og_image_height` int DEFAULT NULL,
  `og_image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_updated_time` timestamp NULL DEFAULT NULL,
  `published_time` timestamp NULL DEFAULT NULL,
  `modified_time` timestamp NULL DEFAULT NULL,
  `twitter_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'summary_large_image',
  `twitter_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` text COLLATE utf8mb4_unicode_ci,
  `twitter_creator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_label1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_data1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_label2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_data2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discounted_price`, `benefits`, `ingredients`, `usage`, `advatigs`, `notes`, `precautions`, `size`, `video`, `price_after`, `customer_reviews`, `description`, `slug`, `quantity`, `variation_type`, `scents_list`, `colors_list`, `in_stock`, `gift_products`, `related_products`, `category_id`, `created_at`, `updated_at`, `video_input_type`, `video_file`, `video_link`, `meta_tags`, `partners_logos`, `meta_description`, `focus_keywords`, `advantages`, `home_categories_id`, `meta_title`, `canonical_url`, `meta_robots`, `meta_keywords`, `og_locale`, `og_type`, `og_title`, `og_description`, `og_url`, `og_site_name`, `og_author_url`, `og_section`, `og_tags`, `og_image`, `og_image_secure`, `og_image_width`, `og_image_height`, `og_image_alt`, `og_image_type`, `og_updated_time`, `published_time`, `modified_time`, `twitter_card`, `twitter_title`, `twitter_description`, `twitter_creator`, `twitter_image`, `twitter_label1`, `twitter_data1`, `twitter_label2`, `twitter_data2`) VALUES
(2, 'تنت روزماري – x1', 70.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p dir=\"rtl\">الشحن حسب المحافظة القاهره والجيزه ب 51ج الاسكندريه 56ج محافظات الدلتا والقنا 67ج محافظات الصعيد والبحر الاحمر - الفيوم - مطروح ب 80ج شرم الشيخ – الوادي الجديد 91ج</p>', NULL, 616, 'colors', NULL, '[\n    {\n        \"name\": \"احمر\"\n    },\n    {\n        \"name\": \"بينك\"\n    },\n    {\n        \"name\": \"خوخي\"\n    }\n]', 1, '[]', '[]', NULL, '2025-03-24 11:02:19', '2025-04-21 12:51:31', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'تنت روزماري – x2', 134.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p dir=\"rtl\">القاهره والجيزه والاسكندريه 46ج&nbsp; محافظات الدلتا - القنا ب 52 محافظات الصعيد والبحر الاحمر - الفيوم - مطروح ب 60 شرم الشيخ – الوادي الجديد 76</p>', NULL, 317, 'colors', NULL, '[\n    {\n        \"name\": \"احمر\"\n    },\n    {\n        \"name\": \"بينك\"\n    },\n    {\n        \"name\": \"خوخي\"\n    }\n]', 1, '[]', '[]', NULL, '2025-03-24 11:03:16', '2025-04-21 10:44:26', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'تنت روزماري – x3', 186.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p dir=\"rtl\">القاهره والجيزه والاسكندريه 35 محافظات الدلتا - القنا ب 41 محافظات الصعيد والبحر الاحمر - الفيوم - مطروح ب 54 شرم الشيخ – الوادي الجديد 71</p>', NULL, 99616, NULL, NULL, NULL, 1, '[]', '[]', NULL, '2025-03-24 11:04:14', '2025-04-21 11:54:41', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'تنت روزماري – x6', 355.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p dir=\"rtl\">القاهره والجيزه واسكندريه 25 محافظات الدلتا - القنا ب 31 محافظات الصعيد والبحر الاحمر - الفيوم - مطروح ب 29 شرم الشيخ – الوادي الجديد 60&nbsp;</p>', NULL, 764, NULL, NULL, NULL, 1, '[]', '[]', NULL, '2025-03-24 11:04:48', '2025-04-21 05:55:24', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'تنت روزماري x12', 680.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p dir=\"rtl\">القاهره والجيزه والاسكندريه 20 محافظات الدلتا - القنا ب 26 محافظات الصعيد والبحر الاحمر - الفيوم - مطروح ب 24 شرم الشيخ – الوادي الجديد ب 55</p>', NULL, 935, 'colors', NULL, '[{\"name\":\"\\u0623\\u062d\\u0645\\u0631\"},{\"name\":\"\\u0628\\u064a\\u0646\\u0643\"},{\"name\":\"\\u062e\\u0648\\u062e\\u064a\"}]', 1, '[]', '[]', NULL, '2025-03-24 11:05:28', '2025-04-21 01:59:03', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'معطر الشعر – بابل جم', 105.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\n									💟 بابل جم (Bubble Gum)\nمزيج مميز جدا من اللبان والسكريات هيرجعك لأيام الطفولة ، مع لمسة حلوة من الحمضيات والفواكه هياخدك لرحلة من الانتعاش في روتينك اليومي.								', NULL, 1000, NULL, NULL, NULL, 1, '[]', '[]', 1, '2025-03-26 01:42:02', '2025-04-13 10:37:34', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'معطر الشعر – رومانس', 105.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\n									💜 رومانس (romance mood)\nنروح شويه الحساس النعمومه والهدوء عطر ناعم وليدي اوي ومناسب معاكي في كل الأوقات مزيج من العطور الفرنسيه الهادئه								', NULL, 1000, NULL, NULL, NULL, 0, '[]', '[]', 1, '2025-03-26 01:46:19', '2025-04-13 10:00:31', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'معطر الشعر – عربي', 105.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\n									💛 عربي (Arabian mood)\nنوصف ال مستخدمه بشخص أنيق ومرتب .. ميكس متعملش قبل كده هيميزك جداا من الروايح العربيه الشرقيه الجميله								', NULL, 1000, NULL, NULL, NULL, 0, '[]', '[]', 1, '2025-03-26 01:51:01', '2025-04-13 10:01:02', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'معطر الشعر – شاور', 105.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\n									شاور (shower mood)\nنقدر نقولك ان احساس انك واخده شاور هيبقي معاكي طول اليوم مهما كانت الظروف عطر قوي يعطي احساس بالانتعاش والنظافه								', NULL, 1000, NULL, NULL, NULL, 0, '[]', '[]', 1, '2025-03-26 01:52:27', '2025-04-13 10:01:21', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'معطر الشعر – فلوري', 105.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\n									💗 فلوري (floral mood)\nغيرنا مفهوم العطر الفلوري كله ومزجنا عطر فرنسي رائع مع ميكس الورود الفرنسي .. عطر مميز ومختلف								', NULL, 994, NULL, NULL, NULL, 0, '[]', '[]', 1, '2025-03-26 01:56:19', '2025-04-13 10:01:37', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'معطر الشعر – كاندي', 105.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\n									💚 كاندى – (candy’s mood)\nهنوديكي لعالم الحلويات برائحه شوجري مزيج من رائحه الفواكه المنعشه المسكرة المحببه للاطفال والكبار								', NULL, 1000, NULL, NULL, NULL, 0, '[]', '[]', 1, '2025-03-26 02:02:44', '2025-04-13 10:01:51', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'روزفيوم 3x', 255.00, 285.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 285.00, NULL, '<p dir=\"rtl\"><strong>الشحن رمزي للقاهره والجيزه والاسكنريه&nbsp; 26 جنيه<br>&nbsp;ومحافظات الدلتا والقنال 32 ما عدا محافظات الصعيد والبحر الاحمر&nbsp;بـ40ج <br>وشرم الشيخ والوادي الجديد بـ72ج</strong></p>', NULL, 99999866, NULL, NULL, NULL, 1, '[]', '[]', 3, '2025-03-26 12:27:37', '2025-04-21 13:04:02', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'روزفيوم 5x', 390.00, 400.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 400.00, NULL, '<p dir=\"rtl\">الشحن رمزي للقاهره والجيزه والاسكنريه&nbsp; 26 جنيه ومحافظات الدلتا والقنال 32 ما عدا محافظات الصعيد والبحر الاحمر بـ40ج وشرم الشيخ والوادي الجديد بـ72ج</p>', 'مع عبوة تنت تست هدية\n\n', 999859, NULL, NULL, NULL, 1, '[]', '[]', 3, '2025-03-26 12:28:34', '2025-04-21 10:53:33', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'روزفيوم – 10x', 690.00, 800.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 800.00, NULL, '<p dir=\"rtl\">الشحن رمزي للقاهره والجيزه والاسكنريه&nbsp; 26 جنيه ومحافظات الدلتا والقنال 32 ما عدا محافظات الصعيد والبحر الاحمر بـ40ج وشرم الشيخ والوادي الجديد بـ72ج</p>', 'مع عبوة كريم تشققات\n\n', 999987, NULL, NULL, NULL, 1, '[]', '[]', 3, '2025-03-26 12:29:25', '2025-04-20 21:06:07', 'link', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ar_AR', 'product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'summary_large_image', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_gift_products`
--

CREATE TABLE `product_gift_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `gift_product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_related_products`
--

CREATE TABLE `product_related_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `related_product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rating` int NOT NULL COMMENT '1-5 stars',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vtJJu8fsvxvDBfZsLnYLVdbuqaLYIry0jH43hDEn', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6InlHUDFBYW9ReWxnUmxScExaRXljblE1d2tsRTNadzFQUkgwQWpvMzkiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2hvcC9wcm9kdWN0L3Rlc3Nzc3N0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiR6eVBmRXVRS1Y3TndseElJYkNHRTl1ZTRrNGxuL3NkSlouYnVFSzJmb1VZcVNkVlFhVnM3dSI7czo4OiJmaWxhbWVudCI7YTowOnt9czoxMDoiY2FydF9pdGVtcyI7YToxOntpOjIxO2E6Njp7czoyOiJpZCI7aToyMTtzOjQ6InNsdWciO3M6ODoidGVzc3Nzc3QiO3M6NDoibmFtZSI7czoxOToi2KfYs9mFINin2YTZhdmG2KrYrCI7czo1OiJwcmljZSI7czo2OiIxMjMuMDAiO3M6ODoicXVhbnRpdHkiO2k6MTtzOjU6ImltYWdlIjtzOjc1OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvc3RvcmFnZS9hcHAvcHVibGljLzUyLzAxSlNCUTJXNlY5TjVNNEE0SEdNRlc2N1JHLndlYnAiO319czoxMDoiY2FydF9jb3VudCI7aToxO3M6MTA6ImNhcnRfdG90YWwiO2Q6MTIzO30=', 1745239037),
('yKooF1tuFkFSvb5LacCW1qq7vqqAoLdhCh7ZsOvL', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZlRwTXhDdmwxT21rNlJzS3RhaFJpWTVmUGhheVE2akxnT1VuT2hjeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2hvcC9wcm9kdWN0LyVEOSU4NSVEOCVCOSUyMCVEOCVCOSVEOCVBOCVEOSU4OCVEOCVBOSUyMCVEOCVBQSVEOSU4NiVEOCVBQSUyMCVEOCVBQSVEOCVCMyVEOCVBQSUyMCVEOSU4NyVEOCVBRiVEOSU4QSVEOCVBOSUwQSUwQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkenlQZkV1UUtWN053bHhJSWJDR0U5dWU0azRsbi9zZEpaLmJ1RUsyZm9VWXFTZFZRYVZzN3UiO30=', 1745248578);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `category_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `type`, `category_id`, `created_at`, `updated_at`) VALUES
(2, '1', 'image', 0, '2025-03-24 03:13:52', '2025-03-24 03:13:52'),
(3, 'آراء العملاء', 'image', 1, '2025-03-26 04:11:54', '2025-03-26 04:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$12$zyPfEuQKV7NwlxIIbCGE9ue4k4ln/sdJZ.buEK2foUYqSdVQaVs7u', 'TBggVhwNlqT23IERji6BxS7UalU5yP4rgR7GrUU4WyzSkq2xYoTmyQbZC7Rg', '2025-03-23 20:53:05', '2025-03-23 20:53:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1`
--
ALTER TABLE `1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_benefits`
--
ALTER TABLE `application_benefits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_benefits_about_us_id_foreign` (`about_us_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_questions`
--
ALTER TABLE `contact_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_category_id_foreign` (`category_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_help_section`
--
ALTER TABLE `faq_help_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_menu_items`
--
ALTER TABLE `footer_menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_home_categories_id_foreign` (`home_categories_id`);

--
-- Indexes for table `product_gift_products`
--
ALTER TABLE `product_gift_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_gift_products_product_id_gift_product_id_unique` (`product_id`,`gift_product_id`),
  ADD KEY `product_gift_products_gift_product_id_foreign` (`gift_product_id`);

--
-- Indexes for table `product_related_products`
--
ALTER TABLE `product_related_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_related_products_product_id_related_product_id_unique` (`product_id`,`related_product_id`),
  ADD KEY `product_related_products_related_product_id_foreign` (`related_product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1`
--
ALTER TABLE `1`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_benefits`
--
ALTER TABLE `application_benefits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_questions`
--
ALTER TABLE `contact_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_help_section`
--
ALTER TABLE `faq_help_section`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `footer_menu_items`
--
ALTER TABLE `footer_menu_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2293;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_gift_products`
--
ALTER TABLE `product_gift_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_related_products`
--
ALTER TABLE `product_related_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_benefits`
--
ALTER TABLE `application_benefits`
  ADD CONSTRAINT `application_benefits_about_us_id_foreign` FOREIGN KEY (`about_us_id`) REFERENCES `about_us` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_home_categories_id_foreign` FOREIGN KEY (`home_categories_id`) REFERENCES `home_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_gift_products`
--
ALTER TABLE `product_gift_products`
  ADD CONSTRAINT `product_gift_products_gift_product_id_foreign` FOREIGN KEY (`gift_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_gift_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_related_products`
--
ALTER TABLE `product_related_products`
  ADD CONSTRAINT `product_related_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_related_products_related_product_id_foreign` FOREIGN KEY (`related_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
