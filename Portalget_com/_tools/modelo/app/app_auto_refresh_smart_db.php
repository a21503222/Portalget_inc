<?php
include_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/db.php");
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

$url_dir=$_SERVER["DOCUMENT_ROOT"]."/_log/system/id_users_data/bin_data/temp/user_".explode(".",$_COOKIE['_sy'])[0].".db";

$u_id=explode(".",$_COOKIE['_sy'])[0];
$u_sess=explode(".",$_COOKIE['_sy'])[3];

date_default_timezone_set('UTC');

$dt_previous = date('Y-m-d H:i:s', strtotime('-60 seconds')); // Previous Time count_current_time($u_id, 'r')
$sess_datetime = date('Y-m-d H:i:s', time());
$time_over_off = date('Y-m-d H:i:s', strtotime('-15 minutes'));

$cd=''; $lg_user=''; if(file_exists($url_dir)){ $cd33=''; $cd=explode(".", explode('_&)_', read_file($url_dir))[1]); }else{ $cd33='null'; }
count_current_time($u_id, 'w');

?>
<pw><?php echo $cd[0]; ?><pw>
<ru><?php echo $cd[1]; ?><ru>
<ny><?php echo $cd[2]; ?><ny>
<ib><?php echo $cd[3]; ?><ib>
<sm><?php echo $cd[4]; ?><sm>
<ps><?php echo $cd[5]; ?><ps>
<sy><?php echo $cd[6]; ?><sy>
<tg><?php echo $cd[7]; ?><tg>
<er><?php echo $cd33; ?><er>
<?php

											if(file_exists($url_dir)){
												
	$dt=explode('_&)_',read_file($url_dir))[3]; // Time Stoped
	$da=explode('_&)_',read_file($url_dir))[2]; // My data Here
	$sk=explode('_&)_',read_file($url_dir))[0]; // Session Code

	
	if($cd[0]==1){
		loged_user_Sys_Process($u_id, $sk.'_&)_'.'0'.'.'.$cd[1].'.'.$cd[2].'.'.$cd[3].'.'.$cd[4].'.'.$cd[5].'.'.$cd[6].'.'.$cd[7].'_&)_'.$da.'_&)_'.$dt );
	}
	if($cd[1]==1){
		loged_user_Sys_Process($u_id, $sk.'_&)_'.$cd[0].'.'.'0'.'.'.$cd[2].'.'.$cd[3].'.'.$cd[4].'.'.$cd[5].'.'.$cd[6].'.'.$cd[7].'_&)_'.$da.'_&)_'.$dt );
	}
	if($cd[2]==1){
		loged_user_Sys_Process($u_id, $sk.'_&)_'.$cd[0].'.'.$cd[1].'.'.'0'.'.'.$cd[3].'.'.$cd[4].'.'.$cd[5].'.'.$cd[6].'.'.$cd[7].'_&)_'.$da.'_&)_'.$dt );
	}
	if($cd[3]==1){
		loged_user_Sys_Process($u_id, $sk.'_&)_'.$cd[0].'.'.$cd[1].'.'.$cd[2].'.'.'0'.'.'.$cd[4].'.'.$cd[5].'.'.$cd[6].'.'.$cd[7].'_&)_'.$da.'_&)_'.$dt );
	}
	if($cd[4]==1){
		loged_user_Sys_Process($u_id, $sk.'_&)_'.$cd[0].'.'.$cd[1].'.'.$cd[2].'.'.$cd[3].'.'.'0'.'.'.$cd[5].'.'.$cd[6].'.'.$cd[7].'_&)_'.$da.'_&)_'.$dt );
	}
	if($cd[5]==1){
		loged_user_Sys_Process($u_id, $sk.'_&)_'.$cd[0].'.'.$cd[1].'.'.$cd[2].'.'.$cd[3].'.'.$cd[4].'.'.'0'.'.'.$cd[6].'.'.$cd[7].'_&)_'.$da.'_&)_'.$dt );
	}
	if($cd[6]==1){
		loged_user_Sys_Process($u_id, $sk.'_&)_'.$cd[0].'.'.$cd[1].'.'.$cd[2].'.'.$cd[3].'.'.$cd[4].'.'.$cd[5].'.'.'0'.'.'.$cd[7].'_&)_'.$da.'_&)_'.$dt );
	}
	if($cd[7]==1){
		loged_user_Sys_Process($u_id, $sk.'_&)_'.$cd[0].'.'.$cd[1].'.'.$cd[2].'.'.$cd[3].'.'.$cd[4].'.'.$cd[5].'.'.$cd[6].'.'.'0'.'_&)_'.$da.'_&)_'.$dt );
	}
	

//<!--- General Analysis --->
	$ab=$_SERVER["DOCUMENT_ROOT"]."/_log/system/id_users_data/bin_data/bin.db";
	for($i=0;$i<substr_count(read_file($ab),'_&)_');$i++){ $new_id=explode('_&)_',read_file($ab))[$i];	
	
		if(( count_current_time($new_id, 'r') <= $dt_previous ) AND ( ShowMyStatus($conexao,$new_id) == '1' )){
			ChangeMyStatus($conexao,$new_id,'a','true');
			Refsh_my_frids($conexao,$new_id,1);
		}
		
		if(( count_current_time($new_id, 'r') >= $dt_previous ) AND ( ShowMyStatus($conexao,$new_id) == 'a' )){
			ChangeMyStatus($conexao,$new_id,'1','true');
			Refsh_my_frids($conexao,$new_id,1);
		}
		
		if(( count_current_time($new_id, 'r') <= $time_over_off ) AND ( ShowMyStatus($conexao,$new_id) == 'a' )){
			ChangeMyStatus($conexao,$new_id,'0','false');
			Refsh_my_frids($conexao,$new_id,1);
		}
		
	}
//<!--- General Analysis --->


// unlink('test.html');
											}
?>