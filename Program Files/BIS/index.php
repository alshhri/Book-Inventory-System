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
print $easy->display('header.tpl');
$userid = $_SESSION['userid'];
$user = mysql_query("SELECT * FROM user WHERE id='$userid'");
while($userinfo = mysql_fetch_array($user))
    {
        $user_id = $userinfo['id'];
        $user_name = $userinfo['name'];
        $user_email = $userinfo['email'];
        $user_group = $userinfo['group'];
        $user_mobile = $userinfo['mobile'];
    }
    print mysql_error();
print $easy->display('home.tpl');
print $easy->display('footer.tpl');

?>