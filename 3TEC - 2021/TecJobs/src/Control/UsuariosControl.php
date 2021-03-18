<?php

session_start();

//definindo fuso horario
date_default_timezone_set('America/Sao_Paulo');

require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";

if(isset($_POST['exec'])) $exec = $_POST['exec'];
else if(isset($_GET['exec'])) $exec = $_GET['exec'];

if ($exec == 1) {


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
            $_SESSION['horaLogin'] = "Acesso em " . date("d-m-Y") . " às " . date("h:i:s");
            $_SESSION['statusLogin'] = 1;
        } else if ($perm == 2) {
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
            $_SESSION['horaLogin'] = "Acesso em " . date("d-m-Y") . " às " . date("h:i:s");
            $_SESSION['statusLogin'] = 1;
        }

        echo"<script>location.href='../UI/ProfileUI.php';</script>";
    }
} else if ($exec == 2) {
    $perm = $_SESSION['permissao'];


    if ($perm == 3) {
        
        //Montando sessao do usuario para construção do perfil
        $_SESSION['id'] = 0;
        $_SESSION['email'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['dataNascimento'] = "";
        $_SESSION['sexo'] = "";
        $_SESSION['info'] = "";
        $_SESSION['cep'] = "";
        $_SESSION['endereco'] = "";
        $_SESSION['numero'] = 0;
        $_SESSION['complemento'] = "";
        $_SESSION['telefone'] = "";
        $_SESSION['imagem'] = "";        
        $_SESSION['permissao'] = 0;
    
    }else if($perm == 2){        
        //Montando sessao do usuario para construção do perfil
        $_SESSION['id'] = 0;
        $_SESSION['email'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['dataNascimento'] = "";
        $_SESSION['sexo'] = "";
        $_SESSION['info'] = "";
        $_SESSION['cep'] = "";
        $_SESSION['endereco'] = "";
        $_SESSION['numero'] = 0;
        $_SESSION['complemento'] = "";
        $_SESSION['telefone'] = "";
        $_SESSION['imagem'] = "";
        $_SESSION['idCategoria'] = 0;
        $_SESSION['permissao'] = 0;
       
    }
    
    session_destroy();    
    echo "<script>location.href='../UI/FormLoginUI.php';</script>";
}

