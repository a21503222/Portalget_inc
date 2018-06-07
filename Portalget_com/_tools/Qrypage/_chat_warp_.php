<?php include_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/db.php"); ?>
<?php include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/logged_user.php"); ?>

<?php
	
	$F_unk_photo = "https://i2.wp.com/rafabarbosa.com/wp-content/uploads/2009/08/27-mclovin-lgl.jpg";
	
	//IDs - status - writing - notfy - power
	
	/* 	1 - "29!4:12,0,"
		2 - "29!4:12,30!1:12,"
		3 - "29!4:12,30!1:12,31!4,"
		4 - "29!4:12,30!1:12,31!4,32!2,"
		5 - "29!4:12,30!1:12,31!4,32!2,33!2,"
		...*/
	
	$F_unk_ids = "29!4:12,30!4:12,31!4,32!1,30!4:12,31!4:0,32!4:0,";
	
	$F_unk_ids_size = substr_count($F_unk_ids, ','); if($F_unk_ids_size>2){ $F_unk_ids_szA = 1;}else{ $F_unk_ids_szA = 0;} 
	$tmpID_u_1 = explode(',', $F_unk_ids )[$F_unk_ids_size-$F_unk_ids_szA];
	$tmpID_u_2 = explode(',', $F_unk_ids )[($F_unk_ids_size-1)-$F_unk_ids_szA];
	$tmpID_u_3 = explode(',', $F_unk_ids )[($F_unk_ids_size-2)-$F_unk_ids_szA];
	
	$F_unk_data = array(
		array(explode('!', explode(':', $tmpID_u_3 )[0])[0],status(userData($conexao,explode('!', explode(':', $tmpID_u_3 )[0])[0], 'status')),0,newMessageSys($conexao, explode('!', explode(':', $tmpID_u_3 )[0])[0], 'chat'),gnrWnChtAto($F_unk_ids_size,0, explode('!', explode(':', $tmpID_u_3 )[0])[1])),
		array(explode('!', explode(':', $tmpID_u_2 )[0])[0],status(userData($conexao,explode('!', explode(':', $tmpID_u_2 )[0])[0], 'status')),0,newMessageSys($conexao, explode('!', explode(':', $tmpID_u_2 )[0])[0], 'chat'),gnrWnChtAto($F_unk_ids_size,1, explode('!', explode(':', $tmpID_u_2 )[0])[1])),
		array(explode('!', explode(':', $tmpID_u_1 )[0])[0],status(userData($conexao,explode('!', explode(':', $tmpID_u_1 )[0])[0], 'status')),0,newMessageSys($conexao, explode('!', explode(':', $tmpID_u_1 )[0])[0], 'chat'),gnrWnChtAto($F_unk_ids_size,2, explode('!', explode(':', $tmpID_u_1 )[0])[1]))
	);
	
	function gnrWnChtAto($x, $p, $v){
		if($p==0){
			if($x>0){
				return $v;
			}else{ return 0; }
		}
		if($p==1){
			if($x-1>0){
				return $v;
			}else{ return 0; }
		}
		if($p==2){
			if($x-2>0){
				return $v;
			}else{ return 0; }
		}
		return 0;
	}
?>
<!-- CHAT WINDOWS -->
							<?php if($_GET['mode']=='o' && $_GET['p'] == '1'){ ?>
							<!--- CLOSED CHAT --->
							<div class="clearfix grpelem" id="u28526" style="background-color:transparent;" >
							 <div class="rounded-corners clearfix grpelem" id="u28527" >
							  <div class="rounded-corners clearfix grpelem warp_s3243" id="u28528" >
							   <div class="rounded-corners grpelem" id="u28529" ></div>
							   <div class="clearfix grpelem" id="pu28530-4"  >
								<div class="clearfix grpelem" id="u28530-4" >
								 <p></p>
								</div>

									<div class="rounded-corners grpelem" id="u28756" ></div>
									<div class="clearfix grpelem" id="u28757-4" >
									 <p><span id="u28757" ><?php echo $F_unk_data[0][3]; ?></span></p>
									</div>

							   </div>
							   <div class="museBGSize grpelem" id="u28531" ></div>
							  </div>
							 </div>
							</div>
							<!--- CLOSED CHAT --->
							<?php } ?>
							
							<!-- MY CHAT1 -->
							
							<!-- MY CHAT2 -->

							<?php if($_GET['mode']=='o' && $_GET['p'] == '2'){ ?>
							<!--- CLOSED CHAT --->
							<div class="clearfix grpelem" id="u28638" style="background-color:transparent;" >
							 <div class="rounded-corners clearfix grpelem" id="u28639" >
							  <div class="rounded-corners clearfix grpelem warp_s3243" id="u28640" >
							   <div class="rounded-corners grpelem" id="u28641" ></div>
							   <div class="clearfix grpelem" id="pu28642-4" >
								<div class="clearfix grpelem" id="u28530-4" >
								 <p></p>
								</div>
								<?php if($F_unk_data[1][3]!=0){ ?>
								<div class="rounded-corners grpelem" id="u28758" ></div>
								<div class="clearfix grpelem" id="u28759-4" >
								 <p><span id="u28759" ></span></p>
								</div>
								<?php } ?>
							   </div>
							   <div class="museBGSize grpelem" id="u28643" ></div>
							  </div>
							 </div>
							</div>
							<!--- CLOSED CHAT --->
							<?php } ?>
							
							<!-- MY CHAT2 -->
							
							
							<!-- MY CHAT3 -->
							
							<?php if($_GET['mode']=='o' && $_GET['p'] == '3'){ ?>
							<!--- CLOSED CHAT --->
							<div class="clearfix grpelem" id="u28750" style="background-color:transparent;" >
							 <div class="rounded-corners clearfix grpelem" id="u28751" >
							  <div class="rounded-corners clearfix grpelem warp_s3243" id="u28752" > <!-- &&&&&&&&& -->
							   <div class="rounded-corners grpelem" id="u28753" ></div>
							   <div class="clearfix grpelem" id="pu28754-4" >
								<div class="clearfix grpelem" id="u28754-4" >
								 <p></p>
								</div>
								<?php if($F_unk_data[2][3]!=0){ ?>
									<div class="rounded-corners grpelem" id="u28760" ></div>
									<div class="clearfix grpelem" id="u28761-4" >
									 <p><span id="u28761" ></span></p>
									</div>
								<?php } ?>
							   </div>
							   <div class="museBGSize grpelem" id="u28755" ></div>
							  </div>
							 </div>
							</div>
							<!--- CLOSED CHAT --->
							<?php } ?>
							
							<!-- MY CHAT3 -->
							
							<?php if($_GET['p'] == '4'){ ?>
												<?php $F_unk_ids = $_GET['data']; $F_unk_ids_size = substr_count($F_unk_ids, ',');?>
												<?php for($i=$F_unk_ids_size-4;$i>=0;$i--){ ?>
												   <div class="warp_chat_2ndPln" >
                                                                                                       <?php $tmpID_u_N = explode(',', $F_unk_ids )[$i]; ?>
                                                                                                       <div class="labelBody" id="bar<?php echo $i; ?>" >
													
														<p><img src="https://portalget.com/src/images/remove-white-u28424-fr.png" width="10px" height="10px" ></img><?php echo '&nbsp; '.AutoShrtName(userData($conexao,explode('!', explode(':', $tmpID_u_N )[0]  )[0],'name'),18); ?><div style="float:right; margin-top:-18px;" >(<?php echo newMessageSys($conexao, explode(':', $tmpID_u_N )[0], 'chat'); ?>)</div></p>
													</div>
												   </div>
												<?php } ?>
							<?php } ?>