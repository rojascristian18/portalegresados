<?php
App::uses('AppController', 'Controller');
class EmpleoUsuariosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$empleoUsuarios	= $this->paginate();
		$this->set(compact('empleoUsuarios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->EmpleoUsuario->create();
			if ( $this->EmpleoUsuario->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$annoExperiencias	= $this->EmpleoUsuario->AnnoExperiencia->find('list');
		$jornadaLaborales	= $this->EmpleoUsuario->JornadaLaboral->find('list');
		$rubroEmpresas	= $this->EmpleoUsuario->RubroEmpresa->find('list');
		$regiones	= $this->EmpleoUsuario->Region->find('list');
		$usuarios	= $this->EmpleoUsuario->Usuario->find('list');
		$this->set(compact('annoExperiencias', 'jornadaLaborales', 'rubroEmpresas', 'regiones', 'usuarios'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->EmpleoUsuario->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->EmpleoUsuario->save($this->request->data) )
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
			$this->request->data	= $this->EmpleoUsuario->find('first', array(
				'conditions'	=> array('EmpleoUsuario.id' => $id)
			));
		}
		$annoExperiencias	= $this->EmpleoUsuario->AnnoExperiencia->find('list');
		$jornadaLaborales	= $this->EmpleoUsuario->JornadaLaboral->find('list');
		$rubroEmpresas	= $this->EmpleoUsuario->RubroEmpresa->find('list');
		$regiones	= $this->EmpleoUsuario->Region->find('list');
		$usuarios	= $this->EmpleoUsuario->Usuario->find('list');
		$this->set(compact('annoExperiencias', 'jornadaLaborales', 'rubroEmpresas', 'regiones', 'usuarios'));
	}

	public function admin_delete($id = null)
	{
		$this->EmpleoUsuario->id = $id;
		if ( ! $this->EmpleoUsuario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->EmpleoUsuario->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->EmpleoUsuario->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->EmpleoUsuario->_schema);
		$modelo			= $this->EmpleoUsuario->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
