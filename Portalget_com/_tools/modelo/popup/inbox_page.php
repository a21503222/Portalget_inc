<style>

.row_inbox_inbox{
	width:170px;
    color:#508ab2;
    padding-right:7px;
	padding-left:5px;
	float:left;
	border: none;
    background-color: transparent;
	
	white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis;
	text-align:left;
}
.txt_time{
    float:right;
    color:#508ab2;
	width:75px;
	border: none;
    background-color: transparent;
	
	white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis;
}
.ico_v2{
    float:right;
	margin:0px 5px 0px 5px;
	z-index:99;
}
.ico_v3{
    float:right;
	margin:0px 5px 0px 5px;
	z-index:5;
}
.row_inbox_text{
	position:relative;
    color:#464646;
	left:-25px;
	width:590px;
	border: none;
    background-color: transparent;
	
	white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis;
}
.ico_tinbox{
    position:relative;
    padding-right:10px;
	float:left;
}
.search_inbox{
    position:relative;
    padding:7px 5px 7px 25px;
    width:100%;
    
    box-sizing: border-box;
    border: 1px solid #f1f1f1;
    font-size: 14px;
    color:#666;
    background-color: #fff;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
}

.inbox_ul_inbox{ list-style-type: none; padding: 0; margin: 0; }
.inbox_ul_inbox li a {
    border: 0.4px solid #fff; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f1f1f1;
    padding: 10px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 12px; /* Increase the font-size */
    display: block;
}
.inbox_ul_inbox li a:hover{background-color:#508ab2; border: 0.4px solid #fff;}

.opt_seemore_inbox{
    color:#508ab2;
    background-color:#fff;
    text-align:center;
    font-size:12px;
    padding:10px;
}
.opt_seemore_inbox:hover{ color:#fff; background-color:#508ab2; cursor:pointer;}

.icn_sttg_inbox{
    position:relative;
    float:right;
    top:8px;
    right:30px;
}
.icn_add_inbox{
    position:relative;
    top:8px;
    left:70px;
}
.inf_header_inbox{
    position:relative;
    color:#fff;
    font-size:14px;
    top:2.5px;
    left:10px;
}
.icn_header_inbox{
    position:relative;
    top:8px;
    left:5px;
}
.modal_head_inbox{
    background-color:#508ab2;
    width:100%;
    height:35px;
	z-index: 99; /* Sit on top */
}
.modal_body_inbox{
    background-color:#fff;
    width:100%;
    height:300px;
    overflow-y: auto;
	z-index: 99; /* Sit on top */
}
.modal_footer_inbox{
    position:relative;
    background-color:#fff;
    width:100%;
	z-index: 99; /* Sit on top */
}

/* Modal Content/Box */
.modal-content_inbox {
    margin: 10% auto; /* 15% from the top and centered */
    width: 80%; /* Could be more or less, depending on screen size */
	z-index: 99; /* Sit on top */
}

    /* The Modal (background) */
.modal_inbox {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 99; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* The Close Button */
.close_inbox {
    position:relative;
    top:2.5px;
    color: #f1f1f1;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close_inbox:hover,
.close_inbox:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


/*mozilla scrolbalken*/
@-moz-document url-prefix(http://),url-prefix(https://) {
scrollbar { -moz-appearance: none !important; background: rgb(0,255,0) !important; }
thumb,scrollbarbutton { -moz-appearance: none !important; background-color: rgb(0,0,255) !important; }
thumb:hover,scrollbarbutton:hover { -moz-appearance: none !important; background-color: rgb(255,0,0) !important; }
scrollbarbutton { display: none !important; }
scrollbar[orient="vertical"] {  min-width: 15px !important; }
}
/**/
::-webkit-scrollbar {background: transparent;}
::-webkit-scrollbar-thumb { background-color: rgba(0, 0, 0, 0.2); border: solid whiteSmoke 4px; }
::-webkit-scrollbar-thumb:hover { background-color: rgba(0, 0, 0, 0.3); }
.unselectme{
	-webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
	-khtml-user-select: none; /* Konqueror HTML */
    -moz-user-select: none; /* Firefox */
    -ms-user-select: none; /* Internet Explorer/Edge */
     user-select: none; 
}
</style>

<!-- The Modal -->
<div id="myModal_inbox" class="modal_inbox">

  <!-- Modal content -->
  <div class="modal-content_inbox">
	
    <div class="modal_head_inbox unselectme">
<span class="close_inbox unselectme" title="<?php echo $tr_close[$lngCD]; ?>" >&times;&nbsp;</span>
<span class="icn_header_inbox unselectme" ><img src="../image/internal_icon/v1/inbox-white.png" width="20px" height="20px" /></span>
<span class="inf_header_inbox unselectme" ><?php echo $tr_inbox[$lngCD]; ?> ( <span id="_int_total_inbox" ><?php echo $u_inbox_badge; ?></span> )</span>
<span class="icn_add_inbox unselectme" ><a href="#add" ><img src="../image/internal_icon/v1/add-white.png" width="20px" height="20px" title="<?php echo $tr_newmessage[$lngCD]; ?>" /></a></span>
<span class="icn_sttg_inbox unselectme" ><a href="#settings" ><img src="../image/internal_icon/v1/setting-white.png" width="20px" height="20px" title="<?php echo $tr_settings[$lngCD]; ?>" /></a></span>
    </div>
    <input onFocus="autoshowqueryinbox(this.value);" onChange="autoshowqueryinbox(this.value);" OnKeyUp="autoshowqueryinbox(this.value); send_temp_text_ck(this.value);" 
	OnKeyDown ="autoshowqueryinbox(this.value); send_temp_text_ck(this.value);"
	type="text" id="search_inbox" class="search_inbox" placeholder="<?php echo $tr_search[$lngCD]; ?>.."/>
    <div class="modal_body_inbox crollbar-container_inbox inner_inbox unselectme">
        <ul class="inbox_ul_inbox unselectme" >

 <!-- SHOW LIST RESULT --> <div id="autoinboxshowlist" ></div> <!-- SHOW LIST RESULT -->
            
        </ul>
    </div>
    <div class="modal_footer_inbox unselectme">
        <div class="opt_seemore_inbox unselectme" onclick="EvtSeeMore();" ><?php echo strtoupper($tr_viewmore[$lngCD]); ?></div>
    </div>
    
    
  </div>
  <!-- Modal content -->

</div>
<!-- The Modal -->

<input name="" id="temp_access_click_inbox" type="hidden" />

<script>
	autoshowqueryinbox('');
	function autoshowqueryinbox(x){
		var uloged = "<?php echo $u_usercod; ?>";
		var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			document.getElementById("autoinboxshowlist").innerHTML = this.responseText;
			}
	};

	xhttp.open("GET", "/_tools/modelo/smart-inbox-result.php?q="+x+"&u="+uloged+"&show=list", true);

	xhttp.send();
	}
	
	autocountqryinbox('');
	function autocountqryinbox(x){
		var uloged = "<?php echo $u_usercod; ?>";
		xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			document.getElementById("int_count_mail_total").innerHTML = this.responseText;
			}
	};

	xhttp.open("GET", "/_tools/modelo/smart-inbox-result.php?q="+x+"&u="+uloged+"&show=totalinbox", true);

	xhttp.send();
		
	}

function listEvt(x, n){
    var row_inbox = document.getElementById('row_inbox_inbox'+n); //ico_tinbox
    var row_text = document.getElementById('row_inbox_text'+n);
    var txt_time = document.getElementById('txt_time'+n);
    var ico_tbox = document.getElementById('ico_tinbox'+n);
    var icov2 = document.getElementById('ico_v2'+n);
    var icov3 = document.getElementById('ico_v3'+n);

    if(x=='e'){
        row_inbox.style.color=getCookie('_d095').split('*')[3];
        row_text.style.color=getCookie('_d095').split('*')[3];
        txt_time.style.color=getCookie('_d095').split('*')[3];
        icov2.src="/image/internal_icon/v1/trash-white.png";
        ico_tbox.src="/image/internal_icon/v1/mail-white.png";
    }else{
        row_inbox.style.color=getCookie('_d095').split('*')[2];
        row_text.style.color="#464646";
        txt_time.style.color=getCookie('_d095').split('*')[2];
        icov2.src="/image/internal_icon/v1/trash-blue.png";
        ico_tbox.src="/image/internal_icon/v1/mail-blue.png";
    }
}

function listEvtC(x){ if( document.getElementById("temp_access_click_inbox").value != 1 ){ location.href=getCookie('_d095').split('*')[0]+"/inbox/?mail="+x; } }
function EvtDelet(x){ location.href = "/inbox/do_what/delecte_mail.php?sn="+x+"&redirect="+"<?php echo $_SERVER['REQUEST_URI']; ?>"; }
function EvtSeeMore(){ alert('vendo mais aqui!'); }
function stopClickEvnt(x){ document.getElementById("temp_access_click_inbox").value=x; }

</script>