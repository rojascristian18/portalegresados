<div class="page-content-wrap">
	<div class="row">
		<div class="col-xs-12">
			<h2><span class="fa fa-building"></span> Mi Empresa</h2>
		</div>
	</div>
</div>
<?= $this->Form->create('Empresa', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
<?= $this->Form->input('id'); ?>
<div class="page-content-wrap">
	<div class="row">
		<div class="col-xs-12">
				<h3 class="titulo-panel">Información de mi empresa</h3>
		</div>
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('','Estado de su cuenta'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $estado = ( $this->request->data['Empresa']['activo'] ) ? '<i class="fa fa-check" aria-hidden="true"></i> Activa' : '<i class="fa fa-ban" aria-hidden="true"></i> Inactiva' ; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('nombre', 'Nombre'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('nombre'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('nombre_comercial', 'Nombre de fantasía'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('nombre_comercial'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('rut', 'Rut empresa'); ?>
						</div>
						<div class="col-sm-8 col-xs-12´form-group">
							<?= $this->Form->input('rut'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('fono', 'Fono'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('fono'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('descripcion', 'Descripcion general'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('descripcion'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('rubro_empresa_id', 'Rubro de la empresa'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('rubro_empresa_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('comuna_id', 'Comuna'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('comuna_id', array('class' => 'form-control select', 'data-live-search' => true)); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('empleado_id', 'Cantidad de empleados'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('empleado_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
				<? if( ! empty($this->request->data['Empresa']['imagen']) ) : ?>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('Logo actual'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Html->image($this->request->data['Empresa']['imagen']['xs_mini']); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('imagen', 'Cambiar logo'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('imagen', array('type' => 'file', 'class' => 'file', 'data-preview-file-type' => 'any')); ?>
						</div>
					</div>
				<? else : ?>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('imagen', 'Logo de la empresa'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('imagen', array('type' => 'file', 'class' => 'file', 'data-preview-file-type' => 'any')); ?>
						</div>
					</div>	
				<? endif; ?>

				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h3 class="titulo-panel">Datos de acceso</h3>
		</div>
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('email', 'Email'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('email'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('clave', 'Contraseña'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<div class="input-group">
								<a href="#" class="btn btn-default btn-link" data-toggle="modal" data-target="#modalactualizarclave"><span class="glyphicon glyphicon-refresh"></span></a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('pregunta_id', 'Pregunta de seguridad'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('pregunta_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('respuesta', 'Respuesta'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('respuesta'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal actualizar clave -->
	<?=$this->element('businesses/template/modal_actualizar_clave');?>

	<div class="row">
		<div class="col-xs-12">
			<h3 class="titulo-panel">Datos del responsable</h3>
		</div>
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('nombre_responsable', 'Nombre del responsable'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('nombre_responsable'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('apellido_responsable', 'Apellidos del responsable'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<div class="form-group">
								<?= $this->Form->input('apellido_responsable'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('cargo_responsable', 'Cargo del responsable'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('cargo_responsable'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default btn-warning">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Para actualizar su información ingrese su clave actual</label>
						</div>
						<div class="col-md-8 form-group">
							<?= $this->Form->input('clave', array('type' => 'password', 'autocomplete' => 'off', 'value' => '')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="pull-right">
				<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Actualizar">
				<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
			</div>
		</div>
	</div>
</div>
<?= $this->Form->end(); ?>