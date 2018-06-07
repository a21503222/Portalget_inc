<?php
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
include($_SERVER["DOCUMENT_ROOT"]."/_lang/index.php");
include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

$lang = explode(".", $_COOKIE['_sy'] )[1];
$myTags = explode(".", $_COOKIE['_sy'] )[2];
//$editMod = explode(".", $_COOKIE['_rnk'] )[3];
$u_id = explode(".", $_COOKIE['_sy'] )[0];
//$pagetab = explode(".", $_COOKIE['_rnk'] )[0];
$i=0;
?>

<?php if( $_GET['_type'] == 'tag'){ ?>
	
	<?php $sq = mysqli_query ($conexao, "SELECT * FROM vw_tag WHERE name LIKE '%".$_GET['q']."%' ");  $i=0; ?>
	<?php while ($inrow = mysqli_fetch_array($sq)){  ?>
	
			<?php
			$t_name=$inrow['name'];
			$t_code=$inrow['code'];
			?>
	
			<div class="clearfix grpelem positnA<?php echo $i; ?>" id="u16873" onClick="onTagClick(this,'<?php echo $i; ?>');" >
			<input type="hidden" id="getValue" value="<?php echo $t_code; ?>">
			<div class="museBGSize grpelem positnB<?php echo $i; ?>" id="u16874" ></div>
			<div class="clearfix grpelem positnC<?php echo $i; ?>" id="u16875-4" >
			<p ><?php echo $t_name; ?></p>
			</div>
			<div class="grpelem positnD<?php echo $i; ?>" id="u16876" ></div>
			</div>
			
	<?php $i++; ?>
	<?php } ?>	<!-- FIM WHILE -->
		
<?php } ?>

<!-- OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO --->

<?php if( $_GET['_type'] == 'people'){ ?>

<ul>
		
		<?php $sql = mysqli_query ($conexao, "SELECT friend FROM vw_idmyfriends WHERE id = ".$u_id." "); ?>
		<?php while ($row = mysqli_fetch_array($sql)){ ?>
			
			<?php $sql2 = mysqli_query ($conexao, "SELECT * FROM vw_user WHERE id = ".$row['friend']." AND name  LIKE '%".$_GET['q']."%' OR id = ".$row['friend']." AND usercod  LIKE '%".$_GET['q']."%' "); ?>
			<?php while ($row2 = mysqli_fetch_array($sql2)){ ?>
			
			
	<?php
	$name_user = $row2['name'];
	$username_user = $row2['usercod'];
	$photo_user = $row2['photo'];
	
	if($row2['line'] == '1'){$icostats = "online";
	}else if($row2['line'] == 'o'){ $icostats = "busy";
	}else if($row2['line'] == 'a'){ $icostats = "ausent";
	}else{ $icostats = "offline"; }
	
	if(strlen($photo_user)<=7){ $photo_user = "../image/internal_icon/".explode("*", $_COOKIE['_d095'] )[7]."/m2.png"; } 
	?>
		
 <li>
	<a onclick="location.href='/profile/?u=<?php echo $username_user; ?>'" class="PEPL_t1_v1" 
	title="<?php echo AutoShrtName($name_user, 30); ?>" >
	<img src="<?php echo $photo_user; ?>" width="18.5px" height="18.5px" />
	<span ><?php echo AutoShrtName($name_user, 27); ?></span>
	
	<div class="PEPL_t2_v1" >
		<?php if($editMod=='editing'){ ?>
		<img src="../image/internal_icon/<?php echo explode("*", $_COOKIE['_d095'] )[7]; ?>/menuvertical0.png" width='15px' height="15px" />
		<?php }else{ ?>
		<img class="disp" src="../image/internal_icon/<?php echo explode("*", $_COOKIE['_d095'] )[7]; ?>/<?php echo $icostats; ?>circle48.png" width='8px' height="8px" />
		<?php } ?>
	</div>
	</a>
 </li>
			
			
			<?php }?>
	<?php } ?>
	
</ul>

<?php } ?>