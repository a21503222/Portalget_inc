<div id="warp_chat_main" >
		 <div class="warp_chat_pos" id="warp_chat_pos" >
        <!-- CHAT WINDOWS -->
        <!-- CHAT WINDOWS -->

        <div style="position:relative;" id="windowsChat00" > </div>
        <!-- MY CHAT2 -->
        <div style="position:relative;" id="windowsChat01" > </div>
        <!-- MY CHAT3 -->
        <div style="position:relative;" id="windowsChat02" > </div>

        <!-- CHAT WINDOWS -->
        <!-- CHAT WINDOWS -->
        <div style="position:relative; display:none; " id="windowsChat0F" >
        <div class="grpelem warp_s3243" id="u28417" ></div>
                                <div class="museBGSize clearfix grpelem warp_s3243" id="u28418" >

                                        <div class="grpelem" id="u28427" ></div>
                                         <div class="clearfix grpelem" id="u28428-4" >
                                        <p><span id="u28428" >0</span></p>
                                         </div>
                                </div>


                        <div class="PamphletWidget clearfix grpelem" id="pamphletu28478" >
                         <div class="popup_anchor" id="u28479popup" >
                          <div class="ContainerGroup clearfix" id="u28479" >
                           <div class="Container invi grpelem" id="u28480" ></div>
                          </div>
                         </div>
                        </div>
                        <div class="PamphletWidget clearfix grpelem" id="pamphletu28489" >
                         <div class="popup_anchor" id="u28492popup" >
                          <div class="ContainerGroup clearfix" id="u28492" >
                           <div class="Container invi grpelem" id="u28493" ></div>
                          </div>
                         </div>

                        </div>
                        <div class="PamphletWidget clearfix grpelem" id="pamphletu28500" >
                         <div class="popup_anchor" id="u28507popup" >
                          <div class="ContainerGroup clearfix" id="u28507" >
                           <div class="Container invi grpelem" id="u28508" >

                                   <div id="rowChat_leftover" ></div>

                           </div>
                          </div>
                         </div>

                         <div class="ThumbGroup clearfix grpelem warp_s3243" id="u28509" >
                          <div class="popup_anchor" id="u28510popup" >
                           <div class="Thumb popup_element" id="u28510" ></div>
                          </div>
                         </div>

                        </div>

        </div>
</div>
 </div>

<script language="javascript" >
        class varclass {
            get chatpos() {
                return this.constructor.chatpos;
            }
        }
        varclass.chatpos = getCookie('_query_chat');
        (function(){
                if( varclass.chatpos !== getCookie('_query_chat')){
                    setCookie('_query_chat', varclass.chatpos ,30,'Y');
                }
                setTimeout(arguments.callee, 3800);
        })();
        
        
</script>


<script language="javascript"  >

        var arr_warp_chat = new Array('u28407:u28528','u28534:u28640','u28646:u28752');
        setCookie('_session_key_','546a5d75d2f826dba2fa1',30,'Y');

	var ar = new Array(['28754','28648','28753','28647'], ['28530','28536','28641','28535'], ['28530','28409','28529','28408']);
	var nftAA = new Array(['28756','28757'],['28758','28759'],['28760','28761']);
   
    // <!-- Load My Chats -->
            if(parseInt(getCookie('_query_chat').split('.').length-1)<=0){
                    //alert('NAO EXISTEM JANELAS ABERTAS! :(');
            }else{
                    _load_chat();
            }
    // <!-- Load My Chats -->
  
  function ParseSaveduserinChat(d){
        xp = new XMLHttpRequest();
        xp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                        $("#rowChat_leftover").html(this.responseText);
                }};
        xp.open("GET", "/_tools/Qrypage/_chat_warp_wX.php?mode=leftover&data="+d, true);
        xp.send();
        xp2 = new XMLHttpRequest();
        xp2.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    $("#u28428").html(this.responseText);
                }};
        xp2.open("GET", "/_tools/Qrypage/_chat_warp_wX.php?mode=leftover_count&data="+d, true);
        xp2.send();
  }

    function getPosbyID( id ) {
        var ps = -1;
        for(i=0;i<smplCde(varclass.chatpos,0).split(':').length-1;i++){
            if( '!'+id+'!' === '!'+smplCde(varclass.chatpos,0).split(':')[i]+'!' ){
                ps = i;
            }
        }
        return ps;
    }
    
    function ATpos(x){
        let maxPos = smplCde(varclass.chatpos,0).split(':').length-1;
        if( maxPos >= x && maxPos > 3){
            x = maxPos - x;
        }
     return x;
    }
    
  var auto_saveText = 0; // SALVAR RASCUNHO AUTO
  function load_js_functions() {
		  setTimeout(function(){
            if( auto_saveText === 1 ){
                $("#windowsChat00 #widgetu899_input").text( getCookie('cht_tempdraft'+smplCde(varclass.chatpos,0).split(':')[SMRTpos(0)] ));
                $("#windowsChat01 #widgetu899_input").text( getCookie('cht_tempdraft'+smplCde(varclass.chatpos,0).split(':')[SMRTpos(1)] ));
                $("#windowsChat02 #widgetu899_input").text( getCookie('cht_tempdraft'+smplCde(varclass.chatpos,0).split(':')[SMRTpos(2)] ));
            }else{
                $("#windowsChat00 #widgetu899_input").text('');saveDigWordCK(0,1);
                $("#windowsChat01 #widgetu899_input").text('');saveDigWordCK(1,1);
                $("#windowsChat02 #widgetu899_input").text('');saveDigWordCK(2,1);
            }
            
            $("#u28410").click(function() { onWritingms(0);
              setTimeout(function(){ saveDigWordCK(0,1); },450);
              sendText_Chat( smplCde(varclass.chatpos,0).split(':')[0] , $("#windowsChat00 #widgetu899_input").val(), 0);
            });

            $("#u28537").click(function() { onWritingms(1);
              setTimeout(function(){ saveDigWordCK(1,1); },450);
              sendText_Chat( smplCde(varclass.chatpos,0).split(':')[1] , $("#windowsChat01 #widgetu899_input").val(), 1);
            });

            $("#u28649").click(function() { onWritingms(2);
                setTimeout(function(){ saveDigWordCK(2,1); },450);
              sendText_Chat( smplCde(varclass.chatpos,0).split(':')[2] , $("#windowsChat02 #widgetu899_input").val(), 2);
            });

            $('#windowsChat00 #widgetu899_input').on('change keyup paste', function (e) {
                    onWritingms(0);
                    setTimeout(function(){ saveDigWordCK(0,0); },450);
                    if ((e.keyCode === 13 || e.keyCode === 10) && !e.shiftKey && $('#windowsChat00 #widgetu899_input').val() !=='' && $('#windowsChat00 #widgetu899_input').val() !== ' ' ){
                            sendText_Chat( smplCde(varclass.chatpos,0).split(':')[SMRTpos(0)] , $("#windowsChat00 #widgetu899_input").val(), 0);
                            saveDigWordCK(0,1);
                    }
            });

            $('#windowsChat01 #widgetu899_input').on('change keyup paste', function (e) {
                    onWritingms(1);
                    setTimeout(function(){ saveDigWordCK(1,0); },450);
                    if ((e.keyCode === 13 || e.keyCode === 10) && !e.shiftKey && $('#windowsChat01 #widgetu899_input').val() !=='' && $('#windowsChat01 #widgetu899_input').val() !== ' ' ){
                            sendText_Chat( smplCde(varclass.chatpos,0).split(':')[SMRTpos(1)] , $("#windowsChat01 #widgetu899_input").val(), 1);
                            saveDigWordCK(1,1);
                    }
            });

            $('#windowsChat02 #widgetu899_input').on('change keyup paste', function (e) {
                    onWritingms(2);
                    setTimeout(function(){ saveDigWordCK(2,0); },450);
                    if ((e.keyCode === 13 || e.keyCode === 10) && !e.shiftKey && $('#windowsChat02 #widgetu899_input').val() !=='' && $('#windowsChat02 #widgetu899_input').val() !== ' ' ){
                            sendText_Chat( smplCde(varclass.chatpos,0).split(':')[SMRTpos(2)] , $("#windowsChat02 #widgetu899_input").val(), 2);
                            saveDigWordCK(2,1);
                    }
            });
            $('textarea').keypress(function(event) {  if (event.keyCode === 13 && !event.shiftKey ) { event.preventDefault(); }});
            
     },500);
  }
  
	function onWritingms(ps){
		var obj = $('#windowsChat0'+ps+' #widgetu899_input');
		setTimeout(function(){
			if(obj.val().length>2998){ obj.css("background-color","rgba(255,0,0,0.45)");
			}else{ obj.css("background-color","#fff"); } 
		},800);
	 return obj.val().length;
	}
	function saveDigWordCK(x,y){
                var id = smplCde(varclass.chatpos,0).split(':')[x];
		setTimeout(function(){
                        if( y===0 ){
                            if($('#windowsChat0'+x+' #widgetu899_input').val()===''){
                            setCookie('cht_tempdraft'+id,'',-1,'M');
                            }else{ setCookie('cht_tempdraft'+id, $('#windowsChat0'+x+' #widgetu899_input').val(),5,'M'); }
                        }else{
                            setTimeout(function(){
                                setCookie('cht_tempdraft'+id,'',-1,'M');
                            },500);
                        }
		},500);
	}
	
	var vt_4375245=0;
	function sendText_Chat(fid,t,p){
            if(t.length>=0 && t!==''){
            var xhttp;
            xhttp = new XMLHttpRequest();
            if($.isNumeric(fid)===true){
                xhttp.open("GET", "/_tools/modelo/app/app_sendText_chat.php?FRND="+fid+"&TEXT="+config_breack_line(t)+"&nm=1", true);
                xhttp.send();
            }else{
                xhttp.open("GET", "/_tools/modelo/app/app_sendText_chat.php?CODEGROUP="+fid+"&TEXT="+config_breack_line(t)+"&nm=0", true);
                xhttp.send();
            }
            
            setTimeout(function(){
                $("#windowsChat0"+p+" #widgetu899_input").val('');
                _load_row_chat(p,fid);
                _init_downscrl_cat(p);
            },450);
            vt_4375245=(datetime()+t+fid);
            } 
	}
	
	function config_breack_line(x){
                x=x.replace(new RegExp('\n', 'g'), '<break/>');
                return x;
	}
        
        function _load_chat_BY1(id){
            let ps = lstChtClsed();
            let n=varclass.chatpos.split('.').length-1;
            var cnfrm = 0;
            if( occurrences(varclass.chatpos,id+'!x.') < 1 ){
            if( occurrences(varclass.chatpos,id+'!o.') < 1 ){
                cnfrm = 1;
            }}
            if( (id > 0 || id.length > 4) && cnfrm === 1 && n >= 3){
                var str=''; var gyh; var t; var y;
                gyh = 2 - ps;
                for(t=0;t<n-gyh;t++){
                    str = str + smplCde(getCookie('_query_chat'),0).split(':')[t]+'!x.';
                }
                    str = str + id+'!x.';
                for(y=t;y<t+gyh;y++){
                    str = str + smplCde(getCookie('_query_chat'),0).split(':')[y]+'!x.';
                }
                varclass.chatpos=str;
                setTimeout(function(){
                    _mode_windows_chat(ps,'x',id, 1);
                    if(n>3){ displayMoreChat(1); ParseSaveduserinChat(varclass.chatpos); }else{ displayMoreChat(0);  }
                    refreshInfoChat(ps);
                },480);
            }
            if( id<1 ){
                return -1;
            }
        }
        
        function GET_chat(id){
            add_next_chatPs(id);
        }
        
        function LET_chat(id,ps){
            if( ps >= 0 ){
                setTimeout(function(){
                    for(i=-4;i<lstChtClsed();i++){ _load_chat(); }
                },500);
                close_chat(id,ps);
            }else{
                del_next_chatPs(id);
                setCookie('cht_tempdraft'+id,'',-1,'D');
            }
        }
        
        function lstChtClsed(){
            var min=99999; var pos=-1;
            for(i=0;i<3;i++){
                if( $("#windowsChat0"+i+" p").text().length < min ){
                    min = $("#windowsChat0"+i+" p").text().length;
                    pos = i;
            }}
            if(min>0){ return -1; }
          return pos;
        }
        
	/* LOAD PRINCIPAL */
	function _load_chat(){
		let k=0, n=getCookie('_query_chat').split('.').length;
		for(let i=parseInt(n-4);i<parseInt(n);i++){
		setTimeout(function(){
                    if(k<3){
                        _mode_windows_chat(k,varclass.chatpos.split('.')[i].split('!')[1],varclass.chatpos.split('.')[i].split('!')[0], 1);
                        k++;
                    }
                    if(n>4){ displayMoreChat(1); ParseSaveduserinChat(varclass.chatpos); }else{ displayMoreChat(0);  }
                },450);}}
	/* LOAD PRINCIPAL */
	
	function _load_row_chat(ps,ids) {
		$("#windowsChat0"+ps).css("display",'block');
		xp2 = new XMLHttpRequest();
		xp2.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			$("#_chat_warp_w"+ps).html( this.responseText );
		}};
		xp2.open("GET", "/_tools/Qrypage/_chat_warp_wX.php?mode=row&id="+ids, true);
		xp2.send();
	}
        
	function _init_downscrl_cat(ps){
		setTimeout(function(){ if(ps!==2){
			/*$("#windowsChat0"+ps+" .warp_chat_visual").scrollTop(99999);*/
		}else{ setTimeout(function(){ /*$("#windowsChat02 .warp_chat_visual").scrollTop(99999);*/ },500); }},2800);
	}
	var fdgrr = 0;
	function _mode_windows_chat(ps, mod, id, bool){
		var q='',w='',e='', err=0;
		q=$(".tmpdata #core7").val().split('.')[0];
		w=$(".tmpdata #core7").val().split('.')[1];
		e=$(".tmpdata #core7").val().split('.')[2];
		if(q==='undefined'){q='o.';}if(w==='undefined'){w='o.';}if(e==='undefined'){e='o.';}
		if(ps===0){ q=mod; }else if(ps===1){ w=mod; }else if(ps===2){ e=mod; }
		$(".tmpdata #core7").val(q+"."+w+"."+e+".");
//		MychatCTRL('add',id);
                if( smplCde(varclass.chatpos,0).split(':')[ps] === id ){ err=-1; }else{ err=id+':'+ps; }
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState === 4 && this.status === 200) {
				$("#windowsChat0"+ps).html(this.responseText);
				monitor_chat(mod,ps);
				load_js_functions();
				_load_row_chat(ps,id);
			}};
		xhttp.open("GET", "/_tools/Qrypage/_chat_warp_mode.php?mode="+mod+"&ps="+ps+"&id="+id+"&ative="+bool, true);
		xhttp.send();
          return err;
	}
	
	function datetime(){
            var cd = new Date(); 
            var dt = cd.getFullYear()+"-"
            + (cd.getMonth()+1)+"-" 
            + cd.getDate()+" "  
            + cd.getHours()+":"  
            + cd.getoutes()+":" 
            + cd.getSeconds();
	return dt;
	}
	
        function occurrences(string, subString, allowOverlapping) {
            string += "";
            subString += "";
            if (subString.length <= 0) return (string.length + 1);
            var n = 0,
            pos = 0,
            step = allowOverlapping ? 1 : subString.length;
            while (true) {
                pos = string.indexOf(subString, pos);
                if (pos >= 0) {
                    ++n;
                    pos += step;
                } else break;
            }
            return n;
        }
        
	function monitor_chat(x,p){
            var a=new Array('u28526','u28638','u28750');
            if(x==='x'){
                    $("#windowsChat0F").css("bottom","-10px");
            }else if(x==='o' && $("#windowsChat0F").css("bottom")!=='-10px' ){
                    $("#windowsChat0F").css("bottom","0px");
            }
            $("#"+a[p]).css("bottom","-10px");
            wnd_smart_pos();
	}
	
	function displayMoreChat(x){ var dat='';
            if(x===1){ $("#windowsChat0F").css("display",'block');
            }else{ $("#windowsChat0F").css("display",'none'); }
	}
        
	function click_warp_chat(x,y){
            if($("#windowsChat0"+x).html()!==''){
            var id = varclass.chatpos.split('.')[x].split('!')[0];
            if(x===0){
                    if(y===1){ _mode_windows_chat(x, 'x', id, 1);
                    }else{ _mode_windows_chat(x, 'o', id, 1); }
            }else if(x===1){
                    if(y===1){ _mode_windows_chat(x, 'x', id, 1);
                    }else{ _mode_windows_chat(x, 'o', id, 1); }
            }else if(x===2){
                    if(y===1){ _mode_windows_chat(x, 'x', id, 1);
                    }else{ _mode_windows_chat(x, 'o', id, 1); }
	}}}
	
	function close_chat(id,ps){
            $("#windowsChat0"+ps).html("");
            del_next_chatPs(id);
            setCookie('cht_tempdraft'+id,'',-1,'D');
	}
        
        function smplCde(s, x){
            if( x===0 ){
                return s.replace(new RegExp('x', 'g'), 'o').replace(new RegExp('!o.', 'g'), ':');
            }
        }
	
	function getHeightPGd(){
		alert( $("#u28639").height() );
	}
	
        //TODO AINDA FALTA******************************************************
	function add_next_chatPs(id){
            var query_chat = getCookie('_query_chat');
            if( query_chat.split('!').length-1 < 20 ){
                if(  query_chat.split('.').length-1 === 2 && query_chat.split('!').length-1 === 1  ){
                    query_chat = query_chat.replace('..','.');
                }
                query_chat = query_chat + id+"!x.";
                if(  query_chat.split('.').length-1 === 1 && query_chat.split('!').length-1 === 1  ){
                    query_chat = query_chat + '.';  
                }
                if( (query_chat.match(new RegExp(id+"!x.", "g")) || []).length <= 1 ){
                if( (query_chat.match(new RegExp(id+"!o.", "g")) || []).length <= 1 ){
                        varclass.chatpos=query_chat;
                }}
                _load_chat();
                _init_downscrl_cat(getPOSbyID(id));
            }
	}
        
        function getPOSbyID(id){
            let n = smplCde(varclass.chatpos,0).split(':').length-1;
            var pos=-1;
            for(i=0;i<n;i++){
                if( ListChat(i) === id+'' ){
                    pos = i;
                }
            }
          return pos;
        }
        
        function ListChat(x){
            x=smplCde(varclass.chatpos,0).split(':')[x];
            return x;
        }
        
        function del_next_chatPs(id){
            var query_chat = getCookie('_query_chat');
            if(  query_chat.split('.').length-1 === 2 && query_chat.split('!').length-1 === 1  ){
                query_chat = query_chat.replace('..','.');
            }
            query_chat = query_chat.replace(id+"!x.",'');
            if(  query_chat.split('.').length-1 === 1 && query_chat.split('!').length-1 === 1  ){
                query_chat = query_chat + '.';  
            }
            varclass.chatpos=query_chat;
            set_my_log(query_chat);
            _load_chat();
        }
	
        function wnd_smart_pos(){"o.o.o."==$(".tmpdata #core7").val()?($("#windowsChat00").css("bottom","10px"),$("#windowsChat01").css("bottom","10px"),$("#windowsChat02").css("bottom","10px"),$("#windowsChat0F").css("bottom","0px"),$("#windowsChat01").css("left","-60px"),$("#windowsChat02").css("left","-121px")):"o.o.x."==$(".tmpdata #core7").val()?($("#windowsChat00").css("bottom","0px"),$("#windowsChat01").css("bottom","0px"),$("#windowsChat02").css("bottom","0px"),$("#windowsChat0F").css("bottom","-10px"),$("#windowsChat01").css("left","-60px"),$("#windowsChat02").css("left","-121px")):"o.x.o."==$(".tmpdata #core7").val()?($("#windowsChat00").css("bottom","0px"),$("#windowsChat01").css("bottom","0px"),$("#windowsChat02").css("bottom","0px"),$("#windowsChat0F").css("bottom","-10px"),$("#windowsChat01").css("left","-60px"),$("#windowsChat02").css("left","-82.5px")):"o.x.x."==$(".tmpdata #core7").val()?($("#windowsChat00").css("bottom","0px"),$("#windowsChat01").css("bottom","0px"),$("#windowsChat02").css("bottom","0px"),$("#windowsChat0F").css("bottom","-10px"),$("#windowsChat01").css("left","-60px"),$("#windowsChat02").css("left","-80px")):"x.o.o."==$(".tmpdata #core7").val()?($("#windowsChat00").css("bottom","0px"),$("#windowsChat01").css("bottom","0px"),$("#windowsChat02").css("bottom","0px"),$("#windowsChat0F").css("bottom","-10px"),$("#windowsChat01").css("left","-21px"),$("#windowsChat02").css("left","-82.2px")):"x.o.x."==$(".tmpdata #core7").val()?($("#windowsChat00").css("bottom","0px"),$("#windowsChat01").css("bottom","0px"),$("#windowsChat02").css("bottom","0px"),$("#windowsChat0F").css("bottom","-10px"),$("#windowsChat01").css("left","-21px"),$("#windowsChat02").css("left","-81px")):($(".tmpdata #core7").val(),$("#windowsChat00").css("bottom","0px"),$("#windowsChat01").css("bottom","0px"),$("#windowsChat02").css("bottom","0px"),$("#windowsChat0F").css("bottom","-10px"),$("#windowsChat01").css("left","-21px"),$("#windowsChat02").css("left","-42.2px")),-1==$(".tmpdata #core7").val().indexOf("x.")&&($("#windowsChat00").css("bottom","10px"),$("#windowsChat01").css("bottom","10px"),$("#windowsChat02").css("bottom","10px"))}
  
            function refreshInfoChat(ps){ 
        var cvs_name = new Array('u28409-4:u28530-4','u28536-4:u28530-4','u28648-4:u28754-4');
        var cvs_stus = new Array('u28408:u28529','u28535:u28641','u28647:u28753');
        var name, stus, id; id=smplCde(varclass.chatpos,0).split(':')[ SMRTpos(ps) ];
        xp2 = new XMLHttpRequest();
        xp2.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    name=this.responseText.split(':')[0];
                    stus=this.responseText.split(':')[1];
                    $('#'+cvs_name[ps].split(':')[0]+' p').html(name);
                    $('#'+cvs_name[ps].split(':')[1]+' p').html(name);
                    $('#'+cvs_stus[ps].split(':')[0]).css('background-color',stus);
                    $('#'+cvs_stus[ps].split(':')[1]).css('background-color',stus);
                }};
        xp2.open("GET", "/_tools/Qrypage/_chat_warp_wX.php?mode=info&id="+id, true);
        xp2.send();
        
    }
    
    function SMRTpos(ps){ var itr=0;
        let maxPos = smplCde(varclass.chatpos,0).split(':').length-1;
        if( maxPos >= 2 ){
            ps = 2 - ps;
            if( maxPos > 2 ) itr=-1;
        }else{
            ps = maxPos - ps;
        } ps = maxPos - ps;
        if(ps<0){ ps=0; }
        
      return ps+itr;
    }
    
    // AUTO REFRESH CHAR TEXT
    (function(){
        for(i=0;i<3;i++){
            chat_callText(i);
        }
        
        setTimeout(arguments.callee, 500);
    })();
    
    
    // AUTO REFRESH CHAR TEXT

    var cntg=0;

    function chat_callText(x){
        if( $("#windowsChat0"+x+" p").text().length > 0 ){
            refreshInfoChat(x);OnChangeTxt(x);
            _load_row_chat(x,smplCde(varclass.chatpos,0).split(':')[SMRTpos(x)]);
            if( cntg<10 ){ $("#windowsChat0"+x+" .warp_chat_visual").scrollTop(9999999); cntg++; }
        }
    }
    
    var max=-1;
    function OnChangeTxt(ps){
        if( $("#windowsChat0"+ps+" .warp_chat_visual").text().length-1 > max ){
            $("#windowsChat0"+ps+" .warp_chat_visual").scrollTop(9999999);
            max = $("#windowsChat0"+ps+" .warp_chat_visual").text().length-1;
            refreshInfoChat(ps);
        }
        if(max>=18450){ max=-1; }
    }
    
</script>