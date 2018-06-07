<?PHP
	include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
	include($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");
	
	date_default_timezone_set('UTC');
	$_datetime = date('Y-m-d H:i:s', time());
	
	$U_THIS = explode(".", $_COOKIE['_sy'] )[0];
	$U_FRND = $_GET['FRND'];
	$CODEGROUP = $_GET['CODEGROUP'];
	$GROUP_NAME = 'NOVO GRUPO';

	$FIRST_TIME = 0;
	$RLTN = "user_one_id=".$U_THIS." AND user_two_id=".$U_FRND." OR user_one_id=".$U_FRND." AND user_two_id=".$U_THIS;
	$cx=$conexao;
	

	$SQL=mysqli_query($cx,"SELECT * FROM tb_chat WHERE ".$RLTN);
	if(mysqli_num_rows($SQL)>0){
		while($R=mysqli_fetch_array($SQL)){ $last_ss_chat = $R['last_send']; $backup_text = $R['chat_text']; }
		if( date('Y-m-d H:i:s', strtotime('-30 minutes')) > $last_ss_chat ){
			$put_date_chat = "<o:SYS>".zip_encode(base64_encode(chat_emoticons(remove_null_str($last_ss_chat))))."<c:SYS>";
			mysqli_query($cx, "UPDATE tb_chat SET chat_text = '".$backup_text.$put_date_chat."', last_send='".$_datetime."' WHERE ".$RLTN);
		}
	}
	
	$str = "<o:".$U_THIS.">".zip_encode(base64_encode(chat_emoticons(remove_null_str($_GET['TEXT']))))."<c:".$U_THIS.">";

	if($CODEGROUP!=''){ Query_chat_recicle($cx,$CODEGROUP,$CODEGROUP); }else{ Query_chat_recicle($cx,$U_THIS,$U_FRND); }

	IF($CODEGROUP=='NEWCODE'){
		$CODEGROUP='C3542432';
		mysqli_query($cx, "INSERT INTO tb_chat_mix VALUES('".$CODEGROUP."','','".$U_FRND.":','".$GROUP_NAME."','1','0','".$_datetime."') ");
		$FIRST_TIME = 1;
	}

	IF($CODEGROUP==''){
		IF(mysqli_num_rows($SQL)>0){ // EXISTE
			$CODEGROUP='not_found';
		}ELSE{ // NAO EXISTIA
			mysqli_query($cx, "INSERT INTO tb_chat VALUES('".$U_THIS."','".$U_FRND."', '".$R['chat_text'].$str."', '0', '".$_datetime."') ");
		}
	}

	IF($CODEGROUP=='not_found'){
		$SQL=mysqli_query($cx,"SELECT * FROM tb_chat WHERE ".$RLTN);
		while($R=mysqli_fetch_array($SQL)){ $ct = $R['chat_text']; }
		mysqli_query($cx, "UPDATE tb_chat SET chat_text = '".$ct.$str."', last_send='".$_datetime."' WHERE ".$RLTN);
		
	}ELSE IF($CODEGROUP!=''){
		$SQL_gp=mysqli_query($cx,"SELECT * FROM tb_chat_mix WHERE CODEGROUP='".$CODEGROUP."'");
		if(mysqli_num_rows($SQL_gp)>0){
			while($R=mysqli_fetch_array($SQL_gp)){ $last_ss_chat = $R['last_send']; $backup_text = $R['chat_text']; }
			if( date('Y-m-d H:i:s', strtotime('-30 minutes')) > $last_ss_chat ){
				$put_date_chat = "<o:SYS>".zip_encode(base64_encode(chat_emoticons(remove_null_str($last_ss_chat))))."<c:SYS>";
				mysqli_query($cx, "UPDATE tb_chat_mix SET chat_text = '".$backup_text.$put_date_chat."', last_send='".$_datetime."' WHERE CODEGROUP='".$CODEGROUP."'");
			}
		}
		
		$SQL2=mysqli_query($cx,"SELECT * FROM tb_chat_mix WHERE CODEGROUP='".$CODEGROUP."'");
			while($R1=mysqli_fetch_array($SQL)){ $L1 = $R1['chat_text']; }
			while($R2=mysqli_fetch_array($SQL2)){ $L2 = $R2['chat_text']; }
			
		IF($FIRST_TIME==0){ $_BUILD = $L2; }ELSE{ $_BUILD = $L1; }
		mysqli_query($cx, "UPDATE tb_chat_mix SET chat_text = '".$_BUILD.$str."', last_send='".$_datetime."' WHERE CODEGROUP='".$CODEGROUP."'");
		$FIRST_TIME=0;
	}