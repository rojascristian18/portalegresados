<?php
App::uses('DispatcherFilter', 'Routing');
class ApiDispatcher extends DispatcherFilter
{
	public $priority		= 11;
	public $prefix			= 'api';
	public $versions		= array(
		'1.0',
		'2.0'
	);
	public $mapping			= array(
		'GET'		=> '%s_v%d_index',
		'POST'		=> '%s_v%d_add',
		'PUT'		=> '%s_v%d_edit',
		'DELETE'	=> '%s_v%d_delete'
	);

	public function beforeDispatch(CakeEvent $event)
	{
		$request		= $event->data['request'];
		$params			= $request->params;
		$url			= $request->url;
		$response		= $event->data['response'];

		/**
		 * Solo procesa requests que
		 * 1.- Tenga una extension habilitada
		 * 2.- Pase la validacion de Routing (/api/:version)
		 */
		if ( ! empty($request->params['ext']) && in_array($request->params['ext'], Router::extensions())
			 && ! empty($request->params[$this->prefix]) )
		{
			$controller			= Inflector::camelize($params['endpoint']);
			$controllerClass	= sprintf('%sController', $controller);
			$version			= preg_replace('/[^\d]/', '', $params['version']);
			$action				= sprintf($this->mapping[$request->method()], $this->prefix, $version);

			/**
			 * Verifica que la version este implementada
			 */
			if ( ! in_array($params['version'], $this->versions) )
			{
				throw new CakeException(array(
					'code'			=> 91,
					'message'		=> 'Version API no disponible'
				));
			}

			/**
			 * Setea el controlador y accion a utilizar
			 */
			$request->params	= array_replace($request->params, array(
				'controller'	=> $params['endpoint'],
				'action'		=> $action
			));
			
			/**
			 * Verifica que exista el controlador
			 */
			App::uses($controllerClass, 'Controller');
			if ( class_exists($controllerClass) )
			{
				/**
				 * Si existe el método correspondiente en el método, lo despacha
				 */
				$metodos			= get_class_methods(sprintf('%sController', $controller));
				if ( in_array($action, $metodos) )
				{
					$instance		= (new ReflectionClass($controllerClass))->newInstance($request, $response);
					$instance->constructClasses();
					$instance->startupProcess();
					$response		= $instance->response;
					$render			= true;
					$result			= $instance->invokeAction($request);

					if ( $result instanceof CakeResponse )
					{
						$render			= false;
						$response		= $result;
					}

					if ( $render && $instance->autoRender )
					{
						$response			= $instance->render();
					}
					elseif ( ! ( $result instanceof CakeResponse ) && $response->body() === null )
					{
						$response->body($result);
					}
					$instance->shutdownProcess();
					return $response->body();
				}
			}
		}
	}

/**
 * Initializes the components and models a controller will be using.
 * Triggers the controller action, and invokes the rendering if Controller::$autoRender
 * is true and echo's the output. Otherwise the return value of the controller
 * action are returned.
 *
 * @param Controller $controller Controller to invoke
 * @param CakeRequest $request The request object to invoke the controller for.
 * @return CakeResponse the resulting response object
 */
	protected function _invoke(Controller $controller, CakeRequest $request) {
		$controller->constructClasses();
		$controller->startupProcess();

		$response = $controller->response;
		$render = true;
		$result = $controller->invokeAction($request);
		if ($result instanceof CakeResponse) {
			$render = false;
			$response = $result;
		}

		if ($render && $controller->autoRender) {
			$response = $controller->render();
		} elseif (!($result instanceof CakeResponse) && $response->body() === null) {
			$response->body($result);
		}
		$controller->shutdownProcess();

		return $response;
	}

/**
 * Get controller to use, either plugin controller or application controller
 *
 * @param CakeRequest $request Request object
 * @param CakeResponse $response Response for the controller.
 * @return mixed name of controller if not loaded, or object if loaded
 */
	protected function _getController($request, $response) {
		$ctrlClass = $this->_loadController($request);
		if (!$ctrlClass) {
			return false;
		}
		$reflection = new ReflectionClass($ctrlClass);
		if ($reflection->isAbstract() || $reflection->isInterface()) {
			return false;
		}
		return $reflection->newInstance($request, $response);
	}

/**
 * Load controller and return controller class name
 *
 * @param CakeRequest $request Request instance.
 * @return string|bool Name of controller class name
 */
	protected function _loadController($request) {
		$pluginName = $pluginPath = $controller = null;
		if (!empty($request->params['plugin'])) {
			$pluginName = $controller = Inflector::camelize($request->params['plugin']);
			$pluginPath = $pluginName . '.';
		}
		if (!empty($request->params['controller'])) {
			$controller = Inflector::camelize($request->params['controller']);
		}
		if ($pluginPath . $controller) {
			$class = $controller . 'Controller';
			App::uses('AppController', 'Controller');
			App::uses($pluginName . 'AppController', $pluginPath . 'Controller');
			App::uses($class, $pluginPath . 'Controller');
			if (class_exists($class)) {
				return $class;
			}
		}
		return false;
	}
}
