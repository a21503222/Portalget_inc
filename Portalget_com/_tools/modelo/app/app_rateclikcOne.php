<?php
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
$u_id = explode(".", $_COOKIE['_sy'] )[0];

$r_op=0;
$sql = mysqli_query ($conexao, "SELECT * FROM tb_rating WHERE _type='".$_GET['c']."' ");
while ($row = mysqli_fetch_array($sql)){
	$r_like = $row['_like'];
	$r_deslike = $row['_deslike'];
}

$sql1 = mysqli_query ($conexao, "SELECT * FROM tb_views WHERE _type='".$_GET['c']."' ");
while ($row1 = mysqli_fetch_array($sql1)){
	$r_view = $row1['_views'];
}

$sql2 = mysqli_query ($conexao, "SELECT * FROM tb_feedback_temp WHERE _type='".$_GET['c']."' AND id_user='".$u_id."' ");
while ($row2 = mysqli_fetch_array($sql2)){
	if($row2['name']=='like'){ $r_op = 1; }
	if($row2['name']=='deslike'){ $r_op = 2; }
}

?>

<?php echo '<@like#>'.$r_like.'<@like#>'; ?>
<?php echo '<@deslike#>'.$r_deslike.'<@deslike#>'; ?>
<?php echo '<@view#>'.$r_view.'<@view#>'; ?>
<?php echo '<@op#>'.$r_op.'<@op#>'; ?>