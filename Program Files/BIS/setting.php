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
$move = $_GET['go'];

switch($move)
{

    case "update":
        $date = $_POST['data'];
        $setting_file = "setting_config.php";
        $setting = fopen($setting_file, 'w');
        fwrite($setting,$date);
        fclose($setting);
        ref('setting.php', 0);
    break;

    default:
    $setting_file = "setting_config.php";
    $setting = fopen($setting_file, 'r');
    //$data = fread($setting, filesize("setting_config.php"));
    $data = "";
    while(!feof($setting))
      {
        $data.= fgets($setting);
      }
    fclose($setting);

    print $easy->display('setting.tpl');


}
print $easy->display('footer.tpl');
?>
