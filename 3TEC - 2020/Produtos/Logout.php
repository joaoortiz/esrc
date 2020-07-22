<?php

session_start();

$_SESSION['login'] = NULL;
$_SESSION['senha'] = NULL;
$_SESSION['permissao'] = 0;

session_destroy();

echo "<script>location.href='index.php';</script>";
?>
