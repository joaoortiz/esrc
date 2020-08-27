<?php

session_start();

$_SESSION['carrinho'] = "";

if(!isset($_SESSION['statusLogin'])){
    $_SESSION['user'] = "anonymous";
}else{
    if($_SESSION['statusLogin'] == 0){
        $_SESSION['user'] = "anonymous";
    }else if($_SESSION['statusLogin'] == 1){
        $_SESSION['user'] = $_SESSION['login'];
    }
}

$codItem = $_GET['cod'];
$qtdeItem = $_GET['HTML_QTDE'];

$_SESSION['itens'] .= $codItem . ";" . $qtdeItem . "@"; //'CORRIGIR'


$_SESSION['carrinho'] = $_SESSION['user'] . "#" . $_SESSION['itens'];

echo "<script>location.href='Carrinho.php';</script>";
?>
