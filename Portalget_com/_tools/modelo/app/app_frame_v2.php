<?php
$pdbp = $_GET['posDBpage'];
include_once explode("*", $_COOKIE['_d095'] )[1].'global.php';

																if($pdbp>=0){
	
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
include($_SERVER["DOCUMENT_ROOT"]."/_lang/index.php");
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

$SQL_LIMIT_DEFLT = "LIMIT ".$pdbp.",1";

$lang = explode(".", $_COOKIE['_sy'] )[1];
$myTags = explode(".", $_COOKIE['_sy'] )[2];
$editMod = explode(".", $_COOKIE['_rnk'] )[3];
$u_id = 33;
$pagetab = explode(".", $_COOKIE['_rnk'] )[0];

$set_rank = explode(".", $_COOKIE['_rnk'] )[2];

$urlsite='http://localhost'.'/view/?c=';

?>

<?php 
IF($pagetab=='realtime'){
	if(strlen(explode(".", $_COOKIE['_rnk'] )[2])>2){
$sql="SELECT * FROM vw_friends_evpost WHERE post_tag = '".$set_rank."' ORDER BY post_datetime DESC ";
	}else{
$sql="SELECT * FROM vw_friends_evpost ORDER BY post_datetime DESC ";
	}
}ELSE IF($pagetab=='nearme'){
	if(strlen(explode(".", $_COOKIE['_rnk'] )[2])<2){
$sql="SELECT * FROM vw_evpost WHERE charset = '".$lang."' ORDER BY post_datetime DESC ";
	}else{
$sql="SELECT * FROM vw_evpost WHERE charset = '".$lang."' AND post_tag = '".$set_rank."' ORDER BY post_datetime DESC ";
	}
}ELSE IF($pagetab=='toprated'){
	if(strlen(explode(".", $_COOKIE['_rnk'] )[2])<2){
$sql="SELECT * FROM vw_evpost ORDER BY rate DESC ";
	}else{
$sql="SELECT * FROM vw_evpost WHERE post_tag = '".$set_rank."' ORDER BY rate DESC ";
	}
}ELSE{
	
}

if(explode(".", $_COOKIE['_sy'] )[8]<=$pdbp){ $_i_FinalRow=1; }else{ $_i_FinalRow=0; }

$datetimeLASTrow='';
$sqll = mysqli_query($conexao,  str_replace("DESC", "ASC", $sql) );
while ($row = mysqli_fetch_array($sqll)){ $datetimeLASTrow=$row['post_datetime']; }

/* <!--- SET _sy COOKIE : INSERT MAX ROW IN SQL ---> */
$datetimeLASTrow=explode(" ", $datetimeLASTrow )[0];
$sqli = mysqli_query($conexao, $sql);
$str=''; for($i=0; $i<=6; $i++){ $str = $str.explode(".", $_COOKIE['_sy'] )[$i].'.'; }
$str=$str.mysqli_num_rows($sqli).'.'.$_i_FinalRow.'.'.$datetimeLASTrow.'.';
//for($i=10; $i<=11; $i++){ $str = $str.explode(".", $_COOKIE['_sy'] )[$i].'.'; }
setcookie('_sy',$str, time()+(86400*30), "/");
/* <!--- SET _sy COOKIE : INSERT MAX ROW IN SQL ---> */

$sql = mysqli_query($conexao, $sql.$SQL_LIMIT_DEFLT);


?>
<?php while ($row = mysqli_fetch_array($sql)){ ?>

<?php
$post_title_v1 = $row['post_title'];
$code_tag_v1 = $row['post_tag'];
$post_code_v1 = $row['post_code'];
$post_description_v1 = $row['post_description'];
$like_v1 = $row['_like'];
$deslike_v1 = $row['_deslike'];
$tagname_v1 = $row['tagname'];
$photo_v1 = $row['photo'];
$name_v1 = $row['name'];
$views_v1 = $row['_views'];
$color_v1 = $row['color'];
$userverify_v1 = $row['userverify'];
$user_v1 = $row['user'];
$myid_v1 = $row['id'];
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

<div class="iframe_main" >
		<div style="margin-left:65px;" >
			<!--- SHARE MENU OP ---> <div class="div_share_box_v1_a noselect" id="div_share_box_v1_a<?php echo $pdbp; ?>" > <!--- SHARE MENU OP --->

<p><span class="noselect" ><?php echo ucfirst(lang('share',$_lang,1)); ?></span></p>
<p class="close noselect" title="<?php echo ucfirst(lang('close',$_lang,1)); ?>" onClick="menuClickFramev1('div_share_box_v1_a', '<?php echo $pdbp; ?>');" >&#10006;</p>

<center>
<img onClick="" class="noselect" src="../image/internal_icon/v1/iconfacebook.png" width="30px" height="30px" />
<img onClick="" class="noselect" src="../image/internal_icon/v1/icontwitter.png" width="30px" height="30px" />
<img onClick="" class="noselect" src="../image/internal_icon/v1/icongoogleplus.png" width="30px" height="30px" />
<img onClick="" class="noselect" src="../image/internal_icon/v1/iconblogger.png" width="30px" height="30px" />

<input id="itxt<?php echo $post_code_v1.$pdbp; ?>" type="text" onClick="this.setSelectionRange(0, this.value.length)" value="<?php echo $urlsite.$post_code_v1; ?>" />
</center>

	<br/>
	
<center><button class="noselect" onClick="clickToCopy('itxt<?php echo $post_code_v1.$pdbp; ?>');this.innerText='<?php echo ucfirst(lang('copied',$lang,0)); ?>!';" ><?php echo ucfirst(lang('copy',$_lang,1)); ?></button></center>

			<!--- SHARE MENU OP ---> </div> <!--- SHARE MENU OP --->
		</div>
	<div class="iframe_title" >
		<div class="vertical" >
			<span >
			<a onclick="gobackpage('/home/');  location.href='<?php echo $urlsite.$post_code_v1; ?>';" >
			<?php echo iconv("ISO-8859-1", "UTF-8", ucfirst($post_title_v1)); ?>
			</a>
			</span>		
			<img class="noselect" onClick="menuClickFramev1('dropd_ifr_opt_v1_a', '<?php echo $pdbp; ?>');" style="padding-left:2.7%;" src="../image/internal_icon/v1/menuvertical0.png" width="20px" height="25px" id="btnopifrmv<?php echo $pdbp; ?>" onmouseover="mouseOnHover('btnopifrmv<?php echo $pdbp; ?>', 'menuvertical1');" onmouseout="mouseOnHover('btnopifrmv<?php echo $pdbp; ?>', 'menuvertical0');" />
			<div style="position:relative; float:right; left:-150px;" >
				<div class="dropd_ifr_opt_v1_a noselect" id="dropd_ifr_opt_v1_a<?php echo $pdbp; ?>" >
					<ul>
						<li onClick="click_to_login();" ><a><?php echo ucfirst(lang('add', $_lang, 1)).' '.lang('to', $_lang, 2).' '.lang('favorites', $_lang, 0); ?></a></li>
						<li><a><?php echo ucfirst(lang('hide', $_lang, 1)).' '.lang('publication', $_lang, 0); ?></a></li>
						<li><a><?php echo ucfirst(lang('download', $_lang, 1)); ?></a></li>
						<li onClick="click_to_login();" ><a><?php echo ucfirst(lang('report', $_lang, 1)); ?></a></li>
						<li onClick="menuClickFramev1('div_share_box_v1_a', '<?php echo $pdbp; ?>');" ><a><?php echo ucfirst(lang('share', $_lang, 1)); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="iframe_desc" >
		<div class="jstfy" >
			<span ><?php echo iconv("ISO-8859-1", "UTF-8", ucfirst($post_description_v1)); ?></span>
		</div>
	</div>
	<a onClick="clikcrate('view', '<?php echo $post_code_v1; ?>', '<?php echo $pdbp; ?>');" >
	<div class="iframe_area noselect" > <!-- MAX_SIZE : 100% x 370px OR width="100%" height="370px" -->
	
	<iframe
		 src="https://www.youtube.com/embed/V_qXEYnjYr0"> 
	</iframe>
	
	</div>
	</a>
	<div class="iframe_op noselect" >
		<div class="feedback noselect" >
			<div class="part1 noselect" >
				<a onClick="click_to_login(); loginfakeanime('<?php echo $pdbp; ?>','like');" >
				<img title="<?php echo ucfirst(lang('like', $_lang, 2)).' '.lang('this', $_lang, 1); ?>" id="imglikeifrm<?php echo $pdbp; ?>" src="../image/internal_icon/v1/like<?php echo $like_icncliked; ?>-post.png" width="17px" height="17px" />
				</a>
				<div><input id="framelikelabel<?php echo $pdbp; ?>" type="text" value="<?php echo $like_v1; ?>" readonly="readonly" ></div>
			</div>
			<div class="part2 noselect" >
				<a onClick="click_to_login(); loginfakeanime('<?php echo $pdbp; ?>','deslike');" >
				<img title="<?php echo ucfirst(lang('deslike', $_lang, 0)).' '.lang('this', $_lang, 1); ?>" id="imgdeslikeifrm<?php echo $pdbp; ?>" src="../image/internal_icon/v1/deslike<?php echo $deslike_icncliked; ?>-post.png" width="17px" height="17px" />
				</a>
				<div><input id="framedeslikelabel<?php echo $pdbp; ?>" type="text" value="<?php echo $deslike_v1; ?>" readonly="readonly" ></div>
			</div>
		</div>
			<div class="ranktype noselect" id="ranktype<?php echo $pdbp;?>" onclick="gobackpage('/home/');  location.href='<?php echo '/tag/?c='.$code_tag_v1; ?>';" >
				<center><p><span ><?php echo ucfirst($tagname_v1); ?></span></p></center>
			</div>
		<?php if($row['color']!=''){ ?> <style>.iframe_op #ranktype<?php echo $pdbp;?>{background-color:<?php echo $row['color']; ?>;}</style> <?php } ?>
		<div class="reply noselect" >
			<img onClick="location.href='<?php echo $urlsite.$post_code_v1.'#replay'; ?>'" src="../image/internal_icon/v1/replyicon0.png" width="23px" height="23px" />
		</div>
		<div class="user noselect" >
			<div class="mylogo" >
				<img src="<?php echo $photo_v1; ?>" width="25px" height="25px" />
			</div>
			<div class="infouser noselect" >
				<div class="name noselect" >
				<span>
				<a onclick="gobackpage('/home/');  location.href='<?php echo $_SERVER["DOCUMENT_ROOT"].'/profile/?user='.$user_v1; ?>';" >
				<?php echo AutoShrtName($name_v1, 30); ?>
				</a>
				</span>
				<?php if($row['userverify']==1){ ?>
					<img class="icncheck noselect" src="../image/internal_icon/v1/user-checked-ico-xv.png" />
				<?php } ?>
				</div>
				<span ><strong ><span id="frameviewlabel<?php echo $pdbp; ?>" ><?php echo $views_v1; ?></span></strong> <?php echo $views_txt_v1; ?></span>
			</div>
		</div>
	</div>
</div>

<?php } ?>

																<?php }else{ echo"<div class='iframe_main' ></div>"; }?>