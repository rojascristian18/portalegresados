<div class="login-box animated fadeInDown">
	<div class="login-logo"></div>
	<?= $this->element('admin_alertas'); ?>
	<div class="login-body">
		<div class="login-title text-center"><strong>Bienvenido</strong></div>
		<div class="login-title text-center">Para iniciar sesión debes identificarte.</div>
		<?= $this->Form->create('Empresa', array('class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
			<div class="form-group">
				<div class="col-md-12">
					<?= $this->Form->input('email', array('placeholder' => 'Email')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<?= $this->Form->input('clave', array('type' => 'password', 'placeholder' => 'Contraseña')); ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-6 pull-right">
					<button type="submit" class="btn btn-info btn-block">Entrar</button>
				</div>
				<div class="col-md-6 pull-left">
					<a href="#" class="btn btn-link btn-block" data-toggle="modal" data-target="#modalRecuperarPassword">Recuperar contraseña</a>
				</div>
			</div>
			<div class="login-subtitle">
                ¿Aún no tienes una cuenta? <a href="#" class="" data-toggle="modal" data-target="#modalRegistroEmpresa">Registrarme</a>
            </div>
		<?= $this->Form->end(); ?>
	</div>
	<div class="login-footer">
		<div class="pull-left">
			&copy; 2016 CFT Manpower
		</div>
		<div class="pull-right">
			
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRegistroEmpresa" tabindex="-1" role="dialog" aria-labelledby="modalRegistroEmpresalabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalRegistroEmpresalabel">Modal title</h4>
			</div>
			<div class="modal-body">
				<?=$this->element('template/businesses/formulario_registro');?>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRecuperarPassword" tabindex="-1" role="dialog" aria-labelledby="modalRecuperarPasswordlabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalRecuperarPasswordlabel">Recuperar contraseña</h4>
			</div>
			<div class="modal-body">
				<?=$this->element('template/businesses/formulario_recuperar_password');?>
			</div>
		</div>
	</div>
</div>