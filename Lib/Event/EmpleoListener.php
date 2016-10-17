<?php
App::uses('CakeEventListener', 'Event');
App::uses('View', 'View');
App::uses('Validation', 'Utility');
class EmpleoListener implements CakeEventListener
{
	public $prefix		= null;

	public function implementedEvents()
	{ 	
		return array(
			'Model.Empleo.afterSave'		=> 'enviarEmailAdministrador',
		);
	}

	public function enviarEmailAdministrador(CakeEvent $evento, $notificarAdministrador = true)
	{
		
		/**
		 * Si la empresa no tiene correo
		 * o no existe administrador para notificar, se detiene.
		 */
		if ( ! $evento->data['Empresa']['email'] && empty($evento->data['Administrador']) )
		{
			return false;
		}

		/**
		* Condiciones que indica que email enviar
		* -Empleo creado pendiente
		* -Empleo publicado
		* -Empleo despublicado 
		*/

		// Empleo creado pendiente
		if (  $evento->data['Empleo']['estado_empleo_id'] == 1  ) {

			$evento->data['titulo'] = 'Su oferta de empleo ha sido recibida con éxito';
			$evento->data['cuerpo'] = sprintf('Se le notificará por este medio cuando su empleo %s se encuentre publicado en el portal.', $evento->data['Empleo']['titulo']);
			$evento->data['asunto'] = 'Oferta de empleo recibida - Portal Egresados Manpower';

			$evento->data['asunto_admin'] = sprintf('Nuevo empleo agregado: %s - %s', $evento->data['Empleo']['titulo'], $evento->data['Empresa']['nombre']);
			$evento->data['titulo_admin'] = 'Nueva oferta de empleo recibida';
			$evento->data['cuerpo_admin'] = sprintf('Un nuevo empleo publicado por %s necesita de su aprobación.', $evento->data['Empresa']['nombre']);

		}

		// Empleo publicado
		if (  $evento->data['Empleo']['estado_empleo_id'] == 2  ) {
			// No notificar a administrador, sólo a la empresa
			$notificarAdministrador = false;

			$evento->data['titulo'] = '¡Felicidades! Su oferta de empleo ha sido publicada en nuestro portal';
			$evento->data['cuerpo'] = sprintf('Su oferta de empleo %s ya se encuentra publicado en el portal.', $evento->data['Empleo']['titulo']);
			$evento->data['asunto'] = '¡Felicidades! su oferta fue publicada - Portal Egresados Manpower';

		}

		// Empleo despublicado o quitado
		if (  $evento->data['Empleo']['estado_empleo_id'] == 3  ) {
			// No notificar a administrador, sólo a la empresa
			$notificarAdministrador = false;

			$evento->data['titulo'] = 'Su oferta de empleo ha sido quitada de nuestro portal';
			$evento->data['cuerpo'] = sprintf('Su oferta de empleo %s se ha quitado del portal.', $evento->data['Empleo']['titulo']);
			$evento->data['asunto'] = 'Su oferta de empleo fue quitada - Portal Egresados Manpower';
				
		}


		// Empleo editado pendiente
		if (  $evento->data['Empleo']['estado_empleo_id'] == 4  ) {

			$evento->data['titulo'] = 'Su oferta de empleo ha sido recibida con éxito';
			$evento->data['cuerpo'] = sprintf('Su oferta de empleo será revisada y se le notificará por este medio cuando su empleo  %s se encuentre publicado en el portal.', $evento->data['Empleo']['titulo']);
			$evento->data['asunto'] = 'Oferta de empleo recibida - Portal Egresados Manpower';

			$evento->data['asunto_admin'] = sprintf('Un empleo ha sido editado: %s - %s', $evento->data['Empleo']['titulo'], $evento->data['Empresa']['nombre']);
			$evento->data['titulo_admin'] = 'Oferta de empleo editada recibida';
			$evento->data['cuerpo_admin'] = sprintf('La empresa %s ha editado su oferta de empleo con la siguiente información:', $evento->data['Empresa']['nombre']);

		}
		
		/**
		 * Clases requeridas
		 */
		$alerta						= $evento->data;
		$this->View					= new View();
		$this->View->viewPath		= 'Emails' . DS . 'html';
		$this->View->layoutPath		= 'Emails' . DS . 'html';
		$this->View->set(compact('alerta'));
		$this->Email				= ClassRegistry::init('Email');

		/**
		 * Correos administradores con notificaciones de empleos activadas
		 */
		if ( ! empty($evento->data['Administrador']) && $notificarAdministrador )
		{
			$html						= $this->View->render('alerta_empleo_administrador');
			$contactos					= Hash::extract($alerta, 'Administrador.{n}.email');
			$contactoNombres			= Hash::extract($alerta, 'Administrador.{n}.nombre');
			$contacto					= array_shift($contactos);
			$contactoNombre				= array_shift($contactoNombres);

			/**
			 * Guarda el email a enviar
			 */
			$this->Email->create();
			$this->Email->save(array(
				'estado'					=> 'Empleo',
				'html'						=> $html,
				'asunto'					=> $alerta['asunto_admin'],
				'destinatario_email'		=> $contacto,
				'destinatario_nombre'		=> sprintf('Contactos %s', $contactoNombre),
				'remitente_email'			=> 'leads@brandon.cl',
				'remitente_nombre'			=> sprintf('Sistema portal egresados - %s', $alerta['Empresa']['nombre']),
				'cc_email'					=> implode(',', $contactos),
				'bcc_email'					=> 'leads@brandon.cl',
				'traza'						=> null,
				'proceso_origen'			=> null,
				'procesado'					=> 0,
				'enviado'					=> 0,
				'reintentos'				=> 0,
				'atachado'					=> null
			));
		}

		/**
		 * Correo de respuesta a empresa
		 */
		$emailEmpresa				= $alerta['Empresa']['email'];
		$emailNombre				= $alerta['Empresa']['nombre'];
;
		if ( ! empty($emailEmpresa) && Validation::email($emailEmpresa) )
		{

			$this->View->hasRendered	= false;
			$html						= $this->View->render('alerta_empleo_empresa');
			
			/**
			 * Guarda el email a enviar
			 */
			$this->Email->create();
			$this->Email->save(array(
				'estado'					=> 'Empleo',
				'html'						=> $html,
				'asunto'					=> $alerta['asunto'],
				'destinatario_email'		=> $emailEmpresa,
				'destinatario_nombre'		=> $emailNombre,
				'remitente_email'			=> 'apps@brandon.cl',
				'remitente_nombre'			=> 'Manpower Portal Egresados',
				'cc_email'					=> null,
				'bcc_email'					=> null,
				'traza'						=> null,
				'procesado_origen'			=> null,
				'procesado'					=> 0,
				'enviado'					=> 0,
				'reintentos'				=> 0,
				'atachado'					=> null,
			));
		}

		/**
		 * Ejecuta la consola automaticamente en ambientes de desarrollo
		 */
		if ( ! Configure::read('Ambiente.produccion') )
		{
			App::uses('AppShell', 'Console/Command');
			App::uses('EnviarEmailsShell', 'Console/Command');
			$this->EnviarEmails = new EnviarEmailsShell();
			$this->EnviarEmails->main();
		}
	}
}
