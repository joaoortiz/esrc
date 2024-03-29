CREATE DATABASE  IF NOT EXISTS `bdcinema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdcinema`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bdcinema
-- ------------------------------------------------------
-- Server version	5.1.54-community-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atores`
--

DROP TABLE IF EXISTS `atores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atores` (
  `id_ATOR` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ATOR` varchar(100) NOT NULL,
  `dataNascimento_ATOR` date DEFAULT NULL,
  `imagem_ATOR` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_ATOR`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atores`
--

LOCK TABLES `atores` WRITE;
/*!40000 ALTER TABLE `atores` DISABLE KEYS */;
INSERT INTO `atores` VALUES (1,'Ian Mcleen','1930-05-02','im.jpg'),(2,'Elijah Wood','1982-06-18','ew.jpg'),(3,'Leonardo di Caprio','1970-10-08','lc.jpg'),(4,'Kate Winslet','1972-12-23','kw.jpg'),(5,'Colm Feore',NULL,'cf.jpg');
/*!40000 ALTER TABLE `atores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id_CARGO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_CARGO` varchar(50) NOT NULL,
  PRIMARY KEY (`id_CARGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cinemas`
--

DROP TABLE IF EXISTS `cinemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cinemas` (
  `id_CINEMA` int(11) NOT NULL AUTO_INCREMENT,
  `quantidadeSalas_CINEMA` int(11) NOT NULL,
  PRIMARY KEY (`id_CINEMA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinemas`
--

LOCK TABLES `cinemas` WRITE;
/*!40000 ALTER TABLE `cinemas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cinemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `cpf_CLIENTE` varchar(11) NOT NULL,
  `rg_CLIENTE` varchar(9) NOT NULL,
  `dataNascimento_CLIENTE` date NOT NULL,
  `nome_CLIENTE` varchar(100) NOT NULL,
  `endereco_CLIENTE` varchar(120) NOT NULL,
  `bairro_CLIENTE` varchar(50) NOT NULL,
  `cidade_CLIENTE` varchar(45) NOT NULL,
  `cep_CLIENTE` varchar(8) NOT NULL,
  `telefone_CLIENTE` varchar(11) NOT NULL,
  `email_CLIENTE` varchar(120) NOT NULL,
  PRIMARY KEY (`cpf_CLIENTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('12345678900','123456789','1984-10-03','José da Silva','Rua Marabu 223','Vila Maria','São Paulo','02138040','11985478541','jsilva@gmail.com');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combos`
--

DROP TABLE IF EXISTS `combos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combos` (
  `id_COMBO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_COMBO` varchar(50) NOT NULL,
  `valor_COMBO` float NOT NULL,
  PRIMARY KEY (`id_COMBO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combos`
--

LOCK TABLES `combos` WRITE;
/*!40000 ALTER TABLE `combos` DISABLE KEYS */;
/*!40000 ALTER TABLE `combos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id_DEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_DEPARTAMENTO` varchar(50) NOT NULL,
  PRIMARY KEY (`id_DEPARTAMENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elencos`
--

DROP TABLE IF EXISTS `elencos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elencos` (
  `idFilme_ELENCO` int(11) NOT NULL,
  `idAtor_ELENCO` int(11) NOT NULL,
  `personagem_ELENCO` varchar(120) NOT NULL,
  PRIMARY KEY (`idFilme_ELENCO`,`idAtor_ELENCO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elencos`
--

LOCK TABLES `elencos` WRITE;
/*!40000 ALTER TABLE `elencos` DISABLE KEYS */;
INSERT INTO `elencos` VALUES (1,1,'Gandalf'),(1,2,'Frodo'),(2,3,'Jack Dawson'),(2,4,'Rose DeWitt Bukater');
/*!40000 ALTER TABLE `elencos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filmes` (
  `id_FILME` int(11) NOT NULL AUTO_INCREMENT,
  `tituloOriginal_FILME` varchar(120) NOT NULL,
  `tituloTraduzido_FILME` varchar(120) NOT NULL,
  `diretor_FILME` varchar(100) NOT NULL,
  `ano_FILME` int(11) NOT NULL,
  `duracao_FILME` int(11) NOT NULL,
  `classificacao_FILME` int(11) NOT NULL,
  `sinopse_FILME` varchar(255) NOT NULL,
  `imagem_FILME` varchar(50) NOT NULL,
  `status_FILME` bit(1) NOT NULL,
  `idGenero_FILME` int(11) NOT NULL,
  PRIMARY KEY (`id_FILME`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes`
--

LOCK TABLES `filmes` WRITE;
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` VALUES (1,'The Lord of the Rings - The Fellowship of the Ring','O Senhor dos Anéis - A Sociedade do Anel','Peter Jackson',2001,195,0,'A casa caiu.','lotr1.jpg','',2),(2,'Titanic','Titanic','James Cameron',2000,183,0,'Bateu e afundou','tit.jpg','',4),(3,'Storm of the Century','A Tempestade do Século','null',1999,215,16,'Um homem misterioso chega ao vilarejo em busca de algo.','sotc.jpg','',5),(4,'Rose Red','Rose Red: A Casa Adormecida','null',2002,175,14,'Uma casa que perturba seus hóspedes.','rr.jpg','',6);
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionarios` (
  `registro_FUNCIONARIO` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_FUNCIONARIO` varchar(11) NOT NULL,
  `rg_FUNCIONARIO` varchar(9) NOT NULL,
  `dataNascimento_FUNCIONARIO` date NOT NULL,
  `nome_FUNCIONARIO` varchar(100) NOT NULL,
  `endereco_FUNCIONARIO` varchar(120) NOT NULL,
  `bairro_FUNCIONARIO` varchar(50) NOT NULL,
  `cidade_FUNCIONARIO` varchar(50) NOT NULL,
  `cep_FUNCIONARIO` varchar(8) NOT NULL,
  `telefone_FUNCIONARIO` varchar(11) NOT NULL,
  `email_FUNCIONARIO` varchar(120) NOT NULL,
  `idCargo_FUNCIONARIO` int(11) NOT NULL,
  `idDepartamento_FUNCIONARIO` int(11) NOT NULL,
  `idCinema_FUNCIONARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`registro_FUNCIONARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generos` (
  `id_GENERO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_GENERO` varchar(60) NOT NULL,
  PRIMARY KEY (`id_GENERO`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Ação'),(2,'Aventura'),(3,'Comédia'),(4,'Drama'),(5,'Suspense'),(6,'Terror'),(7,'Ficção Científica'),(8,'Romance');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingressos`
--

DROP TABLE IF EXISTS `ingressos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingressos` (
  `id_INGRESSO` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_INGRESSO` varchar(50) NOT NULL,
  `valor_INGRESSO` float NOT NULL,
  `numeroPoltrona_INGRESSO` int(11) NOT NULL,
  `cpfCliente_INGRESSO` varchar(11) NOT NULL,
  `idSessao_INGRESSO` int(11) NOT NULL,
  PRIMARY KEY (`id_INGRESSO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingressos`
--

LOCK TABLES `ingressos` WRITE;
/*!40000 ALTER TABLE `ingressos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingressos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens`
--

DROP TABLE IF EXISTS `itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itens` (
  `idVenda_ITEM` int(11) NOT NULL,
  `idProduto_ITEM` int(11) NOT NULL,
  `idCombo_ITEM` int(11) NOT NULL,
  `qtde_ITEM` int(11) NOT NULL,
  PRIMARY KEY (`idVenda_ITEM`,`idProduto_ITEM`,`idCombo_ITEM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itens`
--

LOCK TABLES `itens` WRITE;
/*!40000 ALTER TABLE `itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itenscombo`
--

DROP TABLE IF EXISTS `itenscombo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itenscombo` (
  `idCombo_ITEMCOMBO` int(11) NOT NULL,
  `idProduto_ITEMCOMBO` int(11) NOT NULL,
  `desconto_ITEMCOMBO` float NOT NULL,
  PRIMARY KEY (`idCombo_ITEMCOMBO`,`idProduto_ITEMCOMBO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itenscombo`
--

LOCK TABLES `itenscombo` WRITE;
/*!40000 ALTER TABLE `itenscombo` DISABLE KEYS */;
/*!40000 ALTER TABLE `itenscombo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id_PRODUTO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_PRODUTO` varchar(60) NOT NULL,
  `valor_PRODUTO` float NOT NULL,
  `marca_PRODUTO` varchar(45) NOT NULL,
  `quantidadeEstoque_PRODUTO` int(11) NOT NULL,
  PRIMARY KEY (`id_PRODUTO`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Bala de Goma Fini',12,'Fini',120),(2,'Suco Del Valle Uva',7,'Coca-Cola',65),(3,'Batata Pringles Original',25,'Pringles',80),(4,'MMs',16,'Arcor',50);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salas`
--

DROP TABLE IF EXISTS `salas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas` (
  `id_SALA` int(11) NOT NULL AUTO_INCREMENT,
  `quantidadePoltronas_SALA` int(11) NOT NULL,
  `idTipo_SALA` int(11) NOT NULL,
  `idCinema_SALA` int(11) NOT NULL,
  PRIMARY KEY (`id_SALA`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas`
--

LOCK TABLES `salas` WRITE;
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT INTO `salas` VALUES (1,400,1,1),(2,250,2,1),(3,550,3,1),(4,600,3,1);
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessoes`
--

DROP TABLE IF EXISTS `sessoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessoes` (
  `id_SESSAO` int(11) NOT NULL AUTO_INCREMENT,
  `data_SESSAO` date NOT NULL,
  `hora_SESSAO` time NOT NULL,
  `info_SESSAO` varchar(200) DEFAULT NULL,
  `idSala_SESSAO` int(11) NOT NULL,
  `idFilme_SESSAO` int(11) NOT NULL,
  PRIMARY KEY (`id_SESSAO`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessoes`
--

LOCK TABLES `sessoes` WRITE;
/*!40000 ALTER TABLE `sessoes` DISABLE KEYS */;
INSERT INTO `sessoes` VALUES (1,'2021-05-16','10:00:00',NULL,1,1),(2,'2021-05-16','14:00:00',NULL,1,1),(3,'2021-05-16','14:00:00',NULL,4,1),(4,'2021-05-16','18:00:00',NULL,4,1),(5,'2021-05-16','10:00:00',NULL,2,2),(6,'2021-05-16','10:00:00',NULL,4,2);
/*!40000 ALTER TABLE `sessoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoppings`
--

DROP TABLE IF EXISTS `shoppings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shoppings` (
  `id_SHOPPING` int(11) NOT NULL AUTO_INCREMENT,
  `nome_SHOPPING` varchar(80) NOT NULL,
  `endereco_SHOPPING` varchar(120) NOT NULL,
  `bairro_SHOPPING` varchar(50) NOT NULL,
  `cidade_SHOPPING` varchar(50) NOT NULL,
  `cep_SHOPPING` varchar(8) NOT NULL,
  `telefone_SHOPPING` varchar(11) NOT NULL,
  `idCinema_SHOPPING` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_SHOPPING`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoppings`
--

LOCK TABLES `shoppings` WRITE;
/*!40000 ALTER TABLE `shoppings` DISABLE KEYS */;
/*!40000 ALTER TABLE `shoppings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipossalas`
--

DROP TABLE IF EXISTS `tipossalas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipossalas` (
  `id_TIPOSALA` int(11) NOT NULL AUTO_INCREMENT,
  `nome_TIPOSALA` varchar(20) NOT NULL,
  `descricao_TIPOSALA` varchar(100) NOT NULL,
  PRIMARY KEY (`id_TIPOSALA`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipossalas`
--

LOCK TABLES `tipossalas` WRITE;
/*!40000 ALTER TABLE `tipossalas` DISABLE KEYS */;
INSERT INTO `tipossalas` VALUES (1,'Convencional','Sala normal'),(2,'3D','Sala 3D'),(3,'XD','Ultratela'),(4,'4D','Poltronas dinâmicas');
/*!40000 ALTER TABLE `tipossalas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas` (
  `id_VENDA` int(11) NOT NULL AUTO_INCREMENT,
  `data_VENDA` date NOT NULL,
  `valorTotal_VENDA` float NOT NULL,
  `cpfCliente_VENDA` varchar(11) NOT NULL,
  PRIMARY KEY (`id_VENDA`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (1,'2021-05-24',32,'12345678900');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bdcinema'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-11  7:51:49
