<?php
App::uses('AppController', 'Controller');
class SituacionLaboralesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$situacionLaborales	= $this->paginate();
		$this->set(compact('situacionLaborales'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->SituacionLaboral->create();
			if ( $this->SituacionLaboral->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->SituacionLaboral->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->SituacionLaboral->save($this->request->data) )
			{
				$this->Session->setFlash('Registro editado correctamente', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		else
		{
			$this->request->data	= $this->SituacionLaboral->find('first', array(
				'conditions'	=> array('SituacionLaboral.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->SituacionLaboral->id = $id;
		if ( ! $this->SituacionLaboral->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->SituacionLaboral->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->SituacionLaboral->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->SituacionLaboral->_schema);
		$modelo			= $this->SituacionLaboral->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
