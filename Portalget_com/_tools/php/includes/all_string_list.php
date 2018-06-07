<!-- HOME PAGE v8.2 -->

<?php
$logout = "/_tools/php/cmd/logout.php?sn=".$u_session;

if (isset($_SERVER['HTTP_CLIENT_IP'])){ $real_ip_adress = $_SERVER['HTTP_CLIENT_IP']; }
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){ $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR']; }
else{ $real_ip_adress = $_SERVER['REMOTE_ADDR']; }

$crn_ip="12345";



//$_SERVER['HTTP_USER_AGENT']; PC NAV

//$_SERVER['REMOTE_ADDR']; IP

/*
$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$real_ip_adress}"));
$geoplugin_countryCode_tempDSGAVHJDSFA = $details->geoplugin_countryCode;


if(isset($geoplugin_countryCode_tempDSGAVHJDSFA)){
	$real_locale_pc = $geoplugin_countryCode_tempDSGAVHJDSFA;
	$tempUrlContry = $details->geoplugin_countryName;
}else{
	$location = json_decode(file_get_contents('http://freegeoip.net/json/'.$real_ip_adress));
			
	$tempUrlContry = $location->country_name;
	$real_locale_pc = $location->country_code;
}

# Display menu #
$cntt_logo="";$cntt_m1="";$cntt_m2="";$cntt_m3="";$cntt_m4="";$cntt_m5="";$cntt_m6="";
# Display menu #
*/
?>

<!--  $tempUrlContry ||  $real_locale_pc -->