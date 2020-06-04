<?php

    $servidor = "localhost"; //127.0.0.1
    $usuario = "root";
    $senha = "";
    $nomeBD = "bdprodutos";
    
    $vConn = mysqli_connect($servidor, $usuario, $senha, $nomeBD);
    mysqli_set_charset($vConn, "utf8"); //aparecer acentos vindos do BD
   
    
?>
