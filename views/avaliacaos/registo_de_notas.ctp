<?php 
$grupo = $session->read('Auth.User.group_id');
$username = $session->read('Auth.User.username');
?>

<?php //include('menu.ctp'); ?>

<div class="projectos form" id="center-column">
<div class="top-bar">
	<?php //echo $this->Html->link(sprintf(__('Lista de Avaliacoes', true)), array('action' => 'index'),array('class'=>'button')); ?>
	<h1><?php __('Avaliacoes - Registo de Notas');?></h1>

</div>
<div class="table">
    <img src="/sistema/img/ajax-loader.gif" style="display:none" id="ajax-loader">
	<?php echo $this->Form->create('Avaliacaos');?>
	<table class="listingform" cellpadding="0" cellspacing="0">
		<tr>
			<th class="full" colspan="2">Registo de Notas das Avaliacoes</th>
		</tr>
		<?php
			
			//echo $this->Form->input('t0009anolectivo_id',array('empty'=>'--seleccione--','options'=>Anolectivos,'label'=>'Ano Lectivo','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','div'=>false,'id'=>'anolectivoid'));
			
			 echo $this->Form->input('t0003curso_id',array('empty'=>'--seleccione--','options'=>$cursos,'label'=>'Curso','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','div'=>false,'id'=>'cursoid'));
			$options = array('url' => 'update_plano/','update' => 'planoid');
			echo $ajax->observeField('cursoid', $options);			 

			
echo $this->Form->input('t0005planoestudo_id',array('empty'=>'--seleccione--','options'=>$plano,'label'=>'Plano de estudo','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','id'=>'planoid','div'=>false));

if($grupo ==4)
{
			echo $this->Form->input('t0009anolectivo_id',array('empty'=>'--seleccione--','options'=>Anolectivos,'label'=>'Ano Lectivo','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','div'=>false,'id'=>'anolectivoid'));
			$options = array('url' => 'update_turma_funcionario/','update' => 'turma');
            echo $ajax->observeField('anolectivoid', $options);

			echo $this->Form->input('docente',array('value'=>$username,'type'=>'hidden','div'=>false));
			var_dump('Entrei...if .  Username: '. $username);
}else
{

			echo $this->Form->input('t0009anolectivo_id',array('empty'=>'--seleccione--','options'=>Anolectivos,'label'=>'Ano Lectivo','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','div'=>false,'id'=>'anolectivoid'));
			$options = array('url' => 'update_turma/','update' => 'turma');
            echo $ajax->observeField('anolectivoid', $options);
			
			//var_dump('Entrei...else');
}			
		
	/**/
		
		echo $this->Form->input('t0010turma_id',array('empty'=>'--seleccione--','options'=>$turmas,'label'=>'Turma','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','div'=>false,'id'=>'turma'));
		
            echo $this->Form->input('t0014epocaavaliacao_id',array('empty'=>'--seleccione--','options'=>$epocaavaliacaos,'label'=>'Epoca de Avaliacao','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','id'=>'epocaid','div'=>false));
			
			$options = array('url' => 'update_tipo_de_avaliacao/','update' => 'tipoavaliacaoid');
            echo $ajax->observeField('epocaid', $options);
			
			
			echo $this->Form->input('t0015tipoavaliacao_id',array('empty'=>'--seleccione--','options'=>$tipoavaliacaos,'label'=>'Tipo de Avaliacao','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','id'=>'tipoavaliacaoid','div'=>false));
		
		?>
        <tr><td></td><td><?php echo $this->Form->end(__('SEGUINTE', true));?></td></tr>
	</table>
	<br />
	<br />
	
</div>