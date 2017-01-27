-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2017 a las 10:02:04
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

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
(11, 'Los Bucares, Flor Amarillo, Carabobo, Venezuela', 10.1395, -67.927),
(12, 'Los Sauces, Avenida 134, Valencia, Carabobo, Venezuela', 10.2069, -68.0059),
(13, 'Conjunto Residencial Los Laureles, Valencia, Carabobo, Venezuela', 10.1508, -68.028),
(14, 'Farmacia "La Torre", Valencia, Carabobo, Venezuela', 10.1823, -68.0027),
(15, 'Farmacia Nuevo Siglo, Valencia, Carabobo, Venezuela', 10.1777, -68.0048),
(16, 'Clinica Los Colorados, Valencia, Carabobo, Venezuela', 10.1932, -68.0097),
(17, 'Los Caobos, Av 112 San Juan María Vianney, Valencia, Carabobo, Venezuela', 10.1572, -68.0213),
(18, 'hospital carabobo, Calle Carabobo, Naguanagua, Carabobo, Venezuela', 10.2839, -68.0141),
(19, 'Hospital Psiquiátrico "Dr. José Ortega Durán", Naguanagua, Carabobo, Venezuela', 10.282, -68.009);

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
('client', '35', 1482536649),
('client', '36', 1482536762),
('client', '37', 1482536892),
('client', '39', 1484425007),
('client', '40', 1484425338),
('vendor', '1', 1481508332),
('vendor', '17', 1481510739),
('vendor', '19', 1482068615),
('vendor', '20', 1482069380),
('vendor', '21', 1482069511),
('vendor', '22', 1482071345),
('vendor', '23', 1482121365),
('vendor', '24', 1482208219),
('vendor', '25', 1482253197),
('vendor', '32', 1482369034),
('vendor', '33', 1482475791),
('vendor', '34', 1482536479),
('vendor', '38', 1482561399);

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
('/client-wallet/*', 2, NULL, NULL, NULL, 1481510888, 1481510888),
('/client-wallet/create', 2, NULL, NULL, NULL, 1481510888, 1481510888),
('/client-wallet/index', 2, NULL, NULL, NULL, 1481510888, 1481510888),
('/client/*', 2, NULL, NULL, NULL, 1481079715, 1481079715),
('/client/index', 2, NULL, NULL, NULL, 1481079715, 1481079715),
('/employer/*', 2, NULL, NULL, NULL, 1481079698, 1481079698),
('/employer/index', 2, NULL, NULL, NULL, 1481079705, 1481079705),
('/product-tag/*', 2, NULL, NULL, NULL, 1482478161, 1482478161),
('/product-tag/create', 2, NULL, NULL, NULL, 1482478161, 1482478161),
('/product-tag/index', 2, NULL, NULL, NULL, 1482478161, 1482478161),
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
('/site/enterprise', 2, NULL, NULL, NULL, 1485307033, 1485307033),
('/site/example', 2, NULL, NULL, NULL, 1480811248, 1480811248),
('/site/index', 2, NULL, NULL, NULL, 1480811248, 1480811248),
('/site/logout', 2, NULL, NULL, NULL, 1480813307, 1480813307),
('/site/profile', 2, NULL, NULL, NULL, 1481431397, 1481431397),
('/site/register', 2, NULL, NULL, NULL, 1481079415, 1481079415),
('/tag/*', 2, NULL, NULL, NULL, 1482478161, 1482478161),
('/tag/create', 2, NULL, NULL, NULL, 1482478161, 1482478161),
('/tag/index', 2, NULL, NULL, NULL, 1482478161, 1482478161),
('/zone/*', 2, NULL, NULL, NULL, 1482207849, 1482207849),
('/zone/create', 2, NULL, NULL, NULL, 1482207849, 1482207849),
('/zone/index', 2, NULL, NULL, NULL, 1482207849, 1482207849),
('admin', 2, NULL, NULL, NULL, 1480812629, 1480813935),
('administrator', 1, NULL, NULL, NULL, 1480220029, 1480220029),
('Brand CRUD', 2, NULL, NULL, NULL, 1480807234, 1480900537),
('client', 1, NULL, NULL, NULL, 1480220062, 1480220062),
('Client CRUD', 2, NULL, NULL, NULL, 1481079791, 1481079791),
('ClientWallet CRUD', 2, NULL, NULL, NULL, 1481510908, 1481510908),
('Employer CRUD', 2, NULL, NULL, NULL, 1481079810, 1481079810),
('enterprise', 2, NULL, NULL, NULL, 1485307048, 1485307048),
('Product CRUD', 2, NULL, NULL, NULL, 1480900556, 1480900556),
('ProductTag CRUD', 2, NULL, NULL, NULL, 1482478287, 1482478287),
('register-user', 2, NULL, NULL, NULL, 1481070676, 1481070676),
('RelatedArticles CRUD', 2, NULL, NULL, NULL, 1481510934, 1481510934),
('site', 2, NULL, NULL, NULL, 1480813276, 1480813276),
('Tag CRUD', 2, NULL, NULL, NULL, 1482478269, 1482478269),
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
('administrator', 'Client CRUD'),
('administrator', 'ClientWallet CRUD'),
('administrator', 'Employer CRUD'),
('administrator', 'enterprise'),
('administrator', 'Product CRUD'),
('administrator', 'ProductTag CRUD'),
('administrator', 'register-user'),
('administrator', 'RelatedArticles CRUD'),
('administrator', 'site'),
('administrator', 'Tag CRUD'),
('administrator', 'Zone CRUD'),
('Brand CRUD', '/brand/*'),
('client', 'site'),
('Client CRUD', '/client/*'),
('ClientWallet CRUD', '/client-wallet/*'),
('Employer CRUD', '/employer/*'),
('enterprise', '/site/enterprise'),
('Product CRUD', '/product/*'),
('ProductTag CRUD', '/product-tag/*'),
('register-user', '/site/register'),
('RelatedArticles CRUD', '/related-articles/*'),
('site', '/site/example'),
('site', '/site/index'),
('site', '/site/logout'),
('site', '/site/profile'),
('Tag CRUD', '/tag/*'),
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
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`) VALUES
(1, 'Addidas', '');

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
  `assigned` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `fullname`, `identification`, `phone1`, `phone2`, `credit_limit`, `credit_use`, `assigned`, `created_at`, `updated_at`, `user_id`, `address_id`) VALUES
(1, 'Dra. Tamara Cusnier Albretch', '4426269', '04164255333', '', 700000, 0, 0, 1482255082, 1484264263, 26, 3),
(2, 'Farmatodo C.C La Granja', 'farmatodogranja123456', '0241-867-5468', '', 700000, 0, 1, 1482333126, 1484425148, 27, 4),
(3, 'Farmahorro Paseo la Granja', 'farmahorropaseogranja123456', '0241-8686066', '', 700000, 0, 1, 1482335127, 1482335127, 28, 7),
(4, 'Centro Clinico Naguanagua', 'centrocliniconaguanagua0123456789', '0241-8663347', '', 700000, 0, 1, 1482335701, 1484425130, 29, 8),
(5, 'Farmatodo Paseo Cuatricentenario', 'farmatodolosmangos123456789', '0241-8233829', '', 700000, 0, 0, 1482336123, 1484264264, 30, 9),
(6, 'Locatel Parral', 'locatelpiazza@locatel.com.ve', '0241-8238383', '', 700000, 0, 0, 1482336412, 1484264264, 31, 10),
(7, 'Farmacia La Torre', 'farmacialatorre123456789', '0241-8680051', '', 700000, 0, 0, 1482536695, 1484264265, 35, 14),
(8, 'Farmacia Nuevo Siglo', 'J-30927929-7', '0241-8318910', '', 700000, 0, 0, 1482536836, 1484264266, 36, 15),
(9, 'Clinica Los Colorados', 'clinicaloscolorados123456', '0241-1223365', '', 700000, 0, 0, 1482536936, 1482536936, 37, 16),
(10, 'Hospital de Carabobo', 'hospitalcarabobo', '0241-4456987', '0241-4456988', 700000, 0, 1, 1484425076, 1484880687, 39, 18),
(11, 'Hospital Psiquiatrico "Dr. José Ortega Durán"', 'hospitalpsiquiatricodrjoseortegaduran', '0424-5138754', '', 700000, 9000, 1, 1484425522, 1485507578, 40, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_wallet`
--

CREATE TABLE `client_wallet` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `client_wallet`
--

INSERT INTO `client_wallet` (`id`, `employer_id`, `client_id`) VALUES
(6, 3, 3),
(10, 3, 4),
(11, 3, 2),
(12, 3, 10),
(14, 3, 11);

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
(1, 'Cesar', 'Ramirez', '18412245', 1482252228, 1482535567, 1, 24, 1),
(2, 'Ivan Edgardo', 'Giordano Navas', '24330567', 1482253277, 1482253389, 4, 25, 2),
(3, 'Victoria', 'Noguera', '20812115', 1482369588, 1482505913, 1, 32, 11),
(4, 'Johana', 'Romero', '18412223', 1482475902, 1482477411, 6, 33, 12),
(5, 'Marjoire Susana', 'Navas Martines', '7111654', 1482536520, 1482536520, 6, 34, 13),
(6, 'Pedro', 'Palma', '19221152', 1482561821, 1482561821, 4, 38, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enterprise`
--

CREATE TABLE `enterprise` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `rif` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `founded_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enterprise`
--

INSERT INTO `enterprise` (`id`, `name`, `rif`, `phone`, `address`, `founded_date`) VALUES
(1, 'INVERSIONESGONMART C.A.', 'J-123654158122', '0241-8530707', 'Carialinda 1era Etapa, Naguanagua, Carabobo, ', '2011-11-17');

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
(7, 'Etiqueta', 13, NULL, NULL, NULL),
(8, 'Crear', 7, '/tag/create', 1, NULL),
(9, 'Principal', 7, '/tag/index', 0, NULL),
(11, 'Asignar etiquetas', NULL, '/product-tag/index', 7, NULL),
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
(23, 'Cartera de cliente', NULL, '/client-wallet/index', 4, NULL),
(26, 'Articulos Relacionados', NULL, '/related-articles/index', 8, NULL),
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
-- Estructura de tabla para la tabla `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` smallint(6) DEFAULT '10',
  `description` tinytext,
  `type` smallint(6) DEFAULT '0' COMMENT '0: Cotization 1: Buy Order or Sales Order',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `client_wallet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `order`
--

INSERT INTO `order` (`id`, `code`, `status`, `description`, `type`, `created_at`, `updated_at`, `client_wallet_id`) VALUES
(2, 'ORD101485297776560', 10, 'dsa', 0, 147483647, 147483647, 10),
(3, 'ORD141485297776560', 10, 'Hola amigos!!', 0, 147483647, 147483647, 14),
(4, 'ORD141485298311707', 10, '', 0, 147483647, 147483647, 14),
(5, 'ORD121485298513258', 10, 'Esto es una cotización de prueba.', 0, 1485298518, 1485298518, 12),
(6, 'ORD61485300686643', 10, 'Cotización de prueba', 0, 1485300692, 1485300692, 6),
(7, 'ORD61485300686645', 10, 'Description here!', 0, 1485460288, 1485460288, 14),
(8, 'ORD141485462349522', 10, 'Cotización!', 0, 1485462365, 1485462365, 14),
(9, 'ORD141485464763474', 10, 'Cotizacion de prueba!!', 0, 1485464781, 1485464781, 14),
(12, 'ORD62485300686668', 10, 'Orden de prueba, postman!', 1, 1485465149, 1485465149, 14),
(13, 'ORD141485466065491', 10, 'Orden de compra de prueba!', 1, 1485466138, 1485466138, 14),
(14, 'ORD63485300686668', 10, 'Orden de prueba, postman!', 1, 1485505382, 1485505382, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`) VALUES
(2, 3, 10),
(3, 3, 10),
(3, 4, 50),
(4, 3, 199),
(5, 3, 200),
(5, 4, 50),
(6, 3, 200),
(6, 4, 50),
(7, 3, 10),
(8, 3, 199),
(8, 4, 5),
(9, 3, 197),
(10, 3, 2),
(12, 3, 10),
(13, 3, 190),
(13, 4, 50),
(14, 3, 10);

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
  `updated_by` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `quantity`, `price`, `status`, `created_at`, `updated_at`, `updated_by`, `brand_id`) VALUES
(3, 'producprueba1', 'Producto 1', 40, 3500, 1, 1482560950, 1485505382, 1, 1),
(4, 'producprueba2', 'Producto 2', 50, 2000, 1, 1483456818, 1485466138, 1, 1),
(5, 'producprueba3', 'Producto 3', 33350, 1500, 0, 1483457199, 1484894319, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `path` varchar(45) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_image`
--

INSERT INTO `product_image` (`id`, `path`, `product_id`) VALUES
(1, '/img/NN-TG7bN2wdVF53gvExAr-RH6mQTQJQm.png', 3),
(2, '/img/Qrh5NvZuA5uGym0oRFgc8ZXkTE0qb0rf.png', 3),
(3, '/img/k9e00i5tFero-mvHHr4UhFv8l1CDK-6k.jpg', 3),
(5, '/img/B16sPWpjMxSGlF7oO6fXfknojIqTPz0A.jpg', 4),
(6, '/img/tW7qQL8QkzKG5L_fqfSzicQWdRogaR-g.jpg', 4),
(7, '/img/8p_IqpevDE2AQvZ1OknbbzmK3kPf-oGA.jpg', 4),
(13, '/img/83gEU8WEYMOlC1u1_Z-5qHn8hIRRnOKp.jpg', 3),
(14, '/img/ZRWWeH4QCcXbC2efzjEorN1BbWAoJ130.jpg', 3),
(15, '/img/ogHLTV1yyKtgFrR_0OIwlrRIpK7-VJGP.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(3, 1),
(3, 3),
(3, 4),
(3, 6),
(3, 8),
(4, 6),
(4, 7);

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
(3, 4),
(3, 5),
(4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `name`, `description`) VALUES
(1, 'Etiqueta1', ''),
(2, 'Etiqueta3', 'Esta es la etiqueta 3'),
(3, 'Etiqueta2', 'Esta es la etiqueta2'),
(4, 'Etiqueta4', 'Esta es la etiqueta4'),
(5, 'Etiqueta5', 'Esta es la etiqueta5'),
(6, 'Etiqueta6', 'Etiqueta6!!!'),
(7, 'Etiqueta7', 'Etiqueta7'),
(8, 'Etiqueta8', 'Esta es la etiqueta8');

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
(1, 'hag8194', 'lRXrrCSJaD8XyCBrwKlBtqbkAagYGVyM', '$2y$13$IiZPayfpjlo4k/wdpxHgw.Tz3WIRlR2FjQSOZNUYPxBH9GPPdwPSu', 'aCLVjEo_d0S-QhH-VzzAwP6tZN2AsjyC_1480273544', 'hag8194@gmail.com', 10, '', 'cdhc28ff5634094d8e69h2164a864404', 0, 1482528689),
(24, 'feanoro', 'FJ1lF7WcX7hzWnZFuAQX3Q1rosB5mwax', '$2y$13$eNfzQiD73X8z9gBr8C1KLejeViiBQTCA/pYva3x7G19hvhvc5kNfC', NULL, 'ers.cesar@gmail.com', 10, NULL, '5b571f297c71827853d1109b21a82462', 1482208219, 1482535568),
(25, 'ivangn', 'FSHyfI8v8EdqoPO49KsdOGxLEt7vIxdh', '$2y$13$ISFOtqrM1pdMYfsWtV.GbOs6mq5AY6pgUu5UsmeU.cCGg.wKwg7KK', NULL, 'ign-jm@hotmail.com', 10, '/img/11ko_C3XVIBPTIqEbuvlWz5K2qXiQ-OL.jpg', '85b84fa04f5de2d259eb6c0760859e83', 1482253197, 1482253277),
(26, 'tcusnier', 'D4vZ2TJMcl86alIkB0ZON2Xd-v2gtTjw', '$2y$13$T2XY6jGEt61FYsFT0k/SWe3epvI2CaNpYdczWZl8Tme3QWIBfu5Bm', NULL, 'tamaracusnier@hotmail.com', 10, '/img/A3gEE6TzCQjTJC98pVVsmudrSlBSbGei.jpg', '60558e1ed6821676624bb958d8fe89e5', 1482254756, 1482536161),
(27, 'farmatodogranja', 'QP7zmIQkTmMo94iXJeMHvpJrrF30KjHA', '$2y$13$d6DxmAFLiGtciOAYm7xlrexaRCBCrPQAZEIag6GvJEOWrGAW3ZJ/O', NULL, 'farmatodogranja@farmatodo.com.ve', 10, '/img/I-pi0sY1A-6OjFO_l-ooGUS9kyBaImYe.jpg', 'c6efb067dac6b0da2f966869e45a912a', 1482331562, 1484417922),
(28, 'farmahorropaseo', '8bbAZ2T65zVue5_hAktjPK8iTmnzt5KK', '$2y$13$86sq4g5pJLJ1dwqCwT0wHe00ek1kymhQTVKmjq.ShCdZMF5RlXdA.', NULL, 'farmahorropase@farmaahorro.com.ve', 10, NULL, '71522fd84020bd5b24392f5bcd2239cc', 1482333469, 1482335127),
(29, 'ccliniconaguanagua', 'JAR7m1WgETCzSyy3eT-URnqhZBj8KPMZ', '$2y$13$cT6VGcdPkAdSB6ova1Y6EOUy1LXSc.vCoHQmFxW7QeSMbAWweWKyC', NULL, 'admin@centrocliniconaguanagua.com.ve', 10, NULL, '715791888c8f4bc599c3e921263e7cd8', 1482335643, 1482335701),
(30, 'farmatodoguataparo', 'MciIrR5Wyo2BlOcrEWYafwe8tHAzDlKN', '$2y$13$a/oQi0txoHm8EiBnZ08.fenv5Zwn/LYY.XLzm6omZSgME07RsExqC', NULL, 'farmatodoguataparo@farmatodo.com.ve', 10, NULL, '45bfe446a414ba92340b07a4f6d07e33', 1482336048, 1482336123),
(31, 'locatelparral', 'zU6Gnxa8t8VVsf7lWEjWZY7rgJU4uyh5', '$2y$13$PiaMW1XtaVGP59KHH/BGV.kBkXu592/OXH1R2yAXieyJZLZdZfjvu', NULL, 'locatelparral@locatel.com.ve', 10, NULL, 'ae830f26dd35c7232c4113fb041e712e', 1482336294, 1482336412),
(32, 'monsefoster@gmail.com', 'uxFOVmxHpLDO2apnmeSj2BVpiIRj6yv6', '$2y$13$QIvhKgDsaj8ONnciVDam8u0Q8Rmadqb46cbRzX3GBuu28o.NNLi.W', NULL, 'monsefoster@gmail.com', 10, '/img/mJMNyOFaJKZy2k9_NOY8QH97LDonAvRR.jpg', '9ec34b816c1bfdfb48b12f3d26e6ce98', 1482369034, 1482369587),
(33, 'noromero1', 'Ww0a3F15NaKsrN2LGLFEVUsh03F16tab', '$2y$13$sAmSRjRkeLY46cyftrDXKOsyc.PKE7hymRsRbcTraDzcFp84gDGvK', NULL, 'johanaromero@gmail.com', 10, NULL, '13e4b1187ff240a02c22cd9d7015130c', 1482475791, 1482475902),
(34, 'cuarzoplata', 'HRGtBhMx6MhOfoafjdnFh27xAMZmmfnT', '$2y$13$KKAaNDbusx80Q8ZdUjUK..odKCvg7FMHrbW1Yyfj3rYcE2E1zU8Zm', NULL, 'cuarzoplata@hotmail.com', 10, NULL, 'effa3d8e4c9ff8e8aa94f336bfcc4348', 1482536479, 1482536520),
(35, 'farmacialatorre', 'bo08JkuWomifGFboBLmxQ7QZ4IgoVbtz', '$2y$13$Z2ZU3MjIwo7xtmWVRT7mceW09XNiM7A4ZaOboxZQ86XWDOnBKMqQ2', NULL, 'admin@farmacialatorre.com.ve', 10, NULL, '27319a800fcf460d041ff9760562e244', 1482536649, 1482536695),
(36, 'farmacianuevosiglo', '4b1keTlyF5rzOTG1Suq-bu_JciptGcRK', '$2y$13$ZFGmmKT9kWuvAJfpp3F6q.kW3JaLQTsbzXU2gNqCmC6GQSUEpjDW.', NULL, 'admin@farmacias.nuevosiglo.com.ve', 10, NULL, '814739fe9e9e327cef3477a5b57717ae', 1482536762, 1482536836),
(37, 'clinicaloscolorados', 'C7ccO0BgknTP4TKhnK9hHsZE_ppQOIcS', '$2y$13$yWvCi1F03d3mvVCKuGM8SeQ9NeV9cu4yomAmOgPTDeTVNgHf8sq06', NULL, 'admin@clinicaloscolorados.com.ve', 10, NULL, '004747631764f1fa719dba93bb3f550a', 1482536892, 1482536936),
(38, 'ppalma', 'FiTAVeiX2yuH2jqfH02nrxA9BOKnbLB3', '$2y$13$GSCnSXml8.NhnLBLD1ZBceDJiUwUvJz.Z.ip9QBXNpecVkZyZ6246', NULL, 'pedropalma@gmail.com', 10, NULL, '7ac2ec27dadf7e16a3440ca5a0748cf7', 1482561399, 1482561821),
(39, 'hospitalcarabobo', 'DJrBRJaqcMEZb25VDTyn1Ci0tgFpP-pl', '$2y$13$/yj0lbCcLeyeSTNgpUEJU.Yfx.ZT4FHDQRMWEzduEKwE3ALuJokp.', NULL, 'admin@hospitalcarabobo.com', 10, NULL, '5d8885d98c3e045ffe568d22d41d2acb', 1484425007, 1484425076),
(40, 'hospitalpsiquiatriconaguanagua', '6f4ttileEBeYKSkr0XPbwZXkaMajwqG1', '$2y$13$gUTrdBaxs.HSPUHkBzCIq.OYWBhMriePW5ueKbB/ViN1t4MOVkehu', NULL, 'admin@hospitalpsiquiatriconaguanagua.com', 10, '/img/wohpAK0d55wou4igc8xyuzlBqDYCTg2K.jpg', '2ca2138cbc43df8d862e795e20ca8893', 1484425338, 1485507578);

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
(5, 'Guacara, Carabobo, Venezuela', 'Municipio Guacara', 10.2647, -67.8927),
(6, 'Valencia, Carabobo, Venezuela', 'Municipio Valencia', 10.1579, -67.9972);

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
-- Indices de la tabla `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `fk_order_client_wallet1_idx` (`client_wallet_id`);

--
-- Indices de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `fk_order_detail_order1_idx` (`order_id`),
  ADD KEY `fk_order_detail_product1_idx` (`product_id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `fk_product_user1_idx` (`updated_by`),
  ADD KEY `fk_product_brand1_idx` (`brand_id`);

--
-- Indices de la tabla `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_image_product1_idx` (`product_id`);

--
-- Indices de la tabla `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `fk_product_has_tag_tag1_idx` (`tag_id`),
  ADD KEY `fk_product_has_tag_product1_idx` (`product_id`);

--
-- Indices de la tabla `related_articles`
--
ALTER TABLE `related_articles`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `fk_related_articles_product1_idx` (`parent`),
  ADD KEY `fk_related_articles_product2_idx` (`child`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `client_wallet`
--
ALTER TABLE `client_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- Filtros para la tabla `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_client_wallet1` FOREIGN KEY (`client_wallet_id`) REFERENCES `client_wallet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_detail_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_detail_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_user1` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_image_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `fk_product_has_tag_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_tag_tag1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `related_articles`
--
ALTER TABLE `related_articles`
  ADD CONSTRAINT `fk_related_articles_product1` FOREIGN KEY (`parent`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_related_articles_product2` FOREIGN KEY (`child`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
