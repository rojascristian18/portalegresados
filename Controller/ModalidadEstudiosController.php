<?php
App::uses('AppController', 'Controller');
class ModalidadEstudiosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$modalidadEstudios	= $this->paginate();
		$this->set(compact('modalidadEstudios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->ModalidadEstudio->create();
			if ( $this->ModalidadEstudio->save($this->request->data) )
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
		if ( ! $this->ModalidadEstudio->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->ModalidadEstudio->save($this->request->data) )
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
			$this->request->data	= $this->ModalidadEstudio->find('first', array(
				'conditions'	=> array('ModalidadEstudio.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->ModalidadEstudio->id = $id;
		if ( ! $this->ModalidadEstudio->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->ModalidadEstudio->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->ModalidadEstudio->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->ModalidadEstudio->_schema);
		$modelo			= $this->ModalidadEstudio->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
