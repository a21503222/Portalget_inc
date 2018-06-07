<?php

$_lang=0;
$html_lang=$html_title=$str=$exclusionsurl=$u_session=$u_name=$u_usercod=$u_email=$u_passw=$u_photo=$u_line=$u_id=$u_active=$u_charset=$u_gender=$u_datebirth=$u_phone=$u_street=$u_country=$u_nationality=$u_occupation=$u_city=$u_zip_code=$u_array_tag=$this_root_title=$cntt_set_title=$atualpage=$logout=$cntt_m1=$cntt_m2=$cntt_m3=$cntt_m4=$cntt_m5=$cntt_m6=$cntt_logo=$cntt_set_logo='';


function indexpage_logged($page){
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/db.php");
	
		javascriptDir('');
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/logged_user.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/general_functions.php");
	if($u_inbox_view==1){$html_title="(".$u_inbox_badge.") Portalget";}
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/all_string_list.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/_lang/package1.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/_lang/index.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/".$page."/page_content.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/modelo/popup/inbox_page.php");
		javascriptDir('');
}

	function indexpage_visitor($page){
		echo"indexpage_visitor";
	}

	function registry_user($x){
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/db.php"); $cert='';
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/logged_user.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/general_functions.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/all_string_list.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/_lang/package1.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/_lang/index.php");
	if($_GET['step']==''){ echo"<script> window.location.href = '/dashboard/?step=1'; </script>"; }
	
		if($x == '1' ){
			$a=explode("|#|",$_COOKIE['_temp_data']);
			include($_SERVER['DOCUMENT_ROOT']."/dashboard/registry/v01/L1.php");
			//if($a[8] != 'reg:on'){ echo"<script> window.location.href = '/home/'; </script>"; }
			exit();
		}else{ $cert += 1; }

		if($x == '2' ){
			include($_SERVER['DOCUMENT_ROOT']."/dashboard/registry/v01/L2.php");
			if($a[8] != 'reg:on'){ echo"<script> window.location.href = '/home/'; </script>"; }
			exit();
		}else{ $cert += 1; }

		if($x == '3' ){
			include($_SERVER['DOCUMENT_ROOT']."/dashboard/registry/v01/L3.php");
			if($a[8] != 'reg:on'){ echo"<script> window.location.href = '/home/'; </script>"; }
			exit();
		}else{ $cert += 1; }

		if( $cert == 3 ){
			if($a[7] != 'NULL'){ echo"<script> window.location.href = '/home/'; </script>"; }
			include($_SERVER['DOCUMENT_ROOT']."/dashboard/registry/v01/L0.php");
			exit();
		}
	}
	
	function admin_user($x){
		echo"admin_user";
	}

	function javascriptDir($x){
		echo"<script src='/_tools/js/library/jquery-main".$x.".js' ></script>";
		echo"<script src='/_tools/js/main".$x.".js' ></script>";
		echo"<script src='/_tools/js/chat".$x.".js' ></script>";
	}
	
	function cssDir($type, $x){
		if($type=='main_login'){
			echo"<link rel='stylesheet' type='text/css' href='/_tools/css/main_login".$x.".css' />";
		}else if($type==''){
			echo"";
		}
	}

?>