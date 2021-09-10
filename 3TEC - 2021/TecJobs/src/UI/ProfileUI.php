<?php
require_once "../Model/Empresas.php";
require_once "../DAO/EmpresasDAO.php";
require_once "../Model/Candidatos.php";
require_once "../DAO/CandidatosDAO.php";
session_start();

$objCat = new EmpresasDAO();
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

        <?php if ($_SESSION['permissao'] == 3) { ?>     

            <div class="container" style="margin-top: 30px;">
                <div class="row" style="min-height: 180px;">
                    <div class="col-lg-2" style="padding-top:10px;">
                        <img src="../../img/users/<?= $_SESSION['imagem'] ?>" alt="" class="img-fluid rounded-circle border">
                    </div>

                    <div class="col-lg-10" style="padding-top: 15px;padding-bottom:15px;">
                        <div class="card" style="border-color:#7952B3;">
                            <div class="card-header" style="background-color: white;">
                                <h4 class="NomeUsuario">
                                    <?= $_SESSION['nome']; ?>
                                </h4>
                                <h6 class="card-subtitle text-muted">
                                    São Paulo, SP
                                    </h4>
                            </div>
                            <div class="card-body FonteDados">
                                <div class="row">
                                    <div class="col">
                                        E-mail: <?= $_SESSION['email']; ?> <br>
                                        <?php if ($_SESSION['permissao'] == 3) { ?>    
                                            Idade: <?= $_SESSION['dataNascimento']; ?> <br>
                                        <?php } else { ?>
                                            Categoria: <?= $_SESSION['idCategoria']; ?>
                                        <?php } ?>
                                    </div>
                                    <div class="col">
                                        <?php if ($_SESSION['permissao'] == 3) { ?>    
                                        <i class="fa fa-linkedin fa-lg" style="margin-right:5px;color:#86D4F5;"></i> <?= $_SESSION['linkedin']; ?> <br>
                                        <i class="fa fa-globe fa-lg" style="margin-right:5px;color:#86D4F5;"></i><?= $_SESSION['website']; ?> <br>
                                        <?php } else { ?>

                                        <?php } ?>
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
                                            <?= $_SESSION['info']; ?>
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
                                            if ($_SESSION['permissao'] == 3) {
                                                $objBDCand = new CandidatosDAO();
                                                $form = $objBDCand->listarFormacoes($_SESSION['id']);

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
                                                if ($_SESSION['permissao'] == 3) {
                                                    $objBDCand = new CandidatosDAO();
                                                    $inter = $objBDCand->listarInteresses($_SESSION['id']);

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
                                                if ($_SESSION['permissao'] == 3) {
                                                    $objBDCand = new CandidatosDAO();
                                                    $tecn = $objBDCand->listarConhecimentos($_SESSION['id']);
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

                <?php
            } else if ($_SESSION['permissao'] == 2) { //PERFIL EMPRESA
                $id = $_SESSION['id'];
                $objBDEmp = new EmpresasDAO();
                $vagas = $objBDEmp->listarVagas($id);
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
                                                <?= $_SESSION['nome']; ?>
                                            </h4>
                                            <h5 class="card-subtitle text-muted">
                                                <?= $_SESSION['cidade'] ?>
                                            </h5>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <?= $_SESSION['endereco'] . ", " . $_SESSION['numero']; ?> - <?= $_SESSION['bairro']; ?> - <?= $_SESSION['complemento']; ?><br> 
                                            <?= $_SESSION['cep']; ?><br> 
                                            Telefone: <?= $_SESSION['telefone']; ?>

                                        </div>
                                        <div class="col">
                                            Endereço de E-mail: <?= $_SESSION['email']; ?> <br>
                                            Categoria: <?= $objCat->consultarCategoria($_SESSION['idCategoria']) ?>

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
                                    <?= $_SESSION['info']; ?>
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
                                        <a href="#" data-toggle="modal" data-target="#MdlCadastraVaga">
                                            (Adicionar)
                                        </a>

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

                            <div class="d-flex flex-column rounded" style="margin-left:15px;margin-right:15px;padding-bottom:10px;border-color:#7952B3;border-width:1px;border-style:solid;">
                                <div class="text-dark border-bottom" style="margin-bottom:10px;padding-left:20px; padding-top:12px; height:50px; background-color:#FFFFFF;">
                                    Vagas
                                    <a href="#" data-toggle="modal" data-target="#MdlCadastraVaga">
                                        (Adicionar)
                                    </a>
                                </div>
                                <div class="card-group">
                                    <?php
                                    $idEmp = $_SESSION['id'];
                                    $contVagas = 0;
                                    for ($i = 0; $i < count($vagas); $i++) {
                                        if ($contVagas <= 3) {
                                            ?>

                                            <div class="col-lg-3">
                                                <div class="card" style="border-color:#7952B3;">
                                                    <div class="card-body text-center">
                                                        <i class="fa fa-<?= $vagas[$i]->getIcone(); ?> fa-3x" style="color:#86D4F5;margin-bottom: 3px;"></i>
                                                        <h5 class="card-title"><?= $vagas[$i]->getCargo(); ?></h5>
                                                        <hr>                                        
                                                        <?= $vagas[$i]->getDescricao(); ?>
                                                        <hr>
                                                        <a href="GerenciarVagaUI.php?idVaga=<?=$vagas[$i]->getId();?>" class="BotaoComum btn">
                                                            <i class="fa fa-lg fa-pencil"></i>
                                                            Gerenciar
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
                                        <a href="ListaVagasUI.php?type=1&idEmp=<?= $idEmp ?>">
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
                            <div class="card" style="border-color:#7952B3;">
                                <div class="card-header" style="background-color:#FFFFFF;">
                                    Tecnologias Buscadas
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-md-center">
                                        <?php
                                        if ($_SESSION['permissao'] == 2) {
                                            $idEmp = $_SESSION['id'];
                                            $objBDEmp = new EmpresasDAO();
                                            $tecn = $objBDEmp->listarNecessidades($idEmp);

                                            for ($i = 0; $i < count($tecn); $i++) {
                                                ?>
                                                <div class="col-lg-2 text-center">
                                                    <img src="../../img/tech/<?= $tecn[$i]->getIcone(); ?>" class="Icones">
                                                    <br>
                                                    <?= $tecn[$i]->getNome(); ?><br>
                                                </div>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            <?php } 
 
                include "FormCadastroVagaUI.php";
            
            ?>

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