<div class="page-sidebar">
	<ul class="x-navigation x-navigation-custom">
		<li class="xn-logo">
			<?= $this->Html->link(
				'<span class="fa fa-dashboard"></span> <span class="x-navigation-control">Backend</span>',
				'/businesses',
				array('escape' => false)
			); ?>
		</li>
		<li class="xn-title"></li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'empresas', 'action' => 'dashboard')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span>',
				'/businesses',
				array('escape' => false)
			); ?>
		</li>
		<li class="xn-title">Menú</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'empleos', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-briefcase"></span> <span class="xn-text">Mis ofertas</span>',
				array('controller' => 'empleos', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'empresas', 'action' => 'edit')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-building"></span> <span class="xn-text">Mi empresa</span>',
				array('controller' => 'empresas', 'action' => 'edit', $this->Session->read('Auth.Empresa.id')),
				array('escape' => false)
			); ?>
		</li>
	</ul>
</div>
