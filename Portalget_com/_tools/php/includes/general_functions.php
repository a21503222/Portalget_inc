<!-- HOME PAGE v8.2 -->

<?php

function surrogate_key($mod='inbox') {
    $url=$_SERVER["DOCUMENT_ROOT"]."/".$mod."/";
    $str=read_files($url.'surrogate.txt');
    add_files($url.'surrogate.txt',$str+1,'w+');
    return $str;
}

function next_inbox_key() {
    $url=$_SERVER["DOCUMENT_ROOT"]."/inbox/";
    $str=read_files($url.'newcode.txt');
    if( count(explode(';',$str)) > 0 ){
    $token = explode(';',$str)[0];
    add_files($url.'usecode.txt',$token.';');
    add_files($url.'newcode.txt',
    str_replace($token.';','',$str),'w+');
    return $token;
    }else{ return 0; }
}

function add_files($url, $string, $mode = '') {
    if($mode==''){ $mode='a+'; }
    $f = fopen($url,$mode);
    fwrite ($f, $string, strlen($string));
    fclose($f);return $string;
}

function read_files($url) {
    $f = fopen($url, 'r'); $buffer = '';
    while(!feof($f)) { $buffer = fread($f, 2048); }
    fclose($f);return $buffer;
}

function get_my_log(){
	$sk = $_COOKIE['_session_key_'];
	$pos='';$url="/_log/system/id_users_data/bin_data/temp/@_".explode(".", $_COOKIE['_sy'] )[0].".db";
	$url=$_SERVER['DOCUMENT_ROOT'].$url;
	b:
	if(file_exists($url)){
		for($i=0;$i<substr_count(read_files($url),']');$i++){
			if( explode("]", file($url)[$i] )[0] == $sk ){
				$pos = $i;
			}
		}
	}else{ goto a; }
	if($pos!=''){
		return substr( substr(explode("]",file($url)[$pos])[1], 0, -2), 1, -1 );
	}else{
		a:
		$str=$sk."] ".PHP_EOL;
		add_files($url, "%".time()."]".PHP_EOL);
		add_files($url, $str);
		goto b;
	}
}

function set_my_log($x){
	$url="/_log/system/id_users_data/bin_data/temp/@_".explode(".", $_COOKIE['_sy'] )[0].".db";
	$url=$_SERVER['DOCUMENT_ROOT'].$url; $sk = $_COOKIE['_session_key_'];
	$data = file($url);
	$out = array();
	foreach($data as $line) {
		if( trim($line) !=  $sk.']'.explode(']',trim($line))[1] ) {
			$out[] = $line;
		}else{
			$out[] = $sk.'] '.$x.' '. PHP_EOL;
		}
	}
	$fp = fopen($url, "w+");
	flock($fp, LOCK_EX);
	foreach($out as $line) {
		fwrite($fp, $line);
	}
	flock($fp, LOCK_UN);
	fclose($fp);
}

function Query_chat_recicle($cx,$U_THIS,$U_FRND) {
	$_char="";
	$RLTN = "user_one_id=".$U_THIS." AND user_two_id=".$U_FRND." OR user_one_id=".$U_FRND." AND user_two_id=".$U_THIS;
	if(is_numeric($U_THIS)==FALSE){
		$SQL=mysqli_query($cx,"SELECT * FROM tb_chat_mix WHERE CODEGROUP = '".$U_THIS."' ");
		while($R=mysqli_fetch_array($SQL)){$_char = $R['chat_text']; }
			if(strlen($_char)>4520*5){
			mysqli_query($cx, "UPDATE tb_chat_mix SET chat_text = '".remove_old_text($R['chat_text'],150)."' WHERE CODEGROUP='".$U_THIS."' ");
			}
	}else{
		$SQL=mysqli_query($cx,"SELECT * FROM tb_chat WHERE ".$RLTN);
		while($R=mysqli_fetch_array($SQL)){$_char = $R['chat_text']; }
			if(strlen($_char)>4520*5){
			mysqli_query($cx, "UPDATE tb_chat SET chat_text = '".remove_old_text($R['chat_text'],150)."' WHERE ".$RLTN);
			}
	}
}

function remove_old_text($s,$limt){
	$ck=0; $dd=$c=$c2=$c1=$c3='';
	for($i=0;$i<strlen($s);$i++){
	if($i<=$limt){$c=$c.substr($s,$i,1);}}$c1=$c;
	for($i=strlen($s);$i>=0;$i--){
	if(substr($c,$i,3)=='<o:'){$ck=1;
	}else{if($ck==0){ $dd = substr($c,$i,1) . $dd; }}}
	for($i=0;$i<strlen($c1)-strlen($dd)-1;$i++){
	$c3 = $c3.substr($c1,$i,1);}
	for($i=strlen($c3);$i<strlen($s);$i++){
	$c2 = $c2.substr($s,$i,1);}
return $c2;
}

function smartSEO($q){
	return $q;
}

function chatDesCriptosSS($x){
	$x = str_replace('%o:sys%', "<p><center class='sys' >", $x);
	$x = str_replace('%c:sys%', "</center></p>", $x);
	$x = str_replace('%o:me%', "<p class='me' >", $x);
	$x = str_replace('%c:me%', "</p>", $x);
	$x = str_replace('%o:unme%', "<p class='unme' >", $x);
	$x = str_replace('%c:unme%', "</p>", $x);
return $x;
}

function zip_encode($x){
	$x=str_replace('=','',$x);
return $x;
}

function remove_null_str($x){
	$x=str_replace('','',$x);
	$x=str_replace('<break/>','\n⤶',$x);
	$x=htmlspecialchars($x);
return $x;
}


function chat_emoticons($x){
	if(strlen($x)<10){
		$x=str_replace(':)','🙂',$x);
		$x=str_replace(';)','😉',$x);
		$x=str_replace(':*','😘',$x);
		$x=str_replace('(y)','👍',$x);
		$x=str_replace('(Y)','👍',$x);
	}
	return $x;
}

function temp_desc($str,$p){
	$x = "";
	for ($i=0;$i<strlen($str);$i++) {
		$x = $x . chr(ord(substr($str,$i,1))-$p);
	}
return $x;
}

function encr($x,$p){ $cat='';
	$x=base64_encode($x);
	for($i=0;$i<strlen($x);$i++){
		$l=ord(substr($x,$i,1))-$p;
		$cat=$cat.chr($l);
	}
return strrev($cat);
}

function ClrStsByCode($c){
	if($c=='1'){ return '#65dd02';
	}else if($c=='a'){ return '#f39c12';
	}else if($c=='o'){ return '#fe1901';
	}else{ return '#508ab2'; }
}

function status($c){
	if($c=='1'){ return '#8dd871';
	}else if($c=='a'){ return '#f39c12';
	}else if($c=='o'){ return '#d6555d';
	}else{ return '#9fbfd5'; }
}

function desctime($cx, $unk, $me){
	return 'ha 1 minuto atrás';
}


function userData($cx, $x, $ty){
	if(is_numeric($x)==TRUE){
		$s = mysqli_query ($cx, "SELECT * FROM tb_user WHERE id = ".$x);
	}else{ $s = mysqli_query ($cx, "SELECT * FROM tb_chat_mix WHERE CODEGROUP='".$x."' "); }
	while ($r = mysqli_fetch_array($s)){
		if($ty=='name'){
			return $r['name'];
		}else if($ty=='status'){
			return $r['line'];
		}else if($ty=='user'){
			return $r['usercod'];
		}else if($ty=='photo'){
			return $r['photo'];
		}else if($ty=='memb'){
			return $r['memb'];
		}
	}
}

function _chat_info_id($cx,$U_FRND,$ty){
	if(is_numeric($U_FRND)==TRUE){
	$U_THIS=explode(".", $_COOKIE['_sy'] )[0];
	$RLTN = "user_one_id=".$U_THIS." AND user_two_id=".$U_FRND." OR user_one_id=".$U_FRND." AND user_two_id=".$U_THIS;
	$s = mysqli_query ($cx, "SELECT * FROM tb_chat WHERE ".$RLTN);
	}else{
	$s = mysqli_query ($cx, "SELECT * FROM tb_chat_mix WHERE CODEGROUP=".$U_FRND);
	}
	while ($r = mysqli_fetch_array($s)){
		if(strlen($r[$ty])>0){
			return $r[$ty];
		}
	}
	return -1;
}

function ChatFrindsText($cx,$me,$unme){
	$s = mysqli_query($cx,"SELECT * FROM tb_chat WHERE user_one_id=".$me." AND user_two_id=".$unme." ");
	while($r=mysqli_fetch_array($s)){
		return $r['chat_text'];
	}
}
?>

<?php
$dir_root = $_SERVER["DOCUMENT_ROOT"];

function pg_lang($dlt){
error_reporting(E_WARNING);
include($_SERVER["DOCUMENT_ROOT"]."/_lang/index.php");

for($i=0; $i<substr_count($dlt,'@'); $i++){

$tg=explode("-tg:", explode(':tg', explode('@', $dlt)[$i])[0])[1];
$ty=explode("-ty:", explode(':ty', explode('@', $dlt)[$i])[0])[1];
$na=explode("-na:", explode(':na', explode('@', $dlt)[$i])[0])[1];
$cl=explode("-cl:", explode(':cl', explode('@', $dlt)[$i])[0])[1];
$id=explode("-id:", explode(':id', explode('@', $dlt)[$i])[0])[1];
$ph=explode("-ph:", explode(':ph', explode('@', $dlt)[$i])[0])[1];
$sz=explode("-sz:", explode(':sz', explode('@', $dlt)[$i])[0])[1];
$ml=explode("-ml:", explode(':ml', explode('@', $dlt)[$i])[0])[1];
$mp=explode("-mp:", explode(':mp', explode('@', $dlt)[$i])[0])[1];
$sc=explode("-sc:", explode(':sc', explode('@', $dlt)[$i])[0])[1];
$wh=explode("-wh:", explode(':wh', explode('@', $dlt)[$i])[0])[1];
$hh=explode("-hh:", explode(':hh', explode('@', $dlt)[$i])[0])[1];
$st=explode("-st:", explode(':st', explode('@', $dlt)[$i])[0])[1];
$ec=explode("-ec:", explode(':ec', explode('@', $dlt)[$i])[0])[1];
$vl=explode("-vl:", explode(':vl', explode('@', $dlt)[$i])[0])[1];
$hr=explode("-hr:", explode(':hr', explode('@', $dlt)[$i])[0])[1];
$ac=explode("-ac:", explode(':ac', explode('@', $dlt)[$i])[0])[1];
$tl=explode("-tl:", explode(':tl', explode('@', $dlt)[$i])[0])[1];
$end=explode("-end:", explode(':end', explode('@', $dlt)[$i])[0])[1];

$onchange=explode("-onchange:", explode(':onchange', explode('@', $dlt)[$i])[0])[1];
$onclick=explode("-onclick:", explode(':onclick', explode('@', $dlt)[$i])[0])[1];
$onfocus=explode("-onfocus:", explode(':onfocus', explode('@', $dlt)[$i])[0])[1];

if($ty!=''){ $ty="type='".$ty."'"; }
if($na!=''){ $na="name='".$na."'"; }
if($cl!=''){ $cl="class='".$cl."'"; }
if($id!=''){ $id="id='".$id."'"; }
if($ph!=''){ $ph="placeholder='".$ph."'"; }
if($vl!=''){ $vl="value='".$vl."'"; }
if($sz!=''){ $sz="size='".$sz."'"; }
if($ml!=''){ $ml="maxlength='".$ml."'"; }
if($mp!=''){ $mp="multiple='".$mp."'"; }
if($sc!=''){ $sc="src='".$sc."'"; }
if($wh!=''){ $wh="width='".$wh."'"; }
if($hh!=''){ $hh="height='".$hh."'"; }
if($st!=''){ $st="style='".$st.";'"; }
if($hr!=''){ $hr="href='".$hr.";'"; }
if($ac!=''){ $ac="accept='".$ac."'"; }
if($tl!=''){ $tl="href='".$tl.";'"; }

if($onchange!=''){ $onchange="onChange='".$onchange.";'"; }
if($onclick!=''){ $onclick="onClick='".$onclick.";'"; }
if($onfocus!=''){ $onfocus="onFocus='".$onfocus.";'"; }

if($end!=''){$the_end='</'.$end.'>';}else{$the_end='';}


$_str=$tg." ".$ty." ".$na." ".$onchange." ".$onclick." ".$onfocus." ".$cl." ".$id." ".$tl." ".$ph." ".$vl." ".$ac." ".$sz." ".$ml." ".$hr." ".$mp." ".$sc." ".$wh." ".$hh." ".$st." ".$ec;

$_str=str_replace('##toadd##', ucfirst($tr_toadd[$_tr]), $_str);
$_str=str_replace('##title##', ucfirst($tr_title[$_tr]), $_str);
$_str=str_replace('##description##', ucfirst($tr_description[$_tr]), $_str);
$_str=str_replace('##ms_inf_v1##', ucfirst($ms_inf_v1), $_str);
$_str=str_replace('##ms_inf_v2##', ucfirst($ms_inf_v2), $_str);
$_str=str_replace('##ms_inf_v3##', ucfirst($ms_inf_v3), $_str);
$_str=str_replace('##root##', '..', $_str);
$_str=str_replace('##ms_inf_v4##', $tr_keyword[$_tr].' ('.$tr_eg[$_tr].': '.$tr_games[$_tr].', '.$tr_videos[$_tr].', '.$tr_lessons[$_tr].') ', $_str);

$_str=str_replace('##file_size##', "<span id='file_size_value' >0MB</span>", $_str);

	if($ec==''){
		
echo "<".$_str." >".$the_end;

	}else{
		
echo $_str.$the_end;

	}}
}

function get_u_Image($cx, $id, $ty){
	$sq=mysqli_query ($cx, "SELECT * FROM tb_current_img WHERE id = '".$id."' AND type = '".$ty."' ");
	while($row=mysqli_fetch_array($sq)){
		return $row['url'];
	}
	
	if($ty=='profile'){
		return '../image/internal_icon/v1/m2.png';
	}else if($ty=='cover'){
		return '';
	}else{
		return '';
	}

}

function sys_icon_sw($cx ,$vr ,$dt){
	$sq=mysqli_query ($cx, "SELECT * FROM tb_current_img WHERE id = '".$dt."' AND type = 'system' ");
	while($row=mysqli_fetch_array($sq)){
		return str_replace('%var%', $vr, $row['url']);
	}
return 0;
}

/*-------------*/

function simplifyLongNum($x){
	if( strlen($x) <= 3 ){$x = $x;
	}else if( strlen($x) <= 6 ){$x = substr($x, 0, strlen($x) - 3 ).' M';
	}else if( strlen($x) <= 9 ){$x = substr($x, 0, strlen($x) - 6 ).' Mm';
	}else if( strlen($x) <= 12 ){$x = substr($x, 0, strlen($x) - 9 ).' B';
	}else{$x = substr($x, 0, strlen($x) - 12 ).' T';}
return $x;
}

/* ---------- */

function get_remaining_datetime_UTC($x, $type){
	include( explode("*", $_COOKIE['_d095'] )[1]."/_lang/index.php");
	
	date_default_timezone_set('UTC');
	$a = new DateTime($x);
	$b = new DateTime( date('Y-m-d H:i:s', time()) );
	$interval = $a->diff($b);
	
	$yy = $interval->format("%y");
	$mm = $interval->format("%m");
	$dd = $interval->format("%d");
	$hh = $interval->format("%h");
	$ii = $interval->format("%i");
	$ss = $interval->format("%s");
	
	if($type == '1'){
		
	}else if($type == '2'){
		if($yy > 0){  if($yy==1){$t=$yy.' '.$tr_year[$lngCD].$username;}else{$t=$yy.' '.$tr_years[$lngCD];}  }else if($mm > 0){   if($mm==1){$t=$mm.' '.$tr_month[$lngCD];}else{$t=$dd."/".$mm;}   }else if($dd > 0){  if($dd==1){$t=$dd.' '.$tr_day[$lngCD];}else{$t=$dd.' '.$tr_days[$lngCD];}  }else if($hh > 0){  if($hh==1){$t=$hh.' '.$tr_hour[$lngCD];}else{$t=$hh.' '.$tr_hours[$lngCD];}  }else if($ii > 0){  if($ii==1){$t=$ii.' '.$tr_minute[$lngCD];}else{$t=$ii.' '.$tr_minutes[$lngCD];}  }else if($ss > 0){  if($ss==1){$t=$ss.' '.$tr_second[$lngCD];}else{$t=$ss.' '.$tr_seconds[$lngCD];}  }else{ $t = ""; }
	}else if($type == '3'){
		
	}else{
		if($yy > 0){  if($yy==1){$t=$yy.' '.$tr_year[$lngCD];}else{$t=$yy.' '.$tr_years[$lngCD];}  }else if($mm > 0){   if($mm==1){$t=$mm.' '.$tr_month[$lngCD];}else{$t=$mm.' '.$tr_months[$lngCD];} }else if($dd > 0){  if($dd==1){$t=$dd.' '.$tr_day[$lngCD];}else{$t=$dd.' '.$tr_days[$lngCD];}  }else if($hh > 0){  if($hh==1){$t=$hh.' '.$tr_hour[$lngCD];}else{$t=$hh.' '.$tr_hours[$lngCD];}  }else if($ii > 0){  if($ii==1){$t=$ii.' '.$tr_minute[$lngCD];}else{$t=$ii.' '.$tr_minutes[$lngCD];}  }else if($ss > 0){  if($ss==1){$t=$ss.' '.$tr_second[$lngCD];}else{$t=$ss.' '.$tr_seconds[$lngCD];}  }else{ $t = ""; }
	}
return $t;
}

/* ---------- */

function unique_code_in_db($cx, $q, $t_str, $n1, $n2){
	$cd=substr(str_shuffle(str_repeat($t_str, $n1)), 0, $n2);
	$qry=str_replace("@key@",$cd,$q);
	$s=mysqli_query($cx, $qry);$i=0;
	while(mysqli_fetch_array($s)){ $i++; }
	if($i>0){
		unique_code_in_db($cx, $q, $t_str, $n1, $n2);
	}else{
		return $cd;
	}
}

/* ---------- */

function delete_user($cx,$id,$rg){
	if($rg==1){ mysqli_query ($cx, "INSERT INTO tb_deleted_user SELECT * FROM tb_user WHERE id='".$id."'"); }else{
	write_file($_SERVER["DOCUMENT_ROOT"]."/_log/system/id_delected/user.db", $id.';', 'a+');
	}
	if(mysqli_query ($cx, "DELETE FROM tb_user WHERE id='".$id."'")){
	mysqli_query ($cx, "DELETE FROM tb_relationship WHERE user_one_id='".$id."' OR user_two_id='".$id."'");
	mysqli_query ($cx, "DELETE FROM tb_process WHERE user_id='".$id."'");
	mysqli_query ($cx, "DELETE FROM tb_user_data WHERE user_id='".$id."'");
		return 1;
	}else{
		return 0;
	}
return 'null';
}

function loged_user_Sys_Process($id,$data){
	write_file($_SERVER["DOCUMENT_ROOT"]."/_log/system/id_users_data/bin_data/temp/user_".$id.".db", $data.'_&)_', 'w');
}

function read_file($x){
	$f = fopen($x, "r");
	$data = fread($f,filesize($x));
	fclose($f);
	if(!file_exists($x)){ $data='error_file'; }
return $data;
}

function str_replace_first($from, $to, $content){
	$from = '/'.preg_quote(strrev($from), '/').'/';
return strrev(preg_replace($from, $to, strrev($content), 1));
}

function write_file($x, $data, $t){
	$f=fopen($x, $t);
	fwrite($f, $data);
fclose($f);
}

function autoReg_user($id){
	$x=$_SERVER["DOCUMENT_ROOT"]."/_log/system/users_bin/data".".db";
	$text=read_file($x); $check='null';
	for($i=0;$i<substr_count($text,';');$i++){
		if( explode(';',$text)[$i]==$id ){ $check=1; }
	}
	if($check=='null'){ write_file($x, $id.';','a+'); }
}


function add_user_auto($id){
	$d=$_SERVER["DOCUMENT_ROOT"]."/_log/system/id_users_data/bin_data/bin.db";
	$tx=read_file($d); $ck='null';
	for($i=0;$i<substr_count($tx,'_&)_');$i++){
		if(explode('_&)_',$tx)[$i]==$id){ $ck=1; }
	}
	if($ck=='null'){ write_file($d,$id.'_&)_','a+'); }
}

function Refresh_Ev_ById($id,$pos){
	$r=read_file($_SERVER["DOCUMENT_ROOT"]."/_log/system/id_users_data/bin_data/temp/user_".$id.".db");
	
	if($pos==0){
		$newr='1'.'.'.explode(".", explode('_&)_', $r)[1])[1].'.'.explode(".", explode('_&)_', $r)[1])[2].'.'.explode(".", explode('_&)_', $r)[1])[3].'.'.explode(".", explode('_&)_', $r)[1])[4].'.'.explode(".", explode('_&)_', $r)[1])[5].'.'.explode(".", explode('_&)_', $r)[1])[6].'.'.explode(".", explode('_&)_', $r)[1])[7];
	}else if($pos==1){
		$newr=explode(".", explode('_&)_', $r)[1])[0].'.'.'1'.'.'.explode(".", explode('_&)_', $r)[1])[2].'.'.explode(".", explode('_&)_', $r)[1])[3].'.'.explode(".", explode('_&)_', $r)[1])[4].'.'.explode(".", explode('_&)_', $r)[1])[5].'.'.explode(".", explode('_&)_', $r)[1])[6].'.'.explode(".", explode('_&)_', $r)[1])[7];
	}else if($pos==2){
		$newr=explode(".", explode('_&)_', $r)[1])[0].'.'.explode(".", explode('_&)_', $r)[1])[1].'.'.'1'.'.'.explode(".", explode('_&)_', $r)[1])[3].'.'.explode(".", explode('_&)_', $r)[1])[4].'.'.explode(".", explode('_&)_', $r)[1])[5].'.'.explode(".", explode('_&)_', $r)[1])[6].'.'.explode(".", explode('_&)_', $r)[1])[7];
	}else if($pos==3){
		$newr=explode(".", explode('_&)_', $r)[1])[0].'.'.explode(".", explode('_&)_', $r)[1])[1].'.'.explode(".", explode('_&)_', $r)[1])[2].'.'.'1'.'.'.explode(".", explode('_&)_', $r)[1])[4].'.'.explode(".", explode('_&)_', $r)[1])[5].'.'.explode(".", explode('_&)_', $r)[1])[6].'.'.explode(".", explode('_&)_', $r)[1])[7];
	}else if($pos==4){
		$newr=explode(".", explode('_&)_', $r)[1])[0].'.'.explode(".", explode('_&)_', $r)[1])[1].'.'.explode(".", explode('_&)_', $r)[1])[2].'.'.explode(".", explode('_&)_', $r)[1])[3].'.'.'1'.'.'.explode(".", explode('_&)_', $r)[1])[5].'.'.explode(".", explode('_&)_', $r)[1])[6].'.'.explode(".", explode('_&)_', $r)[1])[7];
	}else if($pos==5){
		$newr=explode(".", explode('_&)_', $r)[1])[0].'.'.explode(".", explode('_&)_', $r)[1])[1].'.'.explode(".", explode('_&)_', $r)[1])[2].'.'.explode(".", explode('_&)_', $r)[1])[3].'.'.explode(".", explode('_&)_', $r)[1])[4].'.'.'1'.'.'.explode(".", explode('_&)_', $r)[1])[6].'.'.explode(".", explode('_&)_', $r)[1])[7];
	}else if($pos==6){
		$newr=explode(".", explode('_&)_', $r)[1])[0].'.'.explode(".", explode('_&)_', $r)[1])[1].'.'.explode(".", explode('_&)_', $r)[1])[2].'.'.explode(".", explode('_&)_', $r)[1])[3].'.'.explode(".", explode('_&)_', $r)[1])[4].'.'.explode(".", explode('_&)_', $r)[1])[5].'.'.'1'.'.'.explode(".", explode('_&)_', $r)[1])[7];
	}else if($pos==7){
		$newr=explode(".", explode('_&)_', $r)[1])[0].'.'.explode(".", explode('_&)_', $r)[1])[1].'.'.explode(".", explode('_&)_', $r)[1])[2].'.'.explode(".", explode('_&)_', $r)[1])[3].'.'.explode(".", explode('_&)_', $r)[1])[4].'.'.explode(".", explode('_&)_', $r)[1])[5].'.'.explode(".", explode('_&)_', $r)[1])[6].'.'.'1';
	}

	$data=explode('_&)_', $r)[0].'_&)_'.$newr.'_&)_'.explode('_&)_', $r)[2].'_&)_'.explode('_&)_', $r)[3];
	loged_user_Sys_Process($id,$data);
}

function Refsh_my_frids($cx,$id,$pos){
	$s=mysqli_query ($cx, "SELECT * FROM vw_idmyfriends WHERE id='".$id."' ");
	while($r=mysqli_fetch_array($s)){ Refresh_Ev_ById($r['friend'],$pos); }
}

function count_current_time($id, $t){
	$x=$_SERVER["DOCUMENT_ROOT"]."/_log/system/id_users_data/bin_data/activity_time/u_".$id.".db";
	date_default_timezone_set('UTC'); $u=date('Y-m-d H:i:s', time()); $data=''; 
	
	if($t=='r'){
		$data = read_file($x);
	}else if($t=='w'){
		write_file($x, $u, 'w');
	}else{
		write_file($x, $u, 'w');
		$data = read_file($x);
	}
return $data;
}

function ChangeMyStatus($cx,$id,$stts,$t){
	if($t=='true'){$ds="AND line != '0' ";}else if($t=='false'){$ds='';}else{$ds="AND line != '".$t."' ";}
	mysqli_query($cx, "UPDATE tb_user SET line = '".$stts."' WHERE id=".$id." ".$ds);
}

function ShowMyStatus($cx,$id){
	$s=mysqli_query ($cx, "SELECT line FROM tb_user WHERE id=".$id);
	while($r = mysqli_fetch_array($s)){ return $r['line']; }
return 'error';
}

/*
function getCurrentTimeUser($id){
	$r=read_file($_SERVER["DOCUMENT_ROOT"]."/_log/system/id_users_data/bin_data/temp/user_".$id.".db");
return str_replace(';', '', explode('_&)_', $r )[5]); // OR 6
}

function getPreviousTimeUser($id){
	$r=read_file($_SERVER["DOCUMENT_ROOT"]."/_log/system/id_users_data/bin_data/temp/user_".$id.".db");
	$data=explode('_&)_', $r)[3];
return $data;
}
*/


/* ---------- */

function getColorCoderNote_v01($x){
	$alltext = file_get_contents(str_replace(' ', '' ,$x));
	for($i=0; $i<10; $i++){ $ii = $i + 48; $alltext = str_replace( $i ,"&#".$ii.";" ,$alltext); $alltext = str_replace( "&#".$ii.";" ,"<span style='color:orange;' >".$i."</span>",$alltext); }
		$alltext = str_replace("\n","<br/>",$alltext);
		$alltext = str_replace("	","&emsp;",$alltext);
		$alltext = str_replace( htmlspecialchars('if') ,"<span style='color:#0066FF;' >if</span>",$alltext);
		$alltext = str_replace( htmlspecialchars('\n') ,"<span style='color:#0066FF;' >\\n</span>",$alltext);
		$alltext = str_replace( htmlspecialchars('else') ,"<span style='color:#0066FF;' >else</span>",$alltext);
		$alltext = str_replace( htmlspecialchars('return') ,"<span style='color:#0000FF;' >return</span>",$alltext);
		$alltext = str_replace( htmlspecialchars('printf') ,"<span style='color:#718C4F;' >printf</span>",$alltext);
		$alltext = str_replace( '&&' ," <span style='color:red; font-size:11px;' >&&</span> ",$alltext);
		$alltext = str_replace( '||' ," <span style='color:red; font-size:11px;' >||</span> ",$alltext);
		$alltext = str_replace( htmlspecialchars('{') ,"<span style='color:#000080;' >{</span>",$alltext);
		$alltext = str_replace( htmlspecialchars('}') ,"<span style='color:#000080;' >}</span>",$alltext);
		$alltext = str_replace( htmlspecialchars('(') ,"<span style='color:#000080;' >(</span>",$alltext);
		$alltext = str_replace( htmlspecialchars(')') ,"<span style='color:#000080;' >)</span>",$alltext);
		$alltext = str_replace( htmlspecialchars('%') ,"<span style='color:DarkCyan;' >%</span>",$alltext);
		$alltext = str_replace( '"' ,"<span style='color:DarkGoldenRod;' >\"</span>",$alltext);
		$alltext = str_replace( htmlspecialchars('-') ,"&#45;",$alltext);
		$alltext = str_replace( "\$" ,"<span style='color:#0066FF;' >\$</span>",$alltext);
		
return $alltext;
}

/* ---------- */

function TB_Relationship_id_to_Array($x){
	include( $_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
	$i=0;
	$sql = mysqli_query ($conexao, "SELECT * FROM TB_relationship WHERE status = 1 AND user_two_id = '".$x."' UNION SELECT * FROM TB_relationship WHERE status = 1 AND user_one_id = '".$x."' ");
	$count = mysqli_num_rows($sql);
	while ($row = mysqli_fetch_array($sql)){
		if($row['user_one_id'] == $x){ $Mfriend = $row['user_two_id']; }else{ $Mfriend = $row['user_one_id']; }
	$array[$i] = $Mfriend; $i++;
	}

return $array;
}

/* ---------- */

function TB_Rship_Pendent_id_to_Array($x){
	$Tc='';
	include( $_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");$Evt=0;$Evt2=0;$c=0;$n="";$u="";$p="";$p_img="";
	$sqli = mysqli_query ($conexao, "SELECT * FROM TB_relationship WHERE status = 0 AND user_two_id = '".$x."' ");
	while ($ln = mysqli_fetch_array($sqli)){	$Evt2++;
	$sql2 = mysqli_query ($conexao, "SELECT * FROM tb_user WHERE id = '".$ln['user_one_id']."' ");
	while($ROW = mysqli_fetch_array($sql2)){
	$n = $n.'{ '.$ROW['name'].' }';
	$u = $u.'{ '.$ROW['username'].' }';
	$p_img = $ROW['photo'];if(!getimagesize($p_img)){ $p_img = explode("*", $_COOKIE['_d095'] )[0]."/image/internal_icon/v1/m2.png"; }$p = $p.'{ '.$p_img.' }';
	$Evt++; 
	if(strlen($c) > 0){ $Tc= '{ '.$c.' }'.$Tc;$c=0; }else{ $Tc=$c.$Tc;$c=0; }
	$sql3 = mysqli_query ($conexao, "SELECT * FROM TB_relationship WHERE status = 1 AND user_one_id = '".$ROW['id']."' OR status = 1 AND user_two_id = '".$ROW['id']."' ");
		while($ROW3 = mysqli_fetch_array($sql3)){
			$sql4 = mysqli_query ($conexao, "SELECT * FROM tb_user WHERE id = '".$ROW3['user_one_id']."' UNION SELECT * FROM tb_user WHERE id = '".$ROW3['user_two_id']."' ");
			while( $ROW4 = mysqli_fetch_array($sql4) ){
				$sql5 = mysqli_query ($conexao,"SELECT * FROM TB_relationship WHERE status = 1 AND user_one_id = '".$x."' UNION SELECT * FROM TB_relationship WHERE status = 1 AND user_two_id = '".$x."' ");
				while($ROW5 = mysqli_fetch_array($sql5)){
				$sql6 = mysqli_query ($conexao,"SELECT * FROM tb_user WHERE id = '".$ROW5['user_one_id']."' UNION SELECT * FROM tb_user WHERE id = '".$ROW5['user_two_id']."'");
				while( $ROW6 = mysqli_fetch_array($sql6) ){				
					IF($ROW6['username'] == $ROW4['username']){
						$c++;
}}}}}}} 
		// LOG: Amigos_em_commun|name|user|photo|Total_user|tErro
	
return explode("|", "$Tc|$n|$u|$p|$Evt|$Evt2" );
}

/* ---------- */

function General_User_Info_id_to_Array($x){
	include( $_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
	$sqli = mysqli_query ($conexao, "SELECT * FROM tb_user WHERE id = '".explode(".", $_COOKIE['_sy'] )[0]."' ");
	$rowi = mysqli_num_rows($sqli);
	while ($linha = mysqli_fetch_array($sqli)){
		$n = ucfirst($linha['name']);
		$u = $linha['usercod'];
		$e = $linha['email'];
		$p = $linha['passw'];
		$pt = $linha['photo'];
		$lg = $linha['log'];
		$a = $linha['available'];
		$t_lg = $linha['temp_log'];
		$_l = $linha['_LINE'];
		$_pcl = $linha['pc_locale'];
		$id = $linha['id'];
	}
	
return "$n@|@$u@|@$e@|@$p@|@$pt@|@$lg@|@$a@|@$t_lg@|@$_l@|@$_pcl@|@$id@|@";	
}

/* ---------- */

function TranslateNotfyAuto($x){
	include( explode("*", $_COOKIE['_d095'] )[1]."/_lang/index.php");
	$q="<span style='color:red;' >error</span>";
	if($x == 'lkepost'){ $q =  $trSYS_lkepostof[$lngCD];}
	if($x == 'cmtthepublshof'){ $q =  $trSYS_cmtthepublshof[$lngCD];}
	if($x == 'creatnewpublishintag'){ $q =  $trSYS_creatnewpublishintag[$lngCD];}
	if($x == 'likyourstatus'){ $q =  $trSYS_likyourstatus[$lngCD];}
	if($x == 'talkaboutyou'){ $q =  $trSYS_talkaboutyou[$lngCD];}
	if($x == 'wasadedtothegroup'){ $q =  $trSYS_wasadedtothegroup[$lngCD];}
	if($x == 'hasacceptedyourfriendshiprequest'){ $q = $trSYS_hasacceptedyourfriendshiprequest[$lngCD];}
	
return $q;
}

/* ---------- */

function General_user_data_info_User_to_Array($x){
	include( $_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
	$sqli = mysqli_query ($conexao, "SELECT * FROM tb_user_data WHERE user_id = '".$x."' ");
	$rowi = mysqli_num_rows($sqli);
	while ($linha = mysqli_fetch_array($sqli)){
	$gd = $linha['gender'];
	$db	= $linha['datebirth'];
	$ph	= $linha['phone'];
	$st	= $linha['street'];
	$cr	= $linha['country'];
	$nt	= $linha['nationality'];
	$oc = $linha['occupation'];
	$ct	= $linha['city'];
	$zc	= $linha['zip_code'];
	$us	= $linha['user_id'];
	}
return "$gd@|@$db@|@$ph@|@$st@|@$cr@|@$nt@|@$oc@|@$ct@|@$zc@|@$us@|@";
}

/* ---------- */

function General_user_user_to_id($x){
	include( $_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
	$sqli = mysqli_query ($conexao, "SELECT * FROM tb_user WHERE username = '".$x."' ");
	$rowi = mysqli_num_rows($sqli);
	while ($linha = mysqli_fetch_array($sqli)){ $id = $linha['id']; }
		
return $id;
}

/* ---------- */

function getTagInfobyCode($x){
	include( $_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
	$sqli = mysqli_query ($conexao, "SELECT * FROM TB_tag WHERE code = '".$x."' ");
	$rowi = mysqli_num_rows($sqli);
	while ($linha = mysqli_fetch_array($sqli)){
		$n = $linha['name'];
		$c = $linha['color'];
		$id = $linha['id'];
		$d = $linha['default'];
		$ig = $linha['image'];
		$a = $linha['about'];
		$av = $linha['available'];
	}
return "$n|$c|$id|$d|$ig|$a|$av|";
}

/* ---------- */

// Agostinho Jesus De Pina Santos Ramos
// Agostinho J. P. S. Ramos


function AutoShrtName($n, $s){
	if($n==''){ return "<span style='color:red;' title='Erro o nome nao foi encontrado!' >NOME DESCONHECIDO</span>"; }
	$n_spc=substr_count($n,' ');
	$fst_n=explode(' ',$n)[0]; // primeiro nome
	$xst_n=explode(' ',$n)[$n_spc-1]; // nome da mae
	$lst_n=explode(' ',$n)[$n_spc]; // ultimo nome
	
	if($n_spc>2){ $x = $fst_n.' '.$xst_n.' '.$lst_n;
	}else{ $x = $fst_n.' '.$lst_n; }
	
	$x=repairUnkChar($x);
return $x;	
}

function repairUnkChar($x){
	$x=str_replace('&vtxpg_a_iright;', 'á' ,$x);$x=str_replace('&vtxpg_A_iright;', 'Á' ,$x);$x=str_replace('&vtxpg_a_ileft;', 'à' ,$x);
	$x=str_replace('&vtxpg_A_ileft;', 'À' ,$x);$x=str_replace('&vtxpg_a_cob;', 'ã' ,$x);$x=str_replace('&vtxpg_A_cob;', 'Ã' ,$x);
	$x=str_replace('&vtxpg_a_cha;', 'â' ,$x);$x=str_replace('&vtxpg_A_cha;', 'Â' ,$x);$x=str_replace('&vtxpg_i_iright;', 'í' ,$x);
	$x=str_replace('&vtxpg_I_iright;', 'Í' ,$x);$x=str_replace('&vtxpg_i_ileft;', 'ì' ,$x);$x=str_replace('&vtxpg_I_ileft;', 'Ì' ,$x);
	$x=str_replace('&vtxpg_i_cha;', 'î' ,$x);$x=str_replace('&vtxpg_I_cha;', 'Î' ,$x);$x=str_replace('&vtxpg_e_iright;', 'é' ,$x);
	$x=str_replace('&vtxpg_E_iright;', 'É' ,$x);$x=str_replace('&vtxpg_e_ileft;', 'è' ,$x);$x=str_replace('&vtxpg_E_ileft;', 'È' ,$x);
	$x=str_replace('&vtxpg_e_cha;', 'ê' ,$x);$x=str_replace('&vtxpg_E_cha;', 'Ê' ,$x);$x=str_replace('&vtxpg_o_iright;', 'ó' ,$x);
	$x=str_replace('&vtxpg_O_iright;', 'Ó' ,$x);$x=str_replace('&vtxpg_o_ileft;', 'ò' ,$x);$x=str_replace('&vtxpg_O_ileft;', 'Ò' ,$x);
	$x=str_replace('&vtxpg_o_cob;', 'õ' ,$x);$x=str_replace('&vtxpg_O_cob;', 'Õ' ,$x);$x=str_replace('&vtxpg_o_cha;', 'ô' ,$x);
	$x=str_replace('&vtxpg_O_cha;', 'Ô' ,$x);$x=str_replace('&vtxpg_u_iright;', 'ú' ,$x);$x=str_replace('&vtxpg_U_iright;', 'Ú' ,$x);
	$x=str_replace('&vtxpg_u_ileft;', 'ù' ,$x);$x=str_replace('&vtxpg_U_ileft;', 'Ù' ,$x);$x=str_replace('&vtxpg_u_cha;', 'û' ,$x);
	$x=str_replace('&vtxpg_U_cha;', 'Û' ,$x);
	
	return $x;
}

/* ---------- */

function url_exists($x) { $ErrPage='HTTP/1.1 404 Not Found'; $r=1;
if(strpos($x, 'http://') !== false){  }elseif((strpos($x, 'https://') !== false)){  }else{ $x='http://'.$x; }
if ( ( !@get_headers($x) == $ErrPage ) OR ( @get_headers($x)[0] == $ErrPage ) ){ 
	$curlInit = curl_init($x); curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
	curl_setopt($curlInit,CURLOPT_HEADER,true); curl_setopt($curlInit,CURLOPT_NOBODY,true);
	curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
	$xx = curl_exec($curlInit); curl_close($curlInit); if (!$xx){ $r=0; }
	}
return $r;
}

/* ---------- */

function SetLimite_datetime_UTC($x, $y){
	date_default_timezone_set('UTC');
	$a = new DateTime($x);
	$b = new DateTime( date('Y-m-d H:i:s', time()) );
	$ivl = $a->diff($b);
	
	$yy = $ivl->format("%y");
	$mm = $ivl->format("%m");
	$dd = $ivl->format("%d");

	if($yy > 0 || $mm > 0 ){ $t='1'; }else if( $dd >= $y ){ $t='1'; }else{ $t='0'; }
	
	return $t;
}

/* ---------- */

function isDomainAvailible($domain){
  if(!filter_var($domain, FILTER_VALIDATE_URL)){
     return false;
  }

  $curlInit = curl_init($domain);
  curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
  curl_setopt($curlInit,CURLOPT_HEADER,true);
  curl_setopt($curlInit,CURLOPT_NOBODY,true);
  curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
  $response = curl_exec($curlInit);
			  curl_close($curlInit);

  if ($response) return true;

return false;
}

/* --------- */


function allmyfriends($myid, $condtionid){
	$sql=mysqli_query($conexao, "SELECT * FROM TB_relationship WHERE user_one_id = '".$myid."' AND user_two_id = '".$condtionid."' UNION SELECT * FROM TB_relationship WHERE user_two_id = '".$myid."' AND user_one_id = '".$condtionid."' "); $n=mysqli_num_rows($sql);
	while($ROw=mysqli_fetch_array($sql)){
		if($ROw['user_one_id']!=$myid){ $s = $ROw['status']; $id = $ROw['user_one_id']; }else{$s = $ROw['status']; $id = $ROw['user_two_id'];}
	} if($n <= 0){$s = "NULL"; $id = "";}
return "[ $id ][ $s ]";
}

/* -------------------------------- */


function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}



#include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

?>