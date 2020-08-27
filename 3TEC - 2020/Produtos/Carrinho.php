<html>

    <head>

        <meta charset="utf-8">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="css/estilo.css" type="text/css" rel="stylesheet">

    </head>

    <body>
        <?php
        
        session_start();
        
        include "Conexao.php";
        include "Topo.php";
        
        ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8">
                    <h3 style="margin-top: 10px;">Itens no carrinho</h3>
                </div>
                
            <div class="col-lg-4 text-right">
                    
            <a href="EsvaziarCarrinho.php" class="btn Botao" style="margin-top: 10px;">
                <i class="fa fa-ban fa-lg"></i>
                Esvaziar Carrinho
            </a>
            
            <a href="index.php" class="btn Botao" style="margin-top: 10px;">
                <i class="fa fa-shopping-cart fa-lg"></i>
                    Continuar comprando
            </a>
            </div>
            
            </div>
            
            

            <?php
            
            $total = 0;
            if (isset($_SESSION['carrinho']) && ($_SESSION['carrinho'] != "")) {

                $auxCarrinho = explode("#", $_SESSION['carrinho']); //separando nome de usuario '#' dos itens
                $user = $auxCarrinho[0]; //acessando nome do usuario
                $dadosProd = $auxCarrinho[1]; //acessando dados dos itens do carrinho
                
                
                $vetCod = explode(";", $dadosProd);
                $primCod = $vetCod[0];
                
                $auxItens = explode("@", $dadosProd);
                                               
                //echo $dadosProd . "-" ;
                
                /********************************/
                $listaQtdes="";
                for($i=0;$i<count($auxItens)-1;$i++){
                    //echo $auxItens[$i] . "     ";                    
                    $auxQtdes = explode(";",$auxItens[$i]);
                    $listaQtdes.= $auxQtdes[1]."?";
                }
                
                //echo $listaQtdes;        
                $qtdes = explode("?", $listaQtdes);
                /********************************/
                                
                $listaCod = $primCod . "!";

                for ($i = 1; $i < count($vetCod)-1; $i++) {
                    $outrosCod = explode("@", $vetCod[$i]);
                    $listaCod .= $outrosCod[1] . "!";
                }

                $codigos = explode("!", $listaCod);
                $cont = 0;
                $total = 0;
                for ($i = 0; $i < count($codigos)-1; $i++) { //listagem dos produtos
                    //PROGRAMAR AQUI
                    $sqlItens = "Select * from Produtos where codigo_PRODUTO = '$codigos[$i]'";
                    $rsItens = mysqli_query($vConn, $sqlItens) or die(mysqli_error($vConn));
                    $tblItens = mysqli_fetch_array($rsItens);
                    ?>

                    <div class="row justify-content-md-center DivItens">
                        <div class="col-lg-3 text-center">
                            
                            <img src="img/<?=$tblItens['imagem_PRODUTO']?>" class="img-fluid">
                            <?= $tblItens['nome_PRODUTO'] ?>                           
                        </div>
                        <div class="col-lg-3 text-center DivValor">
                            
                            <font class="InfoProduto">
                                <?=$qtdes[$cont];?> x R$ <?=number_format($tblItens['valor_PRODUTO'],2);?>
                            </font>
                        </div>
                        <div class="col-lg-3 text-center DivValor">
                            
                                <?php
                                $totParc = $qtdes[$cont] * $tblItens['valor_PRODUTO'];
                                $total += $totParc; //acrescimo do valor do item ao total
                                ?>
                            <font class="InfoProduto">
                            R$ <?=number_format($totParc,2)?>
                            </font>
                        </div>
                    </div>

                    <?php                    
                    $cont++;
                }
            } else {
                echo "Não há itens";
            }
            ?>
            <hr>
            <div class="row">
                <div class="col-lg-12 text-right">
                    <h2>Total a pagar: R$ <?=number_format($total, 2);?></h2>
                    <a href="ConfirmaPedido.php" class="btn Botao">
                        <i class="fa fa-credit-card-alt fa-lg"></i>
                        Finalizar Compra
                    </a>
                </div>
            </div>

          

        </div>

        
        <?php
        include "FormsModal.php";
        ?>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>


</html>