<?php
App::uses('AppController', 'Controller');
class SedesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$sedes	= $this->paginate();
		$this->set(compact('sedes'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Sed->create();
			if ( $this->Sed->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$comunas	= $this->Sed->Comuna->find('list');
		$estudios	= $this->Sed->Estudio->find('list');
		$this->set(compact('comunas', 'estudios'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Sed->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Sed->save($this->request->data) )
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
			$this->request->data	= $this->Sed->find('first', array(
				'conditions'	=> array('Sed.id' => $id)
			));
		}
		$comunas	= $this->Sed->Comuna->find('list');
		$estudios	= $this->Sed->Estudio->find('list');
		$this->set(compact('comunas', 'estudios'));
	}

	public function admin_delete($id = null)
	{
		$this->Sed->id = $id;
		if ( ! $this->Sed->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Sed->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Sed->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Sed->_schema);
		$modelo			= $this->Sed->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
