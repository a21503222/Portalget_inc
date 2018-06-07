<?php
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

$_GET['t']='urlinbox';

if($_GET['t']=='urlinbox'){
$_inbox_QUERY_CODE_URL="5hJko6UfOYvmccbT9";//substr(str_shuffle(str_repeat("1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM", 17)), 0, 17);
$num=mysqli_num_rows( mysqli_query($conexao, "SELECT * FROM tb_inbox WHERE url_log = '".$_inbox_QUERY_CODE_URL."' ") );
	if($num==1){
		echo '<_'.$_GET['t'].'_>'.$num;
	}else{
		echo '<_'.$_GET['t'].'_>'.$_inbox_QUERY_CODE_URL;
	}
}



?>