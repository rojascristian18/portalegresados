<?php
App::uses('AppController', 'Controller');
class PostulacionesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$postulaciones	= $this->paginate();
		$this->set(compact('postulaciones'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Postulacion->create();
			if ( $this->Postulacion->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$empleos	= $this->Postulacion->Empleo->find('list');
		$usuarios	= $this->Postulacion->Usuario->find('list');
		$estadoPostulaciones	= $this->Postulacion->EstadoPostulacion->find('list');
		$this->set(compact('empleos', 'usuarios', 'estadoPostulaciones'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Postulacion->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Postulacion->save($this->request->data) )
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
			$this->request->data	= $this->Postulacion->find('first', array(
				'conditions'	=> array('Postulacion.id' => $id)
			));
		}
		$empleos	= $this->Postulacion->Empleo->find('list');
		$usuarios	= $this->Postulacion->Usuario->find('list');
		$estadoPostulaciones	= $this->Postulacion->EstadoPostulacion->find('list');
		$this->set(compact('empleos', 'usuarios', 'estadoPostulaciones'));
	}

	public function admin_delete($id = null)
	{
		$this->Postulacion->id = $id;
		if ( ! $this->Postulacion->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Postulacion->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Postulacion->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Postulacion->_schema);
		$modelo			= $this->Postulacion->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
