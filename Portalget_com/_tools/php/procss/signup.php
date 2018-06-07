<?php
date_default_timezone_set('UTC');
$time_now = date('Y-m-d H:i:s', time());
include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
include_once($_SERVER['DOCUMENT_ROOT']."/main_class.inc");
include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");
?>

<?PHP

$token = substr(str_shuffle(str_repeat("1234567890", 15)), 0, 5);
$name = ucwords($_POST['name']);
$user = $_POST['user'];
$mail = $_POST['mail'];

$sql1 = mysqli_query ($conexao, "SELECT active, log FROM tb_user WHERE email = '".$mail."' ");
$num1 = mysqli_num_rows($sql1);

$sql2 = mysqli_query ($conexao, "SELECT active, log FROM tb_user WHERE usercod = '".$user."' ");
$num2 = mysqli_num_rows($sql2);

if(($num1>0)||($num2>0)){ 
    while ($row = mysqli_fetch_array($sql1)){ $check1=$row['active']; $date1=explode('|#|', $row['log'])[0]; }
    while ($row = mysqli_fetch_array($sql2)){ $check2=$row['active']; $date2=explode('|#|', $row['log'])[0]; }
    if($num1>0){
    if(($check1==1)||(SetLimite_datetime_UTC($date1, 15)==0)){
            echo"<script>setTimeout(function(){location.href='/login/#EMAIL_', 3000} );</script>";
            exit();
    }}
    if($num2>0){
    if(($check2==1)||(SetLimite_datetime_UTC($date2, 15)==0)){
            echo"<script>setTimeout(function(){location.href='/login/#USERNAME', 3000} );</script>";
            exit();
    }}
}else{
    
        $log="$post_datetime|#|$token|#|$user_os|#|$user_browser|#|$user_ip|#|$user_agent|#|$user_CPU_ID|#|NULL|#|";
        if(mysqli_query($conexao, "INSERT INTO tb_user (name, usercod, email, active, line, locale_info_log, charset, log, passw)"
        . "VALUES ('".$name."', '".$user."', '".$mail."', '0', '0', '".$locale_info_log."', '".explode('.', $_COOKIE['_sy'] )[1]."', '".$log."', '".md5($token)."')")){
            
        send_mail($conexao,'agostinhopina095@gmail.com','Damos lhe Boas vindas ao nosso site, neste momento esta na fase de teste.','123456789',0,'Criar conta');
        echo"<script>setTimeout(function(){location.href='/dashboard/', 3000} );</script>";
        exit();
        }
}

function inbox($cx,$to,$subject,$message,$headers) {
    date_default_timezone_set('UTC');
    $now = date('Y-m-d H:i:s', time());
    $token = next_inbox_key();
    $headers= explode('#', $headers);
    $_title=$subject;
    $_messag=$message;
    $_annexo=$headers[1];
    $_type='mail';
    $_from=$headers[0];
    $_to=$to;
    $_date=$now;
    $_arch_link=$headers[2];
    $_sn=surrogate_key();
    $_url='/inbox/internal_url/?mail='.$token;
    $sqli_send_Inbox = mysqli_query($cx, "INSERT INTO tb_inbox "
    . "(title, message, annex, type, de, para, send_datetime, sn, arch_links, url_log) "
    . "VALUES ('$_title', '$_messag', '$_annexo', '$_type', '$_from', '$_to', '$_date', "
    . "'$_sn', '$_arch_link', '$_url') ");
    
 return 1;
}

function send_mail($cx,$mail,$title='',$str='',$mod='', $dowhat='') {
    
    $_sql = mysqli_query ($cx, "SELECT * FROM tb_user WHERE email='".$mail."' ");
    if (mysqli_num_rows($_sql) <= 0) { return -1; }
    while($r = mysqli_fetch_array($_sql)){
        $_name=$r['name'];
        $_user=$r['usercod'];
        $_ative=$r['active'];
        $_chrst=$r['charset'];
        $_log=$r['log'];
    }
    
    $n_spc=substr_count($_name,' ');
    $fst_n=explode(' ',$_name)[0]; // primeiro nome
    $xst_n=explode(' ',$_name)[$n_spc-1]; // nome da mae
    $lst_n=explode(' ',$_name)[$n_spc]; // ultimo nome
    
    $ccode=explode('|#|',$_log)[1];
    $subject = $title;
    if( $n_spc-1 < 2 ){
        $_name = $fst_n.' '.$lst_n;
    }else{
        $_name = $fst_n.' '.$xst_n.' '.$lst_n;
    }
    if( strlen($mod) > 0 ){
    $cLink="http://portalget.com/#CORCETO";
    $pub='https://portalget.com/_tools/pub/market001.jpg';
    $params = array(
        'name' => $_name, 
        'token' => $ccode, 
        'mail' => $mail, 
        'user' => $_user,
        'title' => $title,
        'clink' => $cLink, 
        'pub' => $pub,
        'lng' => $_chrst );
    $list_models = array('activation','welcome','avisoInbox');
    $message = file_get_contents('https://portalget.com/'
    . '_tools/modelo/mail/'.$list_models[$mod].'.php?'. http_build_query($params));
    }else{ $message = $str; }
    
    $to_name = ucfirst($fst_n).' '.ucfirst($lst_n);
    $to_mail = $mail;
    $im_name = 'Support Portalget';
    $from_name = $dowhat." - Portalget Inc.";
    $from_mail = "support@portalget.com";
    $reply_mail = "no-reply@portalget.com";
    $to = $to_name." <".$to_mail.">";
    $from = $from_name." <".$reply_mail.">";
    $reply = $im_name." <".$from_mail.">";
    $headers  = "From: " . $from . "\r\n";
    $headers .= "Reply-To:" . $reply . "\r\n" . "X-Mailer: PHP/" . phpversion();
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";       
    $headers .= 'Cc: CEO <agostinhopina95@gmail.com>' . "\r\n";
    $parts_mail = explode('@', $mail);
    $mail_user = array_shift($parts_mail);
    $mail_site = array_pop($parts_mail);
    
    $header = "charsnega@gmail.com#1#http_link#";
    inbox($cx,$to,$subject,$message,$header);
  if(mail($to,$subject,$message,$headers)){ return 0; }else{ return -1; }
}