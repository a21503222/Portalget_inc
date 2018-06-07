	<?php
		include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
		include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");
		include($_SERVER["DOCUMENT_ROOT"]."/_lang/package1.php");
	?>
	
	<?php
		$O_q = smartSEO($_GET['q']); if($O_q!=''){$f_nQ = 1;}else{$f_nQ = 0;}
		$NUM_q = substr_count($O_q,' ') + $f_nQ; // contar n palavras
		$str=$cx='';
	?>
	
	<?php
	$arr = array('post_title', 'post_description', 'post_URL');
	
	$ck=0;
	for($i=0;$i<$NUM_q;$i++){
		for($j=0;$j<count($arr);$j++){
			$sql = mysqli_query ($conexao, "SELECT * FROM tb_evpost WHERE ".$arr[$j]." 
			LIKE '%".explode(' ',$O_q)[$i]."%' AND SEO = '1' ");
			if(mysqli_num_rows($sql)>0){ $ck=1; }
		}
		if($ck==0 && str_replace(explode(' ',$O_q)[$i],'',$O_q)!='' ){ $O_q=str_replace(explode(' ',$O_q)[$i],'',$O_q); }
	}
	if(str_replace(' ', '', $O_q) ==''){$O_q=smartSEO($_GET['q']);}
	?>
		
	<?php		
	$str=$cx=' '; $sqli=0;
	$NUM_q = substr_count($O_q,' ') + $f_nQ;
	
		for($j=0;$j<count($arr);$j++){
			for($i=0;$i<$NUM_q;$i++){
				$sqli=1;
				if($i<$NUM_q-1){$cx='AND ';}else{$cx='';}
				$str = $str . $arr[$j] . " LIKE '%".explode(' ',$O_q)[$i]."%' AND SEO = '1' ".$cx;
				}
			if($j<count($arr)-1){$cx='UNION SELECT * FROM tb_evpost WHERE ';}else{$cx='';}
				$str = $str.$cx;
		}
		$sql = mysqli_query ($conexao, "SELECT * FROM tb_evpost WHERE ".$str);
	?>
	
	<div class="clearfix colelem" id="u18039-4"><!-- content -->
     <p>Cerca de <?php if($sqli!=0){ echo mysqli_num_rows($sql); }else{ echo '0'; } ?> resultados ( <span id="ld_pge_tm<?php if(mysqli_num_rows($sql)<=0){echo 'c';} ?>" >0</span> segundos)</p>
    </div>
	
	<?php if($sqli!=0){ ?>
	
	<?php while ($row = mysqli_fetch_array($sql)){ ?> <!--- RESULT LIST QUERY --->
	
    <div class="clearfix colelem" id="u18012-4" onClick="linkClickUser('<?php echo $row['post_URL']; ?>');" ><!-- content -->
     <p style="cursor:pointer;" ><?php echo $row['post_title']; ?></p>
    </div>
    <div class="clearfix colelem" id="u18018-4"><!-- content -->
     <p><?php echo $row['post_URL']; ?></p>
    </div>
    <div class="clearfix colelem" id="u18015-4"><!-- content -->
     <p><?php echo $row['post_description']; ?></p>
    </div>

	<!--- RESULT LIST QUERY ---> <?php }?> <!--- RESULT LIST QUERY --->
	
	<?php } ?>
	<?php if($sqli==0){ ?>
			<div class="museBGSize colelem" id="u18132" onClick="SeeMoreOpc();" ></div>
			<div class="clearfix colelem" id="u18143-4">
			 <p><span id="u18143" ></span></p>
			</div>
	<?php }else{ ?>
			<?php if(mysqli_num_rows($sql)>0){ ?>
				<?php if(1==1){ ?>
					<div class="museBGSize colelem" id="u18132" onClick="SeeMoreOpc();" ></div>
					<div class="clearfix colelem" id="u18143-4">
					 <p><span id="u18143b" >Continuar</span></p>
					</div>
				<?php }else{ ?>
					<div class="museBGSize colelem" id="u18132" onClick="SeeMoreOpc();" ></div>
					<div class="clearfix colelem" id="u18143-4">
					 <p><span id="u18143b" >Fim resultado!</span></p>
					</div>
				<?php } ?>
			<?php }else{ ?>
				<div class="museBGSize colelem" id="u18132" onClick="SeeMoreOpc();" ></div>
				<div class="clearfix colelem" id="u18143-4">
				 <p><span id="u18143" ></span></p>
				</div>

			<?php } ?>
	<?php } ?>