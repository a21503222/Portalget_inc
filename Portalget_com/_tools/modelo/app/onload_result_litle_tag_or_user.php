<?php include_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/db.php"); ?>
<?php include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/logged_user.php"); ?>

<?php
$lang = explode(".", $_COOKIE['_sy'] )[1];
$u_id = explode(".", $_COOKIE['_sy'] )[0];
$i=0;
//if(explode(".", $_COOKIE['_rank'] )[2]==''){$sys_trd_tab='';}else{$sys_trd_tab=explode(".", $_COOKIE['_rank'] )[2];}
//if(explode(".", $_COOKIE['_rank'] )[1]==''){$sys_sec_tab='tag';}else{$sys_sec_tab=explode(".", $_COOKIE['_rank'] )[1];}
//if(explode(".", $_COOKIE['_rank'] )[0]==''){$sys_fst_tab='recent';}else{$sys_fst_tab=explode(".", $_COOKIE['_rank'] )[0];}
?>

<?php if( $_GET['mode'] == 'tag'){ ?>

<?php
$sql5 = mysqli_query ($conexao, "SELECT id_tag FROM vw_relationtag WHERE id_user = '".$u_id."' ORDER BY in_order ASC");
while ($row5 = mysqli_fetch_array($sql5)){ $i++;
?>

<?php
$sq = mysqli_query ($conexao, "SELECT * FROM vw_tag WHERE id=".$row5['id_tag']." ");  $c=0;
while ($inrow = mysqli_fetch_array($sq)){
?>
<?php
$t_name=$inrow['name'];
$t_code=$inrow['code'];
?>
<div class="clearfix unselect grpelem positnA<?php echo $i; ?>" id="u16873" onClick="onTagClick(this,'<?php echo $i; ?>');" >
<input type="hidden" id="getValue" value="<?php echo $t_code; ?>">
<div class="museBGSize grpelem positnB<?php echo $i; ?>" id="u16874" ></div>
<div class="clearfix grpelem positnC<?php echo $i; ?>" id="u16875-4" >
<p ><?php echo $t_name; ?></p>
</div>
<div class="grpelem positnD<?php echo $i; ?>" id="u16876" ></div>
</div>

<?php }} ?>

<?php } ?>

<!-- OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO --->
<?php if( $_GET['mode'] == 'people'){ ?>
<?php
$sql = mysqli_query ($conexao, "SELECT friend FROM vw_idmyfriends WHERE id = ".$u_id." ORDER BY ordened DESC");
while ($row = mysqli_fetch_array($sql)){
$i = $row['friend'];
    $sql2 = mysqli_query ($conexao, "SELECT * FROM vw_user WHERE id = ".$row['friend']." ");
    while ($row2 = mysqli_fetch_array($sql2)){
            $name = $row2['name'];
            $user = $row2['usercod'];
            $photo = $row2['photo'];
            $status = $row2['line'];
?>
<div class="clearfix grpelem unselect" id="u12077" onClick="GET_chat('<?php echo $i; ?>');" >
<div class="clearfix grpelem" id="u12088-4" >
<p><?php echo AutoShrtName($name,23).'#'.$row['friend']; ?></p>
</div>
<div class="clearfix grpelem" id="u12094-4" >
<p><?php echo desctime($conexao, $id, $i); ?></p>
</div>
<?php
if(!getimagesize($photo)){$t_tag='div';$photo="";}else{$t_tag='img';$photo=" src='".$photo."' ";}
?>
<<?php echo $t_tag; ?>  class="museBGSize rounded-corners grpelem" id="u12080" <?php echo $photo; ?>  ></<?php echo $t_tag; ?>> <!-- My photo user -->
<div class="clearfix grpelem" id="u12097" >
<div class="rounded-corners grpelem" id="u12091" style="background-color:<?php echo status($status); ?>;" ></div>
</div>
</div>
<?php }} ?>

<?php }