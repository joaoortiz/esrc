CREATE DATABASE  IF NOT EXISTS `bdtecjobs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdtecjobs`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bdtecjobs
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `aplicacoes`
--

DROP TABLE IF EXISTS `aplicacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aplicacoes` (
  `idCandidato_APLICACAO` int(11) NOT NULL,
  `idVaga_APLICACAO` int(11) NOT NULL,
  `data_APLICACAO` date NOT NULL,
  `apresentacao_APLICACAO` text NOT NULL,
  `arquivo_APLICACAO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCandidato_APLICACAO`,`idVaga_APLICACAO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aplicacoes`
--

LOCK TABLES `aplicacoes` WRITE;
/*!40000 ALTER TABLE `aplicacoes` DISABLE KEYS */;
INSERT INTO `aplicacoes` VALUES (1,8,'2021-09-08','Gostaria de aplicar para esta vaga, pois acredito ter os requisitos necessários que atendem as exigências.',NULL),(3,8,'2021-09-08','Acredito estar apto a auxiliar a empresa em seus processos.',NULL),(1,9,'2021-09-10','Tenho interesse em colaborar com os processos da empresa, já que é uma companhia que acompanho há muito tempo.','Consultas SQL - 2021.docx');
/*!40000 ALTER TABLE `aplicacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `idVaga_AREA` int(11) NOT NULL,
  `idTecnologia_AREA` int(11) NOT NULL,
  PRIMARY KEY (`idVaga_AREA`,`idTecnologia_AREA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,5),(3,2),(3,3),(3,7),(4,6),(6,5),(7,5),(8,1),(8,3),(9,2),(9,3),(9,6);
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
  `linkedin_CANDIDATO` varchar(255) DEFAULT NULL,
  `website_CANDIDATO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_CANDIDATO`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidatos`
--

LOCK TABLES `candidatos` WRITE;
/*!40000 ALTER TABLE `candidatos` DISABLE KEYS */;
INSERT INTO `candidatos` VALUES (1,'joao@esrc.com.br','João Ortiz','1985-06-08','M','Bacharel em Ciência da Computação, Pós graduado em Des. de Sistemas e Docência no Ens. Superior.','02138040','R. Marabu',223,'','','','1129496686','joao.jpg',NULL,'http://esrc.com.br/joaoortiz/Portifolio'),(3,'lmongiat@gmail.com','Lucas Mongiat','2005-08-08','M','Estudante da área de TI com conhecimentos em design e projetos de rede.','03124000','R. Sg. Rodrigues Alves',458,'Apto 85 Bl 2','Pq. Novo Mundo','São Paulo','11974547455','lucao.jpg','http://linkedin.com/lmongiat','http://esrc.com.br'),(4,'boneli@gmail.com','Matheus Boneli Carvas','2005-05-05','M','Especialista em edição de imagens e criação de soluções digitais.','02138040','Rua Marabu',223,'','Vila Sabrina','São Paulo','1198564578','bon.PNG','http://linkedin.com/mboneli','http://esrc.com.br');
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Comunicação e Jornalismo','Emissora de TV direcionada ao jornalismo'),(2,'Tecnologia Industrial',''),(3,'Transporte e Turismo',NULL),(4,'Moradia e Imóveis','Empresa de aluguel e venda de imóveis'),(5,'Administração de Inteligência e Dados',NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Direito'),(2,'Engenharia Civil'),(3,'Arquitetura'),(4,'Ciências da Computação'),(5,'Publicidade e Propaganda'),(6,'Jornalismo e Comunicação'),(7,'Sistemas de Informação'),(8,'Turismo'),(9,'Enfermagem'),(10,'Ensino Fundamental II'),(11,'Ensino Médio');
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'web@cnn.com','CNN Brasil','Líder em Independência','01310100','Av. Paulista',1564,'2º Andar','Consolação','São Paulo','1145547877','cnn.jpg',1),(2,'web@caterpillar.com','Caterpillar','Pioneira no desenvolvimento de máquinas e tratores.','04587030','Rod. dos Bandeirantes',0,'Km 122','Jd. das Oliveiras','Americana','1935521424','cat.png',2),(8,'web@zillow.com','Zillow Rental Home','Empresa virtual gestora de venda e aluguel de imóveis em território americano.','74159','Post St',452,'','Soma','San Francisco','555369852','zil.png',4),(7,'web@megabus.com','Megabus Company Travel','Empresa rodoviária líder no transporte de passageiros nos EUA e Reino Unido.','70951','Central St',56,'Union Station','Downtown','Los Angeles','555478745','mgb.jpg',3),(9,'oracle@oracle.com','Oracle Systems and Technology','A Oracle Corporation é uma empresa multinacional de tecnologia e informática norte-americana, especializada no desenvolvimento e comercialização de hardware e softwares e de banco de dados.','79561','San Jose St',454,'','Silicon Valley','San Jose','1555478456','oracle-logo.png',5);
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
INSERT INTO `formacoes` VALUES (1,4,6,2003,2006,1),(3,10,10,2009,2015,1),(3,11,9,2016,2019,1);
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instituicoes`
--

LOCK TABLES `instituicoes` WRITE;
/*!40000 ALTER TABLE `instituicoes` DISABLE KEYS */;
INSERT INTO `instituicoes` VALUES (1,'Universidade de São Paulo'),(2,'Unicamp - SP'),(3,'PUC - SP'),(4,'Uninove'),(5,'Unip'),(6,'Universidade São Judas Tadeu'),(7,'Unicid'),(8,'FMU'),(9,'Educandário Santa Rita de Cássia'),(10,'Colégio Del Volente');
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
INSERT INTO `interesses` VALUES (1,1,1),(1,2,1),(1,8,1),(1,9,1),(3,7,1),(3,8,1),(4,7,1);
/*!40000 ALTER TABLE `interesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `necessidades`
--

DROP TABLE IF EXISTS `necessidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `necessidades` (
  `idEmpresa_NECESSIDADE` int(11) NOT NULL,
  `idTecnologia_NECESSIDADE` int(11) NOT NULL,
  `descricao_NECESSIDADE` text,
  PRIMARY KEY (`idEmpresa_NECESSIDADE`,`idTecnologia_NECESSIDADE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `necessidades`
--

LOCK TABLES `necessidades` WRITE;
/*!40000 ALTER TABLE `necessidades` DISABLE KEYS */;
INSERT INTO `necessidades` VALUES (1,5,''),(1,8,''),(1,6,''),(8,2,''),(7,6,''),(7,5,''),(7,1,''),(8,3,''),(8,7,''),(9,8,NULL),(9,5,NULL);
/*!40000 ALTER TABLE `necessidades` ENABLE KEYS */;
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
INSERT INTO `niveis` VALUES (1,1,3),(1,2,3),(1,3,3),(1,4,3),(1,5,1),(3,6,1),(3,2,1),(4,6,1),(4,2,1),(4,3,1);
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
INSERT INTO `tecnologias` VALUES (1,'Java','Linguagem de Programação','1.png'),(2,'HTML 5','Desenvolvimento WEB','2.png'),(3,'CSS','Layouts e Interfaces WEB','3.png'),(4,'PHP','Programação WEB','4.png'),(5,'Python','Programação e Análise de Dados','5.png'),(6,'Photoshop','Design e UI','6.png'),(7,'Javascript','Programação WEB','7.png'),(8,'MySQL','Banco de Dados','8.png');
/*!40000 ALTER TABLE `tecnologias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposvagas`
--

DROP TABLE IF EXISTS `tiposvagas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposvagas` (
  `id_TIPOVAGA` int(11) NOT NULL AUTO_INCREMENT,
  `nome_TIPOVAGA` varchar(100) NOT NULL,
  `icone_TIPOVAGA` varchar(20) NOT NULL,
  PRIMARY KEY (`id_TIPOVAGA`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposvagas`
--

LOCK TABLES `tiposvagas` WRITE;
/*!40000 ALTER TABLE `tiposvagas` DISABLE KEYS */;
INSERT INTO `tiposvagas` VALUES (1,'Administrativo','black-tie'),(2,'Produção','industry'),(3,'Tecnologia','laptop'),(4,'Financeiro','money');
/*!40000 ALTER TABLE `tiposvagas` ENABLE KEYS */;
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
INSERT INTO `usuarios` VALUES ('joao@esrc.com.br','e10adc3949ba59abbe56e057f20f883e',3),('web@cnn.com','e10adc3949ba59abbe56e057f20f883e',2),('web@caterpillar.com','e10adc3949ba59abbe56e057f20f883e',2),('web@megabus.com','e10adc3949ba59abbe56e057f20f883e',2),('web@zillow.com','e10adc3949ba59abbe56e057f20f883e',2),('lmongiat@gmail.com','e10adc3949ba59abbe56e057f20f883e',3),('oracle@oracle.com','e10adc3949ba59abbe56e057f20f883e',2),('boneli@gmail.com','e10adc3949ba59abbe56e057f20f883e',3);
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
  `data_VAGA` date NOT NULL,
  `cargo_VAGA` varchar(30) NOT NULL,
  `descricao_VAGA` text NOT NULL,
  `salario_VAGA` float NOT NULL,
  `contrato_VAGA` varchar(45) NOT NULL,
  `periodo_VAGA` int(11) NOT NULL,
  `sistema_VAGA` varchar(45) NOT NULL,
  `beneficios_VAGA` varchar(200) NOT NULL,
  `idTipo_VAGA` int(11) DEFAULT NULL,
  `status_VAGA` int(11) NOT NULL,
  `idEmpresa_VAGA` int(11) NOT NULL,
  PRIMARY KEY (`id_VAGA`),
  KEY `idEmpresa_VAGA` (`idEmpresa_VAGA`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagas`
--

LOCK TABLES `vagas` WRITE;
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
INSERT INTO `vagas` VALUES (1,'2021-08-27','Analista de Dados','O candidato deverá ser apto a criar layouts e artes baseadas em dados estatísticos.',9500,'CLT',10,'Presencial','Saúde, Transporte',3,0,1),(2,'2021-08-27','Analista Político','O candidato deverá estar apto a realizar análises do atual cenário político mundial com base em tendências e eventos históricos.',7000,'CLT',8,'Remoto','Saúde, Odontológico',1,0,1),(3,'2021-08-27','Web Designer','O candidato deverá ser apto a elaborar documentos e páginas multimídia incorporadas ao site, a fim de promover a convergências das reportagens criadas pela emissora.',8000,'CLT',8,'Remoto','Saúde, Alimentação',3,0,1),(4,'2021-08-27','Motion Designer','O candidato deverá estar apto a criar artes e modelos gráficos a partir dos dados estatísticos levantados pelo sistema e pelos analistas de dados.',6000,'CLT',8,'Remoto','Saúde',3,0,1),(5,'2021-08-27','Auxiliar de Produção','O candidato deverá ser apto a otimizar os processos de produção ao vivo dos programas e jornais, apresentando alternativas de exibição em diversas mídias.',4500,'CLT',10,'Presencial','Saúde',2,0,1),(6,'2021-08-27','Analista de Dados','Gerar relatórios de dados estratégicos a partir dos números relacionados às viagens efetuadas.',8000,'CLT',8,'Presencial','Saúde',3,0,7),(8,'2021-09-03','Analista de Sistemas','O candidato deverá ser apto a levantar soluções tecnológicas para processos rotineiros da empresa, analisando ambientes, e buscando a confecção do melhor modelo de sistema para armazenamento e gerenciamento dos dados.',6500,'CLT',8,'Presencial','Transporte, alimentação, saúde, odontológico. Bônus por produtividade.',3,1,9),(9,'2021-09-09','Editor de Imagens','O usuário deverá processar e editar as imagens recebidas pelos usuários que serão destinadas ao processo de publicação final.\r\nConhecimentos exigidos em Adobe Illustrator, Photoshop e Corel Draw. Diferenciais: HTML e CSS.',3500,'CLT',9,'Presencial','Transporte, saúde, alimentação.',3,1,8);
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

-- Dump completed on 2021-09-10 11:09:40
