<?php 

/*
Yanbu University College
Develped by Hassan Alshhri 8110210
2010
*/

// refresh function
 echo"
<html dir='ltr'>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>
<meta http-equiv='Content-Language' content='ar-sa'>

   <link rel='shortcut icon' href='favicon.ico' >
   <link rel='icon' type='image/gif' href='animated_favicon1.gif' >


";
//site information


function ref($page,$time)
{
	echo"<META HTTP-EQUIV='Refresh' CONTENT='$time;URL=$page'>";
}

// this will be display if the instruction done(blue msg) or not (red-msg)

function error_msg($msg)
{
	echo"<br><br><br><br><br><br>
<p align='center'><b><font size='4' color='#FF0000'>$msg</font></b></p>";
}
function ok_msg($msg)
{
	echo"<br><br><br><br><br><br>
<p align='center'><b><font size='4' color='#0000FF'>$msg</font></b></p>";
}

function make_safe($str)
{
	$str = str_replace("script","",$str);
    $str= str_replace("<","&l",$str);
    $str = str_replace(">","&",$str);
    $str = str_replace("select","*",$str);
    return htmlspecialchars(addslashes(trim($str)));
	
} 

function get_safe($no)
{
	$no=intval($no);
	return $no;
}



 


 
?> 