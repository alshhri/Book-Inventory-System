<?php
session_start();
include("config.php");
include ("function.php");
include("easytemplate.php");
echo"<link rel='stylesheet' href='templates/style.css' type='text/css' />";
$easy = New EasyTemplate('templates','easycache');
$easy->Temp = 'templates';
$easy->Cache = 'easycache';


if($_REQUEST['login']=="1")
{
	$_SESSION['useremail'] = $_POST['T1'];
	$_SESSION['userpass'] = md5(md5($_POST['T2']));
	$email=$_SESSION['useremail'];
	$pass=$_SESSION['userpass'];
	$find = mysql_query("SELECT * FROM user WHERE email='$email' and password='$pass'");
	$count=mysql_num_rows($find);
	while($find1=mysql_fetch_array($find))
	{
		$_SESSION['userid'] = $find1[id];
                $_SESSION['group']  = $find1[group];

	}
	if(($find)&&($count>=1))
	{
		echo"
		<head>
		<meta http-equiv='Content-Language' content='en-us'>
		</head>

		<p align='center'>&nbsp;</p>
		<p align='center'>&nbsp;</p>
		<p align='center'><span lang='ar-sa'><font size='4' color='#800000'>You
		are logged ....... wait to go to the Control Panel</font></span></p>
		";
		session_register(admin_login);
		ref("index.php",2);
	}
	else
	{
		echo"


		<head>
		<meta http-equiv='Content-Language' content='en-us'>
		</head>

		<p align='center'>&nbsp;</p>
		<p align='center'>&nbsp;</p>
		<p align='center'><span lang='ar-sa'><font size='4' color='#800000'>Make
		sure the </span>User name or password <span lang='ar-sa'>&nbsp;are
		</span>Correct<span lang='ar-sa'>. Or you have permission to access this
		page</span></font></p>
		";
                ref("login.php",2);
	}
}

else
{
	session_unregister(admin_login);
	session_destroy();
	print $easy->display('login.tpl');
}


?>
