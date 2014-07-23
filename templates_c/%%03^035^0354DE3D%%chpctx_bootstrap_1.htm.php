<?php /* Smarty version 2.6.27, created on 2014-07-23 09:20:45
         compiled from chpctx_bootstrap_1.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="gb2312">
    <title>《<?php echo $this->_tpl_vars['article']; ?>
》 正文 <?php echo $this->_tpl_vars['title']; ?>
 - 开心猪小说网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="baidu-site-verification" content="zVC8MxTff8" />
	<meta name="keywords" content="正文 <?php echo $this->_tpl_vars['title']; ?>
,<?php echo $this->_tpl_vars['article']; ?>
最新章节开心猪小说网提供" />
	<meta name="description" content="此页面是<?php echo $this->_tpl_vars['article']; ?>
,{<?php echo $this->_tpl_vars['title']; ?>
,开心猪小说网提供的最新章节" />
	
	
    <meta name="author" content="">



    <!-- Le styles -->
    <link href="http://cdn.bootcss.com/twitter-bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    
    <link href="http://cdn.bootcss.com/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css" rel="stylesheet">
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
<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						 <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="http://kaixinpig.net" class="brand">开心猪小说</a>
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								<li>
									<a href="/">网站首页</a>
								</li>
								
								<li>
									<a href="/category/1/1.html">言情小说</a>
								</li>
								<li>
									<a href="/category/2/1.html">仙侠修真</a>
								</li>
								<li>
									<a href="/category/3/1.html">都市小说</a>
								</li>
								<li>
									<a href="/category/4/1.html">历史小说</a>
								</li>
								<li>
									<a href="/category/5/1.html">玄幻小说</a>
								</li>
								<li>
									<a href="/category/6/1.html">网游小说</a>
								</li>
								<li>
									<a href="/category/7/1.html">竞技小说</a>
								</li>
								<li>
									<a href="/category/8/1.html">科幻小说</a>
								</li>
							</ul>
							
							<ul id="topNav" class="nav pull-right">
								<li>
									<form class="navbar-search pull-right form-search" action="/search.php" method="post">
									<div class="input-append">
									<input class="span2 search-query" name="search_text" placeholder="输入书名" type="text">
									<button type="submit" class="btn btn-inverse">
									<i class="icon-search icon-white"></i>&nbsp;
									</button>
									</div>
									</form>
								</li>
							</ul>
							
						</div>
					</div>
				</div>
</div>
<div class="container">
	
	
	
		<div class ="span8 offset1">
			<div class="page-header" contenteditable="true">
                <h1 class="pull-center"><?php echo $this->_tpl_vars['title']; ?>
 </h1>
            </div>
			<div id="novel_content"><?php echo $this->_tpl_vars['chpctx']; ?>
</div>
			
			<div class="pagination">
				<ul>
					<li>
						<a href="/chapter/lst_<?php echo $this->_tpl_vars['artileid']; ?>
.html">目录页</a>
					</li>
					<li>
						<a href="/nav/<?php echo $this->_tpl_vars['artileid']; ?>
/<?php echo $this->_tpl_vars['id']; ?>
/last.html">上一页</a>
					</li>
					<li>
						<a href="/nav/<?php echo $this->_tpl_vars['artileid']; ?>
/<?php echo $this->_tpl_vars['id']; ?>
/next.html" >下一页</a>
					</li>
				</ul>
			</div>
		</div>
	
	

<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("ul li")[<?php echo $this->_tpl_vars['activeIdx']; ?>
].className="active";
});
updateClickTimes(<?php echo $this->_tpl_vars['artileid']; ?>
);
</script>