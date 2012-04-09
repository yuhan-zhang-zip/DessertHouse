<?php
$this->breadcrumbs=array(
	'Dorders'=>array('index'),
	$model->did=>array('view','id'=>$model->did),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dorder', 'url'=>array('index')),
	array('label'=>'Create Dorder', 'url'=>array('create')),
	array('label'=>'View Dorder', 'url'=>array('view', 'id'=>$model->did)),
	array('label'=>'Manage Dorder', 'url'=>array('admin')),
);
?>

<h1>Update Dorder <?php echo $model->did; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>