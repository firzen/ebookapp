<?php

include_once "article_info.php";
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$a1 = "2.00yWezJEFtRUFC0166bea2ccmWL1HD";
$a2 = "2.00jf4xwCFtRUFC0d3cfee53ceJrKGB";

$idx = mt_rand(1,2);
$a = $a1;
if($idx==2){
	$a = $a2;
}

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $a );

$arr = getRandomInfo();
$status = $arr["comment"];
$status = mb_convert_encoding( $status, "utf8","gb2312");  
$title = mb_convert_encoding( $arr["title"], "utf8","gb2312"); 
$status ="".$status."".$arr["url"];
$pic_path = $arr["img"];
$ms  = $c->upload($status,$pic_path); // done
echo $idx." ok";
?>
