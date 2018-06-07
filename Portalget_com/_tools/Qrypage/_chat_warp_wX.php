<?php require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/db.php"); ?>
<?php require_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php"); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/_tools/php/includes/logged_user.php"); ?>
<?php
function Myntfy($cx, $id, $ty){
	$x = 2;
		
	if($x>20){$x='+20';}
	return $x;
}

function AdvancedDecode($x){
		$txt='';
		$arr_id = array();
		$arr_ps = array();
		$k=0;
		for($i=0;$i<substr_count($x, '<o:')*2;$i++){
			if($i%2==0){
				$arr_id[$k]=explode(':',explode('>',$x)[$i])[1];
				$k++;
			}
		}
		for($h=0;$h<count($arr_id);$h++){
			if(!isset($arr_ps[ $arr_id[$h] ])){$arr_ps[ $arr_id[$h] ]=0;}
			if($arr_ps[ $arr_id[$h] ]>0){$i=$arr_ps[ $arr_id[$h] ];}else{$i=0;}
			if(explode('<o:'.$arr_id[$h].'>', explode('<c:'.$arr_id[$h].'>' , explode('<c:'.$arr_id[$h].'>',$x)[$i] )[0])[1]!=''){
                            $cnt_txt = base64_decode(explode('<o:'.$arr_id[$h].'>', explode('<c:'.$arr_id[$h].'>' , explode('<c:'.$arr_id[$h].'>',$x)[$i] )[0])[1]);
                            if( $arr_id[$h] == 'SYS' ){
				$txt = $txt . ('<o:'.$arr_id[$h].'>'.  'ha '  . time_elapsed_string(  $cnt_txt   )   .'<c:'.$arr_id[$h].'>');
                            }else{
                                if(@is_array(getimagesize($cnt_txt))){
                                    $txt = $txt . ('<o:'.$arr_id[$h].'>'.    "<img width='50px' height='50px' src='" . $cnt_txt ."' >"   .'<c:'.$arr_id[$h].'>');
                                }else if(  filter_var($cnt_txt, FILTER_VALIDATE_URL)){
                                   $txt = $txt . ('<o:'.$arr_id[$h].'>'.    "<a href='$cnt_txt' target='_blank' >".get_title($cnt_txt)."</a><br/><br/><span style='display:inline-block; width:130px;' >url: ".$cnt_txt."</span>"   .'<c:'.$arr_id[$h].'>');
                                }else if( $cnt_txt =='lol' ){
                                   $txt = $txt . ('<o:'.$arr_id[$h].'>'.    "<span style='font-size:50px;' >😃</span>"   .'<c:'.$arr_id[$h].'>');
                                }else {
                                    $txt = $txt . ('<o:'.$arr_id[$h].'>'.    ""    .  $cnt_txt .   ""    .'<c:'.$arr_id[$h].'>');
                                }
                                
                            }    
                                
			}
			$arr_ps[ $arr_id[$h] ] = $arr_ps[ $arr_id[$h] ] + 1;
		}
		$k=0; $str='';
		for($i=0;$i<strlen($txt);$i++){
			if(substr($txt,$i,2)=='\n'){
				$k=0;
				$str = $str . htmlspecialchars_decode('<br/>');
			}else{ $str = $str . htmlspecialchars_decode(substr($txt,$i,1)); $k++; }
		}
		$str=str_replace('n⤶','',$str);
	return $str;
}


function modfyTextDec($x){
	$x=str_replace('%3C','<',$x);
	$x=str_replace('%24','$',$x);
	$x=str_replace('%3B',';',$x);
	$x=str_replace('%3F','?',$x);
	$x=str_replace('%3E','>',$x);
	
	return $x;
}

function get_title($url){
  $str = file_get_contents($url);
  if(strlen($str)>0){
    $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
    if(isset($title[1]))return ucfirst($title[1]);
    
  }
    $url = ' ' . $url;
    $ini = strpos($url, '.');
    if ($ini == 0) return '';
    $ini += strlen('.');
    $len = strpos($url, '.', $ini) - $ini;
    return ucfirst(substr($url, $ini, $len));
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'ano',
        'm' => 'mês',
        'w' => 'semana',
        'd' => 'dia',
        'h' => 'hora',
        'i' => 'minuto',
        's' => 'segundo',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' atrás' : 'agora';
}

function TxtChat_givelife($cx, $x, $arr){
	$x = AdvancedDecode($x);
	$x = modfyTextDec($x);
	$id=explode(".", $_COOKIE['_sy'] )[0];
	$A='<o:'.$id.'>';
	$B='<c:'.$id.'>';
	$T='<o:'.'SYS'.'>';
	$V='<c:'.'SYS'.'>';
	$pht=userData($cx, $id, 'photo');
	if($pht!=''){$tg='img';}else{$tg='div';}
	$P="<div class='clearfix colelem' id='pu28412' style='margin-bottom:5px;' > ";
	$P=$P."<div class='rounded-corners clearfix grpelem' id='u28412' > ";
	$P=$P."<div class='clearfix grpelem' id='u28415-4' ><p> ";
	$x = str_replace($A,$P,$x); $P='';
	$P=$P."</p></div></div> ";
	
	//$P=$P."<".$tg." class='museBGSize rounded-corners grpelem unselect cht_id".$id."code' id='u28419' src='".$pht."' ></".$tg."> ";
	
	
	$P=$P."<div class='PamphletWidget clearfix grpelem' id='pamphletu28466' > ";
	$P=$P."<div class='popup_anchor' id='u28475popup' > ";
	$P=$P."<div class='ContainerGroup clearfix' id='u28475' > ";
	$P=$P."<div class='Container invi clearfix grpelem' ></div> ";
	$P=$P."</div></div><div class='ThumbGroup clearfix grpelem' id='u28471' > ";
	$P=$P."<div class='popup_anchor' id='u28472popup' > ";
	$P=$P."<div class='Thumb popup_element rounded-corners' id='u28472' ></div> ";
	$P=$P."</div></div></div></div> ";
	$x = str_replace($B,$P,$x); $P='';
	
	$n=substr_count($arr, ':');
	for($i=0;$i<$n;$i++){
		$A='<o:'.explode(':', explode(':',$arr)[$i])[0].'>';
		$B='<c:'.explode(':', explode(':',$arr)[$i])[0].'>';
		$pht=userData($cx, explode(':', explode(':',$arr)[$i])[0], 'photo');
		$sts=ClrStsByCode(userData($cx, explode(':', explode(':',$arr)[$i])[0], 'status'));
		if($pht!=''){$tg='img';}else{$tg='div';}
		$P=$P."<div class='clearfix colelem' id='pu28413' style='margin-bottom:5px'; > ";
		$P=$P."<div class='rounded-corners clearfix grpelem' id='u28413' > ";
		$P=$P."<div class='clearfix grpelem' id='u28416-4' ><p> ";
		$x = str_replace($A,$P,$x); $P='';
		$P="</p></div></div> ";
		
		$P=$P."<".$tg." class='museBGSize rounded-corners grpelem unselect cht_id".explode(':', explode(':',$arr)[$i])[0]."code' id='u28420' src='".$pht."' ></".$tg."> ";
		$P=$P."<div class='rounded-corners grpelem' id='u28429' style='background-color:".$sts.";' ></div> ";
		
		$P=$P."<div class='PamphletWidget clearfix grpelem' id='pamphletu28454' > ";
		$P=$P."<div class='popup_anchor' id='u28457popup' > ";
		$P=$P."<div class='ContainerGroup clearfix' id='u28457' > ";
		$P=$P."<div class='Container invi clearfix grpelem' ></div> ";
		$P=$P."</div></div><div class='ThumbGroup clearfix grpelem' id='u28464' > ";
		$P=$P."<div class='popup_anchor' id='u28465popup' > ";
		$P=$P."<div class='Thumb popup_element rounded-corners' id='u28465' ></div> ";
		$P=$P."</div></div></div></div> ";
		$x = str_replace($B,$P,$x); $P='';
	}
	
	$P=$P."<div class='clearfix colelem' id='u28414-4' ><p>";
	$x = str_replace($T,$P,$x); $P='';
	$P=$P."</p></div> ";
	$x = str_replace($V,$P,$x); $P='';
	
return $x;
}

function get_row_chat($cx,$U_FRND,$md){
	$U_THIS = explode(".", $_COOKIE['_sy'] )[0];
	$RLTN = "user_one_id=".$U_THIS." AND user_two_id=".$U_FRND." OR user_one_id=".$U_FRND." AND user_two_id=".$U_THIS;
	$SR = "";
	IF($md==1){
		$SQL=mysqli_query($cx,"SELECT * FROM tb_chat WHERE ".$RLTN);
		while($R=mysqli_fetch_array($SQL)){ $SR = $R['chat_text']; }
	}ELSE{
		$SQL=mysqli_query($cx,"SELECT * FROM tb_chat_mix WHERE CODEGROUP='".$U_FRND."'");
		while($R=mysqli_fetch_array($SQL)){ $SR = $R['chat_text']; }
	}
  return $SR;
}

function desc($x,$p){ $cat='';
	for($i=0;$i<strlen($x);$i++){
		$l=ord(substr($x,$i,1))+$p;
		$cat=$cat.chr($l);
	}
	$x=base64_decode(strrev($cat));
return $x;
}
?>

<?php if($_GET['mode']=='row'){ ?>
<?php setcookie('_chat_is_ready01', '1', time() + (86400 * 30), "/"); ?> <!-- Informa quando o chat estiver pronto -->

		<?php if( is_numeric (explode('!', $_GET['id'])[0]) == TRUE ){ ?>
	<?php echo TxtChat_givelife($conexao , get_row_chat($conexao,explode('!', $_GET['id'])[0] ,1) ,str_replace('!',':',$_GET['id']).':'); ?>
		<?php }else{ ?>
	<?php echo TxtChat_givelife($conexao , get_row_chat($conexao,explode('!', $_GET['id'])[0] ,0) ,userData($conexao,explode('!', $_GET['id'])[0],'memb')); ?>
		<?php } ?>

<?php } ?>

<?php if($_GET['mode']=='info'){ ?>
                <?php $tmpID_u_N = explode('!',explode(';', $_GET['data'] )[$_GET['pos']])[0]; ?>
                <?php $ids = $_GET['id']; ?>
		<?php echo AutoShrtName(userData($conexao,$ids,'name'),18).'#'.$ids; ?>:<?php echo ClrStsByCode(userData($conexao,$ids,'status')); ?>
<?php } ?>

<?php if($_GET['mode']=='leftover'){ ?>
	<?php $nn = substr_count($_GET['data'], '.'); ?>
	<?php for($i=-3;$i<$nn-6;$i++){ ?>
		<div class="warp_chat_2ndPln" >
                    <div class="labelBody" onclick="GET_chat('C3542432');" >
			<?php $tmpID_u_N = explode('!',explode('.', $_GET['data'] )[($nn/2)+$i])[0]; ?>
			<p><img onClick="LET_chat('<?php echo $tmpID_u_N; ?>',-1);" src="https://portalget.com/src/images/remove-white-u28424-fr.png" width="8px" height="8px" ></img><?php echo '&nbsp; '.AutoShrtName(userData($conexao,$tmpID_u_N,'name'),18); ?><div style="float:right; margin-top:-18px;" >(<?php echo Myntfy($conexao, $tmpID_u_N, 'chat'); ?>)</div></p>
                    </div>
		</div>
	<?php } ?>
<?php } ?>

<?php if($_GET['mode']=='leftover_count'){ ?>
            <?php
            $nn = substr_count($_GET['data'], '.');
            $k=0;
            for($i=-3;$i<$nn-6;$i++){
                    $tmpID_u_N = explode('!',explode('.', $_GET['data'] )[$i])[0];
                    $k=$k+Myntfy($conexao, $tmpID_u_N, 'chat');
            } 
            ?>
	<?php echo $k; ?>
<?php }