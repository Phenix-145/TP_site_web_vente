-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: pmu_bdd
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Temporary view structure for view `afficheinterboite`
--

DROP TABLE IF EXISTS `afficheinterboite`;
/*!50001 DROP VIEW IF EXISTS `afficheinterboite`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `afficheinterboite` AS SELECT 
 1 AS `boite_ID`,
 1 AS `Boitenom`,
 1 AS `boitePrix`,
 1 AS `quantité`,
 1 AS `img_pieces`,
 1 AS `nom_pieces`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `appartient_a_montage`
--

DROP TABLE IF EXISTS `appartient_a_montage`;
/*!50001 DROP VIEW IF EXISTS `appartient_a_montage`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `appartient_a_montage` AS SELECT 
 1 AS `piece`,
 1 AS `nom_montage`,
 1 AS `image_montage`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `boite`
--

DROP TABLE IF EXISTS `boite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boite` (
  `idboite` int NOT NULL AUTO_INCREMENT,
  `Boitenom` varchar(45) NOT NULL,
  `prix` int NOT NULL,
  PRIMARY KEY (`idboite`),
  UNIQUE KEY `idboite_UNIQUE` (`idboite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boite`
--

LOCK TABLES `boite` WRITE;
/*!40000 ALTER TABLE `boite` DISABLE KEYS */;
INSERT INTO `boite` VALUES (1,'boite1',584155),(2,'boite2',332405);
/*!40000 ALTER TABLE `boite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `Id_categorie` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_categorie`),
  UNIQUE KEY `Id_categorie_UNIQUE` (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'plaques'),(2,'poulis'),(3,'élément de liason'),(4,'disques, roue, pignon'),(5,'raccords, clavette'),(6,'bandes'),(7,'visserie'),(8,'anneau de caoutchouc'),(9,'pneu'),(10,'tringles'),(11,'manivelle'),(12,'crochet'),(13,'ressort');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `idclient` int NOT NULL AUTO_INCREMENT,
  `client_nam` varchar(45) NOT NULL,
  `mdp` varchar(512) NOT NULL,
  `NumPanier` int DEFAULT '0',
  PRIMARY KEY (`idclient`),
  UNIQUE KEY `idclient_UNIQUE` (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'test','ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff',3),(2,'test2','ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff',0);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contient`
--

DROP TABLE IF EXISTS `contient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contient` (
  `boite_ID` int NOT NULL,
  `pieces_ID` int NOT NULL,
  `quantité` int NOT NULL,
  KEY `key_boite_idx` (`boite_ID`) /*!80000 INVISIBLE */,
  KEY `key_piece_idx` (`pieces_ID`) /*!80000 INVISIBLE */,
  CONSTRAINT `key_boite` FOREIGN KEY (`boite_ID`) REFERENCES `boite` (`idboite`),
  CONSTRAINT `key_pieceb` FOREIGN KEY (`pieces_ID`) REFERENCES `pieces` (`Id_pieces`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contient`
--

LOCK TABLES `contient` WRITE;
/*!40000 ALTER TABLE `contient` DISABLE KEYS */;
INSERT INTO `contient` VALUES (1,5,10),(1,10,5),(1,1,8),(1,14,10),(1,63,4),(1,64,6),(2,32,3),(2,40,7),(2,15,6),(2,3,4);
/*!40000 ALTER TABLE `contient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dans_montage`
--

DROP TABLE IF EXISTS `dans_montage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dans_montage` (
  `id_piece` int NOT NULL,
  `id_montage` int NOT NULL,
  KEY `fk_dans_montage_montage1_idx` (`id_montage`),
  KEY `fk_dans_montage_pieces1_idx` (`id_piece`),
  CONSTRAINT `fk_dans_montage_montage1` FOREIGN KEY (`id_montage`) REFERENCES `montage` (`idmontage`),
  CONSTRAINT `fk_dans_montage_pieces1` FOREIGN KEY (`id_piece`) REFERENCES `pieces` (`Id_pieces`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dans_montage`
--

LOCK TABLES `dans_montage` WRITE;
/*!40000 ALTER TABLE `dans_montage` DISABLE KEYS */;
INSERT INTO `dans_montage` VALUES (6,1),(7,1),(54,1),(6,2),(7,2),(6,3),(14,3),(63,3),(6,4),(14,4),(63,4),(6,5),(14,5),(63,5),(16,5),(33,6),(49,6),(8,6),(10,6),(14,6),(54,6),(63,6),(62,6),(62,7),(57,7),(14,7),(63,7),(14,8),(63,8),(43,8),(62,8),(14,8),(2,8),(66,10),(14,10),(63,10),(33,10),(2,10),(7,11),(6,11),(14,11),(46,11),(15,12),(6,12),(14,12),(54,12),(63,12),(2,13),(63,13),(14,13),(54,13),(41,13),(13,13),(10,13),(17,13),(62,13),(62,14),(49,14),(15,14),(6,14),(63,14),(14,14);
/*!40000 ALTER TABLE `dans_montage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `derniervente`
--

DROP TABLE IF EXISTS `derniervente`;
/*!50001 DROP VIEW IF EXISTS `derniervente`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `derniervente` AS SELECT 
 1 AS `Id_pieces`,
 1 AS `img_pieces`,
 1 AS `nom_pieces`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `enpromotion`
--

DROP TABLE IF EXISTS `enpromotion`;
/*!50001 DROP VIEW IF EXISTS `enpromotion`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `enpromotion` AS SELECT 
 1 AS `Id_pieces`,
 1 AS `img_pieces`,
 1 AS `nom_pieces`,
 1 AS `promotion`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `montage`
--

DROP TABLE IF EXISTS `montage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `montage` (
  `idmontage` int NOT NULL AUTO_INCREMENT,
  `nom_montage` varchar(45) NOT NULL,
  `image_montage` varchar(45) NOT NULL,
  PRIMARY KEY (`idmontage`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `montage`
--

LOCK TABLES `montage` WRITE;
/*!40000 ALTER TABLE `montage` DISABLE KEYS */;
INSERT INTO `montage` VALUES (1,'montage N°1','montBC1.jpg'),(2,'montage N°2','montBC2.jpg'),(3,'montage N°3','montBC3.jpg'),(4,'montage N°4','montBC4.jpg'),(5,'montage N°5','montBC5.jpg'),(6,'montage N°6','montBC6.jpg'),(7,'montage N°7','montBC7.jpg'),(8,'montage N°8','montBC8.jpg'),(10,'montage N°10','montBC10.jpg'),(11,'montage N°11','montBC11.jpg'),(12,'montage N°12','montBC12.jpg'),(13,'montage N°13','montBC13.jpg'),(14,'montage N°14','montBC14.jpg');
/*!40000 ALTER TABLE `montage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `panier` (
  `id_panier` int NOT NULL DEFAULT '0',
  `idclient` int NOT NULL,
  `idpieces` int NOT NULL,
  `idboite` int NOT NULL,
  `quantité` int NOT NULL,
  `dateAchat` datetime DEFAULT NULL,
  PRIMARY KEY (`id_panier`,`idclient`,`idpieces`,`idboite`),
  KEY `key_client_idx` (`idclient`) /*!80000 INVISIBLE */,
  CONSTRAINT `key_client` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panier`
--

LOCK TABLES `panier` WRITE;
/*!40000 ALTER TABLE `panier` DISABLE KEYS */;
INSERT INTO `panier` VALUES (1,1,32,0,10,'2023-10-14 21:04:51'),(1,1,38,0,5,'2023-10-14 21:04:51'),(1,1,63,0,2,'2023-10-14 21:04:51'),(2,1,8,0,10,'2023-10-15 14:27:55'),(3,1,0,1,1,NULL),(3,1,2,0,9,NULL),(3,1,34,0,2,NULL),(3,1,38,0,50,NULL),(3,1,47,0,10,NULL);
/*!40000 ALTER TABLE `panier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pieces`
--

DROP TABLE IF EXISTS `pieces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pieces` (
  `Id_pieces` int NOT NULL AUTO_INCREMENT,
  `img_pieces` varchar(45) NOT NULL,
  `nom_pieces` varchar(45) NOT NULL,
  `promotion` int NOT NULL,
  `Idcategorie` int DEFAULT NULL,
  `prix` int NOT NULL,
  `conseil` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id_pieces`),
  KEY `Key_categorie_idx` (`Idcategorie`),
  CONSTRAINT `Key_categorie` FOREIGN KEY (`Idcategorie`) REFERENCES `categorie` (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pieces`
--

LOCK TABLES `pieces` WRITE;
/*!40000 ALTER TABLE `pieces` DISABLE KEYS */;
INSERT INTO `pieces` VALUES (1,'anneauCaoutchouc.jpg','Anneau de Caoutchouc',0,8,1000,NULL),(2,'bague.jpg','Bague d\'arrêt',1,7,500,NULL),(3,'bndCintreGlisier.jpg','Bande cintrée à Glissières',1,6,1500,NULL),(4,'bndCoudee.jpg','Bande Coudée',0,6,2000,NULL),(5,'bndCurve.jpg','Bande incrurvée, épaulée',0,6,1500,NULL),(6,'bndPerfore.jpg','Bande Perforée',1,6,3000,NULL),(7,'boulonPivot.jpg','Boulon Pivot',0,7,50,'Homines enim eruditos et sobrios ut infaustos et inutiles vitant, eo quoque accedente quod et nomenclatores adsueti haec et talia venditare, mercede accepta lucris quosdam et prandiis inserunt subditicios ignobiles et obscuros.'),(8,'cavalier.jpg','Cavalier',0,3,800,NULL),(9,'chevilleFilete.jpg','Cheville Filetée',0,7,400,'Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.'),(10,'clavette.jpg','Clavette',0,5,3000,NULL),(11,'corniere.jpg','Cornière',1,3,8000,NULL),(12,'crochet.jpg','Crochet lesté',0,12,1000,NULL),(13,'disque.jpg','Disque',0,4,6000,NULL),(14,'ecrou.jpg','Ecrou',0,7,199,NULL),(15,'Equerre90.jpg','Equerre',0,3,799,NULL),(16,'Equerre135.jpg','Equerre 135°',1,3,500,NULL),(17,'equerreRenv.jpg','Equerre renversée',0,3,600,NULL),(18,'longrine.jpg','Longrine',0,3,400,NULL),(32,'pignon.jpg','Pignon de 19 dents',1,4,200,NULL),(33,'plaque.jpg','Plaque sans rebords',0,1,900,NULL),(34,'pleuAuto.jpg','Pneu auto',1,9,10000,NULL),(35,'plqBande.jpg','Plaque Bande',0,1,4000,NULL),(36,'plqCintree.jpg','Plaque Cintrée',0,1,2099,NULL),(37,'plqCintreU.jpg','Plaque Cintrée en U',0,1,650,NULL),(38,'plqDemiCirc.jpg','Plaque semi Circulaire',1,1,480,NULL),(39,'plqFlexible.jpg','Plaque Flexible',0,1,700,NULL),(40,'plqFlexTrg.jpg','Plaque Flexible triangulaire',0,1,1000,NULL),(41,'plqPlstiqBleu.jpg','Plaque plastique bleu',0,1,1500,NULL),(42,'plqPlstiqClair.jpg','Plaque plastique clair',0,1,1600,NULL),(43,'plqRebord.jpg','Plaque à rebord',0,1,4500,NULL),(44,'plqSecteur.jpg','Plaque secteur à rebord',0,1,2000,NULL),(45,'pneu4Poulie.jpg','Pneu (pour poulie 25 mm)',0,9,1600,NULL),(46,'poulie.jpg','Poulie sans moyeu',0,2,1600,NULL),(47,'poulie2.jpg','Poulie sans moyeu',1,2,1700,NULL),(48,'poulieMoyeu.jpg','Poulie avec moyeu',0,2,1050,NULL),(49,'poulie2Moyeu.jpg','Poulie avec moyeu',1,2,2000,NULL),(50,'rcdTringlBnd.jpg','Raccord tringle et bande',0,5,600,NULL),(51,'rcdTringlBnd90.jpg','Raccord tringle et bande à angle droit',0,5,1000,NULL),(52,'rcdTringle.jpg','Raccord de tringle',0,5,700,NULL),(53,'ressortAttache.jpg','Ressort d\'attache pour corde',0,13,750,NULL),(54,'rondelle.jpg','Rondelle-Disque',0,7,460,NULL),(55,'roueBarillet.jpg','Roue barillet',0,4,850,NULL),(56,'roueDentee.jpg','Roue de 57 dents',0,4,1500,NULL),(57,'supDouble.jpg','Support double',0,3,9999,NULL),(58,'supPlat.jpg','Support plat',0,3,1450,NULL),(59,'tigeFilete.jpg','Tige filetée',0,7,360,NULL),(60,'trgEmbase.jpg','Embase triangulée',1,3,270,NULL),(61,'trgEmbaseCoude.jpg','Embase triangulée coudée',0,3,640,'Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopulis sunt controversa.'),(62,'tringle.jpg','Tringle',0,10,390,NULL),(63,'vis.jpg','Boulon',1,7,240,NULL),(64,'visLong.jpg','Boulon',0,7,210,NULL),(65,'poulie0.jpg','poulie',0,2,290,NULL),(66,'manivelle.jpg','Manivelle',0,11,750,NULL);
/*!40000 ALTER TABLE `pieces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `piecescategorie`
--

DROP TABLE IF EXISTS `piecescategorie`;
/*!50001 DROP VIEW IF EXISTS `piecescategorie`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `piecescategorie` AS SELECT 
 1 AS `Id_pieces`,
 1 AS `img_pieces`,
 1 AS `nom_pieces`,
 1 AS `nom`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `recherchepiece`
--

DROP TABLE IF EXISTS `recherchepiece`;
/*!50001 DROP VIEW IF EXISTS `recherchepiece`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `recherchepiece` AS SELECT 
 1 AS `img_pieces`,
 1 AS `nom_pieces`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `afficheinterboite`
--

/*!50001 DROP VIEW IF EXISTS `afficheinterboite`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `afficheinterboite` AS select `contient`.`boite_ID` AS `boite_ID`,`boite`.`Boitenom` AS `Boitenom`,`boite`.`prix` AS `boitePrix`,`contient`.`quantité` AS `quantité`,`pieces`.`img_pieces` AS `img_pieces`,`pieces`.`nom_pieces` AS `nom_pieces` from ((`contient` join `pieces` on((`contient`.`pieces_ID` = `pieces`.`Id_pieces`))) join `boite` on((`contient`.`boite_ID` = `boite`.`idboite`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `appartient_a_montage`
--

/*!50001 DROP VIEW IF EXISTS `appartient_a_montage`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `appartient_a_montage` AS select `dans_montage`.`id_piece` AS `piece`,`montage`.`nom_montage` AS `nom_montage`,`montage`.`image_montage` AS `image_montage` from (`dans_montage` join `montage` on((`montage`.`idmontage` = `dans_montage`.`id_montage`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `derniervente`
--

/*!50001 DROP VIEW IF EXISTS `derniervente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `derniervente` AS select `pieces`.`Id_pieces` AS `Id_pieces`,`pieces`.`img_pieces` AS `img_pieces`,`pieces`.`nom_pieces` AS `nom_pieces` from (`pieces` join `panier` on((`pieces`.`Id_pieces` = `panier`.`idpieces`))) where (`panier`.`dateAchat` is not null) order by `panier`.`dateAchat` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `enpromotion`
--

/*!50001 DROP VIEW IF EXISTS `enpromotion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `enpromotion` AS select `pieces`.`Id_pieces` AS `Id_pieces`,`pieces`.`img_pieces` AS `img_pieces`,`pieces`.`nom_pieces` AS `nom_pieces`,`pieces`.`promotion` AS `promotion` from `pieces` where (`pieces`.`promotion` like 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `piecescategorie`
--

/*!50001 DROP VIEW IF EXISTS `piecescategorie`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `piecescategorie` AS select `pieces`.`Id_pieces` AS `Id_pieces`,`pieces`.`img_pieces` AS `img_pieces`,`pieces`.`nom_pieces` AS `nom_pieces`,`categorie`.`nom` AS `nom` from (`pieces` join `categorie` on((`pieces`.`Idcategorie` = `categorie`.`Id_categorie`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `recherchepiece`
--

/*!50001 DROP VIEW IF EXISTS `recherchepiece`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `recherchepiece` AS select `pieces`.`img_pieces` AS `img_pieces`,`pieces`.`nom_pieces` AS `nom_pieces` from `pieces` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-10 19:00:49
