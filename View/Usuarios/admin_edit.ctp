<div class="page-title">
	<h2><span class="fa fa-list"></span> Usuarios</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Usuario</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Usuario', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('comuna_id', 'Comuna'); ?></th>
						<td><?= $this->Form->input('comuna_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('pregunta_id', 'Pregunta'); ?></th>
						<td><?= $this->Form->input('pregunta_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('situacion_laboral_id', 'Situacion laboral'); ?></th>
						<td><?= $this->Form->input('situacion_laboral_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('apellido', 'Apellido'); ?></th>
						<td><?= $this->Form->input('apellido'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('rut', 'Rut'); ?></th>
						<td><?= $this->Form->input('rut'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('email', 'Email'); ?></th>
						<td><?= $this->Form->input('email'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('clave', 'Clave'); ?></th>
						<td><?= $this->Form->input('clave', array('type' => 'password', 'autocomplete' => 'off', 'value' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('repetir_clave', 'Repetir clave'); ?></th>
						<td><?= $this->Form->input('repetir_clave', array('type' => 'password', 'autocomplete' => 'off', 'value' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('fono', 'Fono'); ?></th>
						<td><?= $this->Form->input('fono'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('celular', 'Celular'); ?></th>
						<td><?= $this->Form->input('celular'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('direccion', 'Direccion'); ?></th>
						<td><?= $this->Form->input('direccion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen', 'Imagen'); ?></th>
						<td><?= $this->Form->input('imagen', array('type' => 'file')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('respuesta', 'Respuesta'); ?></th>
						<td><?= $this->Form->input('respuesta'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('presentacion', 'Presentacion'); ?></th>
						<td><?= $this->Form->input('presentacion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('pretencion_renta', 'Pretencion renta'); ?></th>
						<td><?= $this->Form->input('pretencion_renta'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('cv', 'Cv'); ?></th>
						<td><?= $this->Form->input('cv'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('activo', 'Activo'); ?></th>
						<td><?= $this->Form->input('activo', array('class' => 'icheckbox')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('postulacion_count', 'Postulacion count'); ?></th>
						<td><?= $this->Form->input('postulacion_count', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('solicitud_count', 'Solicitud count'); ?></th>
						<td><?= $this->Form->input('solicitud_count', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('licencia_conducir', 'Licencia conducir'); ?></th>
						<td><?= $this->Form->input('licencia_conducir', array('class' => 'icheckbox')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre_licencia_conducir', 'Nombre licencia conducir'); ?></th>
						<td><?= $this->Form->input('nombre_licencia_conducir'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('last_login', 'Last login'); ?></th>
						<td><?= $this->Form->input('last_login'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('postulacon_count', 'Postulacon count'); ?></th>
						<td><?= $this->Form->input('postulacon_count'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('Categoria', 'Categoria'); ?></th>
						<td><?= $this->Form->input('Categoria'); ?></td>
					</tr>
				</table>

				<div class="pull-right">
					<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
					<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
