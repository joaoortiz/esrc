<?php

session_start();
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

?>