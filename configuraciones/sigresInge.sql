-- --------------------------------------------------------
-- Host:                         www.desofiw.xyz
-- Versión del servidor:         8.0.29-0ubuntu0.22.04.2 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sigresdesarrollo
CREATE DATABASE IF NOT EXISTS `sigresdesarrollo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sigresdesarrollo`;

-- Volcando estructura para tabla sigresdesarrollo.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `CodigoArea` int NOT NULL AUTO_INCREMENT,
  `Area` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `Descripcion` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `Imagen` blob NOT NULL,
  `Columnas` int NOT NULL,
  `Filas` int NOT NULL,
  `Habilitada` tinyint NOT NULL DEFAULT '1',
  `orden` int DEFAULT '1',
  PRIMARY KEY (`CodigoArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sigresdesarrollo.areas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.detalle_pedido
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `idregistro` int NOT NULL AUTO_INCREMENT,
  `NumeroPedido` int NOT NULL,
  `CodigoProducto` varchar(15) NOT NULL,
  `Cantidad` double NOT NULL,
  `Cancelado` tinyint DEFAULT '0',
  `Notas` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `Elaborado` tinyint DEFAULT '1',
  `Entregado` tinyint DEFAULT '1',
  `Facturado` tinyint DEFAULT '0',
  `subproducto` int DEFAULT '0',
  PRIMARY KEY (`idregistro`),
  KEY `fk_detalle_pedido_producto_idx` (`CodigoProducto`),
  KEY `FK_DePedidos_NumeroPedido` (`NumeroPedido`),
  CONSTRAINT `FK_DePedidos_NumeroPedido` FOREIGN KEY (`NumeroPedido`) REFERENCES `pedidos` (`NumeroPedido`),
  CONSTRAINT `fk_detalle_pedido_producto` FOREIGN KEY (`CodigoProducto`) REFERENCES `productos` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sigresdesarrollo.detalle_pedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_pedido` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.entrega_pedido
CREATE TABLE IF NOT EXISTS `entrega_pedido` (
  `iddetalle_pedido` int NOT NULL,
  `usuario` int NOT NULL,
  `fechahora` datetime DEFAULT CURRENT_TIMESTAMP,
  `identrega` int DEFAULT NULL,
  PRIMARY KEY (`iddetalle_pedido`),
  KEY `fk_entrega_pedido_usuario_idx` (`usuario`),
  CONSTRAINT `fk_entrega_pedido_detalle_pedido` FOREIGN KEY (`iddetalle_pedido`) REFERENCES `detalle_pedido` (`idregistro`),
  CONSTRAINT `fk_entrega_pedido_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idregistro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sigresdesarrollo.entrega_pedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `entrega_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrega_pedido` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.estaciones
CREATE TABLE IF NOT EXISTS `estaciones` (
  `NumeroEstacion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `activo` tinyint DEFAULT '1',
  `vistaprevia` tinyint DEFAULT '0',
  `tecladovirtual` tinyint DEFAULT '0',
  `nombretipo` tinyint(1) DEFAULT '1',
  `nombreproducto` tinyint(1) DEFAULT '1',
  `administracion` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`NumeroEstacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sigresdesarrollo.estaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `estaciones` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.mesas_x_area
CREATE TABLE IF NOT EXISTS `mesas_x_area` (
  `idregistro` int NOT NULL AUTO_INCREMENT,
  `CodigoArea` int NOT NULL,
  `Mesa` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `Estado` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `Habilitada` tinyint NOT NULL DEFAULT '1',
  `orden` int DEFAULT '1',
  `columna` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT 'A',
  `activa` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idregistro`),
  KEY `FK_Mesas_CodigoArea` (`CodigoArea`),
  CONSTRAINT `FK_Mesas_CodigoArea` FOREIGN KEY (`CodigoArea`) REFERENCES `areas` (`CodigoArea`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sigresdesarrollo.mesas_x_area: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mesas_x_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `mesas_x_area` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `NumeroPedido` int NOT NULL AUTO_INCREMENT,
  `idmesero` int NOT NULL,
  `fechahora` datetime DEFAULT CURRENT_TIMESTAMP,
  `Estacion` int NOT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `modalidad` enum('ME','DO','LL') CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `estado` enum('AAA','NNN','SNN','SSN','NNS','SNS','SSS','NSS','NSN') CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT 'NNN',
  PRIMARY KEY (`NumeroPedido`),
  KEY `fk_pedidos_idmesero_idx` (`idmesero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sigresdesarrollo.pedidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.pedidos_cancelados
CREATE TABLE IF NOT EXISTS `pedidos_cancelados` (
  `numeropedido` int NOT NULL,
  `usuario` int NOT NULL,
  `fechahora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`numeropedido`),
  KEY `fk_pedidos_cancelados_usuario_idx` (`usuario`),
  CONSTRAINT `fk_pedidos_cancelados_detallepedido` FOREIGN KEY (`numeropedido`) REFERENCES `detalle_pedido` (`idregistro`),
  CONSTRAINT `fk_pedidos_cancelados_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idregistro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sigresdesarrollo.pedidos_cancelados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos_cancelados` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_cancelados` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.pedidos_elaborados
CREATE TABLE IF NOT EXISTS `pedidos_elaborados` (
  `iddetallepedido` int NOT NULL,
  `idusuario` int NOT NULL,
  `fechahora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iddetallepedido`),
  KEY `fk_pedidos_elaborados_idusuario_idx` (`idusuario`),
  CONSTRAINT `fk_pedidos_elaborados_iddetallepedido` FOREIGN KEY (`iddetallepedido`) REFERENCES `detalle_pedido` (`idregistro`),
  CONSTRAINT `fk_pedidos_elaborados_idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idregistro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sigresdesarrollo.pedidos_elaborados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos_elaborados` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_elaborados` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.pedidos_llevar
CREATE TABLE IF NOT EXISTS `pedidos_llevar` (
  `idregistro` int NOT NULL AUTO_INCREMENT,
  `idpedido` int NOT NULL,
  `idcliente` int NOT NULL,
  PRIMARY KEY (`idregistro`),
  KEY `fk_pedidos_llevar_idpedido_idx` (`idpedido`),
  KEY `fk_pedidos_llevar_idcliente_idx` (`idcliente`),
  CONSTRAINT `fk_pedidos_llevar_idcliente` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idregistro`) ON UPDATE CASCADE,
  CONSTRAINT `fk_pedidos_llevar_idpedido` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`NumeroPedido`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sigresdesarrollo.pedidos_llevar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos_llevar` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_llevar` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.pedidos_mesa
CREATE TABLE IF NOT EXISTS `pedidos_mesa` (
  `idregistro` int NOT NULL AUTO_INCREMENT,
  `idpedido` int NOT NULL,
  `idmesa` int NOT NULL,
  `cuenta` int NOT NULL DEFAULT '1',
  `nombrecuenta` varchar(45) NOT NULL DEFAULT 'CUNSUMIDOR FINAL',
  PRIMARY KEY (`idregistro`),
  KEY `fk_pedidos_mesa_idpedido_idx` (`idpedido`),
  KEY `fk_pedidos_mesa_idmesa_idx` (`idmesa`),
  CONSTRAINT `fk_pedidos_mesa_idmesa` FOREIGN KEY (`idmesa`) REFERENCES `mesas_x_area` (`idregistro`) ON UPDATE CASCADE,
  CONSTRAINT `fk_pedidos_mesa_idpedido` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`NumeroPedido`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sigresdesarrollo.pedidos_mesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos_mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_mesa` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.pedidos_x_ventas
CREATE TABLE IF NOT EXISTS `pedidos_x_ventas` (
  `NumeroFactura` int NOT NULL,
  `NumeroPedido` int NOT NULL,
  KEY `FK_NumeroPedido_Pedidos` (`NumeroPedido`),
  KEY `FK_NumeroFactura_Ventas_idx` (`NumeroFactura`),
  CONSTRAINT `FK_NumeroFactura_Ventas` FOREIGN KEY (`NumeroFactura`) REFERENCES `ventas` (`idregistro`) ON UPDATE CASCADE,
  CONSTRAINT `FK_NumeroPedido_Pedidos` FOREIGN KEY (`NumeroPedido`) REFERENCES `pedidos` (`NumeroPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sigresdesarrollo.pedidos_x_ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos_x_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_x_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `Codigo` varchar(15) NOT NULL,
  `Nombre` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `Descripcion` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `TipoProducto` int NOT NULL,
  `Existencia` double NOT NULL,
  `Precio` double NOT NULL,
  `Costo` double NOT NULL,
  `CantidadMinima` double NOT NULL,
  `exento` tinyint(1) DEFAULT '0',
  `Imagen` longblob,
  `Habilitado` tinyint DEFAULT '1',
  `tipo2` enum('GE','EL','PR','AL') DEFAULT 'GE',
  `orden` int DEFAULT '1',
  `impuestov` double DEFAULT '0',
  `impuestoValor` double DEFAULT '0',
  `ultimo` double DEFAULT '0',
  `nombreImagen` varchar(250) DEFAULT NULL,
  `idprincipal` varchar(15) DEFAULT NULL,
  `cantidadprincipal` double DEFAULT '0',
  `idusuario` int DEFAULT NULL,
  `movimiento` varchar(45) DEFAULT 'N/A',
  PRIMARY KEY (`Codigo`),
  KEY `TipoProducto` (`TipoProducto`),
  KEY `FK_Productos_Principal_idx` (`idprincipal`),
  CONSTRAINT `FK_Productos_Principal` FOREIGN KEY (`idprincipal`) REFERENCES `productos` (`Codigo`),
  CONSTRAINT `FK_Productos_Tipo` FOREIGN KEY (`TipoProducto`) REFERENCES `tipoproducto` (`CodigoTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sigresdesarrollo.productos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla sigresdesarrollo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idregistro` int NOT NULL AUTO_INCREMENT,
  `LoginUsuario` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `empleado` int NOT NULL,
  `Contrasena` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `AccesoTotal` tinyint DEFAULT '0',
  `Habilitado` tinyint DEFAULT '1',
  `pin` varchar(4) COLLATE utf8_spanish_ci DEFAULT '0000',
  `fallidos` int DEFAULT '0',
  `correo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` enum('BL','AC','IN') COLLATE utf8_spanish_ci DEFAULT 'AC',
  PRIMARY KEY (`idregistro`),
  UNIQUE KEY `LoginUsuario_UNIQUE` (`LoginUsuario`),
  KEY `IdentidadEmpleado` (`empleado`),
  CONSTRAINT `FK_IdentidadUsuario_Empleado` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`idregistro`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla sigresdesarrollo.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idregistro`, `LoginUsuario`, `empleado`, `Contrasena`, `AccesoTotal`, `Habilitado`, `pin`, `fallidos`, `correo`, `estado`) VALUES
	(1, 'caflores', 1, '123456', 1, 1, '5331', 0, 'cflores@unicah.edu', 'AC');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
