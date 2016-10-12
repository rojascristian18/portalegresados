<?php
App::uses('AppController', 'Controller');
class JornadasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$jornadas	= $this->paginate();
		$this->set(compact('jornadas'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Jornada->create();
			if ( $this->Jornada->save($this->request->data) )
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
		if ( ! $this->Jornada->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Jornada->save($this->request->data) )
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
			$this->request->data	= $this->Jornada->find('first', array(
				'conditions'	=> array('Jornada.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->Jornada->id = $id;
		if ( ! $this->Jornada->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Jornada->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Jornada->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Jornada->_schema);
		$modelo			= $this->Jornada->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
