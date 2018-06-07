$(".warp_frnds ul").scroll(function() {
	scrollFunction();
});

$(".warp_frnds #btntop").click(function() {
	$(".warp_frnds ul").scrollTop(0);
});

function scrollFunction() {

    if ( $(".warp_frnds ul").scrollTop() > 10500) {
        $("#btntop").show();
    } else {
        $("#btntop").hide();
    }
}


/* <!---  ---> */

function sendText_Chat(fid,t){
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.open("GET", "/_tools/modelo/app/app_sendText_chat.php?fid="+fid+"&text="+t, true);
	xhttp.send();
}

// <!-- Load My Chats -->
if(parseInt(getCookie('_wnChat').split(']').length-1)<=0){ app_chat_windows('','');
}else{ app_chat_windows( getCookie('_wnChat').split(']')[0].split(':')[0] ,'o'); iniScrlwdwCht(''); wnChatAtivWnds(); }
setTimeout(function(){
setTimeout(function (){ $('#_wncht_n0 textarea').focus(); },1000);
$("._wncht_more .lft").css("color","#508ab2"); $("._wncht_more .rgt").css("color","#fff");
$("._wncht_more .lft").hide(); },300);
// <!-- Load My Chats -->

function callUserClick(n){
	app_chat_windows(n,'o');
	iniScrlwdwCht('');
	wnChatAtivWnds();
	sendTextChat();
}

function wnChatck(x, v){
	if(v=='off'){
		MngWndChat(x,'del');
		styleWndChat(x,'Off');
		app_chat_windows('','');
		iniScrlwdwCht('');
		wnChatAtivWnds();
		sendTextChat();
	}else if(v=='on'){
		if(  $("#_wncht_n"+x).height() == '215.5' ){ 
			MngWndChat( x+':c]','add'); styleWndChat(x,'Min');
		}else{ MngWndChat( x+':o]','add'); styleWndChat(x,'Nor'); }
	}
}

function app_chat_windows(x,t){
	var chk=0; var chk2='';
	
	if(x==''){ if(parseInt(getCookie('_wnChat').split(']').length-1)<=0){chk=1;} }else{
		for(i=0;i<parseInt(getCookie('_wnChat').split(']').length-1);i++){
			if(getCookie('_wnChat').split(']')[i].split(':')[0]==x){ chk2=i; }
		}
	}
	if(chk==0 && chk2==''){
		if(x!='' && getCookie('_wnChat').split(']')[0].split(':')[0]!=x){ setCookie('_wnChat', getCookie('_wnChat')+x+':'+t+']',30,'d'); }else{ chk2='0'; }
		rfshChatCtnt('','');
	}
	
	if(chk2!='' && x!=''){
		rfshChatCtnt(chk2,'');
		$("#_wncht_n0 .head").ready(function(){
			setTimeout(function(){ 
				$("#_wncht_n0 .head").addClass("_wncht_chtAnmctclr");
			},100);
		});
	}
}

function rfshChatCtnt(x,fn){
	if(x=='silent'){
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				$("#body_n"+fn+" .warp_n").html(this.responseText);
			}};
		xhttp.open("GET", "/_tools/modelo/app/app_chat_windows.php?n="+cc+'&m=txtsms&p='+x+'&pos='+fn, true);
		xhttp.send();
	}else if(x!=''){
		cc = getCookie('_wnChat').split(']').length; if(cc>4){cc=4;}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("_chat_warp").innerHTML = this.responseText;
			}};
		xhttp.open("GET", "/_tools/modelo/app/app_chat_windows.php?n="+cc+'&m=true&p='+x, true);
		xhttp.send();
		load_chat_components(cc);
	}else{
		cc = getCookie('_wnChat').split(']').length; if(cc>4){cc=4;}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("_chat_warp").innerHTML = this.responseText;
			}};
		xhttp.open("GET", "/_tools/modelo/app/app_chat_windows.php?n="+cc+'&m=false', true);
		xhttp.send();
		load_chat_components(cc);
	}
	
return x;
}

function load_chat_components(x){
	var inv = [3,2,1,0]; var k; var s;
	var size = getCookie('_wnChat').split(']').length-2;
		setTimeout(function(){
				
				for(i=0;i<x;i++){
					
					if(getCookie('_wnChat').split(']').length <= 5){ $("._wncht_more").hide();
					}else{ $("._wncht_more").show(); }
					
					if(size<=4){ k=i; }else{ k=size-inv[i]; }
					
					var s = (getCookie('_wnChat').split( $("#_wncht_n"+i+" input").val() + ':')[1])[0];
					if(s=='o'){ styleWndChat(i,'Nor'); }else if(s=='c'){ styleWndChat(i,'Min'); }else{
						styleWndChat(i,'Off');
					}
				}
				
		},500);
}

function openLnkPrfl(ucde){
	location.href="/profile/?u="+ucde;
}

function MngWndChat(x,ty){ // <!-- Fechar o chat -->
	var v = getCookie('_wnChat'); var idU; var n; var pos='';
	var str=''; var t=''; var chk=0; var u; var s; var inv = [3,2,1,0];
	var size = getCookie('_wnChat').split(']').length-2; var k;
	if(ty=='del'){
		str = v.replace(getCookie('_wnChat').split(']')[x].split(':')[0]+':'+'c'+']', '');
		if(str==v){str = v.replace(getCookie('_wnChat').split(']')[x].split(':')[0]+':'+'o'+']', '');}
		setCookie('_wnChat',str,30,'d');
		setCookie('cht_tempdraft'+$('#_wncht_n'+x+' input').val(),'',0,'s');
		
	}else if(ty=='add'){ // <!-- Gerenciar o chat -->
		
		n = x.split(']')[0].split(':')[0];
		s = x.split(']')[0].split(':')[1];
		$("#_wncht_n"+n).ready(function(){
			idU = $("#_wncht_n"+n+" input").val();
			
			for(i=0;i<parseInt(v.split(']').length-1);i++){
				if( v.split(']')[i].split(':')[0] == idU ){
					chk=1; pos=i; 
				}
			}
			if(chk==0){
				str = v + idU +':'+s+']';
			}else{
				for(i=0;i<parseInt(v.split(']').length-1);i++){
					u1 = v.split(']')[i].split(':')[0];
					s1 = v.split(']')[i].split(':')[1];
					if( i == pos ){ str = str + idU +':'+s+']';
					}else{ str = str + u1 +':'+s1+']'; }
				}
			}
			setCookie('_wnChat',str,30,'d');
		});
	}
}

function styleWndChat(n,ty){
	if(ty=='Nor' && $("#_wncht_n"+n+" input").val() !='' ){
		$("#_wncht_n"+n).show();
		$("#_wncht_n"+n).css("width","180.5px");
		$("#_wncht_n"+n+" textarea").show();
		$("#_wncht_n"+n+" .head").css("background-color","rgba(80,138,178,0.5)");
		$("#_wncht_n"+n+" .head").css("color","#fff");
		$("#_wncht_n"+n+" .close").css("color","#fff");
		$("#_wncht_n"+n+" .head span:nth-child(1)").css("position","");
		$("#_wncht_n"+n+" .head span:nth-child(1)").css("top","-13px");
		$("#_wncht_n"+n).css("height","215.5px");
		$("#_wncht_n"+n+" span:first").html('&minus;');
	}else if(ty=='Min' && $("#_wncht_n"+n+" input").val() !='' ){
		$("#_wncht_n"+n).show();
		$("#_wncht_n"+n).css("width","160.5px");
		$("#_wncht_n"+n+" textarea").hide();
		$("#_wncht_n"+n+" .head span:nth-child(1)").css("position","relative");
		$("#_wncht_n"+n+" .head span:nth-child(1)").css("top","-2px");
		$("#_wncht_n"+n).css("height","20px");
		$("#_wncht_n"+n+" span:first").html('&square;');
	}else if(ty=='Off'){
		$("#_wncht_n"+n).hide();
		$("#_wncht_n"+n).css("width","180.5px");
		$("#_wncht_n"+n+" .name span").html('');
		$("#_wncht_n"+n+" .body div").html('');
		$("#_wncht_n"+n+" textarea").html('');
		$("#_wncht_n"+n+" .head circle").css("fill","#508ab2");
	}
}

var xdr=0;
function _wncht_more(x){
	if(x=='l'){
		if(xdr-1>=1){ xdr = rfshChatCtnt(xdr-1,''); }else{
			$("._wncht_more .lft").css("color","#508ab2"); $("._wncht_more .rgt").css("color","#fff");
		}
		if(xdr-1<=0){
			app_chat_windows( getCookie('_wnChat').split(']')[0].split(':')[0] ,'o');
			setTimeout(function(){
				$("._wncht_more .lft").css("color","#508ab2"); $("._wncht_more .rgt").css("color","#fff");
				$("._wncht_more .lft").hide();
			},100);
		}
		setTimeout(function(){ $("#_wncht_n0 .head").addClass("_wncht_chtAnmctclr"); },100);
	}else if(x=='r'){
		if(xdr+1<parseInt(getCookie('_wnChat').split(']').length-1)){ xdr = rfshChatCtnt(xdr+1,''); }else{
			$("._wncht_more .rgt").css("color","#508ab2"); $("._wncht_more .lft").css("color","#fff");
		}
		setTimeout(function(){ $("#_wncht_n0 .head").addClass("_wncht_chtAnmctclr"); },100);
	}
	iniScrlwdwCht('');
	wnChatAtivWnds();
	sendTextChat();
}

function setCookie(cname,cvalue,exdays,timetype) {
		var d = new Date();
		var getTimeType = [1000, 60000, 3600000, 86400000, 31536000000];
		
		if((timetype == "s") || (timetype == "S")){d.setTime(d.getTime() + (exdays * getTimeType[0]));}
		if((timetype == "m") || (timetype == "M")){d.setTime(d.getTime() + (exdays * getTimeType[1]));}
		if((timetype == "h") || (timetype == "H")){d.setTime(d.getTime() + (exdays * getTimeType[2]));}
		if((timetype == "d") || (timetype == "D")){d.setTime(d.getTime() + (exdays * getTimeType[3]));}
		if((timetype == "y") || (timetype == "Y")){d.setTime(d.getTime() + (exdays * getTimeType[4]));}
		
		var expires = "expires=" + d.toGMTString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
  return "";
}

function iniScrlwdwCht(x){
	setTimeout(function(){
		if(x!=''){ $("#_wncht_n"+x+" .body").scrollTop( $("#_wncht_n"+x+" .body").height() * 999 );
		}else{ $("._wncht .body").scrollTop( $("._wncht .body").height() * 999 ); }
	},500);
}

setTimeout(function(){
	wnChatAtivWnds();
	$("._wncht .body .me").dblclick(function(){
		alert("YOU SAY:\n "+ this.innerText);
	});
	$("._wncht .body .unme").dblclick(function(){
		alert("SOMEONE SAYS:\n "+ this.innerText);
	});
	$("._wncht .body").scroll(function() {
		var n = this.id.replace('body_n', '');
		var id = $("#_wncht_n"+n+" input").val();
		if ( $("#_wncht_n"+n+" .body").scrollTop() <= 0.5 ) {
			alert("Fim do texto de: "+id);
		}
	});
	
	sendTextChat();
	
},3000);

function sendTextChat(){
	tmp_ck=0;
	setTimeout(function(){
		$('#_wncht_n0 textarea').on('change keyup paste', function (e) {
			if ((e.keyCode == 13 || e.keyCode == 10) && $('#_wncht_n0 textarea').val() !='' && $('#_wncht_n0 textarea').val() != ' ' ){
				tmp_ck++;
				if(tmp_ck<=1){
					var ps = 0;
					sendText_Chat( $('#_wncht_n'+ps+' input').val() , $('#_wncht_n'+ps+' textarea').val() );
					setTimeout(function(){ 
						$('#_wncht_n'+ps+' textarea').val(''); 
						setTimeout(function(){
							rfshChatCtnt('silent',ps);
							iniScrlwdwCht('');
							sendTextChat();
						},500);
					},500);
				}
			}
			setTimeout(function(){
				if($('#_wncht_n0 textarea').val()==''){
					setCookie('cht_tempdraft'+$('#_wncht_n0 input').val(),'',0,'s');
				}else{
					setCookie('cht_tempdraft'+$('#_wncht_n0 input').val(),$('#_wncht_n0 textarea').val(),30,'d');
				}
			},500);
		});

		$('#_wncht_n1 textarea').on('change keyup paste', function (e) {
			if ((e.keyCode == 13 || e.keyCode == 10) && e.ctrlKey && $('#_wncht_n1 textarea').val() !='' && $('#_wncht_n1 textarea').val() != ' ' ){
				if(tmp_ck<=1){ sendText_Chat( $('#_wncht_n1 input').val() , $('#_wncht_n1 textarea').val() ); }
				setTimeout(function(){ 
				$('#_wncht_n1 textarea').val(''); 
				app_chat_windows('','');
				iniScrlwdwCht('');
				wnChatAtivWnds();
				sendTextChat();
				},500);
			}
			setTimeout(function(){
				if($('#_wncht_n1 textarea').val()==''){
					setCookie('cht_tempdraft'+$('#_wncht_n1 input').val(),'',0,'s');
				}else{
					setCookie('cht_tempdraft'+$('#_wncht_n1 input').val(),$('#_wncht_n1 textarea').val(),30,'d');
				}
			},500);
		});

		$('#_wncht_n2 textarea').on('change keyup paste', function (e) {
			if ((e.keyCode == 13 || e.keyCode == 10) && e.ctrlKey && $('#_wncht_n2 textarea').val() !='' && $('#_wncht_n2 textarea').val() != ' ' ){
				if(tmp_ck<=1){ sendText_Chat( $('#_wncht_n2 input').val() , $('#_wncht_n2 textarea').val() ); }
				setTimeout(function(){ 
				$('#_wncht_n2 textarea').val(''); 
				app_chat_windows('','');
				iniScrlwdwCht('');
				wnChatAtivWnds();
				sendTextChat();
				},500);
			}
			setTimeout(function(){
				if($('#_wncht_n2 textarea').val()==''){
					setCookie('cht_tempdraft'+$('#_wncht_n2 input').val(),'',0,'s');
				}else{
					setCookie('cht_tempdraft'+$('#_wncht_n2 input').val(),$('#_wncht_n2 textarea').val(),30,'d');
				}
			},500);
		});

		$('#_wncht_n3 textarea').on('change keyup paste', function (e) {
			if ((e.keyCode == 13 || e.keyCode == 10) && e.ctrlKey && $('#_wncht_n3 textarea').val() !='' && $('#_wncht_n3 textarea').val() != ' ' ){
				if(tmp_ck<=1){ sendText_Chat( $('#_wncht_n3 input').val() , $('#_wncht_n3 textarea').val() ); }
				setTimeout(function(){ 
				$('#_wncht_n3 textarea').val(''); 
				app_chat_windows('','');
				iniScrlwdwCht('');
				wnChatAtivWnds();
				sendTextChat();
				},500);
			}
			setTimeout(function(){
				if($('#_wncht_n3 textarea').val()==''){
					setCookie('cht_tempdraft'+$('#_wncht_n3 input').val(),'',0,'s');
				}else{
					setCookie('cht_tempdraft'+$('#_wncht_n3 input').val(),$('#_wncht_n3 textarea').val(),30,'d');
				}
			},500);
		});
	},500);
}

function wnChatAtivWnds(){
	setTimeout(function(){
		$('#_wncht_n0 .head,#_wncht_n0 .body').click(function() {
			$("#_wncht_n1 .head,#_wncht_n2 .head,#_wncht_n3 .head,#_wncht_n1 .body .me,#_wncht_n2 .body .me,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.5)");
			$("#_wncht_n0 .head,#_wncht_n0 .body .me").css("background-color","rgba(80,138,178,0.9)");
			$('#_wncht_n0 textarea').focus();
		});
		$('#_wncht_n0 textarea').focus(function() {
			$("#_wncht_n1 .head,#_wncht_n2 .head,#_wncht_n3 .head,#_wncht_n1 .body .me,#_wncht_n2 .body .me,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.5)");
			$("#_wncht_n0 .head,#_wncht_n0 .body .me").css("background-color","rgba(80,138,178,0.9)");
		});
		$('#_wncht_n0 textarea').focusout(function() {
			$("#_wncht_n0 .head,#_wncht_n0 .body .me").css("background-color","rgba(80,138,178,0.5)");
		});
		
		$('#_wncht_n1 .head,#_wncht_n1 .body').click(function() {
			$("#_wncht_n0 .head,#_wncht_n2 .head,#_wncht_n3 .head,#_wncht_n0 .body .me,#_wncht_n2 .body .me,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.5)");
			$("#_wncht_n1 .head,#_wncht_n1 .body .me").css("background-color","rgba(80,138,178,0.9)");
			$('#_wncht_n1 textarea').focus();
		});
		$('#_wncht_n1 textarea').focus(function() {
			$("#_wncht_n0 .head,#_wncht_n2 .head,#_wncht_n3 .head,#_wncht_n0 .body .me,#_wncht_n2 .body .me,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.5)");
			$("#_wncht_n1 .head,#_wncht_n1 .body .me").css("background-color","rgba(80,138,178,0.9)");
		});
		$('#_wncht_n1 textarea,#_wncht_n1 .head').focusout(function() {
			$("#_wncht_n1 .head,#_wncht_n1 .body .me").css("background-color","rgba(80,138,178,0.5)");
		});
		
		$('#_wncht_n2 .head,#_wncht_n2 .body').click(function() {
			$("#_wncht_n1 .head,#_wncht_n0 .head,#_wncht_n3 .head,#_wncht_n0 .body .me,#_wncht_n1 .body .me,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.5)");
			$("#_wncht_n2 .head,#_wncht_n2 .body .me").css("background-color","rgba(80,138,178,0.9)");
			$('#_wncht_n2 textarea').focus();
		});
		$('#_wncht_n2 textarea').focus(function() {
			$("#_wncht_n1 .head,#_wncht_n0 .head,#_wncht_n3 .head,#_wncht_n0 .body .me,#_wncht_n1 .body .me,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.5)");
			$("#_wncht_n2 .head,#_wncht_n2 .body .me").css("background-color","rgba(80,138,178,0.9)");
		});
		$('#_wncht_n2 textarea').focusout(function() {
			$("#_wncht_n2 .head,#_wnChat_n2 .body .me").css("background-color","rgba(80,138,178,0.5)");
		});
		
		$('#_wncht_n3 .head,#_wncht_n3 .body').click(function() {
			$("#_wncht_n1 .head,#_wncht_n2 .head,#_wncht_n0 .head,#_wncht_n0 .body .me,#_wncht_n2 .body .me,#_wncht_n1 .body .me").css("background-color","rgba(80,138,178,0.5)");
			$("#_wncht_n3 .head,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.9)");
			$('#_wncht_n3 textarea').focus();
		});
		$('#_wncht_n3 textarea').focus(function() {
			$("#_wncht_n1 .head,#_wncht_n2 .head,#_wncht_n0 .head,#_wncht_n0 .body .me,#_wncht_n2 .body .me,#_wncht_n1 .body .me").css("background-color","rgba(80,138,178,0.5)");
			$("#_wncht_n3 .head,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.9)");
		});
		$('#_wncht_n3 textarea').focusout(function() {
			$("#_wncht_n3 .head,#_wncht_n3 .body .me").css("background-color","rgba(80,138,178,0.5)");
		});
	},1000);
}