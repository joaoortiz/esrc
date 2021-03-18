<?php

session_start();

//definindo fuso horario
date_default_timezone_set('America/Sao_Paulo');

require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";
require_once "../DAO/CandidatosDAO.php";
require_once "../Model/Candidatos.php";
require_once "../DAO/EmpresasDAO.php";
require_once "../Model/Empresas.php";

if (isset($_POST['exec']))
    $exec = $_POST['exec'];
else if (isset($_GET['exec']))
    $exec = $_GET['exec'];

if ($exec == 1) { //login
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
} else if ($exec == 2) { //logout
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
    } else if ($perm == 2) {
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
}if ($exec == 3) { //cadastro1
    $type = $_POST['type'];
    
    if($type == 2){
        //cadastro de empresa
        $objEmp = new Empresas();
        $objEmp->setEmail($_POST['html_email']);
        $objEmp->setNomeFantasia($_POST['html_nomeFantasia']);
        $objEmp->setIdCategoria($_POST['html_categoria']);
        $objEmp->setCep($_POST['html_cep']);
        $objEmp->setEndereco($_POST['html_endereco']);
        $objEmp->setNumero($_POST['html_numero']);
        $objEmp->setComplemento($_POST['html_complemento']);
        $objEmp->setBairro($_POST['html_bairro']);
        $objEmp->setCidade($_POST['html_cidade']);
        $objEmp->setTelefone($_POST['html_telefone']);
        
        $nomeImg = "";
        $objEmp->setImagem($nomeImg);
        
        $objUsuario = new Usuarios();
        $objUsuario->setLogin($_POST['HTML_email']);
        $objUsuario->setSenha(md5($_POST['HTML_senha']));
        $objUsuario->setPermissao(2);
        
        $objBDUsuario = new UsuariosDAO();
        $objBDEmpresa = new EmpresasDAO();
        
        //$objBDUsuario->cadastrarUsuario(2, $objUsuario, $objEmp);   
        
        echo "<script>location.href='../UI/FormCadastroUsuarioUI.php?step=3&type=2';</script>";
        
        
    }else if($type == 3){
        //cadastro de candidato
        $objCand = new Candidatos();
        $objCand->setEmail($_POST['html_email']);
        $objCand->setNomeCompleto($_POST['html_nomeCompleto']);
        $objCand->setDataNascimento($_POST['html_dataNascimento']);
        $objCand->setSexo($_POST['html_sexo']);
        $objCand->setCep($_POST['html_cep']);
        $objCand->setEndereco($_POST['html_endereco']);
        $objCand->setNumero($_POST['html_numero']);
        $objCand->setComplemento($_POST['html_complemento']);
        $objCand->setBairro($_POST['html_bairro']);
        $objCand->setCidade($_POST['html_cidade']);
        $objCand->setTelefone($_POST['html_telefone']);
        
        $nomeImg = "";
        $objCand->setImagem($nomeImg);
        
        $objUsuario = new Usuarios();
        $objUsuario->setLogin($_POST['HTML_email']);
        $objUsuario->setSenha(md5($_POST['HTML_senha']));
        $objUsuario->setPermissao(2);
        
        $objBDUsuario = new UsuariosDAO();
        $objBDCandidato = new CandidatosDAO();
        
        //$objBDUsuario->cadastrarUsuario(3, $objUsuario, $objCand);   
        
        echo "<script>location.href='../UI/FormCadastroUsuarioUI.php?step=3&type=3';</script>";
        
        
    }
    
}

