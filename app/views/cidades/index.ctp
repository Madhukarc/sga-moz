<?php //include('menu.ctp'); ?>

<div class="projectos index" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Nova Cidade', true)), array('action' => 'add'),array('class'=>'button')); ?>
	<h1><?php __('Cidades');?></h1>
       
    </div>

    <div class="table">
	<table cellpadding="0" cellspacing="0" class ="listing">
	<tr>
			<th><?php echo $this->Paginator->sort('Id','id');?></th>
			<th><?php echo $this->Paginator->sort('Codigo','codigo');?></th>
			<th><?php echo $this->Paginator->sort('Nome','name');?></th>
			<th><?php echo $this->Paginator->sort('Provincia','Provincia_id');?></th>
			<th><?php echo $this->Paginator->sort('Pais','Paise_id');?></th>
			<th class="actions"><?php __('Accao');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($cidades as $cidade):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $cidade['Cidade']['id']; ?>&nbsp;</td>
		<td><?php echo $cidade['Cidade']['codigo']; ?>&nbsp;</td>
		<td><?php echo $cidade['Cidade']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cidade['Provincia']['name'], array('controller' => 'Provincias', 'action' => 'view', $cidade['Provincia']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cidade['Paise']['name'], array('controller' => 'Paises', 'action' => 'view', $cidade['Paise']['id'])); ?>
		</td>
		<td class="accoes">
	            <?php echo $this->Html->image("/img/login-icon.gif", array("alt" => "Brownies","title"=>"Visualizar",'url' => array('action' => 'view', $cidade['Cidade']['id']))); ?>
                    <?php echo $this->Html->image("/img/edit-icon.gif", array("alt" => "Brownies","title"=>"Editar",'url' => array('action' => 'edit',$cidade['Cidade']['id']))); ?>
                    <?php echo $this->Html->image("/img/hr.gif", array("alt" => "Brownies","title"=>"Eliminar",'url' => array('action' => 'delete', $cidade['Cidade']['id']), null, sprintf(__('Tem a certeza que deseja eliminar # %s?', true),$cidade['Cidade']['id']))); ?>
		</td>
		
	</tr>
<?php endforeach; ?>
	</table>

</div>
        <p>
<?php
//echo $this->Paginator->counter(array(
//'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
//));
?></p>

<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('anterior', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('proximo', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

</div>