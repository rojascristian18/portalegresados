<div class="page-title">
	<h2><span class="fa fa-list"></span> Empleos</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Empleo</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Empleo', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('empresa_id', 'Empresa'); ?></th>
						<td><?= $this->Form->input('empresa_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('jornada_id', 'Jornada'); ?></th>
						<td><?= $this->Form->input('jornada_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('tipo_contrato_id', 'Tipo contrato'); ?></th>
						<td><?= $this->Form->input('tipo_contrato_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('comuna_id', 'Comuna'); ?></th>
						<td><?= $this->Form->input('comuna_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('estado_empleo_id', 'Estado empleo'); ?></th>
						<td><?= $this->Form->input('estado_empleo_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('experiencia_id', 'Experiencia'); ?></th>
						<td><?= $this->Form->input('experiencia_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('titulo', 'Titulo'); ?></th>
						<td><?= $this->Form->input('titulo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre_corto', 'Nombre corto'); ?></th>
						<td><?= $this->Form->input('nombre_corto'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('requisitos_minimos', 'Requisitos minimos'); ?></th>
						<td><?= $this->Form->input('requisitos_minimos'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('descripcion', 'Descripcion'); ?></th>
						<td><?= $this->Form->input('descripcion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('sueldo', 'Sueldo'); ?></th>
						<td><?= $this->Form->input('sueldo', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('comentarios_sueldo', 'Comentarios sueldo'); ?></th>
						<td><?= $this->Form->input('comentarios_sueldo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('vacantes', 'Vacantes'); ?></th>
						<td><?= $this->Form->input('vacantes'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('fecha_finaliza', 'Fecha finaliza'); ?></th>
						<td><?= $this->Form->input('fecha_finaliza'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('cerrar_empleo', 'Cerrar empleo'); ?></th>
						<td><?= $this->Form->input('cerrar_empleo', array('class' => 'icheckbox')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('activo', 'Activo'); ?></th>
						<td><?= $this->Form->input('activo', array('class' => 'icheckbox')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('cerrada', 'Cerrada'); ?></th>
						<td><?= $this->Form->input('cerrada'); ?></td>
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
