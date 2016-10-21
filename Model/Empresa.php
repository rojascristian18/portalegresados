<?php
App::uses('AppModel', 'Model');
class Empresa extends AppModel
{
	/**
	 * CONFIGURACION DB
	 */
	public $displayField	= 'nombre';

	/**
	 * BEHAVIORS
	 */
	var $actsAs			= array(
		/**
		 * IMAGE UPLOAD
		 */
		'Image'		=> array(
			'fields'	=> array(
				'imagen'	=> array(
					'versions'	=> array(
						array(
							'prefix'	=> 'mini',
							'width'		=> 100,
							'height'	=> 100,
							'crop'		=> true
						),
						array(
							'prefix'	=> 'xs_mini',
							'width'		=> 50,
							'height'	=> 50,
							'crop'		=> true
						)
					)
				)
			)
		)
	);

	/**
	 * VALIDACIONES
	 */
	public $validate = array(
		'rut' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'clave' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'fono' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'respuesta' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'email' => array(
			'email' => array(
				'rule'			=> array('email'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'nombre' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'nombre_comercial' => array(
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
		'nombre_responsable' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'apellido_responsable' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		),
		'cargo_responsable' => array(
			'notBlank' => array(
				'rule'			=> array('notBlank'),
				'last'			=> true,
				//'message'		=> 'Mensaje de validación personalizado',
				//'allowEmpty'	=> true,
				//'required'		=> false,
				//'on'			=> 'update', // Solo valida en operaciones de 'create' o 'update'
			),
		)
	);

	/**
	 * ASOCIACIONES
	 */
	public $belongsTo = array(
		'RubroEmpresa' => array(
			'className'				=> 'RubroEmpresa',
			'foreignKey'			=> 'rubro_empresa_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'RubroEmpresa')
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
		'Empleado' => array(
			'className'				=> 'Empleado',
			'foreignKey'			=> 'empleado_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'Empleados')
		),
		'Pregunta' => array(
			'className'				=> 'Pregunta',
			'foreignKey'			=> 'pregunta_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'Pregunta')
		)
	);
	public $hasMany = array(
		'Empleo' => array(
			'className'				=> 'Empleo',
			'foreignKey'			=> 'empresa_id',
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


	/**
	 * CALLBACKS
	 */
	public function beforeSave($options = array())
	{	
		if ( isset($this->data[$this->alias]['clave']) )
		{
			if ( trim($this->data[$this->alias]['clave']) == false )
			{
				unset($this->data[$this->alias]['clave'], $this->data[$this->alias]['repetir_clave']);
			}
			else
			{
				$this->data[$this->alias]['clave']	= AuthComponent::password($this->data[$this->alias]['clave']);
			}
		}

		if ( isset($this->data[$this->alias]['clave_nueva']) && ! empty($this->data[$this->alias]['clave_nueva']) )
		{	
			if ( isset($this->data[$this->alias]['repetir_clave_nueva']) && ! empty($this->data[$this->alias]['repetir_clave_nueva']) ) {
				if ( trim($this->data[$this->alias]['clave_nueva']) == false )
				{
					unset($this->data[$this->alias]['clave_nueva'], $this->data[$this->alias]['repetir_clave_nueva']);
				}
				else
				{
					$this->data[$this->alias]['clave']	= AuthComponent::password($this->data[$this->alias]['clave_nueva']);
					unset($this->data[$this->alias]['clave_nueva'], $this->data[$this->alias]['repetir_clave_nueva']);
				}	
			}
		}

		return true;
	}

	public function afterSave($created = true, $options = array()) {
		parent::afterSave($created, $options);

		if ( ! empty($this->data['Empresa']) && isset($this->data['Empresa']['enviar_email']) && $this->data['Empresa']['enviar_email'] == true) {

			$evento			= new CakeEvent('Model.Empresa.afterSave', $this, $this->data);
			$this->getEventManager()->dispatch($evento);
		}
	}
}
