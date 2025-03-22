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

    case "add":
    print $easy->display('header.tpl');
    print $easy->display('add_books.tpl');
    print $easy->display('footer.tpl');
    break;

    case "adding":
        print $easy->display('header.tpl');
        $ISBN = make_safe($_POST['ISBN']);
        $title = make_safe($_POST['title']);
        $edition = make_safe($_POST['edition']);
        $price = make_safe($_POST['price']);
        $m_quantity = get_safe(make_safe($_POST['m_quantity']));
        $f_quantity = get_safe(make_safe($_POST['f_quantity']));


	if(empty($ISBN))
	{
		error_msg("Make sure you entred valid ISBN");
	}

	else
	{
                $adding_q = mysql_query("INSERT INTO books VALUES('$ISBN','$title','$edition','$price','$m_quantity','$f_quantity')");
		if($adding_q){ok_msg("Been added successfully");ref("books.php",1);}
		else{error_msg("There is an error");exit();}
	}


print $easy->display('footer.tpl');
    break;

    case "edit":
    print $easy->display('header.tpl');
    $id_books = make_safe($_GET['id']);
    $selection= mysql_query("SELECT * FROM books WHERE ISBN='$id_books'");
    if(!$selection){exit("Error");}
    while($books = mysql_fetch_array($selection))
        {
		print $easy->display('edit_books.tpl');
	}
        print $easy->display('footer.tpl');
     break;

    case "editing":
    print $easy->display('header.tpl');
    $id = make_safe($_GET['id']);
    $ISBN = make_safe($_POST['ISBN']);
    $title = make_safe($_POST['title']);
    $edition = make_safe($_POST['edition']);
    $price = make_safe($_POST['price']);
    $m_quantity = get_safe(make_safe($_POST['m_quantity']));
    $f_quantity = get_safe(make_safe($_POST['f_quantity']));
    if(empty($ISBN))
    {
	error_msg("Make sure you entred valid ISBN");
    }

    else
    {
 	$update_books = mysql_query("UPDATE `books` SET `ISBN`='$ISBN',`title`='$title',`edition`='$edition',`price`='$price',
                `m_quantity`='$m_quantity',`f_quantity`='$f_quantity' WHERE ISBN='$id'");
	if($update_books)
	{
            ok_msg("Been edited successfully");
	}
	else
	{
            error_msg("Error");
            exit();
	}
	ref("books.php?go=edit&id=$ISBN",1);
    }
    print $easy->display('footer.tpl');
    break;

    case "delete":
        print $easy->display('header.tpl');
        $id_del=make_safe($_GET['id']);
	$deleting = mysql_query("DELETE FROM books WHERE ISBN='$id_del'");
	if($deleting){ok_msg("record has been deleted");}else{error_msg("Error");exit();}
	ref("books.php",1);

        break;
     case "book_info":
    $id_books = make_safe($_GET['id']);
    $selection= mysql_query("SELECT * FROM books WHERE ISBN='$id_books'");
    if(!$selection){exit("Error");}
    while($books = mysql_fetch_array($selection))
        {
                $books['total']= $books['m_quantity']+$books['f_quantity'];
		print $easy->display('book_info.tpl');
	}
        print $easy->display('footer.tpl');
     break;

    default:
        print $easy->display('header.tpl');
    $qu = "select * from books";
    print $easy->display('books.tpl');
    print $easy->display('footer.tpl');



}

?>