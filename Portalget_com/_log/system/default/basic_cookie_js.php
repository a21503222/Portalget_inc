<?php $sql = mysqli_query ($conexao, "SELECT * FROM tb_sys_default"); ?>
<?php 
while($row = mysqli_fetch_array($sql)){
	$tsd_rnk = $row['rank'];
	$tsd_d095 = $row['path_root'].'*'.$row['dir_root'].'*'.$row['df_blue'].'*'.$row['df_white'].'*'.$row['df_gray'].'*'.$row['df_blueclearp'].'*'.$row['df_blueclearpp'].'*'.$row['df_img_folder'].'*'.$row['df_black'];
} 
?>
<!--
rnk: realtime.tag.!tagcode.writing
d095: path.dir.blue.white.gray - explode('*', $_COOKIE['_d095'] )[0]
-->
<script>
if( getCookie('_rnk')=='' ){
	setCookie('_rnk','<?php echo $tsd_rnk; ?>', 30, 'd');
	setTimeout(function(){ location.reload(); }, 2500);
}

if( getCookie('_d095')=='' ){
	setCookie('_d095','<?php echo $tsd_d095; ?>', 30, 'd');
	setTimeout(function(){ location.reload(); }, 2500);
}
</script>