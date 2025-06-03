CREATE DATABASE  IF NOT EXISTS `cine_reservas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cine_reservas`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: cine_reservas
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `asientos`
--

LOCK TABLES `asientos` WRITE;
/*!40000 ALTER TABLE `asientos` DISABLE KEYS */;
INSERT INTO `asientos` VALUES (3,2,'B',1,NULL,NULL),(4,2,'B',2,NULL,NULL),(5,2,'B',3,NULL,NULL),(6,2,'B',4,NULL,NULL),(7,3,'C',10,NULL,NULL),(8,4,'D',7,NULL,NULL),(9,4,'D',8,NULL,NULL),(10,4,'D',9,NULL,NULL),(11,5,'E',12,NULL,NULL),(12,5,'E',13,NULL,NULL),(13,2,'G',5,'2025-05-14 22:32:35',NULL),(15,5,'j',13,'2025-05-30 18:13:44',NULL);
/*!40000 ALTER TABLE `asientos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_asientos` BEFORE INSERT ON `asientos` FOR EACH ROW BEGIN
  SET NEW.created_at = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_update_asientos` BEFORE UPDATE ON `asientos` FOR EACH ROW BEGIN
  SET NEW.updated_at = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Juan Pérez','juan@email.com','5551234567','2025-05-09',NULL,NULL),(2,'María García','maria@email.com','5557654321','2025-05-09',NULL,NULL),(3,'Carlos López','carlos@email.com','5559876543','2025-05-09',NULL,NULL),(4,'Ana Martínez','ana@email.com','5554567890','2025-05-09',NULL,NULL),(5,'Luisa Rodríguez','luisa@email.com','5553216549','2025-05-09',NULL,NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_clientes` BEFORE INSERT ON `clientes` FOR EACH ROW BEGIN
  SET NEW.created_at = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_update_clientes` BEFORE UPDATE ON `clientes` FOR EACH ROW BEGIN
  SET NEW.updated_at = NOW();

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `funciones`
--

LOCK TABLES `funciones` WRITE;
/*!40000 ALTER TABLE `funciones` DISABLE KEYS */;
INSERT INTO `funciones` VALUES (2,2,2,'2023-08-01 18:30:00',180.00,80,NULL,'2025-05-15 00:30:40'),(3,3,3,'2023-08-01 20:00:00',250.00,60,NULL,NULL),(4,4,4,'2023-08-01 17:15:00',220.00,150,NULL,NULL),(5,5,5,'2023-08-01 15:30:00',130.00,100,NULL,NULL),(6,1,1,'2023-08-02 18:30:00',200.00,90,NULL,NULL),(7,1,1,'2025-05-15 03:03:00',25.00,90,'2025-05-14 23:01:27',NULL),(8,4,2,'2025-05-31 20:30:00',180.00,10,'2025-05-30 21:21:25',NULL);
/*!40000 ALTER TABLE `funciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_funciones` BEFORE INSERT ON `funciones` FOR EACH ROW BEGIN
  SET NEW.created_at = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_update_funciones` BEFORE UPDATE ON `funciones` FOR EACH ROW BEGIN
  SET NEW.updated_at = NOW();
 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (2,2,720.00,'app','2025-05-09 18:11:54','completado','TXN789012',NULL,NULL),(3,4,660.00,'efectivo','2025-05-09 18:11:54','completado','TXN345678',NULL,NULL),(4,5,260.00,'tarjeta','2025-05-09 18:11:54','completado','TXN901234',NULL,NULL),(5,5,50.00,'tarjeta','2025-05-14 05:00:00','completado','TX-1747285134-3e2bca9a','2025-05-14 23:58:54',NULL),(6,3,50.00,'transferencia','2025-05-30 05:00:00','completado','TX-1748659595-c4dddfe0','2025-05-30 21:46:35',NULL);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_pagos` BEFORE INSERT ON `pagos` FOR EACH ROW BEGIN
  SET NEW.created_at = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_update_pagos` BEFORE UPDATE ON `pagos` FOR EACH ROW BEGIN
  SET NEW.updated_at = NOW();
  
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `peliculas`
--

LOCK TABLES `peliculas` WRITE;
/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
INSERT INTO `peliculas` VALUES (1,'El Rey León',118,'A','Animación','Clásico de Disney sobre el ciclo de la vida','2023-07-19',NULL,'2025-05-14 20:22:52','2025-05-26 04:05:44',NULL),(2,'Misión Imposible 7',163,'B','Acción','Nueva aventura de Ethan Hunt','2023-07-12','portada_683d6144050df.jpg','2025-05-14 20:22:52','2025-06-02 03:31:00',NULL),(3,'Oppenheimer',180,'B15','Drama','Historia del padre de la bomba atómica','2023-07-21','portada_683537f631f44.jpeg','2025-05-14 20:22:52','2025-05-26 22:56:38',NULL),(4,'Barbie',114,'A','Comedia','Aventura de Barbie en el mundo real','2023-07-21','portada_683d61625cfe0.jpg','2025-05-14 20:22:52','2025-06-02 03:31:30',NULL),(5,'Elementos',109,'A','Animación','Historia de amor en una ciudad de elementos','2023-06-16','portada_683d617f3da3f.png','2025-05-14 20:22:52','2025-06-02 03:31:59',NULL),(14,'minecraft',180,'A','aventura','Cuatro inadaptados son absorbidos de repente por un misterioso portal hacia el Supramundo: un extraño y cúbico país de las maravillas que vive gracias a la imaginación. Para volver a casa, se embarcan en una búsqueda mágica con un artesano','2025-05-25','portada_68216cf4bacef.jpg','2025-05-14 20:22:52','2025-05-26 22:00:55',NULL),(15,'Avatar',162,'PG-13','Ciencia Ficción','Jake Sully, un ex marine parapléjico, se embarca en una misión en el planeta Pandora, donde deberá elegir entre seguir órdenes humanas o proteger a los Na\'vi, la especie nativa.','2009-12-18','portada_683de9c37f854.jpg','2025-05-14 20:22:52','2025-06-02 13:13:23',NULL),(16,'Vengadores: Endgame',181,'PG-13','Acción/Aventura/Ciencia Ficción',' Después de los devastadores eventos ocurridos en Vengadores: Infinity War, los Vengadores restantes deben unirse para intentar revertir los daños causados por Thanos. Con el destino del universo en juego, los héroes luchan en una batalla épica para salvar a la humanidad.','2019-04-26','portada_6822ef8415a4e.jpeg','2025-05-14 20:22:52','2025-05-14 20:22:52',NULL),(18,'Rey Leon 52',180,'A','Animado/Aventura/delavida','El Rey León es una película animada de Disney que narra la historia de Simba, un joven león destinado a convertirse en rey de la Sabana Africana. Desde pequeño, Simba es criado por su padre, el sabio y justo rey Mufasa, quien le enseña sobre el \"ciclo de la vida\" y sus responsabilidades como futuro líder.\r\n\r\nSin embargo, la ambición de su tío Scar, quien desea el trono para sí mismo, desencadena una tragedia: engaña a Simba y provoca la muerte de Mufasa. Culpable y temeroso, Simba huye al exilio, dejando el reino en manos de Scar, quien lo lleva al caos.\r\n\r\nDurante su exilio, Simba crece y aprende valiosas lecciones sobre la vida gracias a sus nuevos amigos Timón y Pumbaa. Eventualmente, impulsado por su pasado y su destino, decide regresar para enfrentar a Scar, restaurar el orden y reclamar su lugar legítimo como rey de la Sabana.\r\n\r\n','2025-05-30','portada_68342fa88fc38.jpg','2025-05-26 04:08:56','2025-05-28 13:31:34',NULL),(19,'Robot Salvaje',104,'PG','Animación, Aventura, Familia','Después de un naufragio, una robot llamada Roz despierta sola en una isla deshabitada. Para sobrevivir, debe aprender a adaptarse al entorno salvaje, convivir con los animales y descubrir el verdadero significado de la vida, la amistad y el hogar.','2025-06-20','portada_683de84c6d652.jpg','2025-06-02 13:07:07','2025-06-02 13:07:08',NULL),(20,'Avatar 2: El Camino del Agua',192,'PG-13','Ciencia ficción, Aventura, Acción','Jake Sully y Neytiri han formado una familia en Pandora, pero deben abandonar su hogar y explorar nuevas regiones del planeta cuando una antigua amenaza regresa para acabar con todo lo que aman. En su lucha por proteger a su pueblo, descubren los misterios de los océanos de Pandora.','2025-06-21','portada_683dea4f769fa.jpg','2025-06-02 13:15:43','2025-06-02 13:15:43',NULL),(21,'Intensamente 2',100,'PG','Animación, Comedia, Aventura, Familia','Riley ya es una adolescente, y con la llegada de nuevos desafíos también surgen nuevas emociones en su mente. Alegría, Tristeza, Furia, Temor y Desagrado deberán aprender a convivir con las recién llegadas: Ansiedad, Envidia, Vergüenza y otras emociones que transformarán su mundo interior.','2025-06-30','portada_683deb4277369.jpg','2025-06-02 13:19:46','2025-06-02 13:19:46',NULL);
/*!40000 ALTER TABLE `peliculas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_peliculas` BEFORE INSERT ON `peliculas` FOR EACH ROW BEGIN
  SET NEW.created_at = now(); 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_update_peliculas` BEFORE UPDATE ON `peliculas` FOR EACH ROW BEGIN
  SET NEW.updated_at = now();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (2,2,2,'2025-05-09 18:11:53',4,'confirmada','DEF456',NULL,NULL),(3,3,3,'2025-05-09 18:11:53',1,'pendiente','GHI789',NULL,NULL),(4,4,4,'2025-05-09 18:11:53',3,'confirmada','JKL012',NULL,NULL),(5,5,5,'2025-05-09 18:11:53',2,'utilizada','MNO345',NULL,NULL),(6,1,2,'2025-05-24 05:00:00',5,'confirmada','KN6MYS','2025-05-14 22:17:27',NULL),(7,1,8,'2025-06-04 05:00:00',1,'confirmada','FGFRRT','2025-06-02 03:36:20',NULL);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_reservas` BEFORE INSERT ON `reservas` FOR EACH ROW BEGIN
  SET NEW.created_at = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_update_reservas` BEFORE UPDATE ON `reservas` FOR EACH ROW BEGIN
  SET NEW.updated_at = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `salas`
--

LOCK TABLES `salas` WRITE;
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT INTO `salas` VALUES (1,'Sala 1',120,'2D',0,NULL,'2025-05-15 00:25:56'),(2,'Sala 2',80,'3D',1,NULL,NULL),(3,'Sala 3',60,'VIP',1,NULL,NULL),(4,'Sala 4',150,'4DX',1,NULL,NULL),(5,'Sala 5',100,'2D',1,NULL,NULL),(6,'sala 6',10,'VIP',1,'2025-05-15 00:19:21',NULL);
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_insert_salas` BEFORE INSERT ON `salas` FOR EACH ROW BEGIN
  SET NEW.created_at = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_update_salas` BEFORE UPDATE ON `salas` FOR EACH ROW BEGIN
  SET NEW.updated_at = NOW();
  
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'RENE','BALSECA','Rbalseca','carlos.balseca.nevareza@utelvt.edu.ec','$2y$13$B8WDXKPT4AZZG72VNmQjrudqCryLd8duddh3W49Bf/HaRRKMB42p6','MCr0GMsSWs8aAcUiNyDpR-E0oYvTAWmg','yzWxieyB5Im6TtRXLA-JbIHFKn4iqgca','admin',1),(6,'sebastian','BALSECA','Sbalseca','carlos.balseca.nevarez@utelvt.edu.ec','$2y$13$/zNa61HyLAVxf7LeGUy2suXyebeXLrRX9jOKF71HiACtFOcUEv.HO','22ouRPwKG0vnEeKkC915fPHO-X5iN3Bv','qiFFzydzrepqu9-nblFbGM91ybd20TI2','user',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cine_reservas'
--

--
-- Dumping routines for database 'cine_reservas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-03 17:29:01
