<?php
App::uses('AppController', 'Controller');
class EstadoEmpleosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$estadoEmpleos	= $this->paginate();
		$this->set(compact('estadoEmpleos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->EstadoEmpleo->create();
			if ( $this->EstadoEmpleo->save($this->request->data) )
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
		if ( ! $this->EstadoEmpleo->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->EstadoEmpleo->save($this->request->data) )
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
			$this->request->data	= $this->EstadoEmpleo->find('first', array(
				'conditions'	=> array('EstadoEmpleo.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->EstadoEmpleo->id = $id;
		if ( ! $this->EstadoEmpleo->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->EstadoEmpleo->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->EstadoEmpleo->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->EstadoEmpleo->_schema);
		$modelo			= $this->EstadoEmpleo->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
