<?php

/*
Yanbu University College
Develped by Hassan Alshhri 8110210
2010
*/
//XSS Remove
function XSS_Remove($x_content){
    $x_content = preg_replace('#(<[^>]+[\s\r\n\"\'])(on|xmlns)[^>]*>#iU',"$1>",$x_content);
    $x_content = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*)[\\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iU','$1=$2nojavascript...',$x_content);
    $x_content = preg_replace('#([a-z]*)[\x00-\x20]*=([\'\"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iU','$1=$2novbscript...',$x_content);
    $x_content = preg_replace('#</*\w+:\w[^>]*>#i','',$x_content);
    do {
        $oldstring = $x_content;
        $x_content = preg_replace('#</*(\?xml|applet|meta|xml|blink|link|style|script|object|iframe|frame|frameset|ilayer|layer|bgsound|title|base)[^>]*>#i',"",$x_content);
    } while ($oldstring != $x_content);
    return $x_content;
}
function add_slashes(&$Str)
{
    if ( get_magic_quotes_gpc() )
    {
        if ( is_array($Str) )
        {
            foreach ($Str as $k => $v)
            {
                $Str[$k] = trim($v);
            }
        }
        else
        {
            $Str = trim($Str);
        }
    }
    else
    {
        if ( is_array($Str) )
        {
            foreach ($Str as $k => $v)
            {
                $Str[$k] = addslashes(trim($v));
            }
        }
        else
        {
            $Str = addslashes(trim($Str));
        }
    }
   return $Str;
}

?>
