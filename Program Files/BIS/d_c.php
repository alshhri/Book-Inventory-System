<?php

/*
Yanbu University College
Develped by Hassan Alshhri 8110210
2010
*/
session_start();

if(!session_is_registered(admin_login)){
header("location:login.php");
}
include("config.php");
include ("function.php");
include("easytemplate.php");
echo"<link rel='stylesheet' href='templates/style.css' type='text/css' />";
$easy = New EasyTemplate('templates','easycache');
$easy->Temp = 'templates';
$easy->Cache = 'easycache';
$usergroupid = $_SESSION['group'];
$move = $_GET['go'];

switch($move)
{

   default:
       print $easy->display('header.tpl');
    $qu = "select * from r_c where deliver='1' order by semester";
    print $easy->display('d_r.tpl');
}
print $easy->display('footer.tpl');
?>
