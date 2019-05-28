-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2019 г., 17:09
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kokomoodb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `agencies`
--

CREATE TABLE `agencies` (
  `agency_id` bigint(20) UNSIGNED NOT NULL,
  `title_english` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_china` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_english` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_china` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `help_text_e` longtext COLLATE utf8mb4_unicode_ci,
  `help_text_c` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birthday` date NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`artist_id`, `full_name`, `specialization`, `date_birthday`, `image`, `slug`) VALUES
(1, 'Alex Greenberger', 'German mannerist painter', '2019-05-14', '1558944906.jpeg', 'alexgreenberger'),
(2, 'Jon Woe', 'Designer Web', '2019-05-06', '1558943337.jpeg', 'jonwhoe'),
(3, 'Jon Doe', 'Designer Web', '2019-05-08', '1559049619.jpeg', 'jondoeslug'),
(4, 'Mikel Paul', 'Java Script', '2019-05-02', '1559049641.jpeg', 'mikelpaul'),
(5, 'Mike Tison', 'Danish artist and antiquarian', '2019-05-06', '1559049683.jpeg', 'miketison'),
(6, 'Mikel Paul', 'Designer Web', '2019-05-04', '1559049704.jpeg', 'mikepaulsecond');

-- --------------------------------------------------------

--
-- Структура таблицы `main_contents`
--

CREATE TABLE `main_contents` (
  `main_content_id` bigint(20) UNSIGNED NOT NULL,
  `title_english` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_china` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `main_contents`
--

INSERT INTO `main_contents` (`main_content_id`, `title_english`, `title_china`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'News', '新闻', '1558444123.jpeg', NULL, NULL),
(2, 'Artists', '艺术家', '1558444141.jpeg', NULL, NULL),
(3, 'Agency', '机构', '1558444171.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `main_title_lefts`
--

CREATE TABLE `main_title_lefts` (
  `main_title_id` bigint(20) UNSIGNED NOT NULL,
  `english_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `china_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `main_title_lefts`
--

INSERT INTO `main_title_lefts` (`main_title_id`, `english_text`, `china_text`) VALUES
(1, 'Curatorial', '人力'),
(2, 'Human', '管理'),
(3, 'Initiative', '计划');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(17, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(18, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(19, '2016_06_01_000004_create_oauth_clients_table', 1),
(20, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(21, '2019_05_03_100400_create_main_title_left_table', 1),
(22, '2019_05_08_092227_create_artists_table', 1),
(23, '2019_05_08_102301_create_news_artists_table', 1),
(24, '2019_05_08_132048_create_news_contents_table', 1),
(25, '2019_05_15_070217_create_agencies_table', 1),
(26, '2019_05_16_081507_create_main_contents_table', 1),
(27, '2019_05_27_074319_add_image_to_artists_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news_artists`
--

CREATE TABLE `news_artists` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `artist_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_english` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_china` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_news` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_artists`
--

INSERT INTO `news_artists` (`news_id`, `artist_id`, `slug`, `category_english`, `category_china`, `date_news`) VALUES
(1, 1, 'Event', 'Event Horizon: Art Events Around Bejing', '事闘人守述訪身界写局頑閉入別選数競願話', '2019-05-14'),
(2, 2, 'loremipsumnews', 'Lorem Ipsum is simply dummy text of the printing and typesetting', '也称乱数假文或者哑元文本', '2019-05-28'),
(3, 1, 'contrayloremslug', 'Contrary to popular belief, Lorem Ipsum', '是印刷及排版领域所常', '2019-05-28');

-- --------------------------------------------------------

--
-- Структура таблицы `news_contents`
--

CREATE TABLE `news_contents` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_china` longtext COLLATE utf8mb4_unicode_ci,
  `text_english` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news_contents`
--

INSERT INTO `news_contents` (`content_id`, `news_id`, `photo`, `photo_title`, `text_china`, `text_english`, `created_at`, `updated_at`) VALUES
(1, 1, '1558444103.jpeg', NULL, '回第作夕整力開中関要志将英。倒模後始自治 回第作夕整力開中関要志将英。倒模後始自治', 'Earlier this month, Steven Tananbaum sued the gallery and Koons’s studio for the “non-delivery” of three sculptures.', NULL, NULL),
(2, 1, '1558444103.jpeg', NULL, 'Wikipedia: A mural is any piece of artwork painted or applied directly on a wall, ceiling or other permanent surface. A distinguishing characteristic of mural painting is that the architectural elements of the given space are harmoniously incorporated into the picture.', '壁画是最古老的绘画形式;自旧石器时代以来就已被人类知晓。人们总是画房子的墙壁装饰或记录历史。这在宗教中特别流行，壁画讲述了耶稣的生平，圣经故事和人们生活在圣殿中的故事（它也构成了几乎所有宗教的一部分)', NULL, NULL),
(3, 1, '1558444103.jpeg', NULL, NULL, NULL, NULL, NULL),
(4, 1, '1558444103.jpeg', 'Diego Rivera Murals in  Mexico 1922-1929', NULL, NULL, NULL, NULL),
(5, 2, '1559048293.jpeg', 'Title for the photo', '是印刷及排版领域所常用的虚拟文字。由于曾经', 'It is a long established fact that a reader will be distracted by the readable content', NULL, NULL),
(6, 2, '1559048293.jpeg', 'Title for the photo', NULL, NULL, NULL, NULL),
(7, 3, '1559048360.jpeg', NULL, NULL, NULL, NULL, NULL),
(8, 3, '1559048360.jpeg', 'Title to the photo', '是印刷及排版领域所常', 'Contrary to popular belief, Lorem Ipsum', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `bio` mediumtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'camera.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `bio`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vlasiuk Andrii', 'kaktys88@yandex.ru', NULL, '$2y$10$P7MCPqrCVfBjRVjxozVzqex6vd9G.npTvZmcOWEVBfjwu1Mo4TTXm', 'user', NULL, 'camera.png', NULL, '2019-05-21 10:04:43', '2019-05-22 05:27:21'),
(2, 'Admin1', 'test1@gmail.com', NULL, '$2y$10$o97s0pL4xsV34Z6zalGq5eBWlbT8lI11nCBvbjPjcccY5p7lhQX6i', 'admin', NULL, 'camera.png', NULL, '2019-05-22 05:27:08', '2019-05-22 05:27:08');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agency_id`);

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Индексы таблицы `main_contents`
--
ALTER TABLE `main_contents`
  ADD PRIMARY KEY (`main_content_id`);

--
-- Индексы таблицы `main_title_lefts`
--
ALTER TABLE `main_title_lefts`
  ADD PRIMARY KEY (`main_title_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_artists`
--
ALTER TABLE `news_artists`
  ADD PRIMARY KEY (`news_id`),
  ADD UNIQUE KEY `news_artists_slug_unique` (`slug`),
  ADD KEY `news_artists_artist_id_index` (`artist_id`);

--
-- Индексы таблицы `news_contents`
--
ALTER TABLE `news_contents`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `news_contents_news_id_index` (`news_id`);

--
-- Индексы таблицы `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Индексы таблицы `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agency_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `main_contents`
--
ALTER TABLE `main_contents`
  MODIFY `main_content_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `main_title_lefts`
--
ALTER TABLE `main_title_lefts`
  MODIFY `main_title_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `news_artists`
--
ALTER TABLE `news_artists`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news_contents`
--
ALTER TABLE `news_contents`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news_artists`
--
ALTER TABLE `news_artists`
  ADD CONSTRAINT `news_artists_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`);

--
-- Ограничения внешнего ключа таблицы `news_contents`
--
ALTER TABLE `news_contents`
  ADD CONSTRAINT `news_contents_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news_artists` (`news_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
