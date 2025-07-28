-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2025 a las 04:02:55
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
-- Base de datos: `ventasfacturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` char(2) NOT NULL,
  `nomcategoria` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nomcategoria`) VALUES
('C1', 'Abarrotes'),
('C2', 'Lácteos'),
('C3', 'Limpieza'),
('C4', 'Bebidas'),
('C5', 'Panadería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `ndociente` varchar(128) DEFAULT NULL,
  `ruccliente` varchar(11) DEFAULT NULL,
  `tidentite` varchar(128) DEFAULT NULL,
  `tcliente` varchar(9) DEFAULT NULL,
  `emailcliente` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `ndociente`, `ruccliente`, `tidentite`, `tcliente`, `emailcliente`) VALUES
(1, 'Juan Pérez', '10456789123', 'DNI', 'Natural', 'juan.perez@gmail.com'),
(2, 'María López', '10234567891', 'DNI', 'Natural', 'maria.lopez@yahoo.com'),
(3, 'Empresa XYZ S.A.', '20123456789', 'RUC', 'Jurídico', 'contacto@xyz.com'),
(4, 'Carlos Gómez', '10432198765', 'DNI', 'Natural', 'carlos.gomez@hotmail.com'),
(5, 'Ana Torres', '10567812345', 'DNI', 'Natural', 'ana.torres@gmail.com'),
(6, 'Distribuidora ABC S.R.L.', '20654321876', 'RUC', 'Jurídico', 'ventas@abc.com'),
(7, 'Luis Chávez', '10321456789', 'DNI', 'Natural', 'luis.chavez@outlook.com'),
(8, 'Sofía Martínez', '10765432109', 'DNI', 'Natural', 'sofia.martinez@gmail.com'),
(9, 'Inversiones LIMA S.A.C.', '20456712345', 'RUC', 'Jurídico', 'admin@limasac.com'),
(10, 'Pedro Ramírez', '10987654321', 'DNI', 'Natural', 'pedro.ramirez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_venta`
--

CREATE TABLE `condicion_venta` (
  `idcondicion` char(2) NOT NULL,
  `nomcondicion` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `condicion_venta`
--

INSERT INTO `condicion_venta` (`idcondicion`, `nomcondicion`) VALUES
('01', 'Contado'),
('02', 'Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `iddetalle` int(11) NOT NULL,
  `idfactura` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `cosuni` decimal(19,4) DEFAULT NULL,
  `preuni` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idfactura` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `fechareg` datetime DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idcondicion` char(2) DEFAULT NULL,
  `valorventa` decimal(10,4) DEFAULT NULL,
  `igv` decimal(10,4) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `idproveedor` char(3) DEFAULT NULL,
  `nomproducto` varchar(128) DEFAULT NULL,
  `unimed` varchar(15) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `cosuni` decimal(10,4) DEFAULT NULL,
  `preuni` decimal(10,4) DEFAULT NULL,
  `idcategoria` char(2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `idproveedor`, `nomproducto`, `unimed`, `stock`, `cosuni`, `preuni`, `idcategoria`, `estado`) VALUES
(1, 'P01', 'Arroz Extra 1kg', 'kg', 100, 2.3000, 3.0000, 'C1', 'A'),
(2, 'P02', 'Leche Gloria 400g', 'unidad', 200, 2.0000, 2.5000, 'C2', 'A'),
(3, 'P03', 'Detergente Ariel 500g', 'unidad', 150, 3.5000, 4.2000, 'C3', 'A'),
(4, 'P04', 'Inca Kola 1.5L', 'botella', 120, 2.8000, 3.5000, 'C4', 'A'),
(5, 'P05', 'Pan de molde Bimbo', 'paquete', 80, 3.0000, 4.0000, 'C5', 'A'),
(6, 'P06', 'Fideos Don Vittorio 500g', 'paquete', 100, 1.8000, 2.5000, 'C1', 'A'),
(7, 'P07', 'Yogurt Laive 1L', 'unidad', 90, 3.2000, 4.0000, 'C2', 'A'),
(8, 'P08', 'Cloro Sapolio 1L', 'botella', 60, 2.1000, 2.8000, 'C3', 'A'),
(9, 'P09', 'Cerveza Cristal 630ml', 'botella', 70, 3.5000, 5.0000, 'C4', 'A'),
(10, 'P10', 'Pan francés', 'unidad', 500, 0.1500, 0.3000, 'C5', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` char(3) NOT NULL,
  `nomproveedor` varchar(128) DEFAULT NULL,
  `rucproveedor` varchar(11) DEFAULT NULL,
  `dirproveedor` varchar(128) DEFAULT NULL,
  `telproveedor` varchar(9) DEFAULT NULL,
  `emailproveedor` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `nomproveedor`, `rucproveedor`, `dirproveedor`, `telproveedor`, `emailproveedor`) VALUES
('P01', 'Distribuciones Norte S.A.', '20123456789', 'Av. Perú 123', '987654321', 'ventas@norte.com'),
('P02', 'Central Proveedores SAC', '20456789123', 'Jr. Lima 456', '912345678', 'contacto@central.com'),
('P03', 'Mercantil Andina', '20543219876', 'Av. Bolívar 789', '922334455', 'mercantil@andina.com'),
('P04', 'Global Supply', '20765432109', 'Av. América 321', '933445566', 'info@globalsupply.com'),
('P05', 'SuperProveedores S.R.L.', '20678912345', 'Jr. Arequipa 852', '944556677', 'ventas@superpro.com'),
('P06', 'Alimentos S.A.C.', '20321456789', 'Av. Brasil 963', '955667788', 'info@alimentos.com'),
('P07', 'Lácteos del Sur', '20876543210', 'Calle Puno 753', '966778899', 'contacto@lacteos.com'),
('P08', 'Panadería El Molino', '20987654321', 'Av. Cusco 951', '977889900', 'ventas@molino.com'),
('P09', 'Importadora Lima', '20234567890', 'Jr. Piura 123', '988990011', 'info@importlima.com'),
('P10', 'Distribuidora Santa Fe', '20198765432', 'Av. Tacna 555', '999001122', 'ventas@santafe.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nomusuario` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `apellidos` varchar(64) DEFAULT NULL,
  `nombres` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nomusuario`, `password`, `apellidos`, `nombres`, `email`, `estado`) VALUES
(1, 'admin', 'admin123', 'López', 'Mario', 'admin@empresa.com', 'A'),
(2, 'vendedor1', 'vend123', 'Huamán', 'Carmen', 'carmen@ventas.com', 'A'),
(3, 'vendedor2', 'vend456', 'Torres', 'José', 'jose@ventas.com', 'A'),
(4, 'ejemplo1', '$2y$10$hHwnthtS5MT8dmpkdT61t.3NFKsJb6GcW4ab/LXdvr4FpUj7UWCn.', 'ejemplo', 'ej', 'ejemplo@gmail.com', 'A');

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
-- Indices de la tabla `condicion_venta`
--
ALTER TABLE `condicion_venta`
  ADD PRIMARY KEY (`idcondicion`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`iddetalle`),
  ADD KEY `idfactura` (`idfactura`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idcondicion` (`idcondicion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idproveedor` (`idproveedor`),
  ADD KEY `idcategoria` (`idcategoria`);

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
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`idfactura`) REFERENCES `facturas` (`idfactura`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `facturas_ibfk_4` FOREIGN KEY (`idcondicion`) REFERENCES `condicion_venta` (`idcondicion`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedor`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
