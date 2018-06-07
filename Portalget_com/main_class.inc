<?php
date_default_timezone_set('UTC');
$date_time = date('Y-m-d H:i:s', time());
/**
 * Description of main_class
 *
 * @author Agostinho Pina Ramos
 */
class main_class {
    function main_class(){
        $this -> s_host = "portalget.com.mysql:3306";
        $this -> s_db = "portalget_com";
        $this -> s_user = "portalget_com";
        $this -> s_pass = "S4hWmRWucAahmEfkKVX2DyCD";
        $this -> s_cx = mysqli_connect($this->s_host,$this->s_user,$this->s_pass,$this->s_db) or die (mysqli_error($this->s_cx));
        
        // VARIABLE INITIAL
        $this -> s_id = explode(".", $_COOKIE['_sy'] )[0];
        
        $this -> st_session_key = 0;
        $this -> st_chatOrder='30!max.32!max.33!max.31!max.';
        $this -> st_ip='';
        $this -> st_lang='pt-pt';
        $this -> st_mod='';
        $this -> st_rank='';
        $this -> st_chatIsset='';
        if( explode(".", $_COOKIE['_sy'] )[0] > 0 ){ $this -> st_isLoged=1; }else{ $this -> st_isLoged=0; }
        $this -> st_title='Portalget';
        $this -> st_favicon='https://www.portalget.com/src/favicon.png';
        $this -> st_autor = 'Agostinho De Pina Ramos';
        $this -> st_retuned_page='';
        
        // -- DATABASE CONNECTION -- 

        IF($this -> s_id > 0){
            $sql = mysqli_query ($this -> s_cx, "SELECT * FROM vw_logeduser WHERE id = ".$this -> s_id." ");
            while($row=mysqli_fetch_array($sql)){
        $this -> u_name = $row['name'];
        $this -> u_user = $row['usercod'];
        $this -> u_mail = $row['email'];
        $this -> u_pass = $row['passw'];
        $this -> u_photo = $row['photo'];
        $this -> u_line = $row['line'];
        $this -> u_id = $row['id'];
        $this -> u_active = $row['active'];
        $this -> u_charset = $row['charset'];
        $this -> u_gender = $row['gender'];
        $this -> u_datebirth = $row['datebirth'];
        $this -> u_phone = $row['phone'];
        $this -> u_street = $row['street'];
        $this -> u_country = $row['country'];
        $this -> u_nationality = $row['nationality'];
        $this -> u_occupation = $row['occupation'];
        $this -> u_city = $row['city'];
        $this -> u_zipcode = $row['zip_code'];
        $this -> u_session = $row['session'];

        $sql = mysqli_query($this -> s_cx, "SELECT COUNT(send_datetime) AS inbox FROM vw_inbox WHERE id = ".$this -> s_id." ");
        while($row = mysqli_fetch_array($sql)){ $this -> u_inbox1 = $row['inbox']; }
        $sql = mysqli_query($this -> s_cx, "SELECT COUNT(readed_datetime) AS inbox FROM vw_inbox WHERE id = ".$this -> s_id." ");
        while($row = mysqli_fetch_array($sql)){ $this -> u_inbox2 = $row['inbox']; }
        $u_inbox = $this -> u_inbox1 - $this -> u_inbox2;
        if($u_inbox==0){$u_inbox_badge=''; $u_inbox_view=0; }else if($u_inbox<=9){ $u_inbox_badge=$u_inbox; $u_inbox_view=1; }else{ $u_inbox_badge='+9'; $u_inbox_view=1; } $u_notify_ATV = 3;
        $sql = mysqli_query($this -> s_cx, "SELECT * FROM tb_sys_default");
        while($row = mysqli_fetch_array($sql)){ $sys_rank_default = $row['rank']; }
            }
        }
    }
}
