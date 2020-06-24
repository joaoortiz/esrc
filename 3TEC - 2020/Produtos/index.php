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
        $totReg = 0;
        ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                //1     

                if (!isset($_POST['busca'])) { //se a variavel busca nao existir: entrou direto na index
                        
                    if(isset($_GET['cc'])){
                        $codCat = $_GET['cc'];
                        $sqlProdutos = "Select * from produtos where codigoCategoria_PRODUTO = '$codCat'";
                    }else{
                        $sqlProdutos = "Select * from Produtos";
                    }               
                    
                    
                } else { //se acessou a index pela pesquisa
                    $prod = $_POST['HTML_produto'];
                    $sqlProdutos = "Select * from Produtos where nome_PRODUTO like '%$prod%'";
                }


                $rsProdutos = mysqli_query($vConn, $sqlProdutos) or die(mysqli_error($vConn));
                ?>

                <?php
                //2
                if (mysqli_num_rows($rsProdutos) == 0) {
                    echo "Não há produtos cadastrados";
                } else {

                    $totReg = mysqli_num_rows($rsProdutos);

                    $cont = 0;
                    while ($tblProdutos = mysqli_fetch_array($rsProdutos)) {
                        ?>
                        <div class="col-lg-4">
                            <div class="card" style="margin:8px;">
                                <div class="card-body">
                                    <a href="DetalhesProduto.php?cod=<?= $tblProdutos['codigo_PRODUTO']; ?>">
                                        <img src="img/<?= $tblProdutos['imagem_PRODUTO'] ?>" class="img-thumbnail ImagemProduto">
                                    </a>
                                </div>

                                <div class="card-footer">
                                    <a href="DetalhesProduto.php?cod=<?= $tblProdutos['codigo_PRODUTO']; ?>">
                                        <font class="TextoProduto"><?= $tblProdutos['nome_PRODUTO'] ?></font>
                                    </a>
                                </div>                    
                            </div>
                        </div>
                        <?php
                        $cont++;

                        if ($cont == 3) {
                            echo "</div><div class='row'>";
                            $cont = 0;
                        }
                    }//fechando while
                }//fechando else
                ?>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    Foram encontrados <b><?= $totReg ?></b> produtos.
                </div>
            </div>                        
        </div>

        <div class="modal fade" id="FormLogin" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form class="" action="Login.php" method="POST">

                            <div class="card">
                                <div class="card-header BarraTopo text-center">
                                    <h5 class="card-title text-white">Área Administrativa</h5>
                                </div>
                                <div class="card-body text-center">
                                    Informe abaixo os dados de login.
                                    <br><br>


                                    <div class="form-group">
                                        <input type="text" class="form-control" name="HTML_LOGIN" placeholder="Nome de Usuário">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="HTML_SENHA" placeholder="Senha">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn float-right Botao">Acessar área</button>
                                    </div>


                                </div>
                            </div>


                        </form>
                    </div>
                </div>                
            </div> 
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>


</html>
