CREATE DATABASE  IF NOT EXISTS `bdtecjobs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdtecjobs`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bdtecjobs
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
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id_AREA` int(11) NOT NULL AUTO_INCREMENT,
  `nome_AREA` varchar(50) NOT NULL,
  `abrangencia_AREA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_AREA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidatos`
--

DROP TABLE IF EXISTS `candidatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidatos` (
  `id_CANDIDATO` int(11) NOT NULL AUTO_INCREMENT,
  `email_CANDIDATO` varchar(120) NOT NULL,
  `nomeCompleto_CANDIDATO` varchar(120) NOT NULL,
  `dataNascimento_CANDIDATO` date NOT NULL,
  `sexo_CANDIDATO` varchar(1) DEFAULT NULL,
  `bio_CANDIDATO` varchar(255) DEFAULT NULL,
  `cep_CANDIDATO` varchar(8) NOT NULL,
  `endereco_CANDIDATO` varchar(150) NOT NULL,
  `numero_CANDIDATO` int(11) NOT NULL,
  `complemento_CANDIDATO` varchar(50) DEFAULT NULL,
  `bairro_CANDIDATO` varchar(60) NOT NULL,
  `cidade_CANDIDATO` varchar(60) NOT NULL,
  `telefone_CANDIDATO` varchar(11) NOT NULL,
  `imagem_CANDIDATO` varchar(37) DEFAULT NULL,
  PRIMARY KEY (`id_CANDIDATO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidatos`
--

LOCK TABLES `candidatos` WRITE;
/*!40000 ALTER TABLE `candidatos` DISABLE KEYS */;
INSERT INTO `candidatos` VALUES (1,'joao@esrc.com.br','João Ortiz','1985-06-08','M','Bacharel em Ciência da Computação, Pós graduado em Des. de Sistemas e Docência no Ens. Superior.','02138040','R. Marabu',223,'','','','1129496686','joao.jpg');
/*!40000 ALTER TABLE `candidatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `nome_CATEGORIA` varchar(50) NOT NULL,
  `descricao_CATEGORIA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_CATEGORIA`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Comunicação e Jornalismo','Emissora de TV direcionada ao jornalismo'),(2,'Tecnologia Industrial','');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id_CURSO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_CURSO` varchar(120) NOT NULL,
  PRIMARY KEY (`id_CURSO`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Direito'),(2,'Engenharia Civil'),(3,'Arquitetura'),(4,'Ciências da Computação'),(5,'Publicidade e Propaganda'),(6,'Jornalismo e Comunicação'),(7,'Sistemas de Informação'),(8,'Turismo'),(9,'Enfermagem');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id_EMPRESA` int(11) NOT NULL AUTO_INCREMENT,
  `email_EMPRESA` varchar(120) NOT NULL,
  `nomeFantasia_EMPRESA` varchar(120) NOT NULL,
  `info_EMPRESA` text,
  `cep_EMPRESA` varchar(8) NOT NULL,
  `endereco_EMPRESA` varchar(150) NOT NULL,
  `numero_EMPRESA` int(11) NOT NULL,
  `complemento_EMPRESA` varchar(50) DEFAULT NULL,
  `bairro_EMPRESA` varchar(60) NOT NULL,
  `cidade_EMPRESA` varchar(60) NOT NULL,
  `telefone_EMPRESA` varchar(11) NOT NULL,
  `imagem_EMPRESA` varchar(37) DEFAULT NULL,
  `idCategoria_EMPRESA` int(11) NOT NULL,
  PRIMARY KEY (`id_EMPRESA`),
  KEY `idCategoria_EMPRESA` (`idCategoria_EMPRESA`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'web@cnn.com','CNN Brasil','Líder em Independência','01310100','Av. Paulista',1564,'2º Andar','Consolação','São Paulo','1145547877','cnn.jpg',1),(2,'web@caterpillar.com','Caterpillar','Pioneira no desenvolvimento de máquinas e tratores.','04587030','Rod. dos Bandeirantes',0,'Km 122','Jd. das Oliveiras','Americana','1935521424','cat.png',2);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formacoes`
--

DROP TABLE IF EXISTS `formacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formacoes` (
  `idCandidato_FORMACAO` int(11) NOT NULL,
  `idCurso_FORMACAO` int(11) NOT NULL,
  `idInstituicao_FORMACAO` int(11) NOT NULL,
  `anoInicio_FORMACAO` int(11) NOT NULL,
  `anoFim_FORMACAO` int(11) NOT NULL,
  `concluido_FORMACAO` tinyint(1) NOT NULL,
  PRIMARY KEY (`idCandidato_FORMACAO`,`idCurso_FORMACAO`,`idInstituicao_FORMACAO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formacoes`
--

LOCK TABLES `formacoes` WRITE;
/*!40000 ALTER TABLE `formacoes` DISABLE KEYS */;
INSERT INTO `formacoes` VALUES (1,4,6,2003,2006,1);
/*!40000 ALTER TABLE `formacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instituicoes`
--

DROP TABLE IF EXISTS `instituicoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instituicoes` (
  `id_INSTITUICAO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_INSTITUICAO` varchar(120) NOT NULL,
  PRIMARY KEY (`id_INSTITUICAO`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes`
--

LOCK TABLES `instituicoes` WRITE;
/*!40000 ALTER TABLE `instituicoes` DISABLE KEYS */;
INSERT INTO `instituicoes` VALUES (1,'Universidade de São Paulo'),(2,'Unicamp - SP'),(3,'PUC - SP'),(4,'Uninove'),(5,'Unip'),(6,'Universidade São Judas Tadeu'),(7,'Unicid'),(8,'FMU');
/*!40000 ALTER TABLE `instituicoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interesses`
--

DROP TABLE IF EXISTS `interesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interesses` (
  `idCandidato_INTERESSE` int(11) NOT NULL,
  `idEmpresa_INTERESSE` int(11) NOT NULL,
  `direcao_INTERESSE` int(11) NOT NULL,
  PRIMARY KEY (`idCandidato_INTERESSE`,`idEmpresa_INTERESSE`,`direcao_INTERESSE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interesses`
--

LOCK TABLES `interesses` WRITE;
/*!40000 ALTER TABLE `interesses` DISABLE KEYS */;
INSERT INTO `interesses` VALUES (1,1,2);
/*!40000 ALTER TABLE `interesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveis`
--

DROP TABLE IF EXISTS `niveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveis` (
  `idCandidato_NIVEL` int(11) NOT NULL,
  `idTecnologia_NIVEL` int(11) NOT NULL,
  `classificacao_NIVEL` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCandidato_NIVEL`,`idTecnologia_NIVEL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveis`
--

LOCK TABLES `niveis` WRITE;
/*!40000 ALTER TABLE `niveis` DISABLE KEYS */;
INSERT INTO `niveis` VALUES (1,1,4),(1,2,5),(1,3,4),(1,4,5),(1,5,1);
/*!40000 ALTER TABLE `niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tecnologias`
--

DROP TABLE IF EXISTS `tecnologias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tecnologias` (
  `id_TECNOLOGIA` int(11) NOT NULL,
  `nome_TECNOLOGIA` varchar(50) DEFAULT NULL,
  `descricao_TECNOLOGIA` varchar(150) DEFAULT NULL,
  `icone_TECNOLOGIA` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_TECNOLOGIA`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tecnologias`
--

LOCK TABLES `tecnologias` WRITE;
/*!40000 ALTER TABLE `tecnologias` DISABLE KEYS */;
INSERT INTO `tecnologias` VALUES (1,'Java','Linguagem de Programação','java.png'),(2,'HTML 5','Desenvolvimento WEB','html.png'),(3,'CSS','Layouts e Interfaces WEB','css.png'),(4,'PHP','Programação WEB','php.png'),(5,'Python','Programação e Análise de Dados','python.png'),(6,'Photoshop','Design e UI','ps.png'),(7,'Javascript','Programação WEB','js.png'),(8,'MySQL','Banco de Dados','mysql.png');
/*!40000 ALTER TABLE `tecnologias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `login_USUARIO` varchar(20) NOT NULL,
  `senha_USUARIO` varchar(32) NOT NULL,
  `permissao_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`login_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('joao@esrc.com.br','e10adc3949ba59abbe56e057f20f883e',3),('web@cnn.com','e10adc3949ba59abbe56e057f20f883e',2),('web@caterpillar.com','e10adc3949ba59abbe56e057f20f883e',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vagas`
--

DROP TABLE IF EXISTS `vagas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vagas` (
  `id_VAGA` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_VAGA` varchar(30) NOT NULL,
  `descricao_VAGA` text NOT NULL,
  `idEmpresa_VAGA` int(11) NOT NULL,
  PRIMARY KEY (`id_VAGA`),
  KEY `idEmpresa_VAGA` (`idEmpresa_VAGA`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagas`
--

LOCK TABLES `vagas` WRITE;
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
INSERT INTO `vagas` VALUES (1,'Analista de Dados','O candidato deverá ser apto a criar layouts e artes baseadas em dados estatísticos.',1),(2,'Analista Político','O candidato deverá estar apto a realizar análises do atual cenário político mundial com base em tendências e eventos históricos.',1);
/*!40000 ALTER TABLE `vagas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bdtecjobs'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-07  7:12:32
