<?php
App::uses('AppController', 'Controller');
class EstadoPostulacionesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$estadoPostulaciones	= $this->paginate();
		$this->set(compact('estadoPostulaciones'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->EstadoPostulacion->create();
			if ( $this->EstadoPostulacion->save($this->request->data) )
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
		if ( ! $this->EstadoPostulacion->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->EstadoPostulacion->save($this->request->data) )
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
			$this->request->data	= $this->EstadoPostulacion->find('first', array(
				'conditions'	=> array('EstadoPostulacion.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->EstadoPostulacion->id = $id;
		if ( ! $this->EstadoPostulacion->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->EstadoPostulacion->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->EstadoPostulacion->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->EstadoPostulacion->_schema);
		$modelo			= $this->EstadoPostulacion->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
