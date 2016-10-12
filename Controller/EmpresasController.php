<?php
App::uses('AppController', 'Controller');
class EmpresasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$empresas	= $this->paginate();
		$this->set(compact('empresas'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Empresa->create();
			if ( $this->Empresa->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$rubroEmpresas	= $this->Empresa->RubroEmpresa->find('list');
		$comunas	= $this->Empresa->Comuna->find('list');
		$empleados	= $this->Empresa->Empleado->find('list');
		$preguntas	= $this->Empresa->Pregunta->find('list');
		$this->set(compact('rubroEmpresas', 'comunas', 'empleados', 'preguntas'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Empresa->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Empresa->save($this->request->data) )
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
			$this->request->data	= $this->Empresa->find('first', array(
				'conditions'	=> array('Empresa.id' => $id)
			));
		}
		$rubroEmpresas	= $this->Empresa->RubroEmpresa->find('list');
		$comunas	= $this->Empresa->Comuna->find('list');
		$empleados	= $this->Empresa->Empleado->find('list');
		$preguntas	= $this->Empresa->Pregunta->find('list');
		$this->set(compact('rubroEmpresas', 'comunas', 'empleados', 'preguntas'));
	}

	public function admin_delete($id = null)
	{
		$this->Empresa->id = $id;
		if ( ! $this->Empresa->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Empresa->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Empresa->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Empresa->_schema);
		$modelo			= $this->Empresa->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
