<?php

/*
Yanbu University College
Develped by Hassan Alshhri 8110210
2010
*/
$dbserver="localhost";		
$dbusername="root";
$dbpassword="123321";
$dbname="bis";
include("setting_config.php");


$db_conn = mysql_connect($dbserver, $dbusername, $dbpassword) or die("unable to connect to the database");
  mysql_select_db($dbname, $db_conn) or die("unable to select the database");

	
?>
