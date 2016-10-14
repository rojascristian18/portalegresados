<?=$this->element('template/breadcrumbs');?>
<div class="page-title">
	<div class="row">
		<div class="xol-xs-12">
			<h2><span class="fa fa-briefcase"></span> Ofertas de Empleos</h2>
		</div>
	</div>
</div>

<div class="page-content-wrap">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de Empleos</h3>
					<div class="btn-group pull-right">
						<?= $this->Html->link('<i class="fa fa-plus"></i> Nuevo Empleo', array('action' => 'add'), array('class' => 'btn btn-success', 'escape' => false)); ?>
						<?= $this->Html->link('<i class="fa fa-file-excel-o"></i> Exportar a Excel', array('action' => 'exportar'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="sort">
									<th><?= $this->Paginator->sort('empresa_id', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
									<th><?= $this->Paginator->sort('titulo', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
									<th><?= $this->Paginator->sort('jornada_laboral_id', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
									<th><?= $this->Paginator->sort('contrato_ofrecido_id', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
									<th><?= $this->Paginator->sort('comuna_id', 'Lugar de trabajo', array('title' => 'Haz click para ordenar por este criterio')); ?></th>
									<th><?= $this->Paginator->sort('vacantes', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
									<th><?= $this->Paginator->sort('estado_empleo_id', 'Estado del empleo', array('title' => 'Haz click para ordenar por este criterio')); ?></th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $empleos as $empleo ) : ?>
								<tr>
									<td><?= $this->Html->link($empleo['Empresa']['nombre'], array('controller' => 'empresas', 'action' => 'edit', $empleo['Empresa']['id'])); ?></td>
									<td><?= $this->Text->excerpt(h($empleo['Empleo']['titulo']), 'method', 15, '...');; ?>&nbsp;</td>
									<td><?= h($empleo['JornadaLaboral']['nombre']); ?>&nbsp;</td>
									<td><?= h($empleo['ContratoOfrecido']['nombre']); ?>&nbsp;</td>
									<td><?= $this->Html->link($empleo['Comuna']['comuna'], array('controller' => 'comunas', 'action' => 'edit', $empleo['Comuna']['id'])); ?></td>
									<td><?= h($empleo['Empleo']['vacantes']); ?>&nbsp;</td>
									<td>
									<? if ($empleo['EstadoEmpleo']['id'] == 1) { ?>
										<span class="label label-default"><?=$empleo['EstadoEmpleo']['estado'];?></span>
									<? } ?>
									<? if ($empleo['EstadoEmpleo']['id'] == 2) { ?>
										<span class="label label-success"><?=$empleo['EstadoEmpleo']['estado'];?></span>
									<? } ?>
									<? if ($empleo['EstadoEmpleo']['id'] == 3) { ?>
										<span class="label label-danger"><?=$empleo['EstadoEmpleo']['estado'];?></span>
									<? } ?>
									</td>
									<td>
										<?= $this->Html->link('<i class="fa fa-edit"></i> Editar', array('action' => 'edit', $empleo['Empleo']['id']), array('class' => 'btn btn-xs btn-info', 'rel' => 'tooltip', 'title' => 'Editar este registro', 'escape' => false)); ?>

									<? if ($empleo['EstadoEmpleo']['id'] == 1) { ?>
										<?= $this->Form->postLink('<i class="fa fa-eye"></i> Publicar', array('action' => 'publish', $empleo['Empleo']['id']), array('class' => 'btn btn-xs btn-success', 'rel' => 'tooltip', 'title' => 'Publicar este empleo', 'escape' => false)); ?>
									<? } ?>
									<? if ($empleo['EstadoEmpleo']['id'] == 2) { ?>
										<?= $this->Form->postLink('<i class="fa fa-eye-slash"></i> Despublicar', array('action' => 'unpublish', $empleo['Empleo']['id']), array('class' => 'btn btn-xs btn-danger', 'rel' => 'tooltip', 'title' => 'Despublicar este empleo', 'escape' => false)); ?>
									<? } ?>
									<? if ($empleo['EstadoEmpleo']['id'] == 3) { ?>
										<?= $this->Form->postLink('<i class="fa fa-eye"></i> Publicar', array('action' => 'publish', $empleo['Empleo']['id']), array('class' => 'btn btn-xs btn-warning', 'rel' => 'tooltip', 'title' => 'Volver a publicar este empleo', 'escape' => false)); ?>
									<? } ?>
										
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="pull-right">
	<ul class="pagination">
		<?= $this->Paginator->prev('« Anterior', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'first disabled hidden')); ?>
		<?= $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'a', 'modulus' => 2, 'currentClass' => 'active', 'separator' => '')); ?>
		<?= $this->Paginator->next('Siguiente »', array('tag' => 'li'), null, array('tag' => 'li', 'disabledTag' => 'a', 'class' => 'last disabled hidden')); ?>
	</ul>
</div>
