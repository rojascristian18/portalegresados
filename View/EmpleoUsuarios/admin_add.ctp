<div class="page-title">
	<h2><span class="fa fa-list"></span> Empleo Usuarios</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Empleo Usuario</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('EmpleoUsuario', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('anno_experiencia_id', 'Anno experiencia'); ?></th>
						<td><?= $this->Form->input('anno_experiencia_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('jornada_laboral_id', 'Jornada laboral'); ?></th>
						<td><?= $this->Form->input('jornada_laboral_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('rubro_empresa_id', 'Rubro empresa'); ?></th>
						<td><?= $this->Form->input('rubro_empresa_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('region_id', 'Region'); ?></th>
						<td><?= $this->Form->input('region_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('usuario_id', 'Usuario'); ?></th>
						<td><?= $this->Form->input('usuario_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
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
					<tr>
						<th><?= $this->Form->label('trabajando', 'Trabajando'); ?></th>
						<td><?= $this->Form->input('trabajando', array('class' => 'icheckbox')); ?></td>
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
