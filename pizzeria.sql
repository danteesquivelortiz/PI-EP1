-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2017 a las 02:21:35
-- Versión del servidor: 5.5.52-log
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pizzeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Pizzas', 'Pizzas al estilo italiano'),
(2, 'Pastas', 'Pastas al estilo italiano'),
(3, 'Ensaladas', 'Ensaladas al estilo italiano'),
(4, 'Bebidas', 'Bebidas al estilo italiano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'Miguel', 'Av. Roble verde #15 col. Delfines', NULL),
(2, 'admin', 'upe', '7771123537'),
(3, 'dante', 'root', '7771123537');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `fecha`, `cliente_id`, `estado`) VALUES
(1, '2017-05-18', 1, 'Pendiente'),
(2, '2017-05-28', 3, NULL),
(3, '2017-05-28', 3, NULL),
(4, '2017-05-28', 3, NULL),
(5, '2017-05-28', 3, NULL),
(6, '2017-05-28', 3, NULL),
(7, '2017-05-28', 3, NULL),
(8, '2017-05-28', 3, NULL),
(9, '2017-05-28', 3, NULL),
(10, '2017-05-28', 3, NULL),
(11, '2017-05-28', 3, NULL),
(12, '2017-05-28', 3, NULL),
(13, '2017-05-28', 3, NULL),
(14, '2017-05-28', 3, NULL),
(15, '2017-05-28', 3, NULL),
(16, '2017-05-28', 3, NULL),
(17, '2017-05-28', 3, NULL),
(18, '2017-05-28', 3, NULL),
(19, '2017-05-28', 3, NULL),
(20, '2017-05-28', 3, NULL),
(21, '2017-05-28', 3, NULL),
(22, '2017-05-28', 3, NULL),
(23, '2017-05-28', 3, NULL),
(24, '2017-05-28', 3, NULL),
(25, '2017-05-28', 3, NULL),
(26, '2017-05-28', 3, NULL),
(27, '2017-05-28', 3, NULL),
(28, '2017-05-28', 3, NULL),
(29, '2017-05-28', 3, NULL),
(30, '2017-05-28', 3, NULL),
(31, '2017-05-28', 3, NULL),
(32, '2017-05-28', 3, NULL),
(33, '2017-05-28', 3, NULL),
(34, '2017-05-28', 3, NULL),
(35, '2017-05-28', 3, NULL),
(36, '2017-05-28', 3, NULL),
(37, '2017-05-28', 3, NULL),
(38, '2017-05-28', 3, NULL),
(39, '2017-05-28', 3, NULL),
(40, '2017-05-28', 3, NULL),
(41, '2017-05-28', 3, NULL),
(42, '2017-05-28', 3, NULL),
(43, '2017-05-28', 3, NULL),
(44, '2017-05-28', 3, NULL),
(45, '2017-05-28', 3, NULL),
(46, '2017-05-28', 3, NULL),
(47, '2017-05-28', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`id`, `pedido_id`, `producto_id`, `cantidad`) VALUES
(1, 1, 1, 3),
(2, 1, 3, 1),
(3, 2, 1, 2),
(4, 2, 3, 1),
(5, 3, 1, 2),
(6, 4, 1, 2),
(7, 5, 4, 2),
(8, 6, 1, 3),
(9, 7, 1, 3),
(10, 8, 2, 2),
(11, 8, 4, 2),
(12, 8, 3, 1),
(13, 9, 1, 1),
(14, 10, 3, 1),
(15, 10, 4, 2),
(16, 11, 2, 2),
(17, 11, 3, 1),
(18, 12, 2, 2),
(19, 13, 4, 2),
(20, 14, 2, 5),
(21, 14, 3, 2),
(22, 15, 6, 3),
(23, 15, 14, 2),
(24, 16, 15, 1),
(25, 16, 14, 2),
(26, 16, 8, 2),
(27, 17, 12, 2),
(28, 17, 9, 1),
(29, 18, 13, 2),
(30, 18, 10, 2),
(31, 19, 8, 1),
(32, 19, 10, 1),
(33, 20, 8, 1),
(34, 20, 10, 1),
(35, 21, 15, 2),
(36, 21, 14, 1),
(37, 22, 17, 2),
(38, 23, 11, 2),
(39, 23, 10, 1),
(40, 24, 6, 2),
(41, 25, 6, 2),
(42, 26, 16, 2),
(43, 26, 13, 1),
(44, 27, 16, 2),
(45, 27, 11, 1),
(46, 27, 10, 2),
(47, 27, 8, 1),
(48, 28, 13, 2),
(49, 28, 8, 1),
(50, 29, 11, 2),
(51, 29, 10, 1),
(52, 30, 17, 1),
(53, 30, 7, 1),
(54, 31, 12, 2),
(55, 31, 8, 1),
(56, 32, 17, 1),
(57, 32, 6, 1),
(58, 32, 10, 2),
(59, 33, 17, 1),
(60, 33, 14, 1),
(61, 34, 15, 1),
(62, 34, 17, 1),
(63, 34, 9, 1),
(64, 35, 12, 1),
(65, 35, 3, 1),
(66, 36, 17, 1),
(67, 36, 18, 1),
(68, 36, 15, 1),
(69, 37, 6, 1),
(70, 37, 12, 2),
(71, 38, 6, 1),
(72, 39, 15, 1),
(73, 40, 16, 2),
(74, 41, 16, 2),
(75, 42, 12, 2),
(76, 43, 15, 1),
(77, 44, 9, 2),
(78, 44, 10, 2),
(79, 45, 17, 1),
(80, 46, 12, 1),
(81, 47, 16, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `precio` decimal(6,2) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `categoria_id`) VALUES
(1, 'Pizza hawaiana', 'Pizza con jamón y piña', '140.00', 1),
(2, 'Pizza mexicana', 'Pizza con frijoles, chile, chorizo', '150.00', 1),
(3, 'Refresco de 2 litros', 'Coca cola 2 litros', '30.00', 4),
(4, 'Ensalada de la casa', 'Ensalada con las mejores hojas verdes y aderezos de la casa', '100.00', 3),
(6, 'Pizza Hawaiana', 'Pizza con jamón y piña.', '150.00', 1),
(7, 'Pasta Linguini a la amatriciana', 'Pasta italiana con tocino dorado, jitomate, cebolla y albahaca con un toque ligeramente picante.', '200.00', 2),
(8, 'Pasta Fetuccini', 'Pasta italiana con crema de pollo y champiñones', '200.00', 2),
(9, 'Pasta Lasagna', 'Pasta italiana con una mezcla de salchicha italiana y carne molida de res en una salsa de jitomate. La mezcla se alterna con hojas de lasagna, requesón y queso mozzarela.', '250.00', 2),
(10, 'Refresco Manzanita', 'Refresco sabor manzana', '30.00', 4),
(11, 'Ensaladilla de zanahoria y nabo', 'Una de las ensaladas más populares del verano es la ensaladilla rusa y con esta receta le damos un giro usando nabos en vez de patatas y cambiando la mayonesa por un poco de nata.', '100.00', 3),
(12, 'Ensaladilla de pollo y aguacate', 'Nuestra versión particular de la causa limeña, una ensaladilla de patata, aguacate y pollo que está para chuparse los dedos y que tiene una presentación de 10', '100.00', 3),
(13, 'Ensalada César con pollo', 'Una ensalada de renombre que sirve como plato único.', '100.00', 3),
(14, 'Refresco Fanta', 'Refresco sabor mandarina', '30.00', 4),
(15, 'Pizza a la francesa', 'Toda una experiencia de vegetales, sobre la masa, la vedette es la cebollas rehogadas, tomillo, aceitunas negras y una decoración  de anchos para resaltar el sabor y condimentada con pimienta negra recién molida, simplemente irresistible.', '180.00', 1),
(16, 'Pizza de patatas a la italiana', 'Sobre la clásica masa de pizza los italianos innovaron en colocarle un relleno bastante particular, papas cortadas con mandolina, mezcladas cebolla, pimienta negra y oliva todo este relleno es colocado sobre la masa y llevado al horno.', '180.00', 1),
(17, 'Pizza a la española', 'Espectacular por donde se la mire, esta pizza lleva de todo chorizo cantimpalo, chorizo candelario, salsa de tomate, un buen queso mantecoso, pimetón, albahaca fresca y aceite de oliva. ', '180.00', 1),
(18, 'Pizza a la alemana', 'Una opción tradicional ideal para acompañar con una cerveza, el relleno lleva una salsa de tomate espesa, el conocido embutido de hígado, leber wurst, al que se le saca la piel y se lo pisa hasta quedar como un puré para cubrir la masa y se decora con rodajas de salchichón y hiervas aromáticas.', '180.00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_cliente_idx` (`cliente_id`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pproducto_producto_idx` (`producto_id`),
  ADD KEY `pproducto_pedido_idx` (`pedido_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_categoria_idx` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `pproducto_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pproducto_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
