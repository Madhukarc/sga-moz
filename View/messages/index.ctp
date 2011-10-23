﻿<?php
/**
 * OpenSGA - Sistema de Gestão Académica
 *   Copyright (C) 2010-2011  INFOmoz (Informática-Moçambique)
 * 
 * Este programa é um software livre: Você pode redistribuir e/ou modificar
 * todo ou parte deste programa, desde que siga os termos da licença por nele
 * estabelecidos. Grande parte do código deste programa está sob a licença 
 * GNU Affero General Public License publicada pela Free Software Foundation.
 * A versão original desta licença está disponível na pasta raiz deste software.
 * 
 * Este software é distribuido sob a perspectiva de que possa ser útil para 
 * satisfazer as necessidades dos seus utilizadores, mas SEM NENHUMA GARANTIA. Veja
 * os termos da licença GNU Affero General Public License para mais detalhes
 * 
 * As redistribuições deste software, mesmo quando o código-fonte for modificado significativamente,
 * devem manter está informação legal, assim como a licença original do software.
 * 
 * @copyright     Copyright 2010-2011, INFOmoz (Informática-Moçambique) (http://infomoz.net)
 * @link          http://infomoz.net/opensga CakePHP(tm) Project
 * @author		  Elisio Leonardo (http://infomoz.net/elisio-leonardo)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0
 * @license       GNU Affero General Public License
 * 
 */
 ?>
 <?php include('menu.ctp'); ?>

<div class="projectos index" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Novo Alerta', true)), array('action' => 'add'),array('class'=>'button')); ?>
	<h1><?php echo __('Alertas');?></h1>

    </div>

    <div class="table">
	<table cellpadding="0" cellspacing="0" class ="listing">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('recipient_id');?></th>
			<th><?php echo $this->Paginator->sort('assunto');?></th>
			<th><?php echo $this->Paginator->sort('mensagem');?></th>
			<th><?php echo $this->Paginator->sort('data');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tg0017messages as $tg0017message):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tg0017message['Tg0017message']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tg0017message['User']['id'], array('controller' => 'users', 'action' => 'view', $tg0017message['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tg0017message['Recipient']['id'], array('controller' => 'users', 'action' => 'view', $tg0017message['Recipient']['id'])); ?>
		</td>
		<td><?php echo $tg0017message['Tg0017message']['assunto']; ?>&nbsp;</td>
		<td><?php echo $tg0017message['Tg0017message']['mensagem']; ?>&nbsp;</td>
		<td><?php echo $tg0017message['Tg0017message']['datainicio']; ?>&nbsp;</td>
		<td class="accoes">
	        <?php echo $this->Html->image("/img/login-icon.gif", array("alt" => "Brownies","title"=>"Visualizar",'url' => array('action' =>'view',$tg0017message['Tg0017message']['id']))); ?>
            <?php echo $this->Html->image("/img/edit-icon.gif", array("alt" => "Brownies","title"=>"Editar",'url' => array('action' => 'edit',$tg0017message['Tg0017message']['id']))); ?>
            <?php echo $this->Html->image("/img/hr.gif", array("alt" => "Brownies","title"=>"Eliminar",'url' => array('action' => 'delete', $tg0017message['Tg0017message']['id']), null, sprintf(__('Tem a certeza que deseja eliminar # %s?', true), $tg0017message['Tg0017message']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

</div>
        <p>
<?php
//echo $this->Paginator->counter(array(
//'format' => __('Page %page% of %pages%, Mostrando %current% linhas. Total: %count% linhas retornadas, starting on record %start%, ending on %end%', true)
//));
?></p>

<div class="paging">
	<?php echo $this->Paginator->prev('<<', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next('>>', array(), null, array('class' => 'disabled'));?>
</div>
</div>