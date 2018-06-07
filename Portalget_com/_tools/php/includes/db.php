<?php
$sqli_host = "portalget.com.mysql:3306";
$sqli_user = "portalget_com";
$sqli_pword = "S4hWmRWucAahmEfkKVX2DyCD";
$sqli_db = "portalget_com";
$conexao = mysqli_connect($sqli_host, $sqli_user, $sqli_pword, $sqli_db) or die (mysqli_error($conexao));

$_cx = $conexao;
?>