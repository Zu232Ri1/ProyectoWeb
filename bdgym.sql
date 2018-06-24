-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2018 a las 21:22:57
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdgym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripciom` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_sala` int(11) DEFAULT NULL,
  `fotoRuta` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tarifa` int(11) DEFAULT NULL,
  `dni_empelado` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `descripciom`, `id_sala`, `fotoRuta`, `tarifa`, `dni_empelado`) VALUES
(1, 'boxeoss', 'Una descripciom de bo', 2, '../img/clases/1528140382-maxresdefault.jpg', 10, '37984523T'),
(2, 'espining', 'Bic', 1, NULL, 10, '73561478A'),
(3, 'fitnnes', 'Dep', 2, NULL, 10, '73561478A'),
(4, 'aerobic', 'Dep', 2, NULL, 10, '37984523T'),
(5, 'bachata', 'Cla', 1, NULL, 10, '73561478A'),
(7, 'muay tahy', 'Un clase de muay tah', 2, NULL, 30, '32981419V'),
(9, 'boxeo', '', 1, NULL, 30, '32981419V'),
(11, 'judo', 'judo clase', 2, NULL, 30, '32981419V'),
(14, 'zumba agua', 'una descrip', 1, NULL, 30, '32981419V'),
(15, 'zumba aire', 'Una', 1, NULL, 30, '32981419V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `fechaAla` date DEFAULT NULL,
  `fechaBaja` date DEFAULT NULL,
  `fechaRenovacion` date DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fotoRuta` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dni_empleado` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dni`, `nombre`, `apellido`, `telefono`, `email`, `fechaNacimiento`, `fechaAla`, `fechaBaja`, `fechaRenovacion`, `sexo`, `pass`, `fotoRuta`, `dni_empleado`, `id_actividad`) VALUES
('14983946K', 'Carlos', 'Ruizklk', '666326388', 'mercha@hotmail.com', '1984-01-02', '2018-04-26', NULL, '2018-04-01', 'H', 'Cr19840102', NULL, '37984523T', 1),
('18086859G', 'Pedro', 'Perez Pozo', '666326388', 'bella_mafalda@hotmail.com', '1984-01-02', '2018-04-26', NULL, '2018-10-01', 'H', 'Pp19840102', NULL, '73561478A', 2),
('19829115X', 'Alejandro', 'Zurita Loz', '666326388', 'bella_mafalda@hotmai.com', '1984-01-02', '2018-04-26', NULL, '2018-10-01', 'H', 'Az19840102', NULL, '37984523T', 5),
('32440257E', 'Marta', 'Alegria Lo', '666326388', 'bella_mafalda@hotmai.com', '1984-01-02', '2018-04-26', NULL, '2018-10-01', 'M', 'Ma19840102', NULL, '73561478A', 1),
('32489217S', 'Pruebas', 'Prueba', '656326341', 'zuriken@hotmail.com', '1984-08-07', '2018-05-26', NULL, '2018-06-26', 'H', 'Pp19840807', '../img/user/1527529696-user.png', '37984523T', 1),
('34173888M', 'Juan Prueba', 'Girones', '656326341', 'zuriken@hotmail.com', '2018-06-20', '2018-06-20', NULL, '2018-07-20', 'H', 'Jg20180620', NULL, '32981419V', 1),
('74246829T', 'UsuarioM', 'asd', '', 'zuriken@hotmail.com', '2018-06-13', '2018-06-14', NULL, '2018-07-14', 'H', 'Ua20180613', NULL, '32981419V', 1),
('95982518E', 'Laura', 'Pozo Lozan', '666326388', 'polo_mafalda@hotmail.com', '1984-01-02', '2018-04-26', NULL, '2018-10-01', 'M', 'Lp19840102', NULL, '37984523T', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `id_dia` int(11) NOT NULL,
  `nombre_semana` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`id_dia`, `nombre_semana`) VALUES
(1, 'Lunes'),
(2, 'Marte'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_actividad`
--

CREATE TABLE `dia_actividad` (
  `id_actividad` int(11) NOT NULL,
  `id_semana` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dia_actividad`
--

INSERT INTO `dia_actividad` (`id_actividad`, `id_semana`, `hora_inicio`, `hora_fin`) VALUES
(1, 1, '19:00:00', '20:00:00'),
(1, 5, '19:00:00', '20:00:00'),
(2, 1, '18:00:00', '19:00:00'),
(2, 4, '19:00:00', '20:00:00'),
(3, 2, '10:00:00', '11:00:00'),
(3, 4, '18:00:00', '19:00:00'),
(4, 3, '16:00:00', '17:00:00'),
(5, 5, '17:00:00', '18:00:00'),
(7, 1, '20:00:00', '21:00:00'),
(7, 2, '16:00:00', '17:00:00'),
(11, 2, '19:00:00', '20:00:00'),
(14, 1, '17:00:00', '20:00:00'),
(15, 1, '19:00:00', '20:00:00'),
(15, 2, '19:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `id` int(11) NOT NULL,
  `fotoRuta` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_musculo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`id`, `fotoRuta`, `nombre`, `descripcion`, `id_musculo`) VALUES
(1, '../img/ejercicios/1528996822-maxresdefault.jpg', 'Press Inclinado', 'Descripcion del pecho', 1),
(2, NULL, 'Press Banca', 'Ejercicio para trabajasr ', 1),
(3, NULL, 'Press Mancuerna', 'Ejercicio para trabajasr ', 1),
(4, NULL, 'Aperturas Polea', 'Ejercicio para trabajasr ', 1),
(5, NULL, 'Polea tras nuca', 'Ejercicio para trabajasr ', 2),
(6, NULL, 'Dominada', 'Ejercicio para trabajasr ', 2),
(7, NULL, 'Remo con mancue', 'Ejercicio para trabajar l', 2),
(8, NULL, 'Femoral maquina', 'Ejercicio para trabajasr ', 3),
(9, NULL, 'Peso muerto fem', 'Ejercicio para trabajar l', 3),
(10, NULL, 'Zancada mancuer', 'Ejercicio para trabajasr ', 3),
(11, NULL, 'Extensiones máq', 'Ejercicio para trabajar l', 4),
(12, NULL, 'Sentadillas', 'Ejercicio para trabajasr ', 4),
(13, NULL, 'Prensa', 'Ejercicio para trabajasr ', 4),
(14, NULL, 'Curl barra', 'Ejercicio para trabajasr ', 5),
(15, NULL, 'Curl mancuernas', 'Ejercicio para trabajar l', 5),
(16, NULL, 'Martillos', 'Ejercicio para trabajar l', 5),
(17, NULL, 'Polea Triceps', 'Ejercicio para trabajar e', 6),
(18, NULL, 'Polea Triceps  ', 'Ejercicio para trabajar e', 6),
(19, NULL, 'Press Frances', 'Ejercicio para trabajar e', 6),
(20, NULL, 'Antebrazo  Barr', 'Ejercicio para trabajar e', 7),
(21, NULL, 'Antebrazo  Manc', 'Ejercicio para trabajar e', 7),
(22, NULL, 'Antebrazo  Maqu', 'Ejercicio para trabajar e', 7),
(23, NULL, 'Pajaro', 'Ejercicio para hombros con mancuernas', 8),
(24, NULL, 'Laterales', 'Ejercicio para hombros con mancuernas', 8),
(25, NULL, 'Frontales', 'Ejercicio para hombros con mancuernas', 8),
(26, '../img/ejercicios/1529362575-maxresdefault.jpg', 'Curl biceps al', 'Curl de biceps alterno', 5),
(27, '../img/ejercicios/1529363308-450_1000.jpg', 'PRUEBA EJE', 'PRUEBA EJER', 1),
(28, '../img/ejercicios/1529363193-maxresdefault.jpg', 'EJERECICIO \"', 'DOS', 1),
(29, '../img/ejercicios/1529519487-450_1000.jpg', 'Ejercico espalda', 'Un ejerico ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `dni_emple` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuenta` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sueldo` int(11) DEFAULT NULL,
  `seguridaSocial` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fotoRuta` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`dni_emple`, `nombre`, `apellido`, `telefono`, `email`, `cuenta`, `cp`, `sueldo`, `seguridaSocial`, `tipo`, `fotoRuta`, `pass`, `fechaNacimiento`) VALUES
('32981419V', 'PruebaM', 'Pruebassss', '656326341', 'zuriken@hotmail.com', '30050050082070759812', '03340', 1500, NULL, 'monitor', '../img/monitor/1527709684-user.png', 'Pp19840807', '1984-08-07'),
('37984523T', 'Pepe', 'Lopez Gall', '656326341', 'zuriken@hotmail.com', NULL, '0340', 1500, NULL, 'monitor', NULL, 'Pl19901113', '1990-11-13'),
('40903943F', 'UsuarioMonitor', 'Pruebaaa', '656326341', 'zuriken@hotmail.com', '30050050082070759812', '', 12, NULL, 'monitor', NULL, 'Up20180624', '2018-06-24'),
('73561478A', 'Luis', 'Lopez Gall', '656326341', 'zuriken@hotmail.com', NULL, '0340', 1500, NULL, 'monitor', NULL, 'Ll19891113', '1989-11-13'),
('74246829T', 'Juan', 'Zurita', '656326341', 'zuriken@hotmail.com', NULL, '03340', NULL, NULL, 'admin', NULL, '1234', '1984-11-13'),
('85227087N', 'Monitor Prueba', 'Girones', '656326341', 'zuriken@hotmail.com', '30050050082070759812', '03340', 2, NULL, 'monitor', NULL, 'Mg20180612', '2018-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `dni_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `fechaAltaFactura` date DEFAULT NULL,
  `fechaPago` date DEFAULT NULL,
  `meses` int(11) DEFAULT NULL,
  `estado` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musculo`
--

CREATE TABLE `musculo` (
  `id` int(11) NOT NULL,
  `tipo_musculo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `musculo`
--

INSERT INTO `musculo` (`id`, `tipo_musculo`) VALUES
(1, 'Pecho'),
(2, 'Espalda'),
(3, 'Femoral'),
(4, 'Cuadriceps'),
(5, 'Biceps'),
(6, 'Triceps'),
(7, 'Antebrazo'),
(8, 'hombros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preciosum`
--

CREATE TABLE `preciosum` (
  `cod_pro` int(11) NOT NULL,
  `dni_empleado` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_prod` int(11) NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descirpcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaCaduc` date DEFAULT NULL,
  `fotoRuta` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreProducto` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precioVenta` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_prod`, `tipo`, `descirpcion`, `fechaCaduc`, `fotoRuta`, `nombreProducto`, `precioVenta`) VALUES
(1, 'proteina', 'Proteina amix lo mejor en el m', '2020-01-01', NULL, 'Amix', 35.5),
(2, 'proteina', 'Proteina wey lo mejor en el me', '2020-01-01', NULL, 'Wey', 35),
(3, 'proteina', 'Proteina vitargo lo mejor en e', '2020-01-01', NULL, 'Vitargo', 35),
(4, 'hidratos d', 'Hidratos de carbono vitargo lo', '2020-01-01', NULL, 'Vitargo', 30),
(5, 'hidratos d', 'Hidratos de carbon amix lo mej', '2020-01-01', NULL, 'Amix', 50),
(6, 'hidratos d', 'Hidratos de carbon amix lo mej', '2020-01-01', NULL, 'Wey', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

CREATE TABLE `rutina` (
  `numero_dia` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `dni_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `id_ejercicio` int(11) NOT NULL,
  `serie` int(11) DEFAULT NULL,
  `repeticiones` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rutina`
--

INSERT INTO `rutina` (`numero_dia`, `dni_cliente`, `id_ejercicio`, `serie`, `repeticiones`) VALUES
('1', '14983946K', 1, NULL, NULL),
('1', '14983946K', 2, NULL, NULL),
('1', '74246829T', 3, 4, '10,10,10'),
('1', '74246829T', 4, NULL, NULL),
('2', '14983946K', 4, NULL, NULL),
('2', '14983946K', 5, NULL, NULL),
('3', '14983946K', 7, NULL, NULL),
('3', '14983946K', 8, NULL, NULL),
('3', '14983946K', 10, NULL, NULL),
('4', '14983946K', 14, NULL, NULL),
('4', '14983946K', 17, NULL, NULL),
('5', '14983946K', 23, NULL, NULL),
('5', '14983946K', 24, NULL, NULL),
('5', '14983946K', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nombreSala` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `nombreSala`, `descripcion`) VALUES
(1, 'SALA 1', 'Sala prepa'),
(2, 'SALA 2', 'Sala prepa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id_seguimiento` int(11) NOT NULL,
  `fechaSeguimiento` date DEFAULT NULL,
  `estatura` double DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `medidas` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `indice_grasa` float DEFAULT NULL,
  `dni_cliente` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`id_seguimiento`, `fechaSeguimiento`, `estatura`, `peso`, `medidas`, `indice_grasa`, `dni_cliente`) VALUES
(1, '2018-01-07', 1.92, 80, '60,90,60,90', 51.6978, '14983946K'),
(2, '2018-02-14', 1.92, 70, '60,90,60,90', 48.6895, '14983946K'),
(3, '2018-03-14', 1.92, 70, '60,90,60,90', 48.6895, '14983946K'),
(4, '2018-04-14', 1.92, 60, '60,90,60,90', 45.6811, '14983946K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE `tabla` (
  `id_semana` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `dni_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_se` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tabla`
--

INSERT INTO `tabla` (`id_semana`, `dni_cliente`, `nombre_se`) VALUES
('1', '14983946K', 'Lunes'),
('1', '18086859G', 'Lunes'),
('1', '74246829T', 'Lunes'),
('2', '14983946K', 'Martes'),
('2', '18086859G', 'Martes'),
('3', '14983946K', 'Miercoles'),
('3', '18086859G', 'Miercoles'),
('4', '14983946K', 'Jueves'),
('4', '18086859G', 'Jueves'),
('5', '14983946K', 'Viernes'),
('5', '18086859G', 'Viernes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `dni_empleado` (`dni_empelado`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `dni_emple` (`dni_empleado`),
  ADD KEY `ifk_cliente` (`id_actividad`);

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `dia_actividad`
--
ALTER TABLE `dia_actividad`
  ADD PRIMARY KEY (`id_actividad`,`id_semana`),
  ADD KEY `id_semana` (`id_semana`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_musculo` (`id_musculo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`dni_emple`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`,`dni_cliente`),
  ADD KEY `dni_cliente` (`dni_cliente`);

--
-- Indices de la tabla `musculo`
--
ALTER TABLE `musculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preciosum`
--
ALTER TABLE `preciosum`
  ADD PRIMARY KEY (`cod_pro`,`dni_empleado`),
  ADD KEY `dni_empleado` (`dni_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_prod`);

--
-- Indices de la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD PRIMARY KEY (`numero_dia`,`dni_cliente`,`id_ejercicio`),
  ADD KEY `id_ejercicio` (`id_ejercicio`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id_seguimiento`),
  ADD KEY `dni_cliente` (`dni_cliente`);

--
-- Indices de la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD PRIMARY KEY (`id_semana`,`dni_cliente`),
  ADD KEY `dni_cliente` (`dni_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `dia`
--
ALTER TABLE `dia`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `musculo`
--
ALTER TABLE `musculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `id_seguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id`),
  ADD CONSTRAINT `dni_empleado` FOREIGN KEY (`dni_empelado`) REFERENCES `empleado` (`dni_emple`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `dni_emple` FOREIGN KEY (`dni_empleado`) REFERENCES `empleado` (`dni_emple`),
  ADD CONSTRAINT `ifk_cliente` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id`);

--
-- Filtros para la tabla `dia_actividad`
--
ALTER TABLE `dia_actividad`
  ADD CONSTRAINT `dia_actividad_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id`),
  ADD CONSTRAINT `dia_actividad_ibfk_2` FOREIGN KEY (`id_semana`) REFERENCES `dia` (`id_dia`);

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `ejercicio_ibfk_1` FOREIGN KEY (`id_musculo`) REFERENCES `musculo` (`id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`dni_cliente`) REFERENCES `cliente` (`dni`);

--
-- Filtros para la tabla `preciosum`
--
ALTER TABLE `preciosum`
  ADD CONSTRAINT `preciosum_ibfk_1` FOREIGN KEY (`cod_pro`) REFERENCES `productos` (`cod_prod`),
  ADD CONSTRAINT `preciosum_ibfk_2` FOREIGN KEY (`dni_empleado`) REFERENCES `empleado` (`dni_emple`);

--
-- Filtros para la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD CONSTRAINT `rutina_ibfk_1` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicio` (`id`),
  ADD CONSTRAINT `rutina_ibfk_2` FOREIGN KEY (`numero_dia`,`dni_cliente`) REFERENCES `tabla` (`id_semana`, `dni_cliente`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`dni_cliente`) REFERENCES `cliente` (`dni`);

--
-- Filtros para la tabla `tabla`
--
ALTER TABLE `tabla`
  ADD CONSTRAINT `tabla_ibfk_1` FOREIGN KEY (`dni_cliente`) REFERENCES `cliente` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
