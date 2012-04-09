<?php
$this->breadcrumbs=array(
	'Dorders',
);

$this->menu=array(
	array('label'=>'Create Dorder', 'url'=>array('create')),
	array('label'=>'Manage Dorder', 'url'=>array('admin')),
);
?>

<h1>Dorders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
