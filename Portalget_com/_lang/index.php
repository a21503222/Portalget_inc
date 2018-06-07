<!-- HOME PAGE v8.2 -->

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/_tools/system/main_functions.php");
require_once $_SERVER['DOCUMENT_ROOT']."/_lang/package1.php";


// EN PT

if(!isset( explode(".", $_COOKIE['_sy'] )[1] )){$_tr_cookie_sy='EN';}else{$_tr_cookie_sy=explode(".", $_COOKIE['_sy'] )[1];} // SET AUTO DEFAULT

if( $_tr_cookie_sy == 'PT'){ $lngCD=1; $_tr=1;}else{ $lngCD=0; $_tr=0; }



$_lang=0;
/* Palavras do Sistema */

if($_lang==0){ // PT
	$tr_livenote=ucfirst(lang('note',$_lang,0)).' '.lang('live',$_lang,0);
	$tr_forumactions=ucfirst(lang('manage',$_lang,1)).' '.lang('forum',$_lang,0);
	$tr_creategroup=ucfirst(lang('create',$_lang,1)).' '.lang('group',$_lang,0);
	$tr_mygroups=ucfirst(lang('my',$_lang,0)).' '.lang('groups',$_lang,0);
	$tr_createtag=ucfirst(lang('create',$_lang,1)).' '.lang('tag',$_lang,0);
	$tr_mytags=ucfirst(lang('my',$_lang,3)).' '.lang('tags',$_lang,0);
	$tr_askquestion=ucfirst(lang('do',$_lang,0)).' '.lang('question',$_lang,0);
	$tr_viewquestions=ucfirst(lang('see',$_lang,1)).' '.lang('questions',$_lang,0);
	$tr_logout=ucfirst(lang('log out',$_lang,1));
	$tr_settings=ucfirst(lang('settings',$_lang,0));
	$tr_myevents=ucfirst(lang('my',$_lang,0)).' '.ucfirst(lang('events',$_lang,0));
	$tr_Managemyfriends=ucfirst(lang('manage',$_lang,0)).' '.ucfirst(lang('my',$_lang,0)).' '.ucfirst(lang('friends',$_lang,0));
	
}else{
	$tr_livenote=ucfirst(lang('live',$_lang, 0)).' '.lang('note',$_lang,0);
	$tr_forumactions=ucfirst(lang('forum',$_lang,0)).' '.lang('manage',$_lang,0);
	$tr_creategroup=ucfirst(lang('create',$_lang,0)).' '.lang('group',$_lang,0);
	$tr_mygroups=ucfirst(lang('my',$_lang,0)).' '.lang('groups',$_lang,0);
	$tr_createtag=ucfirst(lang('create',$_lang,0)).' '.lang('tag',$_lang,0);
	$tr_mytags=ucfirst(lang('my',$_lang,0)).' '.lang('tags',$_lang,0);
	$tr_askquestion=ucfirst(lang('ask',$_lang,0)).' '.lang('question',$_lang,0);
	$tr_viewquestions=ucfirst(lang('see',$_lang,1)).' '.lang('questions',$_lang,0);
	$tr_logout=ucfirst(lang('log out',$_lang,1));
	$tr_settings=ucfirst(lang('settings',$_lang,0));
	$tr_myevents=ucfirst(lang('my',$_lang,0)).' '.ucfirst(lang('events',$_lang,0));
	$tr_Managemyfriends=ucfirst(lang('manage',$_lang,0)).' '.ucfirst(lang('my',$_lang,0)).' '.ucfirst(lang('friends',$_lang,0));
}

$tr_remove = lang('remove',$_lang,0);


/* Palavras do Sistema */





/* PALAVRAS SOLTAS */

$tr_title=array('title', 'título');
$tr_description=array('Description', 'Descrição');
$tr_download=array('Download', 'Descarregar');
$tr_comment=array('Comment', 'Comentar');
$tr_report=array('Report', 'Denunciar');
$tr_toedit=array('Edit', 'Editar');
$tr_share=array('Share', 'Partilhar');
$tr_copy=array('Copy', 'Copiar');
$tr_copied=array('Copied', 'copiado');
$tr_lng=array('en', 'pt');
$tr_html_lang=array('en-en', 'pt-pt');
$tr_lng_Full=array('English', 'Português');
$tr_lng_Full_country=array('United Kingdom', 'Portugal');
$tr_next=array('Next', 'Proximo');
$tr_previous=array('Previous', 'Anterior');
$tr_finish=array('Finish', 'Finalizar');
$tr_pending=array('Pending', 'Pendente');
$tr_friends=array('Friends', 'Amigos');
$tr_follow=array('Follow', 'Seguir');
$tr_accept=array('Accept', 'Aceitar');
$tr_day=array('Day', 'Dia');
$tr_days=array('Days', 'Dias');
$tr_month=array('Month', 'Mês');
$tr_months=array('Months', 'Mêses');
$tr_year=array('Year', 'Ano');
$tr_years=array('Years', 'Anos');
$tr_hour=array('hour', 'hora');
$tr_hours=array('hours', 'horas');
$tr_minute=array('minute', 'minuto');
$tr_minutes=array('minutes', 'minutos');
$tr_second=array('second', 'segundo');
$tr_seconds=array('seconds', 'segundos');
$tr_january=array('January', 'Janeiro');
$tr_february=array('February', 'Fevereiro');
$tr_march=array('March', 'Março');
$tr_april=array('April', 'Abril');
$tr_may=array('May', 'Maio');
$tr_june=array('June', 'Junho');
$tr_july=array('July', 'Julho');
$tr_august=array('August', 'Agosto');
$tr_september=array('September', 'Setembro');
$tr_october=array('October', 'Outubro');
$tr_november=array('November', 'Novembro');
$tr_december=array('December', 'Dezembro');
$tr_male=array('Male', 'Masculino');
$tr_female=array('Female', 'Feminino');
$tr_other=array('Other', 'Outro');
$tr_gender=array('Gender', 'Gênero');
$tr_birth= array('Birth', 'Nascimento');
$tr_phone= array('Phone', 'Telemóvel');
$tr_street= array('Street', 'Rua');
$tr_country= array('Country', 'País');
$tr_nationality= array('Nationality', 'Nacionalidade');
$tr_profession= array('Profession', 'Profissão');
$tr_city=array('City', 'Cidade');
$tr_empty=array('Empty', 'Vazio');
$tr_with=array('with', 'com');
$tr_hangtags=array('Tags', 'Etiquetas');
$tr_hangtag=array('Tag', 'Etiqueta');
$tr_people=array('People', 'Pessoas');
$tr_search=array('Search', 'Procurar');
$tr_close=array('Close', 'Fechar');
$tr_and=array('and', 'e');
$tr_go=array('Go', 'Ir');
$tr_you=array('You', 'Você');
$tr_at=array('at', 'ás');
$tr_privacy=array('Privacy', 'Privacidade');
$tr_terms=array('Terms', 'Termos');
$tr_cookies=array('Cookies', 'Cookies');
$tr_more=array('More', 'Mais');
$tr_hi=array('Hi', 'Olá');
$tr_name=array('Name', 'Nome');
$tr_partilhar=array('Share', 'Partilhar');
$tr_of=array('of', 'das');
$tr_likes=array('Likes', 'Gosta');
$tr_like=array('Like', 'Gosta');
$tr_unknown=array('unknown', 'desconhecido');
$tr_views=array('Views', 'visualizações');
$tr_view=array('View', 'visualização');
$tr_user=array('User', 'Utilizador');
$tr_this=array('This', 'Este');
$tr_password=array('Password', 'Senha');
$tr_login=array('Login', 'Entra');
$tr_signup=array('Signup', 'Registra');
$tr_create=array('Create', 'Criar');
$tr_invalid=array('invalid', 'inválido');
$tr_the=array('The', 'O');

$tr_new=array('new','novo');
$tr_new1=array('new','novos');
$tr_select=array('select','selecione');
$tr_one=array('one','uma');
$tr_add=array('add','adiciona');
$tr_toadd=array('add','adicionar');
$tr_my=array('my','meu');
$tr_create=array('create','cria');
$tr_group=array('group','grupo');
$tr_ask=array('ask','pergunta');
$tr_home=array('home','casa');
$tr_your=array('your','seu');
$tr_more=array('more','mais');
$tr_close=array('close','fecha');
$tr_null=array('null','nulo');
$tr_is=array('is', 'é');
$tr_recent=array('recent','recente');
$tr_in=array('in','em');
$tr_of=array('of','de');
$tr_no=array('no','não');
$tr_not=array('not','não');
$tr_without=array('without','sem');
$tr_see=array('see','ver');
$tr_look=array('look','vê');
$tr_Drag=array('drag','arraste');
$tr_files=array('files','ficheiros');
$tr_here=array('here','aqui');
$tr_load=array('load','carregar');
$tr_to=array('to','para');
$tr_them=array('them','os');
$tr_the1=array('the','os');
$tr_url=array('url','url');
$tr_link=array('link','link');
$tr_maximum=array('maximum','máximo');
$tr_size=array('size','tamanho');
$tr_files=array('files','ficheiros');
$tr_for=array('for','para');
$tr_keyword=array('keyword','palavra-chave');
$tr_eg=array('eg','ex');
$tr_games=array('games','jogos');
$tr_videos=array('videos','videos');
$tr_lessons=array('lessons','aulas');

/* PALAVRAS SOLTAS */





$tr_createdsince = array('Created since', 'Criado desde');
$tr_selectatag = array('Select a Tag', 'Selecione uma etiqueta');
$tr_addtofavorites = array('Add to Favorites', 'Adicionar aos favoritos');
$tr_hidepublication = array('Hide publication', 'Ocultar a publicação');




$tr_viewmore = array('View more', 'Ver mais');


$tr_newmessage = array('New Message', 'Nova Mensagem');
$tr_backtothetop = array('Back to the top', 'Voltar ao topo');
$tr_realtime = array('Real time', 'Tempo Real');
$tr_closetome = array('Close to me', 'Perto de Mim');
$tr_toprated = array('Top rated', 'Mais votado');
$tr_myprofile = array('My profile', 'Meu perfil');
$tr_inbox = array('Inbox', 'Caixa de entrada');
$tr_homepage = array('Home page', 'Pagina inicial');

$tr_nulltitle = array('Null title', 'Sem título');
$tr_nulldescription = array('Null description', 'Sem descrição');
$tr_nullname = array('Null name', 'Sem nome');
$tr_findwhatyouarelookingfor = array('Find what you are looking for', 'Encontre o que procura');
$tr_thiswebpageisnotavailable = array('This webpage is not available', 'Esta página Web não está disponível');

$tr_emailoruser = array('Email or User', 'Email ou Usuário');
$tr_iforgotmypassword = array('I forgot my password', 'Esqueci minha senha');
$tr_firstnamelastname = array('First Name Last Name', 'Nome Apelido');
$tr_yournewpassword = array('Your New Password', 'Sua Nova Senha');
$tr_example1234 = array('example1234', 'exemplo1234');
$tr_nomearrobaexampledotcom = array('name@example.com', 'nome@exemplo.com');
$tr_nameuser = array('Name user', 'Nome do usuário');
$tr_youremail = array('Your email', 'Seu Email');
$tr_yourfullname = array('Your full name', 'Seu Nome Completo');
$tr_invalidname = array('Invalid name', 'Nome não válido');
$tr_pleaseenteryour = array('Please enter your', 'Insira corretamente o seu');

$tr_unexpectederror = array('Unexpected error', 'Erro inesperado');
$tr_recentactivities = array('Recent Activities', 'Atividades Recentes');
$tr_friendrequests = array('Friend requests', 'Pedidos de Amizade');

$tr_commonfriend = array('common friend', 'amigo em comum');
$tr_mutualfriends = array('mutual friends', 'amigos em comum');
$tr_surnameOPCs = array('Surname(s)', 'sobrenome(s)');
$tr_Thisuisaldyuseddotpleasechooseanother = array('This username is already being used. Please choose another.', 'Este nome de utilizador já está a ser usado. Por favor escolha outro.');

$tr_isalreadyinuse = array('is already in use', 'já está em uso');
$tr_chooseanother = array('Choose another', 'Escolha outro');
$tr_pleaseentera = array('Please enter a', 'Insira um nome de ');
$tr_pleaseenteryouremailaddress = array('Please enter your <strong>email</strong> address', 'Insira o seu endereço de <strong>e-mail</strong>');

$tr_hasalreadybeenregisteredbyanothermember = array('has already been registered by another member', 'já foi registrado por outro membro');
$tr_auto_requsit_password = array('Min: <strong> 6 char </ strong> and at least <strong> number(s) </ strong>, <strong> lowercase(s) </ strong>, <strong> uppercase(s) </ strong>', 'Min: <strong>6 caracteres</strong> e pelo menos <strong>número(s)</strong>, <strong>minúscula(s)</strong>, <strong>maiúscula(s)</strong>');
$tr_ihavereadandacceptthe = array('I have read and accept the', 'Eu li e aceito os');
$tr_ofusedot = array('of use.', 'de uso.');
$tr_generalconditions = array('General conditions', 'Condições Gerais');

$tr_postalcode = array('Postalcode', 'Código postal');
$tr_changeprofilephoto = array('Change profile photo', 'Alterar foto de perfil');

$tr_moreoptions = array('More options', 'Mais opções');

$tr_classof = array('Class of', 'Aula de');
$tr_livingroom = array('Living room', 'Sala');

$tr_welcomeMessagesFromTheSite = array('Welcome to our new website!', 'Seja bem-vindo ao nosso novo site!');
$tr_anerroroccurredPleasetryagain=array('An error occurred. Please try again', 'Ocoreu um erro, por favor tente novamente');





$tr_deslikes = array('Deslikes', 'Não gosta');
$tr_deslike = array('Deslike', 'Não gosta');


$tr_withoutdescription = array('Without description', 'Sem descrição');
$tr_untitled = array('Untitled', 'Sem título');

$trSYS_lkepostof = array('likes the publication of', 'gosta da publicação de');
$trSYS_cmtthepublshof = array('commented on the publication of', 'comentou à publicação de');
$trSYS_creatnewpublishintag = array('created a publication on the tag', 'criou uma publicação na etiqueta');
$trSYS_likyourstatus = array('like your status', 'gosta do seu estado');
$trSYS_talkaboutyou = array('talked about you about', 'falou de ti sobre');
$trSYS_wasadedtothegroup = array('was added to the group', 'foi adicionado ao grupo');
$trSYS_hasacceptedyourfriendshiprequest = array('has accepted your friendship request' ,'aceitou o seu pedido de amizade');




/*-- SMART FRASE --*/

if($_tr==0){
$ms_inf_v1=$tr_Drag[$_tr].' '.$tr_the1[$_tr].' '.$tr_files[$_tr].' '.$tr_here[$_tr].' '.$tr_to[$_tr].' '.$tr_load[$_tr].' '.$tr_them[$_tr].'.';
$ms_inf_v2=$tr_your[$_tr].' '.strtoupper($tr_url[$_tr]).' '.$tr_link[$_tr];
$ms_inf_v3=ucfirst($tr_maximum[$_tr].' '.$tr_size[$_tr].' '.$tr_for[$_tr].' '.$tr_new1[$_tr].' '.$tr_files[$_tr]);


}else if($_tr==1){
$ms_inf_v1=$tr_Drag[$_tr].' '.$tr_here[$_tr].' '.$tr_the1[$_tr].' '.$tr_files[$_tr].' '.$tr_to[$_tr].' '.$tr_them[$_tr].' '.$tr_load[$_tr].'.';
$ms_inf_v2=$tr_the[$_tr].' '.$tr_your[$_tr].' '.$tr_link[$_tr].' '.strtoupper($tr_url[$_tr]);
$ms_inf_v3=ucfirst($tr_size[$_tr].' '.$tr_maximum[$_tr].' '.$tr_for[$_tr].' '.$tr_new1[$_tr].' '.$tr_files[$_tr]);

}
$ms_inf_v1=ucfirst($ms_inf_v1);

/*-- SMART FRASE --*/
?>