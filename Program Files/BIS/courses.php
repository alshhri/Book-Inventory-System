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

    case "add":
    print $easy->display('add_courses.tpl');
    break;

    case "adding":
        $code = make_safe($_POST['code']);
        $book_ISBN = make_safe($_POST['book_ISBN']);



	if(empty($code))
	{
		error_msg("Make sure you entred valid course code");
	}

	else
	{
                $adding_q = mysql_query("INSERT INTO courses VALUES('$code','$book_ISBN')");
		if($adding_q){ok_msg("Been added successfully");ref("courses.php",1);}
		else{error_msg("There is an error");exit();}
	}



    break;

    case "edit":
    $id_courses = make_safe($_GET['id']);
    $selection= mysql_query("SELECT * FROM courses WHERE code='$id_courses'");
    if(!$selection){exit("Error");}
    while($courses = mysql_fetch_array($selection))
        {
		print $easy->display('edit_courses.tpl');
	}
     break;

    case "editing":
    $id = make_safe($_GET['id']);
    $code = make_safe($_POST['code']);
    $book_ISBN = make_safe($_POST['book_ISBN']);
    if(empty($code))
    {
	error_msg("Make sure you entred valid course code");
    }

    else
    {
 	$update_courses = mysql_query("UPDATE `courses` SET `code`='$code',`book_ISBN`='$book_ISBN' WHERE code='$id'");
	if($update_courses)
	{
            ok_msg("Been edited successfully");
	}
	else
	{
            error_msg("Error");
            exit();
	}
	ref("courses.php?go=edit&id=$code",1);
    }
    break;

    case "delete":
        $id_del=make_safe($_GET['id']);
	$deleting = mysql_query("DELETE FROM courses WHERE code='$id_del'");
	if($deleting){ok_msg("record has been deleted");}else{error_msg("Error");exit();}
	ref("courses.php",1);

        break;

    default:
    $qu = "select * from courses";
    print $easy->display('courses.tpl');



}
print $easy->display('footer.tpl');

?>