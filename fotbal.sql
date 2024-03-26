-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3307
-- Время создания: Мар 21 2024 г., 12:18
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fotbal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `antrenors`
--

CREATE TABLE `antrenors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Prenume` varchar(255) NOT NULL,
  `Club` varchar(255) NOT NULL,
  `Certificare` varchar(255) NOT NULL,
  `Varsta` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `antrenors`
--

INSERT INTO `antrenors` (`id`, `Nume`, `Prenume`, `Club`, `Certificare`, `Varsta`, `created_at`, `updated_at`) VALUES
(8, 'Șchepu', 'Daniel', 'Juventus', 'A1', 22, '2024-03-19 19:45:28', '2024-03-19 19:45:28'),
(9, 'Mikel', 'Arteta', 'Arsenal', 'A2+', 41, '2024-03-19 19:46:29', '2024-03-19 19:46:29'),
(10, 'Pep', 'Guardiola', 'Manchester City', 'A1', 51, NULL, NULL),
(11, 'Jurgen', 'Klopp', 'Liverpool FC', 'A2', 54, NULL, NULL),
(12, 'Diego', 'Simeone', 'Atletico Madrid', 'A++', 51, NULL, NULL),
(13, 'Zinedine', 'Zidane', 'Real Madrid', 'B1', 49, NULL, NULL),
(14, 'Thomas', 'Tuchel', 'Chelsea FC', 'B2', 48, NULL, NULL),
(15, 'Massimiliano', 'Allegri', 'Juventus', 'B++', 54, NULL, NULL),
(16, 'Jose', 'Mourinho', 'AS Roma', 'A1', 59, NULL, NULL),
(17, 'Carlo', 'Ancelotti', 'Real Madrid', 'A2', 62, NULL, NULL),
(18, 'Mauricio', 'Pochettino', 'Paris Saint-Germain', 'A++', 50, NULL, NULL),
(19, 'Erik', 'ten Hag', 'Ajax Amsterdam', 'B1', 51, NULL, NULL),
(20, 'Ralf', 'Rangnick', 'AC Milan', 'B2', 63, NULL, NULL),
(21, 'Julian', 'Nagelsmann', 'Bayern Munich', 'B++', 35, NULL, NULL),
(22, 'Brendan', 'Rodgers', 'Leicester City', 'A1', 49, NULL, NULL),
(23, 'Antonio', 'Conte', 'Tottenham Hotspur', 'A2', 52, NULL, NULL),
(24, 'Ole Gunnar', 'Solskjaer', 'Manchester United', 'A++', 49, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Jucatori` int(11) NOT NULL,
  `Antrenor` varchar(255) NOT NULL,
  `Pret` double(8,2) NOT NULL,
  `Imagine` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clubs`
--

INSERT INTO `clubs` (`id`, `Nume`, `Jucatori`, `Antrenor`, `Pret`, `Imagine`, `created_at`, `updated_at`) VALUES
(4, 'FC Barcelona', 22, 'Ronald Koeman', 100.00, '', NULL, NULL),
(5, 'Real Madrid', 23, 'Carlo Ancelotti', 95.00, '', NULL, NULL),
(6, 'Manchester City', 24, 'Pep Guardiola', 92.00, '', NULL, NULL),
(7, 'Liverpool FC', 22, 'Jurgen Klopp', 90.00, '', NULL, NULL),
(8, 'Paris Saint-Germain', 24, 'Mauricio Pochettino', 89.00, '', NULL, NULL),
(9, 'Bayern Munich', 23, 'Julian Nagelsmann', 88.00, '', NULL, NULL),
(10, 'Chelsea FC', 22, 'Thomas Tuchel', 87.00, '', NULL, NULL),
(11, 'Juventus', 22, 'Massimiliano Allegri', 86.00, '', NULL, NULL),
(12, 'Manchester United', 23, 'Ole Gunnar Solskjaer', 85.00, '', NULL, NULL),
(13, 'Atletico Madrid', 22, 'Diego Simeone', 84.00, '', NULL, NULL),
(14, 'Tottenham Hotspur', 23, 'Antonio Conte', 83.00, '', NULL, NULL),
(15, 'AC Milan', 22, 'Stefano Pioli', 82.00, '', NULL, NULL),
(16, 'Inter Milan', 22, 'Simone Inzaghi', 81.00, '', NULL, NULL),
(17, 'Borussia Dortmund', 22, 'Marco Rose', 80.00, '', NULL, NULL),
(18, 'Arsenal FC', 22, 'Mikel Arteta', 79.00, '', NULL, NULL),
(19, 'Chelsea', 12, 'Șchepu', 877.00, 'logos/eqz3aYGEwfUDpZ1rzUo1U4iMmUV8AMPR1r7Wr67S.png', '2024-03-20 08:51:30', '2024-03-20 08:51:30');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jucators`
--

CREATE TABLE `jucators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Prenume` varchar(255) NOT NULL,
  `Club` varchar(255) NOT NULL,
  `Pozitia` varchar(255) NOT NULL,
  `Varsta` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jucators`
--

INSERT INTO `jucators` (`id`, `Nume`, `Prenume`, `Club`, `Pozitia`, `Varsta`, `created_at`, `updated_at`) VALUES
(3, 'Cristiano', 'Ronaldo', 'Manchester United', 'Atacant', 37, NULL, NULL),
(4, 'Lionel', 'Messi', 'Paris Saint-Germain', 'Mijlocaș', 35, NULL, NULL),
(5, 'Robert', 'Lewandowski', 'Bayern Munich', 'Atacant', 34, NULL, NULL),
(6, 'Mohamed', 'Salah', 'Liverpool FC', 'Atacant', 30, NULL, NULL),
(7, 'Neymar', 'Junior', 'Paris Saint-Germain', 'Atacant', 30, NULL, NULL),
(8, 'Kevin', 'De Bruyne', 'Manchester City', 'Mijlocaș', 31, NULL, NULL),
(9, 'Karim', 'Benzema', 'Real Madrid', 'Atacant', 34, NULL, NULL),
(10, 'Harry', 'Kane', 'Tottenham Hotspur', 'Atacant', 29, NULL, NULL),
(11, 'Erling', 'Haaland', 'Borussia Dortmund', 'Atacant', 21, NULL, NULL),
(12, 'Kylian', 'Mbappe', 'Paris Saint-Germain', 'Atacant', 23, NULL, NULL),
(13, 'Sadio', 'Mane', 'Liverpool FC', 'Atacant', 30, NULL, NULL),
(14, 'Raheem', 'Sterling', 'Manchester City', 'Atacant', 28, NULL, NULL),
(15, 'Bruno', 'Fernandes', 'Manchester United', 'Mijlocaș', 28, NULL, NULL),
(16, 'Joshua', 'Kimmich', 'Bayern Munich', 'Mijlocaș', 27, NULL, NULL),
(17, 'Virgil', 'van Dijk', 'Liverpool FC', 'Fundas', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ligas`
--

CREATE TABLE `ligas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Tara` varchar(255) NOT NULL,
  `Nr_Echipe` int(11) NOT NULL,
  `Lider` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Imagine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ligas`
--

INSERT INTO `ligas` (`id`, `Nume`, `Tara`, `Nr_Echipe`, `Lider`, `created_at`, `updated_at`, `Imagine`) VALUES
(2, 'Premier League', 'Anglia', 20, 'Manchester City', NULL, NULL, ''),
(3, 'La Liga', 'Spania', 20, 'Real Madrid', NULL, NULL, ''),
(4, 'Bundesliga', 'Germania', 18, 'Bayern Munich', NULL, NULL, ''),
(5, 'Serie A', 'Italia', 20, 'Inter Milan', NULL, NULL, ''),
(6, 'Ligue 1', 'Franța', 20, 'Paris Saint-Germain', NULL, NULL, ''),
(7, 'Seria B', 'Italia', 18, 'Lacio', NULL, NULL, ''),
(8, 'Eredivisie', 'Olanda', 18, 'Ajax Amsterdam', NULL, NULL, ''),
(9, 'Russian Premier League', 'Rusia', 16, 'Zenit St. Petersburg', NULL, NULL, ''),
(10, 'Championship', 'Anglia', 18, 'Derby', NULL, NULL, ''),
(11, 'La Liga 2', 'Spania', 18, 'Cadis', NULL, NULL, ''),
(12, 'Seria C', 'Italia', 20, 'Frazenone', NULL, NULL, ''),
(13, 'Bundesliga 2', 'Germania', 20, 'FC Koln', NULL, NULL, ''),
(14, 'Chinese Super League', 'China', 16, 'Shanghai SIPG', NULL, NULL, ''),
(15, 'J1 League', 'Japonia', 20, 'Kawasaki Frontale', NULL, NULL, ''),
(16, 'A-League', 'Australia', 12, 'Melbourne City', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_29_111819_antrenor', 1),
(6, '2024_02_29_111824_club', 1),
(7, '2024_02_29_111828_jucator', 1),
(8, '2024_02_29_111833_stadion', 1),
(9, '2024_02_29_111837_liga', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `stadions`
--

CREATE TABLE `stadions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nume` varchar(255) NOT NULL,
  `Adresa` varchar(255) NOT NULL,
  `Capacitate` int(11) NOT NULL,
  `Echipa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stadions`
--

INSERT INTO `stadions` (`id`, `Nume`, `Adresa`, `Capacitate`, `Echipa`, `created_at`, `updated_at`) VALUES
(4, 'Camp Nou', 'Barcelona, Spania', 99354, 'FC Barcelona', NULL, NULL),
(5, 'Santiago Bernabeu', 'Madrid, Spania', 81044, 'Real Madrid', NULL, NULL),
(6, 'Allianz Arena', 'Munich, Germania', 75000, 'Bayern Munich', NULL, NULL),
(7, 'Anfield', 'Liverpool, Anglia', 53394, 'Liverpool FC', NULL, NULL),
(8, 'Parc des Princes', 'Paris, Franța', 47929, 'Paris Saint-Germain', NULL, NULL),
(9, 'Old Trafford', 'Manchester, Anglia', 74879, 'Manchester United', NULL, NULL),
(10, 'Signal Iduna Park', 'Dortmund, Germania', 81359, 'Borussia Dortmund', NULL, NULL),
(11, 'Stamford Bridge', 'Londra, Anglia', 40834, 'Chelsea FC', NULL, NULL),
(12, 'San Siro', 'Milano, Italia', 80018, 'AC Milan / Inter Milan', NULL, NULL),
(13, 'Estadio Wanda Metropolitano', 'Madrid, Spania', 68456, 'Atletico Madrid', NULL, NULL),
(14, 'Emirates Stadium', 'Londra, Anglia', 60260, 'Arsenal FC', NULL, NULL),
(15, 'Estadio do Dragao', 'Porto, Portugalia', 50476, 'FC Porto', NULL, NULL),
(16, 'Estadio Jose Alvalade', 'Lisabona, Portugalia', 50095, 'Sporting Lisbon', NULL, NULL),
(17, 'Amsterdam Arena', 'Amsterdam, Olanda', 55405, 'Ajax Amsterdam', NULL, NULL),
(18, 'Stadio Olimpico', 'Roma, Italia', 72698, 'AS Roma / Lazio', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `antrenors`
--
ALTER TABLE `antrenors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `jucators`
--
ALTER TABLE `jucators`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `stadions`
--
ALTER TABLE `stadions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `antrenors`
--
ALTER TABLE `antrenors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jucators`
--
ALTER TABLE `jucators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `stadions`
--
ALTER TABLE `stadions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
