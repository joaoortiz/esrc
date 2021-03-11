<?php

session_start();
require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";

$user = $_POST['HTML_email'];
$passwd = $_POST['HTML_senha'];

$objBDUsuario = new UsuariosDAO();
$objDados = $objBDUsuario->validarUsuario($user, $passwd);

if ($objDados == NULL) {
    echo "<script>alert('Dados Inválidos');</script>";
    echo "<script>location.href='../UI/FormLoginUI.php';</script>";
} else {
    $perm = $objDados->getPermissao();

    if ($perm == 3) {

        $objCand = $objDados;
        //Montando sessao do usuario para construção do perfil
        $_SESSION['id'] = $objCand->getId();
        $_SESSION['email'] = $objCand->getEmail();
        $_SESSION['nome'] = $objCand->getNomeCompleto();
        $_SESSION['dataNascimento'] = $objCand->getDataNascimento();
        $_SESSION['sexo'] = $objCand->getSexo();
        $_SESSION['info'] = $objCand->getBio();
        $_SESSION['cep'] = $objCand->getCep();
        $_SESSION['endereco'] = $objCand->getEndereco();
        $_SESSION['numero'] = $objCand->getNumero();
        $_SESSION['complemento'] = $objCand->getComplemento();
        $_SESSION['telefone'] = $objCand->getTelefone();
        $_SESSION['imagem'] = $objCand->getImagem();
        $_SESSION['idCategoria'] = 0;
        $_SESSION['permissao'] = $objCand->getPermissao();
    
    }else if($perm == 2){
        $objEmp = $objDados;
        //Montando sessao do usuario para construção do perfil
        $_SESSION['id'] = $objEmp->getId();
        $_SESSION['email'] = $objEmp->getEmail();
        $_SESSION['nome'] = $objEmp->getNomeFantasia();
        $_SESSION['dataNascimento'] = "";
        $_SESSION['sexo'] = "";
        $_SESSION['info'] = $objEmp->getInfo();
        $_SESSION['cep'] = $objEmp->getCep();
        $_SESSION['endereco'] = $objEmp->getEndereco();
        $_SESSION['numero'] = $objEmp->getNumero();
        $_SESSION['complemento'] = $objEmp->getComplemento();
        $_SESSION['telefone'] = $objEmp->getTelefone();
        $_SESSION['imagem'] = $objEmp->getImagem();
        $_SESSION['idCategoria'] = $objEmp->getIdCategoria();
        $_SESSION['permissao'] = $objEmp->getPermissao();
       
    
    }
    
   echo"<script>location.href='../UI/ProfileUI.php';</script>";
}

