<?php

	include_once "weibo_user.php";
	include_once( 'config.php' );
	include_once( 'saetv2.ex.class.php' );

	$code = $_GET["code"];
	//echo "code:".$code;
	//print_r $_SESSION['token'];
	
	$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$keys = array('code'=>$code, 'redirect_uri'=>'http://kaixinpig.net/test/test.php');
	//print_r($keys);
	$acctoken_arr = $o->getAccessToken( 'code',$keys );
	
	//格式：Array ( [access_token] => 2.00jf4xwCFtRUFC0d3cfee53ceJrKGB [remind_in] => 157679999 [expires_in] => 157679999 [uid] => 2703445503 ) 
	//print_r($acctoken_arr);
	
	$saeTClientV2 = new SaeTClientV2(WB_AKEY , WB_SKEY ,$acctoken_arr['access_token']);
	$user_info = $saeTClientV2->show_user_by_id($acctoken_arr['uid']);
	
	$weibo_user = array();
	$weibo_user['profile_image_url'] = $user_info['profile_image_url'];
	$weibo_user['screen_name'] = $user_info['screen_name'];
	$weibo_user['profile_url'] = $user_info['profile_url'];
	$weibo_user = array_merge($weibo_user, $acctoken_arr); 
	
	print_r($weibo_user);
	addIfAbsent($weibo_user);
	
	//[profile_image_url] => http://tp4.sinaimg.cn/2703445503/50/5663135460/1,[screen_name] => 迷失de_我,[profile_url] => u/2703445503
	//print_r($user_info);
	
	//$user_info2 = $saeTClientV2->logout();测试此功能不管用
	//print_r($user_info2);
	//echo "ok";
	
	//echo "acctoken:".$acctoken;
	//echo "".$_SESSION['token']['access_token'];
?>
