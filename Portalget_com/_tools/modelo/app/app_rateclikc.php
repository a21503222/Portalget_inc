<?php
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");

$lang = explode(".", $_COOKIE['_sy'] )[1];
$myTags = explode(".", $_COOKIE['_sy'] )[2];
$editMod = explode(".", $_COOKIE['_rnk'] )[3];
$u_id = explode(".", $_COOKIE['_sy'] )[0];
$pagetab = explode(".", $_COOKIE['_rnk'] )[0];

date_default_timezone_set('UTC');
$current_datetime = date('Y-m-d H:i:s', time());
$future_datetime = date('Y-m-d H:i:s', strtotime("+30 day", strtotime($current_datetime)));

?>

<?php
$sql_1 = mysqli_query ($conexao, "SELECT * FROM tb_views WHERE _type='".$_GET['c']."' ");
$sql1 = mysqli_query ($conexao, "SELECT * FROM tb_rating WHERE _type='".$_GET['c']."' ");

$sql0 = mysqli_query ($conexao, "SELECT * FROM tb_feedback_temp WHERE id_user='".$u_id."' AND _type='".$_GET['c']."' ");
$name_v0='null';
while ($row0 = mysqli_fetch_array($sql0)){
	if($_GET['t']=='like' OR $_GET['t']=='deslike'){
		
		$name_v0 = $row0['name'];
		mysqli_query ($conexao, "DELETE FROM tb_feedback_temp WHERE id_user='".$u_id."' AND _type='".$_GET['c']."' AND name='like' OR id_user='".$u_id."' AND _type='".$_GET['c']."' AND name='deslike' ");
	
	}else if($_GET['t']=='view'){
		
		if( strtotime($row0['_datetime']) <= strtotime($current_datetime) ){
	mysqli_query ($conexao, "DELETE FROM tb_feedback_temp WHERE id_user='".$u_id."' AND _type='".$_GET['c']."' AND name='view' ");
		}
		
	}

}
?>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

<?php if($_GET['t']=='like'){ ?>
											<?php while ($row1 = mysqli_fetch_array($sql1)){ ?>
<?php if($name_v0=='like'){ ?>
	
	<?php mysqli_query ($conexao, "UPDATE tb_rating SET _like = ".$row1['_like']."-1 WHERE _type='".$row1['_type']."' "); ?>

<?php }else if($name_v0=='deslike'){ ?>

	<?php mysqli_query ($conexao, "UPDATE tb_rating SET _deslike = ".$row1['_deslike']."-1 WHERE _type='".$row1['_type']."' "); ?>
	<?php mysqli_query ($conexao, "UPDATE tb_rating SET _like = ".$row1['_like']."+1 WHERE _type='".$row1['_type']."' "); ?>
	<?php mysqli_query ($conexao, "INSERT INTO tb_feedback_temp(id_user, _type, _datetime, name) VALUES(".$u_id.", '".$_GET['c']."', '".$current_datetime."', 'like') "); ?>
	
<?php }else{ ?>
	
	<?php mysqli_query ($conexao, "INSERT INTO tb_feedback_temp(id_user, _type, _datetime, name) VALUES(".$u_id.", '".$_GET['c']."', '".$current_datetime."', 'like') "); ?>
	<?php mysqli_query ($conexao, "UPDATE tb_rating SET _like = ".$row1['_like']."+1 WHERE _type='".$row1['_type']."' "); ?>
	
<?php } ?>
											<?php } ?>
<?php } ?>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->


<?php if($_GET['t']=='deslike'){ ?>
											<?php while ($row1 = mysqli_fetch_array($sql1)){ ?>

	<?php if($name_v0=='deslike'){ ?>

		<?php mysqli_query ($conexao, "UPDATE tb_rating SET _deslike = ".$row1['_deslike']."-1 WHERE _type='".$row1['_type']."' "); ?>

	<?php }else if($name_v0=='like'){ ?>

		<?php mysqli_query ($conexao, "UPDATE tb_rating SET _like = ".$row1['_like']."-1 WHERE _type='".$row1['_type']."' "); ?>
		<?php mysqli_query ($conexao, "UPDATE tb_rating SET _deslike = ".$row1['_deslike']."+1 WHERE _type='".$row1['_type']."' "); ?>
		<?php mysqli_query ($conexao, "INSERT INTO tb_feedback_temp(id_user, _type, _datetime, name) VALUES(".$u_id.", '".$_GET['c']."', '".$current_datetime."', 'deslike') "); ?>
	
	<?php }else{ ?>

		<?php mysqli_query ($conexao, "INSERT INTO tb_feedback_temp(id_user, _type, _datetime, name) VALUES(".$u_id.", '".$_GET['c']."', '".$current_datetime."', 'deslike') "); ?>
		<?php mysqli_query ($conexao, "UPDATE tb_rating SET _deslike = ".$row1['_deslike']."+1 WHERE _type='".$row1['_type']."' "); ?>

	<?php } ?>
											<?php } ?>
<?php } ?>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->


<?php if($_GET['t']=='view'){ ?>
											<?php while ($row1 = mysqli_fetch_array($sql_1)){ ?>
		<?php if($name_v0!='view'){ ?>
		
	<?php if( mysqli_num_rows($sql0) < 1 ){ ?>
		
			<?php mysqli_query ($conexao, "INSERT INTO tb_feedback_temp(id_user, _type, _datetime, name) VALUES(".$u_id.", '".$_GET['c']."', '".$future_datetime."', 'view') "); ?>
			<?php mysqli_query ($conexao, "UPDATE tb_views SET _views = ".$row1['_views']."+1 WHERE _type='".$row1['_type']."' "); ?>
		
	<?php } ?>
		
		
		<?php } ?>
											<?php } ?>
<?php } ?>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->