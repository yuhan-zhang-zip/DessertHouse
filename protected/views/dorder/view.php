<?php
$this->breadcrumbs=array(
	'Dorders'=>array('index'),
	$model->did,
);

$this->menu=array(
	array('label'=>'List Dorder', 'url'=>array('index')),
	array('label'=>'Create Dorder', 'url'=>array('create')),
	array('label'=>'Update Dorder', 'url'=>array('update', 'id'=>$model->did)),
	array('label'=>'Delete Dorder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->did),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dorder', 'url'=>array('admin')),
);
?>

<h1>View Dorder #<?php echo $model->did; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'did',
		'oid',
		'pid',
		'amount',
	),
)); ?>
