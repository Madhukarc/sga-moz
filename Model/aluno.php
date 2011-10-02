<?php
/**
 * OpenSGA - Sistema de Gest�o Acad�mica
 *   Copyright (C) 2010-2011  INFOmoz (Inform�tica-Mo�ambique)
 * 
 * Este programa � um software livre: Voc� pode redistribuir e/ou modificar
 * todo ou parte deste programa, desde que siga os termos da licen�a por nele
 * estabelecidos. Grande parte do c�digo deste programa est� sob a licen�a 
 * GNU Affero General Public License publicada pela Free Software Foundation.
 * A vers�o original desta licen�a est� dispon�vel na pasta raiz deste software.
 * 
 * Este software � distribuido sob a perspectiva de que possa ser �til para 
 * satisfazer as necessidades dos seus utilizadores, mas SEM NENHUMA GARANTIA. Veja
 * os termos da licen�a GNU Affero General Public License para mais detalhes
 * 
 * As redistribui��es deste software, mesmo quando o c�digo-fonte for modificado significativamente,
 * devem manter est� informa��o legal, assim como a licen�a original do software.
 * 
 * @copyright     Copyright 2010-2011, INFOmoz (Inform�tica-Mo�ambique) (http://infomoz.net)
 * @link          http://infomoz.net/opensga CakePHP(tm) Project
 * @author		  Elisio Leonardo (http://infomoz.net/elisio-leonardo)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0
 * @license       GNU Affero General Public License
 * 
 */
 
 
class Aluno extends AppModel {
	var $name = 'Aluno';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Paise' => array(
			'className' => 'Paise',
			'foreignKey' => 'paise_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CidadeNascimento' => array(
			'className' => 'Cidade',
			'foreignKey' => 'natcidade',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'ProvenienciaCidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'provenienciacidade',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProvenienciaProvincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'proveniencianome',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Documento' => array(
			'className' => 'Documento',
			'foreignKey' => 'documento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Areatrabalho' => array(
			'className' => 'Areatrabalho',
			'foreignKey' => 'areatrabalho_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Genero' => array(
			'className' => 'Genero',
			'foreignKey' => 'genero_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Escola' => array(
			'className' => 'Escola',
			'foreignKey' => 'escola_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),		

	);
	
	var $hasMany = array(
		'Matricula' => array(
			'className' => 'Matricula',
			'foreignKey' => 'aluno_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);	




        /**
         *Retorna o plano de estudos activo do aluno
         * @param int $id
         * @return int
         */
        function getPlanoEstudoCorrente($id){
            App::import('Model','Matricula');
            $matriculas = new Matricula;
            $matriculas->recursive=-1;

            $matricula = $matriculas->find('all',array('conditions'=>array('tg0021estadomatricula_id'=>1,'Aluno_id'=>$id)));

            $plano_estudo = $matricula[0]['Matricula']['t0005planoestudo_id'];
            return $plano_estudo;
        }


		/**
		 * Funcao generica para retornar todas as turmas de um aluno com base no estado da turma
		 * @Todo Testar :-)
		 */	
        function getAllTurmasByEstado($aluno,$estado = 1){
            App::import('Model','Turma');
            App::import('Model','Inscricao');
			App::import('Model','Matricula');
			
            $turma = new Turma;
            $inscricao  = new Inscricao;
			$Matricula = new Matricula;
			
			$plano_estudo = $this->query("Select planoestudo_id from matriculas where aluno_id = {$aluno}");
            $turma->recursive=-1;
			
            $turmas = $turma->getAllTurmasActivasByPlanoEstudo($plano_estudo[0]['matriculas']['planoestudo_id']);
            
			return $turmas;
            
        }
		
		function getAllTurmasByAluno($aluno_id,$estado=1){
            App::import('Model','Turma');
            App::import('Model','Inscricao');
			App::import('Model','Matricula');
			
            $turma = new Turma;
            $inscricao  = new Inscricao;
			$Matricula = new Matricula;
			
			$plano_estudo = $this->query("Select planoestudo_id from matriculas where aluno_id = {$aluno}");
            $turma->recursive=-1;
            $turmas = $turma->getAllTurmasByAluno($plano_estudo[0]['matriculas']['planoestudo_id']);
			return $turmas;
		}

       // function getAllTurmasCompletas

        function geraCodigo(){
            	$ano=date('Y');
				$this->recursive=-1;
            	$id = $this->find('count', array('conditions'=>array('Aluno.codigo LIKE'=>'%'.$ano.'%'),'order' => array('Aluno.created DESC'),'fields'=>'id'));
            $id_for=str_pad($id+1, 4,"0",STR_PAD_LEFT);
            $codigo = $ano.$id_for;
			
			return $codigo;
        }
		
		/**
		 * Devolve todas as turmas que o aluno pode se inscrever, baseado nas cadeiras feitas e precedencias
		 * @Todo por enquanto as precedencias e cadeiras feitas nao sao processadas
		 */
		function getAllTurmasForInscricao(){
			
		}



}
?>