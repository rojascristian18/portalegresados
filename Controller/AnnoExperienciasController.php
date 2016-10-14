<?php
App::uses('AppController', 'Controller');
class AnnoExperienciasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$annoExperiencias	= $this->paginate();
		$this->set(compact('annoExperiencias'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->AnnoExperiencia->create();
			if ( $this->AnnoExperiencia->save($this->request->data) )
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
		if ( ! $this->AnnoExperiencia->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->AnnoExperiencia->save($this->request->data) )
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
			$this->request->data	= $this->AnnoExperiencia->find('first', array(
				'conditions'	=> array('AnnoExperiencia.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->AnnoExperiencia->id = $id;
		if ( ! $this->AnnoExperiencia->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->AnnoExperiencia->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->AnnoExperiencia->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->AnnoExperiencia->_schema);
		$modelo			= $this->AnnoExperiencia->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
