<?php

require_once "ConexaoDAO.php";
require_once "../Model/Tecnologias.php";

class TecnologiasDAO {

    function listarTecnologias($tipo,$idVaga) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        
        if($tipo == 0)
            $sqlTec = "Select * from tecnologias";
        else if($tipo == 1)
            $sqlTec = "Select T.* from tecnologias T, areas A where A.idTecnologia_AREA = T.id_TECNOLOGIA and A.idVaga_AREA = '$idVaga'";
            
        $rsTec = $vConn->query($sqlTec);
        $tblTec = $rsTec->fetchAll(PDO::FETCH_BOTH);

        $tecn = new ArrayObject();

        foreach ($tblTec as $row) {

            $objTec = new Tecnologias();
            $objTec->setId($row['id_TECNOLOGIA']);
            $objTec->setNome($row['nome_TECNOLOGIA']);
            $objTec->setDescricao($row['descricao_TECNOLOGIA']);
            $objTec->setIcone($row['icone_TECNOLOGIA']);


            $tecn->append($objTec); //add obj no vetor
        }

        return $tecn;
    }

    function consultarTecnologia($tmpId) {
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        $sqlTec = "Select * from tecnologias where id_TECNOLOGIA = $tmpId";

        $rsTec = $vConn->query($sqlTec);

        $tblTec = $rsTec->fetch();

        $objTec = new Tecnologias;
        $objTec->setId($tblTec['id_TECNOLOGIA']);
        $objTec->setNome($tblTec['nome_TECNOLOGIA']);
        $objTec->setDescricao($tblTec['descricao_TECNOLOGIA']);
        $objTec->setIcone($tblTec['icone_TECNOLOGIA']);
        
        return $objTec;
    }

}
