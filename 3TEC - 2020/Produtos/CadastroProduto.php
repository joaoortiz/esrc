<?php

include "Conexao.php";

//Pegar valores do formulario e guardar em variaveis
$nome = $_POST['HTML_nome'];
$categoria = $_POST['HTML_categoria'];
$marca = $_POST['HTML_marca'];
$valor = $_POST['HTML_valor'];
$descricao = $_POST['HTML_descricao'];

$imgOrig = $_FILES['HTML_imagem']['name']; //pega o arquivo original
$imgTemp = $_FILES['HTML_imagem']['tmp_name']; //pega o arquivo temp.
$imgTam = $_FILES['HTML_imagem']['size'] / 1024; //tamanho do arquivo

//validações
$liberado = false;
$tamMax = 500;
$tiposPerm = array("png", "jpg");

$aux = explode(".", $imgOrig);
$ext = $aux[1];

if (in_array($ext, $tiposPerm) && $imgTam <= $tamMax){
    $liberado = true;
}

/**tratamento das fotos sec. **/


foreach($_FILES['HTML_foto']['name'] as $id => $tmpFoto){
    $fotosSec = $_FILES['HTML_foto']['name'][$id];
    echo $fotosSec . "<br>";
}

if($liberado == true){
    //insert do produto
    $sqlProd = "Insert into Produtos(nome_PRODUTO, marca_PRODUTO, descricao_PRODUTO,";
    $sqlProd .= "valor_PRODUTO, imagem_PRODUTO, codigoCategoria_PRODUTO) values (";
    $sqlProd .= "'$nome','$marca','$descricao','$valor','$imgOrig','$categoria')";
    
    //executando o insert
    //mysqli_query($vConn,$sqlProd) or die(mysqli_error($vConn));    
    //move_uploaded_file($imgTemp, "img/". $imgOrig); //enviando imagem
    //echo "<script>alert('Produto Cadastrado.');</script>";
    //echo "<script>location.href='Admin.php';</script>";
    
}else{
    //echo "<script>alert('Arquivo de imagem não foi aceito.');</script>";
    //echo "<script>location.href='Admin.php';</script>";
    
}


?>
