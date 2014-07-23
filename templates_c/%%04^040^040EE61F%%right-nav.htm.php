<?php /* Smarty version 2.6.27, created on 2014-07-22 09:42:24
         compiled from right-nav.htm */ ?>

	<div class="span2 ">
		<div class="row">
			<div class="span2 bs-docs-example">
			    <span class="gonggao">点击排行</span>
			    <ul class="nav nav-tabs nav-stacked">
			    	<?php unset($this->_sections['click_list']);
$this->_sections['click_list']['name'] = 'click_list';
$this->_sections['click_list']['loop'] = is_array($_loop=$this->_tpl_vars['click_artile']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['click_list']['show'] = true;
$this->_sections['click_list']['max'] = $this->_sections['click_list']['loop'];
$this->_sections['click_list']['step'] = 1;
$this->_sections['click_list']['start'] = $this->_sections['click_list']['step'] > 0 ? 0 : $this->_sections['click_list']['loop']-1;
if ($this->_sections['click_list']['show']) {
    $this->_sections['click_list']['total'] = $this->_sections['click_list']['loop'];
    if ($this->_sections['click_list']['total'] == 0)
        $this->_sections['click_list']['show'] = false;
} else
    $this->_sections['click_list']['total'] = 0;
if ($this->_sections['click_list']['show']):

            for ($this->_sections['click_list']['index'] = $this->_sections['click_list']['start'], $this->_sections['click_list']['iteration'] = 1;
                 $this->_sections['click_list']['iteration'] <= $this->_sections['click_list']['total'];
                 $this->_sections['click_list']['index'] += $this->_sections['click_list']['step'], $this->_sections['click_list']['iteration']++):
$this->_sections['click_list']['rownum'] = $this->_sections['click_list']['iteration'];
$this->_sections['click_list']['index_prev'] = $this->_sections['click_list']['index'] - $this->_sections['click_list']['step'];
$this->_sections['click_list']['index_next'] = $this->_sections['click_list']['index'] + $this->_sections['click_list']['step'];
$this->_sections['click_list']['first']      = ($this->_sections['click_list']['iteration'] == 1);
$this->_sections['click_list']['last']       = ($this->_sections['click_list']['iteration'] == $this->_sections['click_list']['total']);
?>
					<li>
				    	<div class="border-bodom">
				    		<span class="order-num"> <?php echo $this->_sections['click_list']['index']+1; ?>
</span>
							<a title="<?php echo $this->_tpl_vars['click_artile'][$this->_sections['click_list']['index']]['author']; ?>
 著" target="_blank" href="/chapter/lst_<?php echo $this->_tpl_vars['click_artile'][$this->_sections['click_list']['index']]['id']; ?>
.html"><?php echo $this->_tpl_vars['click_artile'][$this->_sections['click_list']['index']]['title']; ?>
</a>
						</div>
			    	</li>
					<?php endfor; endif; ?>
			    </ul>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12" id="adsence">
				<!--广告位置开始!-->
				<?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['advert']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<?php echo $this->_tpl_vars['advert'][$this->_sections['list']['index']]['text']; ?>

				<?php endfor; endif; ?>
				<!--广告位置结束!-->
			</div>
		</div>
	</div>
</div>