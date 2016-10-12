<?php
App::uses('AppController', 'Controller');
class JornadaEstudiosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$jornadaEstudios	= $this->paginate();
		$this->set(compact('jornadaEstudios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->JornadaEstudio->create();
			if ( $this->JornadaEstudio->save($this->request->data) )
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
		if ( ! $this->JornadaEstudio->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->JornadaEstudio->save($this->request->data) )
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
			$this->request->data	= $this->JornadaEstudio->find('first', array(
				'conditions'	=> array('JornadaEstudio.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->JornadaEstudio->id = $id;
		if ( ! $this->JornadaEstudio->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->JornadaEstudio->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->JornadaEstudio->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->JornadaEstudio->_schema);
		$modelo			= $this->JornadaEstudio->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
