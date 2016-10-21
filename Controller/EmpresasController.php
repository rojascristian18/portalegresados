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



	/**
	* Métodos para Empresa
	* Prefix => businesses
	*/

	/**
	* Métodos administrativos
	*/
	public function businesses_login()
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

		$rubroEmpresas	= $this->Empresa->RubroEmpresa->find('list');
		$comunas	= $this->Empresa->Comuna->find('list');
		$empleados	= $this->Empresa->Empleado->find('list');
		$preguntas	= $this->Empresa->Pregunta->find('list');

		$this->layout	= 'login';

		$this->set(compact('rubroEmpresas', 'comunas', 'empleados', 'preguntas'));
		
	}


	public function businesses_logout()
	{
		$this->redirect($this->Auth->logout());
	}

	public function businesses_index()
	{	
		$this->paginate		= array(
			'recursive'			=> 0
		);

		/*
		* Verifica que los campos de Empresa esten completos
		*/
		if ( ! $this->verificarPerfilCompleto( $this->Auth->user('id') ) ) {
			$this->Session->setFlash(sprintf('Su perfil no se encuentra completo, por favor ingrese <a class="btn-link" href="businesses/empresas/edit/%s">aquí.</a>', $this->Auth->user('id')), null, array(), 'danger');
		}

		$empresas	= $this->paginate();

		// Camino de migas
		BreadcrumbComponent::add('Dashboard ');     

		$this->set(compact('empresas'));
	}

	public function businesses_add()
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

	public function businesses_edit($id = null)
	{
		if ( ! $this->Empresa->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{ 	
			
			foreach ($this->request->data['Empresa'] as $ix => $val) {
				if ( empty($val) ) {
					unset($this->request->data['Empresa'][$ix]);
				}
			}

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

		/*
		* Verifica que los campos de Empresa esten completos
		*/
		if ( ! $this->verificarPerfilCompleto( $this->Auth->user('id') ) ) {
			$this->Session->setFlash(sprintf('Su perfil no se encuentra completo, por favor ingrese <a class="btn-link" href="businesses/empresas/edit/%s">aquí.</a>', $this->Auth->user('id')), null, array(), 'danger');
		}

		// Camino de migas
		BreadcrumbComponent::add('Mi empresa ');
		
		$rubroEmpresas	= $this->Empresa->RubroEmpresa->find('list');
		$comunas	= $this->Empresa->Comuna->find('list');
		$empleados	= $this->Empresa->Empleado->find('list');
		$preguntas	= $this->Empresa->Pregunta->find('list');
		$this->set(compact('rubroEmpresas', 'comunas', 'empleados', 'preguntas'));
	}

	public function businesses_delete($id = null)
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

	public function businesses_exportar()
	{
		$datos			= $this->Empresa->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Empresa->_schema);
		$modelo			= $this->Empresa->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}

	/**
	* Métodos públicos
	*/

	/**
	* Registro de una nueva empresa
	*/
	public function businesses_registro()
	{ 	
		if ( $this->request->is('post') )
		{	

			$this->Empresa->create();
			if ( $this->Empresa->save($this->request->data) )
			{
				$this->Session->setFlash('Cuenta creada exitosamente.', null, array(), 'success');
				$this->redirect(array('action' => 'login', 'businesses' => true));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
				$this->redirect(array('action' => 'login', 'businesses' => true));
			}
		}

		$rubroEmpresas	= $this->Empresa->RubroEmpresa->find('list');
		$comunas	= $this->Empresa->Comuna->find('list');
		$empleados	= $this->Empresa->Empleado->find('list');
		$preguntas	= $this->Empresa->Pregunta->find('list');

		// Layout para la vista publica
		$this->layout = 'public';

		$this->set(compact('rubroEmpresas', 'comunas', 'empleados', 'preguntas'));
	}


	/**
	* Función que permite recuperar la contraseña 
	* respondiendo la pregunta de seguridad. Si la respuesta es correcta se envía 
	* la nueva clave al email dela empresa
	* @param 	array()		GET		email 	Email de la empresa
	* @param 	array() 	POST 	empresa Id empresa	
	* @param 	array() 	POST 	respuesta 	Respuesta de la empresa a la pregunta secreta
	* @return 	redirect
	*/
	public function businesses_recuperarclave() {

		if ($this->request->is('post')) {
			
			$empresa = $this->Empresa->find('first', array('conditions' => array('Empresa.id' => $this->request->data['Empresa']['empresa'])));

			// Comparación de las respuestas en minúscula
			if ( strtolower($empresa['Empresa']['respuesta']) == strtolower($this->request->data['Empresa']['respuesta']) ) {

				// Creamos una clave nueva para el usuario, Se envía al email del usuario en el Modelo.
				$empresa['Empresa']['clave'] = mktime(date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"));

				// BIT para decirle al modelo que debe enviar email con la nueva contraseña
				$empresa['Empresa']['enviar_email'] = true;
				// Contraseña no codificada.
				$empresa['Empresa']['enviar_email_clave'] = $empresa['Empresa']['clave'];

				// Se limpian valores vacios
				foreach ($empresa['Empresa'] as $indice => $valor) {
					if ( empty($valor) ) {
						unset($empresa['Empresa'][$indice]);
					}
				}
				
				if ( $this->Empresa->save($empresa) ) {
					$this->Session->setFlash('¡Éxito! Su nueva contraseña fue enviada a su email.', null, array(), 'success');
					$this->redirect(array('action' => 'login', 'businesses' => true));
				}else{
					$this->Session->setFlash('Ocurrió un error inesperado. Por favor intente nuevamente.', null, array(), 'danger');
					$this->redirect(array('action' => 'login', 'businesses' => true));
				}
			}

			$this->Session->setFlash('La respuesta ingresada no es correcta. Por favor intente nuevamente.', null, array(), 'danger');
			$this->redirect(array('action' => 'login', 'businesses' => true));

		}
		
		if ($this->request->is('get')) {
			$emailEmpresa = $this->request->query['email'];

			$empresa = $this->Empresa->find('first', array(
				'conditions' => array(
					'Empresa.email' => $emailEmpresa
				),
				'contain' => array('Pregunta')
			));

			if ( empty($empresa) ) {
				$this->Session->setFlash('No se encuentra el email en nuestros registros.', null, array(), 'danger');
				$this->redirect(array('action' => 'login', 'businesses' => true));
			}

			$pregunta = $empresa['Pregunta']['pregunta'];

			// Layout para la vista publica
			$this->layout = 'public';

			$this->set(compact('pregunta', 'empresa'));
		}
	}
}
