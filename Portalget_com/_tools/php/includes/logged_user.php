<!-- HOME PAGE v8.2 -->

<?php $id=explode(".", $_COOKIE['_sy'] )[0]; ?>

<?php $sql=mysqli_query ($conexao, "SELECT * FROM vw_logeduser WHERE id = ".$id." "); ?>
<?php while($row=mysqli_fetch_array($sql)){
	$u_name=$row['name'];
	$u_usercod=$row['usercod'];
	$u_email=$row['email'];
	$u_passw=$row['passw'];
	$u_photo=$row['photo'];
	$u_line=$row['line'];
	$u_id=$row['id'];
	$u_active=$row['active'];
	$u_charset=$row['charset'];
	$u_gender=$row['gender'];
	$u_datebirth=$row['datebirth'];
	$u_phone=$row['phone'];
	$u_street=$row['street'];
	$u_country=$row['country'];
	$u_nationality=$row['nationality'];
	$u_occupation=$row['occupation'];
	$u_city=$row['city'];
	$u_zip_code=$row['zip_code'];
	$u_session=$row['session'];
 }
	$Stus_color = array("#508ab2", "#54ff54", "#ff8000", "#d6555d");
?>


<?php
error_reporting(0);
if(!getimagesize($u_photo)){$u_photo = "/images/m2-u1063-fr.png"; }
?>

<?php $sql2 = mysqli_query($conexao, "SELECT COUNT(send_datetime) AS inbox FROM vw_inbox WHERE id = ".$id." "); ?>
<?php while($row = mysqli_fetch_array($sql2)){ $iboxsend = $row['inbox']; } ?>

<?php $sql2 = mysqli_query($conexao, "SELECT COUNT(readed_datetime) AS inbox FROM vw_inbox WHERE id = ".$id." "); ?>
<?php while($row = mysqli_fetch_array($sql2)){ $iboxread = $row['inbox']; } ?>

<?php 
	$u_inbox = $iboxsend - $iboxread;
	if($u_inbox==0){$u_inbox_badge=''; $u_inbox_view=0; }else if($u_inbox<=9){ $u_inbox_badge=$u_inbox; $u_inbox_view=1; }else{ $u_inbox_badge='+9'; $u_inbox_view=1; }
	$u_notify_ATV = 3;
?>

<?php $sql3 = mysqli_query($conexao, "SELECT * FROM tb_sys_default"); ?>
<?php while($row = mysqli_fetch_array($sql3)){ $sys_rank_default = $row['rank']; } ?>