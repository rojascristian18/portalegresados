<?php
App::uses('AppController', 'Controller');
class EstudiosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$estudios	= $this->paginate();
		$this->set(compact('estudios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Estudio->create();
			if ( $this->Estudio->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$categoriaEstudios	= $this->Estudio->CategoriaEstudio->find('list');
		$modalidadEstudios	= $this->Estudio->ModalidadEstudio->find('list');
		$sedes	= $this->Estudio->Sed->find('list');
		$this->set(compact('categoriaEstudios', 'modalidadEstudios', 'sedes'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Estudio->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Estudio->save($this->request->data) )
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
			$this->request->data	= $this->Estudio->find('first', array(
				'conditions'	=> array('Estudio.id' => $id)
			));
		}
		$categoriaEstudios	= $this->Estudio->CategoriaEstudio->find('list');
		$modalidadEstudios	= $this->Estudio->ModalidadEstudio->find('list');
		$sedes	= $this->Estudio->Sed->find('list');
		$this->set(compact('categoriaEstudios', 'modalidadEstudios', 'sedes'));
	}

	public function admin_delete($id = null)
	{
		$this->Estudio->id = $id;
		if ( ! $this->Estudio->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Estudio->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Estudio->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Estudio->_schema);
		$modelo			= $this->Estudio->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
