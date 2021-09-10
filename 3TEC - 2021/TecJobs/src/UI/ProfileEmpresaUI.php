
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
$seguidores = $objBDEmp->listarSeguidores($idEmp);
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
                    <img src="../../img/users/<?= $empresa->getImagem(); ?> ?>" alt="" class="img-fluid rounded-circle border">
                </div>

                <div class="col-lg-10" style="padding-top: 15px;padding-bottom:15px;">
                    <div class="card" style="border-color:#7952B3;">
                        <div class="card-header" style="background-color:#FFFFFF;">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h4 class="card-title">
                                        <?= $empresa->getNomeFantasia(); ?>
                                    </h4>
                                    <h5 class="card-subtitle text-muted">
                                        <?= $empresa->getCidade(); ?>
                                    </h5>
                                </div>


                                <div class="card col-lg-2 border-0" style="margin-right:5px; ">
                                    <div class="row no-gutters" style="height:20px;">
                                        <div class="col-md-6" style="padding-top: 5px;">
                                            <i class="fa fa-thumbs-up fa-2x" style="color:#76EEC6;"></i>
                                            <font class="TextoDestaque"><?=count($seguidores);?></font><br>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card col-lg-2 border-0" style="margin-right:50px; ">
                                    <div class="row no-gutters" style="height:20px;">
                                        <div class="col-md-6" style="padding-top: 5px;">
                                            <i class="fa fa-briefcase fa-2x" style="color:#76EEC6;"></i>
                                            <font class="TextoDestaque"><?=count($vagas);?></font><br>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4 text-right">

                                    <?php
                                    if ($sigo == false) {
                                        ?>

                                        <a href="../Control/EmpresasControl.php?exec=1&idEmp=<?= $empresa->getId(); ?>" class="btn BotaoComum float-right">
                                            Seguir                                            
                                        </a>
                                    <?php } else { ?>
                                        <a href="../Control/EmpresasControl.php?exec=2&idEmp=<?= $empresa->getId(); ?>" class="btn BotaoComum float-right">
                                            Deixar de Seguir
                                        </a>   
                                    <?php } ?>


                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <?= $empresa->getEndereco() . ", " . $empresa->getNumero(); ?> - <?= $empresa->getBairro(); ?> - <?= $empresa->getComplemento(); ?><br> 
                                    <?= $empresa->getCep(); ?><br> 
                                    Telefone: <?= $empresa->getTelefone(); ?>

                                </div>
                                <div class="col">
                                    Endereço de E-mail: <?= $empresa->getEmail(); ?> <br>
                                    Categoria: <?= $objCat->consultarCategoria($empresa->getIdCategoria()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="border-color:#7952B3;">
                        <div class="card-body">
                            <?= $empresa->getInfo(); ?>
                        </div>
                    </div>

                </div>
            </div>

            <?php if (count($vagas) == 0) { ?>
                <div class="row" style="min-height: 100px; margin-top:15px;">                
                    <div class="col-lg-12">
                        <div class="card" style="border-color:#7952B3;">
                            <div class="card-header" style="background-color:#FFFFFF;">
                                Vagas
                            </div>
                            <div class="card-body">
                                <font class="text-muted"> Nenhuma Vaga disponível</font>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {
                ?>

                <div class="row" style="margin-top:15px;">

                    <div class="d-flex flex-column rounded" style="margin-left:15px;margin-right:15px;padding-bottom:10px;border-style:solid;border-color:#7952B3;border-width:1px;">
                        <div class="text-dark border-bottom" style="margin-bottom:10px;padding-left:20px; padding-top:12px; height:50px; background-color:#FFFFFF;">
                            Vagas
                        </div>
                        <div class="card-group">
                            <?php
                            $contVagas = 0;
                            for ($i = 0; $i < count($vagas); $i++) {
                                if($contVagas <= 3){
                                ?>

                                <div class="col-lg-3">
                                    <div class="card" style="border-color:#7952B3;">
                                        <div class="card-body text-center">
                                            <i class="fa fa-<?=$vagas[$i]->getIcone();?> fa-3x" style="color:#86D4F5;margin-bottom: 3px;"></i>
                                            <h5 class="card-title"><?= $vagas[$i]->getCargo(); ?></h5>
                                            <hr>                                        
                                            <?= $vagas[$i]->getDescricao(); ?>
                                            <hr>
                                            <a href="AplicarVagaUI.php?idVaga=<?=$vagas[$i]->getId();?>&idEmp=<?=$vagas[$i]->getIdEmpresa();?>" class="btn BotaoComum">
                                                Visualizar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $contVagas++;
                                }
                            }
                            ?>
                            <div class="col-lg-12 text-right">
                                    <a href="ListaVagasUI.php?type=1&idEmp=<?=$idEmp?>">
                                    Ver todas as vagas
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>



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