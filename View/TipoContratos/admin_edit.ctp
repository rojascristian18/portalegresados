<div class="page-title">
	<h2><span class="fa fa-list"></span> Tipo Contratos</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Tipo Contrato</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('TipoContrato', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('activo', 'Activo'); ?></th>
						<td><?= $this->Form->input('activo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('empleo_count', 'Empleo count'); ?></th>
						<td><?= $this->Form->input('empleo_count', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('emplao_activo_count', 'Emplao activo count'); ?></th>
						<td><?= $this->Form->input('emplao_activo_count', array('class' => 'form-control select')); ?></td>
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
