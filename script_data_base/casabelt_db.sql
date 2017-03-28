-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-03-2017 a las 14:42:28
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `casabelt_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id_content` int(11) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(45) NOT NULL,
  `route` text,
  `url` varchar(45) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL,
  `modification_date` date DEFAULT NULL,
  PRIMARY KEY (`id_content`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`id_content`, `tittle`, `route`, `url`, `description`, `status`, `creation_date`, `modification_date`) VALUES
(27, 'Salon Entrada', '7646467235772bc4485f1c.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(28, 'Lobby noche', '4282193095772bc5b9db99.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(29, 'Lobby ', '13062332015772bcd43dc28.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(30, 'lobby 2', '7547827875772bce0ad538.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(31, 'salon 1', '21152070395772bcef66b2a.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(32, 'salon 2', '19995051495772bcfbb45a3.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(33, 'ventana', '4199005445772bd3d28468.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(34, 'salon 3', '1229085205772bd603d76d.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(35, 'muro lloron', '6333247745772bd72ed02a.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(36, 'noche', '1813108605772bdb88a14b.jpg', NULL, ' ', 1, '2016-06-28', NULL),
(37, 'Terraza y jardín exterior para usos múltiples', '198916052657b36b535655a.jpg', NULL, ' ', 1, '2016-08-16', '2016-08-16'),
(38, 'Muelle con vista al Río Jamapa', '139968133057b36c0ec0f53.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(39, 'Vista al Río Jamapa', '75913907757b36c28a42de.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(40, 'Amplios ventanales con una vista espectacular', '55999174757b36c486f59a.jpg', NULL, ' ', 1, '2016-08-16', '2016-08-16'),
(41, 'Vista nocturna ', '16809417657b36c64ce61a.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(42, 'Lincanto de Noche', '27475825357b36c8709b58.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(43, 'Estacionamiento privado para 250 vehículos', '174704993757b36c9a8bc85.jpg', NULL, ' ', 1, '2016-08-16', '2016-08-16'),
(44, 'Vista aérea del salón', '82573839857b36cb52c6d1.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(45, 'Rodeado de inmensos árboles', '144295978857b36cd3e74de.jpg', NULL, ' ', 1, '2016-08-16', '2016-08-16'),
(46, 'Río Jamapa', '167651701757b36e956e41d.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(47, 'Cuarto privado para novias', '144594525357b37048b4008.jpg', NULL, ' El día del evento se le otorga a la novia su propia clave digital para asegurar su total privacidad.', 1, '2016-08-16', '2016-08-16'),
(48, 'Diseñado a detalle para ese día tan especial.', '202277122757b370a875b9a.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(49, 'Diseñado a detalle para ese día tan especial.', '207571471157b370bc3780a.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(50, 'Diseñado a detalle para ese día tan especial.', '42749528257b370deaf5b9.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(51, 'Área de descanso ', '172914727657b3712b5f80f.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(52, 'Candil de cristal', '148472539157b3713ed6cd5.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(53, 'Acceso privado desde el baño para damas. El d', '37163636657b3716cc6c45.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(54, 'Seguro con clave digital', '89658302957b371929e97d.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(55, 'Ideal para fotografías antes y durante el eve', '146860224057b371ad8c1c8.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(56, 'Área de descanso con vista al río.', '61702306357b371c6208f2.jpg', NULL, ' ', 1, '2016-08-16', NULL),
(60, 'Boda', '69026246557b4ff87c818b.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(61, 'Boda', '164459925857b4ff996ea02.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(62, 'Comida privada en nuestro muelle.', '103168237657b4ffb5abafb.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(63, 'Boda civil', '65674816757b4ffd01a145.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(64, 'Baño para damas', '144442405357b50a2b09d7e.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(65, 'Lavamanos ', '197338604357b50a451b257.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(66, 'Espejos de aumento', '13795660657b50a5905533.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(67, 'W.C.', '182427537857b50a74854a5.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(68, 'Sala de espera', '70282971057b50a9197b28.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(69, 'Baño para caballeros', '158867346557b50aa7b8d1d.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(70, 'W.C.', '191213430057b50abe69644.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(71, 'Baño privado para caballeros', '142088121257b50ad45d9d1.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(72, 'Cocina interior climatizada', '144356431557b50b049f59d.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(73, 'Cocina interior climatizada', '88141189057b50b1e00a32.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(74, 'Cocina interior climatizada', '127332635657b50b34e821c.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(75, 'Cocina exterior', '124732505957b50b4f3dc64.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(76, 'Área de carga y descarga', '212496351857b50ba328456.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(77, 'Bodega para vino y licores', '56790286857b50bbfddb1d.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(78, 'Puntos de colgado a lo largo del salón', '122518007257b50c8d998f2.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(79, 'Cuarto frío para guardar flores', '18672057757b50caf3ebcc.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(80, 'Área de carga y descarga', '62491665257b50ccd54799.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(81, 'Lobby y entrada independiente a Lincanto', '103383237857b512d951964.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(82, 'Recibidor', '165402700257b5130b92a01.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(83, 'Salón Farfala - 200 m²', '208902078957b513489f4be.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(84, 'Salón Farfala - 200 m²', '142231108757b51360c178d.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(85, 'Área para juegos infantiles', '89595367657b5137a4daa4.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(86, 'Área de terraza y jardín', '189779640357b514f1e04fd.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(87, 'Jardín', '199210316957b5150a5a264.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(88, 'Área de terraza y jardín', '29371259257b51526a207f.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(89, 'Muelle con vista al Río Jamapa', '124822669257b5153c43ca3.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(90, 'Exclusa ', '63263640357b5156f2f4db.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(91, 'Estancia de espera', '145281550157b516384fd4d.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(92, 'Espejos digitales ', '188697397157b5164f7682f.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(93, 'Baño para caballeros', '41442329357b5166608779.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(94, 'Cocina interior climatizada', '58542294957b5167aada4c.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(95, 'Cocina interior climatizada', '15095994557b5168cc46f2.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(96, 'Cocina interior climatizada', '110576943557b5169ef370b.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(97, 'Vista a la terraza ', '191395937957b5173aafe5b.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(98, 'Evento privado', '13479043057b51752ebbb1.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(99, 'Evento privado', '93558188357b51769afc82.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(100, 'Lobby decorado', '22082787957b517bb2a9dc.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(101, 'Comida en nuestro muelle.', '19407322457b517cd8b582.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(102, 'Fachada exterior', '171283984357b51ba65a581.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(103, 'El castillo Bambinos', '207289203057b51bc2ee035.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(104, 'Área de jardín y juegos exteriores', '145256868857b51be93dad6.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(105, 'Fachada interior', '116754183857b51c3258080.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(106, 'Área para adultos', '1447119557b51c98b811f.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(107, 'Área para adultos', '147973103157b51cc2e0323.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(108, 'Cocina climatizada', '201222974957b51ce0f1aba.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(109, 'Cocina climatizada', '68605418357b51cffd11da.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(110, 'Baños', '58012835357b51d2887ea1.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(111, 'Baños', '203649954357b51d3dc58a4.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(112, 'Fachada interior de noche', '142105703157b51daf8cc98.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(113, '¡Los juegos más grandes y completos!', '168115004457b51e88b40d9.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(114, 'Diversión infinita para los niños', '125699625857b51eaf4a5a8.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(115, '¡Los juegos más grandes y completos!', '125804735957b51ec27e872.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(116, '¡También hay área para bebés!', '88689661757b51ede367d0.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(117, 'Inmensa alberca de pelotas', '171671395457b51ef7dc830.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(118, 'Casitas', '214461048757b51f0ae93cd.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(119, '¡Tirolesa, resbaladillas, pelotas y más!', '116232630657b51f2bc600e.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(120, 'Área de jardín y juegos exteriores', '153242827257b52017511f0.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(121, 'Juegos exteriores', '142399719557b52034ce079.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(122, 'Juegos exteriores', '144805104057b5204919531.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(123, 'Área de casitas', '149005018657b52063e48d2.JPG', NULL, ' ', 1, '2016-08-17', NULL),
(124, 'Área de casitas', '49025722357b52076bdae8.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(125, 'Juegos exteriores', '88554376757b5209184fae.jpg', NULL, ' ', 1, '2016-08-17', NULL),
(126, 'Boda', '142293494257b924667e8ec.jpg', NULL, ' ', 1, '2016-08-21', NULL),
(127, 'Boda', '171228595057b924803aae5.jpg', NULL, ' ', 1, '2016-08-21', NULL),
(128, 'Boda', '1418749657b924917025c.jpg', NULL, ' ', 1, '2016-08-21', NULL),
(129, 'XV años ', '183914655657b92513bf2a4.jpg', NULL, ' ', 1, '2016-08-21', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_decoration`
--

CREATE TABLE IF NOT EXISTS `content_decoration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_content` int(11) NOT NULL,
  `id_decoration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

--
-- Volcado de datos para la tabla `content_decoration`
--

INSERT INTO `content_decoration` (`id`, `id_content`, `id_decoration`) VALUES
(15, 27, 1),
(16, 28, 1),
(17, 29, 1),
(18, 30, 1),
(19, 31, 1),
(20, 32, 1),
(21, 33, 1),
(22, 34, 1),
(23, 35, 1),
(24, 36, 1),
(25, 37, 2),
(26, 38, 2),
(27, 39, 2),
(28, 40, 2),
(29, 41, 2),
(30, 42, 2),
(31, 43, 2),
(32, 44, 2),
(33, 45, 2),
(34, 46, 2),
(35, 47, 3),
(36, 48, 3),
(37, 49, 3),
(38, 50, 3),
(39, 51, 3),
(40, 52, 3),
(41, 53, 3),
(42, 54, 3),
(43, 55, 3),
(44, 56, 3),
(48, 60, 4),
(49, 61, 4),
(50, 62, 4),
(51, 63, 4),
(52, 64, 5),
(53, 65, 5),
(54, 66, 5),
(55, 67, 5),
(56, 68, 5),
(57, 69, 5),
(58, 70, 5),
(59, 71, 5),
(60, 72, 6),
(61, 73, 6),
(62, 74, 6),
(63, 75, 6),
(64, 76, 6),
(65, 77, 6),
(66, 78, 7),
(67, 79, 7),
(68, 80, 7),
(69, 81, 8),
(70, 82, 8),
(71, 83, 8),
(72, 84, 8),
(73, 85, 8),
(74, 86, 9),
(75, 87, 9),
(76, 88, 9),
(77, 89, 9),
(78, 90, 9),
(79, 91, 10),
(80, 92, 10),
(81, 93, 10),
(82, 94, 10),
(83, 95, 10),
(84, 96, 10),
(85, 97, 11),
(86, 98, 11),
(87, 99, 11),
(88, 100, 11),
(89, 101, 11),
(90, 102, 12),
(91, 103, 12),
(92, 104, 12),
(93, 105, 12),
(94, 106, 12),
(95, 107, 12),
(96, 108, 12),
(97, 109, 12),
(98, 110, 12),
(99, 111, 12),
(100, 112, 12),
(101, 113, 13),
(102, 114, 13),
(103, 115, 13),
(104, 116, 13),
(105, 117, 13),
(106, 118, 13),
(107, 119, 13),
(108, 120, 14),
(109, 121, 14),
(110, 122, 14),
(111, 123, 14),
(112, 124, 14),
(113, 125, 14),
(114, 126, 4),
(115, 127, 4),
(116, 128, 4),
(117, 129, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_event`
--

CREATE TABLE IF NOT EXISTS `content_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_content` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_sub_service`
--

CREATE TABLE IF NOT EXISTS `content_sub_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_content` int(11) NOT NULL,
  `id_sub_service` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decorations`
--

CREATE TABLE IF NOT EXISTS `decorations` (
  `id_decoration` int(11) NOT NULL AUTO_INCREMENT,
  `name_decoration` varchar(45) NOT NULL,
  `id_party` int(11) NOT NULL,
  PRIMARY KEY (`id_decoration`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `decorations`
--

INSERT INTO `decorations` (`id_decoration`, `name_decoration`, `id_party`) VALUES
(1, 'El salón', 1),
(2, 'Exteriores', 1),
(3, 'Cuarto de la novia', 1),
(4, 'Galería de evetos', 1),
(5, 'Baños', 1),
(6, 'Cocinas', 1),
(7, 'Extras', 1),
(8, 'El salón', 2),
(9, 'Exteriores', 2),
(10, 'Baños y cocina', 2),
(11, 'Galería de eventos', 2),
(12, 'El salón', 3),
(13, 'Juegos interiores', 3),
(14, 'Juegos exteriores', 3),
(15, 'Galería de eventos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `name_event` varchar(25) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id_event`, `name_event`) VALUES
(1, 'Baby Shower'),
(2, 'Bautizo'),
(3, 'Fiesta infantil'),
(4, 'Comunión'),
(5, 'XV años'),
(6, 'Despedida de soltera'),
(7, 'Iglesias'),
(8, 'Boda'),
(9, 'Graduación'),
(10, 'Evento empresarial'),
(11, 'Fiesta privada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `party_room`
--

CREATE TABLE IF NOT EXISTS `party_room` (
  `id_party_room` int(11) NOT NULL AUTO_INCREMENT,
  `party_room_name` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_party_room`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `party_room`
--

INSERT INTO `party_room` (`id_party_room`, `party_room_name`) VALUES
(1, 'L’incanto'),
(2, 'Farfala'),
(3, 'Bambinos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `name_service` varchar(25) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id_service`, `name_service`) VALUES
(1, 'Diseño floral'),
(2, 'Mesas de postres y quesos'),
(3, 'Renta de mobiliario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_services`
--

CREATE TABLE IF NOT EXISTS `sub_services` (
  `id_sub_service` int(11) NOT NULL AUTO_INCREMENT,
  `name_sub_service` varchar(20) NOT NULL,
  `id_service` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_sub_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `sub_services`
--

INSERT INTO `sub_services` (`id_sub_service`, `name_sub_service`, `id_service`) VALUES
(1, 'Centros de mesa', 1),
(2, 'Decoración floral', 1),
(3, 'Otros', 1),
(4, 'Mesas de postres', 2),
(5, 'Mesas de quesos', 2),
(6, 'Otros', 2),
(7, 'Mesas', 3),
(8, 'Sillas', 3),
(9, 'Mantelería', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`id`, `nombre`, `user`, `password`) VALUES
(0, 'Administrador', 'test@blick.mx', 'BlickCasaBeltrami');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
