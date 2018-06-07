<!-- HOME PAGE v8.2 -->
<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php"); ?>	<!--- @ DATABASE MAIN --->
<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php"); ?>
<script src='/_tools/js/main.js' ></script>
<?php

$sn='';
if(isset($_GET['sn'])){$sn=$_GET['sn'];}else{$sn='null';}
date_default_timezone_set('UTC');
$_timeLogout = date('Y-m-d H:i:s', time());	
	if($sn!='null'){
		$sql = mysqli_query ($conexao, "SELECT * FROM tb_process WHERE user_id='".explode('.', $_COOKIE['_sy'] )[0]."' AND session='".$sn."' ");
		if( mysqli_num_rows($sql)>0 ){
			
		mysqli_query($conexao, "UPDATE tb_user SET line = '0' WHERE id=".explode('.', $_COOKIE['_sy'] )[0]." ");
		mysqli_query($conexao, "DELETE FROM tb_process WHERE user_id=".explode('.', $_COOKIE['_sy'] )[0]." AND session='".$sn."' ");
		Refsh_my_frids($conexao,explode(".",$_COOKIE['_sy'])[0],1);
		?>
		<script type='text/javascript' >
		setTimeout(function(){
		window.location.href = "/login/";
		}, 500);
		</script>
		<?php
		}else{
                    $new_sy=''.'.'.explode('.', $_COOKIE['_sy'] )[1].'.'.explode('.', $_COOKIE['_sy'] )[2].'.'.explode('.', $_COOKIE['_sy'] )[3];
                    ?>
                    <script type='text/javascript' >
                    setCookie('_sy', '<?php echo $new_sy; ?>' , 1, 'd');
                    setTimeout(function(){
                    window.location.href = "/login/?r=err";
                    return;
                    }, 500);
                    </script>
                    <?php
                    Refsh_my_frids($conexao,explode(".",$_COOKIE['_sy'])[0],1);
		}
	}
	$new_sy=''.'.'.explode('.', $_COOKIE['_sy'] )[1].'.'.explode('.', $_COOKIE['_sy'] )[2].'.'.explode('.', $_COOKIE['_sy'] )[3];
	Refsh_my_frids($conexao,explode(".",$_COOKIE['_sy'])[0],1);
	?>
	<script type='text/javascript' >
            setCookie('_sy', '<?php echo $new_sy; ?>' , 1, 'd');
            setTimeout(function(){
            window.location.href = "/login/";
            return;
            }, 500);
	</script>