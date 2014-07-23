<?php /* Smarty version 2.6.27, created on 2014-07-22 09:51:16
         compiled from artlst.htm */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>文章列表</title>
<link href="../assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../assets/js/util.js"></script>
</head>

<body>
<table border="1">
<form name="checkboxform" method="post" action="">
<input type="hidden" name="jobtype">
<input type="hidden" name="articleids">
<tr>
	<td></td>
	<td>文章标题</td>
	<td>文章类型</td>
	<td>采集url</td>
	<td>操作</td>
</tr>
<?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['artile']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr>
	<td>
	  <input type="checkbox" name="checkboxid" value="{$artile[list].id}">
    </td>
	<td><?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['title']; ?>
</td>
	<td><?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['category_name']; ?>
</td>
	<td><?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['url']; ?>
</td>
	<td>
	<a href="pick_artile.php?artileid=<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['id']; ?>
" target="_blank">采集</a>
	<a href="make_artile.php?artileid=<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['id']; ?>
&title=<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['title']; ?>
" target="_blank">生成目录页面</a>
	<a href="make_chapter.php?artileid=<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['id']; ?>
&title=<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['title']; ?>
" target="_blank">生成章节页面</a>
	<a href="del_artile.php?artileid=<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['id']; ?>
&title=<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['title']; ?>
" target="_blank">删除文章</a>
	</td>
</tr>
<?php endfor; endif; ?>
</form>
</table>

<div id="action">
<ul>
<li class="li_action"><a href="#" onClick="SelectAll();">全选/反选</a></li>
<li class="li_action"><a href="#" onClick="pickAll(1);">批量采集</a></li>
<li class="li_action"><a href="#" onClick="pickAll(2);">批量生成目录</a></li>
<li class="li_action"><a href="#" onClick="pickAll(3);">批量生成内容</a></li>
</ul>
</div>
</body>
</html>