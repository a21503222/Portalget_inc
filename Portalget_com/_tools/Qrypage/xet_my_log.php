<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

if(isset($_GET['data'])){
	echo '(@)'.get_my_log();
	set_my_log($_GET['data']);
}

?>