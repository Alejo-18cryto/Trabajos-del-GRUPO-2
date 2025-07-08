-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2025 a las 06:34:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nomcategoria` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nomcategoria`) VALUES
(1, 'nuevo123'),
(3, 'nuevaacategoria2.222'),
(4, 'categoria1'),
(5, 'categoria2'),
(6, 'categoria3'),
(7, 'categoria4'),
(8, 'categoria5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nomcliente` varchar(128) NOT NULL,
  `ruccliente` varchar(11) DEFAULT NULL,
  `dircliente` varchar(128) DEFAULT NULL,
  `telcliente` varchar(9) DEFAULT NULL,
  `emailcliente` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nomcliente`, `ruccliente`, `dircliente`, `telcliente`, `emailcliente`) VALUES
(1, 'Cesar123', '45647897912', 'av.venezuelaa123', '979735545', 'cesar123@gmail.com'),
(2, 'Cesar123444', '45647897912', 'av.venezuelaa123123123323', '979735545', 'cesar@gmail.com22'),
(3, 'cliente1', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com'),
(4, 'cliente2', '4564789791', 'av.venezu', '9797355', 'sddsds3@gmail.com'),
(5, 'cliente3', '45647897912', 'av.venezu', '97972355', 'sddsds3@gmail.com'),
(6, 'cliente4', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com'),
(7, 'cliente5', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com'),
(8, 'cliente6', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com'),
(9, 'cliente7', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com'),
(10, 'cliente8', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com'),
(11, 'cliente9', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com'),
(12, 'cliente10', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionventa`
--

CREATE TABLE `condicionventa` (
  `idcondicion` int(11) NOT NULL,
  `nomcondicion` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `condicionventa`
--

INSERT INTO `condicionventa` (`idcondicion`, `nomcondicion`) VALUES
(1, 'contado '),
(4, 'credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `iddetalle` int(11) NOT NULL,
  `idfactura` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `cosuni` decimal(19,4) DEFAULT NULL,
  `preuni` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`iddetalle`, `idfactura`, `idproducto`, `cant`, `cosuni`, `preuni`) VALUES
(1, 1, 1, 2, 2.0000, 2.0000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idfactura` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `fechareg` datetime DEFAULT current_timestamp(),
  `idcondicion` int(11) DEFAULT NULL,
  `valorventa` decimal(10,4) DEFAULT NULL,
  `igv` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idfactura`, `fecha`, `idcliente`, `idusuario`, `fechareg`, `idcondicion`, `valorventa`, `igv`) VALUES
(1, '2025-07-17', 1, 1, '2025-07-06 22:45:59', 1, 0.0000, 0.0000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nomproducto` varchar(128) NOT NULL,
  `unimed` varchar(15) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `cosuni` decimal(10,4) DEFAULT NULL,
  `preuni` decimal(10,4) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `idproveedor` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nomproducto`, `unimed`, `stock`, `cosuni`, `preuni`, `idcategoria`, `idproveedor`, `estado`) VALUES
(1, 'nuevoproducto123', '22232', 224222, 111.0000, 111.0000, 1, 1, 'I'),
(2, 'nuevoproducto222222', '2111', 22222, 2211.0000, 22111.0000, 1, 1, 'A'),
(3, 'nuevoproducto222222ssss', '211133', 0, 221122.0000, 999999.9999, 3, 1, 'A'),
(4, 'Producto1', '333', 333, 333.0000, 33.0000, 3, 4, 'A'),
(5, 'Producto2', '333', 333, 333.0000, 33.0000, 1, 1, 'A'),
(6, 'Producto3', '333', 333, 333.0000, 33.0000, 1, 1, 'A'),
(7, 'Producto4', '333', 33, 333.0000, 33.0000, 1, 11, 'A'),
(8, 'Producto5', '333', 2222, 333.0000, 33.0000, 1, 10, 'A'),
(9, 'Producto6', '333', 3333, 333.0000, 33.0000, 1, 1, 'A'),
(10, 'Producto7', '333', 222, 333.0000, 33.0000, 1, 1, 'A'),
(11, 'Producto8', '333', 565654, 333.0000, 33.0000, 1, 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL,
  `nomproveedor` varchar(128) NOT NULL,
  `rucproveedor` varchar(11) DEFAULT NULL,
  `dirproveedor` varchar(128) DEFAULT NULL,
  `telproveedor` varchar(9) DEFAULT NULL,
  `emailproveedor` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `nomproveedor`, `rucproveedor`, `dirproveedor`, `telproveedor`, `emailproveedor`) VALUES
(1, 'nuevoproveedor123', '56464654123', 'av.nuevoproveedor123', '456465412', 'nuevoproveedor123@gmail.com'),
(3, 'Cesarasdfasdfasd', '45647897912', 'av.venezuelaasdds', '979735545', 'sddsds3@gmail.com'),
(4, 'proveedor1', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(5, 'proveedor2', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(6, 'proveedor3', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(7, 'proveedor4', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(8, 'proveedor5', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(9, 'proveedor6', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(10, 'proveedor7', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(11, 'proveedor8', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(12, 'proveedor9', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com'),
(13, 'proveedor10', '4156465', 'avproveedor', '55646', 'proveedor1@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nomusuario` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `apellidos` varchar(64) DEFAULT NULL,
  `nombres` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nomusuario`, `password`, `apellidos`, `nombres`, `email`, `estado`) VALUES
(1, 'maricielo123', '$2y$10$xkG7kE1EaQyOaAh35lLPnethyo7.HUdK/dfICvqV/67KegRFC31Mq', 'maricielo123', 'maricielo123', 'maricielo123@gmail.com', 'i'),
(2, 'prueba', '$2y$10$e2bSz58gx.6n8g9D3ZVnOeE5S7YaF57kkJ6w5q6dxV9a6gO1YfrWm', 'prueba123', 'prueba123', 'prueba@gmail.com', 'A'),
(3, 'prueba1', '$2y$10$5NM1ZHvdBi5aPYVbwIuekOF7Hpp2z6DmAfJty3r/0IEYcn1aBKJlq', 'prueba12322', 'prueba12322', 'prueba@gmail.com', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `condicionventa`
--
ALTER TABLE `condicionventa`
  ADD PRIMARY KEY (`idcondicion`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`iddetalle`),
  ADD KEY `idfactura` (`idfactura`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idcondicion` (`idcondicion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `idproveedor` (`idproveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `condicionventa`
--
ALTER TABLE `condicionventa`
  MODIFY `idcondicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`idfactura`) REFERENCES `facturas` (`idfactura`),
  ADD CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`idcondicion`) REFERENCES `condicionventa` (`idcondicion`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
