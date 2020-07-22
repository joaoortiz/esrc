<meta charset="utf-8">

<?php

session_start();

include "Conexao.php";

//Request nas informações do formLogin
$usuario = $_POST['HTML_LOGIN'];
$senha = md5($_POST['HTML_SENHA']); //usando cript md5

$sqlLogin = "Select * from usuarios where login_USUARIO like '$usuario' and senha_USUARIO like '$senha'";
$rsLogin = mysqli_query($vConn, $sqlLogin) or die(mysqli_error($vConn));

if(mysqli_num_rows($rsLogin) > 0){
    $tblLogin = mysqli_fetch_array($rsLogin); //abrindo dados do select
    $_SESSION['login'] = $tblLogin['login_USUARIO'];
    $_SESSION['senha'] = $tblLogin['senha_USUARIO'];
    $_SESSION['permissao'] = $tblLogin['permissao_USUARIO'];
    $_SESSION['statusLogin'] = 1;
    
    echo "<script>location.href='Painel.php';</script>";
    
}else{
    echo "<script>alert('Dados Inválidos');</script>";
    echo "<script>location.href='index.php';</script>";
}
?>