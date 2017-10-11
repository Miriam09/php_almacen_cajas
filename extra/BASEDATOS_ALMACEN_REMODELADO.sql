-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.26-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para almacen_cajas_2015
DROP DATABASE IF EXISTS `almacen_cajas_2015`;
CREATE DATABASE IF NOT EXISTS `almacen_cajas_2015` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `almacen_cajas_2015`;


-- Volcando estructura para tabla almacen_cajas_2015.backupfuerte
DROP TABLE IF EXISTS `backupfuerte`;
CREATE TABLE IF NOT EXISTS `backupfuerte` (
  `CODIGO` int(10) unsigned NOT NULL,
  `ALTURA` int(10) unsigned NOT NULL,
  `ANCHURA` int(10) unsigned NOT NULL,
  `PROFUNDIDAD` int(10) unsigned NOT NULL,
  `COLOR` varchar(15) NOT NULL,
  `CLAVE_DESBLOQUEO` varchar(25) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  `ESTANTERIA` int(10) unsigned NOT NULL,
  `LEJA` int(10) unsigned NOT NULL,
  `FECHA_SALIDA` date NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla almacen_cajas_2015.backupfuerte: ~3 rows (aproximadamente)
DELETE FROM `backupfuerte`;
/*!40000 ALTER TABLE `backupfuerte` DISABLE KEYS */;
INSERT INTO `backupfuerte` (`CODIGO`, `ALTURA`, `ANCHURA`, `PROFUNDIDAD`, `COLOR`, `CLAVE_DESBLOQUEO`, `FECHA_ENTRADA`, `ESTANTERIA`, `LEJA`, `FECHA_SALIDA`) VALUES
	(1, 84, 51, 20, '#2d4755', '45sd8r', '2015-10-16', 3, 1, '2015-11-03'),
	(2, 60, 45, 20, '#006c00', '85df4r1', '2015-10-19', 3, 3, '2015-11-03'),
	(10, 12, 15, 16, '#804000', 'ASJFR654', '2015-11-14', 9, 4, '2015-11-15');
/*!40000 ALTER TABLE `backupfuerte` ENABLE KEYS */;


-- Volcando estructura para tabla almacen_cajas_2015.backupnegra
DROP TABLE IF EXISTS `backupnegra`;
CREATE TABLE IF NOT EXISTS `backupnegra` (
  `CODIGO` int(10) unsigned NOT NULL,
  `ALTURA` int(10) unsigned NOT NULL,
  `ANCHURA` int(10) unsigned NOT NULL,
  `PROFUNDIDAD` int(10) unsigned NOT NULL,
  `COLOR` varchar(15) NOT NULL,
  `PLACA` varchar(25) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  `ESTANTERIA` int(10) unsigned NOT NULL,
  `LEJA` int(10) unsigned NOT NULL,
  `FECHA_SALIDA` date NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla almacen_cajas_2015.backupnegra: ~4 rows (aproximadamente)
DELETE FROM `backupnegra`;
/*!40000 ALTER TABLE `backupnegra` DISABLE KEYS */;
INSERT INTO `backupnegra` (`CODIGO`, `ALTURA`, `ANCHURA`, `PROFUNDIDAD`, `COLOR`, `PLACA`, `FECHA_ENTRADA`, `ESTANTERIA`, `LEJA`, `FECHA_SALIDA`) VALUES
	(1, 45, 52, 11, '#ff8000', 'ASUS', '2015-10-16', 2, 1, '2015-11-03'),
	(2, 58, 65, 10, '#ff8000', 'PINDERFARI', '2015-10-19', 1, 4, '2015-11-03'),
	(4, 8, 6, 5, '#ff8000', 'ASDFA5', '2015-11-03', 5, 3, '2015-11-12'),
	(6, 20, 32, 10, '#ff8000', 'PLT62', '2015-11-13', 9, 5, '2015-11-13');
/*!40000 ALTER TABLE `backupnegra` ENABLE KEYS */;


-- Volcando estructura para tabla almacen_cajas_2015.backupsorpresa
DROP TABLE IF EXISTS `backupsorpresa`;
CREATE TABLE IF NOT EXISTS `backupsorpresa` (
  `CODIGO` int(10) unsigned NOT NULL,
  `ALTURA` int(10) unsigned NOT NULL,
  `ANCHURA` int(10) unsigned NOT NULL,
  `PROFUNDIDAD` int(10) unsigned NOT NULL,
  `COLOR` varchar(15) NOT NULL,
  `CONTENIDO` varchar(25) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  `ESTANTERIA` int(10) unsigned NOT NULL,
  `LEJA` int(10) unsigned NOT NULL,
  `FECHA_SALIDA` date NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_2015.backupsorpresa: ~2 rows (aproximadamente)
DELETE FROM `backupsorpresa`;
/*!40000 ALTER TABLE `backupsorpresa` DISABLE KEYS */;
INSERT INTO `backupsorpresa` (`CODIGO`, `ALTURA`, `ANCHURA`, `PROFUNDIDAD`, `COLOR`, `CONTENIDO`, `FECHA_ENTRADA`, `ESTANTERIA`, `LEJA`, `FECHA_SALIDA`) VALUES
	(1, 45, 65, 84, '#ff0080', 'Boli', '2015-10-16', 1, 2, '2015-11-03'),
	(10, 5, 8, 4, '#000080', 'Algo mas', '2015-11-03', 2, 2, '2015-11-12');
/*!40000 ALTER TABLE `backupsorpresa` ENABLE KEYS */;


-- Volcando estructura para tabla almacen_cajas_2015.cajafuerte
DROP TABLE IF EXISTS `cajafuerte`;
CREATE TABLE IF NOT EXISTS `cajafuerte` (
  `CODIGO` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ALTURA` int(10) unsigned NOT NULL,
  `ANCHURA` int(10) unsigned NOT NULL,
  `PROFUNDIDAD` int(10) unsigned NOT NULL,
  `CLAVE_DESBLOQUEO` varchar(25) NOT NULL,
  `COLOR` varchar(15) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_2015.cajafuerte: ~7 rows (aproximadamente)
DELETE FROM `cajafuerte`;
/*!40000 ALTER TABLE `cajafuerte` DISABLE KEYS */;
INSERT INTO `cajafuerte` (`CODIGO`, `ALTURA`, `ANCHURA`, `PROFUNDIDAD`, `CLAVE_DESBLOQUEO`, `COLOR`, `FECHA_ENTRADA`) VALUES
	(5, 85, 65, 25, 'ghj5kfd', '#6b66aa', '2015-11-15'),
	(6, 85, 64, 43, '6465FG', '#400080', '2015-11-03'),
	(7, 85, 65, 45, 'ADF87', '#408080', '2015-11-03'),
	(8, 12, 16, 25, 'ASDA654AF1', '#800080', '2015-11-13'),
	(9, 35, 12, 16, '154ASDFR6', '#408080', '2015-11-13'),
	(11, 45, 46, 10, 'aslfh8q23', '#808000', '2015-11-22'),
	(12, 45, 46, 10, 'aslfh8q23', '#808000', '2015-11-15');
/*!40000 ALTER TABLE `cajafuerte` ENABLE KEYS */;


-- Volcando estructura para tabla almacen_cajas_2015.cajanegra
DROP TABLE IF EXISTS `cajanegra`;
CREATE TABLE IF NOT EXISTS `cajanegra` (
  `CODIGO` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ALTURA` int(10) unsigned NOT NULL,
  `ANCHURA` int(10) unsigned NOT NULL,
  `PROFUNDIDAD` int(10) unsigned NOT NULL,
  `PLACA` varchar(25) NOT NULL,
  `COLOR` varchar(15) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_2015.cajanegra: ~3 rows (aproximadamente)
DELETE FROM `cajanegra`;
/*!40000 ALTER TABLE `cajanegra` DISABLE KEYS */;
INSERT INTO `cajanegra` (`CODIGO`, `ALTURA`, `ANCHURA`, `PROFUNDIDAD`, `PLACA`, `COLOR`, `FECHA_ENTRADA`) VALUES
	(3, 85, 9, 12, 'ADFR', '#ff8000', '2015-11-03'),
	(5, 65, 41, 43, 'ASD567', '#ff8000', '2015-11-13'),
	(7, 31, 40, 61, 'BR14C', '#ff8000', '2015-11-13');
/*!40000 ALTER TABLE `cajanegra` ENABLE KEYS */;


-- Volcando estructura para tabla almacen_cajas_2015.cajasorpresa
DROP TABLE IF EXISTS `cajasorpresa`;
CREATE TABLE IF NOT EXISTS `cajasorpresa` (
  `CODIGO` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ALTURA` int(10) unsigned NOT NULL,
  `ANCHURA` int(10) unsigned NOT NULL,
  `PROFUNDIDAD` int(10) unsigned NOT NULL,
  `CONTENIDO` varchar(25) NOT NULL,
  `COLOR` varchar(15) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_2015.cajasorpresa: ~5 rows (aproximadamente)
DELETE FROM `cajasorpresa`;
/*!40000 ALTER TABLE `cajasorpresa` DISABLE KEYS */;
INSERT INTO `cajasorpresa` (`CODIGO`, `ALTURA`, `ANCHURA`, `PROFUNDIDAD`, `CONTENIDO`, `COLOR`, `FECHA_ENTRADA`) VALUES
	(2, 89, 52, 31, 'Goma', '#9102bf', '2015-11-15'),
	(8, 45, 85, 74, 'Papel', '#ff0080', '2015-11-13'),
	(9, 85, 96, 4, 'Algo', '#80ff00', '2015-11-03'),
	(11, 64, 65, 54, 'Goma', '#ff0000', '2015-11-03'),
	(12, 45, 85, 64, 'Movil', '#852ccd', '2015-11-22');
/*!40000 ALTER TABLE `cajasorpresa` ENABLE KEYS */;


-- Volcando estructura para tabla almacen_cajas_2015.estanteria
DROP TABLE IF EXISTS `estanteria`;
CREATE TABLE IF NOT EXISTS `estanteria` (
  `CODIGO_ESTANTERIA` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NUMERO_LEJAS` int(10) unsigned NOT NULL,
  `NUMERO_LEJAS_OCUPADAS` int(10) unsigned NOT NULL DEFAULT '0',
  `MATERIAL` varchar(30) NOT NULL,
  `PASILLO` varchar(1) NOT NULL,
  `NUMERO_ESTANTERIA` int(10) unsigned NOT NULL,
  PRIMARY KEY (`CODIGO_ESTANTERIA`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_2015.estanteria: ~15 rows (aproximadamente)
DELETE FROM `estanteria`;
/*!40000 ALTER TABLE `estanteria` DISABLE KEYS */;
INSERT INTO `estanteria` (`CODIGO_ESTANTERIA`, `NUMERO_LEJAS`, `NUMERO_LEJAS_OCUPADAS`, `MATERIAL`, `PASILLO`, `NUMERO_ESTANTERIA`) VALUES
	(1, 5, 2, 'Metal', 'A', 1),
	(2, 3, 1, 'Aluminio', 'A', 2),
	(3, 6, 3, 'Madera', 'B', 1),
	(5, 5, 3, 'Acero', 'C', 1),
	(6, 4, 3, 'Aluminio', 'B', 2),
	(7, 6, 1, 'Madera', 'C', 2),
	(8, 2, 0, 'Papel', 'D', 1),
	(9, 6, 0, 'Papel', 'D', 2),
	(10, 2, 0, 'Aluminio', 'E', 1),
	(11, 4, 1, 'Acero', 'E', 2),
	(12, 3, 1, 'Madera', 'E', 3),
	(13, 2, 0, 'Aluminio', 'A', 3),
	(14, 3, 0, 'Aluminio', 'B', 3),
	(15, 3, 0, 'Madera', 'D', 3),
	(16, 3, 0, 'Madera', 'F', 5);
/*!40000 ALTER TABLE `estanteria` ENABLE KEYS */;


-- Volcando estructura para tabla almacen_cajas_2015.ocupacion_lejas
DROP TABLE IF EXISTS `ocupacion_lejas`;
CREATE TABLE IF NOT EXISTS `ocupacion_lejas` (
  `COD_ESTANTERIA` int(11) unsigned NOT NULL,
  `LEJA` int(11) unsigned NOT NULL,
  `CAJA` varchar(50) NOT NULL,
  `TIPO` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_ESTANTERIA`,`LEJA`),
  CONSTRAINT `FK_leja_estanteria` FOREIGN KEY (`COD_ESTANTERIA`) REFERENCES `estanteria` (`CODIGO_ESTANTERIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_2015.ocupacion_lejas: ~15 rows (aproximadamente)
DELETE FROM `ocupacion_lejas`;
/*!40000 ALTER TABLE `ocupacion_lejas` DISABLE KEYS */;
INSERT INTO `ocupacion_lejas` (`COD_ESTANTERIA`, `LEJA`, `CAJA`, `TIPO`) VALUES
	(1, 3, '3', 'CajaNegra'),
	(1, 4, '8', 'CajaSorpresa'),
	(2, 1, '9', 'CajaSorpresa'),
	(3, 3, '6', 'CajaFuerte'),
	(3, 5, '7', 'CajaFuerte'),
	(3, 6, '11', 'CajaSorpresa'),
	(5, 2, '2', 'CajaSorpresa'),
	(5, 3, '5', 'CajaNegra'),
	(5, 5, '11', 'CajaFuerte'),
	(6, 2, '12', 'CajaFuerte'),
	(6, 3, '9', 'CajaFuerte'),
	(6, 4, '12', 'CajaSorpresa'),
	(7, 3, '5', 'CajaFuerte'),
	(11, 3, '8', 'CajaFuerte'),
	(12, 2, '7', 'CajaNegra');
/*!40000 ALTER TABLE `ocupacion_lejas` ENABLE KEYS */;


-- Volcando estructura para tabla almacen_cajas_2015.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `USUARIO` varchar(50) NOT NULL,
  `PASSWORD` blob NOT NULL,
  `ADMIN` varchar(2) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_2015.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`USUARIO`, `PASSWORD`, `ADMIN`) VALUES
	('Admin', _binary 0x24326124303724493848442E304139434B3142303038302F35414B392E59634D697A4C306965716152304D7343395732587270457A46534765343969, 'SI');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Volcando estructura para disparador almacen_cajas_2015.backupfuerte_before_delete
DROP TRIGGER IF EXISTS `backupfuerte_before_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `backupfuerte_before_delete` BEFORE DELETE ON `backupfuerte` FOR EACH ROW BEGIN
            UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS=(NUMERO_LEJAS_OCUPADAS+1) WHERE CODIGO_ESTANTERIA = 5;
            INSERT INTO OCUPACION_LEJAS (COD_ESTANTERIA, LEJA, CAJA, TIPO)VALUES(5,5,11,'CajaFuerte');
            INSERT INTO CAJAFUERTE (CODIGO, ALTURA, ANCHURA, PROFUNDIDAD, CLAVE_DESBLOQUEO, COLOR, FECHA_ENTRADA) VALUES(11,45,46,10,'aslfh8q23','#808000','2015-11-22');
         END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Volcando estructura para disparador almacen_cajas_2015.backupnegra_before_delete
DROP TRIGGER IF EXISTS `backupnegra_before_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `backupnegra_before_delete` BEFORE DELETE ON `backupnegra` FOR EACH ROW BEGIN
            UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS=(NUMERO_LEJAS_OCUPADAS+1) WHERE CODIGO_ESTANTERIA = 9;
            INSERT INTO OCUPACION_LEJAS (COD_ESTANTERIA, LEJA, CAJA, TIPO)VALUES(9,3,2,'CajaNegra');
            INSERT INTO CAJANEGRA (CODIGO, ALTURA, ANCHURA, PROFUNDIDAD, PLACA, COLOR, FECHA_ENTRADA) VALUES(2,58,65,10,'PINDERFARI','#ff8000','2015-11-17');
         END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Volcando estructura para disparador almacen_cajas_2015.backupsorpresa_before_delete
DROP TRIGGER IF EXISTS `backupsorpresa_before_delete`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `backupsorpresa_before_delete` BEFORE DELETE ON `backupsorpresa` FOR EACH ROW BEGIN
            UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS=(NUMERO_LEJAS_OCUPADAS+1) WHERE CODIGO_ESTANTERIA = 5;
            INSERT INTO OCUPACION_LEJAS (COD_ESTANTERIA, LEJA, CAJA, TIPO)VALUES(5,2,2,'CajaSorpresa');
            INSERT INTO CAJASORPRESA (CODIGO, ALTURA, ANCHURA, PROFUNDIDAD, CONTENIDO, COLOR, FECHA_ENTRADA) VALUES(2,89,52,31,'Goma','#9102bf','2015-11-15');
         END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Volcando estructura para disparador almacen_cajas_2015.sacarFuerteTrigger
DROP TRIGGER IF EXISTS `sacarFuerteTrigger`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `sacarFuerteTrigger` BEFORE DELETE ON `cajafuerte` FOR EACH ROW BEGIN
	DECLARE ocuEstan INT;
	DECLARE ocuLeja INT;
		SELECT ocupacion_lejas.cod_estanteria INTO ocuEstan  from ocupacion_lejas where caja=old.codigo and tipo ="CajaFuerte"; 
		SELECT leja into ocuLeja from ocupacion_lejas where caja=old.codigo and tipo ="CajaFuerte";
	UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS = NUMERO_LEJAS_OCUPADAS-1 WHERE CODIGO_ESTANTERIA=ocuEstan;
	delete from ocupacion_lejas where caja=old.codigo and tipo="CajaFuerte";
	insert into backupfuerte values(old.CODIGO, old.ALTURA, old.ANCHURA, old.PROFUNDIDAD, old.COLOR, old.CLAVE_DESBLOQUEO, old.FECHA_ENTRADA, ocuEstan, ocuLeja, CURDATE());

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Volcando estructura para disparador almacen_cajas_2015.sacarNegraTrigger
DROP TRIGGER IF EXISTS `sacarNegraTrigger`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `sacarNegraTrigger` BEFORE DELETE ON `cajanegra` FOR EACH ROW BEGIN
	DECLARE ocuEstan INT;
	DECLARE ocuLeja INT;
		SELECT ocupacion_lejas.cod_estanteria INTO ocuEstan  from ocupacion_lejas where caja=old.codigo and tipo ="CajaNegra"; 
		SELECT leja into ocuLeja from ocupacion_lejas where caja=old.codigo and tipo ="CajaNegra";
	UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS = NUMERO_LEJAS_OCUPADAS-1 WHERE CODIGO_ESTANTERIA=ocuEstan;
	delete from ocupacion_lejas where caja=old.codigo and tipo="CajaNegra";
	insert into backupnegra values(old.CODIGO, old.ALTURA, old.ANCHURA, old.PROFUNDIDAD, old.COLOR, old.PLACA, old.FECHA_ENTRADA, ocuEstan, ocuLeja, CURDATE());

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Volcando estructura para disparador almacen_cajas_2015.sacarSorpresaTrigger
DROP TRIGGER IF EXISTS `sacarSorpresaTrigger`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `sacarSorpresaTrigger` BEFORE DELETE ON `cajasorpresa` FOR EACH ROW BEGIN
	DECLARE ocuEstan INT;
	DECLARE ocuLeja INT;
		SELECT ocupacion_lejas.cod_estanteria INTO ocuEstan  from ocupacion_lejas where caja=old.codigo and tipo ="CajaSorpresa"; 
		SELECT leja into ocuLeja from ocupacion_lejas where caja=old.codigo and tipo ="CajaSorpresa";
	UPDATE ESTANTERIA SET NUMERO_LEJAS_OCUPADAS = NUMERO_LEJAS_OCUPADAS-1 WHERE CODIGO_ESTANTERIA=ocuEstan;
	delete from ocupacion_lejas where caja=old.codigo and tipo="CajaSorpresa";
	insert into backupsorpresa values(old.CODIGO, old.ALTURA, old.ANCHURA, old.PROFUNDIDAD, old.COLOR, old.CONTENIDO, old.FECHA_ENTRADA, ocuEstan, ocuLeja, CURDATE());

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
