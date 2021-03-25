<?php

require_once "ConexaoDAO.php";
require_once "../Model/Tecnologias.php";

class TecnologiasDAO {
    
    
    function listarTecnologias(){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();
        $sqlTec = "Select * from tecnologias";

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
}
