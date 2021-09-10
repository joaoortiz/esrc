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
    
    $data = date('Y-m-d');
    $cargo = $_POST['HTML_cargo'];
    $descricao = $_POST['HTML_descricao'];
    $salario = $_POST['HTML_SALARIO'];
    $contrato = $_POST['HTML_contrato'];
    $periodo = $_POST['HTML_periodo'];
    $sistema = $_POST['HTML_sistema'];
    $beneficios = $_POST['HTML_beneficios'];
    $tipovaga = $_POST['HTML_tipovaga'];
    $idEmp = $_SESSION['id'];
    $status = 1;
    
    //PARAMOS AQUI
    $tmpVaga = new Vagas();
    $tmpVaga->setData($data);
    $tmpVaga->setCargo($cargo);
    $tmpVaga->setDescricao($descricao);
    $tmpVaga->setSalario($salario);
    $tmpVaga->setContrato($contrato);
    $tmpVaga->setPeriodo($periodo);
    $tmpVaga->setSistema($sistema);
    $tmpVaga->setBeneficios($beneficios);
    $tmpVaga->setIdTipo($tipovaga);
    $tmpVaga->setstatus(1);
    $tmpVaga->setIdEmpresa($idEmp);
    
    $objBDEmpresa = new EmpresasDAO();
    $objBDEmpresa->cadastrarVaga($tmpVaga);
    
    echo "<script>location.href='../UI/ProfileUI.php';</script>";
}