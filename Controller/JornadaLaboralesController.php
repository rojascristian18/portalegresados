<?php
App::uses('AppController', 'Controller');
class JornadaLaboralesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$jornadaLaborales	= $this->paginate();
		$this->set(compact('jornadaLaborales'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->JornadaLaboral->create();
			if ( $this->JornadaLaboral->save($this->request->data) )
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
		if ( ! $this->JornadaLaboral->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->JornadaLaboral->save($this->request->data) )
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
			$this->request->data	= $this->JornadaLaboral->find('first', array(
				'conditions'	=> array('JornadaLaboral.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->JornadaLaboral->id = $id;
		if ( ! $this->JornadaLaboral->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->JornadaLaboral->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->JornadaLaboral->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->JornadaLaboral->_schema);
		$modelo			= $this->JornadaLaboral->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
