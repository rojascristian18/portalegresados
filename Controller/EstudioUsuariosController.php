<?php
App::uses('AppController', 'Controller');
class EstudioUsuariosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$estudioUsuarios	= $this->paginate();
		$this->set(compact('estudioUsuarios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->EstudioUsuario->create();
			if ( $this->EstudioUsuario->save($this->request->data) )
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
		if ( ! $this->EstudioUsuario->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->EstudioUsuario->save($this->request->data) )
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
			$this->request->data	= $this->EstudioUsuario->find('first', array(
				'conditions'	=> array('EstudioUsuario.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->EstudioUsuario->id = $id;
		if ( ! $this->EstudioUsuario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->EstudioUsuario->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->EstudioUsuario->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->EstudioUsuario->_schema);
		$modelo			= $this->EstudioUsuario->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
