<?php
App::uses('AppController', 'Controller');
class RubroEmpresasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$rubroEmpresas	= $this->paginate();
		$this->set(compact('rubroEmpresas'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->RubroEmpresa->create();
			if ( $this->RubroEmpresa->save($this->request->data) )
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
		if ( ! $this->RubroEmpresa->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->RubroEmpresa->save($this->request->data) )
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
			$this->request->data	= $this->RubroEmpresa->find('first', array(
				'conditions'	=> array('RubroEmpresa.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->RubroEmpresa->id = $id;
		if ( ! $this->RubroEmpresa->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->RubroEmpresa->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->RubroEmpresa->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->RubroEmpresa->_schema);
		$modelo			= $this->RubroEmpresa->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
