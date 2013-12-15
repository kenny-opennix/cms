<?php
/* @var $this TopicsController */
/* @var $model Topics */

$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Topics', 'url'=>array('index')),
	array('label'=>'Create Topics', 'url'=>array('create')),
	array('label'=>'View Topics', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Topics', 'url'=>array('admin')),
);
?>

<h1>Update Topics <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>