<?php
session_start();

$_SESSION['user'] = "";
$_SESSION['itens'] = "";
$_SESSION['carrinho'] = "";

echo "<script>location.href='Carrinho.php';</script>";

?>