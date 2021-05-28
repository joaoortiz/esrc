<?php

require_once "ConexaoDAO.php";
require_once "../Model/Categorias.php";
require_once "../Model/Vagas.php";
require_once "../Model/Empresas.php";

class EmpresasDAO {

    //put your code here

    function listarCategorias() {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCat = "Select * from categorias";
        $rsCat = $vConn->query($sqlCat);
        $tblCat = $rsCat->fetchAll(PDO::FETCH_BOTH);

        $cat = new ArrayObject();

        foreach ($tblCat as $row) {
            $objCat = new Categorias();
            $objCat->setId($row['id_CATEGORIA']);
            $objCat->setNome($row['nome_CATEGORIA']);
            $objCat->setDescricao($row['descricao_CATEGORIA']);

            $cat->append($objCat);
        }

        return $cat;
    }

    function listarVagas($idEmpresa) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlVagas = "Select * from vagas where idEmpresa_VAGA = '$idEmpresa'";
        $rsVagas = $vConn->query($sqlVagas);
        $tblVagas = $rsVagas->fetchAll(PDO::FETCH_BOTH);

        $vagas = new ArrayObject();

        foreach ($tblVagas as $row) {
            $objVagas = new Vagas();
            $objVagas->setId($row['id_VAGA']);
            $objVagas->setCargo($row['cargo_VAGA']);
            $objVagas->setDescricao($row['descricao_VAGA']);
            $objVagas->setIcone($row['icone_VAGA']);
            $objVagas->setIdEmpresa($row['idEmpresa_VAGA']);

            $vagas->append($objVagas);
        }

        return $vagas;
    }

    function consultarCategoria($id) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCat = "Select * from categorias where id_CATEGORIA = '$id'";
        $rsCat = $vConn->query($sqlCat);
        $tblCat = $rsCat->fetch();

        return $tblCat['nome_CATEGORIA'];
    }

    function consultarEmpresa($id) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlEmp = "Select * from EMPRESAS E where E.id_EMPRESA = '$id'";

        $rsEmp = $vConn->query($sqlEmp);
        $tblEmpresa = $rsEmp->fetch();

        $objEmpresa = new Empresas();

        $objEmpresa->setId($tblEmpresa['id_EMPRESA']);
        $objEmpresa->setEmail($tblEmpresa['email_EMPRESA']);
        $objEmpresa->setNomeFantasia($tblEmpresa['nomeFantasia_EMPRESA']);
        $objEmpresa->setInfo($tblEmpresa['info_EMPRESA']);
        $objEmpresa->setCep($tblEmpresa['cep_EMPRESA']);
        $objEmpresa->setEndereco($tblEmpresa['endereco_EMPRESA']);
        $objEmpresa->setNumero($tblEmpresa['numero_EMPRESA']);
        $objEmpresa->setComplemento($tblEmpresa['complemento_EMPRESA']);
        $objEmpresa->setBairro($tblEmpresa['bairro_EMPRESA']);
        $objEmpresa->setCidade($tblEmpresa['cidade_EMPRESA']);
        $objEmpresa->setTelefone($tblEmpresa['telefone_EMPRESA']);
        $objEmpresa->setImagem($tblEmpresa['imagem_EMPRESA']);
        $objEmpresa->setIdCategoria($tblEmpresa['idCategoria_EMPRESA']);

        return $objEmpresa;
    }

    function listarEmpresas($nome, $idCat, $tipo) {

        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlEmp = "";

        if ($tipo == 0) { //todas
            $sqlEmp = "Select * from EMPRESAS";
        } else if ($tipo == 1) { //por nome
            $sqlEmp = "Select * from EMPRESAS where nomeFantasia_EMPRESA like '%$nome%'";
        } else if ($tipo == 2) { //por cat
            $sqlEmp = "Select * from EMPRESAS where idCategoria_EMPRESA = '$idCat'";
        }

        $rsEmp = $vConn->query($sqlEmp);
        $tblEmpresa = $rsEmp->fetchAll(PDO::FETCH_BOTH);

        $lista = new ArrayObject();

        foreach ($tblEmpresa as $row) {

            $objEmpresa = new Empresas();

            $objEmpresa->setId($row['id_EMPRESA']);
            $objEmpresa->setEmail($row['email_EMPRESA']);
            $objEmpresa->setNomeFantasia($row['nomeFantasia_EMPRESA']);
            $objEmpresa->setInfo($row['info_EMPRESA']);
            $objEmpresa->setCep($row['cep_EMPRESA']);
            $objEmpresa->setEndereco($row['endereco_EMPRESA']);
            $objEmpresa->setNumero($row['numero_EMPRESA']);
            $objEmpresa->setComplemento($row['complemento_EMPRESA']);
            $objEmpresa->setBairro($row['bairro_EMPRESA']);
            $objEmpresa->setCidade($row['cidade_EMPRESA']);
            $objEmpresa->setTelefone($row['telefone_EMPRESA']);
            $objEmpresa->setImagem($row['imagem_EMPRESA']);
            $objEmpresa->setIdCategoria($row['idCategoria_EMPRESA']);

            $lista->append($objEmpresa);
        }

        return $lista;
    }

    function seguirEmpresa($idCand, $idEmpresa) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlSeguir = "Insert into interesses(idCandidato_INTERESSE, idEmpresa_INTERESSE, direcao_INTERESSE) values";
        $sqlSeguir.= "($idCand,$idEmpresa,1)";

        $vConn->query($sqlSeguir);
    }

    function removerRelacao($idCand, $idEmpresa) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlSeguir = "Delete from interesses where idCandidato_INTERESSE = '$idCand' and idEmpresa_INTERESSE = '$idEmpresa'";
        $vConn->query($sqlSeguir);
    }

    function verificarRelacao($idCand, $idEmpresa) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlVer = "Select * from INTERESSES where idCandidato_INTERESSE = '$idCand' and idEmpresa_INTERESSE = '$idEmpresa'";

        $rsVer = $vConn->query($sqlVer);
        $numReg = $rsVer->rowCount();

        if ($numReg == 0)
            return false;
        else
            return true;
    }

    function cadastrarVaga($vaga) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        
        $sqlVaga = "Insert into vagas(cargo_VAGA, descricao_VAGA, idEmpresa_VAGA) values (";
        $sqlVaga.= "'" . $vaga->getCargo() . "',";
        $sqlVaga.= "'" . $vaga->getDescricao() . "',";
        $sqlVaga.= $vaga->getIdEmpresa() . ")";
        
        $vConn->query($sqlVaga);
    }
    
    function cadastrarEmpresa($tmpEmpresa){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        
        $sqlCadastro = "Insert into empresas(";
        $sqlCadastro.="email_EMPRESA, nomeFantasia_EMPRESA,cep_EMPRESA,";
        $sqlCadastro.="endereco_EMPRESA, numero_EMPRESA,complemento_EMPRESA,";
        $sqlCadastro.="bairro_EMPRESA, cidade_EMPRESA,telefone_EMPRESA,";
        $sqlCadastro.="imagem_EMPRESA, idCategoria_EMPRESA)values(";
        $sqlCadastro.="'" . $tmpEmpresa->getEmail() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getNomeFantasia() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getCep() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getEndereco() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getNumero() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getComplemento() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getBairro() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getCidade() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getTelefone() . "'";
        $sqlCadastro.="'" . $tmpEmpresa->getImagem() . "'";
        $sqlCadastro.= $tmpEmpresa->getIdCategoria() . ")";
        
        $vConn->query($sqlCadastro);
    }
    
    function adicionarInfo($tmpInfo, $tmpId){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        
        $sqlInfo ="Update empresas set info_EMPRESA = '$tmpInfo' where id_EMPRESA = '$tmpId'";
                
        $vConn->query($sqlInfo);
    }
    
    function consultarUltimaEmpresa(){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        
        $sqlEmp = "Select id_EMPRESA from EMPRESAS order by id_EMPRESA desc limit 1";
        $rsId = $vConn->query($sqlEmp);
        
        $tblId = $rsId->fetch();
        
        return $tblId['id_EMPRESA'];
        
         
    }
    

}
