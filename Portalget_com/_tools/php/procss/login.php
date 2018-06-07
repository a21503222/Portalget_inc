<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php"); ?>
<?php //include($_SERVER["DOCUMENT_ROOT"]."/_lang/index.php"); ?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php"); ?>
<?php //include($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/all_string_list.php"); ?>
<script src='/_tools/js/main.js' ></script>
<?php

date_default_timezone_set('UTC');
$sess_datetime = date('Y-m-d H:i:s', time());

$user = $_POST['user'];
$pass = md5($_POST['pass']);

if(!isset($user) || !isset($pass)){
	?>
	<script type='text/javascript' >
	setTimeout(function(){
	window.location.href = "/login/";
	}, 500);
	</script>
	<?php
}

$_sql = mysqli_query ($conexao, "SELECT * FROM tb_user WHERE usercod = '$user' and passw = '$pass' OR email = '$user' and passw = '$pass'") or die (mysqli_error($conexao));
$_row = mysqli_num_rows($_sql);
while($linha = mysqli_fetch_array($_sql)){
	$_id=$linha['id'];
	$_charset=$linha['charset'].'.';
	$_active=$linha['active'];
	$log=$linha['log'];
	$_log=explode("|#|",$log);
	Refsh_my_frids($conexao,$_id,1);
}

if($_row > 0){
	
	if(($_active==0) && (SetLimite_datetime_UTC($_log[0], 30)==1)){
		IF(delete_user($conexao,$_id,0)==1){
			?>
			<script type='text/javascript' >
			setCookie('_mod', 'count_delected_30_days' , 15, 'd');
			setTimeout(function(){
			window.location.href = "/#A_sua_conta_foi_eliminada_apos_o_final_do_prazo_de_30dias";
			}, 500);
			</script>
			<?php
		}
	}else{
		$new_sy=$_id.'.'.$_charset.'/.null';
		?>
		<script type='text/javascript' >
		setCookie('_sy', '<?php echo $new_sy; ?>' , 15, 'd');
		</script>
		<?php
		ChangeMyStatus($conexao,$_id,'1','false');
		$newKey=unique_code_in_db($conexao,"SELECT * FROM tb_process WHERE session='@key@'", "0123456789", 5, 26);
		mysqli_query($conexao, "INSERT INTO tb_process VALUES(".$_id.", '".$newKey."') ");
		$data=$log;
		loged_user_Sys_Process($_id, $newKey.'_&)_'.'0.0.0.0.0.0.0.0'.'_&)_'.$data.'_&)_'.$sess_datetime );
		Refsh_my_frids($conexao,$_id,1);
		add_user_auto($_id);
		count_current_time($_id, 'w');
		
		if($_log[7] == 'NULL'){
			?>
			<script type='text/javascript' >
			setCookie('_mod', 'registry' , 15, 'd');
			setCookie('_temp_data', '<?php echo $log; ?>' , 15, 'd');
			setTimeout(function(){
			window.location.href = "/";
			}, 500);
			</script>
			<?php
		}else if($_log[8] == 'reg:on' && $_active==1){
			?>
			<script type='text/javascript' >
			setCookie('_mod', 'registry' , 30, 'd');
			setCookie('_temp_data', '<?php echo $log; ?>' , 30, 'd');
			setTimeout(function(){
                            window.location.href = "/home/";//"/dashboard.php";
			}, 500);
			</script>
			<?php
		}else if(($_GET['r']=='1')&&(strlen(explode(".",$_COOKIE['_sy'])[2])>=3)){
			?>
			<script type='text/javascript' >
			setCookie('_mod', 'registry' , 1, 'd');
			setCookie('_temp_data', '<?php echo $log; ?>' , 30, 'd');
			setTimeout(function(){
			window.location.href = "<?php echo explode(".",$_COOKIE['_sy'])[2]; ?>";
			}, 500);
			</script>
			<?php
		}else{
			if($_log[7] == 'admin'){
				?>
				<script type='text/javascript' >
				setCookie('_mod', 'admin' , 30, 'd');
				setTimeout(function(){
				window.location.href = "/dashboard/";
				}, 500);
				</script>
				<?php
			}else{
				?>
				<script type='text/javascript' >
				setCookie('_mod', '' , 1, 'd');
				setTimeout(function(){
				window.location.href = "/home/";
				}, 500);
				</script>
				<?php
			}
		}
	
	}
	
}else{
	?>
	<script type='text/javascript' >
	setCookie('_mod', 'invalid_data' , 1, 'd');
	setTimeout(function(){
	window.location.href = '/login/';
	}, 500);
	</script>
	<?php
}
?>
        
<script type='text/javascript' >
setTimeout(function(){
    setCookie('_SN', '<?php echo $newKey; ?>' , 30, 'd');
}, 500);
</script>