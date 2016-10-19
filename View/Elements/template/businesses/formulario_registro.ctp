<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Empresa</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Empresa', array('action' => 'registro', 'class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('rubro_empresa_id', 'Rubro empresa'); ?></th>
						<td><?= $this->Form->input('rubro_empresa_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('comuna_id', 'Comuna'); ?></th>
						<td><?= $this->Form->input('comuna_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('empleados_id', 'Empleados'); ?></th>
						<td><?= $this->Form->input('empleados_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('pregunta_id', 'Pregunta'); ?></th>
						<td><?= $this->Form->input('pregunta_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('rut', 'Rut'); ?></th>
						<td><?= $this->Form->input('rut'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('clave', 'Clave'); ?></th>
						<td><?= $this->Form->input('clave', array('type' => 'password', 'autocomplete' => 'off', 'value' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('fono', 'Fono'); ?></th>
						<td><?= $this->Form->input('fono'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('respuesta', 'Respuesta'); ?></th>
						<td><?= $this->Form->input('respuesta'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('email', 'Email'); ?></th>
						<td><?= $this->Form->input('email'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre_comercial', 'Nombre comercial'); ?></th>
						<td><?= $this->Form->input('nombre_comercial'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('descripcion', 'Descripcion'); ?></th>
						<td><?= $this->Form->input('descripcion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen', 'Imagen'); ?></th>
						<td><?= $this->Form->input('imagen', array('type' => 'file')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre_responsable', 'Nombre responsable'); ?></th>
						<td><?= $this->Form->input('nombre_responsable'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('apellido_responsable', 'Apellido responsable'); ?></th>
						<td><?= $this->Form->input('apellido_responsable'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('cargo_responsable', 'Cargo responsable'); ?></th>
						<td><?= $this->Form->input('cargo_responsable'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('activo', 'Activo'); ?></th>
						<td><?= $this->Form->input('activo', array('class' => 'icheckbox')); ?></td>
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