<div class="regimelectivos form">
<?php echo $this->Form->create('Regimelectivo');?>
	<fieldset>
		<legend><?php echo __('Edit Regimelectivo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Regimelectivo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Regimelectivo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Regimelectivos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Anolectivos', true), array('controller' => 'anolectivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Anolectivo', true), array('controller' => 'anolectivos', 'action' => 'add')); ?> </li>
	</ul>
</div>