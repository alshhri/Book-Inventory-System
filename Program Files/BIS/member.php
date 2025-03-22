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
    case "search":
        $m_id = make_safe($_GET['id']);
        $m_type = make_safe($_GET['type']);
        $find =  mysql_query("SELECT * FROM member WHERE m_id='$m_id' and m_type='$m_type'");
        while($member = mysql_fetch_array($find))
            {
                    if($find)
            print $easy->display('member_info.tpl');
        else
            {
                error_msg("Error");
                exit();
            }
            }





        break;

    case "info":

        break;

   default:
       print $easy->display('header.tpl');
    $qu = "select * from member order by m_type,gender";
    print $easy->display('member.tpl');
    print $easy->display('footer.tpl');
}
?>
