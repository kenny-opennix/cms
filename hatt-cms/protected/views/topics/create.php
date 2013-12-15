<?php
/* @var $this TopicsController */
/* @var $model Topics */

$this->breadcrumbs=array(
	'Topics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Topics', 'url'=>array('index')),
	array('label'=>'Manage Topics', 'url'=>array('admin')),
);
?>

<h1>Create Topics</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>