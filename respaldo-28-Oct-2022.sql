-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: sql5c75f.carrierzone.com
-- Tiempo de generación: 28-10-2022 a las 10:34:44
-- Versión del servidor: 5.7.31-log
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bodega_aluxsacomm742625`
--
CREATE DATABASE IF NOT EXISTS `bodega_aluxsacomm742625` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bodega_aluxsacomm742625`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_Categoria` int(11) NOT NULL,
  `Descripcion` varchar(61) CHARACTER SET latin1 NOT NULL,
  `Material` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_Categoria`, `Descripcion`, `Material`) VALUES
(2, 'VERTICAL RECTO', 'CARBURO'),
(4, 'VERTICAL BOLA', 'CARBURO'),
(7, 'VERTICAL RECTO', 'ACERO ALTA VELOCIDAD'),
(15, 'SEMI CONICO', 'ACERO ALTA VELOCIDAD'),
(16, 'PUNTA NORMAL', 'ACERO ALTA VELOCIDAD '),
(31, 'CORTE DE VIRUTA RECTO', 'ACERO ALTA VELOCIDAD'),
(54, 'NPT', 'ACERO ALTA VELOCIDAD'),
(55, 'CORTE 90 GRADOS', 'CARBURO'),
(56, 'CENTRO', 'ACERO ALTA VELOCIDAD'),
(57, 'AZUL IZQUIERDO', 'CARBURO'),
(58, 'AZUL DERECHO ', 'CARBURO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_solicitud`
--

CREATE TABLE `detalle_solicitud` (
  `id_D_Solicitud` int(11) NOT NULL,
  `id_Herramientas` int(11) NOT NULL,
  `id_Maquina` int(11) NOT NULL,
  `id_Solicitud` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_solicitud`
--

INSERT INTO `detalle_solicitud` (`id_D_Solicitud`, `id_Herramientas`, `id_Maquina`, `id_Solicitud`, `Cantidad`) VALUES
(3, 1, 3, 4, 2),
(5, 18, 3, 6, 1),
(6, 17, 3, 8, 1),
(7, 32, 3, 9, 2),
(9, 5, 3, 10, 1),
(10, 39, 1, 11, 1),
(11, 78, 2, 12, 1),
(12, 76, 3, 13, 1),
(13, 125, 3, 14, 1),
(14, 19, 3, 16, 1),
(15, 36, 3, 16, 2),
(16, 119, 3, 16, 1),
(17, 60, 3, 17, 1),
(18, 127, 3, 18, 1),
(19, 87, 3, 19, 1),
(20, 92, 3, 19, 1),
(22, 11, 3, 20, 1),
(23, 102, 2, 21, 1),
(24, 32, 2, 22, 3),
(25, 32, 1, 23, 2),
(26, 104, 7, 24, 2),
(27, 78, 3, 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_Empleado` int(11) NOT NULL,
  `Nombre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Apellidos` varchar(45) CHARACTER SET latin1 NOT NULL,
  `N_Empleado` int(21) NOT NULL,
  `Sexo` varchar(51) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_Empleado`, `Nombre`, `Apellidos`, `N_Empleado`, `Sexo`) VALUES
(4, 'Ing Angel ', 'Sandoval', 54, 'Hombre'),
(6, 'Ing Angel ', 'Sandoval', 54, 'Hombre'),
(7, 'Gonzalo', 'Rocha', 51, 'Hombre'),
(8, 'Gonzalo', 'Rocha', 51, 'Hombre'),
(9, 'Gonzalo', 'Rocha', 51, 'Hombre'),
(10, 'Gonzalo', 'Rocha', 51, 'Hombre'),
(11, 'Mauricio', 'Bautista', 0, 'Hombre'),
(12, 'Gonzalo', 'Rocha', 51, 'Hombre'),
(13, 'Gabriel', 'Romero', 52, 'Hombre'),
(14, 'Gonzalo', 'Rocha', 51, 'Hombre'),
(15, 'Costantino', 'M', 131, 'Hombre'),
(16, 'Ing Angel ', 'Sandoval', 54, 'Hombre'),
(17, 'Costantino', 'M', 131, 'Hombre'),
(18, 'Mauricio', 'Bautista', 0, 'Hombre'),
(19, 'Gonzalo', 'Rocha', 51, 'Hombre'),
(20, 'Gonzalo', 'Rocha', 51, 'Hombre'),
(21, 'Julio', 'Rojas', 113, 'Hombre'),
(22, 'Jahir de Jesus', 'ESCALANTE', 500, 'Hombre'),
(23, 'Jahir de Jesus', 'ESCALANTE', 500, 'Hombre'),
(24, 'Rolando', 'Reyes ', 0, 'Hombre'),
(25, 'Gonzalo', 'Rocha', 51, 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gavilanes`
--

CREATE TABLE `gavilanes` (
  `id_Gav` int(11) NOT NULL,
  `Num_gavilanes` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gavilanes`
--

INSERT INTO `gavilanes` (`id_Gav`, `Num_gavilanes`) VALUES
(1, 2),
(2, 4),
(3, 6),
(4, 0),
(5, 1),
(6, 7),
(7, 3),
(8, 5),
(9, 8),
(10, 9),
(11, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `id_Herramienta` int(11) NOT NULL,
  `id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(71) CHARACTER SET latin1 NOT NULL,
  `id_Gavilanes` int(11) NOT NULL,
  `id_Medidas` int(11) NOT NULL,
  `Cantidad_Minima` int(11) NOT NULL,
  `Cantidad` int(21) NOT NULL,
  `rutaimg` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fecha_Hora` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`id_Herramienta`, `id_Categoria`, `Nombre`, `id_Gavilanes`, `id_Medidas`, `Cantidad_Minima`, `Cantidad`, `rutaimg`, `Fecha_Hora`) VALUES
(1, 2, 'Cortador', 2, 18, 3, 3, 'img2/imgid1.jpg', '2022-08-05'),
(3, 2, 'Cortador', 2, 17, 4, 10, 'img2/imgid3.jpg', '2022-10-04'),
(5, 2, 'Cortador', 2, 14, 3, 3, 'img2/imgid6.jpg', '2022-08-31'),
(6, 2, 'Cortador', 2, 21, 3, 5, 'img2/imgid7.jpg', '2022-08-05'),
(7, 2, 'Cortador', 2, 22, 3, 3, 'img2/imgid8.jpg', '2022-08-31'),
(8, 7, 'Cortador', 2, 23, 2, 4, 'img2/imgid9.jpg', '2022-04-06'),
(9, 7, 'Cortador', 2, 85, 2, 2, 'img2/imgid10.jpg', '2022-04-06'),
(11, 2, 'Cortador', 2, 26, 3, 3, 'img2/imgid12.jpg', '2022-08-05'),
(12, 4, 'Cortador', 2, 14, 2, 3, 'img2/imgid13.jpg', '2022-08-05'),
(13, 4, 'Cortador', 2, 30, 3, 6, 'img2/imgid14.jpg', '2022-08-04'),
(14, 4, 'Cortador', 1, 18, 3, 3, 'img2/imgid15.jpg', '2022-08-05'),
(15, 4, 'Cortador', 2, 27, 2, 2, 'img2/imgid16.jpg', '2022-08-05'),
(16, 4, 'Cortador', 2, 17, 3, 3, 'img2/imgid17.jpg', '2022-08-04'),
(17, 4, 'Cortador', 1, 17, 1, 2, 'img2/imgid18.jpg', '2022-08-05'),
(18, 4, 'Cortador', 2, 18, 3, 3, 'img2/imgid19.jpg', '2022-08-04'),
(19, 4, 'Cortador', 2, 7, 3, 3, 'img2/imgid20.jpg', '2022-10-04'),
(20, 4, 'Cortador', 2, 5, 2, 1, 'img2/imgid21.jpg', '2022-07-11'),
(25, 2, 'Cortador', 2, 42, 1, 1, 'img2/10mm.jpg', '2022-07-08'),
(30, 2, 'Cortador', 2, 45, 1, 1, 'img2/20m.jpg', '2022-07-08'),
(32, 15, 'Machuelo', 2, 47, 7, 0, 'img2/machuelom3.jpg', '2022-08-05'),
(33, 2, 'Cortador', 2, 30, 3, 3, 'img2/cortador18x12.jpg', '2022-08-04'),
(35, 2, 'Cortador', 2, 7, 4, 4, 'img2/c2.5x3.jpg', '2022-08-05'),
(36, 15, 'Machuelo', 2, 48, 5, 5, 'img2/machuelom4.jpg', '2022-10-04'),
(37, 16, 'Broca', 1, 51, 2, 4, 'img2/broca316.jpg', '2022-08-05'),
(38, 16, 'Broca', 1, 52, 5, 11, 'img2/broca30.jpg', '2022-08-22'),
(39, 16, 'Broca', 1, 53, 4, 13, 'img2/broca25m.jpg', '2022-08-30'),
(42, 16, 'Broca ', 1, 54, 4, 4, 'img2/broca36.jpg', '2022-08-05'),
(47, 2, 'Cortador', 2, 5, 2, 1, 'img2/cortador12x6.jpg', '2022-08-05'),
(51, 2, 'Cortador', 2, 49, 1, 1, 'img2/18x3.jpg', '2022-07-19'),
(52, 31, 'Cortador', 2, 85, 2, 2, 'img2/cortadorviruta.jpg', '2022-07-19'),
(54, 2, 'Cortador', 2, 84, 2, 1, 'img2/cortador6L.jpg', '2022-07-19'),
(60, 15, 'Machuelo', 2, 132, 3, 3, 'img2/20220727_121925.jpg', '2022-10-04'),
(64, 15, 'Machuelo', 2, 134, 3, 4, 'img2/m3-8-16.1659384923.jpg', '2022-08-05'),
(65, 4, 'Cortador', 2, 83, 1, 2, 'img2/cortadorbola14inx4in.1659548311.jpg', '2022-08-03'),
(73, 4, 'Cortador', 2, 84, 2, 1, 'img2/cortadorbola38inx6in.1659636288.jpg', '2022-08-04'),
(74, 2, 'Cortador', 1, 136, 2, 2, 'img2/cortadorrecto6in.1659971071.jpg', '2022-08-08'),
(75, 2, 'Cortador', 2, 135, 2, 2, 'img2/cortador3-8x4.1659971635.jpg', '2022-08-08'),
(76, 54, 'Machuelo', 2, 140, 3, 3, 'img2/machuelo.1660930011.jpg', '2022-10-04'),
(78, 55, 'Avellanador', 2, 143, 3, 2, 'img2/avellanador.1661185352.jpg', '2022-10-04'),
(79, 56, 'Broca', 1, 144, 3, 3, 'img2/broca_centro.1661363808.jpg', '2022-08-24'),
(82, 16, 'Broca', 1, 146, 2, 2, 'img2/broca5_80.1661376081.jpg', '2022-08-24'),
(83, 16, 'Broca', 1, 147, 5, 8, 'img2/broca3_25-min.1661378328.jpg', '2022-08-24'),
(86, 16, 'Broca', 1, 149, 2, 3, 'img2/broca_6m.1661441518.jpg', '2022-08-25'),
(87, 16, 'Broca', 1, 150, 3, 4, 'img2/broca_10-5m.1661441825.jpg', '2022-10-04'),
(88, 16, 'Broca', 1, 151, 2, 2, 'img2/broca_19-64.1661441970.jpg', '2022-10-04'),
(89, 16, 'Broca', 1, 5, 2, 4, 'img2/broca_1-2inx6in.1661445172.jpg', '2022-08-25'),
(90, 16, 'Broca', 1, 152, 2, 2, 'img2/broca-17-64in.1661445753.jpg', '2022-08-25'),
(92, 16, 'Broca', 1, 155, 2, 1, 'img2/broca-5-3mm.1661446191.jpg', '2022-10-04'),
(93, 16, 'Broca', 1, 156, 3, 5, 'img2/broca-4-5mm.1661446499.jpg', '2022-08-25'),
(94, 16, 'Broca', 1, 157, 3, 6, 'img2/broca-7-64 (fileminimizer)-min.1661454915.jpg', '2022-08-25'),
(95, 16, 'Broca', 1, 158, 3, 3, 'img2/broca-7-32 (fileminimizer)-min.1661455043.jpg', '2022-10-04'),
(96, 16, 'Broca', 1, 159, 3, 3, 'img2/broca-5-32 (fileminimizer)-min.1661455130.jpg', '2022-08-25'),
(97, 16, 'Broca', 1, 160, 2, 3, 'img2/broca-13-64 (fileminimizer)-min.1661455311.jpg', '2022-08-25'),
(98, 16, 'Broca', 1, 161, 2, 5, 'img2/broca-11-64 (fileminimizer)-min.1661455539.jpg', '2022-08-25'),
(99, 16, 'Broca', 1, 162, 5, 10, 'img2/broca-1-8 (fileminimizer)-min.1661455651.jpg', '2022-08-25'),
(100, 16, 'Broca', 1, 163, 5, 8, 'img2/broca-1-4 (fileminimizer)-min.1661455750.jpg', '2022-08-25'),
(101, 16, 'Broca', 1, 164, 2, 3, 'img2/broca-5-16 (fileminimizer)-min.1661455843.jpg', '2022-08-25'),
(102, 16, 'Broca', 1, 165, 3, 4, 'img2/broca-3-8hss (fileminimizer)-min.1661455926.jpg', '2022-10-04'),
(103, 16, 'Broca', 1, 166, 2, 2, 'img2/broca-7-16 (fileminimizer)-min.1661456103.jpg', '2022-10-04'),
(104, 16, 'Broca', 1, 167, 4, 0, 'img2/broca-9-64 (fileminimizer)-min.1661456232.jpg', '2022-08-25'),
(105, 16, 'Broca', 1, 168, 2, 2, 'img2/broca-8mm-4-5 (fileminimizer)-min.1661457148.jpg', '2022-10-04'),
(107, 16, 'Broca', 1, 170, 2, 5, 'img2/broca-3m (fileminimizer)-min.1661457514.jpg', '2022-08-25'),
(108, 16, 'Broca', 1, 171, 2, 3, 'img2/broca-11-16in (fileminimizer)-min.1661457702.jpg', '2022-08-25'),
(109, 56, 'Broca', 1, 172, 3, 3, 'img2/broca#4-min.1661463746.jpg', '2022-10-04'),
(112, 56, 'Broca', 1, 174, 5, 5, 'img2/broca#1-min.1661464447.jpg', '2022-10-04'),
(113, 56, 'Broca', 1, 173, 3, 3, 'img2/brocan3-min.1661464637.jpg', '2022-10-04'),
(115, 15, 'Machuelo', 2, 176, 3, 0, 'img2/machuelo_3-16-min.1661466048.jpg', '2022-08-25'),
(119, 15, 'Machuelo', 2, 180, 2, 2, 'img2/img_20220826_165300 (fileminimizer)-min.1661812301.jpg', '2022-10-04'),
(120, 15, 'Machuelo', 2, 181, 1, 1, 'img2/img_20220805_153352_hdr (fileminimizer).1661876672.jpg', '2022-08-30'),
(122, 15, 'Machuelo', 2, 137, 1, 3, 'img2/img_20220831_161103-min (fileminimizer).1661980919.jpg', '2022-08-31'),
(125, 57, 'Buril', 4, 182, 3, 1, 'img2/buril_izquierdo3-4 (fileminimizer)-min.1661984431.jpg', '2022-10-04'),
(127, 58, 'Buril', 4, 182, 2, 3, 'img2/buril_derecho(fileminimizer)-min.1661984680.jp', '2022-10-04'),
(128, 16, 'Broca', 1, 183, 3, 3, 'img2/broca-para-metal-hss-5-64.1663948143.jpg', '2022-10-04'),
(132, 2, 'Cortador', 2, 184, 2, 0, 'img2/cortador-7-16in.1666645073.jpg', '2022-10-24'),
(133, 4, 'Cortador', 2, 136, 2, 0, 'img2/cortador-1-4in-bola.1666647342.jpg', '2022-10-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria`
--

CREATE TABLE `maquinaria` (
  `id_Maquinaria` int(11) NOT NULL,
  `Nombre` varchar(61) CHARACTER SET latin1 NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `En uso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `maquinaria`
--

INSERT INTO `maquinaria` (`id_Maquinaria`, `Nombre`, `Cantidad`, `En uso`) VALUES
(1, 'Torno', 5, 3),
(2, 'Fresadora', 2, 1),
(3, 'Centro de Maquinado', 3, 2),
(4, 'Cierra Radeal', 3, 1),
(5, 'Cierra de Banco', 3, 3),
(6, 'Soldadora Micro-alambre ', 1, 1),
(7, 'Taladro', 2, 1),
(8, 'Soldadora Tif', 1, 1),
(9, 'Lija Vertical', 1, 1),
(10, 'Plasma CNC', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id_Medidas` int(11) NOT NULL,
  `Ancho` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `Largo` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id_Medidas`, `Ancho`, `Largo`) VALUES
(5, '1/2in', '6in'),
(7, '1/2in', '3in'),
(14, '3/16in', '2in'),
(17, '1/4in', '2 1/2in'),
(18, '3/8in', '2 1/2in'),
(21, '3/32in', '1 1/2in'),
(22, '3.50mm', '38mm'),
(23, '5.00mm', 'NULL'),
(24, '5/8in', '5/8in'),
(25, '8.00mm', '64mm'),
(26, '8.00mm', '63mm'),
(27, '5/16in', '2 1/2in'),
(30, '1/8in', '1 1/2in'),
(38, '7/9in', '6/8in'),
(42, '9mm', '70mm'),
(45, '20mm', '100mm'),
(46, '#30', '1/2in'),
(47, 'M3 x 0.5', 'N/A'),
(48, 'M4 x 0.7', 'N/A'),
(49, '1/8in', '3in'),
(51, '3/16in', 'N/A'),
(52, '#30', 'N/A'),
(53, '2.5mm', 'N/A'),
(54, '#36', 'N/A'),
(55, '1/8x1/2', '1 1/2in'),
(56, '3/8in', '2 1/2in'),
(83, '1/4in', '4in'),
(84, '3/8in', '6in'),
(85, '5/8in', '3/4in'),
(86, '2.5mm', '38mm'),
(131, '1/4', '20'),
(132, '1/4in-20', 'N/A'),
(134, '3/8in-16', 'N/A'),
(135, '3/8in', '4in'),
(136, '1/4in', '6in'),
(137, 'M8', '1.25'),
(140, '1/8inx27in', 'N/A'),
(141, '3/32in', '2.5in'),
(143, '3/4in X 3/8', 'N/A'),
(144, '#5', 'N/A'),
(145, '5mm', 'N/A'),
(146, '5.80mm', 'N/A'),
(147, '3.25mm', 'N/A'),
(148, '8mm x 6 1/2', 'N/A'),
(149, '6mm', 'N/A'),
(150, '10.5mm', 'N/A'),
(151, '19/64in', 'N/A'),
(152, '17/64in', 'N/A'),
(155, '5.3mm', 'N/A'),
(156, '4.5mm', 'N/A'),
(157, '7/64in', 'N/A'),
(158, '7/32in', 'N/A'),
(159, '5/32in', 'N/A'),
(160, '13/64in', 'N/A'),
(161, '11/64in', 'N/A'),
(162, '1/8in', 'N/A'),
(163, '1/4in', 'N/A'),
(164, '5/16in', 'N/A'),
(165, '3/8in', 'N/A'),
(166, '7/16in', '5 1/2in'),
(167, '9/64in', 'N/A'),
(168, '8mm', '117mm'),
(169, '3/32in', 'N/A'),
(170, '3mm', 'N/A'),
(171, '11/64inx1/2', '6/4in'),
(172, '#4', 'N/A'),
(173, '#3', 'N/A'),
(174, '#1', 'N/A'),
(175, '1/4in', 'N/A'),
(176, '3/16in', 'N/A'),
(178, '1/2in', 'N/A'),
(179, '5/16', '18'),
(180, '1/2in-13in', 'N/A'),
(181, '5/16in-18', 'N/A'),
(182, '3/4in', 'N/A'),
(183, '5/64 in', '2 1/2 in'),
(184, '7/16 in', '4 in');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_Solicitud` int(11) NOT NULL,
  `id_Empleado` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_Solicitud`, `id_Empleado`, `Fecha`) VALUES
(4, 4, '2022-07-12'),
(6, 6, '2022-07-12'),
(7, 7, '2022-07-14'),
(8, 8, '2022-07-14'),
(9, 9, '2022-07-14'),
(10, 10, '2022-08-15'),
(11, 11, '2022-08-22'),
(12, 12, '2022-08-30'),
(13, 13, '2022-09-01'),
(14, 14, '2022-09-01'),
(15, 15, '2022-09-08'),
(16, 16, '2022-09-14'),
(17, 17, '2022-09-20'),
(18, 18, '2022-10-04'),
(19, 19, '2022-10-04'),
(20, 20, '2022-10-20'),
(21, 21, '2022-10-21'),
(22, 22, '2022-10-21'),
(23, 23, '2022-10-24'),
(24, 24, '2022-10-25'),
(25, 25, '2022-10-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_us` int(11) NOT NULL,
  `Nombre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Apellidos` varchar(45) CHARACTER SET latin1 NOT NULL,
  `user` varchar(45) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Num_empleado` int(101) NOT NULL,
  `Estado` varchar(8) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_us`, `Nombre`, `Apellidos`, `user`, `pass`, `Num_empleado`, `Estado`) VALUES
(1, 'Gerardo ', 'Jimenez Castillo', 'admin', '*93BFFA0A3A982BC0CEB8A888949D03363F5335B4', 244, 'Activo'),
(3, 'Ángel Isabi', 'Sandoval López', 'angel', '*3689CB51EE0C2BFFBDD4742588C089A3A23E318E', 54, 'Activo'),
(7, 'Paz', 'Puentes Ramí­rez', 'almacen', '*4BA058F71421E09180922DEC4EBA7FE3A51162A5', 37, 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_Categoria`);

--
-- Indices de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD PRIMARY KEY (`id_D_Solicitud`),
  ADD KEY `id_Solicitud` (`id_Solicitud`),
  ADD KEY `id_Herramientas` (`id_Herramientas`),
  ADD KEY `id_Maquina` (`id_Maquina`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_Empleado`);

--
-- Indices de la tabla `gavilanes`
--
ALTER TABLE `gavilanes`
  ADD PRIMARY KEY (`id_Gav`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`id_Herramienta`),
  ADD KEY `id_Medidas` (`id_Medidas`),
  ADD KEY `id_Gavilanes` (`id_Gavilanes`),
  ADD KEY `id_Categoria` (`id_Categoria`);

--
-- Indices de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD PRIMARY KEY (`id_Maquinaria`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id_Medidas`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_Solicitud`),
  ADD KEY `id_Empleado` (`id_Empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  MODIFY `id_D_Solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `gavilanes`
--
ALTER TABLE `gavilanes`
  MODIFY `id_Gav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `id_Herramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  MODIFY `id_Maquinaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id_Medidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_Solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD CONSTRAINT `detalle_solicitud_ibfk_1` FOREIGN KEY (`id_Solicitud`) REFERENCES `solicitud` (`id_Solicitud`),
  ADD CONSTRAINT `detalle_solicitud_ibfk_2` FOREIGN KEY (`id_Herramientas`) REFERENCES `herramientas` (`id_Herramienta`),
  ADD CONSTRAINT `detalle_solicitud_ibfk_3` FOREIGN KEY (`id_Maquina`) REFERENCES `maquinaria` (`id_Maquinaria`);

--
-- Filtros para la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD CONSTRAINT `herramientas_ibfk_1` FOREIGN KEY (`id_Categoria`) REFERENCES `categorias` (`id_Categoria`),
  ADD CONSTRAINT `herramientas_ibfk_2` FOREIGN KEY (`id_Gavilanes`) REFERENCES `gavilanes` (`id_Gav`),
  ADD CONSTRAINT `herramientas_ibfk_3` FOREIGN KEY (`id_Medidas`) REFERENCES `medidas` (`id_Medidas`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`id_Empleado`) REFERENCES `empleado` (`id_Empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
