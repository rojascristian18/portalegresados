<?php
App::uses('AppController', 'Controller');
class CategoriasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$categorias	= $this->paginate();
		$this->set(compact('categorias'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Categoria->create();
			if ( $this->Categoria->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$parentCategorias	= $this->Categoria->ParentCategoria->find('list');
		$empleos	= $this->Categoria->Empleo->find('list');
		$usuarios	= $this->Categoria->Usuario->find('list');
		$this->set(compact('parentCategorias', 'empleos', 'usuarios'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Categoria->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Categoria->save($this->request->data) )
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
			$this->request->data	= $this->Categoria->find('first', array(
				'conditions'	=> array('Categoria.id' => $id)
			));
		}
		$parentCategorias	= $this->Categoria->ParentCategoria->find('list');
		$empleos	= $this->Categoria->Empleo->find('list');
		$usuarios	= $this->Categoria->Usuario->find('list');
		$this->set(compact('parentCategorias', 'empleos', 'usuarios'));
	}

	public function admin_delete($id = null)
	{
		$this->Categoria->id = $id;
		if ( ! $this->Categoria->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Categoria->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Categoria->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Categoria->_schema);
		$modelo			= $this->Categoria->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
