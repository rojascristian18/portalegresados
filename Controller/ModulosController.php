<?php
App::uses('AppController', 'Controller');
class ModulosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$modulos	= $this->paginate();
		$this->set(compact('modulos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Modulo->create();
			if ( $this->Modulo->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}

		$optionsUrl = array(); 

	 	$controladores		=  array_map(function($controlador) {

			return str_replace('Controller', '', $controlador);

		}, App::objects('controller'));

	    foreach ( $controladores as $controlador ) : 
	   		if ( $controlador === 'App' ) continue; 

			$optionsUrl[strtolower($controlador)] = $controlador; 

	    endforeach;

		$parentModulos	= $this->Modulo->ParentModulo->find('list', array('conditions' => array('parent_id' => null)));

		$perfiles	= $this->Modulo->Perfil->find('list');

		$this->set(compact('parentModulos', 'perfiles', 'optionsUrl'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Modulo->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Modulo->save($this->request->data) )
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
			$this->request->data	= $this->Modulo->find('first', array(
				'conditions'	=> array('Modulo.id' => $id),
				'contain'		=> array('Perfil')
			));
		}

		$optionsUrl = array(); 

	 	$controladores		=  array_map(function($controlador) {

			return str_replace('Controller', '', $controlador);

		}, App::objects('controller'));

	    foreach ( $controladores as $controlador ) : 
	   		if ( $controlador === 'App' ) continue; 

			$optionsUrl[strtolower($controlador)] = $controlador; 

	    endforeach;

		$parentModulos	= $this->Modulo->ParentModulo->find('list', array('conditions' => array('parent_id' => null)));
		$perfiles	= $this->Modulo->Perfil->find('list');
		$this->set(compact('parentModulos', 'perfiles', 'optionsUrl'));
	}

	public function admin_delete($id = null)
	{
		$this->Modulo->id = $id;
		if ( ! $this->Modulo->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Modulo->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Modulo->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Modulo->_schema);
		$modelo			= $this->Modulo->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}

	// Obtener los métodos de cada controlador
	public function getControllerList() {
        $controllerClasses = App::objects('controller');
        foreach ($controllerClasses as $controller) {
            if ($controller != 'AppController') {
                // Load the controller
                App::import('Controller', str_replace('Controller', '', $controller));
                // Load its methods / actions
                $actionMethods = get_class_methods($controller);
                foreach ($actionMethods as $key => $method) {

                    if ($method{0} == '_') {
                        unset($actionMethods[$key]);
                    }
                }
                // Load the ApplicationController (if there is one)
                App::import('Controller', 'AppController');
                $parentMethods = get_class_methods(get_parent_class($controller));
                $controllers[$controller] = array_diff($actionMethods, $parentMethods);
                
                
            }
        }

        $actions = array();
        foreach ($controllers as $indcie => $action) {
        	$actions = str_replace('admin_', '', $action);
        }
        prx($controllers);
        return $controllers;
    }
}
