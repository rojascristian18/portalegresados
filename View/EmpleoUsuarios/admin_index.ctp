<div class="page-title">
	<h2><span class="fa fa-list"></span> Empleo Usuarios</h2>
</div>

<div class="page-content-wrap">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Listado de Empleo Usuarios</h3>
			<div class="btn-group pull-right">
				<?= $this->Html->link('<i class="fa fa-plus"></i> Nuevo Empleo Usuario', array('action' => 'add'), array('class' => 'btn btn-success', 'escape' => false)); ?>
				<?= $this->Html->link('<i class="fa fa-file-excel-o"></i> Exportar a Excel', array('action' => 'exportar'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			</div>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr class="sort">
							<th><?= $this->Paginator->sort('anno_experiencia_id', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
							<th><?= $this->Paginator->sort('jornada_laboral_id', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
							<th><?= $this->Paginator->sort('rubro_empresa_id', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
							<th><?= $this->Paginator->sort('region_id', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
							<th><?= $this->Paginator->sort('usuario_id', null, array('title' => 'Haz click para ordenar por este criterio')); ?></th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $empleoUsuarios as $empleoUsuario ) : ?>
						<tr>
							<td><?= $this->Html->link($empleoUsuario['AnnoExperiencia']['id'], array('controller' => 'anno_experiencias', 'action' => 'edit', $empleoUsuario['AnnoExperiencia']['id'])); ?></td>
							<td><?= $this->Html->link($empleoUsuario['JornadaLaboral']['nombre'], array('controller' => 'jornada_laborales', 'action' => 'edit', $empleoUsuario['JornadaLaboral']['id'])); ?></td>
							<td><?= $this->Html->link($empleoUsuario['RubroEmpresa']['id'], array('controller' => 'rubro_empresas', 'action' => 'edit', $empleoUsuario['RubroEmpresa']['id'])); ?></td>
							<td><?= $this->Html->link($empleoUsuario['Region']['id'], array('controller' => 'regiones', 'action' => 'edit', $empleoUsuario['Region']['id'])); ?></td>
							<td><?= $this->Html->link($empleoUsuario['Usuario']['nombre'], array('controller' => 'usuarios', 'action' => 'edit', $empleoUsuario['Usuario']['id'])); ?></td>
							<td>
								<?= $this->Html->link('<i class="fa fa-edit"></i> Editar', array('action' => 'edit', $empleoUsuario['EmpleoUsuario']['id']), array('class' => 'btn btn-xs btn-info', 'rel' => 'tooltip', 'title' => 'Editar este registro', 'escape' => false)); ?>
								<?= $this->Form->postLink('<i class="fa fa-remove"></i> Eliminar', array('action' => 'delete', $empleoUsuario['EmpleoUsuario']['id']), array('class' => 'btn btn-xs btn-danger confirmar-eliminacion', 'rel' => 'tooltip', 'title' => 'Eliminar este registro', 'escape' => false)); ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
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
