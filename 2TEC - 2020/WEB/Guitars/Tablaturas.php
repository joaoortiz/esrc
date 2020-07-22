<html>
    <head>
        <!--referencia do CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Itim|Sriracha&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo.css" type="text/css">



        <!--Configurações da pagina-->
        <meta charset="utf-8">
        <title>:: GUITARS :: Play your weapon!</title>

    </head>

    <body> 

        <?php
        include "Conexao.php";
        ?>

        <!--Conteudo da página -->

        <?php
        include "BarraMenu.php";
        ?>
        <img src="img/bTablaturas.jpg" class="img-fluid BannerSec">

        <div class="container-fluid">
            <div class="row justify-content-md-center">

                <div class="col-lg-4">
                    <form class="form-inline FormPesquisa" action="index.php" method="POST">
                        <div class="input-group mb-2 mr-sm-2 col-lg-12" style="margin-top:18px;">

                            <input type="text" class="form-control" name="HTML_NOME" placeholder="Busque seu artista">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <button type="submit" class="" style="border-width:0px;">
                                        <i class="fa fa-md fa-search"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="busca" value="1">
                    </form>
                </div>
            </div>


            <div class="row justify-content-md-center">

                <?php
                //toda variavel em PHP deve iniciar com o $
                for ($i = 65; $i <= 90; $i++) {
                    $letra = chr($i);
                    ?>

                    <div class="col-lg-1 text-center border rounded MenuLetra">
                        <a href="Tablaturas.php?letra=<?= $letra; ?>">    
                            <?= $letra; ?>
                        </a>
                    </div>

                    <?php
                }
                ?>

            </div>

            <hr>
            <div class="row">

                <?php
                
                if(!isset($_GET['letra'])){ //se a variavel letra nao existir na URL
                    $letra = "A";                    
                }else{//se existir
                    $letra = $_GET['letra']; //pegando a letra da URL
                }
                
                $sqlBandas = "Select * from bandas where nome_BANDA like '$letra%'"; //bandas é o nome da tabela que possui os dados
                //executando o select e armazenando o resultado na var rsBandas
                $rsBandas = mysqli_query($vConn, $sqlBandas) or die(mysqli_error($vConn));

                //fecth_array: permite acessar os dados resultantes da consulta (dentro do rs)
                $cont = 0;
                while ($tblBandas = mysqli_fetch_array($rsBandas)) {
                    ?>

                    <div class="col-lg-2" style="margin-bottom:15px;">
                        
                        <a href="<?=$tblBandas['link_BANDA']?>" target="_blank">
                        
                        <div class="card">                            
                            <img src="<?=$tblBandas['urlFoto_BANDA']?>"class="card-img-top ImgBandas">
                            <div class="card-body">
                                <font class="car-text"><?= $tblBandas['nome_BANDA']; ?></font>
                            </div>
                        </div>
                        
                        </a> 

                    </div>
                    <?php
                    
                    $cont++;                    
                    if($cont == 6){
                        echo "</div><div class=row>";
                        $cont = 0;
                    }
                    
                }
                ?>
            </div>
        </div>
        <hr>
        <?php
        include "Rodape.php";
        ?>      


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>

</html>