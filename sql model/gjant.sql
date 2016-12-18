-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2016 a las 16:18:13
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
('vendor', '1', 1481508332),
('vendor', '17', 1481510739),
('vendor', '19', 1482068615),
('vendor', '20', 1482069380),
('vendor', '21', 1482069511),
('vendor', '22', 1482071345);

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
('/product-brand/*', 2, NULL, NULL, NULL, 1480900657, 1480900657),
('/product-brand/create', 2, NULL, NULL, NULL, 1480901120, 1480901120),
('/product-brand/delete', 2, NULL, NULL, NULL, 1480901121, 1480901121),
('/product-brand/index', 2, NULL, NULL, NULL, 1480901120, 1480901120),
('/product-brand/update', 2, NULL, NULL, NULL, 1480901121, 1480901121),
('/product-brand/view', 2, NULL, NULL, NULL, 1480901120, 1480901120),
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
('vendor', 1, NULL, NULL, NULL, 1480220049, 1480220049);

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
('Brand CRUD', '/brand/*'),
('Category CRUD', '/category/*'),
('client', 'site'),
('Client CRUD', '/client/*'),
('ClientWallet CRUD', '/client-wallet/*'),
('Employer CRUD', '/employer/*'),
('Product CRUD', '/product/*'),
('ProductBrand CRUD', '/product-brand/*'),
('ProductCategory CRUD', '/product-category/*'),
('register-user', '/site/register'),
('RelatedArticles CRUD', '/related-articles/*'),
('site', '/site/example'),
('site', '/site/index'),
('site', '/site/logout'),
('site', '/site/profile'),
('vendor', '/product/index'),
('vendor', 'site');

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
(1, 'Adidas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `identification` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone1` varchar(45) NOT NULL,
  `phone2` varchar(45) DEFAULT NULL,
  `credit_limit` double DEFAULT '0',
  `credit_use` double DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `fullname`, `identification`, `address`, `phone1`, `phone2`, `credit_limit`, `credit_use`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Victoria Monserrat Noguera Foster', '20819656', 'Flor amarillo', '+584145551123', '', 10, 0, 1481511538, 1481511538, 18);

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
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `identification` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employer`
--

INSERT INTO `employer` (`id`, `name`, `lastname`, `identification`, `address`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Cesar', 'Ramirez', '18412245', 'Carialinda', 1481510749, 1481510749, 17),
(2, 'Ivan', 'Giordano', '24330567', 'Los caobos', 1482068633, 1482068633, 19),
(3, 'Hugo Alejandro', 'Giordano Navas', '24330565', 'Los caobos', 1482069404, 1482069404, 20),
(4, 'Norma Johana', 'Romero Colina', '18412244', '', 1482069532, 1482069532, 21),
(5, 'Tamara Elena', 'Cusnier Albretch', '4426269', 'El parral', 1482071361, 1482071361, 22);

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
(10, 'Asignaciones', NULL, NULL, 8, NULL),
(11, 'Asignar categorías', 10, '/product-category/index', NULL, NULL),
(12, 'Asignar marcas', 10, '/product-brand/index', NULL, NULL),
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
(26, 'Articulos Relacionados', NULL, '/related-articles/index', 7, NULL);

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
(17, 'feanoro', '626c4cq_90x4oDPEJBUvkjvg5ojepk55', '$2y$13$Q4LB3aH4zR/ZtyhNfxJIRuZD8xDhjR3sk1/MPOOrRnysRBO0RJBAS', NULL, 'ers.cesar@gmail.com', 10, 'img/EBfDwQFaXS01AvhzcccVnpbFR9F_-enu.jpg', 'bffc98bf5424084d8ce9c2164a864403', 1481510739, 1481510739),
(18, 'monsefoster', '0EjT38x57QyG6etDWmZhSIII9eKmoU3t', '$2y$13$tg/cu0RCFqzsIjiMABtNL.4mOvWXH3TsG2r9pvZKQyZVztrngg8C2', NULL, 'monsefoster@gmail.com', 10, 'img/aEmTm9xGmQ10uBydFu5IgcPKI1x9bFR-.jpg', '38b800534a401f336ff4bfa2cec480f2', 1481511322, 1481511322),
(19, 'ivangn', '7A4p1yLxbSQ7ijtnlUjMy6npfmiY_hPC', '$2y$13$QVTBe3Z5jBKr4d6TZp1aoub75hFiC6cBFQahV/Ktn8F45FbPwAOSu', NULL, 'ign-jm@hotmail.com', 10, 'img/TBFbf-bU8Wnw3RahpqSbBjSvkNCS_UOt.jpg', '15f9cba86f27ad8615cddad7d99754f8', 1482068615, 1482068615),
(20, 'hag819', 's1TihGiBpLQXKwRlPAfy9hMdDZbZe2b0', '$2y$13$I9jsclm.bXbaLCY4ZmSYHOpvkKUSUSpuislXRE.ISI2oaweMFPbVG', NULL, 'hugo007_1234@hotmail.com', 10, 'img/KtHW3dT8FjlxyK5v7T3k0HNvRdY9bm-x.jpg', 'fa1a793f381745ac4763d6fbd35107b7', 1482069380, 1482069380),
(21, 'noromero1', 'g81PVbfWkjmYgGWJCqd-q26agR4JpLbr', '$2y$13$rfJruVwo/MRnpmtTk1Trye8ynyrccdn1aLwBkbVEXHWzvztQIe/P.', NULL, 'johanaromero@gmail.com', 10, NULL, 'bb241ca66d21269ae33f5bffebbda906', 1482069510, 1482069532),
(22, 'tcusnier', 'RrYW90gBJowE6KpBBQv-K_XC0M15BOPp', '$2y$13$kUyVs7GDS41A.GGeNVauD.Jqll1IYnKMoDDhzLFA8B72vamn7RL.C', NULL, 'tamaracusnier@hotmail.com', 10, 'img/fp5p6B_fsvJ1f9cpRuHEJneNa-LQXwxF.jpg', '9a0bc0b105c9ceed3a498763846df63d', 1482071345, 1482071361);

--
-- Índices para tablas volcadas
--

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
  ADD KEY `fk_client_user1_idx` (`user_id`);

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
  ADD KEY `fk_employer_user1_idx` (`user_id`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `client_wallet`
--
ALTER TABLE `client_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
  ADD CONSTRAINT `fk_employer_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
