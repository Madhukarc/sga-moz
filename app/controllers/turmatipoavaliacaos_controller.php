<?php
class T0018turmatipoavaliacaosController extends AppController {

	var $name = 'T0018turmatipoavaliacaos';

	function index() {
		$this->T0018turmatipoavaliacao->recursive = 0;
		$this->set('t0018turmatipoavaliacaos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalido %s', 'error');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('t0018turmatipoavaliacao', $this->T0018turmatipoavaliacao->read(null, $id));
                if (empty($this->data)) {
			$this->data = $this->T0018turmatipoavaliacao->read(null, $id);
		}

		$turma = $this->T0018turmatipoavaliacao->Turma->find('list');
		$tipoavaliacao = $this->T0018turmatipoavaliacao->Tipoavaliacao->find('list');
       	$this->set(compact('t0010turma', 't0015tipoavaliacao'));
	}

	function add() {
		if (!empty($this->data)) {
			$this->T0018turmatipoavaliacao->create();
			if ($this->T0018turmatipoavaliacao->save($this->data)) {
				$this->Session->setFlash('** Dados Cadastrados com Sucesso **','sucesso');
				$this->redirect(array('action' => 'index'));
				
			} else {
				$this->Session->setFlash('Erro ao gravar dados. Por favor tente de novo Zai.','error');}
		}
		
		$turmas = $this->T0018turmatipoavaliacao->Turma->find('list');
		$tipoavaliacaos = $this->T0018turmatipoavaliacao->Tipoavaliacao->find('list');
		$this->set(compact('t0010turmas', 't0015tipoavaliacaos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalido %s', 'error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->T0018turmatipoavaliacao->save($this->data)) {
				$this->Session->setFlash('Dado Editados com sucesso','sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao editar dados. Por favor tente de novo.','error');}
		}
		if (empty($this->data)) {
			$this->data = $this->T0018turmatipoavaliacao->read(null, $id);
		}
		$turmas = $this->T0018turmatipoavaliacao->Turma->find('list');
		$tipoavaliacaos = $this->T0018turmatipoavaliacao->Tipoavaliacao->find('list');
		$this->set(compact('t0010turmas', 't0015tipoavaliacaos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 't0018turmatipoavaliacao'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->T0018turmatipoavaliacao->delete($id)) {
			$this->Session->setFlash('Dados deletedos com sucesso ','sucesso');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'T0018turmatipoavaliacao'));
		$this->redirect(array('action' => 'index'));
	}
        function beforeRender(){
            $this->set('current_section','avaliacao');
        }
		
		
}
?>