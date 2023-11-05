-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: platform-courses
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lessons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (1,'Aula 1','Testando aula 1','Descrição aula 1','marketing','assets/lessons/card1.svg','/aula/1','2023-10-10 00:00:00'),(2,'Aula 2','Testando aula 2','Descrição aula 2','tráfego','assets/lessons/card2.svg','/aula/1','2023-10-11 00:00:00'),(3,'Aula 3','Testando aula 3','Descrição aula 3','programação','assets/lessons/card3.svg','/aula/3','2023-10-12 00:00:00'),(4,'Aula 4','Testando aula 4','Descrição aula 4','design','assets/lessons/card4.svg','/aula/4','2023-10-13 00:00:00'),(5,'Aula 5','Testando aula 5','Descrição aula 5','freelancer','assets/lessons/card5.svg','/aula/5','2023-10-14 00:00:00'),(6,'Aula 6','Testando aula 6','Descrição aula 6','marketing','assets/lessons/card6.svg','/aula/6','2023-10-31 02:41:05'),(7,'Aula 7','Testando aula 7','Descrição aula 7','marketing','assets/lessons/card7.svg','/aula/7','2023-10-31 02:41:23'),(8,'Aula 8','Testando aula 8','Descrição aula 8','marketing','assets/lessons/card8.svg','/aula/8','2023-10-31 02:41:45'),(9,'Aula 9','Testando aula 9','Descrição aula 9','marketing','assets/lessons/card9.svg','/aula/9','2023-10-31 02:41:59'),(10,'Aula 10','Testando aula 10','Descrição aula 10','marketing','assets/lessons/card10.svg','/aula/10','2023-10-31 02:42:14');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `updates`
--

DROP TABLE IF EXISTS `updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `updates` (
  `newupdate` varchar(255) NOT NULL,
  `creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `updates`
--

LOCK TABLES `updates` WRITE;
/*!40000 ALTER TABLE `updates` DISABLE KEYS */;
INSERT INTO `updates` VALUES ('Mudança na dashboard.','2023-10-30 23:31:37','A mudança na dashboard tem como objetivo melhorar a experiência do usuário, fornecendo informações mais relevantes e úteis, bem como aprimorando a interface para torná-la mais amigável e eficiente. As principais alterações incluem a reorganização de widgets, uma nova visualização de gráficos interativos, customização flexível, notificações aprimoradas e suporte a múltiplas fontes de dados. Essas mudanças visam melhorar a tomada de decisões, aumentar a eficiência, permitir a customização de acordo com as necessidades individuais e de equipe, fornecer maior conscientização sobre eventos críticos em tempo real e integrar várias fontes de dados para uma visão mais completa. A mudança passou por testes extensivos e recebeu feedback dos usuários antes da implementação, e os usuários serão informados sobre a atualização e receberão treinamento adequado, se necessário, para aproveitar ao máximo os novos recursos.'),('Melhorias na performance.','2023-10-30 23:32:32','O projeto de melhorias na performance visa aprimorar o desempenho e a eficiência de nossos sistemas e processos. Durante essa iniciativa, foram implementadas otimizações significativas em várias áreas-chave, incluindo o banco de dados, o carregamento de páginas, a latência da rede e a capacidade de resposta do sistema. Essas melhorias têm como objetivo reduzir os tempos de carregamento, minimizar atrasos e garantir que os usuários tenham uma experiência mais rápida e fluída. Além disso, foram realizados testes abrangentes e análises de desempenho para garantir que as alterações atendam aos padrões de qualidade estabelecidos. Esperamos que essas melhorias proporcionem uma experiência significativamente melhor para nossos usuários, resultando em maior satisfação e eficácia em suas interações com nossos sistemas e serviços.');
/*!40000 ALTER TABLE `updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Anderson Diniz','andersondiniz159@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','2023-10-30 21:49:55'),(3,'Adriano Luiz','adriano@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','2023-10-30 22:19:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-05  9:11:05
