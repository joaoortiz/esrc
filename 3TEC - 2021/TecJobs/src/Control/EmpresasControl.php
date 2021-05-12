<?php
session_start();
require_once "../DAO/EmpresasDAO.php";

if (isset($_POST['exec']))
    $exec = $_POST['exec'];
else if (isset($_GET['exec']))
    $exec = $_GET['exec'];

$idEmp = $_GET['idEmp'];

if($exec == 1){
    $objBDEmpresa = new EmpresasDAO();
    $idCand = $_SESSION['id'];
    $objBDEmpresa->seguirEmpresa($idCand, $idEmp);
    
    echo "<script>location.href='../UI/ProfileUI.php';</script>";

    
}else if($exec == 2){ //continuar
    $objBDEmpresa = new EmpresasDAO();
    $idCand = $_SESSION['id'];
    $objBDEmpresa->removerRelacao($idCand, $idEmp);
    
    echo "<script>location.href='../UI/ProfileUI.php';</script>";
}