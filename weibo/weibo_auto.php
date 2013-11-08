<?php

include_once "article_info.php";
include_once "weibo_user.php";
include_once "../util/util.php";
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$weiboIDs=array("2703445503","3812212164");

$totalLen = count($weiboIDs);
$idx = mt_rand(1,$totalLen);

$choiceID = $weiboIDs[$idx-1];
$choiceToken = getAccessToken($choiceID);

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $choiceToken );

$arr = getRandomInfo();
$status = $arr["comment"];
$status = substr($status,0,200);
$status = mb_convert_encoding( $status, "utf8","gb2312");  
$title = mb_convert_encoding( $arr["title"], "utf8","gb2312"); 
$status ="".$status."".$arr["url"];
$pic_path = $arr["img"];
$pic_content = myfile_get_content($pic_path);
$local_path = "tmp.jpg";
makehtml($local_path,$pic_content);

try{
	//http://weibo.com/u/2703445503
	echo "<a href='http://weibo.com/u/".$choiceID."'>微博地址</a> <br>";
	$ms  = $c->upload($status,$local_path); // done
	print_r($ms);
	//echo "ret:".print_r($ms)." <br>";
}catch (Exception $e){
	print $e->getMessage();  
}
?>
