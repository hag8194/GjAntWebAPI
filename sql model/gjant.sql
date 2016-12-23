-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2016 a las 07:23:02
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gjant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `address`
--

INSERT INTO `address` (`id`, `name`, `lat`, `lng`) VALUES
(1, 'Carialinda 1era Etapa, Naguanagua, Carabobo, Venezuela', 10.3024, -68.0386),
(2, 'Conjunto Residencial Los Laureles, Valencia, Carabobo, Venezuela', 10.1508, -68.028),
(3, 'Clínica IEQ Los Mangos, Avenida 110, Valencia, Carabobo, Venezuela', 10.1973, -68.0263),
(4, 'Farmatodo C.C La Granja, Avenida 102 Universidad, Naguanagua, Carabobo, Venezuela', 10.2414, -68.0115),
(7, 'Farmahorro, Naguanagua, Carabobo, Venezuela', 10.2444, -68.0083),
(8, 'Centro Clínico Naguanagua, Naguanagua, Carabobo, Venezuela', 10.2787, -68.0184),
(9, 'Farmatodo, Paseo Cuatricentenario, Valencia, Carabobo, Venezuela', 10.1938, -68.0267),
(10, 'Locatel, Piazza, 4 Avenidas, Valencia, Carabobo, Venezuela', 10.2047, -68.0285),
(11, 'Los Bucares, Flor Amarillo, Carabobo, Venezuela', 10.1395, -67.927);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator', '1', 1480259031),
('client', '18', 1481511322),
('client', '26', 1482254756),
('client', '27', 1482331562),
('client', '28', 1482333469),
('client', '29', 1482335643),
('client', '30', 1482336048),
('client', '31', 1482336295),
('vendor', '1', 1481508332),
('vendor', '17', 1481510739),
('vendor', '19', 1482068615),
('vendor', '20', 1482069380),
('vendor', '21', 1482069511),
('vendor', '22', 1482071345),
('vendor', '23', 1482121365),
('vendor', '24', 1482208219),
('vendor', '25', 1482253197),
('vendor', '32', 1482369034);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `rule_name` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `data` text CHARACTER SET utf8,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1480812650, 1480812650),
('/admin/user/index', 2, NULL, NULL, NULL, 1480901647, 1480901647),
('/brand/*', 2, NULL, NULL, NULL, 1480812024, 1480812024),
('/brand/create', 2, NULL, NULL, NULL, 1480811240, 1480811240),
('/brand/delete', 2, NULL, NULL, NULL, 1480811240, 1480811240),
('/brand/index', 2, NULL, NULL, NULL, 1480811240, 1480811240),
('/brand/update', 2, NULL, NULL, NULL, 1480811240, 1480811240),
('/brand/view', 2, NULL, NULL, NULL, 1480811240, 1480811240),
('/category/*', 2, NULL, NULL, NULL, 1480900646, 1480900646),
('/category/create', 2, NULL, NULL, NULL, 1480901108, 1480901108),
('/category/delete', 2, NULL, NULL, NULL, 1480901108, 1480901108),
('/category/index', 2, NULL, NULL, NULL, 1480901107, 1480901107),
('/category/update', 2, NULL, NULL, NULL, 1480901108, 1480901108),
('/category/view', 2, NULL, NULL, NULL, 1480901108, 1480901108),
('/client-wallet/*', 2, NULL, NULL, NULL, 1481510888, 1481510888),
('/client-wallet/create', 2, NULL, NULL, NULL, 1481510888, 1481510888),
('/client-wallet/index', 2, NULL, NULL, NULL, 1481510888, 1481510888),
('/client/*', 2, NULL, NULL, NULL, 1481079715, 1481079715),
('/client/index', 2, NULL, NULL, NULL, 1481079715, 1481079715),
('/employer/*', 2, NULL, NULL, NULL, 1481079698, 1481079698),
('/employer/index', 2, NULL, NULL, NULL, 1481079705, 1481079705),
('/product-category/*', 2, NULL, NULL, NULL, 1480900650, 1480900650),
('/product-category/create', 2, NULL, NULL, NULL, 1480901115, 1480901115),
('/product-category/delete', 2, NULL, NULL, NULL, 1480901115, 1480901115),
('/product-category/index', 2, NULL, NULL, NULL, 1480901115, 1480901115),
('/product-category/update', 2, NULL, NULL, NULL, 1480901115, 1480901115),
('/product-category/view', 2, NULL, NULL, NULL, 1480901115, 1480901115),
('/product/*', 2, NULL, NULL, NULL, 1480900683, 1480900683),
('/product/create', 2, NULL, NULL, NULL, 1480901126, 1480901126),
('/product/delete', 2, NULL, NULL, NULL, 1480901126, 1480901126),
('/product/index', 2, NULL, NULL, NULL, 1480901126, 1480901126),
('/product/update', 2, NULL, NULL, NULL, 1480901126, 1480901126),
('/product/view', 2, NULL, NULL, NULL, 1480901126, 1480901126),
('/related-articles/*', 2, NULL, NULL, NULL, 1481510872, 1481510872),
('/related-articles/create', 2, NULL, NULL, NULL, 1481510878, 1481510878),
('/related-articles/index', 2, NULL, NULL, NULL, 1481510878, 1481510878),
('/site/*', 2, NULL, NULL, NULL, 1481431390, 1481431390),
('/site/example', 2, NULL, NULL, NULL, 1480811248, 1480811248),
('/site/index', 2, NULL, NULL, NULL, 1480811248, 1480811248),
('/site/logout', 2, NULL, NULL, NULL, 1480813307, 1480813307),
('/site/profile', 2, NULL, NULL, NULL, 1481431397, 1481431397),
('/site/register', 2, NULL, NULL, NULL, 1481079415, 1481079415),
('/zone/*', 2, NULL, NULL, NULL, 1482207849, 1482207849),
('/zone/create', 2, NULL, NULL, NULL, 1482207849, 1482207849),
('/zone/index', 2, NULL, NULL, NULL, 1482207849, 1482207849),
('admin', 2, NULL, NULL, NULL, 1480812629, 1480813935),
('administrator', 1, NULL, NULL, NULL, 1480220029, 1480220029),
('Brand CRUD', 2, NULL, NULL, NULL, 1480807234, 1480900537),
('Category CRUD', 2, NULL, NULL, NULL, 1480900581, 1480900581),
('client', 1, NULL, NULL, NULL, 1480220062, 1480220062),
('Client CRUD', 2, NULL, NULL, NULL, 1481079791, 1481079791),
('ClientWallet CRUD', 2, NULL, NULL, NULL, 1481510908, 1481510908),
('Employer CRUD', 2, NULL, NULL, NULL, 1481079810, 1481079810),
('Product CRUD', 2, NULL, NULL, NULL, 1480900556, 1480900556),
('ProductBrand CRUD', 2, NULL, NULL, NULL, 1480900610, 1480900610),
('ProductCategory CRUD', 2, NULL, NULL, NULL, 1480900623, 1480900623),
('register-user', 2, NULL, NULL, NULL, 1481070676, 1481070676),
('RelatedArticles CRUD', 2, NULL, NULL, NULL, 1481510934, 1481510934),
('site', 2, NULL, NULL, NULL, 1480813276, 1480813276),
('vendor', 1, NULL, NULL, NULL, 1480220049, 1480220049),
('Zone CRUD', 2, NULL, NULL, NULL, 1482207903, 1482207903);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/admin/*'),
('administrator', 'admin'),
('administrator', 'Brand CRUD'),
('administrator', 'Category CRUD'),
('administrator', 'Client CRUD'),
('administrator', 'ClientWallet CRUD'),
('administrator', 'Employer CRUD'),
('administrator', 'Product CRUD'),
('administrator', 'ProductBrand CRUD'),
('administrator', 'ProductCategory CRUD'),
('administrator', 'register-user'),
('administrator', 'RelatedArticles CRUD'),
('administrator', 'site'),
('administrator', 'Zone CRUD'),
('Brand CRUD', '/brand/*'),
('Category CRUD', '/category/*'),
('client', 'site'),
('Client CRUD', '/client/*'),
('ClientWallet CRUD', '/client-wallet/*'),
('Employer CRUD', '/employer/*'),
('Product CRUD', '/product/*'),
('ProductCategory CRUD', '/product-category/*'),
('register-user', '/site/register'),
('RelatedArticles CRUD', '/related-articles/*'),
('site', '/site/example'),
('site', '/site/index'),
('site', '/site/logout'),
('site', '/site/profile'),
('vendor', '/product/index'),
('vendor', 'site'),
('Zone CRUD', '/zone/*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `data` text CHARACTER SET utf8,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`) VALUES
(1, 'Addidas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Computadora', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `identification` varchar(45) NOT NULL,
  `phone1` varchar(45) NOT NULL,
  `phone2` varchar(45) DEFAULT NULL,
  `credit_limit` double NOT NULL DEFAULT '0',
  `credit_use` double NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `fullname`, `identification`, `phone1`, `phone2`, `credit_limit`, `credit_use`, `created_at`, `updated_at`, `user_id`, `address_id`) VALUES
(1, 'Dra. Tamara Cusnier Albretch', '4426269', '04164255333', '', 100000, 0, 1482255082, 1482335763, 26, 3),
(2, 'Farmatodo C.C La Granja', 'farmatodogranja123456', '0241-867-5468', '', 0, 0, 1482333126, 1482333126, 27, 4),
(3, 'Farmahorro Paseo la Granja', 'farmahorropaseogranja123456', '0241-8686066', '', 0, 0, 1482335127, 1482335127, 28, 7),
(4, 'Centro Clinico Naguanagua', 'centrocliniconaguanagua0123456789', '0241-8663347', '', 0, 0, 1482335701, 1482335701, 29, 8),
(5, 'Farmatodo Paseo Cuatricentenario', 'farmatodolosmangos123456789', '0241-8233829', '', 0, 0, 1482336123, 1482364531, 30, 9),
(6, 'Locatel Parral', 'locatelpiazza@locatel.com.ve', '0241-8238383', '', 0, 0, 1482336412, 1482364556, 31, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_wallet`
--

CREATE TABLE `client_wallet` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `identification` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employer`
--

INSERT INTO `employer` (`id`, `name`, `lastname`, `identification`, `created_at`, `updated_at`, `zone_id`, `user_id`, `address_id`) VALUES
(1, 'Cesar', 'Ramirez', '18412245', 1482252228, 1482253119, 1, 24, 1),
(2, 'Ivan Edgardo', 'Giordano Navas', '24330567', 1482253277, 1482253389, 4, 25, 2),
(3, 'Monse', 'Noguera', '20812115', 1482369588, 1482369892, 5, 32, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(2, 'Brand', 13, NULL, 0, NULL),
(3, 'Crear', 2, '/brand/create', 1, NULL),
(4, 'Example', NULL, '/site/example', 1000, '''fa fa-file-code-o'',''header'''),
(5, 'Principal', 2, '/brand/index', 0, NULL),
(6, 'Escritorio', NULL, '/site/index', 0, NULL),
(7, 'Categoría', 13, NULL, NULL, NULL),
(8, 'Crear', 7, '/category/create', 1, NULL),
(9, 'Principal', 7, '/category/index', 0, NULL),
(11, 'Asignar categorías', NULL, '/product-category/index', 8, NULL),
(12, 'Zonas', 13, NULL, 3, NULL),
(13, 'Maestros', NULL, NULL, 5, NULL),
(14, 'Administrar', NULL, '/admin/user/index', 1, NULL),
(15, 'Producto', NULL, NULL, 6, NULL),
(16, 'Principal', 15, '/product/index', 0, NULL),
(18, 'Crear', 15, '/product/create', 1, NULL),
(19, 'Registrar usuario', NULL, '/site/register', 2, NULL),
(20, 'Clientes', 22, '/client/index', 1, NULL),
(21, 'Empleados', 22, '/employer/index', 0, NULL),
(22, 'Datos Personales', NULL, NULL, 3, NULL),
(23, 'Cartera de cliente', NULL, NULL, 4, NULL),
(24, 'Principal', 23, '/client-wallet/index', NULL, NULL),
(25, 'Crear', 23, '/client-wallet/create', 1, NULL),
(26, 'Articulos Relacionados', NULL, '/related-articles/index', 7, NULL),
(27, 'Principal', 12, '/zone/index', NULL, NULL),
(28, 'Crear', 12, '/zone/create', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m130524_201442_init', 1480258718);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` bigint(11) NOT NULL,
  `price` double NOT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT 'True: The product will appear in the catalog; False: The product will not appear in the catalog',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `quantity`, `price`, `status`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, '3141589', 'Cinturon', 15, 500, 0, 1481514759, 1481514759, 1),
(2, '1234', 'Zapato', 40, 124456, 0, 1481514771, 1481514771, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_brand`
--

CREATE TABLE `product_brand` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_brand`
--

INSERT INTO `product_brand` (`product_id`, `brand_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `path` varchar(45) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `related_articles`
--

CREATE TABLE `related_articles` (
  `parent` int(11) NOT NULL,
  `child` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `related_articles`
--

INSERT INTO `related_articles` (`parent`, `child`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `avatar` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `avatar`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 'hag8194', 'lRXrrCSJaD8XyCBrwKlBtqbkAagYGVyM', '$2y$13$xtDsB1/aoohzjVTaHgG1LOdn7QtElQti605QLnkucWxiCoa0o85vi', 'aCLVjEo_d0S-QhH-VzzAwP6tZN2AsjyC_1480273544', 'hag8194@gmail.com', 10, NULL, 'cdhc28ff5634094d8e69h2164a864404', 0, 1480273544),
(24, 'feanoro', 'FJ1lF7WcX7hzWnZFuAQX3Q1rosB5mwax', '$2y$13$1xgJD/Q6djUN68KapaE2p.oP36jhCeEk7jRwCkd7VyWpz0XOLK3Ae', NULL, 'ers.cesar@gmail.com', 10, NULL, '5b571f297c71827853d1109b21a82462', 1482208219, 1482252228),
(25, 'ivangn', 'FSHyfI8v8EdqoPO49KsdOGxLEt7vIxdh', '$2y$13$ISFOtqrM1pdMYfsWtV.GbOs6mq5AY6pgUu5UsmeU.cCGg.wKwg7KK', NULL, 'ign-jm@hotmail.com', 10, 'img/11ko_C3XVIBPTIqEbuvlWz5K2qXiQ-OL.jpg', '85b84fa04f5de2d259eb6c0760859e83', 1482253197, 1482253277),
(26, 'tcusnier', 'D4vZ2TJMcl86alIkB0ZON2Xd-v2gtTjw', '$2y$13$T2XY6jGEt61FYsFT0k/SWe3epvI2CaNpYdczWZl8Tme3QWIBfu5Bm', NULL, 'tamaracusnier@hotmail.com', 10, 'img/A3gEE6TzCQjTJC98pVVsmudrSlBSbGei.jpg', '60558e1ed6821676624bb958d8fe89e5', 1482254756, 1482255082),
(27, 'farmatodogranja', 'QP7zmIQkTmMo94iXJeMHvpJrrF30KjHA', '$2y$13$d6DxmAFLiGtciOAYm7xlrexaRCBCrPQAZEIag6GvJEOWrGAW3ZJ/O', NULL, 'farmatodogranja@farmatodo.com.ve', 10, NULL, 'c6efb067dac6b0da2f966869e45a912a', 1482331562, 1482333126),
(28, 'farmahorropaseo', '8bbAZ2T65zVue5_hAktjPK8iTmnzt5KK', '$2y$13$86sq4g5pJLJ1dwqCwT0wHe00ek1kymhQTVKmjq.ShCdZMF5RlXdA.', NULL, 'farmahorropase@farmaahorro.com.ve', 10, NULL, '71522fd84020bd5b24392f5bcd2239cc', 1482333469, 1482335127),
(29, 'ccliniconaguanagua', 'JAR7m1WgETCzSyy3eT-URnqhZBj8KPMZ', '$2y$13$cT6VGcdPkAdSB6ova1Y6EOUy1LXSc.vCoHQmFxW7QeSMbAWweWKyC', NULL, 'admin@centrocliniconaguanagua.com.ve', 10, NULL, '715791888c8f4bc599c3e921263e7cd8', 1482335643, 1482335701),
(30, 'farmatodoguataparo', 'MciIrR5Wyo2BlOcrEWYafwe8tHAzDlKN', '$2y$13$a/oQi0txoHm8EiBnZ08.fenv5Zwn/LYY.XLzm6omZSgME07RsExqC', NULL, 'farmatodoguataparo@farmatodo.com.ve', 10, NULL, '45bfe446a414ba92340b07a4f6d07e33', 1482336048, 1482336123),
(31, 'locatelparral', 'zU6Gnxa8t8VVsf7lWEjWZY7rgJU4uyh5', '$2y$13$PiaMW1XtaVGP59KHH/BGV.kBkXu592/OXH1R2yAXieyJZLZdZfjvu', NULL, 'locatelparral@locatel.com.ve', 10, NULL, 'ae830f26dd35c7232c4113fb041e712e', 1482336294, 1482336412),
(32, 'monsefoster@gmail.com', 'uxFOVmxHpLDO2apnmeSj2BVpiIRj6yv6', '$2y$13$QIvhKgDsaj8ONnciVDam8u0Q8Rmadqb46cbRzX3GBuu28o.NNLi.W', NULL, 'monsefoster@gmail.com', 10, 'img/zfGvxdOvSI9SK6tSD_s6TTMieax6tp8V.jpg', '9ec34b816c1bfdfb48b12f3d26e6ce98', 1482369034, 1482369587);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zone`
--

CREATE TABLE `zone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zone`
--

INSERT INTO `zone` (`id`, `name`, `description`, `lat`, `lng`) VALUES
(1, 'Naguanagua, Carabobo, Venezuela', 'Municipio Naguanagua', 10.2683, -68.0179),
(2, 'Municipio San Diego, Carabobo, Venezuela', 'Municipio San Diego', 10.2536, -67.9583),
(3, 'Bejuma, Carabobo, Venezuela', 'Municipio Bejuma', 10.1771, -68.2594),
(4, 'Valencia, Libertador, Carabobo, Venezuela', 'Municipio Libertador', 10.1579, -67.9972),
(5, 'Guacara, Carabobo, Venezuela', 'Municipio Guacara', 10.2647, -67.8927);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identification_UNIQUE` (`identification`),
  ADD KEY `fk_client_user1_idx` (`user_id`),
  ADD KEY `fk_client_address1_idx` (`address_id`);

--
-- Indices de la tabla `client_wallet`
--
ALTER TABLE `client_wallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_id_UNIQUE` (`client_id`),
  ADD KEY `fk_client_wallet_client1_idx` (`client_id`),
  ADD KEY `fk_client_wallet_employer1_idx` (`employer_id`);

--
-- Indices de la tabla `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identification_UNIQUE` (`identification`),
  ADD KEY `fk_employer_user1_idx` (`user_id`),
  ADD KEY `fk_employer_zone1_idx` (`zone_id`),
  ADD KEY `fk_employer_address1_idx` (`address_id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `fk_product_user1_idx` (`updated_by`);

--
-- Indices de la tabla `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`product_id`,`brand_id`),
  ADD KEY `fk_product_has_brand_brand1_idx` (`brand_id`),
  ADD KEY `fk_product_has_brand_product1_idx` (`product_id`);

--
-- Indices de la tabla `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `fk_product_has_category_category1_idx` (`category_id`),
  ADD KEY `fk_product_has_category_product1_idx` (`product_id`);

--
-- Indices de la tabla `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_image_product1_idx` (`product_id`);

--
-- Indices de la tabla `related_articles`
--
ALTER TABLE `related_articles`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `fk_related_articles_product1_idx` (`parent`),
  ADD KEY `fk_related_articles_product2_idx` (`child`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indices de la tabla `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `client_wallet`
--
ALTER TABLE `client_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_client_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `client_wallet`
--
ALTER TABLE `client_wallet`
  ADD CONSTRAINT `fk_client_wallet_client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_client_wallet_employer1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `fk_employer_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employer_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employer_zone1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_user1` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_brand`
--
ALTER TABLE `product_brand`
  ADD CONSTRAINT `fk_product_has_brand_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_brand_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `fk_product_has_category_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_category_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_image_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `related_articles`
--
ALTER TABLE `related_articles`
  ADD CONSTRAINT `fk_related_articles_product1` FOREIGN KEY (`parent`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_related_articles_product2` FOREIGN KEY (`child`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
