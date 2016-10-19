<!-- Modal actualizar clave -->
<div class="modal fade" id="modalactualizarclave" tabindex="-1" role="dialog" aria-labelledby="modalactualizarclave">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalactualizarclave">Actualizar contraseña</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label>Nueva contraseña</label>
							<?=$this->Form->input('clave_nueva', array('type' => 'password', 'data-pass' => 'nueva'));?>
						</div>
						<div class="form-group">
							<label>Repetir nueva contraseña</label>
							<?=$this->Form->input('repetir_clave_nueva', array('type' => 'password', 'data-pass' => 'repetir_nueva'));?>
						</div>
						<div class="form-group">
							<div class="pull-right">
								<button type="button" id="comprarClaves" class="btn btn-primary">Verificar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>