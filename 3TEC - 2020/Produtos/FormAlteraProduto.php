<?php
$cod = $_GET['cod'];
$sqlDados = "Select * from produtos where codigo_PRODUTO = '$cod'";

$rsDados = mysqli_query($vConn, $sqlDados) or die(mysqli_error($vConn));
$tblDados = mysqli_fetch_array($rsDados);
?>

<div class="container border" id="DivCadastro">
    <form action="CadastroProduto.php" class="form" method="post" enctype="multipart/form-data">

        <div class="row TopoForm">  
            <div class="col text-center">
                Alteração de Dados de Produtos
            </div>
        </div>


        <div class="row LinhaForm">

            <div class="col">
                <label class="TextoForm">Nome do Produto:</label>
                <input type="text" name="HTML_nome" class="form-control" value="<?= $tblDados['nome_PRODUTO'] ?>">
            </div>    

            <div class="col">
                <label class="TextoForm">Categoria:</label>
                <select name="HTML_categoria" class="form-control">

                    <?php
                    $sqlCat = "Select * from categorias";
                    $rsCat = mysqli_query($vConn, $sqlCat) or die(mysqli_error($vConn));

                    while ($tblCat = mysqli_fetch_array($rsCat)) {
                        ?>

                        <option value="<?= $tblCat['codigo_CATEGORIA']; ?>">
                            <?= $tblCat['nome_CATEGORIA']; ?>
                        </option>

                        <?php
                    }
                    ?>


                </select>
            </div>
        </div>


        <div class="row LinhaForm">
            <div class="col">
                <label class="TextoForm">Marca:</label>
                <input type="text" name="HTML_marca" class="form-control" value="<?= $tblDados['marca_PRODUTO'] ?>">
            </div>

            <div class="col">    
                <label class="TextoForm">Valor:</label>
                <input type="text" name="HTML_valor" class="form-control" value="<?= $tblDados['valor_PRODUTO'] ?>">
            </div>
        </div>

        <div class="row" style="height:110px;">
            <div class="col">
                <label class="TextoForm">Descrição:</label>
                <textarea name="HTML_descricao" class="form-control"><?= $tblDados['descricao_PRODUTO'] ?></textarea>
            </div>
        </div>

        <div class="row LinhaForm">
            <div class="col">
                <button type="submit" class="btn Botao float-right">Alterar Dados</button>
            </div>
        </div>

    </form>

    <hr>

    <div class="row">
        <div class="col-lg-4 border-right">
            FOTO PRINCIPAL  

            <img src="img/<?= $tblDados['imagem_PRODUTO']; ?>" class="img-fluid">

            <form action="AlteraImagem.php" method="POST" enctype="multipart/form-data">

                <div class="input-group" style="margin-top: 5px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="HTML_imagem" class="custom-file-input" id="inputGroupFile01"
                               aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>                
                </div>   

                <input type="hidden" name="tf" value="1">
                <button type="submit" class="btn Botao float-right" style="margin-top:5px;">Alterar Imagem </button>

            </form>

        </div>

        <?php
        $sqlAlbum = "Select * from FOTOS where codigoProduto_FOTO ='$cod'";
        $rsAlbum = mysqli_query($vConn, $sqlAlbum) or die(mysqli_error($vConn));

        while ($tblAlbum = mysqli_fetch_array($rsAlbum)) {
            ?>
            <div class="col-lg-2 text-center">
                <img src="img/<?= $tblAlbum['arquivo_FOTO'] ?>" class="img-thumbnail MiniFotoRem">
                <div id="DivRemover">
                    <i class="fa fa-ban fa-lg text-danger"></i>
                </div>
                <div>
                    <input type="file" id="selectedFile" style="display: none;" />
                    <button type="button" onclick="document.getElementById('selectedFile').click();" class="btn BotaoFile">Browse</button>
                </div>
            </div>
            <?php
        }
        ?>



    </div>




</div>