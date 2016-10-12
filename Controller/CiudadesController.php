<?php
App::uses('AppController', 'Controller');
class CiudadesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$ciudades	= $this->paginate();
		$this->set(compact('ciudades'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Ciudad->create();
			if ( $this->Ciudad->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$regiones	= $this->Ciudad->Region->find('list');
		$this->set(compact('regiones'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Ciudad->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Ciudad->save($this->request->data) )
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
			$this->request->data	= $this->Ciudad->find('first', array(
				'conditions'	=> array('Ciudad.id' => $id)
			));
		}
		$regiones	= $this->Ciudad->Region->find('list');
		$this->set(compact('regiones'));
	}

	public function admin_delete($id = null)
	{
		$this->Ciudad->id = $id;
		if ( ! $this->Ciudad->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Ciudad->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Ciudad->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Ciudad->_schema);
		$modelo			= $this->Ciudad->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
