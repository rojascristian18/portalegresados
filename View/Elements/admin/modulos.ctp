<? foreach ($modulosDisponibles as $moduloPadre) { ?>

	<? if ( ! empty($moduloPadre['url']) && ! empty($moduloPadre['icono']) ) : ?>
		<li class="<?= ($this->Html->menuActivo(array('controller' => strtolower($modulo['Modulo']['url']), 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="'.$moduloPadre['icono'].'"></span> <span class="xn-text">'.$moduloPadre['modulo'].'</span>',
				array('controller' => strtolower($moduloPadre['url']), 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
	<? endif; ?>
		
	<? if ( ! empty($moduloPadre['hijos']) ) { ?>
		<li> <?=$moduloPadre['modulo']; ?></li>
		<? foreach ($moduloPadre['hijos'] as $modulo) { ?>
		<li class="<?= ($this->Html->menuActivo(array('controller' => strtolower($modulo['Modulo']['url']), 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="'.$modulo['Modulo']['icono'].'"></span> <span class="xn-text">'.$modulo['Modulo']['modulo'].'</span>',
				array('controller' => strtolower($modulo['Modulo']['url']), 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<? }?>
	<? } ?>
<? } ?>
