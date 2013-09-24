<?php

include_once "article_info.php";
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , "2.00jf4xwCFtRUFC0d3cfee53ceJrKGB" );

$arr = getRandomInfo();
$status = $arr["comment"];
$status = mb_convert_encoding( $status, "utf8","gb2312");  
$title = mb_convert_encoding( $arr["title"], "utf8","gb2312"); 
$status ="【开心猪小说网每日推荐之《".$title."》】".$status."--详情请点击：>>：".$arr["url"];
$pic_path = $arr["img"];
$ms  = $c->upload($status,$pic_path); // done
echo "ok";
?>
