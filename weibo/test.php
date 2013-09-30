<?php

include_once "article_info.php";
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

	$code = $_GET["code"];
	//echo "acctoken:[".$_SESSION['token']['access_token']."]";
	echo "code:".$code;
	//print_r $_SESSION['token'];
	
	$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$keys = array('code'=>$code, 'redirect_uri'=>'http://kaixinpig.net/test/test.php');
	print_r($keys);
	$acctoken = $o->getAccessToken( 'code',$keys );
	
	//格式：Array ( [access_token] => 2.00jf4xwCFtRUFC0d3cfee53ceJrKGB [remind_in] => 157679999 [expires_in] => 157679999 [uid] => 2703445503 ) 
	print_r($acctoken);
	//echo "acctoken:".$acctoken;
	//echo "".$_SESSION['token']['access_token'];
?>
