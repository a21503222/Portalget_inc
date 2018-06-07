<?php
$pdbp = $_GET['posDBpage'];

																if($pdbp>=0){
	
include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
include($_SERVER["DOCUMENT_ROOT"]."/_lang/package1.php");
include($_SERVER["DOCUMENT_ROOT"]."/_lang/index.php");
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

$SQL_LIMIT_DEFLT = "LIMIT ".$pdbp.",1";

$lang = explode(".", $_COOKIE['_sy'] )[1];
$u_id = explode(".", $_COOKIE['_sy'] )[0];


if(explode(".", $_COOKIE['_rank'] )[2]==''){$sys_trd_tab='';}else{$sys_trd_tab=explode(".", $_COOKIE['_rank'] )[2];}
if(explode(".", $_COOKIE['_rank'] )[0]==''){$sys_fst_tab='recent';}else{$sys_fst_tab=explode(".", $_COOKIE['_rank'] )[0];}


$urlsite='https://www.portalget.com/view/?c=';

?>

<?php 
IF($sys_fst_tab=='recent'){
	if(strlen($sys_trd_tab)>2){
$sql="SELECT * FROM vw_friends_evpost WHERE loged_id_user = '".$u_id."' AND post_tag = '".$sys_trd_tab."' ORDER BY post_datetime DESC ";
	}else{
$sql="SELECT * FROM vw_friends_evpost WHERE loged_id_user = '".$u_id."' ORDER BY post_datetime DESC ";
	}
}ELSE IF($sys_fst_tab=='nearme'){
	if(strlen($sys_trd_tab)<2){
$sql="SELECT * FROM vw_evpost WHERE charset = '".$lang."' ORDER BY post_datetime DESC ";
	}else{
$sql="SELECT * FROM vw_evpost WHERE charset = '".$lang."' AND post_tag = '".$sys_trd_tab."' ORDER BY post_datetime DESC ";
	}
}ELSE IF($sys_fst_tab=='rating'){
	if(strlen($sys_trd_tab)<2){
$sql="SELECT * FROM vw_evpost ORDER BY rate DESC ";
	}else{
$sql="SELECT * FROM vw_evpost WHERE post_tag = '".$sys_trd_tab."' ORDER BY rate DESC ";
	}
}

$datetimeLASTrow='';
$sqll = mysqli_query($conexao, str_replace("DESC", "ASC", $sql));
while ($row = mysqli_fetch_array($sqll)){ $datetimeLASTrow=$row['post_datetime']; }

$sql = mysqli_query($conexao, $sql.$SQL_LIMIT_DEFLT);


?>
<?php while ($row = mysqli_fetch_array($sql)){ ?>

<?php if(mysqli_num_rows($sql)<=0){ return '';} ?>

<?php
$post_title_v1 = $row['post_title'];
$code_tag_v1 = $row['post_tag'];
$post_code_v1 = $row['post_code'];
$post_description_v1 = $row['post_description'];
$like_v1 = $row['_like'];
$deslike_v1 = $row['_deslike'];
$tagname_v1 = $row['tagname'];
$photo_v1 = get_u_Image($conexao, $row['id'], 'profile');
$name_v1 = $row['name'];
$views_v1 = $row['_views'];
$color_v1 = $row['color'];
$userverify_v1 = $row['userverify'];
$user_v1 = $row['user'];
$myid_v1 = $row['id'];

$iframe_url_link_src = ''; //https://www.youtube.com/embed/V_qXEYnjYr0

$img_url_link_src = 'http://hddesktopwallpapers.in/wp-content/uploads/2015/06/Country-Wallpaper-HD-A1-Road.jpg'; //http://hddesktopwallpapers.in/wp-content/uploads/2015/06/Country-Wallpaper-HD-A1-Road.jpg

$txt_url_link_src = ''; //https://www.portalget.com/_tools/js/library/jquery-main.js
?>

<?php


if(strlen($post_title_v1)<1){$post_title_v1="<span id='errlbl' >".strtoupper(lang('null', $_lang, 0).' '.lang('title', $_lang, 0))."!<span>";}
if(strlen($post_description_v1)<1){$post_description_v1="<span id='errlbl' >".strtoupper(lang('null', $_lang, 0).' '.lang('description', $_lang, 0))."!<span>";}
if(strlen($photo_v1)<5){$photo_v1 = "../image/internal_icon/v1/user-blue-50.png";}
if(strlen($views_v1)>1){$views_txt_v1=ucfirst(lang('views', $_lang, 0));}else{$views_txt_v1=ucfirst(lang('view', $_lang, 0));}
if(strlen($name_v1)<1){$name_v1="<span id='errlbl' >".strtoupper(lang('null', $_lang, 0).' '.lang('name', $_lang, 0))."<span>";}


$icncliked=0;
$sql2 = mysqli_query ($conexao, "SELECT * FROM tb_feedback_temp WHERE _type='".$post_code_v1."' AND id_user='".$u_id."' ");
while ($row2 = mysqli_fetch_array($sql2)){
	if($row2['name']=='like'){ $icncliked=1; }
	if($row2['name']=='deslike'){ $icncliked=2; }
}

$like_icncliked=$deslike_icncliked='';
if($icncliked==1){ $like_icncliked='d'; }else if($icncliked==2){ $deslike_icncliked='d'; }
?>

													<?php if(0==0){ ?>

			<!-- ******************************** IFRAME-POST-V.02 ********************************* -->
			<?php include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/modelo/iframes/iframe_post_v02.php"); ?>
			<!-- ******************************** IFRAME-POST-V.02 ********************************* -->
			
													<?php }else if(1==1){ ?>
													

													
													<?php } ?>
<?php } ?>

																<?php }else{ echo"<div class='iframe_main' ></div>"; }?>
