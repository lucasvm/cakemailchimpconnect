-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2016 a las 16:52:25
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ben`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lft` varchar(255) NOT NULL,
  `news_id` int(5) NOT NULL,
  `rght` varchar(255) NOT NULL,
  `parent_id` int(5) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `lft`, `news_id`, `rght`, `parent_id`, `created`, `modified`, `description`) VALUES
(1, 'Test 1', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'Test 2', '', 19, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, 'Animales', '1', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `ad_photos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `created`, `modified`, `user_id`, `category_id`, `status`, `tags`, `ad_photos`) VALUES
(2, 'Test 2', 'Test 2 Body', '2016-07-11 17:26:01', '2016-07-11 17:26:01', 1, 0, 0, '', ''),
(3, '', NULL, '2016-07-11 19:22:55', '2016-07-11 19:22:55', 1, 0, 0, '', ''),
(5, 'News 32', '<p><strong>Prueba de nuevo</strong></p>', '2016-07-11 22:11:33', '2016-07-12 20:48:42', 7, 0, 1, '', ''),
(7, 'Nuevo Articulo', '<p><strong>Test 2</strong></p>', '2016-07-11 22:37:19', '2016-07-12 02:22:36', 7, 0, 1, '', ''),
(8, 'Test 3', NULL, '2016-07-21 02:20:49', '2016-07-21 02:20:49', 7, 0, 1, '', ''),
(9, '', NULL, '2016-07-21 02:27:08', '2016-07-21 02:27:08', 7, 0, 0, '', ''),
(10, '', NULL, '2016-07-22 20:40:03', '2016-07-22 20:40:03', 7, 0, 0, '', ''),
(11, 'Test 7', NULL, '2016-07-23 01:16:07', '2016-07-23 01:16:07', 7, 0, 0, '', ''),
(12, 'Home Page', NULL, '2016-07-26 13:45:42', '2016-07-26 13:45:42', NULL, 0, 1, '', ''),
(13, 'Homepage Slider', '<p>Test</p>', '2016-07-26 13:49:34', '2016-07-26 13:49:34', NULL, 0, 0, '', ''),
(14, 'News 32', '<p>Test</p>', '2016-07-26 13:53:48', '2016-07-26 13:53:48', NULL, 0, 0, '', ''),
(15, 'Home Page Block', '<p>Test</p>', '2016-07-26 13:54:44', '2016-07-26 13:54:44', NULL, 0, 0, '', ''),
(16, 'Home Page Block', '<p>Test</p>', '2016-07-26 13:56:19', '2016-07-26 13:56:19', NULL, 0, 1, '', ''),
(17, 'Test', '<p>Test</p>', '2016-07-26 14:10:57', '2016-07-26 14:10:57', 7, 0, 1, '', ''),
(19, 'Test', '<p>Test</p>', '2016-07-26 14:14:30', '2016-07-26 14:14:30', 7, 0, 1, '', ''),
(20, 'Test', '<p>Test</p>', '2016-07-26 14:18:59', '2016-07-26 14:18:59', 7, 0, 0, '', ''),
(21, 'Test', '<p>gdsfg</p>', '2016-07-26 14:20:46', '2016-07-26 14:20:46', 7, 0, 1, '', ''),
(22, 'Homepage Slider', '<p>dfgdsfg</p>', '2016-07-26 14:22:08', '2016-07-26 14:22:08', 7, 0, 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(5) NOT NULL,
  `news_id` int(5) NOT NULL,
  `categories_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_tags`
--

CREATE TABLE `news_tags` (
  `news_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_uploads`
--

CREATE TABLE `news_uploads` (
  `upload_id` int(11) NOT NULL,
  `image_name` text,
  `news_id_fk` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(7, 'admin', '$2y$10$hJruuYKbfkvF2EGnTETYyeRqSTKdL8Mb/44b4NAcrW0ToerQocaM.', 'admin', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news_tags`
--
ALTER TABLE `news_tags`
  ADD PRIMARY KEY (`news_id`,`tag_id`);

--
-- Indices de la tabla `news_uploads`
--
ALTER TABLE `news_uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `news_uploads`
--
ALTER TABLE `news_uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
