<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="ru"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="topmenu">
	<ul>
		<li class="active"><a class="brand" href="/"><?php echo CHtml::encode(Yii::app()->name); ?></a></li>
		<li><a href="/topics">Topics</a></li>
        <li><a href="/categories">Categories</a></li>
        <li><a href="/members">Members</a></li>
        <li><a href="/profile">Profile</a></li>
	</ul>
</div>

<div id="Container">
<!-- header -->
	<?php echo $content; ?>
	<?php include_once('footer.php') ?>
<!-- page -->
</div>

<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</body>
</html>