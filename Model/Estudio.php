<?php
App::uses('AppModel', 'Model');
class Estudio extends AppModel
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

	/**
	 * ASOCIACIONES
	 */
	public $belongsTo = array(
		'CategoriaEstudio' => array(
			'className'				=> 'CategoriaEstudio',
			'foreignKey'			=> 'categoria_estudio_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'CategoriaEstudio')
		),
		'ModalidadEstudio' => array(
			'className'				=> 'ModalidadEstudio',
			'foreignKey'			=> 'modalidad_estudio_id',
			'conditions'			=> '',
			'fields'				=> '',
			'order'					=> '',
			'counterCache'			=> true,
			//'counterScope'			=> array('Asociado.modelo' => 'ModalidadEstudio')
		)
	);
	public $hasMany = array(
		'Usuario' => array(
			'className'				=> 'Usuario',
			'foreignKey'			=> 'estudio_id',
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
		'Sed' => array(
			'className'				=> 'Sed',
			'joinTable'				=> 'estudios_sedes',
			'foreignKey'			=> 'estudio_id',
			'associationForeignKey'	=> 'sed_id',
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
}
