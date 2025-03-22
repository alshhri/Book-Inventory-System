<?php

function bbcode($text) 
{ 
// Programmed By Dr.no ( www.algaher.com ) 
// Thanks To http://www.rayaheen.net For The MagicToolBox And JavaScript Files 
// Some JavaScript Files were edited by Dr.no ( 24 / 1 / 2005 ) 

// no html codes 
$text=htmlspecialchars($text); 

// <br> 
$text=nl2br($text); 

// <b> 
$text=str_replace("[B]","<b>",$text); 
$text=str_replace("[/B]","</b>",$text); 

// <u> 
$text=str_replace("[U]","<u>",$text); 
$text=str_replace("[/U]","</u>",$text); 

// <i> 
$text=str_replace("[I]","<i>",$text); 
$text=str_replace("[/I]","</i>",$text); 

// <a> 
$text=str_replace("[url=","<a target=_blank href=",$text); 
$text=str_replace("[/url","</a",$text); 
$text=str_replace("[mail=","<a href=mailto:",$text); 
$text=str_replace("[/mail","</a",$text); 

// images,Flash,Media And Ram - Rm - Files 
$text=str_replace("[img]","<img src=",$text); 
$text=str_replace("[/img]",">",$text); 
$text=str_replace("[bimg=","<img border=0 width=100 height=100 src=",$text); 
$text=str_replace("[/bimg","",$text); 
$text=str_replace("[flash=","<EMBED quality=high loop=true menu=false  TYPE=application/x-shockwave-flash src= ",$text); 
$text=str_replace("[/flash","</embed",$text); 
$text=str_replace("[media=","<div align=center><embed src=",$text); 
$text=str_replace("[/media","</div></embed",$text); 
$text=str_replace("[rams=","<div align=center><embed type=audio/x-pn-realaudio-plugin CONSOLE=Clip1 
CONTROLS=ControlPanel,StatusBar HEIGHT=60 WIDTH=300 
AUTOSTART=false SRC=",$text); 
$text=str_replace("[/rams","</embed></div",$text); 
$text=str_replace("[ramv=","<div align=center><embed type=audio/x-pn-realaudio-plugin CONSOLE=Clip1 
CONTROLS=ImageWindow,ControlPanel,StatusBar HEIGHT=230 WIDTH=300 
AUTOSTART=false SRC=",$text); 
$text=str_replace("[/ramv","</embed></div",$text); 

// Extra Codes : Line , Quote , Code and PHP 
$text=str_replace("[line","<hr",$text); 
$text=str_replace("[quote","<table cellspacing=0 cellpadding=0 border=1 width=60%><tr><td align=center",$text); 
$text=str_replace("[/quote","</td></tr></table",$text); 
$text=str_replace("[code","<table cellspacing=0 cellpadding=0 border=1 width=60%><tr><td align=left bgcolor=#D6D3D6><font color=orange>Code :</font><br",$text); 
$text=str_replace("[/code","</td></tr></table",$text); 
$text=str_replace("[php","<table cellspacing=0 cellpadding=0 border=1 width=60%><tr><td align=left bgcolor=#D6D3D6><font color=orange>PHP :</font><br",$text); 
$text=str_replace("[/php","</td></tr></table",$text); 

// Fonts And Div 
$text=str_replace("[color=","<font color=",$text); 
$text=str_replace("[/color","</font",$text); 
$text=str_replace("[font=","<font face=",$text); 
$text=str_replace("[/font","</font",$text); 
$text=str_replace("[size=","<font size=",$text); 
$text=str_replace("[/size","</font",$text); 
$text=str_replace('[align=','<div align=', $text); 
$text=str_replace('[/align]','</div>', $text); 
$text=str_replace(']','>',$text); 
$text=stripslashes($text); 

// MOVE 
$text=str_replace("[move=","<marquee scrolldelay=120 direction=",$text); 
$text=str_replace("[/move","</marquee",$text); 

// poem 
$text=str_replace("[poem","<pre><div align=justify",$text); 
$text=str_replace("[/poem",'</pre><script language="javascript">doPoem()</script',$text); 
return $text; 
} 
?>