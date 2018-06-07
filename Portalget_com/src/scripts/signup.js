 function check_name(x){ setTimeout(function(){
	hideButton();
	var upercase = x.value.length - x.value.replace(/[A-Z]/g, '').length; // N LETRAS GRANDE
	var lowcase = x.value.match(/[a-z]/g).length; // N LETRAS PEQUENAS
	var count_space = (x.value.split(" ").length - 1); // N ESPAÇOS
	var count_num = x.value.replace(/[^0-9]/g,"").length; // N NUMEROS
	var spcChars = x.value.match(/[a-záàâãéèêíïóôõöúçñ]/gi).length; // N LETRAS ESPECIAIS
	var getLastChar = x.value.substr(x.value.length - 1); // ULTIMO DIGITO
	var getFistChar = x.value.charAt(0); // PRIMEIRO DIGITO
	
	cin.src="/image/internal_icon/v1/wrong-check.png";
	ina.style.color ="#000";

	if( x.value.length <= 3 || upercase < 0  || count_space < 1 || lowcase < 3 || count_num > 0 || spcChars > x.value.length ){
		cin.src="/image/internal_icon/v1/wrong-check.png";
		ina.style.color ="#000";
		ina.title=tr_invalidname;
		dln.innerHTML ="<span id='redalert' >"+tr_pleaseenteryour+"<strong> "+tr_name+"</strong> "+tr_and+"<strong> "+tr_surnameOPCs+"</strong>.</span>";
		dlu.innerHTML=dlm.innerHTML=dlp.innerHTML=""; tcn.value='0';
	}else{
		if(spcChars <= x.value.length - count_space && getLastChar != ' ' && getFistChar != ' ' ){
		cin.src="/image/internal_icon/v1/correct-check.png";
		ina.style.color ="#34a853"; dln.innerHTML=ina.title=""; tcn.value='1';
		}else{
		cin.src="/image/internal_icon/v1/wrong-check.png";
		ina.style.color ="#000";
		ina.title=tr_invalidname; tcn.value='0';
		}
	}
 }, 1000);}
 

 function check_user(x){  setTimeout(function(){
hideButton();
	var count_space = (x.value.split(" ").length - 1);
	
	if((x.value.length>=6) && (count_space<=0) && ( /^\w+$/.test(x.value) )){
	
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
if( this.readyState == 4 && this.status == 200 ){
	if( this.responseText.split('<_user_>')[1]==0){
		ciu.src="/image/internal_icon/v1/correct-check.png";
		ius.style.color ="#34a853";
		ius.title=dlu.innerHTML=""; tcu.value='1';
	}else{
		ciu.src="/image/internal_icon/v1/wrong-check.png";
		ius.style.color="#fbbc05";
		ius.title=tr_Thisuisaldyuseddotpleasechooseanother;
		dlu.innerHTML="<span id='redalert' >"+tr_this+" <strong> "+tr_user+"</strong> "+tr_isalreadyinuse+". "+tr_chooseanother+".</span>";
		dlp.innerHTML=dlm.innerHTML=dln.innerHTML=""; tcu.value='0';
	}
}
  };
  xhttp.open("GET", "/_tools/modelo/app/app_searchindatabase.php?q="+x.value+'&t=user', true);
  xhttp.send();
		
	}else{
		ciu.src="/image/internal_icon/v1/wrong-check.png";
		dlu.innerHTML ="<span id='redalert' >"+tr_pleaseentera+"<strong> "+tr_user+"</strong>.</span>";
		ius.style.color="#000";
		dlp.innerHTML=dlm.innerHTML=dln.innerHTML=""; tcu.value='0';
	}
 }, 1000);}
 
 
 function check_email(x){ setTimeout(function(){
	hideButton(); tcm.value=0;
	var count_space = (x.value.split(" ").length - 1);
	var atpos = x.value.indexOf("@");
	var count_arroba = (x.value.split("@").length - 1);
    var dotpos = x.value.lastIndexOf(".");

    if (atpos < 1 || dotpos < atpos+2 || dotpos+2 >= x.value.length || count_space > 0 || count_arroba != '1' ) {
		cim.src="/image/internal_icon/v1/wrong-check.png";
		dlm.innerHTML ="<span id='redalert' >"+tr_pleaseenteryouremailaddress+".</span>";
		ima.style.color ="#000";
		dlp.innerHTML=dlu.innerHTML=dln.innerHTML=""; tcm.value='0';
    }else{
		

  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
if(this.readyState==4 && this.status==200){

	if(this.responseText.split('<_email_>')[1]==0){
		cim.src="/image/internal_icon/v1/correct-check.png";
		ima.title=dlm.innerHTML=""; ima.style.color ="#34a853"; tcm.value='1';
	}else{
		cim.src="/image/internal_icon/v1/wrong-check.png";
		
if(this.responseText.split('<_email_>')[1]==1){
	dlm.innerHTML ="<span id='redalert' ><strong>E-mail</strong> "+tr_hasalreadybeenregisteredbyanothermember+".</span>";
}
		
if(this.responseText.split('<_email_>')[1]==10){
	dlm.innerHTML ="<span id='redalert' >"+tr_this+" <strong>e-mail</strong> "+tr_invalid+".</span>";
}
ima.style.color="#fbbc05";
ima.title =tr_this+" e-mail "+tr_isalreadyinuse+". "+tr_chooseanother+".";
dlp.innerHTML=dlu.innerHTML=dln.innerHTML=""; tcm.value='0';
	}
}
	
  };

  xhttp.open("GET", "/_tools/modelo/app/app_searchindatabase.php?q="+x.value+'&t=email', true);
  xhttp.send();
		
	}
 }, 3000);}
 
 function hideButton(){
	 var name=tcn.value;
	 var user=tcu.value;
	 var mail=tcm.value;
	 var yname=ina.value;
	 var ymail=ima.value;
	 var ylink=cin.getAttribute('src');
	 
	 if( ( ylink=="/image/internal_icon/v1/correct-check.png" ) && (yname.length>3) && (ymail.length>3) && (name==1) && (user==1) && (mail==1)){
		 bss.style.backgroundColor = "#508ab2";
		 bss.disabled = false;
	if(conf.value==1){
	doyouwantexit();
	}
	 }else{
		bss.style.backgroundColor = "#d7d9db";
		bss.disabled = true;
		if((user==1) && (mail==1)){ cin.src="/image/internal_icon/v1/wrong-check.png"; ina.style.color ="000"; }
	 }
 }

 function clear_label(x){
	var s_name = cin.getAttribute('src');
	var s_user = ciu.getAttribute('src');
	var s_mail = cim.getAttribute('src');
	var w = "/image/internal_icon/v1/wrong-check.png";
	if(x=='name' && s_name == w){ ina.value=''; dln.innerHTML =''; }
	if(x=='user' && s_user == w){ ius.value=''; dlu.innerHTML =''; }
	if(x=='mail' && s_mail == w){ ima.value=''; dlm.innerHTML =''; }
}

function doyouwantexit() {
	window.onbeforeunload = function(e){ var e = e || window.event;
	if(e){ e.returnValue = 'Are you sure?'; } //IE & Firefox	
	return 'Are you sure?'; // For Safari
	};
}