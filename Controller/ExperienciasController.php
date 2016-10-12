<?php
App::uses('AppController', 'Controller');
class ExperienciasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$experiencias	= $this->paginate();
		$this->set(compact('experiencias'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Experiencia->create();
			if ( $this->Experiencia->save($this->request->data) )
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
		if ( ! $this->Experiencia->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Experiencia->save($this->request->data) )
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
			$this->request->data	= $this->Experiencia->find('first', array(
				'conditions'	=> array('Experiencia.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->Experiencia->id = $id;
		if ( ! $this->Experiencia->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Experiencia->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Experiencia->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Experiencia->_schema);
		$modelo			= $this->Experiencia->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
