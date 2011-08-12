<?php
class EpocaavaliacaosController extends AppController {

	var $name = 'Epocaavaliacaos';

	function index() {
		$this->Epocaavaliacao->recursive = 0;
		$this->set('t0014epocaavaliacaos', $this->paginate());
	}

	function view($id = null) 
	{       App::Import('Model','Logmv');
	        $logmv = new Logmv;
		if (!$id) {
			$this->Session->setFlash('Invalido %s', 'error');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('t0014epocaavaliacao', $this->Epocaavaliacao->read(null, $id));
                if (empty($this->data)) 
				{
			$this->data = $this->Epocaavaliacao->read(null, $id);
			//$logmv->logview(14,$this->Session->read('Auth.User.id'),$id,$this->data["Epocaavaliacao"]["name"]);
		
		        }
	}

	function add() {
	        App::Import('Model','Logmv');
	        $logmv = new Logmv;
		if (!empty($this->data)) {
			$this->Epocaavaliacao->create();
			if ($this->Epocaavaliacao->save($this->data)) {
			//$logmv->logInsert(14,$this->Session->read('Auth.User.id'),$this->Epocaavaliacao->getLastInsertID(),$this->data["Epocaavaliacao"]["name"]);
				$this->Session->setFlash('** Dados Cadastrados com Sucesso **','sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao gravar dados. Por favor tente de novo.','error');}
		}
	}

	function edit($id = null) {
	  App::Import('Model','Logmv');
	        $logmv = new Logmv;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalido %s', 'error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Epocaavaliacao->save($this->data)) {
			 //$logmv->logUpdate(14,$this->Session->read('Auth.User.id'),$id,$this->data["Epocaavaliacao"]["name"]);
				
				$this->Session->setFlash('Dado Editados com sucesso','sucesso');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao editar dados. Por favor tente de novo.','error');}
		}
		if (empty($this->data)) {
			$this->data = $this->Epocaavaliacao->read(null, $id);
		}
	}

	function delete($id = null) {
	        App::Import('Model','Logmv');
	        $logmv = new Logmv;
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 't0014epocaavaliacao'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Epocaavaliacao->delete($id)) {
		//$logmv->logDelete(14,$this->Session->read('Auth.User.id'),$id,'Delete Epoca de Avaliacao');
			$this->Session->setFlash('Dados deletedos com sucesso ','sucesso');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Epocaavaliacao'));
		$this->redirect(array('action' => 'index'));
	}
        function beforeRender(){
            $this->set('current_section','avaliacao');
        }
}
?>