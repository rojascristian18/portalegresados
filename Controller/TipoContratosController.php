<?php
App::uses('AppController', 'Controller');
class TipoContratosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$tipoContratos	= $this->paginate();
		$this->set(compact('tipoContratos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->TipoContrato->create();
			if ( $this->TipoContrato->save($this->request->data) )
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
		if ( ! $this->TipoContrato->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->TipoContrato->save($this->request->data) )
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
			$this->request->data	= $this->TipoContrato->find('first', array(
				'conditions'	=> array('TipoContrato.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->TipoContrato->id = $id;
		if ( ! $this->TipoContrato->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->TipoContrato->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->TipoContrato->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->TipoContrato->_schema);
		$modelo			= $this->TipoContrato->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
