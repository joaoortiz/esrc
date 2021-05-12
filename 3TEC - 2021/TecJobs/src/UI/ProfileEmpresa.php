
<?php
require_once "../Model/Empresas.php";
require_once "../DAO/EmpresasDAO.php";
require_once "../Model/Candidatos.php";
require_once "../DAO/CandidatosDAO.php";
session_start();

$objCat = new EmpresasDAO();
$idEmp = $_GET['idEmp'];
$objBDEmp = new EmpresasDAO();
$vagas = $objBDEmp->listarVagas($idEmp);
$empresa = $objBDEmp->consultarEmpresa($idEmp);
$idCand = $_SESSION['id'];
$sigo = $objBDEmp->verificarRelacao($idCand, $idEmp)
?>


<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="../../assets/css/estilo.css" rel="stylesheet">
        <title>Profile</title>
    </head>

    <body>
        <?php
        include "TopoUI.php";
        ?>

<div class="container" style="margin-top: 30px;">
                <div class="row" style="min-height: 180px;">
                    <div class="col-lg-2" style="padding-top:10px;">
                        <img src="../../img/users/<?=$empresa->getImagem();?> ?>" alt="" class="img-fluid rounded-circle border">
                    </div>

                    <div class="col-lg-10" style="padding-top: 15px;padding-bottom:15px;">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h4 class="card-title">
                                            <?=$empresa->getNomeFantasia();?>
                                        </h4>
                                        <h5 class="card-subtitle text-muted">
                                            <?=$empresa->getCidade();?>
                                        </h5>
                                    </div>

                                    <div class="col-lg-2 text-right">
                                        
                                        <?php
                                            if($sigo == false){
                                        ?>
                                        
                                        <a href="../Control/EmpresasControl.php?exec=1&idEmp=<?=$empresa->getId();?>" style="color: #7952B3;">
                                            <i class="fa fa-plus-square fa-3x"></i><br>
                                            Seguir

                                        </a>
                                            <?php }else{ ?>
                                        <a href="../Control/EmpresasControl.php?exec=2&idEmp=<?=$empresa->getId();?>" style="color: #7952B3;">
                                            <i class="fa fa-minus-square fa-3x"></i><br>
                                            Remover

                                        </a>   
                                            <?php } ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <?=$empresa->getEndereco() . ", " . $empresa->getNumero(); ?> - <?=$empresa->getBairro();?> - <?=$empresa->getComplemento();?><br> 
                                        <?=$empresa->getCep();?><br> 
                                        Telefone: <?=$empresa->getTelefone();?>

                                    </div>
                                    <div class="col">
                                        Endereço de E-mail: <?=$empresa->getEmail();?> <br>
                                        Categoria: <?= $objCat->consultarCategoria($empresa->getIdCategoria());?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="min-height: 100px;">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <?=$empresa->getInfo();?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row" style="min-height: 100px; margin-top:15px;">                
                    <?php
                    for ($i = 0; $i < count($vagas); $i++) {
                        ?>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <?= $vagas[$i]->getCargo(); ?>
                                </div>
                                <div class="card-body">
                                    <?= $vagas[$i]->getDescricao(); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>

                <div class="row justify-content-md-center" style="min-height: 150px;margin-top:15px;">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Tecnologias
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-md-center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

      

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>

</html>