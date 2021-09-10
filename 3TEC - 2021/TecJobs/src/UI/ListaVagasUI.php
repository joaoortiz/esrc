
<?php
require_once "../Model/Empresas.php";
require_once "../DAO/EmpresasDAO.php";
require_once "../DAO/CandidatosDAO.php";
require_once "../Model/Vagas.php";
session_start();

$type = $_GET['type'];

if ($type == 1) {
    $idEmp = $_GET['idEmp'];
    $objBDEmp = new EmpresasDAO();
    $vagas = $objBDEmp->listarVagas($idEmp);
    $empresa = $objBDEmp->consultarEmpresa($idEmp);
} else if ($type == 2) {
    $idCand = $_SESSION['id'];
    $objBDCand = new CandidatosDAO();
    $vagas = $objBDCand->buscarVagas(0, "", 2, $idCand);
}
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
            <?php
            if ($type == 1) {
                //colar    
                ?>

                <div class="row" style="min-height: 180px;">
                    <div class="col-lg-2" style="padding-top:10px;">
                        <img src="../../img/users/<?= $empresa->getImagem(); ?> ?>" alt="" class="img-fluid rounded-circle border">
                    </div>

                    <div class="col-lg-10" style="padding-top: 15px;padding-bottom:15px;">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4 class="card-title">
                                            <?= $empresa->getNomeFantasia(); ?>
                                        </h4>
                                        <h5 class="card-subtitle text-muted">
                                            <?= $empresa->getCidade(); ?>
                                        </h5>
                                    </div>


                                    <div class="card col-lg-3 border-0" style="margin-right:5px; ">
                                        <div class="row no-gutters" style="height:20px;">
                                            <div class="col-md-8" style="padding-top: 5px;">
                                                <i class="fa fa-user fa-3x" style="color:#76EEC6;"></i>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <font class="TextoDestaque"><?= count($vagas); ?></font><br>
                                                <font class="TextoDados text-muted">Vagas</font>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="card col-lg-3 border-0" style="margin-right:50px; ">
                                        <div class="row no-gutters" style="height:20px;">
                                            <div class="col-md-8" style="padding-top: 5px;">
                                                <i class="fa fa-briefcase fa-3x" style="color:#76EEC6;"></i>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <font class="TextoDestaque"><?= count($vagas); ?></font><br>
                                                <font class="TextoDados text-muted">Vagas</font>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-1 text-right">



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
                                        Categoria: <?= $objBDEmp->consultarCategoria($empresa->getIdCategoria()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column border-0 rounded" style="margin-left:15px;padding-bottom:10px;">
                    <div class="text-dark border-bottom" style="margin-bottom:10px;padding-left:20px; padding-top:12px; height:50px; background-color:#F7F7F7;">
                        Vagas
                        <a href="#" data-toggle="modal" data-target="#MdlCadastraVaga">
                            (Adicionar)
                        </a>
                    </div>  
                    <?php if ($_SESSION['permissao'] == 3) { ?>
                        <div class="card-columns">
                            <?php
                            for ($i = 0; $i < count($vagas); $i++) {
                                ?>
                                <div class="card" style="padding-bottom:5px;">
                                    <div class="card-body text-center">
                                        <i class="fa fa-<?= $vagas[$i]->getIcone(); ?> fa-3x" style="color:#86D4F5;margin-bottom: 3px;"></i>
                                        <h5 class="card-title"><?= $vagas[$i]->getCargo(); ?></h5>
                                        <hr>                                        
                                        <?= $vagas[$i]->getDescricao(); ?>                                     

                                        <hr>
                                        <a href="../Control/UsuariosControl.php" class="btn text-white float-right" style="background-color:#7952B3;">
                                            Aplicar
                                        </a>

                                    </div>
                                </div>

                            <?php }
                            ?>
                        </div>
                    <?php } else if ($_SESSION['permissao'] == 2) {
                        ?>


                        <?php
                        for ($i = 0; $i < count($vagas); $i++) {
                            ?>


                            <div class="row justify-content-md-center" style="margin-bottom:5px; ">
                                <div class="card col-lg-12 border" style="padding-bottom:5px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-1 text-center">
                                            <i class="fa fa-<?= $vagas[$i]->getIcone(); ?> fa-4x" style="margin-top:40px;color:#86D4F5;"></i>                                            
                                        </div>
                                        <div class="col-md-11">
                                            <div class="card-body" style="padding-top: 10px;">
                                                <h5 class="card-title"><?= $vagas[$i]->getCargo(); ?></h5> 
                                                <p class="card-text">
                                                <p class="card-text"><?= $vagas[$i]->getDescricao(); ?></p>
                                                <hr>
                                                <a href="../Control/UsuariosControl.php" class="btn text-white float-right" style="background-color:#7952B3;">
                                                    Gerenciar
                                                </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php
                        }
                    }
                    ?>

                </div>

                <?php
            } else if ($type == 2) {
?>
            <h2><?=$_SESSION['nome']?>, essas são as vagas indicadas para você!</h2>
            <h7>Foram encontradas <?=count($vagas)?> vagas.</h7>
            <hr>
                
  <?php              for ($j = 0; $j < count($vagas); $j++) {
                    ?>
                    <div class="row justify-content-md-center" style="margin-bottom:5px; ">
                        <div class=" CardJob card col-lg-12" style="padding-bottom:5px;">
                            <div class="row no-gutters">
                                <div class="col-md-1 text-center">
                                    <i class="fa fa-<?= $vagas[$j]->getIcone(); ?> fa-4x" style="margin-top:40px;color:#333333;"></i>                                            
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body" style="padding-top: 10px;">
                                        <h5 class="card-title">
                                            <a href="DetalhesVagaUI.php?idVaga=<?=$vagas[$j]->getId();?>" style="color:#000000;">
                                                <?= $vagas[$j]->getCargo(); ?>
                                            </a>
                                        </h5> 
                                        <p class="card-text">
                                        <p class="card-text"><?= $vagas[$j]->getDescricao(); ?></p>

                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <?php
                                    $idEmp = $vagas[$j]->getIdEmpresa();
                                    $objEmpresa = $objBDEmp->consultarEmpresa($idEmp);
                                    $imagem = $objEmpresa->getImagem();
                                    ?>
                                    <a href="ProfileEmpresaUI.php?idEmp=<?= $idEmp ?>">
                                        <img src="../../img/users/<?= $imagem; ?>" class="img-thumbnail" style="margin-top: 15px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>





        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>

</html>
