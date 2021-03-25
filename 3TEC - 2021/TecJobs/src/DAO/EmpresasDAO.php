<?php

require_once "ConexaoDAO.php";
require_once "../Model/Categorias.php";

class EmpresasDAO {
    //put your code here
    
    function listarCategorias(){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCat = "Select * from categorias";
        $rsCat = $vConn->query($sqlCat);
        $tblCat = $rsCat->fetchAll(PDO::FETCH_BOTH);
        
        $cat = new ArrayObject();
        
        foreach($tblCat as $row){
            $objCat = new Categorias();
            $objCat->setId($row['id_CATEGORIA']);
            $objCat->setNome($row['nome_CATEGORIA']);
            $objCat->setDescricao($row['descricao_CATEGORIA']);
            
            $cat->append($objCat);            
        }
        
        return $cat;
    }
    
    function consultarCategoria($id){
        $objBD = new ConexaoDAO();
        $vConn = $objBD->abrirConexao();

        $sqlCat = "Select * from categorias where id_CATEGORIA = '$id'";
        $rsCat = $vConn->query($sqlCat);
        $tblCat = $rsCat->fetch();
        
        return $tblCat['nome_CATEGORIA'];
    }
}
