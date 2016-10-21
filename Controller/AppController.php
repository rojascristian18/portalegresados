<?php
App::uses('Controller', 'Controller');
//App::uses('FB', 'Facebook.Lib');
class AppController extends Controller
{
	public $helpers		= array(
		'Session', 'Html', 'Form', 'PhpExcel'
		//, 'Facebook.Facebook'
	);
	public $components	= array(
		'Session',
		'Auth'		=> array(
			'authError'			=> 'No tienes permisos para entrar a esta sección.',
			'Form'				=> array(
				'fields' => array(
					'username'	=> 'email',
					'password'	=> 'clave'
				)
			)
		),
		'DebugKit.Toolbar',
		'Breadcrumb' => array(
			'crumbs'		=> array(
				array('Inicio', '/job')
			)
		)
		//'Facebook.Connect'	=> array('model' => 'Usuario'),
		//'Facebook'
	);

	public function beforeFilter()
	{
		/**
		 * Layout administracion y permisos publicos
		 */
		if ( ! empty($this->request->params['admin']) )
		{
			$this->layoutPath				= 'backend';
			AuthComponent::$sessionKey		= 'Auth.Administrador';

			// Login action config
			$this->Auth->loginAction['controller'] 	= 'administradores';
			$this->Auth->loginAction['action'] 		= 'login';
			$this->Auth->loginAction['admin'] 		= true;

			// Login redirect and logout redirect
			$this->Auth->loginRedirect = '/admin';
			$this->Auth->logoutRedirect = '/admin';

			// Login Form config
			$this->Auth->authenticate['Form']['userModel']		= 'Administrador';
			$this->Auth->authenticate['Form']['fields']['username'] = 'email';
			$this->Auth->authenticate['Form']['fields']['password'] = 'clave';			
		}

		/**
		* Layout empresas
		*/
		if ( ! empty($this->request->params['businesses']) ) {

			$this->layoutPath				= 'businesses-backend';

			AuthComponent::$sessionKey		= 'Auth.Empresa';
			// Login action config
			$this->Auth->loginAction['controller'] 	= 'empresas';
			$this->Auth->loginAction['action'] 		= 'login';
			$this->Auth->loginAction['businesses'] 		= true;

			// Login redirect and logout redirect
			$this->Auth->loginRedirect = '/businesses';
			$this->Auth->logoutRedirect = '/businesses';

			// Permitir a usuario no logeado ingresar a los métodos
			$this->Auth->allow('businesses_registro', 'businesses_recuperarclave');

			// Login Form config
			$this->Auth->authenticate['Form']['userModel']		= 'Empresa';
			$this->Auth->authenticate['Form']['fields']['username'] = 'email';
			$this->Auth->authenticate['Form']['fields']['password'] = 'clave';
		}

		/**
		* Layout exalumnos
		*/
		if ( ! empty($this->request->params['graduate']) ) {

			$this->layoutPath				= 'graduate-backend';
			AuthComponent::$sessionKey		= 'Auth.Exalumno';

			// Login action config
			$this->Auth->loginAction['controller'] 	= 'usuarios';
			$this->Auth->loginAction['action'] 		= 'login';
			$this->Auth->loginAction['graduate'] 		= true;

			// Login redirect and logout redirect
			$this->Auth->loginRedirect = '/graduate';
			$this->Auth->logoutRedirect = '/graduate';

			// Login Form config
			$this->Auth->authenticate['Form']['userModel']		= 'Usuario';
			$this->Auth->authenticate['Form']['fields']['username'] = 'email';
			$this->Auth->authenticate['Form']['fields']['password'] = 'clave';
		}

		if( empty($this->request->params['graduate']) &&  empty($this->request->params['businesses']) && empty($this->request->params['admin']) ) {
			AuthComponent::$sessionKey		= 'Auth.Visitante';
			$this->Auth->allow();
		}

		/**
		 * Logout FB
		 */
		/*
		if ( ! isset($this->request->params['admin']) && ! $this->Connect->user() && $this->Auth->user() )
			$this->Auth->logout();
		*/

		/**
		 * Detector cliente local
		 */
		$this->request->addDetector('localip', array(
			'env'			=> 'REMOTE_ADDR',
			'options'		=> array('::1', '127.0.0.1'))
		);

		/**
		 * Detector entrada via iframe FB
		 */
		$this->request->addDetector('iframefb', array(
			'env'			=> 'HTTP_REFERER',
			'pattern'		=> '/facebook\.com/i'
		));

		/**
		 * Cookies IE
		 */
		header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
	}

	/**
	 * Guarda el usuario Facebook
	 */
	public function beforeFacebookSave()
	{
		if ( ! isset($this->request->params['admin']) )
		{
			$this->Connect->authUser['Usuario']		= array_merge(array(
				'nombre_completo'	=> $this->Connect->user('name'),
				'nombre'			=> $this->Connect->user('first_name'),
				'apellido'			=> $this->Connect->user('last_name'),
				'usuario'			=> $this->Connect->user('username'),
				'clave'				=> $this->Connect->authUser['Usuario']['password'],
				'email'				=> $this->Connect->user('email'),
				'sexo'				=> $this->Connect->user('gender'),
				'verificado' 		=> $this->Connect->user('verified'),
				'edad'				=> $this->Session->read('edad')
			), $this->Connect->authUser['Usuario']);
		}

		return true;
	}


	public function beforeRender() {
		// Camino de migas
		$breadcrumbs	= BreadcrumbComponent::get();

		//Modulos disponibles
		$modulosDisponibles = $this->getModuleByProfile();
		
	
		if ( ! empty($breadcrumbs) )
		{
			$this->set(compact('breadcrumbs', 'modulosDisponibles'));
		}else{
			$this->set(compact('modulosDisponibles'));
		}

	}


	/**
	* Función que permite conocer la cantidad de ediciones diponibles que tiene una oferta de empleo
	* @param $id 	Bigint	Identificador del empleo
	* @return $ediciones 	Int 	Cantidad de ediciones diponibles
	*/
	public function obtenerCantidadEdiciones () {

		/**
		* Cantidad de ediciones definidas en el sistema
		*/
		$configuracion = ClassRegistry::init('Configuracion')->find('first', array('fields' => array('ediciones')));

		if ( ! empty($configuracion) ) {
			return $configuracion['Configuracion']['ediciones'];
		}

		// Si no existe una configuración que defina la cantidad de ediciones, el sistema lo define con 2 ediciones
		return 2;
	}


	/**
	* Verifica que todos los campos de la empresa esten completos.
	* @param 	id 		Integer 	Identificador de la Empresa
	* @return 	bool 	
	*/
	public function verificarPerfilCompleto($id = null) {
		if (ClassRegistry::init('Empresa')->exists($id)) {

			$empresa = ClassRegistry::init('Empresa')->find('first', array('conditions' => array('Empresa.id' => $id, 'Empresa.activo' => 1)));
			
			if (! empty($empresa) ) {
				foreach ($empresa['Empresa'] as $campo) {
					if ($campo == null || empty($campo) ) {
						return false;
					}
				}

				return true;
			}

			return false;
		}

		return false;
	}


	/**
	* Retorna todos los módulos por usuario.
	*
	*/
	public function getModuleByProfile(){

		$modulos = ClassRegistry::init( 'Modulo' )->find('all', array('conditions' => array('parent_id' => null), 'orderby' => array('orden') ));
		
			$data = array();
			foreach ($modulos as $padre) {
				$data[] = array(
					'modulo' => $padre['Modulo']['modulo'],
					'url'	=> $padre['Modulo']['url'],
					'icono' => $padre['Modulo']['icono'],
					'hijos' => ClassRegistry::init( 'Modulo' )->find(
						'all', array(
							'conditions' => array('Modulo.parent_id' => $padre['Modulo']['id'] ),
							'contain' => array('Perfil'),
							'joins' => array(
								array(
									'table' => 'modulos_perfiles',
						            'alias' => 'md',
						            'type'  => 'INNER',
						            'conditions' => array(
						                'md.modulo_id = Modulo.id',
						                'md.perfil_id' => $this->Session->read('Auth.Administrador.perfil_id')
						            )
								)
							)
						)
					)
				);
		}
		
		return $data;
	}
}
