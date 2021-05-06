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

-- Dump completed on 2021-05-05 21:22:40
