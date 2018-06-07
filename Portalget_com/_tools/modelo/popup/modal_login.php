<div id="loginModal" class="modalframeLogin" >
<div class="frame_login modalLogin-content" >
<span class="close-login" >&times;</span>
<button style="position:absolute; margin-left:-20px; margin-top:-18.5px;" class="btn_login_this" ><?php echo $tr_login[$lngCD];?></button>
<button style="position:absolute; margin-left:35px; margin-top:-18.5px;" onclick="location.href='/signup/'" class="btn_signup_2ndplane" ><?php echo $tr_signup[$lngCD];?></button>
<div style="height:50px;" ></div>
<form method="post" action="/login/send.php" >
<center>
<div class="div_user" ><img src="../image/internal_icon/v1/user-blue-50.png" class="img_user" width="15px" height="15px" /><input type="text" name="user" class="input_user" id="input_user" placeholder=" <?php echo $tr_emailoruser[$lngCD]; ?>" /></div>
<div class="div_pass" ><img src="../image/internal_icon/v1/lock-blue-50.png" class="img_pass" width="15px" height="15px" /><input type="password" name="pass" class="input_pass" id="input_pass" placeholder=" <?php echo $tr_password[$lngCD]; ?>" /></div>
<div class="div_check" ><a href="#" style=" color:#666; font-size:13px; font-family: Arial;" ><?php echo $tr_iforgotmypassword[$lngCD]; ?>!</a></div>
<div class="div_submit" ><input class="btn_submit_login" type="submit" value="<?php echo $tr_login[$lngCD];?>" /></div>
</center>
</form>
</div>
</div>