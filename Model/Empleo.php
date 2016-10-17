<?php
App::uses('AppModel', 'Model');
class Empleo extends AppModel
{
	/**
	 * CONFIGURACION DB
	 */
	public $displayField	= 'titulo';

	/**
	 * BEHAVIORS
	 */
	var $actsAs			= array(
		/**
		 * IMAGE UPLOAD
		 */
		/*
		'Image'		=> array(
			'fields'	=> array(
				'imagen'	=> array(
					'versions'	=> array(
						array(
							'prefix'	=> 'mini',
							'width'		=> 100,
							'height'	=> 100,
							'crop'		=> true
						)
					)
				)
			)
		)
		*/
	);

	/**
	 * VALIDACIONES
	 */
	public $validate = array(
		'titulo' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'nombre_corto' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'requisitos_minimos' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'descripcion' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'vacantes' => array(
			'numeric' => array(
				'rule'			=> array('numeric'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'fecha_finaliza' => array(
			'datetime' => array(
				'rule'			=> array('date'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'horafinaliza' => array(
			'datetime' => array(
				'rule'			=> array('time'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'activo' => array(
			'numeric' => array(
				'rule'			=> array('numeric'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
	);

	/**
	 * ASOCIACIONES
	 */
	public $belongsTo = array(
		'Empresa' => array(
			'className'				=> 'Empresa',
			'foreignKey'			=> 'empresa_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'Empresa')
		),
		'Comuna' => array(
			'className'				=> 'Comuna',
			'foreignKey'			=> 'comuna_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'Comuna')
		),
		'JornadaLaboral' => array(
			'className'				=> 'JornadaLaboral',
			'foreignKey'			=> 'jornada_laboral_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'Comuna')
		),
		'ContratoOfrecido' => array(
			'className'				=> 'ContratoOfrecido',
			'foreignKey'			=> 'contrato_ofrecido_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'Comuna')
		),
		'EstadoEmpleo' => array(
			'className'				=> 'EstadoEmpleo',
			'foreignKey'			=> 'estado_empleo_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'EstadoEmpleo')
		),
		'AnnoExperiencia' => array(
			'className'				=> 'AnnoExperiencia',
			'foreignKey'			=> 'anno_experiencia_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'EstadoEmpleo')
		)
	);
	public $hasMany = array(
		'Postulacion' => array(
			'className'				=> 'Postulacion',
			'foreignKey'			=> 'empleo_id',
			'dependent'				=> false,
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'limit'					=> '',
			'offset'				=> '',
			'exclusive'				=> '',
			'finderQuery'			=> '',
			'counterQuery'			=> ''
		)
	);
	public $hasAndBelongsToMany = array(
		'Categoria' => array(
			'className'				=> 'Categoria',
			'joinTable'				=> 'categorias_empleos',
			'foreignKey'			=> 'empleo_id',
			'associationForeignKey'	=> 'categoria_id',
			'unique'				=> true,
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'limit'					=> '',
			'offset'				=> '',
			'finderQuery'			=> '',
			'deleteQuery'			=> '',
			'insertQuery'			=> ''
		)
	);


	public function afterSave($created = true, $options = array())
	{
		parent::afterSave($created, $options);

		/**
		 * Dispara eventos al guardar empleo (envio correos)
		 */
		if ( $created && $this->data['Empleo']['estado_empleo_id'] == 1 && ! empty($this->data['Empleo']) )
		{	
			$empleo			= $this->find('first', array(
				'conditions'	=> array('Empleo.id' => $this->data[$this->alias]['id']),
				'contain'		=> array(
					'Empresa'			=> array(
						'conditions'	=> array(
							'Empresa.activo'		=> true
						)
					),
					'JornadaLaboral',
					'ContratoOfrecido',
					'Comuna' => array(
						'Ciudad' => array(
							'Region' => array('Paise')
						)
					),
					'EstadoEmpleo',
					'AnnoExperiencia'
				)
			));

			/*
			* Buscar administradores que se deben notificar las publicaciones de empleo
			*/
			$administradores = ClassRegistry::init('Administrador')->find('all', array(
					'conditions' => array(
						'Administrador.notificar_empleo' => 1
					)
				)
			);

			foreach ($administradores as $ix => $administrador) {
				$empleo['Administrador'][$ix] = $administrador['Administrador'];
			}

			$evento			= new CakeEvent('Model.Empleo.afterSave', $this, $empleo);
			$this->getEventManager()->dispatch($evento);
		}

		/**
		 * Dispara eventos al publicar empleo (envio correos)
		 */
		if ( $this->data['Empleo']['estado_empleo_id'] == 2 && ! empty($this->data['Empleo']) )
		{	
			$empleo			= $this->find('first', array(
				'conditions'	=> array('Empleo.id' => $this->data[$this->alias]['id']),
				'contain'		=> array(
					'Empresa'			=> array(
						'conditions'	=> array(
							'Empresa.activo'		=> true
						)
					),
					'JornadaLaboral',
					'ContratoOfrecido',
					'Comuna' => array(
						'Ciudad' => array(
							'Region' => array('Paise')
						)
					),
					'EstadoEmpleo',
					'AnnoExperiencia'
				)
			));

			/*
			* Buscar administradores que se deben notificar las publicaciones de empleo
			*/
			$administradores = ClassRegistry::init('Administrador')->find('all', array(
					'conditions' => array(
						'Administrador.notificar_empleo' => 1
					)
				)
			);

			foreach ($administradores as $ix => $administrador) {
				$empleo['Administrador'][$ix] = $administrador['Administrador'];
			}

			$evento			= new CakeEvent('Model.Empleo.afterSave', $this, $empleo);
			$this->getEventManager()->dispatch($evento);
		}


		/**
		 * Dispara eventos al despublicar empleo (envio correos)
		 */
		if ( $this->data['Empleo']['estado_empleo_id'] == 3 && ! empty($this->data['Empleo']) )
		{	
			$empleo			= $this->find('first', array(
				'conditions'	=> array('Empleo.id' => $this->data[$this->alias]['id']),
				'contain'		=> array(
					'Empresa'			=> array(
						'conditions'	=> array(
							'Empresa.activo'		=> true
						)
					),
					'JornadaLaboral',
					'ContratoOfrecido',
					'Comuna' => array(
						'Ciudad' => array(
							'Region' => array('Paise')
						)
					),
					'EstadoEmpleo',
					'AnnoExperiencia'
				)
			));

			/*
			* Buscar administradores que se deben notificar las publicaciones de empleo
			*/
			$administradores = ClassRegistry::init('Administrador')->find('all', array(
					'conditions' => array(
						'Administrador.notificar_empleo' => 1
					)
				)
			);

			foreach ($administradores as $ix => $administrador) {
				$empleo['Administrador'][$ix] = $administrador['Administrador'];
			}

			$evento			= new CakeEvent('Model.Empleo.afterSave', $this, $empleo);
			$this->getEventManager()->dispatch($evento);
		}

		/**
		 * Dispara eventos al empleo editado no publicado empleo (envio correos)
		 */
		if ( $this->data['Empleo']['estado_empleo_id'] == 4 && ! empty($this->data['Empleo']) )
		{	
			$empleo			= $this->find('first', array(
				'conditions'	=> array('Empleo.id' => $this->data[$this->alias]['id']),
				'contain'		=> array(
					'Empresa'			=> array(
						'conditions'	=> array(
							'Empresa.activo'		=> true
						)
					),
					'JornadaLaboral',
					'ContratoOfrecido',
					'Comuna' => array(
						'Ciudad' => array(
							'Region' => array('Paise')
						)
					),
					'EstadoEmpleo',
					'AnnoExperiencia'
				)
			));

			/*
			* Buscar administradores que se deben notificar las publicaciones de empleo
			*/
			$administradores = ClassRegistry::init('Administrador')->find('all', array(
					'conditions' => array(
						'Administrador.notificar_empleo' => 1
					)
				)
			);

			foreach ($administradores as $ix => $administrador) {
				$empleo['Administrador'][$ix] = $administrador['Administrador'];
			}

			$evento			= new CakeEvent('Model.Empleo.afterSave', $this, $empleo);
			$this->getEventManager()->dispatch($evento);
		}
	}
}
