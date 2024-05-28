-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2024 a las 14:23:15
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siph`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concejo`
--

CREATE TABLE `concejo` (
  `idccj` bigint(20) NOT NULL COMMENT 'Codigo de consejo',
  `idprd` bigint(7) DEFAULT NULL COMMENT 'Codigo de periodo',
  `idpsn` bigint(20) DEFAULT NULL COMMENT 'Codigo de persona',
  `tpoccj` int(5) DEFAULT NULL COMMENT 'Tipo de concejo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `idcon` int(2) NOT NULL COMMENT 'Codigo de configuracion',
  `nitcon` varchar(255) DEFAULT NULL COMMENT 'Nit de configuracion',
  `titcon` varchar(100) DEFAULT NULL COMMENT 'Titulo de configuracion',
  `imgcon` varchar(255) DEFAULT NULL COMMENT 'Ruta de imagen de configuracion',
  `descon` varchar(255) DEFAULT NULL COMMENT 'Descripcion de configuracion',
  `piecon` varchar(255) DEFAULT NULL COMMENT 'Pie de pagina configuracion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `iddoc` bigint(10) DEFAULT NULL COMMENT 'Codigo de documentacion',
  `nomdoc` varchar(200) DEFAULT NULL COMMENT 'Nombre de documentacion',
  `idpsn` bigint(20) DEFAULT NULL COMMENT 'Codigo de persona',
  `fhdoc` datetime DEFAULT NULL COMMENT 'Fecha y hora de documentacion',
  `rutdoc` varchar(255) DEFAULT NULL COMMENT 'Ruta de la documentacion',
  `tpodoc` int(5) DEFAULT NULL COMMENT 'Tipo de documentacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dominio`
--

CREATE TABLE `dominio` (
  `iddom` int(5) NOT NULL COMMENT 'Codigo de dominio',
  `nomdom` varchar(255) DEFAULT NULL COMMENT 'Nombre de dominio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingegr`
--

CREATE TABLE `ingegr` (
  `idineg` bigint(20) NOT NULL COMMENT 'Codigo de ingreso o egreso',
  `tpoineg` int(5) DEFAULT NULL COMMENT 'Tipo de ingreso o egreso',
  `fhineg` datetime DEFAULT NULL COMMENT 'Fecha y hora de ingreso o egreso',
  `cctineg` varchar(255) DEFAULT NULL COMMENT 'Concepto de ingreso o egreso',
  `desineg` text DEFAULT NULL COMMENT 'Descripcion de ingreso o egreso',
  `valineg` bigint(20) DEFAULT NULL COMMENT 'Valor de ingreso o egreso',
  `sopineg` varchar(255) DEFAULT NULL COMMENT 'Soporte de ingreso o egreso',
  `idpsn` bigint(20) DEFAULT NULL COMMENT 'Codigo de persona',
  `idprd` bigint(7) DEFAULT NULL COMMENT 'Codigo de periodo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idnot` bigint(20) NOT NULL COMMENT 'Codigo de notificacion',
  `titnot` varchar(50) DEFAULT NULL COMMENT 'Titulo de notificacion',
  `fhnot` datetime DEFAULT NULL COMMENT 'Fecha y hora de notificacion',
  `ffinnot` datetime DEFAULT NULL COMMENT 'Fecha find de notificacion',
  `desnot` text DEFAULT NULL COMMENT 'Descripcion de notificacion',
  `idpsn` bigint(20) DEFAULT NULL COMMENT 'Codigo de persona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupante`
--

CREATE TABLE `ocupante` (
  `idpsn` bigint(20) DEFAULT NULL COMMENT 'Codigo de persona',
  `idviv` int(5) DEFAULT NULL COMMENT 'Codigo de vivienda',
  `tpoocu` int(5) DEFAULT NULL COMMENT 'Tipo de ocupante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `idpag` int(5) NOT NULL COMMENT 'Codigo de pagina',
  `nompag` varchar(255) DEFAULT NULL COMMENT 'Nombre de pagina',
  `rutpag` varchar(255) DEFAULT NULL COMMENT 'Ruta de pagina',
  `mospag` tinyint(1) DEFAULT NULL COMMENT 'Mostrar pagina',
  `ordpag` int(5) DEFAULT NULL COMMENT 'Orden de pagina',
  `icopag` varchar(100) DEFAULT NULL COMMENT 'Icono de pagina'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`idpag`, `nompag`, `rutpag`, `mospag`, `ordpag`, `icopag`) VALUES
(102, 'Pagos', 'views/vineg.php', 1, 3, 'fa-solid fa-hand-holding-dollar'),
(104, 'Notificacion', 'views/vnot.php', 1, 2, 'fa-regular fa-file'),
(107, 'Documentacion', 'views/vdoc.php', 1, 1, 'fa-regular fa-bell'),
(110, 'Perfil', 'views/vper.php', 1, 5, 'fa-solid fa-circle-user'),
(101, 'Persona', 'views/vpsn.php', 1, 6, 'fa-solid fa-users');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagper`
--

CREATE TABLE `pagper` (
  `idper` int(5) DEFAULT NULL COMMENT 'Codigo de perfil',
  `idpag` int(5) DEFAULT NULL COMMENT 'Codigo de pagina'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idper` int(5) NOT NULL COMMENT 'Codigo de perfil',
  `nomper` varchar(50) DEFAULT NULL COMMENT 'Nombre de perfil',
  `pagini` int(5) DEFAULT NULL COMMENT 'Pagina de inicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idper`, `nomper`, `pagini`) VALUES
(1, 'Superadmin', NULL),
(2, 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `idprd` bigint(7) NOT NULL COMMENT 'Codigo de periodo',
  `finiprd` date DEFAULT NULL COMMENT 'Fecha inicio de periodo',
  `ffinprd` date DEFAULT NULL COMMENT 'Fecha fin de periodo',
  `actprd` tinyint(1) DEFAULT NULL COMMENT 'Perido activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpsn` bigint(20) NOT NULL COMMENT 'Codigo de persona',
  `nompsn` varchar(50) DEFAULT NULL COMMENT 'Nombres de persona',
  `apepsn` varchar(50) DEFAULT NULL COMMENT 'Apellidos de persona',
  `docpsn` varchar(20) DEFAULT NULL COMMENT 'Numero de documento de persona',
  `tpdcpsn` int(5) DEFAULT NULL COMMENT 'Tipo de documento de persona',
  `telpsn` varchar(10) DEFAULT NULL COMMENT 'Telefono de persona',
  `emapsn` varchar(255) DEFAULT NULL COMMENT 'Email de persona',
  `passpsn` varchar(100) DEFAULT NULL COMMENT 'Contraseña de persona',
  `actpsn` tinyint(1) DEFAULT NULL COMMENT 'Persona activa',
  `idper` int(5) DEFAULT NULL COMMENT 'Codigo de persona',
  `genpsn` int(5) DEFAULT NULL COMMENT 'Genero de persona',
  `fhnapsn` date DEFAULT NULL COMMENT 'Fecha de nacimiento persona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE `valor` (
  `idval` int(5) NOT NULL COMMENT 'Codigo de valor',
  `nomval` varchar(255) DEFAULT NULL COMMENT 'Nombre de valor',
  `iddom` int(5) DEFAULT NULL COMMENT 'Codigo de dominio',
  `parval` varchar(255) DEFAULT NULL COMMENT 'Parametro de valor',
  `actval` tinyint(1) DEFAULT NULL COMMENT 'Valor activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vario`
--

CREATE TABLE `vario` (
  `idvar` bigint(20) NOT NULL COMMENT 'Codigo de vario',
  `idviv` int(5) DEFAULT NULL COMMENT 'codigo de vivienda',
  `nomvar` varchar(255) DEFAULT NULL COMMENT 'Nombre de vario',
  `tpovar` int(5) DEFAULT NULL COMMENT 'Tipo de vario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

CREATE TABLE `vivienda` (
  `idviv` int(5) NOT NULL COMMENT 'Codigo de vivienda',
  `idpsn` bigint(20) DEFAULT NULL COMMENT 'Codigo de persona',
  `tpoviv` int(5) DEFAULT NULL COMMENT 'Tipo de vivienda',
  `nomviv` varchar(50) DEFAULT NULL COMMENT 'Nombre de vivienda',
  `depviv` int(5) DEFAULT NULL COMMENT 'Depende de vivienda'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `concejo`
--
ALTER TABLE `concejo`
  ADD PRIMARY KEY (`idccj`),
  ADD KEY `ccjprd` (`idprd`),
  ADD KEY `ccjpsn` (`idpsn`),
  ADD KEY `cvtpcc` (`tpoccj`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`idcon`);

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD KEY `docpsn` (`idpsn`),
  ADD KEY `dvtpdc` (`tpodoc`);

--
-- Indices de la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`iddom`);

--
-- Indices de la tabla `ingegr`
--
ALTER TABLE `ingegr`
  ADD PRIMARY KEY (`idineg`),
  ADD KEY `ievtpie` (`tpoineg`),
  ADD KEY `iepsn` (`idpsn`),
  ADD KEY `ieprd` (`idprd`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idnot`),
  ADD KEY `notpsn` (`idpsn`);

--
-- Indices de la tabla `ocupante`
--
ALTER TABLE `ocupante`
  ADD KEY `ocupsn` (`idpsn`),
  ADD KEY `ocuviv` (`idviv`),
  ADD KEY `ovtpoc` (`tpoocu`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`idpag`);

--
-- Indices de la tabla `pagper`
--
ALTER TABLE `pagper`
  ADD KEY `pppag` (`idpag`),
  ADD KEY `ppper` (`idper`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idper`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`idprd`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpsn`),
  ADD KEY `psnper` (`idper`),
  ADD KEY `pvtpdcps` (`tpdcpsn`),
  ADD KEY `pvgnps` (`genpsn`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`idval`),
  ADD KEY `valdom` (`iddom`);

--
-- Indices de la tabla `vario`
--
ALTER TABLE `vario`
  ADD PRIMARY KEY (`idvar`),
  ADD KEY `varviv` (`idviv`),
  ADD KEY `vavtpva` (`tpovar`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`idviv`),
  ADD KEY `vivpsn` (`idpsn`),
  ADD KEY `vvtpvv` (`tpoviv`),
  ADD KEY `vvdpvv` (`depviv`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `concejo`
--
ALTER TABLE `concejo`
  MODIFY `idccj` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de consejo';

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idcon` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de configuracion';

--
-- AUTO_INCREMENT de la tabla `dominio`
--
ALTER TABLE `dominio`
  MODIFY `iddom` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de dominio';

--
-- AUTO_INCREMENT de la tabla `ingegr`
--
ALTER TABLE `ingegr`
  MODIFY `idineg` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de ingreso o egreso';

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idnot` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de notificacion';

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `idpag` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de pagina', AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idper` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de perfil', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `idprd` bigint(7) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de periodo';

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpsn` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de persona';

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `idval` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de valor';

--
-- AUTO_INCREMENT de la tabla `vario`
--
ALTER TABLE `vario`
  MODIFY `idvar` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de vario';

--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `idviv` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de vivienda';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concejo`
--
ALTER TABLE `concejo`
  ADD CONSTRAINT `ccjprd` FOREIGN KEY (`idprd`) REFERENCES `periodo` (`idprd`),
  ADD CONSTRAINT `ccjpsn` FOREIGN KEY (`idpsn`) REFERENCES `persona` (`idpsn`),
  ADD CONSTRAINT `cvtpcc` FOREIGN KEY (`tpoccj`) REFERENCES `valor` (`idval`);

--
-- Filtros para la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD CONSTRAINT `docpsn` FOREIGN KEY (`idpsn`) REFERENCES `persona` (`idpsn`),
  ADD CONSTRAINT `dvtpdc` FOREIGN KEY (`tpodoc`) REFERENCES `valor` (`idval`);

--
-- Filtros para la tabla `ingegr`
--
ALTER TABLE `ingegr`
  ADD CONSTRAINT `ieprd` FOREIGN KEY (`idprd`) REFERENCES `periodo` (`idprd`),
  ADD CONSTRAINT `iepsn` FOREIGN KEY (`idpsn`) REFERENCES `persona` (`idpsn`),
  ADD CONSTRAINT `ievtpie` FOREIGN KEY (`tpoineg`) REFERENCES `valor` (`idval`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notpsn` FOREIGN KEY (`idpsn`) REFERENCES `persona` (`idpsn`);

--
-- Filtros para la tabla `ocupante`
--
ALTER TABLE `ocupante`
  ADD CONSTRAINT `ocupsn` FOREIGN KEY (`idpsn`) REFERENCES `persona` (`idpsn`),
  ADD CONSTRAINT `ocuviv` FOREIGN KEY (`idviv`) REFERENCES `vivienda` (`idviv`),
  ADD CONSTRAINT `ovtpoc` FOREIGN KEY (`tpoocu`) REFERENCES `valor` (`idval`);

--
-- Filtros para la tabla `pagper`
--
ALTER TABLE `pagper`
  ADD CONSTRAINT `pppag` FOREIGN KEY (`idpag`) REFERENCES `pagina` (`idpag`),
  ADD CONSTRAINT `ppper` FOREIGN KEY (`idper`) REFERENCES `perfil` (`idper`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `psnper` FOREIGN KEY (`idper`) REFERENCES `perfil` (`idper`),
  ADD CONSTRAINT `pvgnps` FOREIGN KEY (`genpsn`) REFERENCES `valor` (`idval`),
  ADD CONSTRAINT `pvtpdcps` FOREIGN KEY (`tpdcpsn`) REFERENCES `valor` (`idval`);

--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `valdom` FOREIGN KEY (`iddom`) REFERENCES `dominio` (`iddom`);

--
-- Filtros para la tabla `vario`
--
ALTER TABLE `vario`
  ADD CONSTRAINT `varviv` FOREIGN KEY (`idviv`) REFERENCES `vivienda` (`idviv`),
  ADD CONSTRAINT `vavtpva` FOREIGN KEY (`tpovar`) REFERENCES `valor` (`idval`);

--
-- Filtros para la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD CONSTRAINT `vivpsn` FOREIGN KEY (`idpsn`) REFERENCES `persona` (`idpsn`),
  ADD CONSTRAINT `vvtpvv` FOREIGN KEY (`tpoviv`) REFERENCES `valor` (`idval`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
