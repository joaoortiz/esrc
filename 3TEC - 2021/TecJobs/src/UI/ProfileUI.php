<?php
require_once "../Model/Empresas.php";
require_once "../Model/Candidatos.php";
require_once "../DAO/CandidatosDAO.php";
session_start();
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <?= $_SESSION['nome']; ?>
                            </h4>
                            <h6 class="card-subtitle text-muted">
                                São Paulo, SP
                                </h4>
                        </div>
                        <div class="card-body">
                            Endereço de E-mail: <?= $_SESSION['email']; ?> <br>
                            <?php if ($_SESSION['permissao'] == 3) { ?>    
                                Data de Nascimento: <?= $_SESSION['dataNascimento']; ?> <br>
                            <?php } else { ?>
                                Categoria: <?= $_SESSION['idCategoria']; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="min-height: 250px;">
                <div class="col-lg-12">
                    <?= $_SESSION['info']; ?>
                </div>
            </div>

            <div class="row" style="height: 200px;">
                <div class="col-lg-12">
                    FORMAÇÃO
                </div>
            </div>

            <div class="row justify-content-md-center" style="min-height: 200px;">

                <?php
                if ($_SESSION['permissao'] == 3) {
                    $objBDCand = new CandidatosDAO();
                    $tecn = $objBDCand->listarConhecimentos($_SESSION['id']);

                    for ($i = 0; $i < count($tecn); $i++) {
                        ?>
                        <div class="col-lg-2 text-center">
                            <img src="../../img/tech/<?=$tecn[$i]->getIcone();?>" class="Icones">
                            <br>
                            <?=$tecn[$i]->getNome();?><br>
                            
                                <?php
                                for($j=0;$j<$tecn[$i]->getNivel();$j++){
                                ?>
                            <i class="fa fa-star fa-sm text-warning"></i>
                                <?php
                                }
                                ?>
                            
                                
                        </div>
                        <?php
                    }
                }
                ?>

            </div>

            <div class="row" style="height: 200px;">
                <div class="col-lg-12 border">
                    EMPRESAS
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>

</html>

<?php

function carregarSessao($tipo) {
    if ($tipo == 1) {
        $objDados = new Empresas();
    } else if ($tipo == 2) {
        $objDados = new Candidatos();
    }
    //construir objDados
}
?>