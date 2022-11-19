-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-11-2022 a las 23:57:13
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `Id_user` int NOT NULL,
  `nivel` int NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `CI` int NOT NULL,
  PRIMARY KEY (`Id_user`,`CI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Id_user`, `nivel`, `apellido`, `CI`) VALUES
(1, 1, 'Chabat Lopez', 12312354),
(2, 2, 'Areosa Fagundez', 54354312),
(3, 3, 'Galeano Gerez', 98798712),
(4, 3, 'Torres Fernandez', 76576512);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artcat`
--

DROP TABLE IF EXISTS `artcat`;
CREATE TABLE IF NOT EXISTS `artcat` (
  `Id_SubCat` int NOT NULL,
  `Id_MiniCat` int DEFAULT NULL,
  `Cod_Art` int NOT NULL,
  PRIMARY KEY (`Cod_Art`) USING BTREE,
  KEY `Cod_Art` (`Cod_Art`),
  KEY `Id_MiniCat` (`Id_MiniCat`) USING BTREE,
  KEY `artcat_ibfk_1` (`Id_SubCat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `artcat`
--

INSERT INTO `artcat` (`Id_SubCat`, `Id_MiniCat`, `Cod_Art`) VALUES
(36, NULL, 1),
(62, NULL, 2),
(30, NULL, 3),
(25, NULL, 4),
(36, NULL, 5),
(14, NULL, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `Cod_Art` int NOT NULL AUTO_INCREMENT,
  `Id_p` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `precio` int NOT NULL,
  `stock` int NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `descuento` tinyint NOT NULL,
  PRIMARY KEY (`Cod_Art`,`Id_p`),
  KEY `Id_p` (`Id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`Cod_Art`, `Id_p`, `nombre`, `descripcion`, `imagen`, `precio`, `stock`, `estado`, `descuento`) VALUES
(1, 1, 'Novemina Fuerte', 'Analgésico', 'Novemina.jpg', 88, 110, 1, 0),
(2, 1, 'Linus', 'Tto. de síntomas moderados-graves de hiperplasia benigna de próstata', 'Linus.png', 1807, 100, 1, 20),
(3, 1, 'Vitace A', 'Suplemento o complemento multivitamínico diario que fortalece el sistema inmune ayudando a prevenir gripes, resfríos e infecciones.', 'Vitace A.jpg', 926, 200, 1, 0),
(4, 2, 'Axe Epic Fresh', 'El antitranspirante en aerosol AXE Epic Fresh tiene una fórmula potenciada que te mantiene seco y libre de transpiración por 72 horas. Y no es sólo eso. Este antitranspirante contiene una fragancia in', 'Axe Epic Fresh.jpg', 174, 60, 1, 0),
(5, 1, 'Perifar', 'Baja la fiebre', 'Perifargrip.png', 300, 12, 1, 0),
(7, 1, 'Championes', 'azules', 'Protector solar.jpg', 500, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `Id_Cat` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_Cat`,`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Cat`, `Nombre`) VALUES
(1, 'Bebés y niños'),
(2, 'Dermocosmética'),
(3, 'Cuidado Personal'),
(4, 'Perfumería'),
(5, 'Nutrición'),
(6, 'Salud');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `categoriavis`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `categoriavis`;
CREATE TABLE IF NOT EXISTS `categoriavis` (
`Categoria` varchar(30)
,`Cod_Art` int
,`Id_Cat` int
,`Id_MiniCat` int
,`Id_SubCat` int
,`Minicategoria` varchar(50)
,`Subcategoria` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `Id_Com` int NOT NULL AUTO_INCREMENT,
  `Id_user` int NOT NULL,
  `Cod_Art` int NOT NULL,
  `forma_pago` enum('Efectivo','PayPal','Tarjeta') NOT NULL,
  `fecha_compra` date NOT NULL,
  `monto` int NOT NULL,
  `foto_rec` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Com`,`Id_user`,`Cod_Art`),
  KEY `Cod_Art` (`Cod_Art`),
  KEY `Id_user` (`Id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

DROP TABLE IF EXISTS `envios`;
CREATE TABLE IF NOT EXISTS `envios` (
  `Id_Com` int NOT NULL,
  `realizado` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Com`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idcompra`
--

DROP TABLE IF EXISTS `idcompra`;
CREATE TABLE IF NOT EXISTS `idcompra` (
  `IdCompra` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `Cod_Med` int NOT NULL AUTO_INCREMENT,
  `Cod_Art` int NOT NULL,
  `especificaciones` varchar(200) NOT NULL,
  `receta` tinyint(1) NOT NULL,
  PRIMARY KEY (`Cod_Med`,`Cod_Art`),
  KEY `Cod_Art` (`Cod_Art`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`Cod_Med`, `Cod_Art`, `especificaciones`, `receta`) VALUES
(1, 1, 'NOVEMINA FUERTE 10 COMPRIMIDOS', 0),
(2, 2, 'Inhibidor de la testosterona 5 alfa reductasa. ', 1),
(3, 3, 'VITACE A 30 TABLETAS', 0),
(4, 5, 'Paracetamol 500mg', 0),
(5, 5, 'Paracetamol 500mg', 0),
(6, 5, 'Paracetamol 500mg', 0),
(7, 7, 'perifar 500', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minicategoria`
--

DROP TABLE IF EXISTS `minicategoria`;
CREATE TABLE IF NOT EXISTS `minicategoria` (
  `Id_MiniCat` int NOT NULL AUTO_INCREMENT,
  `Id_SubCat` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_MiniCat`,`nombre`),
  KEY `Id_SubCat` (`Id_SubCat`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `minicategoria`
--

INSERT INTO `minicategoria` (`Id_MiniCat`, `Id_SubCat`, `nombre`) VALUES
(1, 1, 'Accesorios de Alimentación'),
(2, 1, 'Accesorios de lactancia'),
(3, 1, 'Mamaderas'),
(4, 1, 'Chupetes y Mordillos'),
(5, 2, 'Aceites'),
(6, 2, 'Botiquín de niño'),
(7, 2, 'Colonias y Talcos'),
(8, 2, 'Jabones y Shampoo'),
(9, 2, 'Óleo Calcáreo'),
(10, 3, 'Almacenamiento'),
(11, 3, 'Cremas Curativas'),
(12, 3, 'Discos Absorbentes'),
(13, 3, 'Extractores'),
(14, 3, 'Tetinas y Pezoneras'),
(15, 13, 'Cuerpo'),
(16, 13, 'Rostro'),
(17, 15, 'Afeitadoras'),
(18, 15, 'Aftershave'),
(19, 15, 'Espumas'),
(20, 16, 'Afeitadoras de dama'),
(21, 16, 'Bandas'),
(22, 16, 'Ceras'),
(23, 16, 'Cremas'),
(24, 19, 'Pañuelos'),
(25, 19, 'Papel higiénico'),
(26, 21, 'Copas y vasos'),
(27, 21, 'Higiene íntima'),
(28, 21, 'Tampones'),
(29, 21, 'Toallitas'),
(30, 28, 'Leches vegetales'),
(31, 28, 'Alimentos orgánicos'),
(32, 28, 'Proteinas'),
(33, 28, 'Aminoácidos'),
(34, 28, 'Ganadores de peso'),
(35, 28, 'Quemadores de grasa'),
(36, 28, 'Gel energizante'),
(37, 28, 'Barras proteicas'),
(38, 28, 'Vasos mezcladores'),
(39, 34, 'Alimentos'),
(40, 34, 'Complementos'),
(41, 35, 'Complementos adultos'),
(42, 46, 'Anticoagulantes'),
(43, 46, 'Betabloqueantes'),
(44, 46, 'Colesterol'),
(45, 46, 'Hipertensión'),
(46, 50, 'Antiácidos'),
(47, 50, 'Antidiarreicos'),
(48, 50, 'Antiespasmódicos'),
(49, 50, 'Antiflatulentos'),
(50, 50, 'Digestivos'),
(51, 50, 'Estreñimiento'),
(52, 50, 'Náuseas'),
(53, 61, 'Antigotosos'),
(54, 61, 'Hipouricemiantes'),
(55, 61, 'Osteoporosis'),
(56, 61, 'Reuma y Artrosis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `esquina` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(200) NOT NULL,
  `correo` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Id`, `nombre`, `calle`, `numero`, `esquina`, `contrasenia`, `correo`) VALUES
(1, 'David', NULL, NULL, NULL, '$2y$10$AjWGQWkz051GtJoAjQOmxOcsJgCP0uGU/ZrzuDSV6O8MVics4CxXS', 'davichaba@gmail.com'),
(2, 'Lucas', NULL, NULL, NULL, '$2y$10$Ho3j3ET6N7Cgu5zM80yt.u636Boe9kn1dMgmOidhR5XGarDvOQzg.', 'LucasNahuel@gmail.com'),
(3, 'Jesus', NULL, NULL, NULL, '$2y$10$ryp9MEhtq/FGAUGY42vvvuNvdv8aRANlu8abXW6QOWYnB7ygDclIa', 'Joshua@gmail.com'),
(4, 'Eleazar', NULL, NULL, NULL, '$2y$10$p/aKfIWpcXaZJOQYK262a.hL.1Ehp9FWbNHIMOzeMV0lbpFDFmkNy', 'eleazar@gmail.com'),
(5, 'Paco', NULL, NULL, NULL, '$2y$10$MIRzMorgU6TQcJ2FCSK6x.oUQjOyeTpyVXtsV3IEilZNbPHBLf3va', 'Paco@gmail.com'),
(6, 'prueba', NULL, NULL, NULL, '$2y$10$8u7vhtxjcG4uAdwndEcSUucgFw3QrUO40qHM.uGByyWqbZ.YVojMu', 'prueba@gmail.com'),
(7, 'prueba1', NULL, NULL, NULL, '$2y$10$7Lj58/AKiqKWwaGwjyEbq.NyTnoRYFYKLHTVjF5MQdCa33YJacQzO', 'prueba1@gmail.com'),
(8, 'blabla', NULL, NULL, NULL, '$2y$10$ZqBECiXkwSELZC/bNHE9qePDPcBPuQspyA9h7zg7whGuaOrhdnZSu', 'bla@gmail.com'),
(9, 'prueba3', NULL, NULL, NULL, '$2y$10$s6rQhjv3ylK21cdb3130buZP5cCEUkPPXYd3irk0JDuOqcNRM9jiu', 'prueba3@gmail.com'),
(10, 'Perico', NULL, NULL, NULL, '$2y$10$Gg31uIm5yS8fYOVrEzlW9eQAilhx9UZAumA2XVKPpHK.ggIXcsL5S', 'perico@gmail.com'),
(11, 'pame', NULL, NULL, NULL, '$2y$10$xDPl538XMnmTBKyTjnZG6uP0h1N9yWdpNdL82lbmW9mLGc/y3cNSy', 'pamecardozo170@gmail.com'),
(12, 'facu', NULL, NULL, NULL, '$2y$10$La7UmvCyY1C9L7pHEbS/qe8c0SHyy2vs8e3NjviAat0q/B19WNYQG', 'manolo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `Id_p` int NOT NULL AUTO_INCREMENT,
  `nombre_p` varchar(30) NOT NULL,
  `telefono_p` int NOT NULL,
  `calle_p` varchar(50) NOT NULL,
  `numero_p` int NOT NULL,
  `esquina_p` varchar(50) NOT NULL,
  `estado_p` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_p`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_p`, `nombre_p`, `telefono_p`, `calle_p`, `numero_p`, `esquina_p`, `estado_p`) VALUES
(1, 'A casa', 98543764, 'Arrospide', 123, 'Battle', 1),
(2, 'Luqui', 24134, 'ere', 12, 'are', 1),
(3, 'Gamma', 246205235, 'Morquio', 505, '', 1),
(4, 'gam', 75643433, 'Mor', 344, 'esquina', 1),
(5, 'Lucas proveedor', 24425234, 'mac', 123, 'esq', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE IF NOT EXISTS `subcategoria` (
  `Id_SubCat` int NOT NULL AUTO_INCREMENT,
  `id_Cat` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_SubCat`,`nombre`),
  KEY `id_Cat` (`id_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`Id_SubCat`, `id_Cat`, `nombre`) VALUES
(1, 1, 'Alimentación'),
(2, 1, 'Higiene y Salud'),
(3, 1, 'Lactancia'),
(4, 1, 'Pañales y Toallitas'),
(5, 1, 'Seguridad'),
(6, 2, 'Acné'),
(7, 2, 'Capilar'),
(8, 2, 'Limpiadores'),
(9, 2, 'Pigmentación'),
(10, 2, 'Solares'),
(11, 2, 'Solares infantiles'),
(12, 2, 'Antiedad'),
(13, 2, 'Hidratantes'),
(14, 3, 'Aceites y Lubricantes'),
(15, 3, 'Afeitado'),
(16, 3, 'Depilación'),
(17, 3, 'Protección Masculina'),
(18, 3, 'Geles de ducha'),
(19, 3, 'Higiene y salud'),
(20, 3, 'Jabones'),
(21, 3, 'Protección Femenina'),
(22, 3, 'Repelentes'),
(23, 3, 'Talcos'),
(24, 4, 'Perfumes para Mujeres'),
(25, 4, 'Perfumes para Hombres'),
(26, 4, 'Perfumes para Niñas'),
(27, 4, 'Perfumes para Niños'),
(28, 5, 'Alimentación Saludable'),
(29, 5, 'Edulcorantes'),
(30, 5, 'Vitaminas y minerales'),
(31, 5, 'Colágenos '),
(32, 5, 'Suplementos dietarios'),
(33, 5, 'Suplementos deportivos'),
(34, 5, 'Nutrición infantil'),
(35, 5, 'Nutrición adultos'),
(36, 6, 'Analgésicos y Antiinflamatorios'),
(37, 6, 'Antialérgicos'),
(38, 6, 'Antibióticos'),
(39, 6, 'Anticonceptivos'),
(40, 6, 'Antigripales'),
(41, 6, 'Antimicóticos'),
(42, 6, 'Antiparasitarios'),
(43, 6, 'Antivirales'),
(44, 6, 'Aparatología'),
(45, 6, 'Bienestar sexual'),
(46, 6, 'Cardiología'),
(47, 6, 'Dermatología'),
(48, 6, 'Diabetes'),
(49, 6, 'Endocrinología'),
(50, 6, 'Gastroenterología'),
(51, 6, 'Ginecología'),
(52, 6, 'Hematología'),
(53, 6, 'Inductores del sueño'),
(54, 6, 'Inmunología'),
(55, 6, 'Metabolismo'),
(56, 6, 'Neumología'),
(57, 6, 'Neurología'),
(58, 6, 'Oftalmología'),
(59, 6, 'ORL'),
(60, 6, 'Relajantes musculares'),
(61, 6, 'Reumatología'),
(62, 6, 'Urología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

DROP TABLE IF EXISTS `tarjeta`;
CREATE TABLE IF NOT EXISTS `tarjeta` (
  `Id_user` int NOT NULL,
  `numero_t` int NOT NULL,
  `tipo_t` enum('Visa','Mastercard') NOT NULL,
  PRIMARY KEY (`Id_user`,`numero_t`,`tipo_t`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_user` int NOT NULL,
  `estado` int NOT NULL,
  `acceso` date DEFAULT NULL,
  PRIMARY KEY (`Id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_user`, `estado`, `acceso`) VALUES
(1, 1, '2022-10-28'),
(2, 1, '2022-11-17'),
(3, 1, '2022-10-07'),
(4, 1, NULL),
(5, 1, '2022-10-07'),
(6, 1, '2022-10-07'),
(7, 1, '2022-10-07'),
(8, 1, '2022-10-07'),
(9, 0, '2022-10-07'),
(10, 1, '2022-10-31'),
(11, 1, '2022-11-01'),
(12, 1, '2022-11-01');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuariocomp`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuariocomp`;
CREATE TABLE IF NOT EXISTS `usuariocomp` (
`acceso` date
,`correo` varchar(50)
,`estado` int
,`Id` int
,`nombre` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `categoriavis`
--
DROP TABLE IF EXISTS `categoriavis`;

DROP VIEW IF EXISTS `categoriavis`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categoriavis`  AS SELECT `c`.`Id_Cat` AS `Id_Cat`, `c`.`Nombre` AS `Categoria`, `a`.`Id_SubCat` AS `Id_SubCat`, `s`.`nombre` AS `Subcategoria`, `a`.`Id_MiniCat` AS `Id_MiniCat`, `m`.`nombre` AS `Minicategoria`, `a`.`Cod_Art` AS `Cod_Art` FROM ((`categoria` `c` join (`subcategoria` `s` left join `minicategoria` `m` on((`s`.`Id_SubCat` = `m`.`Id_SubCat`)))) join `artcat` `a`) WHERE ((`c`.`Id_Cat` = `s`.`id_Cat`) AND (`s`.`Id_SubCat` = `a`.`Id_SubCat`) AND ((`a`.`Id_MiniCat` = `m`.`Id_MiniCat`) OR (`a`.`Id_MiniCat` is null)))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuariocomp`
--
DROP TABLE IF EXISTS `usuariocomp`;

DROP VIEW IF EXISTS `usuariocomp`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuariocomp`  AS SELECT `p`.`Id` AS `Id`, `p`.`nombre` AS `nombre`, `p`.`correo` AS `correo`, `u`.`estado` AS `estado`, `u`.`acceso` AS `acceso` FROM (`usuario` `u` join `persona` `p`) WHERE (`p`.`Id` = `u`.`Id_user`)  ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `persona` (`Id`);

--
-- Filtros para la tabla `artcat`
--
ALTER TABLE `artcat`
  ADD CONSTRAINT `artcat_ibfk_1` FOREIGN KEY (`Id_SubCat`) REFERENCES `subcategoria` (`Id_SubCat`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `artcat_ibfk_2` FOREIGN KEY (`Cod_Art`) REFERENCES `articulos` (`Cod_Art`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `artcat_ibfk_3` FOREIGN KEY (`Id_MiniCat`) REFERENCES `minicategoria` (`Id_MiniCat`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`Id_p`) REFERENCES `proveedor` (`Id_p`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Cod_Art`) REFERENCES `articulos` (`Cod_Art`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`Id_user`) REFERENCES `persona` (`Id`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`Id_Com`) REFERENCES `compra` (`Id_Com`);

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `medicamentos_ibfk_1` FOREIGN KEY (`Cod_Art`) REFERENCES `articulos` (`Cod_Art`);

--
-- Filtros para la tabla `minicategoria`
--
ALTER TABLE `minicategoria`
  ADD CONSTRAINT `minicategoria_ibfk_1` FOREIGN KEY (`Id_SubCat`) REFERENCES `subcategoria` (`Id_SubCat`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`id_Cat`) REFERENCES `categoria` (`Id_Cat`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `tarjeta_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `persona` (`Id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `persona` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
