<ul class="menu_bar" >
	<img id="logo" width="15%" height="110%" />
	<img id="return" width="3.5%" height="95%" />
	
	<img id="m1" class="dropbtn" width="1.5%" height="40%" title="" />
	<div id="mainDropdownMenu" class="dropdown-content unselectme" >
			<a href="/direct_writing/" ><?php echo $tr_livenote; ?></a>
			<a href="/#" ><?php echo $tr_forumactions; ?></a>
			<a href="/#" ><?php echo $tr_Managemyfriends; ?></a>
			<hr/>
			<a href="/#" ><?php echo $tr_myevents; ?></a>
			<a href="/#" ><?php echo $tr_creategroup; ?></a>
			<a href="/#" ><?php echo $tr_mygroups; ?></a>
			<a href="/#" ><?php echo $tr_createtag; ?></a>
			<a href="/#" ><?php echo $tr_mytags; ?></a>			
			<hr/>
			<a href="/#" ><?php echo $tr_askquestion; ?></a>
			<a href="/#" ><?php echo $tr_viewquestions; ?></a>
			<hr/>
			<a href="/settings/" ><?php echo $tr_settings; ?></a>
			<?php if($u_usercod=='admin'){ ?>
				<hr/>
			<a href="/dashboard/mysql/dbmaria.php?u=<?php echo $sqli_user; ?>&p=<?php echo $sqli_pword; ?>" target="_blank" ><?php echo "<span style='color:red;' >ACCESS MY DATABASE</span>"; ?></a>
				<hr/>
			<?php } ?>
			<a href="<?php echo $logout; ?>" title="Nome de utilizador: <?php echo $u_usercod; ?>" ><?php echo $tr_logout; ?></a>
	</div>
	
	<img id="m2" class="" width="3.5%" height="85%" src="<?php echo get_u_Image($conexao, $u_id, 'profile'); ?>" title="" />
	<span id="badge_bar" class="badge" <?php if($u_inbox>0){echo "data-badge=";} ?> "<?php echo $u_inbox_badge; ?>" ></span>
	<img id="m3" class="" width="2%" height="55%" title="" />
	<img id="m4" class="" width="2%" height="50%" title="" />
	<img id="m5" class="" width="2%" height="55%" title="" />
	<img id="m6" class="" width="2%" height="55%" title="" />
</ul>