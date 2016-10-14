<div class="page-title">
	<h2><span class="fa fa-list"></span> Estudio Usuarios</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Estudio Usuario</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('EstudioUsuario', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('sede_id', 'Sede'); ?></th>
						<td><?= $this->Form->input('sede_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('carrera_id', 'Carrera'); ?></th>
						<td><?= $this->Form->input('carrera_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('usuario_id', 'Usuario'); ?></th>
						<td><?= $this->Form->input('usuario_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('jornada_estudio_id', 'Jornada estudio'); ?></th>
						<td><?= $this->Form->input('jornada_estudio_id'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('otra_insitucion', 'Otra insitucion'); ?></th>
						<td><?= $this->Form->input('otra_insitucion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('casa_estudio', 'Casa estudio'); ?></th>
						<td><?= $this->Form->input('casa_estudio'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('carrera', 'Carrera'); ?></th>
						<td><?= $this->Form->input('carrera'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('carrera_completa', 'Carrera completa'); ?></th>
						<td><?= $this->Form->input('carrera_completa', array('class' => 'icheckbox')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('descripcion', 'Descripcion'); ?></th>
						<td><?= $this->Form->input('descripcion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('fecha_inicio', 'Fecha inicio'); ?></th>
						<td><?= $this->Form->input('fecha_inicio'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('fecha_termino', 'Fecha termino'); ?></th>
						<td><?= $this->Form->input('fecha_termino'); ?></td>
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
