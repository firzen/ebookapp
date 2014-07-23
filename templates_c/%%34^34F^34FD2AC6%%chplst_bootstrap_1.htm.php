<?php /* Smarty version 2.6.27, created on 2014-07-22 12:12:37
         compiled from chplst_bootstrap_1.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="gb2312">
    <title>《<?php echo $this->_tpl_vars['title']; ?>
》无弹窗|《<?php echo $this->_tpl_vars['title']; ?>
》最新章节|开心猪小说网</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="baidu-site-verification" content="zVC8MxTff8" />
	<meta name="keywords" content="小说《<?php echo $this->_tpl_vars['title']; ?>
》无弹窗,《<?php echo $this->_tpl_vars['title']; ?>
》开心猪小说网,《<?php echo $this->_tpl_vars['title']; ?>
》最新章节,《<?php echo $this->_tpl_vars['title']; ?>
》全文阅读">
	<meta name="description" content="《<?php echo $this->_tpl_vars['title']; ?>
》由 开心猪小说网连载，该小说情节跌宕起伏、扣人心弦是一本难得的情节与文笔俱佳的好书，www.kaixinpig.net免费提供《<?php echo $this->_tpl_vars['title']; ?>
》vip章节阅读和txt电子书免费下载。"> 
	<meta http-equiv="pragma" content="no-cache" />
    <!-- Le styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    
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
		  <div class="row-fluid">
			<div class="alert alert-success">
				<h4>
					《<?php echo $this->_tpl_vars['title']; ?>
》：章节列表	
				</h4> 
				
			</div>
			<div class="article_texttable">
				<div class ="article_listtext">
					<ul id="chapterlist">
						<?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['chapter']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list']['show'] = true;
$this->_sections['list']['max'] = $this->_sections['list']['loop'];
$this->_sections['list']['step'] = 1;
$this->_sections['list']['start'] = $this->_sections['list']['step'] > 0 ? 0 : $this->_sections['list']['loop']-1;
if ($this->_sections['list']['show']) {
    $this->_sections['list']['total'] = $this->_sections['list']['loop'];
    if ($this->_sections['list']['total'] == 0)
        $this->_sections['list']['show'] = false;
} else
    $this->_sections['list']['total'] = 0;
if ($this->_sections['list']['show']):

            for ($this->_sections['list']['index'] = $this->_sections['list']['start'], $this->_sections['list']['iteration'] = 1;
                 $this->_sections['list']['iteration'] <= $this->_sections['list']['total'];
                 $this->_sections['list']['index'] += $this->_sections['list']['step'], $this->_sections['list']['iteration']++):
$this->_sections['list']['rownum'] = $this->_sections['list']['iteration'];
$this->_sections['list']['index_prev'] = $this->_sections['list']['index'] - $this->_sections['list']['step'];
$this->_sections['list']['index_next'] = $this->_sections['list']['index'] + $this->_sections['list']['step'];
$this->_sections['list']['first']      = ($this->_sections['list']['iteration'] == 1);
$this->_sections['list']['last']       = ($this->_sections['list']['iteration'] == $this->_sections['list']['total']);
?>
							<li><a href="/chapter/ctx_<?php echo $this->_tpl_vars['chapter'][$this->_sections['list']['index']]['id']; ?>
.html" target="_blank"><?php echo $this->_tpl_vars['chapter'][$this->_sections['list']['index']]['title']; ?>
</a></li>
						<?php endfor; endif; ?>
					</ul>
				</div>
			</div>
		</div>
		</div>
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	  $("ul li")[<?php echo $this->_tpl_vars['activeIdx']; ?>
].className="active";
	});
</script>