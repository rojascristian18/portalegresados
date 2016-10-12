<?php
App::uses('AppModel', 'Model');
class Administrador extends AppModel
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
		'repetir_clave' => array(
			'repetirClave' => array(
				'rule'			=> array('repetirClave'),
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
		'Pregunta' => array(
			'className'				=> 'Pregunta',
			'foreignKey'			=> 'pregunta_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'Pregunta')
		),
		'Perfil' => array(
			'className'				=> 'Perfil',
			'foreignKey'			=> 'perfil_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'Perfil')
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
		return true;
	}
}
