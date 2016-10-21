<?= $this->Form->create('Empresa', array('action' => 'recuperarclave', 'type' => 'get', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
	<div class="row">
		<div class="col-sm-4">
			<label>Ingrese su email </label>
		</div>
		<div class="col-sm-8">
			<?=$this->Form->input('email', array('class' => 'form-control'));?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="pull-right">
				<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Continuar">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
<?= $this->Form->end(); ?>