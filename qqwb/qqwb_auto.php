<?php

include_once "../weibo/article_info.php";

/**
 * 此为PHP-SDK 2.0 的一个使用Demo,用于流程和接口调用演示
 * 请根据自身需求和环境进相应的安全和兼容处理，勿直接用于生产环境
 */
error_reporting(0);
require_once './Config.php';
require_once './Tencent.php';

OAuth::init($client_id, $client_secret);
Tencent::$debug = $debug;

//打开session
session_start();
header('Content-Type: text/html; charset=utf-8');

$_SESSION['t_access_token'] ='e97be0b6ef606577384a9aeedbc72d02';
$_SESSION['t_openid'] = '22df75dbfccf6aae5f05248236d5127f';
$_SESSION['t_openkey'] = 'A7AE1B3B7503B19C719EF1D33F00D6FA';

$r = Tencent::api('user/info');
 /**
     * 发表图片微博
     * 如果图片地址为网络上的一个可用链接
     * 则使用add_pic_url接口
     * */
$arr = getRandomInfo();
$status = $arr["comment"];
//$status ="".$status."".$arr["url"];
$pic_path = $arr["img"];
$status = mb_convert_encoding( $status, "utf8","gb2312"); 
$status ="".$status."".$arr["url"];
echo $pic_path;
	 
$params = array(
     'content' => $status,
     'pic_url' => $pic_path
);
$r = Tencent::api('t/add_pic_url', $params, 'POST');
echo $r;
echo "ok!";
?>
