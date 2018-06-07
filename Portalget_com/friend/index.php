<?php
include_once($_SERVER['DOCUMENT_ROOT']."/main_class.inc");
include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/db.php");

$mcs = new main_class();
$conexao = $mcs->s_cx;

include_once($_SERVER["DOCUMENT_ROOT"]."/_tools/php/includes/general_functions.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

IF( $mcs->st_isLoged == 1){
    include_once($_SERVER['DOCUMENT_ROOT']."/friend/pg_log.inc");
}ELSE IF( $mcs->st_isLoged == 0){
    include_once($_SERVER['DOCUMENT_ROOT']."/friend/pg_vis.inc");
}

?>