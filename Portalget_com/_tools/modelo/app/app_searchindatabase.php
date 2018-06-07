<!--- @ DATABASE MAIN --->
<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php"); ?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/system/main_functions.php"); ?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php"); ?>

<?php 

if($_GET['t']=='user'){

$sql = mysqli_query ($conexao, "SELECT active, log FROM tb_user WHERE usercod = '".$_GET['q']."' ");
$num = mysqli_num_rows($sql);

while ($row = mysqli_fetch_array($sql)){ $check=$row['active']; $date=explode('|#|', $row['log'])[0]; }

if($num > 0){
			if( ($check==1)||(SetLimite_datetime_UTC($date, 15)==0)){
				$str=1;
			}else{
				$str=0;
			}
}else{
	$str=0;
}

echo '<_'.$_GET['t'].'_>'.$str;

}

if($_GET['t']=='email'){
	
$sql = mysqli_query ($conexao, "SELECT active, log FROM tb_user WHERE email = '".$_GET['q']."' ");
$num = mysqli_num_rows($sql);

while ($row = mysqli_fetch_array($sql)){ $check=$row['active']; $date=explode('|#|', $row['log'])[0]; }

$parts_mail = explode('@', $_GET['q']);
$mail_user = array_shift($parts_mail);
$mail_site = array_pop($parts_mail);

if($num > 0){
			if( ($check==1)||(SetLimite_datetime_UTC($date, 15)==0)){
				$str=1;
			}else{
				$str=0;			
			}
}else{
	$str=0;
}

$Array_exclusionsurl=array('live.com.pt');
for($i=0; $i<count($Array_exclusionsurl); $i++){ if($exclusionsurl!=1){ if($mail_site==$Array_exclusionsurl[$i]){ $exclusionsurl=1; }else{ $exclusionsurl=0; } } }
if($exclusionsurl==0){ if(!isDomainAvailible('http://'.$mail_site.'/')){$str=10;} }

echo '<_'.$_GET['t'].'_>'.$str;
	
}

?>