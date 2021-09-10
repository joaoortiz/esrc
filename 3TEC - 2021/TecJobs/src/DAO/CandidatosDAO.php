<?php

require_once "ConexaoDAO.php";
require_once "../Model/Candidatos.php";
require_once "../Model/Tecnologias.php";
require_once "../Model/Empresas.php";
require_once "../Model/Curriculos.php";

class CandidatosDAO {

    function listarCandidatos($tipo, $idVaga) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        if ($tipo == 0)
            $sqlCand = "Select * from candidatos";
        else if ($tipo == 1)
            $sqlCand = "Select C.* from candidatos C, aplicacoes A where A.idVaga_APLICACAO = '$idVaga' and A.idCandidato_APLICACAO = C.id_CANDIDATO";

        $rsCand = $vConn->query($sqlCand);
        $tblCand = $rsCand->fetchAll(PDO::FETCH_BOTH);

        $lista = new ArrayObject();

        foreach ($tblCand as $row) {

            $objCandidato = new Candidatos();

            $objCandidato->setId($row['id_CANDIDATO']);
            $objCandidato->setEmail($row['email_CANDIDATO']);
            $objCandidato->setNomeCompleto($row['nomeCompleto_CANDIDATO']);
            $objCandidato->setDataNascimento($row['dataNascimento_CANDIDATO']);
            $objCandidato->setSexo($row['sexo_CANDIDATO']);
            $objCandidato->setBio($row['bio_CANDIDATO']);
            $objCandidato->setCep($row['cep_CANDIDATO']);
            $objCandidato->setEndereco($row['endereco_CANDIDATO']);
            $objCandidato->setNumero($row['numero_CANDIDATO']);
            $objCandidato->setBairro($row['bairro_CANDIDATO']);
            $objCandidato->setCidade($row['cidade_CANDIDATO']);
            $objCandidato->setComplemento($row['complemento_CANDIDATO']);
            $objCandidato->setTelefone($row['telefone_CANDIDATO']);
            $objCandidato->setImagem($row['imagem_CANDIDATO']);
            $objCandidato->setLinkedin($row['linkedin_CANDIDATO']);
            $objCandidato->setWebsite($row['website_CANDIDATO']);
            $objCandidato->setPermissao(3);

            $lista->append($objCandidato);
        }

        return $lista;
    }

    function listarFormacoes($idCand) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlForm = "Select * from formacoes F, instituicoes I, cursos C where F.idCandidato_FORMACAO = '$idCand' and F.idInstituicao_FORMACAO = I.id_INSTITUICAO and F.idCurso_FORMACAO = C.id_CURSO";
        $rsForm = $vConn->query($sqlForm);
        $tblForm = $rsForm->fetchAll(PDO::FETCH_BOTH);

        $form = new ArrayObject();

        foreach ($tblForm as $row) {
            $objCur = new Curriculos();
            $objCur->setNomeInstituicao($row['nome_INSTITUICAO']);
            $objCur->setNomeCurso($row['nome_CURSO']);
            $objCur->setInicio($row['anoInicio_FORMACAO']);
            $objCur->setFim($row['anoFim_FORMACAO']);
            $objCur->setConclusao($row['concluido_FORMACAO']);

            $form->append($objCur);
        }

        return $form;
    }

    function listarInteresses($idCand) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlInt = "Select * from interesses I, empresas E where I.idCandidato_INTERESSE = '$idCand' and I.idEmpresa_INTERESSE = E.id_EMPRESA";
        $rsInt = $vConn->query($sqlInt);
        $tblInt = $rsInt->fetchAll(PDO::FETCH_BOTH);

        $inter = new ArrayObject();

        foreach ($tblInt as $row) {
            $objEmp = new Empresas();
            $objEmp->setId($row['id_EMPRESA']);
            $objEmp->setNomeFantasia($row['nomeFantasia_EMPRESA']);
            $objEmp->setImagem($row['imagem_EMPRESA']);

            $inter->append($objEmp);
        }

        return $inter;
    }

    function listarConhecimentos($idCand) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        $sqlCon = "Select * from tecnologias T, niveis N where N.idCandidato_NIVEL = '$idCand' and T.id_TECNOLOGIA = N.idTecnologia_NIVEL";

        $rsCon = $vConn->query($sqlCon);
        $tblCon = $rsCon->fetchAll(PDO::FETCH_BOTH);

        $tecn = new ArrayObject();

        foreach ($tblCon as $row) {

            $objTec = new Tecnologias();
            $objTec->setId($row['id_TECNOLOGIA']);
            $objTec->setNome($row['nome_TECNOLOGIA']);
            $objTec->setDescricao($row['descricao_TECNOLOGIA']);
            $objTec->setIcone($row['icone_TECNOLOGIA']);
            $objTec->setNivel($row['classificacao_NIVEL']);

            $tecn->append($objTec); //add obj no vetor
        }

        return $tecn;
    }

    function consultarUltimoCandidato() {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCand = "Select id_CANDIDATO from CANDIDATOS order by id_CANDIDATO desc limit 1";
        $rsId = $vConn->query($sqlCand);

        $tblId = $rsId->fetch();

        return $tblId['id_CANDIDATO'];
    }

    function consultarCandidato($id) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCand = "Select * from CANDIDATOS C where C.id_CANDIDATO = '$id'";

        $rsCand = $vConn->query($sqlCand);
        $tblCand = $rsCand->fetch();

        $objCand = new Candidatos();

        $objCand->setId($tblCand['id_CANDIDATO']);
        $objCand->setEmail($tblCand['email_CANDIDATO']);
        $objCand->setNomeCompleto($tblCand['nomeCompleto_CANDIDATO']);
        $objCand->setBio($tblCand['bio_CANDIDATO']);
        $objCand->setCep($tblCand['cep_CANDIDATO']);
        $objCand->setEndereco($tblCand['endereco_CANDIDATO']);
        $objCand->setNumero($tblCand['numero_CANDIDATO']);
        $objCand->setComplemento($tblCand['complemento_CANDIDATO']);
        $objCand->setBairro($tblCand['bairro_CANDIDATO']);
        $objCand->setCidade($tblCand['cidade_CANDIDATO']);
        $objCand->setTelefone($tblCand['telefone_CANDIDATO']);
        $objCand->setImagem($tblCand['imagem_CANDIDATO']);
        $objCand->setLinkedin($tblCand['linkedin_CANDIDATO']);
        $objCand->setWebsite($tblCand['website_CANDIDATO']);

        return $objCand;
    }

    function adicionarBio($tmpBio, $tmpId) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlBio = "Update candidatos set bio_CANDIDATO = '$tmpBio' where id_CANDIDATO = '$tmpId'";

        $vConn->query($sqlBio);
    }

    function registrarConhecimento($tmpCand, $tmpTec) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCon = "Insert into niveis(idCandidato_NIVEL, idTecnologia_NIVEL, classificacao_NIVEL)values('$tmpCand','$tmpTec',1)";

        $vConn->query($sqlCon);
    }

    function buscarVagas($idTec, $tmpBusca, $tipo, $idCand) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        if ($tipo == 1) { //busca por palavra
            $sqlVagas = "Select * from Vagas where cargo_VAGA like '%$tmpBusca%' or descricao_VAGA like '%$tmpBusca%'";
        } else if ($tipo == 2) { //busca inteligente
            $sqlVagas = "Select V.id_VAGA, V.cargo_VAGA, V.icone_VAGA, V.descricao_VAGA, E.id_EMPRESA,E.imagem_EMPRESA from VAGAS V, EMPRESAS E where ";
            $sqlVagas.= "V.idEmpresa_VAGA = E.id_EMPRESA and V.id_VAGA in ";
            $sqlVagas.= "(Select A.idVaga_AREA from Candidatos C,Areas A, Tecnologias T, Niveis N where ";
            $sqlVagas.= "N.idCandidato_NIVEL = 1 and T.id_TECNOLOGIA = N.idTecnologia_NIVEL and ";
            $sqlVagas.= "A.idTecnologia_AREA = T.id_TECNOLOGIA)";
        }

        $rsVagas = $vConn->query($sqlVagas);
        $tblVagas = $rsVagas->fetchAll(PDO::FETCH_BOTH);

        $vagas = new ArrayObject();

        foreach ($tblVagas as $row) {
            $objVagas = new Vagas();
            $objVagas->setId($row['id_VAGA']);
            $objVagas->setCargo($row['cargo_VAGA']);
            $objVagas->setDescricao($row['descricao_VAGA']);
            $objVagas->setIcone($row['icone_VAGA']);
            $objVagas->setIdEmpresa($row['id_EMPRESA']);

            $vagas->append($objVagas);
        }
        return $vagas;
    }

    function registrarAplicacao($tmpAplicacao) {

        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlAplica = "Insert into aplicacoes(idCandidato_APLICACAO, idVaga_APLICACAO, data_APLICACAO, apresentacao_APLICACAO, arquivo_APLICACAO)";
        $sqlAplica .= "values(";
        $sqlAplica .= $tmpAplicacao->getIdCandidato() . ",";
        $sqlAplica .= $tmpAplicacao->getIdVaga() . ",";
        $sqlAplica .= "'" . $tmpAplicacao->getData() . "',";
        $sqlAplica .= "'" . $tmpAplicacao->getIntroducao() . "',";
        $sqlAplica .= "'" . $tmpAplicacao->getArquivo() . "')";

        $vConn->query($sqlAplica);
    }

function verificarAplicacao($idCand, $idVaga) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlVer = "Select * from aplicacoes where idCandidato_APLICACAO = '$idCand' and idVaga_APLICACAO = '$idVaga'";

        $rsVer = $vConn->query($sqlVer);
        $numReg = $rsVer->rowCount();

        if ($numReg == 0)
            return false;
        else
            return true;
    }
    
    
    }

?>
