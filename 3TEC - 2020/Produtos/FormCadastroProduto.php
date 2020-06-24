<div class="container border" id="DivCadastro">
    <form action="CadastroProduto.php" class="form" method="post" enctype="multipart/form-data">

        <div class="row TopoForm">  
            <div class="col text-center">
                Cadastro de Produtos
            </div>
        </div>


        <div class="row LinhaForm">

            <div class="col">
                <label class="TextoForm">Nome do Produto:</label>
                <input type="text" name="HTML_nome" class="form-control">
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
                <input type="text" name="HTML_marca" class="form-control">
            </div>

            <div class="col">    
                <label class="TextoForm">Valor:</label>
                <input type="text" name="HTML_valor" class="form-control">
            </div>
        </div>

        <div class="row" style="height:110px;">
            <div class="col">
                <label class="TextoForm">Descrição:</label>
                <textarea name="HTML_descricao" class="form-control"></textarea>
            </div>
        </div>

        <div class="row LinhaForm">
            <div class="col">
                <label class="TextoForm">Imagem:</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="HTML_imagem" class="custom-file-input" id="inputGroupFile01"
                               aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>   

            </div>
        </div>

        <div class="inputs">
            
        </div>
        <a href="javascript:void(0)" id="adicionarcampo" class="btn btn-sm btn-success">Adicionar Campo</a>



        <div class="row LinhaForm">
            <div class="col">
                <button type="submit" class="btn Botao float-right">Cadastrar Produto</button>
            </div>
        </div>

    </form>    

</div>
