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
$userid = $_SESSION['userid'];
print $easy->display("header.tpl");
$move = $_GET['go'];
switch($move)
{
    case "search":
        $m_id = make_safe($_POST['m_id']);
        $m_type = make_safe($_POST['m_type']);
        $re_curnt = mysql_query("SELECT * from r_c WHERE m_id ='$m_id' AND m_type='$m_type' AND semester='$c_s' ");
        $re_curnt_rows = mysql_num_rows($re_curnt);
        if($re_curnt_rows!==0)
            {
                ref("search.php?go=member&id=$m_id&type=$m_type", 0);
            }
            else
            {
                error_msg("search again , no member found with this information");

            }
            break;


        case "member":
        $m_id = make_safe($_GET['id']);
        $m_type = make_safe($_GET['type']);
        $gender = mysql_query("SELECT gender FROM member WHERE m_id ='$m_id' AND m_type='$m_type'");
        while($gen = mysql_fetch_array($gender))
            {
                $gen1 =$gen['gender'];
            }
            if($gen1!=="male")
                { $gender_s = "f_quantity";}
            else
                { $gender_s = "m_quantity";}
        $re_curnt = mysql_query("SELECT * from r_c WHERE m_id ='$m_id' AND m_type='$m_type' AND semester='$c_s' AND deliver='0'");
      $re_curnt_rows = mysql_num_rows($re_curnt);
        while($recurrent  = mysql_fetch_array($re_curnt))
           {
                $code = $recurrent['c_code'];
                $aval = mysql_query("SELECT book_ISBN FROM courses where code='$code'");
                while($aval1 = mysql_fetch_array($aval))
                    {
                        $ISBN = $aval1['book_ISBN'];
                        $recurrent['ISBN']=$ISBN;
                    }

                $aval2 = mysql_query("SELECT * FROM books WHERE ISBN='$ISBN'");
                    while($aval3 = mysql_fetch_array($aval2))
                        {
                            $recurrent['stock']=$aval3[$gender_s];
                        }
                    
                $recurrent['gender']=$gender_s;
                $rr[] = $recurrent;

           }

        $old_books = "SELECT * from r_c WHERE m_id ='$m_id' AND m_type='$m_type' AND deliver='1'";
        $old_books_con = mysql_query("SELECT * from r_c WHERE m_id ='$m_id' AND m_type='$m_type' AND deliver='1' AND semester <>'$c_s'");
        $old_books_con = mysql_num_rows($old_books_con);
        if(($r_s==1)&&($old_books_con >0))
            {
                $rr_cc = 1;
            }
            else
            {
                $rr_cc = 0;
            }
        $paid_books = "SELECT * from r_c WHERE m_id ='$m_id' AND m_type='$m_type' AND deliver='2'";
        print $easy->display("deliver.tpl");

        break;

        case"deliver":
        $m_id = make_safe($_GET['m_id']);
        $m_type = make_safe($_GET['m_type']);
        $c_code = make_safe($_GET['c_code']);
        $ISBN_u = make_safe($_GET['ISBN']);
        $gender = make_safe($_GET['gender']);
        $stock = make_safe($_GET['s']);
        $stock = $stock-1;
        $update_c = mysql_query("UPDATE `r_c` SET `deliver`='1',`ISBN`='$ISBN_u',`user`='$userid' WHERE m_id='$m_id' AND m_type='$m_type' AND c_code='$c_code'");
	$updatebook = mysql_query("UPDATE `books` SET `$gender`=$gender-1 WHERE ISBN='$ISBN_u'");
        if($update_c)
	{
            ok_msg("Been deliver successfully");
            ref($_SERVER['HTTP_REFERER'],0);
	}
	else
	{
            error_msg("Error");
            exit();
	}


        break;

        case"return":
        $m_id = make_safe($_GET['m_id']);
        $m_type = make_safe($_GET['m_type']);
        $c_code = make_safe($_GET['c_code']);
        $ISBN_u = make_safe($_GET['ISBN']);
        $gender = mysql_query("SELECT gender FROM member WHERE m_id ='$m_id' AND m_type='$m_type'");
        while($gen = mysql_fetch_array($gender))
            {
                $gen1 =$gen['gender'];
            }
            if($gen1!=="male")
                { $gender_s = "f_quantity";}
            else
                { $gender_s = "m_quantity";}

        $update_c = mysql_query("UPDATE `r_c` SET `deliver`='0',`ISBN`='' WHERE m_id='$m_id' AND m_type='$m_type' AND c_code='$c_code'");
	$updatebook = mysql_query("UPDATE `books` SET `$gender_s`=$gender_s+1 WHERE ISBN='$ISBN_u'");
        if($update_c)
	{
            ok_msg("Been deliver successfully");
	}
	else
	{
            error_msg("Error");
            exit();
	}
        ref($_SERVER['HTTP_REFERER'],0);
        break;

        case"paid":
        $m_id = make_safe($_GET['m_id']);
        $m_type = make_safe($_GET['m_type']);
        $c_code = make_safe($_GET['c_code']);
        $ISBN_u = make_safe($_GET['ISBN']);
//        $gender = mysql_query("SELECT gender FROM member WHERE m_id ='$m_id' AND m_type='$m_type'");
//        while($gen = mysql_fetch_array($gender))
//            {
//                $gen1 =$gen['gender'];
//            }
//
//            if($gen1!=="male")
//                { $gender_s = "f_quantity";}
//            else
//                { $gender_s = "m_quantity";}

        $update_c = mysql_query("UPDATE `r_c` SET `deliver`='2' WHERE m_id='$m_id' AND m_type='$m_type' AND c_code='$c_code'");
        if($update_c)
	{
            ok_msg("Been deliver successfully");
	}
	else
	{
            error_msg("Error");
            exit();
	}
        ref($_SERVER['HTTP_REFERER'],0);
        break;

   default:
//    print $easy->display('header.tpl');
//    $qu = "select * from r_c order by semester";
//    print $easy->display('c_r.tpl');
}
print $easy->display('footer.tpl');
?>
