-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-11-2022 a las 01:06:07
-- Versión del servidor: 5.7.33
-- Versión de PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_fusionlaser`
--
CREATE DATABASE IF NOT EXISTS `bd_fusionlaser` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_fusionlaser`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(10) NOT NULL,
  `categoria_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nombre`) VALUES
(1, 'Toner'),
(2, 'Tinta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `colores_id` int(11) NOT NULL,
  `colores_nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`colores_id`, `colores_nombre`) VALUES
(1, 'Magenta'),
(2, 'Negro'),
(3, 'Cian'),
(4, 'Amarillo'),
(5, 'Color');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(10) NOT NULL,
  `producto_modelo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `producto_impresora` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `producto_rendimiento` int(25) NOT NULL,
  `producto_precio` double(30,5) NOT NULL,
  `producto_stock` int(30) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `colores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`producto_id`, `producto_modelo`, `producto_impresora`, `producto_rendimiento`, `producto_precio`, `producto_stock`, `categoria_id`, `colores_id`) VALUES
(1, 'CE 278', 'Pro M1536/P1606', 2100, 13000.00000, 2, 1, 2),
(2, 'CF 279A', 'Pro M12a/ M12w /M26a /M26nw', 1000, 18000.00000, 2, 1, 2),
(3, 'CF 248A', 'Pro M15/ M28', 1000, 25000.00000, 4, 1, 2),
(4, 'CF 283A', 'Pro M125/M127/M201n/M201dw/M225dn/M225dw', 1500, 18000.00000, 4, 1, 2),
(5, 'Q 2612A', '1010/1020 - 3015/3020/3030/3050/3050z/3052/3055/ M1005 MFP', 2000, 14000.00000, 2, 1, 2),
(6, 'CE310', 'Pro CP1020', 1000, 18000.00000, 0, 1, 2),
(7, 'CE 311', 'Pro CP1020', 1000, 18000.00000, 0, 1, 3),
(8, 'CE 312', 'Pro CP1020', 1000, 18000.00000, 1, 1, 4),
(9, 'CE 313', 'Pro CP1020', 1000, 18000.00000, 1, 1, 1),
(10, 'CE 321', 'Pro CP1525 / MFP CM1415', 1300, 22000.00000, 1, 1, 3),
(11, 'CE 322', 'Pro CP1525 / MFP CM1415', 1300, 22000.00000, 1, 1, 4),
(12, 'CE 323', 'Pro CP1525 / MFP CM1415', 1300, 22000.00000, 1, 1, 1),
(13, 'CF 105/7', '107a/107w, MFP 135a/135w/137fnw/137fwg', 5000, 42000.00000, 3, 1, 2),
(14, 'CF 217A', 'Pro M102w/M102a, Pro MFP M130fn/ M130fw', 1600, 33000.00000, 2, 1, 2),
(15, 'CF 230', 'Pro M203/M227', 1600, 31800.00000, 2, 1, 2),
(16, 'CE 505A/CF 280A', 'p 2035/2055, Pro 400 M401/Pro 400 M425 MFP', 2500, 18000.00000, 1, 1, 2),
(17, 'Q 6000', '2600/2605/CM1015/CM1017', 2500, 24990.00000, 1, 1, 2),
(18, 'Q 6001', '2600/2605/CM1015/CM1017', 2000, 24990.00000, 1, 1, 3),
(19, 'Q 6002', '2600/2605/CM1015/CM1017', 2000, 24990.00000, 1, 1, 4),
(20, 'Q 6003', '2600/2605/CM1015/CM1017', 2000, 24990.00000, 1, 1, 1),
(21, 'CF 350', 'MFP Pro M176/177', 1300, 22000.00000, 1, 1, 2),
(22, 'CF 351', 'MFP Pro M176/177', 1000, 22000.00000, 1, 1, 3),
(23, 'CF 352', 'MFP Pro M176/177', 1000, 22000.00000, 1, 1, 4),
(24, 'CF 353', 'MFP Pro M176/177', 1000, 22000.00000, 1, 1, 1),
(25, 'CE 410A', 'Pro M351, M375, M451, M475', 2000, 24990.00000, 1, 1, 2),
(26, 'CE 411A', 'Pro M351, M375, M451, M475', 2600, 24990.00000, 0, 1, 3),
(27, 'CE 412A', 'Pro M351, M375, M451, M475', 2600, 24990.00000, 1, 1, 4),
(28, 'CE 413A', 'Pro M351, M375, M451, M475', 2600, 24990.00000, 1, 1, 1),
(29, 'TN 1060', 'HL-1110/1112 , DCP-1512 , MFC-1810/1815', 1000, 14000.00000, 9, 1, 2),
(30, 'TN 450', 'HL-2220/2230/2240/2240D/2270DW/2275DW/2280DW, MFC-7240/7290/7360/7360N/7365DN/7460DN/7860DW, DCP-706', 2600, 18000.00000, 4, 1, 2),
(31, 'TN2370', 'Hl-L2320D/L2360DW, DCP-L2520DW/L2540DW, MFC-L2700DW/L2720DW/L2740DW', 2600, 18000.00000, 5, 1, 2),
(32, 'TN 3479/880', 'HL-L6200dw/6200dwt/6250dw/6300dw/L6400dw/6400dwt, MFC-L6700dw/6750dw/6800dw/6900dw', 12000, 38000.00000, 1, 1, 2),
(33, 'TN 650', 'HL-5340D/5350DN/5370DW/5370DWY, MFC-8480DN/8890DW/8080DN/8085DN', 8000, 18000.00000, 1, 1, 2),
(34, 'D101S', 'ML-2850D/2851ND', 1500, 24000.00000, 3, 1, 2),
(35, 'D111S', 'Xpress M202x / Xpress M207x', 1000, 24000.00000, 2, 1, 2),
(36, 'D104S', 'ML-1660/1665/1670/1675/1860/1865/1865W, SCX-3200/3205/3205W', 1500, 24000.00000, 0, 1, 2),
(37, '122', 'deskjet 1000/105/2000/2050/3000/3050', 20, 17900.00000, 4, 2, 2),
(38, '122', 'deskjet 1000/105/2000/2050/3000/3050', 18, 18900.00000, 5, 2, 5),
(39, '662', 'deskjet ink advantaje 1015/1515/2545/2645/3545', 23, 18200.00000, 4, 2, 2),
(40, '662', 'deskjet ink advantaje 1015/1515/2545/2645/3545', 18, 19500.00000, 4, 2, 5),
(41, '664', 'Deskjet Ink Advantage 1115/1118/2135/2136/2138/3635/3635/3636/3638/3835/3836/3838/4535/4536/4538/467', 21, 20900.00000, 2, 2, 2),
(42, '664', 'Deskjet Ink Advantage 1115/1118/2135/2136/2138/3635/3635/3636/3638/3835/3836/3838/4535/4536/4538/467', 21, 21900.00000, 5, 2, 5),
(43, '667', 'Deskjet Plus Ink Advantage 6000/6400, Deskjet Ink Advantage 1200/2300/2700/4100', 22, 22400.00000, 2, 2, 2),
(44, '667', 'Deskjet Plus Ink Advantage 6000/6400, Deskjet Ink Advantage 1200/2300/2700/4100', 21, 25600.00000, 2, 2, 5),
(45, '60', 'D110 / D1660 / D2530 / D2545 / D2560 / D2660 / D2680 / D5545 / D5560 / F2430 / F2480 / F4210 / F4235', 20, 16900.00000, 1, 2, 2),
(46, '60', 'D110 / D1660 / D2530 / D2545 / D2560 / D2660 / D2680 / D5545 / D5560 / F2430 / F2480 / F4210 / F4235', 18, 18900.00000, 0, 2, 5),
(47, '21', 'Deskjet 3910, 3920, 3930, 3940, D1311, D1320, D1330, D1341, D1360, D1420, D1430, D1445, D1455, D1460', 23, 15900.00000, 1, 2, 2),
(48, '22', 'Deskjet 3910, 3920, 3930, 3940, D1311, D1320, D1330, D1341, D1360, D1420, D1430, D1445, D1455, D1460', 22, 17900.00000, 1, 2, 5),
(49, '950', 'OfficeJet Pro 8100/8600/8600Plus/251dw/276dw/8610/8615/8620/8625/8630/8640/8660', 75, 10000.00000, 2, 2, 2),
(50, '951C', 'OfficeJet Pro 8100/8600/8600Plus/251dw/276dw/8610/8615/8620/8625/8630/8640/8660', 26, 10000.00000, 2, 2, 3),
(51, '951M', 'OfficeJet Pro 8100/8600/8600Plus/251dw/276dw/8610/8615/8620/8625/8630/8640/8660', 26, 10000.00000, 2, 2, 1),
(52, '951Y', 'OfficeJet Pro 8100/8600/8600Plus/251dw/276dw/8610/8615/8620/8625/8630/8640/8660', 26, 10000.00000, 2, 2, 4),
(53, '670', 'Deskjet Ink Advantaje 4615/4625/3525/5525/6525', 21, 8000.00000, 2, 2, 2),
(54, '670C', 'Deskjet Ink Advantaje 4615/4625/3525/5525/6525', 14, 9000.00000, 2, 2, 3),
(55, '670M', 'Deskjet Ink Advantaje 4615/4625/3525/5525/6525', 14, 9000.00000, 2, 2, 1),
(56, '670Y', 'Deskjet Ink Advantaje 4615/4625/3525/5525/6525', 14, 9000.00000, 2, 2, 4),
(57, '195/196/197', 'xp-101/201/204/401/214', 13, 4900.00000, 3, 2, 2),
(58, '196C', 'xp-101/201/204/401/214', 11, 4900.00000, 3, 2, 3),
(59, '196M', 'xp-101/201/204/401/214', 11, 4900.00000, 3, 2, 1),
(60, '196Y', 'xp-101/201/204/401/214', 11, 4900.00000, 3, 2, 4),
(61, '2971', 'XP-231/431', 17, 8900.00000, 2, 2, 2),
(62, '2962C', 'XP-231/431', 13, 8900.00000, 2, 2, 3),
(63, '2963M', 'XP-231/431', 13, 8900.00000, 2, 2, 1),
(64, '2964Y', 'XP-231/431', 13, 8900.00000, 2, 2, 4),
(65, '145', 'IP2810/MG2410/MG2510/MG2910', 15, 16900.00000, 0, 2, 2),
(66, '146', 'IP2810/MG2410/MG2510/MG2910', 16, 17900.00000, 1, 2, 5),
(67, '44', 'E481/E471/E402/E401/E4210/E3110/E301/E201', 15, 17900.00000, 0, 2, 2),
(68, '54', 'E481/E471/E402/E401/E4210/E3110/E301/E201', 13, 18900.00000, 2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(10) NOT NULL,
  `usuario_nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_apellido` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_usuario` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_email` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_rut` int(10) NOT NULL,
  `usuario_direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `usuario_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_usuario`, `usuario_clave`, `usuario_email`, `usuario_rut`, `usuario_direccion`, `usuario_admin`) VALUES
(1, 'Cristian', 'DÃ­az', 'cidiks', '$2y$10$z/4iGSyCUsLZCT8tUsyyYOYehBiLdZF0F/QT2xW9UPstLQVPYXW12', 'cidiks98@gmail.com', 198419486, 'romero 2385', 1),
(2, 'kodak', 'perez', 'kodak', '$2y$10$N.DiW1xV7YHJyWkqVHzGDeQDlR2c3Dms8Rf78rGNXcHdDHSW9c1em', 'kodak@gmail.com', 101010101, 'nose', 0),
(3, 'Admin', 'Principal', 'admin', '$2y$10$qtt6iR2ftRT4BIzV9mK7heO8tQRn8Cgf5uL2iMI0ubb2iHTMoCSQW', 'admin@gmail.com', 186904539, 'Romero 1508', 1),
(4, 'cliente', 'uno', 'cliente', '$2y$10$4Kd3g.MFtpuRksX3TVX51OMT45OnYiz1IRmZPKIQdMtQk0Qul/LLS', 'cliente@gmail.com', 198419485, 'cliente', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`colores_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`) USING BTREE,
  ADD KEY `producto_ibfk_2` (`colores_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `colores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`colores_id`) REFERENCES `colores` (`colores_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
