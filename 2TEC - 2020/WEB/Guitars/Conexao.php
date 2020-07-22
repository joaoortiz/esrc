<?php

$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$nomeBD = "bdguitars";

$vConn = mysqli_connect($servidor,$usuario,$senha,$nomeBD);
mysqli_set_charset($vConn,"utf8");



?>


