<div class="page-title">
	<h2><span class="fa fa-list"></span> Estudios</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Estudio</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Estudio', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('categoria_estudio_id', 'Categoria estudio'); ?></th>
						<td><?= $this->Form->input('categoria_estudio_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('modalidad_estudio_id', 'Modalidad estudio'); ?></th>
						<td><?= $this->Form->input('modalidad_estudio_id'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre_corto', 'Nombre corto'); ?></th>
						<td><?= $this->Form->input('nombre_corto'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen', 'Imagen'); ?></th>
						<td><?= $this->Form->input('imagen', array('type' => 'file')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('duracion', 'Duracion'); ?></th>
						<td><?= $this->Form->input('duracion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('duracion_hora', 'Duracion hora'); ?></th>
						<td><?= $this->Form->input('duracion_hora'); ?></td>
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
						<th><?= $this->Form->label('descripcion', 'Descripcion'); ?></th>
						<td><?= $this->Form->input('descripcion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('objetivo', 'Objetivo'); ?></th>
						<td><?= $this->Form->input('objetivo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('requisitos', 'Requisitos'); ?></th>
						<td><?= $this->Form->input('requisitos'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('perfil_ocupacional', 'Perfil ocupacional'); ?></th>
						<td><?= $this->Form->input('perfil_ocupacional'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('perfil_egresado', 'Perfil egresado'); ?></th>
						<td><?= $this->Form->input('perfil_egresado'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('funciones_claves', 'Funciones claves'); ?></th>
						<td><?= $this->Form->input('funciones_claves'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('folleto', 'Folleto'); ?></th>
						<td><?= $this->Form->input('folleto'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('malla', 'Malla'); ?></th>
						<td><?= $this->Form->input('malla'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('activo', 'Activo'); ?></th>
						<td><?= $this->Form->input('activo', array('class' => 'icheckbox')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('Sed', 'Sed'); ?></th>
						<td><?= $this->Form->input('Sed'); ?></td>
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
