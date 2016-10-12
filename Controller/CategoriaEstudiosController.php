<?php
App::uses('AppController', 'Controller');
class CategoriaEstudiosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$categoriaEstudios	= $this->paginate();
		$this->set(compact('categoriaEstudios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->CategoriaEstudio->create();
			if ( $this->CategoriaEstudio->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$parentCategoriaEstudios	= $this->CategoriaEstudio->ParentCategoriaEstudio->find('list');
		$this->set(compact('parentCategoriaEstudios'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->CategoriaEstudio->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->CategoriaEstudio->save($this->request->data) )
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
			$this->request->data	= $this->CategoriaEstudio->find('first', array(
				'conditions'	=> array('CategoriaEstudio.id' => $id)
			));
		}
		$parentCategoriaEstudios	= $this->CategoriaEstudio->ParentCategoriaEstudio->find('list');
		$this->set(compact('parentCategoriaEstudios'));
	}

	public function admin_delete($id = null)
	{
		$this->CategoriaEstudio->id = $id;
		if ( ! $this->CategoriaEstudio->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->CategoriaEstudio->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->CategoriaEstudio->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->CategoriaEstudio->_schema);
		$modelo			= $this->CategoriaEstudio->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
