
<?php

$rnk = $rnk_Array = $_COOKIE['_rnk'];

if(explode(".", $rnk )[3]=='editing' ){$var_aetl="0";}else{$var_aetl="editing";}


include($_SERVER["DOCUMENT_ROOT"]."/_lang/index.php");

?>

<?php

$var_autoEditTabLeft = explode(".", $rnk_Array )[0].'.'.explode(".", $rnk_Array )[1].'.'.explode(".", $rnk_Array )[2].'.'.$var_aetl;

if(explode(".", $rnk_Array )[1] == 'tag'){$t="tag";}else{$t="people";}


?>


		<div style="position:absolute;" >
<a onClick="autosettab('tag', 0, 1);" ><span class="<?php if(explode(".", $rnk )[1]=='tag'){echo"set_tab_ative";}else{echo"set_tab_desative";}  ?> noselect" style="margin-right:20px;" ><?php echo ucfirst(lang('tags',$_lang,0)); ?></span></a>
<a onClick="autosettab('people', 0, 1);" ><span class="<?php if(explode(".", $rnk )[1]=='people'){echo"set_tab_ative";}else{echo"set_tab_desative";}  ?> noselect" ><?php echo ucfirst(lang('people',$_lang,0)); ?></span></a>
		</div>

		
		<div style="text-align:right;cursor: pointer;" >

<a onClick="autoEditTabLeft('<?php echo $var_autoEditTabLeft; ?>');" ><img src="../image/internal_icon/<?php echo explode("*", $_COOKIE['_d095'] )[7]; ?>/<?php if( explode(".", $rnk )[3] == 'editing'){echo"remove";}else{echo"setting";} ?>-ctl.png" id="img_sttg_chg" width="15" height="15" title="<?php echo ucfirst(lang('settings',$_lang,0)); ?>" /></a>
		</div>

	<div style="padding-top:50px;" ></div>
	
	
		<div style="width:100%;text-align:center;" >
		
<input class="inputtextlitle" id="textfieldsearchbase" type="text" 
onkeyup="autoEvntStatus('writing'); app_result_litle_regist(this.value, ''); 
autosaveQuery(this.value);" onblur="setTimeout(function(){ app_left_tab_auto(); }, 10); 
this.value = ''; app_result_litle_regist('', ''); autosaveQuery(this.value); autoEvntStatus('0');" 
maxlength="50" size="18.5" placeholder="" />

		</div>
		
		<div id="panel_warp_chat" >
			<hr/>
			
		<div style="padding-top:25px;" ></div>
			
			<!-- SHOW LIST RESULT --> <span id="app_result_litle_regist" ></span> <!-- SHOW LIST RESULT -->
			
		<div style="padding-top:50px;" ></div>
			
			<hr/>
		</div>

</div> <!-- CLOSE LEFT MAIN DIV -->

<style>.set_tab_ative{ color:<?php echo explode("*", $_COOKIE['_d095'] )[3]; ?>; background-color: <?php echo explode("*", $_COOKIE['_d095'] )[5]; ?>; }</style>
<style>.set_tab_desative{ color:<?php echo explode("*", $_COOKIE['_d095'] )[2]; ?>; background-color: <?php echo explode("*", $_COOKIE['_d095'] )[3]; ?>; }</style>