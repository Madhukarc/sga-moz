<?php //include('menu.ctp');
$grupo = $session->read('Auth.User.group_id');
$username = $session->read('Auth.User.username');
 ?>

<div class="projectos index" id="center-column">
    <div class="top-bar">
        <?php if($grupo == 1) echo $this->Html->link(sprintf(__('Novo Registo de Notas', true)), array('action' => 'registo_de_notas'),array('class'=>'button')); ?>
	<h1><?php __('Avaliacoes');?></h1>
        <div class="breadcrumbs"><?php ?></div>
    </div>

    <div class="table">
	<table cellpadding="0" cellspacing="0" class ="listing">
	<tr>

            <th><?php echo $this->Paginator->sort('Codigo','codigo');?></th>
			<th><?php echo $this->Paginator->sort('Nome do Aluno','name');?></th>
			<th><?php echo $this->Paginator->sort('Tipo Avalicao','t0015tipoavaliacao_id');?></th>
			<th><?php echo $this->Paginator->sort('Nota','nota');?></th>
			<th><?php echo $this->Paginator->sort('Data','data');?></th>
			<th class="actions"><?php __('Accao');?></th>
	</tr>
	<?php
	$i = 0;
	
	foreach ($avaliacaos as $avaliacao):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
	if(($grupo !=3) || ($grupo ==3 && $username == $codigo)){;
	?>
	<tr<?php echo $class;?>>
			<td><?php echo $codigo; ?>&nbsp;</td>
			<td><?php echo $name; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($avaliacao['Tipoavaliacao']['name'], array('controller' => 't0015tipoavaliacaos', 'action' => 'view', $avaliacao['Tipoavaliacao']['id'])); ?>
		</td>

		<td><?php echo $avaliacao['Avaliacao']['nota']; ?>&nbsp;</td>
		<td><?php echo $avaliacao['Avaliacao']['data']; ?>&nbsp;</td>
		<td class="accoes">
	            <?php //echo $this->Html->image("/img/login-icon.gif", array("alt" => "Brownies",'url' => array('action' => 'view', $avaliacao['Avaliacao']['id']))); ?>
                    <?php //echo $this->Html->image("/img/edit-icon.gif", array("alt" => "Brownies",'url' => array('action' => 'edit', $avaliacao['Avaliacao']['id']))); ?>
                    <?php if($grupo ==1) echo $this->Html->image("/img/hr.gif", array("alt" => "Brownies",'url' => array('action' => 'delete',$avaliacao['Avaliacao']['id']), null, sprintf(__('Tem a certeza que deseja eliminar # %s?', true), $avaliacao['Avaliacao']['id']))); ?>
		</td>

	</tr>
<?php 
}
endforeach; ?>
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