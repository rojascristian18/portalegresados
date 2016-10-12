<?php
App::uses('AppController', 'Controller');
class EmpleadosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$empleados	= $this->paginate();
		$this->set(compact('empleados'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Empleado->create();
			if ( $this->Empleado->save($this->request->data) )
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
		if ( ! $this->Empleado->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Empleado->save($this->request->data) )
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
			$this->request->data	= $this->Empleado->find('first', array(
				'conditions'	=> array('Empleado.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->Empleado->id = $id;
		if ( ! $this->Empleado->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Empleado->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Empleado->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Empleado->_schema);
		$modelo			= $this->Empleado->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
