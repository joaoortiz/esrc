<?php

session_start();

if(!isset($_SESSION['statusLogin'])){
    echo "<script>location.href='FormLogin.php';</script>";
}else{
    if($_SESSION['statusLogin'] == 0){
        echo "<script>location.href='FormLogin.php';</script>";
    }else{
     //Confirmação do Pedido
        
        
        
    }    
}

