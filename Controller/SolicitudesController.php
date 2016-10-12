<?php
App::uses('AppController', 'Controller');
class SolicitudesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$solicitudes	= $this->paginate();
		$this->set(compact('solicitudes'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Solicitud->create();
			if ( $this->Solicitud->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$tipoSolicitudes	= $this->Solicitud->TipoSolicitud->find('list');
		$usuarios	= $this->Solicitud->Usuario->find('list');
		$this->set(compact('tipoSolicitudes', 'usuarios'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Solicitud->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Solicitud->save($this->request->data) )
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
			$this->request->data	= $this->Solicitud->find('first', array(
				'conditions'	=> array('Solicitud.id' => $id)
			));
		}
		$tipoSolicitudes	= $this->Solicitud->TipoSolicitud->find('list');
		$usuarios	= $this->Solicitud->Usuario->find('list');
		$this->set(compact('tipoSolicitudes', 'usuarios'));
	}

	public function admin_delete($id = null)
	{
		$this->Solicitud->id = $id;
		if ( ! $this->Solicitud->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Solicitud->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Solicitud->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Solicitud->_schema);
		$modelo			= $this->Solicitud->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
