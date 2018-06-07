<?php
include($_GET['dir']."/_tools/php/includes/db.php");

if($_GET['d']=='_d095'){
	$sql = mysqli_query($conexao, "SELECT * FROM tb_sys_default");
	while($row = mysqli_fetch_array($sql)){ 
		$path_root=$row['path_root'].'*';
		$dir_root=$row['dir_root'].'*';
		$df_blue=$row['df_blue'].'*';
		$df_white=$row['df_white'].'*';
		$df_gray=$row['df_gray'].'*';
		$df_blueclearp=$row['df_blueclearp'].'*';
		$df_blueclearpp=$row['df_blueclearpp'].'*';
		$df_img_folder=$row['df_img_folder'].'*';
		$df_black=$row['df_black'];
	}
$rlt=$path_root.$dir_root.$df_blue.$df_white.$df_gray.$df_blueclearp.$df_blueclearpp.$df_img_folder.$df_black;
echo '<'.$_GET['d'].'>'.$rlt;
}

if($_GET['d']=='_rank'){
	$sql = mysqli_query($conexao, "SELECT * FROM tb_sys_default");
	while($row = mysqli_fetch_array($sql)){ 
		$rank=$row['rank'];
	}
echo '<'.$_GET['d'].'>'.$rank;
}

?>