<?php
$sqlEstoque = "Select P.*, C.* from produtos P, categorias C where P.codigoCategoria_PRODUTO = C.codigo_CATEGORIA order by P.codigo_PRODUTO";
$rsEstoque = mysqli_query($vConn, $sqlEstoque);
?>

<div class="row">
    <div class="col-lg-12 bg-dark text-white text-center">
        <h3>Produtos em Estoque</h3>
    </div>
</div>


<table class="table table-striped table-lg">
    <thead>
        <tr>
            <th width="5%">Cód.</th>
            <th width="25%">Nome</th>
            <th width="15%">Marca</th>
            <th width="15%">Categoria</th>        
            <th width="15%">Álbum</th>        
            <th width="10%">Valor</th>
            <th width="10%">Estoque</th>
            <th colspan="2" width="15%"><center>Ações</center></th>
</tr>
</thead>

<tbody>
<?php
while ($tblEstoque = mysqli_fetch_array($rsEstoque)) {
    $codProd = $tblEstoque['codigo_PRODUTO'];
    $img = $tblEstoque['imagem_PRODUTO'];
    
    
    $sqlFotos = "Select * from fotos where codigoProduto_FOTO = '$codProd'";
    $rsFotos = mysqli_query($vConn, $sqlFotos) or die (mysqli_error($vConn));

    $aux = explode(".", $tblEstoque['marca_PRODUTO']);
    $marca = strtoupper(substr($aux[0], 0, 1)) . substr($aux[0], 1);
    ?>        

        <tr>
            <th><?= $tblEstoque['codigo_PRODUTO']; ?></th>
            <td>
                <a data-placement="right" data-toggle="popover-hover" data-img="img/<?= $img ?>">
                    <?= $tblEstoque['nome_PRODUTO']; ?>
                </a>
            </td>
            <td><?= $marca; ?></td>
            <td><?= $tblEstoque['nome_CATEGORIA']; ?></td>  
            
            <td>
                <?php while($tblFotos = mysqli_fetch_array($rsFotos)){ ?>
                <img src="img/<?=$tblFotos['arquivo_FOTO']?>" class="img-thumbnail ListaAlbum">                
                <?php } ?>
                
            </td>                       
            
            <td><?= "R$ " . number_format($tblEstoque['valor_PRODUTO'], 2); ?></td> 
            <td></td>            
            <td align="center">
                <a href="?idPg=23&cod=<?=$tblEstoque['codigo_PRODUTO'];?>">
                    <i class="fa fa-pencil text-primary"></i>
                </a>
                
            </td>            
            <td align="center">
                <i class="fa fa-trash text-danger"></i>
            </td>

        </tr>

    <?php
}
?>
</tbody>
</table>