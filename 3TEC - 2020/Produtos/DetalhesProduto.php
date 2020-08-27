<html>

    <head>

        <meta charset="utf-8">

        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css">
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

        $sqlFotos = "Select * from fotos where codigoProduto_FOTO = '$codProd'";
        $rsFotos = mysqli_query($vConn, $sqlFotos) or die(mysqli_error($vconn));
        
        $tblDetalhes = mysqli_fetch_array($rsDetalhes);
        
        $cat = $tblDetalhes['codigoCategoria_PRODUTO'];
        $sqlIguais = "Select * from Produtos where codigoCategoria_PRODUTO = '$cat' and codigo_PRODUTO != '$codProd'";
        $rsIguais = mysqli_query($vConn, $sqlIguais) or die(mysqli_error($vconn));
        
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



                    <div class="row">
                        <div class="col-lg-12">
                            <img src="img/<?= $tblDetalhes['imagem_PRODUTO'] ?>" class="img-fluid ImagemProduto">
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-md-center">
                        <div class="col-lg-2">
                            <a class="example-image-link" href="img/<?=$tblDetalhes['imagem_PRODUTO']?>" data-lightbox="example-set">
                                <img src="img/<?=$tblDetalhes['imagem_PRODUTO']?>" class="img-thumbnail MiniFoto">
                            </a>
                        </div>                        
                        <?php
                        while ($tblFotos = mysqli_fetch_array($rsFotos)) {
                        ?>
                        <div class="col-lg-2">
                            <a class="example-image-link" href="img/<?=$tblFotos['arquivo_FOTO']?>" data-lightbox="example-set">
                            <img src="img/<?=$tblFotos['arquivo_FOTO']?>" class="img-thumbnail MiniFoto">
                            </a>
                        </div>

                        <?php
                        }
                        ?>
                    </div>

                </div>

                <div class="col-lg-4 border" style="padding-top: 20px;">
                    <p>
                        <?= substr($tblDetalhes['descricao_PRODUTO'], 0, 300); ?>...
                    </p>

                    <img src="img/<?= $tblDetalhes['marca_PRODUTO']?>" class="LogoProduto"><br><br>
                    <font class="InfoProduto">                    
                    <p>Valor: <?= number_format($tblDetalhes['valor_PRODUTO'], 2); ?></p>
                    <form action="AddCarrinho.php" method="GET">
                    <p>
                        Quantidade: (<?=$tblDetalhes['estoque_PRODUTO']?>) em estoque.
                   
                        <select name="HTML_QTDE" class="form-control" style="width:150px;">
                           <?php
                           $cont=1;
                           $contMax = $tblDetalhes['estoque_PRODUTO'];
                           
                           for($i=$cont; $i<=$contMax; $i++){
                           ?>
                            <option value="<?=$i?>"><?=$i?></option>
                           <?php
                           }
                           ?>
                        </select>
                    </p>
                    
                    <input type="hidden" name="cod" value="<?=$codProd?>">

                    <button type="submit" class="btn Botao float-right">
                        <i class="fa fa-lg fa-shopping-cart"></i>
                        Adicionar ao carrinho
                    </button>
                    </form>
                    </font>
                    <br><br>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-lg-10" id="DivIguais">
                    <div class="row">
                        <div class="col-lg-10" style="height:60px;">
                            <h4 class="NomeProduto">Você também pode se interessar por:</h4>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <?php
                            while($tblIguais = mysqli_fetch_array($rsIguais)){
                        ?>
                        
                        <div class="col-lg-2 text-center" id="DivItemIguais">
                            
                            
                            <a href="DetalhesProduto.php?cod=<?= $tblIguais['codigo_PRODUTO']; ?>">
                            
                            <img src="img/<?=$tblIguais['imagem_PRODUTO'];?>" class="img-fluid ImagemProduto">
                            <font class="NomeProdutoSec"><?=$tblIguais['nome_PRODUTO']?></font> <br>
                            
                            </a>
                            
                            
                            <b><?="R$" . number_format($tblIguais['valor_PRODUTO'],2)?></b>
                            
                        </div>
                        
                        <?php
                            }
                        ?>                        
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">

                <div class="col-lg-10 border">
                    Descrição: 

                    <?= $tblDetalhes['descricao_PRODUTO']; ?>                                      

                </div>

            </div>



            <div class="row">

            </div>

        </div>
        
        
        <?php
        include "FormsModal.php";
        ?>
        
        <script src="js/lightbox-plus-jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

</html>

