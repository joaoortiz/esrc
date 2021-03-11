<?php

require_once "ConexaoDAO.php";
require_once "../Model/Candidatos.php";
require_once "../Model/Tecnologias.php";
require_once "../Model/Empresas.php";

class CandidatosDAO {

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

}
