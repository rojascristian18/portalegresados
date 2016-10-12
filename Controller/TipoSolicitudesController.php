<?php
App::uses('AppController', 'Controller');
class TipoSolicitudesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$tipoSolicitudes	= $this->paginate();
		$this->set(compact('tipoSolicitudes'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->TipoSolicitud->create();
			if ( $this->TipoSolicitud->save($this->request->data) )
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
		if ( ! $this->TipoSolicitud->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->TipoSolicitud->save($this->request->data) )
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
			$this->request->data	= $this->TipoSolicitud->find('first', array(
				'conditions'	=> array('TipoSolicitud.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->TipoSolicitud->id = $id;
		if ( ! $this->TipoSolicitud->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->TipoSolicitud->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->TipoSolicitud->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->TipoSolicitud->_schema);
		$modelo			= $this->TipoSolicitud->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
