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
    print $easy->display('add_user.tpl');
    break;

    case "adding":
    $name = make_safe($_POST['name']);
    $email = make_safe($_POST['email']);
    $password = trim($_POST['password']);
    $mobile = make_safe($_POST['mobile']);
    $group = make_safe($_POST['group']);
    // make sure the username is not there before
	$sql="SELECT * FROM user WHERE email='$email'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
    //end of making sure
	if(empty($name))
	{
		error_msg("Make sure you entred valid name");
	}
    //if count more than 0 , that mean there are some user having the same email
	elseif($count>=1)
	{
		error_msg("email already exists, please insert another email");
	}
	elseif(empty($password))
	{
		error_msg("Enter Password");
	}
	elseif(!eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-z]{2,4})$',$email))
	{
		error_msg("Make sure you entred valid email");
	}
	else
	{
		$password = md5(md5($password));
                $adding_q = mysql_query("INSERT INTO user VALUES('','$name','$email','$password','$mobile','$group')");
		if($adding_q){ok_msg("Been added successfully");ref("user.php",1);}
		else{error_msg("There is an error");exit();}
	}



    break;

    case "edit":
    $id_user = get_safe($_GET['id']);
    $selection= mysql_query("SELECT * FROM user WHERE id=$id_user");
    if(!$selection){exit("Error");}
    while($user = mysql_fetch_array($selection))
        {
		print $easy->display('edit_user.tpl');
	}
     break;

    case "editing":
    $id= get_safe($_GET['id']);
    $name = make_safe($_POST['name']);
    $email = make_safe($_POST['email']);
    $password = trim($_POST['password']);
    $mobile = make_safe($_POST['mobile']);
    $group = make_safe($_POST['group']);
    $old_email = make_safe($_POST['old_email']);
    // make sure the email is not there before
    $sql="SELECT * FROM user WHERE email='$email'";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
    //end of making sure
    if(empty($name))
    {
	error_msg("Make sure you entred valid name");
    }
    //if count more than 0 , that mean there are some user having the same name
    elseif(($count>=1)&&($email != $old_email))
    {
	error_msg("email already exists, please insert another email");
    }
    elseif(!eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-z]{2,4})$',$email))
    {
    	error_msg("Make sure you entred valid email");
    }
    elseif(empty($password))
    {
    	$update_user = mysql_query("UPDATE `user` SET `name`='$name',`email`='$email',`mobile`='$mobile',`group`='$group' WHERE id=$id");
	if($update_user)
	{
            ok_msg("Been edited successfully");
	}
	else
	{
            error_msg("Error");
            exit();
	}
	ref("user.php?go=edit&id=$id",1);
    }

    else
    {
        $password = md5(md5($password));
 	$update_user = mysql_query("UPDATE `user` SET `name`='$name',`email`='$email',`password`='$password',`mobile`='$mobile',`group`='$group' WHERE id=$id");
	if($update_user)
	{
            ok_msg("Been edited successfully");
	}
	else
	{
            error_msg("Error");
            exit();
	}
	ref("user.php?go=edit&id=$id",1);
    }
    break;

    case "delete":
        $id_del=get_safe($_GET['id']);
	$deleting = mysql_query("DELETE FROM user WHERE id=$id_del");
	if($deleting){ok_msg("record has been deleted");}else{error_msg("Error");exit();}
	ref("user.php",1);

        break;

    default:
    $qu = "select * from user";
    print $easy->display('user.tpl');



}
print $easy->display('footer.tpl');
?>