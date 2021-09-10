<?php
require_once "../Model/Empresas.php";
require_once "../Model/Vagas.php";
require_once "../DAO/EmpresasDAO.php";
require_once "../Model/Candidatos.php";
require_once "../DAO/CandidatosDAO.php";
require_once "../DAO/TecnologiasDAO.php";
session_start();

$objBDEmp = new EmpresasDAO();
$objBDCand = new CandidatosDAO();
$objBDTecn = new TecnologiasDAO();
$idVaga = $_GET['idVaga'];
$objVaga = new Vagas();
$objVaga = $objBDEmp->consultarVaga($idVaga);
$candidatos = $objBDCand->listarCandidatos(1, $idVaga);
$tecnologias = $objBDTecn->listarTecnologias(1, $idVaga);
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
                    <img src="../../img/users/<?= $_SESSION['imagem'] ?>" alt="" class="img-fluid rounded-circle border">
                </div>

                <div class="col-lg-10" style="padding-top: 15px;padding-bottom:15px;">
                    <div class="card"style="border-color:#7952B3;">
                        <div class="card-header" style="background-color:#FFFFFF;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h4 class="card-title">
                                        <?= $objVaga->getCargo(); ?>
                                    </h4>
                                    <h5 class="card-subtitle text-muted">
                                        <?= $objVaga->getData(); ?>
                                    </h5>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <?= $objVaga->getSistema() . " - " . $objVaga->getPeriodo(); ?> horas diárias<br> 
                                    Salário: R$ <?= number_format($objVaga->getSalario(), 2); ?><br> 
                                    Contrato: <?= $objVaga->getContrato(); ?>

                                </div>
                                <div class="col">
                                    Benefícios: <?= $objVaga->getBeneficios(); ?> <br>
                                    Categoria: <?= $objVaga->getIdTipo(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="">
                <div class="col-lg-12">
                    <div class="card" style="border-color:#7952B3;">
                        <div class="card-body">
                            <?= $objVaga->getDescricao(); ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row" style="margin-top:10px;">
                <div class="col-lg-12">
                    <div class="card" style="border-color:#7952B3;">
                        <div class="card-header"  style="background-color:#FFFFFF;">
                            <h4 class="card-title">Tecnologias Relacionadas</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php for ($i = 0; $i < count($tecnologias); $i++) { ?>

                                    <div class="col-lg-2 text-center">
                                        <img src="../../img/tech/<?= $tecnologias[$i]->getIcone(); ?>" class="Icones"><br>
                                        <?= $tecnologias[$i]->getNome(); ?>
                                    </div>
                                    <?php
                                }
                                ?>              

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row" style="margin-top:10px;">
                <div class="col-lg-12">
                    <div class="card" style="border-color:#7952B3;">
                        <div class="card-header"  style="background-color:#FFFFFF;">
                            <h4 class="card-title">Candidatos Aplicados</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php for ($i = 0; $i < count($candidatos); $i++) { ?>

                                    <div class="col-lg-2 text-center">
                                        <a href="ProfileCandidatoUI.php?idCand=<?= $candidatos[$i]->getId(); ?>">
                                            <img src="../../img/users/<?= $candidatos[$i]->getImagem(); ?>" class="rounded-circle ImgUser border">
                                        </a>
                                        <br>
                                        <a href="ProfileCandidatoUI.php?idCand=<?= $candidatos[$i]->getId(); ?>">
                                            <?= $candidatos[$i]->getNomeCompleto(); ?>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>              

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