sec_tag_auto();
function sec_tag_auto(){
	if(getCookie('_rank').split('.')[0]=='nearme'){
		$(".recent").attr('id','re_cllt_0');
		$(".nearme").attr('id','ne_cllt_1');
		$(".rating").attr('id','ra_cllt_0');
	}else if(getCookie('_rank').split('.')[0]=='rating'){
		$(".recent").attr('id','re_cllt_0');
		$(".nearme").attr('id','ne_cllt_0');
		$(".rating").attr('id','ra_cllt_1');
	}else{ 
		$(".recent").attr('id','re_cllt_1');
		$(".nearme").attr('id','ne_cllt_0');
		$(".rating").attr('id','ra_cllt_0');
	}
	
	if(getCookie('_rank').split('.')[1]=='people'){
		$("#sec_tab_people").attr('class','sec_tab_1');
		$("#sec_tab_tag").attr('class','sec_tab_0'); 
	}else{
		$("#sec_tab_people").attr('class','sec_tab_0');
		$("#sec_tab_tag").attr('class','sec_tab_1');
	}
}

$("#logo").click(function(){ location.href='/'; });
$("#m1").click(function(){ document.getElementById("mainDropdownMenu").classList.toggle("show"); });
$("#m2").click(function(){ location.href='/profile/'; });

var modal_inbox = document.getElementById('myModal_inbox');
var close_inbox = document.getElementsByClassName("close_inbox")[0];

$("#m3").click(function(){ $("#badge_bar").hide(); modal_inbox.style.display = "block"; autoshowqueryinbox(''); autocountqryinbox(''); });
$("#badge_bar").click(function(){ $("#badge_bar").hide(); modal_inbox.style.display = "block"; autoshowqueryinbox(''); autocountqryinbox(''); });

close_inbox.onclick = function() { modal_inbox.style.display = "none"; }
window.onclick = function(event) { if (event.target == modal_inbox) { modal_inbox.style.display = "none"; } }

$("#m4").click(function(){ location.href='/home/'; });
$("#m5").click(function(){ location.href='/create/'; });
$("#m6").click(function(){ location.href='/search/'; });

if(window.location.href.split('/')[3]=='profile'){ $("#m2").attr('class','menu_bar_active'); }
if(window.location.href.split('/')[3]=='inbox'){ $("#m3").attr('class','menu_bar_active'); }
if(window.location.href.split('/')[3]=='home'){ $("#m4").attr('class','menu_bar_active'); }
if(window.location.href.split('/')[3]=='create'){ $("#m5").attr('class','menu_bar_active'); }
if(window.location.href.split('/')[3]=='search'){ $("#m6").attr('class','menu_bar_active'); }

$("#sec_tab_people").click(function(){
	setCookie('_rank', getCookie('_rank').split('.')[0]+'.'+'people'+'.'+getCookie('_rank').split('.')[2]+'.'+getCookie('_rank').split('.')[3] ,30,'m');
	sec_tag_auto();
	display_result_list();
});

$("#sec_tab_tag").click(function(){
	setCookie('_rank', getCookie('_rank').split('.')[0]+'.'+'tag'+'.'+getCookie('_rank').split('.')[2]+'.'+getCookie('_rank').split('.')[3] ,30,'m');
	sec_tag_auto();
	display_result_list();
});

$(".recent").click(function(){
	setCookie('_rank', 'recent'+'.'+getCookie('_rank').split('.')[1]+'.'+getCookie('_rank').split('.')[2]+'.'+getCookie('_rank').split('.')[3] ,30,'m');
	location.reload();
});
$(".nearme").click(function(){
	setCookie('_rank', 'nearme'+'.'+getCookie('_rank').split('.')[1]+'.'+getCookie('_rank').split('.')[2]+'.'+getCookie('_rank').split('.')[3] ,30,'m'); 
	location.reload();
});
$(".rating").click(function(){
	setCookie('_rank', 'rating'+'.'+getCookie('_rank').split('.')[1]+'.'+getCookie('_rank').split('.')[2]+'.'+getCookie('_rank').split('.')[3] ,30,'m');
	location.reload();
});

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
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