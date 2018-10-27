-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 27 2018 г., 16:52
-- Версия сервера: 5.7.24-0ubuntu0.16.04.1
-- Версия PHP: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `plato`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE `address` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `map` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `title`, `description`, `map`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium, reiciendis?   adipisicing.', 'Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium, reiciendis?   adipisicing.', 'https://yandex.ru/map-widget/v1/-/CBBvfAXvHC');

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `user_id` int(5) UNSIGNED NOT NULL,
  `user_email` char(255) NOT NULL,
  `user_password` char(255) NOT NULL,
  `user_hash` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_password`, `user_hash`) VALUES
(1, 'zair@mail.ru', 'df8c6de4aafbc917ecb9fa302b196d1b', '1150c63fd22673514254e31cf49bf6fa');

-- --------------------------------------------------------

--
-- Структура таблицы `category_menu`
--

CREATE TABLE `category_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_category` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `category_menu`
--

INSERT INTO `category_menu` (`id`, `title`, `name_category`) VALUES
(1, 'салаты', 'salads'),
(2, 'мидии (с картофелем фри)', 'mussels'),
(3, 'брускетты', 'bruschetta'),
(4, 'raw bar', 'raw bar'),
(5, 'закуски', 'snacks'),
(6, 'гарниры', 'garnish'),
(7, 'супы', 'soups'),
(8, 'десерты', 'dessert'),
(9, 'основные блюда', 'main dishes'),
(10, 'напитки', 'drinks'),
(11, 'на ледяном плато', 'plato'),
(12, 'тоники', 'tonik');

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `title`, `description`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quibusdam pariatur quaerat expedita praesentium error, deleniti quia eveniet distinctio, eos, excepturi fuga aliquam similique ducimus. Facilis mollitia iste id nam.');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `src` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `src_thumb` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `catalog` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `title`, `description`, `src`, `src_thumb`, `catalog`) VALUES
(5, NULL, NULL, '/image/content/interior/1540645549_A70A6855-2--small.jpg', '/image/content/interior/thumb/1540645549_A70A6855-2--small.jpg', 'interior'),
(6, NULL, NULL, '/image/content/interior/1540645556_A70A6855-2--small.jpg', '/image/content/interior/thumb/1540645556_A70A6855-2--small.jpg', 'interior'),
(7, NULL, NULL, '/image/content/dishes/1540645944_A70A6912-2.jpg', '/image/content/dishes/thumb/1540645944_A70A6912-2.jpg', 'dishes'),
(8, NULL, NULL, '/image/content/dishes/1540645950_A70A6934-2.jpg', '/image/content/dishes/thumb/1540645950_A70A6934-2.jpg', 'dishes'),
(9, NULL, NULL, '/image/content/dishes/1540645955_A70A7013-2.jpg', '/image/content/dishes/thumb/1540645955_A70A7013-2.jpg', 'dishes'),
(10, NULL, NULL, '/image/content/dishes/1540645961_A70A7072-2.jpg', '/image/content/dishes/thumb/1540645961_A70A7072-2.jpg', 'dishes'),
(11, NULL, NULL, '/image/content/dishes/1540645967_A70A7139-2.jpg', '/image/content/dishes/thumb/1540645967_A70A7139-2.jpg', 'dishes'),
(12, NULL, NULL, '/image/content/dishes/1540645973_A70A7176-2.jpg', '/image/content/dishes/thumb/1540645973_A70A7176-2.jpg', 'dishes');

-- --------------------------------------------------------

--
-- Структура таблицы `interior`
--

CREATE TABLE `interior` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `interior`
--

INSERT INTO `interior` (`id`, `title`, `description`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quibusdam pariatur quaerat expedita praesentium error, deleniti quia eveniet distinctio, eos, excepturi fuga aliquam similique ducimus. Facilis mollitia iste id nam.');

-- --------------------------------------------------------

--
-- Структура таблицы `intro`
--

CREATE TABLE `intro` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `logo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `bg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `bg_thumb` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `intro`
--

INSERT INTO `intro` (`id`, `title`, `description`, `logo`, `bg`, `bg_thumb`) VALUES
(1, 'Рыбный ресторан в москве Plato.', 'Lorem ipsum dolor sit amet.', 'image/logoPlato.png', '/image/content/intro/1540644981_A70A7326-2-small.jpg', '/image/content/intro/thumb/1540644981_A70A7326-2-small.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(80) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `category` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `price`, `category`) VALUES
(1, 'sdvcsd', 12212, 'salads'),
(2, 'sdvcsd', 12212, 'salads'),
(3, 'sdvcsd', 12212, 'salads'),
(4, 'asfwsaascsa', 1213, 'mussels'),
(5, 'asca', 231, 'raw bar'),
(6, 'scsdcsd12312', 12312, 'salads'),
(7, 'ascas', 213, 'salads');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_restourant`
--

CREATE TABLE `menu_restourant` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `href` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `bg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `bg_thumb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `menu_restourant`
--

INSERT INTO `menu_restourant` (`id`, `title`, `description`, `href`, `bg`, `bg_thumb`) VALUES
(1, 'концепция', 'PLATO -  лучшие морепродукты, рыба и мясо. кроме того, в меню есть специальный раздел "surf and turf" (серф энд терф), в котором морепродукты и стейки сочетаются в одной тарелке.', '/menu', '/image/content/menu-restourant/1540645116_A70A7233-2-small.jpg', '/image/content/menu-restourant/thumb/1540645116_A70A7233-2-small.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_review`
--

CREATE TABLE `menu_review` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `bg_thumb` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `menu_review`
--

INSERT INTO `menu_review` (`id`, `title`, `bg`, `bg_thumb`) VALUES
(1, 'RAW В меню Raw бара всевозможные закуски из свежей рыбы, морепродуктов и мяса с яркими заправками: тирадито из гребешка, татаки из говядины с муссом из цветной капусты, севиче из сибаса с цитрусовым соусом и авокадо и многое другое', '/image/content/menu_review/1540645263_A70A7295-2-small.jpg', '/image/content/menu-restourant/thumb/1540645263_A70A7295-2-small.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `navigation`
--

CREATE TABLE `navigation` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `href` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `href`) VALUES
(1, 'Главная', '#intro'),
(2, 'Меню', '#menu-restourant'),
(3, 'Галерея', '#interior'),
(4, 'О ресторане', '#address');

-- --------------------------------------------------------

--
-- Структура таблицы `socials`
--

CREATE TABLE `socials` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `href` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `logo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `socials`
--

INSERT INTO `socials` (`id`, `title`, `description`, `href`, `logo`) VALUES
(1, 'instagram', 'Мы в Instagramе', 'https://www.instagram.com', '<i class="fab fa-instagram"></i>'),
(2, 'Facebook', 'Мы в Facebook', 'https://www.instagram.com', '<i class="fab fa-facebook"></i>'),
(3, 'Номер', 'Телефон номер', 'tel:+79772620626', '<i class="fas fa-phone"></i>');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `category_menu`
--
ALTER TABLE `category_menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `interior`
--
ALTER TABLE `interior`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_restourant`
--
ALTER TABLE `menu_restourant`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_review`
--
ALTER TABLE `menu_review`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `category_menu`
--
ALTER TABLE `category_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `interior`
--
ALTER TABLE `interior`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `intro`
--
ALTER TABLE `intro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(80) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `menu_restourant`
--
ALTER TABLE `menu_restourant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `menu_review`
--
ALTER TABLE `menu_review`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
