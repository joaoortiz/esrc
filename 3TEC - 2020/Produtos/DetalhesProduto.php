<html>

    <head>

        <meta charset="utf-8">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="css/estilo.css" type="text/css" rel="stylesheet">

    </head>

    <body>

        <?php
        include "Conexao.php";
        include "Topo.php";

        $codProd = $_GET['cod'];
        $sqlDetalhes = "Select * from Produtos where codigo_PRODUTO = '$codProd'";
        $rsDetalhes = mysqli_query($vConn, $sqlDetalhes) or die(mysqli_error($vconn));

        $tblDetalhes = mysqli_fetch_array($rsDetalhes);
        ?>

        <div class="container-fluid" style="margin-top:150px;">

            <div class="row  justify-content-md-center">
                <div class="col-lg-10 text-center border">
                    <h3 class="NomeProduto">
                        <?= $tblDetalhes['nome_PRODUTO'] ?>
                    </h3>
                </div>

            </div>

            <div class="row justify-content-md-center">
                <div class="col-lg-6 border">
                    <img src="img/<?=$tblDetalhes['imagem_PRODUTO']?>" class="img-fluid">
                </div>
                <div class="col-lg-4 border" style="padding-top: 20px;">
                    <p>Descrição:
                     <?= substr($tblDetalhes['descricao_PRODUTO'],0,300);?>...
                    </p>
                    
                    <img src="img/<?=$tblDetalhes['marca_PRODUTO']?>"><br><br>
                     <font class="InfoProduto">                    
                    <p>Valor: <?= number_format($tblDetalhes['valor_PRODUTO'], 2); ?></p>
                    
                    <a href="" class="btn Botao float-right">
                        <i class="fa fa-lg fa-credit-card-alt"></i>
                        Comprar agora
                    </a>
                    </font>
                </div>
            </div>
            
            <div class="row justify-content-md-center">
                <div class="col-lg-10">PRODUTOS DA MESMA CATEGORIA</div>
            </div>
            
            <div class="row justify-content-md-center">
                
                <div class="col-lg-10 border">
                    Descrição: 
                    
                        <?=$tblDetalhes['descricao_PRODUTO'];?>                                      
                    
                </div>

            </div>

            

            <div class="row">

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

</html>

