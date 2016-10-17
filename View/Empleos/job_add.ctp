<?=$this->element('template/breadcrumbs');?>
<div class="page-content-wrap">
	<div class="row">
		<div class="xol-xs-12">
			<h2><span class="fa fa-briefcase"></span> Crear Ofertas de Empleo</h2>
		</div>
	</div>
</div>
<?= $this->Form->create('Empleo', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
<div class="page-content-wrap">
	<div class="row">
		<div class="col-xs-12">
			<?= $this->Form->input('titulo', array('class' => 'form-control input-grande', 'placeholder' => 'Título de la oferta')); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h3 class="titulo-panel">Descripción</h3>
			<?= $this->Form->input('descripcion', array('class' => 'form-control textarea-grande summernote' , 'placeholder' => 'Descripción de la oferta')); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h3 class="titulo-panel">Detalles del empleo</h3>
		</div>
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('jornada_laboral_id', 'Jornada Laboral'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('jornada_laboral_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('contrato_ofrecido_id', 'Tipo contrato'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('contrato_ofrecido_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('vacantes', 'Vacantes'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('vacantes', array('class' => 'spinner_default form-control', 'type' => 'text', 'value' => '1')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('sueldo', 'Sueldo ofrecido (CPL)'); ?>
						</div>
						<div class="col-sm-6 col-xs-10 form-group">
							<?= $this->Form->input('sueldo'); ?>
						</div>
						<div class="col-sm-2 col-xs-2 form-group">
							<small>* Opcional</small>
						</div>
					</div>
					<div class="row hide">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('comentarios_sueldo', 'Comentarios sueldo'); ?>
						</div>
						<div class="col-sm-6 col-xs-10 form-group">
							<?= $this->Form->input('comentarios_sueldo', array('class' => 'form-control',)); ?>
						</div>
						<div class="col-sm-2 col-xs-2 form-group">
							<small>* Opcional</small>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('fecha_finaliza', 'Fecha y hora de cierre'); ?>
						</div>
						<div class="col-sm-4 col-xs-12 form-group">
							<div class="input-group">
								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
									<?=$this->Form->input(
										'fecha_finaliza', array(
											'type' => 'text',
											'class' => 'form-control datepicker',
											'placeholder' => 'Seleccione fecha final',
											'data-clear' => 'true'
										)
									); ?>
							</div>
						</div>
						<div class="col-sm-4 col-xs-12 form-group">
							<div class="input-group">
								<span class="input-group-addon add-on"><span class="glyphicon glyphicon-time"></span></span>
								<?=$this->Form->input(
									'hora_finaliza', array(
										'type' => 'text',
										'class' => 'form-control timepicker24',
										'placeholder' => 'Seleccione fecha final',
										'data-clear' => 'true'
									)
								); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<h3  class="titulo-panel">Requisitos mínimos</h3>
		</div>
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('anno_experiencia_id', 'Experiencia mínima'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('anno_experiencia_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('requisitos_minimos', 'Requisitos mínimos'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('requisitos_minimos', array('class' => 'summernote')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-xs-12">
			<h3  class="titulo-panel">Ubicación del empleo</h3>
		</div>
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-xs-12 form-group">
							<?= $this->Form->label('comuna_id', 'Ubicación del trabajo'); ?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?= $this->Form->input('comuna_id', array('class' => 'form-control select', 'data-live-search' => true)); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<h3 class="titulo-panel">Categorías</h3>
		</div>
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
				<? foreach($categoriasPadres as $categoriaPadre) : ?>
					<div class="row underline">
						<div class="col-sm-4 col-xs-12 form-group">
							<?=$categoriaPadre['Categoria']['nombre'];?>
						</div>
						<div class="col-sm-8 col-xs-12 form-group">
							<?=$this->Form->select('Categoria', $categoriaPadre['Categoria']['CategoriaHijas'], array(
							'class' => 'form-control select', 
							'data-live-search' => true, 
							'empty' => sprintf('Seleccione %s', $categoriaPadre['Categoria']['nombre']), 
							'multiple' => 'multiple'));?>
						</div>
					</div>
				<? endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="pull-right">
				<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
				<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
			</div>
		</div>
	</div>
</div>
<?= $this->Form->end(); ?>