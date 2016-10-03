-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'php tutorials', NULL, NULL),
(2, 'laravel  tutorials', NULL, NULL),
(3, 'Test cat', '2016-08-16 16:57:11', '2016-08-16 16:57:11'),
(4, 'Test cat', '2016-08-16 16:58:18', '2016-08-16 16:58:18'),
(5, 'another', '2016-08-16 17:00:06', '2016-08-16 17:00:06');

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(2, 'sdgdfd', 'denis_cenov_@abv.bg', 'fsgfd', 1, 9, '2016-09-05 07:27:11', '2016-09-05 07:27:11'),
(3, 'Denis', 'denis_cenov_@abv.bg', 'Hi fiend! How  are you?', 1, 9, '2016-09-05 17:53:40', '2016-09-05 17:53:40'),
(4, 'Denis', 'MyEmailAddress@example.com', 'Just  anouther  try', 1, 9, '2016-09-05 17:54:54', '2016-09-05 17:54:54'),
(5, 'Denis', 'denis_cenov_@abv.bg', 'This is  some comment ', 1, 8, '2016-09-06 08:06:14', '2016-09-06 14:08:57'),
(6, 'Ivan', 'ivancho@gmail.com', 'Hello from  Ivan', 1, 8, '2016-09-06 08:13:45', '2016-09-06 08:13:45'),
(7, 'Geogri', 'Gosho@abv.bg', 'Откъде произлиза?\r\nПротивно на всеобщото вярване, Lorem Ipsum не е просто случаен текст. Неговите корени са в класическата Латинска литература от 45г.пр.Хр., което прави преди повече от 2000 години. Richard McClintock, професор по Латински от колежа Hampden-Sydney College във Вирджиния, изучавайки една от най-неясните латински думи "consectetur" в един от пасажите на Lorem Ipsum, и търсейки цитати на думата в класическата литература, открива точния източник. Lorem Ipsum е намерен в секции 1.10.32 и 1.10.33 от "de Finibus Bonorum et Malorum"(Крайностите на Доброто и Злото) от Цицерон, написан през 45г.пр.Хр. Тази книга е трактат по теория на етиката, много популярна през Ренесанса. Първият ред на Lorem Ipsum идва от ред, намерен в секция 1.10.32.\r\n\r\nСтандартният отрязък от Lorem Ipsum, използван от 1500 г. насам, е поместен по-долу за тези, които се интересуват. Секции 1.10.32 и 1.10.33 от "de Finibus Bonorum et Malorum" на Цицерон също са поместени в оригиналния им формат, заедно с превода им на английски език, направен от H. Rackham през 1914г.', 1, 8, '2016-09-06 08:14:58', '2016-09-06 08:14:58');

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_27_192734_create_posts_table', 1),
('2016_08_02_181053_add_slug_to_posts', 1),
('2016_08_14_193502_create_categorise_table', 2),
('2016_08_14_194040_add_categoty_id_to_posts', 2),
('2016_08_22_191821_create_tags_table', 3),
('2016_08_23_190407_create_post_tag_table', 4),
('2016_09_05_090052_create_comments_table', 5),
('2016_09_15_193259_add_image_col_to_posts', 6);

-- --------------------------------------------------------

--
-- Структура на таблица `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'lorem ipsum', 'Какво е Lorem Ipsum?\r\nLorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.\r\n\r\nЗащо го използваме?\r\nИзвестен факт е, че читателя обръща внимание на съдържанието, което чете, а не на оформлението му. Свойството на Lorem Ipsum е, че до голяма степен има нормално разпределение на буквите и се чете по-лесно, за разлика от нормален текст на английски език като "Това е съдържание, това е съдържание". Много системи за публикуване и редактори на Уеб страници използват Lorem Ipsum като примерен текстов модел "по подразбиране", поради което при търсене на фразата "lorem ipsum" в Интернет ще бъдат открити много сайтове в процес на разработка. Някой от тези сайтове биват променяни с времето, а други по случайност или нарочно(за забавление и пр.) биват оставяни в този си незавършен вид.\r\n\r\n', 'slug-lorem', NULL, 1, '2016-08-02 15:55:13', '2016-08-02 15:55:13'),
(2, 'add next', 'Откъде произлиза?\r\nПротивно на всеобщото вярване, Lorem Ipsum не е просто случаен текст. Неговите корени са в класическата Латинска литература от 45г.пр.Хр., което прави преди повече от 2000 години. Richard McClintock, професор по Латински от колежа Hampden-Sydney College във Вирджиния, изучавайки една от най-неясните латински думи "consectetur" в един от пасажите на Lorem Ipsum, и търсейки цитати на думата в класическата литература, открива точния източник. Lorem Ipsum е намерен в секции 1.10.32 и 1.10.33 от "de Finibus Bonorum et Malorum"(Крайностите на Доброто и Злото) от Цицерон, написан през 45г.пр.Хр. Тази книга е трактат по теория на етиката, много популярна през Ренесанса. Първият ред на Lorem Ipsum идва от ред, намерен в секция 1.10.32.\r\n\r\nСтандартният отрязък от Lorem Ipsum, използван от 1500 г. насам, е поместен по-долу за тези, които се интересуват. Секции 1.10.32 и 1.10.33 от "de Finibus Bonorum et Malorum" на Цицерон също са поместени в оригиналния им формат, заедно с превода им на английски език, направен от H. Rackham през 1914г.\r\n\r\nОткъде мога да го взема?\r\nСъществуват много вариации на пасажа Lorem Ipsum, но повечето от тях са променени по един или друг начин чрез добавяне на смешни думи или разбъркване на думите, което не изглежда много достоверно. Ако искате да използвате пасаж от Lorem Ipsum, трябва да сте сигурни, че в него няма смущаващи или нецензурни думи. Всички Lorem Ipsum генератори в Интернет използват предефинирани пасажи, който се повтарят, което прави този този генератор първия истински такъв. Той използва речник от над 200 латински думи, комбинирани по подходящ начин като изречения, за да генерират истински Lorem Ipsum пасажи. Оттук следва, че генерираният Lorem Ipsum пасаж не съдържа повторения, смущаващи, нецензурни и всякакви неподходящи думи.', 'slug-next', NULL, 2, '2016-08-02 15:55:59', '2016-08-02 15:55:59'),
(3, 'wefedfvd', 'egerhrhfgnggdsdfsdgvdfgfgbgffgd lorem i  rtaka  na tataka  i  wseoshte  ', 'egegegfbgfgb', NULL, 1, '2016-08-02 16:03:25', '2016-08-02 16:14:45'),
(4, 'sffsdfdsfgdf', 'dfgfhggfhfhfg', 'dgdfggdfg', NULL, 1, '2016-08-03 16:44:39', '2016-08-03 16:45:17'),
(5, 'Slug bug!', 'The bug las  fixed!!', 'sluget', NULL, 2, '2016-08-03 16:45:24', '2016-08-03 16:58:46'),
(6, 'Test_011', 'this  is  test  for categoryy', 'sluga', NULL, 5, '2016-08-17 16:35:20', '2016-08-18 17:03:15'),
(7, 'test', 'new test_0r32\r\n', 'tester', NULL, 1, '2016-08-26 16:21:00', '2016-08-26 16:21:00'),
(8, 'test  again_03R-2', 'ima  neshto  tuka', 'test_12_R', NULL, 2, '2016-08-26 16:22:27', '2016-08-26 16:22:27'),
(9, 'test  again_03R-2', 'ima  neshto  tukass', 'test_12_Rf', NULL, 1, '2016-08-26 16:35:29', '2016-08-28 11:48:30'),
(10, 'new test again', '<h2>Hire is <a title="FB" href="facebook.com">FaceBook</a>&nbsp;<strong>new for &nbsp;content!</strong></h2>', 'slugy', NULL, 1, '2016-09-07 16:58:02', '2016-09-07 16:58:02'),
(11, 'new test again', '<h2>Hire is &nbsp;<strong>new &nbsp;content!</strong></h2>', 'slugyto', NULL, 1, '2016-09-07 16:59:31', '2016-09-12 16:09:31'),
(12, 'dbfg', '<p><strong>sgdfnmmnm</strong></p>', 'sdfghjhgf', NULL, 1, '2016-09-07 17:00:13', '2016-09-07 17:00:13'),
(13, 'ddddds', '<p><strong>hello </strong>&nbsp;<strong>and &nbsp;welcome</strong><em> :)</em></p>', 'sssssd', NULL, 1, '2016-09-07 17:03:23', '2016-09-12 16:06:50'),
(14, 'afsdghn', '<p>&lt;script&gt;alert(\'helloo!\');&lt;/script&gt;</p>', 'dbgfgfgn', NULL, 1, '2016-09-12 16:20:31', '2016-09-12 16:20:31'),
(15, 'afsdghn', '<p>tuka &nbsp;ima neshto</p>', 'tukimaslug', NULL, 1, '2016-09-12 16:21:29', '2016-09-12 16:21:29'),
(18, 'Haked post', '<h2>This is <span style="text-decoration:underline;"> ahcked post!</span></h2>', 'hacked', NULL, 3, '2016-09-12 16:59:30', '2016-09-12 17:14:01'),
(21, 'Test image', '<p>this is  my  first update  image  test</p>', 'imagess', '1474315849.jpg', 1, '2016-09-15 16:56:04', '2016-09-19 17:10:50');

-- --------------------------------------------------------

--
-- Структура на таблица `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 7, 5),
(6, 9, 8),
(11, 18, 7);

-- --------------------------------------------------------

--
-- Структура на таблица `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'laravel develop', '2016-08-25 15:41:28', '2016-08-28 17:22:42'),
(7, 'Tag  for  something', '2016-08-30 16:23:00', '2016-08-30 16:23:00'),
(8, 'tag  for  me', '2016-08-30 16:23:06', '2016-08-30 16:23:06'),
(9, 'tag  fo  tag  and  something', '2016-08-30 16:23:15', '2016-08-30 16:23:15');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'denis', 'denis_cenov_@abv.bg', '$2y$10$nKFR5LyfGQ5iWo6nqvfmHu7rjPdzy3WYx/JFornjoMoh4qxsbyEga', 'dii9MFsXFDdBQXOvVpTrOapjntFTF5MgB8wRVHq7lLBUB0nwb36rE1PRfKYD', '2016-08-09 17:14:41', '2016-09-19 15:53:51'),
(2, 'Mitko', 'mitaka@abv.bg', '$2y$10$DWoMVRQuqoz.IkvR.37s/.IXH6Tk5K1rriGps8e7QMr0X3kt1oOxy', NULL, '2016-09-19 15:54:09', '2016-09-19 15:54:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения за таблица `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения за таблица `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
