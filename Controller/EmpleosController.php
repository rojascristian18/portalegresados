<?php
App::uses('AppController', 'Controller');
class EmpleosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$empleos	= $this->paginate();

		// Camino de migas
		BreadcrumbComponent::add('Ofertas de Empleo ');

		$this->set(compact('empleos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Empleo->create();
			if ( $this->Empleo->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$empresas	= $this->Empleo->Empresa->find('list');
		$comunas	= $this->Empleo->Comuna->find('list');
		$estadoEmpleos	= $this->Empleo->EstadoEmpleo->find('list');
		$categorias	= $this->Empleo->Categoria->find('list');
		$this->set(compact('empresas', 'comunas', 'estadoEmpleos', 'categorias'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Empleo->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Empleo->save($this->request->data) )
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
			$this->request->data	= $this->Empleo->find('first', array(
				'conditions'	=> array('Empleo.id' => $id)
			));
		}
		$empresas	= $this->Empleo->Empresa->find('list');
		$comunas	= $this->Empleo->Comuna->find('list');
		$estadoEmpleos	= $this->Empleo->EstadoEmpleo->find('list');
		$categorias	= $this->Empleo->Categoria->find('list');
		$this->set(compact('empresas', 'comunas', 'estadoEmpleos', 'categorias'));
	}

	public function admin_delete($id = null)
	{
		$this->Empleo->id = $id;
		if ( ! $this->Empleo->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Empleo->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Empleo->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Empleo->_schema);
		$modelo			= $this->Empleo->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}


	/**
	* Función que permite publicar un empleo y notificar a la empresa
	* que su empleo ya se encuentra disponible en el portal.
	* @param 	$id 	Bigint		Identificador del registro
	* @return 	void
	*/
	public function admin_publish($id =  null) {
		
		if ( $this->Empleo->exists($id) ) {
			$empleo = array('id' => $id, 'estado_empleo_id' => 2);
			if ( $this->Empleo->save($empleo) ) {
				$this->Session->setFlash('Empleo publicado con éxito.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('Ocurrió un error al publicar este empleo. Intentelo nuevamente', null, array(), 'danger');
				$this->redirect(array('action' => 'index'));
			}
		}else {
			$this->Session->setFlash('No se encuentra esta oferta de empleo.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

	}



	/**
	* Función que permite despublicar un empleo y notificar a la empresa
	* que su empleo ya se encuentra disponible en el portal.
	* @param 	$id 	Bigint		Identificador del registro
	* @return 	void
	*/
	public function admin_unpublish($id =  null) {
		
		if ( $this->Empleo->exists($id) ) {
			$empleo = array('id' => $id, 'estado_empleo_id' => 3);
			if ( $this->Empleo->save($empleo) ) {
				$this->Session->setFlash('Empleo despublicado con éxito.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('Ocurrió un error al publicar este empleo. Intentelo nuevamente', null, array(), 'danger');
				$this->redirect(array('action' => 'index'));
			}
		}else {
			$this->Session->setFlash('No se encuentra esta oferta de empleo.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

	}



	/************************************************************************************************************
	* Métodos para empresas
	*/
	public function job_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);

		BreadcrumbComponent::add('Mis ofertas ');

		$empleos	= $this->paginate();
		$this->set(compact('empleos'));
	}

	public function job_add()
	{
		if ( $this->request->is('post') )
		{	
			// Shortname
			$this->request->data['Empleo']['nombre_corto'] 	= strtolower(Inflector::slug($this->request->data['Empleo']['titulo']));
			
			// Forzar estado del empleo en "Pendiente"
			$this->request->data['Empleo']['estado_empleo_id'] = 1;

			// Forzar id empresa
			$this->request->data['Empleo']['empresa_id'] = $this->Auth->user('id');
			

			// Categorias
			$this->request->data['Categoria'] = $this->request->data['Categoria']['Categoria'];


			$this->Empleo->create();
			if ( $this->Empleo->saveAll($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}

		// Camino de migas
		BreadcrumbComponent::add('Mis ofertas ', array('action' => 'index'));
		BreadcrumbComponent::add('Crear oferta ');
		
		$empresas			= $this->Empleo->Empresa->find('list', array('conditions' => array('Empresa.activo' => 1)));
		$comunas			= $this->Empleo->Comuna->find('list');
		$estadoEmpleos		= $this->Empleo->EstadoEmpleo->find('list', array('conditions' => array('EstadoEmpleo.activo' => 1)));
		$jornadaLaborales	= $this->Empleo->JornadaLaboral->find('list', array('conditions' => array('JornadaLaboral.activo' => 1)));
		$contratoOfrecidos  = $this->Empleo->ContratoOfrecido->find('list', array('conditions' => array('ContratoOfrecido.activo' => 1)));
		$annoExperiencias  	= $this->Empleo->AnnoExperiencia->find('list', array('conditions' => array('AnnoExperiencia.activo' => 1)));
		$categoriasPadres   = $this->Empleo->Categoria->find('all', array(
				'conditions' => array(
					'Categoria.activo' => 1,
					'Categoria.parent_id' => null
				),
				'fields' => array('Categoria.id', 'Categoria.nombre')
			)
		);

		foreach ($categoriasPadres as $indice => $categoriaPadre) {
			$categoriasPadres[$indice]['Categoria']['CategoriaHijas'] = $this->Empleo->Categoria->find('list', array('conditions' => array('Categoria.parent_id' => $categoriaPadre['Categoria']['id'])));
		}

		

		$this->set(compact('empresas', 'comunas', 'estadoEmpleos', 'jornadaLaborales', 'contratoOfrecidos', 'annoExperiencias', 'categoriasPadres'));
	}

	public function job_edit($id = null)
	{
		if ( ! $this->Empleo->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{	
			// Shortname
			$this->request->data['Empleo']['nombre_corto'] 	= strtolower(Inflector::slug($this->request->data['Empleo']['titulo']));


			// Eliminar relaciones y volver a insertar
			$this->Empleo->Categoria->CategoriasEmpleo->deleteAll(
				array(
					'CategoriasEmpleo.empleo_id' => $id,
				)
           	);

           	// Forzar estado del empleo en "Editado en revisión"
			$this->request->data['Empleo']['estado_empleo_id'] = 4;

			// Forzar id empresa
			$this->request->data['Empleo']['empresa_id'] = $this->Auth->user('id');

			// Actualizar contador de ediciones
			$valorEditadoActual = $this->request->data['Empleo']['editado_count'];
			$this->request->data['Empleo']['editado_count'] = ($valorEditadoActual - 1);

			if ( $this->Empleo->saveAll($this->request->data) )
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
			$this->request->data	= $this->Empleo->find('first', array(
				'conditions'	=> array('Empleo.id' => $id),
				'contain'		=> array('Categoria')
			));

		}

		// Camino de migas
		BreadcrumbComponent::add('Mis ofertas ', array('action' => 'index'));
		BreadcrumbComponent::add('Editar oferta ');
		
		$empresas			= $this->Empleo->Empresa->find('list', array('conditions' => array('Empresa.activo' => 1)));
		$comunas			= $this->Empleo->Comuna->find('list');
		$estadoEmpleos		= $this->Empleo->EstadoEmpleo->find('list', array('conditions' => array('EstadoEmpleo.activo' => 1)));
		$jornadaLaborales	= $this->Empleo->JornadaLaboral->find('list', array('conditions' => array('JornadaLaboral.activo' => 1)));
		$contratoOfrecidos  = $this->Empleo->ContratoOfrecido->find('list', array('conditions' => array('ContratoOfrecido.activo' => 1)));
		$annoExperiencias  	= $this->Empleo->AnnoExperiencia->find('list', array('conditions' => array('AnnoExperiencia.activo' => 1)));
		$categoriasPadres   = $this->Empleo->Categoria->find('all', array(
				'conditions' => array(
					'Categoria.activo' => 1,
					'Categoria.parent_id' => null
				),
				'fields' => array('Categoria.id', 'Categoria.nombre')
			)
		);

		foreach ($categoriasPadres as $indice => $categoriaPadre) {
			$categoriasPadres[$indice]['Categoria']['CategoriaHijas'] = $this->Empleo->Categoria->find('list', array('conditions' => array('Categoria.parent_id' => $categoriaPadre['Categoria']['id'])));
		}

		$this->set(compact('empresas', 'comunas', 'estadoEmpleos', 'jornadaLaborales', 'contratoOfrecidos', 'annoExperiencias', 'categoriasPadres'));
	}

	public function job_delete($id = null)
	{
		$this->Empleo->id = $id;
		if ( ! $this->Empleo->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Empleo->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function job_exportar()
	{
		$datos			= $this->Empleo->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Empleo->_schema);
		$modelo			= $this->Empleo->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
