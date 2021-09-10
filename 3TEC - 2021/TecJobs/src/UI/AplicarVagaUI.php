<?php
require_once "../Model/Empresas.php";
require_once "../Model/Vagas.php";
require_once "../DAO/EmpresasDAO.php";
require_once "../Model/Candidatos.php";
require_once "../DAO/CandidatosDAO.php";
require_once "../DAO/TecnologiasDAO.php";
session_start();

$objBDEmp = new EmpresasDAO();
$objBDTecn = new TecnologiasDAO();
$objBDCand = new CandidatosDAO();
$idVaga = $_GET['idVaga'];
$idEmp = $_GET['idEmp'];
$idCand = $_SESSION['id'];
$objVaga = new Vagas();
$objVaga = $objBDEmp->consultarVaga($idVaga);
$objEmp = $objBDEmp->consultarEmpresa($idEmp);
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
                <div class="col-lg-2 text-center" style="padding-top:10px;">
                    <a href="ProfileEmpresaUI.php?idEmp=<?=$objEmp->getId();?>">
                    <img src="../../img/users/<?= $objEmp->getImagem(); ?>" alt="" class="img-fluid rounded-circle border">

                    <h5><?= $objEmp->getNomeFantasia(); ?></h5>
                    </a>
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

            <?php
            $aplicou = $objBDCand->verificarAplicacao($idCand, $idVaga);
            if ($aplicou == false) {
                ?>

                <div class="row" style="margin-top:10px;margin-bottom:15px;">
                    <div class="col-lg-12">
                        <div class="card" style="border-color:#7952B3;">
                            <div class="card-header">
                                <h4>Quero aplicar para esta vaga!</h4>
                            </div>
                            <div class="card-body">
                                <form action="../Control/UsuariosControl.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-lg-12 text-center" style="margin-top: 15px;">
                                            <center><h4 class="text-dark">Faça uma breve apresentação sobre você</h4></center>                                                            
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-md-center">
                                        <div class="col-lg-8 text-center" style="margin-top: 15px;">
                                            <textarea class="form-control" rows="10" name="HTML_intro"></textarea>                                
                                        </div>                             
                                    </div>
                                    <div class="form-row justify-content-md-center" style="margin-top:10px;">
                                        <div class="form-group col-lg-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control form-control-lg" id="customFile" name="HTML_arquivo">
                                                <label class="custom-file-label" for="customFile">Selecionar arquivo de CV (opcional)</label>
                                            </div>
                                            <div class="form-row justify-content-md-center" style="margin-top:25px;">
                                                <div class="form-group col-lg-8 text-center">
                                                    <input type="hidden" name="exec" value="11">                                                
                                                    <input type="hidden" name="idEmp" value="<?= $idEmp; ?>">
                                                    <input type="hidden" name="idVaga" value="<?= $idVaga; ?>">
                                                    <button type="submit" class="btn BotaoLogin">Aplicar</button>

                                                </div>

                                            </div>                             
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php } else { ?>

                <div class="row" style="margin-top:10px;margin-bottom:15px;">
                    <div class="col-lg-12">
                        <div class="card" style="border-color:#7952B3;">
                            <div class="card-header">
                                <h4>Parabéns, você já está concorrendo a esta vaga!</h4>
                            </div>
                            <div class="card-body text-center">
                                <i class="fa fa-5x fa-check-circle-o text-success"></i>
                                <h4>Em breve <?= strtoupper($objEmp->getNomeFantasia()) ?> entrará em contato com você.</h4>
                            </div>
                        </div>
                    </div>
                </div>

<?php } ?>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>

</html>