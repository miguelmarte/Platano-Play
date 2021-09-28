-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2019 a las 20:25:09
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `platano_play`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `Nombre`, `Usuario`, `password`, `estado`) VALUES
(1, 'Platanero', 'admin', 'admin', 'A'),
(2, 'ad', 'admin2', 'admin', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE `albums` (
  `id_album` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `id_artista` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL DEFAULT 1,
  `portada` varchar(80) NOT NULL DEFAULT 'album_platano.png',
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id_album`, `nombre`, `id_artista`, `id_genero`, `portada`, `estado`) VALUES
(2, 'El platanero RD', 1, 1, 'album_platano.png', 'A'),
(3, 'juan', 1, 2, 'bailando.png', 'A'),
(4, 'asdsad', 2, 3, 'album_platano.png', 'A'),
(6, 'prueba2', 1, 1, 'Platano Play Gold.png', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id_artista` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `correo_electronico` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img_perfil` varchar(100) NOT NULL DEFAULT 'imagenes_perfil/user.png',
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id_artista`, `nombre`, `id_genero`, `correo_electronico`, `password`, `img_perfil`, `estado`) VALUES
(1, 'El platanero RD', 1, 'platanero@gmail.com', '1234', 'imagenes_perfil/fisica 1.JPG', 'A'),
(2, 'miguel', 2, 'jose@gmail.com', 'jose0412', 'imagenes_perfil/user.png	', 'A'),
(3, 'jose', 3, 'jose1@gmail.com', 'jose0412', 'imagenes_perfil/user.png	', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `Correo_Electronico` varchar(60) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `fecha_registro` date NOT NULL,
  `Estado_Premium` varchar(1) NOT NULL DEFAULT 'I',
  `token_recu` varchar(9) DEFAULT NULL,
  `intentos_login` int(11) DEFAULT 0,
  `img_perfil` varchar(150) DEFAULT 'imagenes_perfil/user_13230.png',
  `color_fondo` varchar(20) NOT NULL DEFAULT '#000000',
  `color_nav` varchar(20) NOT NULL DEFAULT '#000000',
  `color_fuente` varchar(20) NOT NULL DEFAULT '#ffffff',
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nombre`, `fecha_nacimiento`, `Correo_Electronico`, `pass`, `fecha_registro`, `Estado_Premium`, `token_recu`, `intentos_login`, `img_perfil`, `color_fondo`, `color_nav`, `color_fuente`, `estado`) VALUES
(4, 'Miguel Jose m', '2003-02-16', 'mjml0412@gmail.com', '12345678', '2019-10-02', 'A', '0', 2, 'imagenes_perfil/user_13230.png', '#000000', '#1b8409', '#fffbfb', 'A'),
(5, 'Miguel Jose', '2004-02-15', 'mjml04121@gmail.com', '12345678', '2019-10-09', 'I', '', 0, NULL, '#000000', '0', '#ffffff', 'A'),
(6, 'jose', '2002-01-15', '123@gmail.com', '12345678', '2019-11-07', 'I', '', 0, NULL, '#000000', '0', '#ffffff', 'A'),
(7, 'juan', '2005-11-15', 'Juanito@gmail.com', '12345678', '2019-11-10', 'I', '', 0, NULL, '#000000', '0', '#ffffff', 'A'),
(8, 'juan', '2005-09-16', 'Juanito1@gmail.com', '12345678a', '2019-11-10', 'I', '', 0, NULL, '#000000', '0', '#ffffff', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `id_cliente`, `asunto`, `detalle`, `estado`) VALUES
(2, 4, 'asd', 'asd', 'A'),
(3, 4, 'asd', 'adsd', 'A'),
(4, 4, 'das', 'asdas', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`, `estado`) VALUES
(1, 'Bachata', 'A'),
(2, 'Trap', 'A'),
(3, 'Merengue', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_reproduccion`
--

CREATE TABLE `lista_reproduccion` (
  `id_lista_reproduccion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_musica` int(11) NOT NULL,
  `id_nombre_lista` int(11) NOT NULL,
  `estado` varchar(11) NOT NULL DEFAULT 'A',
  `estado_favorito` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musica`
--

CREATE TABLE `musica` (
  `id_musica` int(11) NOT NULL,
  `id_artista` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL DEFAULT 1,
  `id_album` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `musica` varchar(200) NOT NULL,
  `duracion` int(11) NOT NULL,
  `explisito` varchar(1) NOT NULL DEFAULT 'I',
  `autorizacion` varchar(1) NOT NULL DEFAULT 'I',
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `musica`
--

INSERT INTO `musica` (`id_musica`, `id_artista`, `id_genero`, `id_album`, `titulo`, `fecha`, `musica`, `duracion`, `explisito`, `autorizacion`, `estado`) VALUES
(2, 1, 3, 2, 'Rauw Alejandro ? Farruko - Fantasï¿½as', '2019-11-15', 'musica.mp3', 1, 'A', 'A', 'A'),
(3, 1, 2, 2, 'Lluvia', '2019-11-15', 'musica2.mp3', 2, 'I', 'A', 'A'),
(4, 1, 1, 2, 'prueba 1', '2019-11-27', 'Rauw Alejandro âŒ Farruko - FantasÃ­as (Video Oficial).m4a', 2, 'I', 'A', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_lista`
--

CREATE TABLE `nombre_lista` (
  `id_nombre_lista` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_Pago` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `Dirreccion_Pago` varchar(100) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones_administrador`
--

CREATE TABLE `sesiones_administrador` (
  `id_sesion` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesiones_administrador`
--

INSERT INTO `sesiones_administrador` (`id_sesion`, `usuario`, `fecha`, `hora`) VALUES
(21, 'admin', '2019-11-10', '06:58:00'),
(22, 'admin', '2019-11-10', '06:59:00'),
(23, 'admin', '2019-11-10', '06:59:00'),
(24, 'admin', '2019-11-10', '07:24:00'),
(25, 'admin', '2019-11-12', '11:17:00'),
(26, 'admin', '2019-11-12', '12:26:00'),
(27, 'admin', '2019-11-12', '02:14:00'),
(28, 'admin', '2019-11-13', '09:30:00'),
(29, 'admin', '2019-11-13', '03:53:00'),
(30, 'admin', '2019-11-13', '03:54:00'),
(31, 'admin', '2019-11-13', '03:55:00'),
(32, 'admin', '2019-11-13', '03:58:00'),
(33, 'admin', '2019-11-13', '04:01:00'),
(34, 'admin', '2019-11-13', '04:02:00'),
(35, 'admin', '2019-11-13', '04:15:00'),
(36, 'admin', '2019-11-13', '06:28:00'),
(37, 'admin', '2019-11-13', '07:11:00'),
(38, 'admin', '2019-11-13', '09:44:00'),
(39, 'admin', '2019-11-14', '02:43:00'),
(40, 'admin', '2019-11-14', '03:35:00'),
(41, 'admin', '2019-11-14', '06:13:00'),
(42, 'admin', '2019-11-15', '02:23:00'),
(43, 'admin', '2019-11-16', '09:29:00'),
(44, 'admin', '2019-11-17', '03:38:00'),
(45, 'admin', '2019-11-18', '06:19:00'),
(46, 'admin', '2019-11-18', '07:51:00'),
(47, 'admin', '2019-11-18', '08:38:00'),
(48, 'admin', '2019-11-18', '06:11:00'),
(49, 'admin', '2019-11-19', '01:48:00'),
(50, 'admin', '2019-11-19', '06:21:00'),
(51, 'admin', '2019-11-20', '03:56:00'),
(52, 'admin', '2019-11-20', '03:59:00'),
(53, 'admin', '2019-11-20', '07:32:00'),
(54, 'admin', '2019-11-21', '06:37:00'),
(55, 'admin', '2019-11-27', '11:00:00'),
(56, 'admin', '2019-11-27', '12:52:00'),
(57, 'admin', '2019-11-27', '03:22:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_artista` (`id_artista`);

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id_artista`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `Correo_Electronico` (`Correo_Electronico`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD UNIQUE KEY `genero` (`genero`);

--
-- Indices de la tabla `lista_reproduccion`
--
ALTER TABLE `lista_reproduccion`
  ADD PRIMARY KEY (`id_lista_reproduccion`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_musica` (`id_musica`),
  ADD KEY `id_nombre_lista` (`id_nombre_lista`);

--
-- Indices de la tabla `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`id_musica`),
  ADD UNIQUE KEY `titulo` (`titulo`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_artista` (`id_artista`),
  ADD KEY `id_album` (`id_album`);

--
-- Indices de la tabla `nombre_lista`
--
ALTER TABLE `nombre_lista`
  ADD PRIMARY KEY (`id_nombre_lista`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_Pago`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `sesiones_administrador`
--
ALTER TABLE `sesiones_administrador`
  ADD PRIMARY KEY (`id_sesion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lista_reproduccion`
--
ALTER TABLE `lista_reproduccion`
  MODIFY `id_lista_reproduccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `musica`
--
ALTER TABLE `musica`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nombre_lista`
--
ALTER TABLE `nombre_lista`
  MODIFY `id_nombre_lista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_Pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesiones_administrador`
--
ALTER TABLE `sesiones_administrador`
  MODIFY `id_sesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id_artista`);

--
-- Filtros para la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD CONSTRAINT `artistas_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `lista_reproduccion`
--
ALTER TABLE `lista_reproduccion`
  ADD CONSTRAINT `lista_reproduccion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `lista_reproduccion_ibfk_2` FOREIGN KEY (`id_musica`) REFERENCES `musica` (`id_musica`),
  ADD CONSTRAINT `lista_reproduccion_ibfk_3` FOREIGN KEY (`id_nombre_lista`) REFERENCES `nombre_lista` (`id_nombre_lista`);

--
-- Filtros para la tabla `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `musica_ibfk_2` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`id_artista`),
  ADD CONSTRAINT `musica_ibfk_3` FOREIGN KEY (`id_album`) REFERENCES `albums` (`id_album`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
