<html>
    <head>
        <!--referencia do CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Itim|Sriracha&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="css/estilo.css" type="text/css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <!--Configurações da pagina-->
        <meta charset="utf-8">
        <title>:: GUITARS :: Play your weapon!</title>
        

    </head>

    <body> 

        <?php
        include "Conexao.php";
        $sqlModelos = "Select * from modelos"; //montando a instrução SELECT
        $rsModelos = mysqli_query($vConn, $sqlModelos)or die(mysqli_error($vConn)); //executando SELECT e armazenando resultados
        ?>

        <!--Conteudo da página -->

        <?php
        include "BarraMenu.php";
        ?>
        <img src="img/bModelos.jpg" class="img-fluid BannerSec">
        

        <div class="container-fluid">
            <div class="row justify-content-md-center">

                <?php
                while ($tblModelos = mysqli_fetch_array($rsModelos)) {
                    ?>

                    <div class="col-lg-2 text-center" style="margin-top:20px;">
                        <div class="card">
                            <div class="card-body">
                        <a class="btn" data-toggle="popover" title="História" data-content="<?=$tblModelos['descricao_MODELO'];?>"></button>
                        <img src="<?= $tblModelos['urlFoto_MODELO'] ?>" class="img-fluid"> 
                        </a>
                            </div>
                            <div class="card-footer">
                                <h5><?= $tblModelos['nome_MODELO'] ?></h5>
                                </div>
                        </div>

                    </div>

                    <?php
                }
                ?>

            </div>
        </div>


        <hr>
        <?php
        include "Rodape.php";
        ?>      

       <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



    </body>

</html>