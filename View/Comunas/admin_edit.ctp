<div class="page-title">
	<h2><span class="fa fa-list"></span> Comunas</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Comuna</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Comuna', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('ciudad_id', 'Ciudad'); ?></th>
						<td><?= $this->Form->input('ciudad_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('comuna', 'Comuna'); ?></th>
						<td><?= $this->Form->input('comuna'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('empresa_count', 'Empresa count'); ?></th>
						<td><?= $this->Form->input('empresa_count', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('empleo_count', 'Empleo count'); ?></th>
						<td><?= $this->Form->input('empleo_count', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('empleo_activo_count', 'Empleo activo count'); ?></th>
						<td><?= $this->Form->input('empleo_activo_count', array('class' => 'form-control select')); ?></td>
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
