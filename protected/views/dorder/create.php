<?php
$this->breadcrumbs=array(
	'Dorders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dorder', 'url'=>array('index')),
	array('label'=>'Manage Dorder', 'url'=>array('admin')),
);
?>

<h1>Create Dorder</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>