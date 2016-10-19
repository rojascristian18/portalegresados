<div class="login-container">
	<div class="login-box animated fadeInDown">
		<div class="login-body">	
			<div class="login-title"><strong>Para continuar</strong> responda su pregunta</div>

			<?= $this->Form->create('Empresa', array('action' => 'recuperarclave', 'class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<div class="form-group">
					<div class="col-md-12">
						<label class="btn-link"><?=h($pregunta);?></label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<?=$this->Form->input('empresa', array('type' => 'hidden', 'value' => $empresa['Empresa']['id']));?>
						<?=$this->Form->input('respuesta', array('placeholder' => 'Ingrese su respuesta'));?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<div class="pull-right">
							<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Continuar">
						</div>
						<div class="pull-left">
							<?= $this->Html->link('Cancelar', array('action' => 'login'), array('class' => 'btn btn-danger')); ?>
						</div>
					</div>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>