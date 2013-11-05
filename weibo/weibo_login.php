<?php

include_once "article_info.php";
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

//$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
//$code_url = $o->getAuthorizeURL( "http://kaixinpig.net/test/test.php" );
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

$code_url = $o->getAuthorizeURL( "http://kaixinpig.net/weibo/test.php" );
//echo $code_url;

?>
<p><a href="<?php echo $code_url ?>"><img src="weibo_login.png" title="点击进入授权页面" alt="点击进入授权页面" border="0" /></a></p>
