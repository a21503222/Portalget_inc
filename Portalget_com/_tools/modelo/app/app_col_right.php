<?php

include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
include($_SERVER["DOCUMENT_ROOT"]."/_lang/index.php");
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

$lang=explode(".",$_COOKIE['_sy'])[1];
$u_id=explode(".",$_COOKIE['_sy'])[0];

$i=0;

//if(explode(".", $_COOKIE['_rank'] )[2]==''){$sys_trd_tab='';}else{$sys_trd_tab=explode(".", $_COOKIE['_rank'] )[2];}
//if(explode(".", $_COOKIE['_rank'] )[1]==''){$sys_sec_tab='tag';}else{$sys_sec_tab=explode(".", $_COOKIE['_rank'] )[1];}
//if(explode(".", $_COOKIE['_rank'] )[0]==''){$sys_fst_tab='recent';}else{$sys_fst_tab=explode(".", $_COOKIE['_rank'] )[0];}

?>

<div class="RIGHT_MAIN_DIV" style="height:<?php echo $_COOKIE['_height']; ?>px;" >

<?php if(0==0){ ?>

<div class="pframe_ntf_t01" onmouseover="onLOGICALhover('1');" onmouseout="onLOGICALhover('0');" ><div class="letr_schl_hrs_main" ><?php echo $tr_myevents; ?></div>

	<ul>
		<?php
		$discipline="Análise de Matemática";
		$teacher="João Dias";
		$hrtimeB="11h30";
		$hrtimeA="09h30";
		$hrclassr="51";
		$hrcolordsp=""; //#FDFDC9
		for($i=0;$i<10;$i++){
		echo"<li>
				<div style='background-color:".$hrcolordsp.";' >".ucfirst(lang('class',$_lang,0)).' '.lang('of',$_lang,0)."&nbsp;<span>".$discipline."</span>&nbsp;
		".lang('with',$_lang,0)."&nbsp;".AutoShrtName(ucfirst(lang('teacher',$_lang,0)), 4).". <strong>".AutoShrtName($teacher,17)."</strong>&nbsp;".lang('of',$_lang,0)."&nbsp;".$hrtimeA."&nbsp;
				".lang('at',$_lang,1)."&nbsp;".$hrtimeB."<div>".ucfirst(lang('classroom',$_lang,0))."&nbsp;".$hrclassr."</div></div>
		</li>";
		}?>
	</ul>
	
</div>
													<hr id='tg_hr3' />
													
																							
<style>
.pframe_ntf_t01 ul{
	background-color:#f1f1f1;
	height:260px;
	overflow-y: scroll;
}

.pframe_ntf_t01 ul::-webkit-scrollbar {
    width: 2.5px;
}
.pframe_ntf_t01 ul::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px #c2d6e4;
}


#tg_hr3{ display: block; margin-left: -20px; margin-right: auto; }

.pframe_ntf_t01 li div {
	padding:1px;
	display:block;
	margin:0px 0px 3px 0px;
	padding:5px;
	background-color:#fff;
}

.pframe_ntf_t01 li div div{
	text-align:right;
	color:#a8a8a8;
	padding:3px 3px 1px 0px;
	background-color:transparent;
	display:block;
}

.pframe_ntf_t01 li div span{
	color:#96B9D1;
	display:block;
}


</style>															
											
<?php } ?>								

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
<?php


?>

<?php
	$limit_var_Rsh_sgt = 3; // DEFINA O LIMITE DE SUGUESTOES DE AMIZADE
	$EnableDivFriend='false';
	if(TB_Rship_Pendent_ID_to_Array($u_id)[4] <= $limit_var_Rsh_sgt ){$limit_Rsh_sgt = TB_Rship_Pendent_ID_to_Array($u_id)[4];}else{$limit_Rsh_sgt = $limit_var_Rsh_sgt; }
	
	if( $limit_Rsh_sgt >= 1){
?>						
	  
<div id="sticky2nd" class="pframe_ntf_t01 sticky2nd" style="background-color:#f1f1f1;" ><div class="letr_schl_hrs_main" ><? echo $tr_friendrequests[$lngCD]; ?></div>
<ul>


	
<?php

	for($i=0; $i< $limit_Rsh_sgt ; $i++){
		$EnableDivFriend = 'true';
		
		$frameWork_stsm = '';//'1'.'|'.explode("|", $_COOKIE['_framework'] )[1].'|'.explode("|", $_COOKIE['_framework'] )[2].'|'.explode("|", $_COOKIE['_framework'] )[3].'|'.explode("|", $_COOKIE['_framework'] )[4].'|';
		
		// enabledivfriends|
		$cfriend = str_replace(' ', '', explode("}", str_replace("{", '', TB_Rship_Pendent_ID_to_Array($u_id)[0])))[$i];
?>
	
	<?php
	$FRDStemp_photo = str_replace(' ', '', explode("}", str_replace("{", '', TB_Rship_Pendent_ID_to_Array($u_id)[3] )))[$i];
	$FRDStemp_name = explode("}", str_replace("{", '', TB_Rship_Pendent_ID_to_Array($u_id)[1] ))[$i];
	$FRDStemp_user = str_replace(' ', '', explode("}", str_replace("{", '', TB_Rship_Pendent_ID_to_Array($u_id)[2] )))[$i];
	$FRDStemp_ID = General_user_user_to_ID( $FRDStemp_user );
	$FRDStemp_info = explode("@|@", General_user_data_info_User_to_Array( $FRDStemp_user ))[6];
	if($FRDStemp_info == ''){$FRDStemp_info = explode("@|@", General_user_data_info_User_to_Array( $FRDStemp_user ))[5];}
	if($FRDStemp_info == ''){$FRDStemp_info = ucfirst($tr_unknown[$lngCD]);}
	?>
	
		<?php if(strlen($FRDStemp_name) > 25){ ?>
		<?php $FRDStemp_name = substr($FRDStemp_name, 0, 23) . '..'; ?>
		<?php } ?>
		<?php if(!getimagesize($FRDStemp_photo)){ $FRDStemp_photo = "../images/internal_icon/v1/m2.png"; } ?>
	
	<li><div class="" style="padding:5px; height:25px; background-color:#fff; margin-top:3px;" >
	
	<img src="<?php echo $FRDStemp_photo; ?>" width="25px" height="25px" />
	<div class="sgstfriendstemp_name" ><?php echo $FRDStemp_name; ?></div>
	
	<div class="sgstfriendstemp_userinfo" >
	<?php if($cfriend==0){$cfriend="";} echo $cfriend ; ?> <?php if($cfriend == 1){ ?>
	<?php echo $tr_commonfriend[$lngCD]; ?><?php }elseif($cfriend > 1){ ?>
	<?php echo $tr_mutualfriends[$lngCD]; ?><?php }else{ ?> 
	<?php echo $FRDStemp_info;?> <?php } ?>
	</div>
	<?php $contll++;?>
	
	<img onClick = "clickRegEventRLSH('<?php echo $contll; ?>', 'r', 'ce', '<?php echo $FRDStemp_ID; ?>')" onmouseover="clickRegEventRLSH('<?echo $contll;?>', 'r', 'oo', '<?php echo $frameWork_stsm; ?>')" onmouseout="clickRegEventRLSH('<?php echo $contll;?>', 'r', 'ou', '<?php echo $frameWork_stsm; ?>')" src="/images/internal_icon/v1/deleteiconuser_off.png"  id="sgstfriendstemp_remv<?php echo $contll;?>" class="sgstfriendstemp_remv" width="18px" height="18px" />
	<img onClick = "clickRegEventRLSH('<?php echo $contll; ?>', 'a', 'ce', '<?php echo $FRDStemp_ID; ?>')" onmouseover="clickRegEventRLSH('<?echo $contll;?>', 'a', 'oo', '<?php echo $frameWork_stsm; ?>')" onmouseout="clickRegEventRLSH('<?php echo $contll;?>', 'a', 'ou', '<?php echo $frameWork_stsm; ?>')" src="/images/internal_icon/v1/add-user-male-filled-50_desable.png" id="sgstfriendstemp_add<?php echo $contll;?>"  class="sgstfriendstemp_add" width="18px" height="18px" />

	</div></li>
	
	<?php } ?>
	
	
</ul>
			<hr/>
</div>
			<?php } ?>	


<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->

	<div class="footer_copyrigt sticky3trd" >
		<a href="#" ><span class="footer_copyrigt_text sticky" ><?php echo $tr_privacy[$lngCD]; ?></span></a> · <a href="#" ><span class="footer_copyrigt_text" ><?php echo $tr_terms[$lngCD]; ?></span></a> · <a href="#" ><span class="footer_copyrigt_text" ><?php echo $tr_cookies[$lngCD]; ?></span></a> · <a href="#" ><span class="footer_copyrigt_text" ><?php echo $tr_lng_Full[$lngCD]; ?> (<?php echo $tr_lng_Full_country[$lngCD]; ?>)</span></a> · <a href="#" ><span class="footer_copyrigt_text" ><?php echo $tr_more[$lngCD]; ?></span></a> <br/>
		<br/>
		Copyright 2017 &copy; Portalget, Inc.
		<p style="padding-top:5px;" ></p>
	</div>


</div>		<!-- CLOSE RIGHT MAIN DIV -->


<style>
.sgstfriendstemp_remv{float:right;cursor:pointer; padding:3px;}
.sgstfriendstemp_add{float:right;padding-right:5px;cursor:pointer;padding:3px;}
.sgstfriendstemp_userinfo{
	display:block;
	overflow:hidden;
	font-size:10px;
	position:absolute;
	margin-top:-13px;
	margin-left:28px;
}

.sgstfriendstemp_name{
	display:inline-block;
	top:-15px;
	position:relative;
	font-weight: bold;
	font-size:11.7px;
	cursor:pointer;
	display:inline;
	overflow:hidden;
}



.sticky1st { position: -webkit-sticky; position: sticky; top: 60px; }
.sticky2nd { position: -webkit-sticky; position: sticky; top: 290px; display:<?php if($EnableDivFriend == 'true'){$EnableDivFriend = "block";}else{$EnableDivFriend = "none";} ?>;}
.sticky3trd { position: -webkit-sticky; position: sticky; top: 450px; }

.footer_copyrigt_text { color:#000; }
.footer_copyrigt{ font-size: smaller; padding:5px;}
.footer_copyrigt a { text-decoration: none; }
.footer_copyrigt a:hover { text-decoration: underline; color:#000; }

.letr_schl_hrs_main{ text-align:center;color:#fff;font-size:15px; padding:5px 0px 5px 0px;background-color:#508AB2; }
.pframe_ntf_t01{
	width:110%;
	height:100px auto;
	background-color:#fff;
	margin: -10px 5px 5px -20px;
	z-index:5;
}
.pframe_vw_post_t1{
	width:110%;
	height:425px;
	background-color:#fff;
	border-style: solid;
    border-width: 1px;
	border-color: #f1f1f1;
	margin:-10px 5px 0px -20px;
}


</style>