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
			<?php echo ucfirst($post_title_v1); ?>
			</a>
			</span>		
			<img class="noselect" onClick="menuClickFramev1('dropd_ifr_opt_v1_a', '<?php echo $pdbp; ?>');" style="padding-left:2.7%;" src="../image/internal_icon/v1/menuvertical0.png" width="20px" height="25px" id="btnopifrmv<?php echo $pdbp; ?>" onmouseover="mouseOnHover('btnopifrmv<?php echo $pdbp; ?>', 'menuvertical1');" onmouseout="mouseOnHover('btnopifrmv<?php echo $pdbp; ?>', 'menuvertical0');" />
			<div style="position:relative; float:right; left:-150px;" >
				<div class="dropd_ifr_opt_v1_a noselect" id="dropd_ifr_opt_v1_a<?php echo $pdbp; ?>" >
					<ul>
						<li><a><?php echo ucfirst(lang('add', $_lang, 1)).' '.lang('to', $_lang, 2).' '.lang('favorites', $_lang, 0); ?></a></li>
						<li><a><?php echo ucfirst(lang('hide', $_lang, 1)).' '.lang('publication', $_lang, 0); ?></a></li>
						<li><a><?php echo ucfirst(lang('download', $_lang, 1)); ?></a></li>
						<li><a><?php echo ucfirst(lang('report', $_lang, 1)); ?></a></li>
						<li onClick="menuClickFramev1('div_share_box_v1_a', '<?php echo $pdbp; ?>');" ><a><?php echo ucfirst(lang('share', $_lang, 1)); ?></a></li>
						<?php if($myid_v1==$u_id){ ?>
						<li><a><?php echo ucfirst(lang('edit', $_lang, 1)); ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="iframe_desc" >
		<div class="jstfy" >
			<span ><?php echo ucfirst($post_description_v1); ?></span>
		</div>
	</div>
	<a onClick="clikcrate('view', '<?php echo $post_code_v1; ?>', '<?php echo $pdbp; ?>');" >
	<div class="iframe_area noselect" > <!-- MAX_SIZE : 100% x 370px OR width="100%" height="370px" -->
	
	<?php if($iframe_url_link_src!=''){ ?>
	<iframe src="<?php echo $iframe_url_link_src; ?>" ></iframe>
	<?php } ?>
	
	<?php if($img_url_link_src!=''){ ?>
	<img src="<?php echo $img_url_link_src; ?>" width="100%" height="365px" ></img>
	<?php } ?>
	
	<?php if($txt_url_link_src!=''){ ?>
	<div class="iframe_text_code" ><?php echo getColorCoderNote_v01($txt_url_link_src); ?></div>
	<?php } ?>
	
	
	</div>
	</a>
	<div class="iframe_op noselect" >
		<div class="feedback noselect" >
			<div class="part1 noselect" >
				<a onClick="clikcrate('like', '<?php echo $post_code_v1; ?>', '<?php echo $pdbp; ?>'); " >
				<img title="<?php echo ucfirst(lang('like', $_lang, 2)).' '.lang('this', $_lang, 1); ?>" id="imglikeifrm<?php echo $pdbp; ?>" src="../image/internal_icon/v1/like<?php echo $like_icncliked; ?>-post.png" width="17px" height="17px" />
				</a>
				<div><input id="framelikelabel<?php echo $pdbp; ?>" type="text" value="<?php echo $like_v1; ?>" readonly="readonly" ></div>
			</div>
			<div class="part2 noselect" >
				<a onClick="clikcrate('deslike', '<?php echo $post_code_v1; ?>', '<?php echo $pdbp; ?>'); " >
				<img title="<?php echo ucfirst(lang('deslike', $_lang, 0)).' '.lang('this', $_lang, 1); ?>" id="imgdeslikeifrm<?php echo $pdbp; ?>" src="../image/internal_icon/v1/deslike<?php echo $deslike_icncliked; ?>-post.png" width="17px" height="17px" />
				</a>
				<div><input id="framedeslikelabel<?php echo $pdbp; ?>" type="text" value="<?php echo $deslike_v1; ?>" readonly="readonly" ></div>
			</div>
		</div>
			<div class="ranktype noselect" id="ranktype<?php echo $pdbp;?>" onclick="hrefSmart('/home/', '<?php echo $code_tag_v1; ?>', 1);" >
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
				<a onclick="hrefSmart('/home/', '<?php echo $user_v1; ?>', 0);" >
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