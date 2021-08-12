<?php

require_once "ConexaoDAO.php";
require_once "../Model/Candidatos.php";
require_once "../Model/Tecnologias.php";
require_once "../Model/Empresas.php";
require_once "../Model/Curriculos.php";

class CandidatosDAO {

    function listarFormacoes($idCand){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlForm = "Select * from formacoes F, instituicoes I, cursos C where F.idCandidato_FORMACAO = '$idCand' and F.idInstituicao_FORMACAO = I.id_INSTITUICAO and F.idCurso_FORMACAO = C.id_CURSO";
        $rsForm = $vConn->query($sqlForm);
        $tblForm = $rsForm->fetchAll(PDO::FETCH_BOTH);
        
        $form = new ArrayObject();
        
        foreach($tblForm as $row){
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
        
        foreach($tblInt as $row){
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
    
    function consultarUltimoCandidato(){
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
       
        return $objCand;
    }
    
    function adicionarBio($tmpBio, $tmpId) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlBio = "Update candidatos set bio_CANDIDATO = '$tmpBio' where id_CANDIDATO = '$tmpId'";

        $vConn->query($sqlBio);
    }

   function registrarConhecimento($tmpCand, $tmpTec){
       $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCon = "Insert into niveis(idCandidato_NIVEL, idTecnologia_NIVEL, classificacao_NIVEL)values('$tmpCand','$tmpTec',1)";

        $vConn->query($sqlCon);
   } 
    
    function buscarVagas($idTec, $tmpBusca, $tipo){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        if($tipo == 1){ //busca por palavra
            $sqlVagas = "Select * from Vagas where cargo_VAGA like '%$tmpBusca%' or descricao_VAGA like '%$tmpBusca%'";
        }else if($tipo == 2){ //busca inteligente
            $sqlVagas = "Select V.* from Vagas V, Tecnologias T, Areas A where T.id_TECNOLOGIA = A.idTecnologia_AREA and A.idVaga_AREA = V.id_VAGA and T.id_TECNOLOGIA = '$idTec'";
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
            $objVagas->setIdEmpresa($row['idEmpresa_VAGA']);

            $vagas->append($objVagas);
        }
        return $vagas;
    }
    
}
