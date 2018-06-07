<?php
date_default_timezone_set('UTC');
//include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/main_class.inc");
//$mcs = new main_class();

$name = $_GET['name'];
$token = $_GET['token'];
$year = date('Y', time());
$title = $token.' é o seu '.$_GET['title'].' - '.'Portalget';
$email = $_GET['mail'];
$clink = $_GET['clink'];
$pub = $_GET['pub'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <title><?php echo $title; ?></title>
    </head>
    <body style="background-color:#f0f0f0;width:100%;" >
        
                           <center><div style="font-family:sans-serif;
                           color:#528bb2;font-size:28px;padding-top:5px;"
                           >Portalget, Inc</div>
                           </center>
        <div>
                <center>
                <div style="background-color:#f0f0f0;color:#444;
                font-family:Arial;font-size:14px;margin-top:20px;"
                >Olá <strong><?php echo $name; ?></strong>, recentemente registaste no Portalget.
                Confirme seu e-mail para ter acesso total ao site.</div>
                </center>
                    
            <br><br>
                            <center>
                <div style="width:85px;height:25px;
                background-color:e7e7e7;padding:5px 10px;
                padding-top:10px;font-weight:bold;
                font-family:Courier New;font-size:15px;
                " ><?php echo $token; ?></div>
                            </center>
            <br/>
                             <center>
                        <a href="<?php echo $clink; ?>" 
                         style="text-decoration:none;
                         color:#000;" ><div style="
                        -webkit-border-radius: 8;
                        -moz-border-radius: 8;
                        border-radius: 8px;
                        font-family: Arial;
                        color: #ffffff;
                        width:180px;
                        cursor:pointer;
                        font-size: 14px;
                        background: #528bb2;
                        padding: 10px 20px 10px 20px;
                        text-decoration:none;" 
                        >Confirmar agora!</div></a>
                                 </center>
            <br/>
            <center>
            <p><span style="
            color:#528bb2;font-family:Arial;font-size:12;width:630px;
            " >O Portalget permite-te partilhar os mais diversos
            tipos de conhecimento com todos seus amigos.</span></p>
            
            <?php if(isset($pub)){ ?>
            <br>
            <img src="<?php echo $pub; ?>" 
            width="630px" height="230px" ></img>
            <?php } ?>
            
            <br/><br>
            <div style="font-size:9px;color:#444;width:350px;"
            >Este e-mail confirma que você (ou alguém usando seu e-mail)
            criou uma conta no Portalget usando este e-mail.
            Não se cadastrou no Portalget? <a href='<?php echo $clink.'&cancel=true'; ?>' style='color:#444;' >
            Cancelar o pedido</a> <br/>
            Este e-mail foi enviado para <a href="mailto:<?php echo $email; ?>"
            style="color:#444;" ><?php echo $email; ?></a>.</div>
            <br/>
            <div style="font-family:Courier New;font-size:10px;padding:3px;color:#444;"
            >Copyright © <?php echo $year; ?> Portalget, Inc. - All Rights Reserved</div>
            </center>
        </div>
    </body>
</html>
