
<?php
require_once "../Model/Empresas.php";
require_once "../DAO/EmpresasDAO.php";
require_once "../Model/Candidatos.php";
require_once "../DAO/CandidatosDAO.php";
session_start();

$tipo = $_POST['tipo'];
$nome = "";
$idCat = 0;

if ($tipo == 1) {
    $nome = $_POST['HTML_nome'];
} else if ($tipo == 2) {
    $idCat = $_POST['HTML_categoria'];
}

$objCat = new EmpresasDAO();
$objBDEmp = new EmpresasDAO();
$lista = $objBDEmp->listarEmpresas($nome, $idCat, $tipo);
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
            <div class="row">
                <?php
                $cont = 0;
                for ($i = 0; $i < count($lista); $i++) {
                    ?>
                    <div class="col-lg-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <a href="ProfileEmpresaUI.php?idEmp=<?= $lista[$i]->getId(); ?>">
                                        <img src="../../img/users/<?= $lista[$i]->getImagem(); ?>" class="card-img">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="ProfileEmpresaUI.php?idEmp=<?= $lista[$i]->getId(); ?>">
                                            <h5 class="card-title"><?= $lista[$i]->getNomeFantasia(); ?></h5>
                                        </a>                                        
                                        <p class="card-text"><?= $lista[$i]->getInfo(); ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $cont++;

                    if ($cont == 2) {
                        echo "</div><div class=row>";
                        $cont == 0;
                    }
                    ?>

                    <?php
                }
                ?>           
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>

</html>
