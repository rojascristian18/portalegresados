<?php
if ( BreadcrumbComponent::$visible && ! empty($breadcrumbs) )
{
foreach ( $breadcrumbs as $breadcrumb )
{ 	
	$this->Html->addCrumb($breadcrumb[0], $breadcrumb[1]);
}
?>


<div class="breadcrums-wrapper">
    <?= $this->Html->getCrumbList(array('class' => 'breadcrumb')); ?>
</div>
 
 
<?
}
?>


