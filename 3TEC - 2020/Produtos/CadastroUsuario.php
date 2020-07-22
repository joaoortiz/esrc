<?php

include "Conexao.php";

//pegando dados do formulario de cadastro
$login = $_POST['HTML_LOGIN'];
$senha = md5($_POST['HTML_SENHA']);
$permissao = 2;

$erro = false;

$sqlVerifica = "Select * from usuarios where login_USUARIO like '$login'";
$rsVerifica = mysqli_query($vConn,$sqlVerifica) or die (mysqli_error($vConn));

if(mysqli_num_rows($rsVerifica)>0){
    $erro = true; //já existe um usuario com o login
}

if ($erro == false) {

//Montagem do insert
    $sqlCadUsuario = "Insert into usuarios(login_USUARIO, senha_USUARIO, permissao_USUARIO)values(";
    $sqlCadUsuario .= "'$login','$senha','$permissao')";

    mysqli_query($vConn, $sqlCadUsuario) or die(mysqli_error($vConn)); //executando insert

    session_start(); //iniciando sessão 'logada'
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['permissao'] = $permissao;
    $_SESSION['statusLogin'] = 1;

    echo "<script>alert('Dados Cadastrados.');</script>";
    echo "<script>location.href='Painel.php';</script>";

}else{
    
    echo "<script>alert('Nome de usuário já em uso. Tente novamente.');</script>";
    echo "<script>location.href='index.php';</script>";
}



?>