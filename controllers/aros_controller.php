<?php
class ArosController extends AppController {

	var $name = 'Aros';

	function index() {
		$this->Aro->recursive = 0;
		$this->set('aros', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'aro'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('aro', $this->Aro->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Aro->create();
			if ($this->Aro->save($this->data)) {
				$this->Session->setFlash(sprintf(__('Dado Cadastrado com sucesso', true), 'aro'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('Erro ao gravar dados. Por favor tente de novo.', true), 'aro'));
			}
		}
		$parentAros = $this->Aro->ParentAro->find('list');
		$acos = $this->Aro->Aco->find('list');
		$this->set(compact('parentAros', 'acos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'aro'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Aro->save($this->data)) {
				$this->Session->setFlash(sprintf(__('Dado Cadastrado com sucesso', true), 'aro'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('Erro ao gravar dados. Por favor tente de novo.', true), 'aro'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Aro->read(null, $id);
		}
		$parentAros = $this->Aro->ParentAro->find('list');
		$acos = $this->Aro->Aco->find('list');
		$this->set(compact('parentAros', 'acos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'aro'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Aro->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Aro'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Aro'));
		$this->redirect(array('action' => 'index'));
	}
        function beforeRender(){
            $this->set('current_section','administracao');
        }
}
?>