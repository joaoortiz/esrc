<?php

$idCand = $_GET['idCand'];
require_once "../Model/Empresas.php";
require_once "../DAO/EmpresasDAO.php";
require_once "../Model/Candidatos.php";
require_once "../DAO/CandidatosDAO.php";
session_start();

$objCat = new EmpresasDAO();
$objBDCand = new CandidatosDAO();
$objCand = $objBDCand->consultarCandidato($idCand);
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
                        <img src="../../img/users/<?= $objCand->getImagem();?>" alt="" class="img-fluid rounded-circle border">
                    </div>

                    <div class="col-lg-10" style="padding-top: 15px;padding-bottom:15px;">
                        <div class="card" style="border-color:#7952B3;">
                            <div class="card-header" style="background-color: white;">
                                <h4 class="NomeUsuario">
                                    <?= $objCand->getNomeCompleto();?>
                                </h4>
                                <h6 class="card-subtitle text-muted">
                                    <?=$objCand->getCidade();?>
                                    </h4>
                            </div>
                            <div class="card-body FonteDados">
                                <div class="row">
                                    <div class="col">
                                        E-mail: <?= $objCand->getEmail(); ?> <br>
                                        Idade: <?= $objCand->getDataNascimento(); ?> <br>
                                        
                                    </div>
                                    <div class="col">
                                        
                                        <i class="fa fa-linkedin fa-lg" style="margin-right:5px;color:#86D4F5;"></i> <?= $objCand->getLinkedin(); ?> <br>
                                        <i class="fa fa-globe fa-lg" style="margin-right:5px;color:#86D4F5;"></i><?= $objCand->getWebsite(); ?> <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="border-color:#7952B3;">
                                    <div class="card-body">
                                        <?= $objCand->getBio(); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-lg-12">
                                <div class="card" style="border-color:#7952B3;">
                                    <div class="card-header" style="background-color: white;">
                                        <h4>Instituições que estudei <i class="fa fa-lg fa-graduation-cap float-right" style="color:#86D4F5;"></i></h4>

                                    </div>
                                    <div class="card-body">
                                        <?php
                                            $form = $objBDCand->listarFormacoes($objCand->getId());

                                            for ($i = 0; $i < count($form); $i++) {
                                                if ($form[$i]->getConclusao() == 0)
                                                    $status = "Não conluído";
                                                else if ($form[$i]->getConclusao() == 1)
                                                    $status = "Concluído";
                                                ?>
                                                <h6><?= $form[$i]->getNomeInstituicao(); ?> (<?= $form[$i]->getInicio(); ?> - <?= $form[$i]->getFim(); ?>)</h6>    
                                                <h7><?= $form[$i]->getNomeCurso(); ?> (<?= $status ?>)</h7>    
                                                <hr>
                                                <?php
                                            }
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>                
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="border-color:#7952B3;">
                                    <div class="card-header" style="background-color: white;">
                                        <h4>Estou interessado em</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-md-center">
                                            <?php
                                                $inter = $objBDCand->listarInteresses($objCand->getId());

                                                if (count($inter) == 0) {
                                                    ?>
                                                    <font class="text-muted"> Nenhuma empresa</font>

                                                    <?php
                                                } else {

                                                    for ($i = 0; $i < count($inter); $i++) {
                                                        if ($i < 6) {
                                                            ?>
                                                            <div class="col-lg-4 text-center">
                                                                <a href="ProfileEmpresaUI.php?idEmp=<?= $inter[$i]->getId(); ?>">
                                                                    <img src="../../img/users/<?= $inter[$i]->getImagem(); ?>" class="Icones">
                                                                </a>
                                                                <br>
                                                                <a href="ProfileEmpresaUI.php?idEmp=<?= $inter[$i]->getId(); ?>">
                                                                    <?= substr($inter[$i]->getNomeFantasia(), 0, EmpresasDAO::retornaEspaco($inter[$i]->getNomeFantasia())); ?>
                                                                </a>
                                                                <br>

                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="margin-top:10px;">
                                <div class="card" style="border-color:#7952B3;">
                                    <div class="card-header" style="background-color: white;">
                                        <h4>Meus Conhecimentos</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-md-center">
                                            <?php
                                               $tecn = $objBDCand->listarConhecimentos($objCand->getId());
                                                ?>

                                                <?php
                                                for ($i = 0; $i < count($tecn); $i++) {
                                                    ?>
                                                    <div class="col-lg-4 text-center">
                                                        <img src="../../img/tech/<?= $tecn[$i]->getIcone(); ?>" class="Icones">
                                                        <br>
                                                        <?= $tecn[$i]->getNome(); ?><br>

                                                        <?php
                                                        for ($j = 0; $j < $tecn[$i]->getNivel(); $j++) {
                                                            ?>
                                                            <i class="fa fa-star fa-sm text-warning"></i>

                                                            <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    <?php
                                                }
                                            
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>

            <div class="row" style="min-height: 100px; margin-top:15px;">                

            </div>

            <div class="row justify-content-md-center" style="min-height: 150px;margin-top:15px;">

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>

</html>