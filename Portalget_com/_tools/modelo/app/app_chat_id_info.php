<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php"); ?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php"); ?>
<?php $temp_id = $_GET['id']; ?>
<?php $sql=mysqli_query ($conexao, "SELECT * FROM vw_logeduser WHERE id = $temp_id "); ?>

<?php while($row=mysqli_fetch_array($sql)){
	$u_name=$row['name'];
	$u_photo=$row['photo'];
	$u_line=$row['line'];
 }
 
 if($u_line=='1'){ $u_line='onpoint'; }else if($u_line=='a'){ $u_line='ausentpoint'; }else if($u_line=='o'){ $u_line='busypoint'; }else{ $u_line='offpoint'; }
?>


<nm><?php echo AutoShrtName($u_name, 30); ?><nm>
<ln><?php echo $u_line; ?><ln>
<tx><?php echo 'quem te disse isso!'; ?><tx>
<di><?php echo 'offline'; ?><di>