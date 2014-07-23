<?php /* Smarty version 2.6.27, created on 2014-07-22 09:42:24
         compiled from index_bootstrap.htm */ ?>
<div class="container">
	<div class="span8 text-left ">
		<div class="row-fluid">
		<div class="offset1">
			<div class="page-header">
				<h3>最近更新</h3>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							文章名称
							
						</th>
						<th>
							作者
						</th>
						<th>
							文章类型
						</th>
						<th>
							更新日期
						</th>
					</tr>
				</thead>
				<tbody>
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
						<td><a href="/chapter/lst_<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['id']; ?>
.html" target="_blank">《<?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['title']; ?>
》</a></td>
						<td><?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['author']; ?>
</td>
						<td><?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['category_name']; ?>
</td>
						<td><?php echo $this->_tpl_vars['artile'][$this->_sections['list']['index']]['modify_date']; ?>
</td>
					</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
	<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
