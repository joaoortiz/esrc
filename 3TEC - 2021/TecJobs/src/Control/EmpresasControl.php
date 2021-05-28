<?php
session_start();
require_once "../DAO/EmpresasDAO.php";
require_once "../Model/Vagas.php";

if (isset($_POST['exec']))
    $exec = $_POST['exec'];
else if (isset($_GET['exec']))
    $exec = $_GET['exec'];

if($exec == 1){//seguir
    $idEmp = $_GET['idEmp'];
    $objBDEmpresa = new EmpresasDAO();
    $idCand = $_SESSION['id'];
    $objBDEmpresa->seguirEmpresa($idCand, $idEmp);
    
    echo "<script>location.href='../UI/ProfileUI.php';</script>";

    
}else if($exec == 2){ //(des)seguir
    $idEmp = $_GET['idEmp'];
    $objBDEmpresa = new EmpresasDAO();
    $idCand = $_SESSION['id'];
    $objBDEmpresa->removerRelacao($idCand, $idEmp);
    
    echo "<script>location.href='../UI/ProfileUI.php';</script>";
}else if($exec == 3){ //cadastrar Vaga
    
    $cargo = $_POST['HTML_cargo'];
    $descricao = $_POST['HTML_descricao'];
    $idEmp = $_SESSION['id'];
    
    $tmpVaga = new Vagas();
    $tmpVaga->setCargo($cargo);
    $tmpVaga->setDescricao($descricao);
    $tmpVaga->setIdEmpresa($idEmp);
    
    $objBDEmpresa = new EmpresasDAO();
    $objBDEmpresa->cadastrarVaga($tmpVaga);
    
    echo "<script>location.href='../UI/ProfileUI.php';</script>";
}