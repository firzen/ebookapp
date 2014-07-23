<?php /* Smarty version 2.6.27, created on 2014-07-22 11:53:52
         compiled from common_footer.htm */ ?>



<footer class="footer">
	<div class="container">
		<p> 本站所有小说为转载作品，所有章节均由网友上传，转载至本站只是为了宣传本书让更多读者欣赏。 </p>
		<p> Copyright &copy;2013 开心猪 All Rights Reserved.
			<script type="text/javascript">
			var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
			document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F3bddc2464e88ba72ff504c6fda7bb984' type='text/javascript'%3E%3C/script%3E"));
			</script>
		</p>
		<ul class="footer-links">
			<li><a target="_blank" href="about.html">关于</a></li>
			<li class="muted">.</li>
			<li><a target="_blank" href="mailto:admin@kaixinpig.net">问题反馈</a></li>
			<li class="muted">.</li>
			<li><a target="_blank" href="http://www.bootcss.com/">开源框架</a></li>
			<li class="muted">.</li>
			<li><a href='http://www.links.cn/' target=_blank>站长工具</a></li>
		</ul>	
		
		<p>
			<span>+友情链接:</span>
			<?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['links']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<a href='<?php echo $this->_tpl_vars['links'][$this->_sections['list']['index']]['url']; ?>
' target=_blank><?php echo $this->_tpl_vars['links'][$this->_sections['list']['index']]['name']; ?>
</a>
			<?php endfor; endif; ?>
		</p>
	</div>
	
</footer>


<script src="/assets/js/bootstrap.min.js"></script>
<!--<script src="/assets/js/bootstrap-transition.js"></script>
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
<script src="/assets/js/jquery.tablesorter.js"></script>

--><script type="text/javascript">
	//load_adsence();
</script>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=0&amp;pos=right&amp;uid=6799720" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!-- Baidu Button END -->
</body>
</html>