<?php


class ConexaoDAO {
   
    
    public static function abrirConexao (){
         $vConn = NULL; 
        try{
            $server = "mysql:host=localhost; dbname=BDTecJobs";
            $user = "root";
            $pass = "";
            
            $vConn = new PDO($server, $user, $pass);
            $vConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $vConn->exec("set names utfB");
                    
        } catch (Exception $ex) {
            echo "ERRO: Falha na conexão ao Banco de dados.<br>";
            echo "Descrição: " . $ex->getMessage();

        }
        return $vConn;
    }
    
    
}

?>