<?php

include_once "weibo_user.php";
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

session_start(); 

//<a href=" $code_url >">新浪微博登陆</a>
$msg = "";

if(!isset($_SESSION["user"])){
	$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
	$code_url = $o->getAuthorizeURL( "http://kaixinpig.net/weibo/weibo_auth.php" );
	$msg = $msg."<a href=\"".$code_url."\">新浪微博登陆</a>";
}else{
	$weibo_user = $_SESSION["user"] ;
	$msg = "<a>登陆成功，用户名：".$weibo_user['screen_name']."</a>";
}

$userLst = getUidLst();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb=“http://open.weibo.com/wb”>
<head>
	<meta name="keywords" content="互粉，新浪微博互粉，互粉应用平台，互粉营销" />
    <meta name="description" content="互粉，新浪微博互粉，互粉应用平台，互粉营销" />
	<title>
	互粉|新浪微博互粉|互粉应用平台|互粉营销
	</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf8" />
	<meta name="robots" content="all" />
	<meta name="googlebot" content="all" />
	<meta name="baiduspider" content="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="baidu-site-verification" content="zVC8MxTff8" />
	<meta name="google-site-verification" content="ukkwYPRiU3m6NxMNlMRIReIHpzfe1dKfc_2Rp5nvRLM" />
	
    <!-- Le styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/blue/style.css" rel="stylesheet" type="text/css" />
    
    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/assets/css/myapp.css" rel="stylesheet">
    <!-- <link href="/assets/css/docs.css" rel="stylesheet"> -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/assets/ico/favicon.png">
</head>

<body>

<div class="container">
	<div class="row">
		<div class="span12">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						 <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="#" class="brand">开心猪互粉</a>
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								<li class="active">
									<a href="index.php">互粉大厅</a>
								</li>
								<li>
									<a href="help.html">帮助</a>
								</li>
								
							</ul>
							<ul class="nav pull-right">
								<li>
									<?php echo $msg ?>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
				
			</div>
			<ul class="breadcrumb">
				<li>
					互粉大厅
				</li>
				
			</ul>
			<div class="row-fluid">
				<?php foreach( $userLst as $user ){
					if(isset($_SESSION["user"])&&$user["uid"]==$_SESSION["user"]["uid"]){
						continue;
					}
				?>
				<div class="span2">
					<div class="media">
						 <a href="#" class="pull-left"><img src="<?php echo $user["profile_image_url"];?>" class="media-object" alt='' /></a>
						<div class="media-body">
							<h4 class="media-heading">
								<?php echo $user["screen_name"];?>
							</h4> 
							<button class="btn btn-info" type="button" onClick="hufen('<?php echo $user["uid"];?>','<?php echo $user["screen_name"];?>',this)">互粉一下</button>
						</div>
					</div>
				</div>
				<?php }?>
				
				
			</div>
		</div>
	</div>
</div>

<footer class="footer">
	<div class="container">
	<p> 您对本互粉平台有什么意见，请给我们发<a target="_blank" href="mailto:admin@kaixinpig.net">邮件</a> </p>
	<p> Copyright &copy;2013 开心猪 All Rights Reserved.
		<script type="text/javascript">
		var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
		document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3bddc2464e88ba72ff504c6fda7bb984' type='text/javascript'%3E%3C/script%3E"));
		</script>
	</p>
	<ul class="footer-links">
		<li><a target="_blank" href="http://www.kaixinpig.net">开心猪小说网</a></li>
		<li class="muted">.</li>
		<li><a target="_blank" href="mailto:admin@kaixinpig.net">问题反馈</a></li>
		<li class="muted">.</li>
		<li><a target="_blank" href="http://www.bootcss.com/">开源框架</a></li>
	</ul>	
	</div>
</footer>

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap-transition.js"></script>
<script src="/assets/js/bootstrap-alert.js"></script>
<script src="/assets/js/bootstrap-modal.js"></script>
<script src="/assets/js/bootstrap-dropdown.js"></script>
<script src="/assets/js/bootstrap-scrollspy.js"></script>
<script src="/assets/js/bootstrap-tab.js"></script>
<script src="/assets/js/bootstrap-tooltip.js"></script>
<script src="/assets/js/bootstrap-popover.js"></script>
<script src="/assets/js/bootstrap-button.js"></script>
<script src="/assets/js/bootstrap-collapse.js"></script>
<script src="/assets/js/bootstrap-carousel.js"></script>
<script src="/assets/js/bootstrap-typeahead.js"></script>
<script src="/assets/js/myapp.js"></script>

<script type="text/javascript">
	//load_adsence();
</script>
</body>