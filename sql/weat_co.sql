

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `arl` (
  `id_arl` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_arl` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `arl` (`id_arl`, `nom_arl`) VALUES
(1, 'ARL Sura'),
(2, 'Compañía de Seguros de Vida Aurora S.A.'),
(3, 'Seguros Bolívar S.A.'),
(4, 'La Equidad Seguros Generales Organismo Cooperativo'),
(5, 'Positiva Compañía de Seguros S.A.'),
(6, 'Liberty Seguros S.A.'),
(7, 'Mapfre Colombia Vida Seguros S.A.'),
(8, 'Colmena S.A. Compañía de Seguros de Vida'),
(9, 'Seguros ALFA S.A. y Seguros de Vida ALFA S.A.'),
(10, 'Axa Colpatria Seguros S.A.'),
(11, 'Ninguna');


CREATE TABLE `cliente` (
  `id_clie` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `doc_clie` char(20) DEFAULT NULL UNIQUE,
  `nom_clie` char(50) DEFAULT NULL,
  `ape_clie` char(50) DEFAULT NULL,
  `tel_clie` char(20) DEFAULT NULL,
  `email_clie` char(50) DEFAULT NULL,
  `dir_clie` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `detalle` (
  `id_det` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `id_fact` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,

  FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_fact`) REFERENCES `factura` (`id_fact`) ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `domicilio` (
  `id_dom` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fecha_dom` date DEFAULT NULL,
  `dir_ent` char(50) DEFAULT NULL,
  `id_clie` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `id_fact` int(11) NOT NULL,
  `id_est` int(11) NOT NULL,

  FOREIGN KEY (`id_clie`) REFERENCES `cliente` (`id_clie`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_emp`) REFERENCES `empleado` (`id_emp`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_fact`) REFERENCES `factura` (`id_fact`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_est`) REFERENCES `estado` (`id_est`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `empleado` (
  `id_emp` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `doc_emp` char(20) DEFAULT NULL UNIQUE,
  `tp_emp` char(20) DEFAULT NULL,
  `nom_emp` char(50) DEFAULT NULL,
  `ape_emp` char(50) DEFAULT NULL,
  `tel_emp` char(20) DEFAULT NULL,
  `email_emp` char(50) DEFAULT NULL,
  `dir_emp` char(50) DEFAULT NULL,
  `id_arl` int(11) NOT NULL,
  `id_eps` int(11) NOT NULL,
  `id_loc` int(11) NOT NULL,
  `estado` boolean,

  FOREIGN KEY (`id_arl`) REFERENCES `arl` (`id_arl`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_eps`) REFERENCES `eps` (`id_eps`) ON UPDATE CASCADE,
  FOREIGN KEY (`id_loc`) REFERENCES `localidad` (`id_loc`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `eps` (
  `id_eps` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_eps` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `eps` (`id_eps`, `nom_eps`) VALUES
(1, 'Cafesalud'),
(2, 'Calisalud'),
(3, 'Caprecom'),
(4, 'Capresoca'),
(5, 'Colmédica'),
(6, 'Compensar'),
(7, 'Comfenalco Antioquia'),
(8, 'Comfenalco Valle'),
(9, 'Convida ARS'),
(10, 'Coomeva EPS'),
(11, 'Cruz Blanca'),
(12, 'Famisanar'),
(13, 'Humana Vivir'),
(14, 'Instituto de los Seg'),
(15, 'Salud Colmena'),
(16, 'Salud Colpatria'),
(17, 'Salud Total'),
(18, 'Saludcolombia EPS S.'),
(19, 'SaludCoop'),
(20, 'Saludvida'),
(21, 'Sanitas'),
(22, 'Selvasalud'),
(23, 'Solsalud'),
(24, 'S.O.S EPS'),
(25, 'Susalud'),
(26, 'Ninguna');



CREATE TABLE `estado` (
  `id_est` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `estado` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `estado` (`id_est`, `estado`) VALUES
(1, 'Entregado'),
(2, 'Pendiente'),
(3, 'Cancelado'),
(4, 'Pospuesto'),
(5, 'Devuelto');


CREATE TABLE `factura` (
  `id_fact` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fecha_fact` date DEFAULT NULL,
  `iva_fact` float DEFAULT NULL,
  `total_fact` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `localidad` (
  `id_loc` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_loc` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `localidad` (`id_loc`, `nom_loc`) VALUES
(1, 'Antonio Nariño'),
(2, 'Barrios Unidos'),
(3, 'Bosa'),
(4, 'Chapinero'),
(5, 'Ciudad Bolivar'),
(6, 'Engativá'),
(7, 'Fontibón'),
(8, 'Kennedy'),
(9, 'La Candelaria'),
(10, 'Los Martires'),
(11, 'Puente Aranda'),
(12, 'Rafael Uribe Uribe'),
(13, 'San Cristobal'),
(14, 'Santa Fe'),
(15, 'Suba'),
(16, 'Sumapaz'),
(17, 'Teusaquillo'),
(18, 'Tunjuelito'),
(19, 'Usaquen'),
(20, 'Usme'),
(21, 'No aplica');


CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_prod` char(50) DEFAULT NULL,
  `precio_prod` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `producto` (`id_prod`, `nom_prod`, `precio_prod`) VALUES
(1, 'Postobon 250ml', 1800),
(2, 'Cocca-cola 520ml', 2500),
(3, 'Pepsi 250ml', 1800),
(4, 'Hit 250ml', 1800),
(5, 'Hamburguesa', 3500),
(6, 'Pizza mediana', 1400),
(7, 'Pepsi 1.5lt', 2500),
(8, 'Burrito', 10000),
(9, 'Coca-cola 1.5lt', 3200),
(10, 'Hamburguesa Doble', 6500),
(11, 'Porcion de arroz', 5500),
(12, 'Porcion de papas fritas', 3500),
(13, 'Pizza Familiar', 22000),
(14, 'Hot dog americano', 12500),
(15, 'Jugo natural', 5200),
(16, 'Batidos', 3700),
(17, 'Porcion de platanos fritos', 3500),
(18, 'Porcion de yucas fritas', 3500),
(19, 'Postobon 1.5lt', 2500),
(20, 'Combo duo', 15500);


CREATE TABLE `usuario` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user` char(20) DEFAULT NULL UNIQUE,
  `pass` char(20) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `tipo` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

