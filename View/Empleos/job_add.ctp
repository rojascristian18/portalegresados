<?=$this->element('template/breadcrumbs');?>
<div class="page-title">
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
			<?= $this->Form->input('descripcion', array('class' => 'form-control textarea-grande summernote' , 'placeholder' => 'Descripción de la oferta')); ?>	
		</div>
	</div>

	<script>
	if($(".summernote").length > 0){
                $(".summernote").summernote({height: 250,
                     codemirror: {
                        mode: 'text/html',
                        htmlMode: true,
                        lineNumbers: true,
                        theme: 'default'
                      }
                });
            }
            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                enterMode: "keep",
                tabMode: "shift"                                                
            });
            editor.setSize('100%','420px');
        </script>  
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<?= $this->Form->label('jornada_laboral_id', 'Jornada Laboral'); ?>
						</div>
						<div class="col-sm-8 col-xs-12">
							<?= $this->Form->input('jornada_laboral_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<?= $this->Form->label('contrato_ofrecido_id', 'Tipo contrato'); ?>
						</div>
						<div class="col-sm-8 col-xs-12">
							<?= $this->Form->input('contrato_ofrecido_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<?= $this->Form->label('comuna_id', 'Ubicación del trabajo'); ?>
						</div>
						<div class="col-sm-8 col-xs-12">
							<?= $this->Form->input('comuna_id', array('class' => 'form-control select', 'data-live-search' => true)); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<?= $this->Form->label('anno_experiencia_id', 'Experiencia mínima'); ?>
						</div>
						<div class="col-sm-8 col-xs-12">
							<?= $this->Form->input('anno_experiencia_id', array('class' => 'form-control select')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12">
						</div>
						<div class="col-sm-8 col-xs-12">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12">
						</div>
						<div class="col-sm-8 col-xs-12">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-xs-12">
						</div>
						<div class="col-sm-8 col-xs-12">
						</div>
					</div>
						<table class="table">
	
							<tr>
								<th></th>
								<td></td>
							</tr>
							<tr>
								<th></th>
								<td></td>
							</tr>
							<tr>
								<th></th>
								<td></td>
							</tr>
							<tr>
								<th><?= $this->Form->label('titulo', 'Titulo'); ?></th>
								<td><?= $this->Form->input('titulo'); ?></td>
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
								<td>
									<div class="row">
										<div class="col-xs-6">
										<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
											<?=$this->Form->input(
												'fecha_finaliza', array(
													'type' => 'text',
													'class' => 'form-control datepicker',
													'placeholder' => 'Seleccione fecha inicial',
													'data-clear' => 'true'
												)
											); ?>
										</div>
										<div class="col-xs-6">
											<span class="input-group-addon add-on"><span class="glyphicon glyphicon-time"></span></span>
											<?=$this->Form->input(
												'hora_finaliza', array(
													'type' => 'text',
													'class' => 'form-control timepicker24',
													'placeholder' => 'Seleccione fecha inicial',
													'data-clear' => 'true'
												)
											); ?>
										</div>
									</div>                                                    
								</td>
							</tr>
							<tr>
								<th><?= $this->Form->label('Categoria', 'Categoria'); ?></th>
								<td><?= $this->Form->input('Categoria'); ?></td>
							</tr>
						</table>						
					</div>
				</div>
				<div class="panel-footer">
					<div class="pull-right">
						<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
						<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo Empleo</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th><?= $this->Form->label('Categoria', 'Categoria'); ?></th>
								<td><?= $this->Form->input('Categoria', array('class' => 'form-control select', 'data-live-search' => true, 'multiple')); ?></td>
							</tr>
						</table>						
					</div>
				</div>
				<div class="panel-footer">
					<div class="pull-right">
						<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
						<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->Form->end(); ?>