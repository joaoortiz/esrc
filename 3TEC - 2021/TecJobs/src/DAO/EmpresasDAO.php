<?php

require_once "ConexaoDAO.php";
require_once "../Model/Categorias.php";
require_once "../Model/Vagas.php";
require_once "../Model/Empresas.php";

class EmpresasDAO {

//put your code here

    function listarTiposVagas() {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlTV = "Select * from tiposvagas";
        $rsTV = $vConn->query($sqlTV);
        $tblTV = $rsTV->fetchAll(PDO::FETCH_BOTH);

        $tipos = new ArrayObject();

        foreach ($tblTV as $row) {
            $objTV = new Categorias();
            $objTV->setId($row['id_TIPOVAGA']);
            $objTV->setNome($row['nome_TIPOVAGA']);
            $objTV->setDescricao($row['icone_TIPOVAGA']);

            $tipos->append($objTV);
        }

        return $tipos;
    }

    function listarSeguidores($tmpIdEmpresa) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlSeg = "Select C.* from candidatos C, interesses I where ";
        $sqlSeg .= "I.idEmpresa_INTERESSE = '$tmpIdEmpresa' and I.idCandidato_INTERESSE = C.id_CANDIDATO";

        $lista = new ArrayObject();

        $rsSeg = $vConn->query($sqlSeg);
        $tblSeg = $rsSeg->fetchAll(PDO::FETCH_BOTH);

        foreach ($tblSeg as $row) {
            $objCand = new Candidatos();

            $objCand->setId($row['id_CANDIDATO']);
            $objCand->setEmail($row['email_CANDIDATO']);
            $objCand->setNomeCompleto($row['nomeCompleto_CANDIDATO']);
            $objCand->setBio($row['bio_CANDIDATO']);
            $objCand->setCep($row['cep_CANDIDATO']);
            $objCand->setEndereco($row['endereco_CANDIDATO']);
            $objCand->setNumero($row['numero_CANDIDATO']);
            $objCand->setComplemento($row['complemento_CANDIDATO']);
            $objCand->setBairro($row['bairro_CANDIDATO']);
            $objCand->setCidade($row['cidade_CANDIDATO']);
            $objCand->setTelefone($row['telefone_CANDIDATO']);
            $objCand->setImagem($row['imagem_CANDIDATO']);
            $objCand->setLinkedin($row['linkedin_CANDIDATO']);
            $objCand->setWebsite($row['website_CANDIDATO']);

            $lista->append($objCand);
        }
        return $lista;
    }

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

        $sqlVagas = "Select * from vagas v, tiposvagas tv where v.idEmpresa_VAGA = '$idEmpresa' and v.idTipo_VAGA = tv.id_TIPOVAGA";
        $rsVagas = $vConn->query($sqlVagas);
        $tblVagas = $rsVagas->fetchAll(PDO::FETCH_BOTH);

        $vagas = new ArrayObject();

        foreach ($tblVagas as $row) {
            $objVagas = new Vagas();
            $objVagas->setId($row['id_VAGA']);
            $objVagas->setData($row['data_VAGA']);
            $objVagas->setCargo($row['cargo_VAGA']);
            $objVagas->setDescricao($row['descricao_VAGA']);
            $objVagas->setIcone($row['icone_TIPOVAGA']);
            $objVagas->setBeneficios($row['beneficios_VAGA']);
            $objVagas->setPeriodo($row['periodo_VAGA']);
            $objVagas->setContrato($row['contrato_VAGA']);
            $objVagas->setSalario($row['salario_VAGA']);
            $objVagas->setSistema($row['sistema_VAGA']);
            $objVagas->setStatus($row['status_VAGA']);
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
    
    
    function consultarVaga($id) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlVaga = "Select * from VAGAS V, TIPOSVAGAS TV where V.id_VAGA = '$id' and V.idTipo_VAGA = TV.id_TIPOVAGA";

        $rsVaga = $vConn->query($sqlVaga);
        $tblVaga = $rsVaga->fetch();

        $objVaga = new Vagas();

        $objVaga->setId($tblVaga['id_VAGA']);
        $objVaga->setData($tblVaga['data_VAGA']);
        $objVaga->setCargo($tblVaga['cargo_VAGA']);
        $objVaga->setDescricao($tblVaga['descricao_VAGA']);
        $objVaga->setSalario($tblVaga['salario_VAGA']);
        $objVaga->setContrato($tblVaga['contrato_VAGA']);
        $objVaga->setPeriodo($tblVaga['periodo_VAGA']);
        $objVaga->setSistema($tblVaga['sistema_VAGA']);
        $objVaga->setBeneficios($tblVaga['beneficios_VAGA']);
        $objVaga->setIdTipo($tblVaga['idTipo_VAGA']);
        $objVaga->setIdEmpresa($tblVaga['idEmpresa_VAGA']);
        $objVaga->setStatus($tblVaga['status_VAGA']);
        
        return $objVaga;
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

        $sqlVaga = "Insert into vagas(data_VAGA, cargo_VAGA, descricao_VAGA, salario_VAGA,contrato_VAGA,";
        $sqlVaga.= "periodo_VAGA, sistema_VAGA, beneficios_VAGA, idTipo_VAGA, status_VAGA, idEmpresa_VAGA) values (";
        $sqlVaga.= "'" . $vaga->getData() . "',";
        $sqlVaga.= "'" . $vaga->getCargo() . "',";
        $sqlVaga.= "'" . $vaga->getDescricao() . "',";
        $sqlVaga.= $vaga->getSalario() . ",";
        $sqlVaga.= "'" . $vaga->getContrato() . "',";
        $sqlVaga.= $vaga->getPeriodo() . ",";
        $sqlVaga.= "'" . $vaga->getSistema() . "',";
        $sqlVaga.= "'" . $vaga->getBeneficios() . "',";
        $sqlVaga.= $vaga->getIdTipo() . ",";
        $sqlVaga.= $vaga->getStatus() . ",";
        $sqlVaga.= $vaga->getIdEmpresa() . ")";

        $vConn->query($sqlVaga);
    }

    function cadastrarEmpresa($tmpEmpresa) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCadastro = "Insert into empresas(";
        $sqlCadastro.="email_EMPRESA, nomeFantasia_EMPRESA,cep_EMPRESA,";
        $sqlCadastro.="endereco_EMPRESA, numero_EMPRESA,complemento_EMPRESA,";
        $sqlCadastro.="bairro_EMPRESA, cidade_EMPRESA,telefone_EMPRESA,";
        $sqlCadastro.="imagem_EMPRESA, idCategoria_EMPRESA)values(";
        $sqlCadastro.="'" . $tmpEmpresa->getEmail() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getNomeFantasia() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getCep() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getEndereco() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getNumero() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getComplemento() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getBairro() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getCidade() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getTelefone() . "',";
        $sqlCadastro.="'" . $tmpEmpresa->getImagem() . "',";
        $sqlCadastro.= $tmpEmpresa->getIdCategoria() . ")";

        $vConn->query($sqlCadastro);
    }

    function adicionarInfo($tmpInfo, $tmpId) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlInfo = "Update empresas set info_EMPRESA = '$tmpInfo' where id_EMPRESA = '$tmpId'";

        $vConn->query($sqlInfo);
    }

    function consultarUltimaEmpresa() {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlEmp = "Select id_EMPRESA from EMPRESAS order by id_EMPRESA desc limit 1";
        $rsId = $vConn->query($sqlEmp);

        $tblId = $rsId->fetch();

        return $tblId['id_EMPRESA'];
    }

    function registrarNecessidade($idEmp, $idTec) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlNec = "Insert into necessidades(idEmpresa_NECESSIDADE, idTecnologia_NECESSIDADE)values('$idEmp','$idTec')";

        $vConn->query($sqlNec);
    }

    function listarNecessidades($idEmp) {

        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        $sqlNec = "Select T.* from tecnologias T, necessidades N where N.idEmpresa_NECESSIDADE = '$idEmp' and T.id_TECNOLOGIA = N.idTecnologia_NECESSIDADE";
        $rsNec = $vConn->query($sqlNec);
        $tblNec = $rsNec->fetchAll(PDO::FETCH_BOTH);

        $tecn = new ArrayObject();

        foreach ($tblNec as $row) {

            $objTec = new Tecnologias();
            $objTec->setId($row['id_TECNOLOGIA']);
            $objTec->setNome($row['nome_TECNOLOGIA']);
            $objTec->setDescricao($row['descricao_TECNOLOGIA']);
            $objTec->setIcone($row['icone_TECNOLOGIA']);

            $tecn->append($objTec); //add obj no vetor
        }

        return $tecn;
    }

    static function retornaEspaco($tmpNome) {
        $espaco = false;
        for ($i = 0; $i < strlen($tmpNome); $i++) {
            $letra = substr($tmpNome, $i, 1);
            if ($letra == " ") {
                $espaco = true;
                return $i;
            }
        }

        if ($espaco == false)
            return strlen($tmpNome);
    }

}
