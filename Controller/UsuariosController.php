<?php
App::uses('AppController', 'Controller');
class UsuariosController extends AppController
{
	public function admin_login()
	{
		if ( $this->request->is('post') )
		{
			if ( $this->Auth->login() )
			{
				$this->redirect($this->Auth->redirectUrl());
			}
			else
			{
				$this->Session->setFlash('Nombre de usuario y/o clave incorrectos.', null, array(), 'danger');
			}
		}
		$this->layout	= 'login';
	}

	public function admin_logout()
	{
		$this->redirect($this->Auth->logout());
	}

	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$usuarios	= $this->paginate();
		$this->set(compact('usuarios'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Usuario->create();
			if ( $this->Usuario->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$jornadaEstudios	= $this->Usuario->JornadaEstudio->find('list');
		$sedes	= $this->Usuario->Sede->find('list');
		$estudios	= $this->Usuario->Estudio->find('list');
		$estudioUsuarios	= $this->Usuario->EstudioUsuario->find('list');
		$experiencias	= $this->Usuario->Experiencia->find('list');
		$jornadas	= $this->Usuario->Jornada->find('list');
		$cargos	= $this->Usuario->Cargo->find('list');
		$tipoContratos	= $this->Usuario->TipoContrato->find('list');
		$situacionLaborales	= $this->Usuario->SituacionLaboral->find('list');
		$comunas	= $this->Usuario->Comuna->find('list');
		$preguntas	= $this->Usuario->Pregunta->find('list');
		$categorias	= $this->Usuario->Categoria->find('list');
		$this->set(compact('jornadaEstudios', 'sedes', 'estudios', 'estudioUsuarios', 'experiencias', 'jornadas', 'cargos', 'tipoContratos', 'situacionLaborales', 'comunas', 'preguntas', 'categorias'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Usuario->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Usuario->save($this->request->data) )
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
			$this->request->data	= $this->Usuario->find('first', array(
				'conditions'	=> array('Usuario.id' => $id)
			));
		}
		$jornadaEstudios	= $this->Usuario->JornadaEstudio->find('list');
		$sedes	= $this->Usuario->Sede->find('list');
		$estudios	= $this->Usuario->Estudio->find('list');
		$estudioUsuarios	= $this->Usuario->EstudioUsuario->find('list');
		$experiencias	= $this->Usuario->Experiencia->find('list');
		$jornadas	= $this->Usuario->Jornada->find('list');
		$cargos	= $this->Usuario->Cargo->find('list');
		$tipoContratos	= $this->Usuario->TipoContrato->find('list');
		$situacionLaborales	= $this->Usuario->SituacionLaboral->find('list');
		$comunas	= $this->Usuario->Comuna->find('list');
		$preguntas	= $this->Usuario->Pregunta->find('list');
		$categorias	= $this->Usuario->Categoria->find('list');
		$this->set(compact('jornadaEstudios', 'sedes', 'estudios', 'estudioUsuarios', 'experiencias', 'jornadas', 'cargos', 'tipoContratos', 'situacionLaborales', 'comunas', 'preguntas', 'categorias'));
	}

	public function admin_delete($id = null)
	{
		$this->Usuario->id = $id;
		if ( ! $this->Usuario->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Usuario->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Usuario->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Usuario->_schema);
		$modelo			= $this->Usuario->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
