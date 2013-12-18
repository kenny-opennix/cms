<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="ru"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.css"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" id="page">
    <div id="header">
        <div id="logo"><a href="/"><?php echo CHtml::encode(Yii::app()->name); ?></a></div>
    </div>
    <!-- header -->

    <div id="mainmenu">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="/categories">Categories</a></li>
            <li><a href="/members">Members</a></li>
            <li><a href="/profile">Profile</a></li>
        </ul>
    </div>
    <?php
    //    $baseUrl = Yii::app()->baseUrl;
    //    $cs = Yii::app()->getClientScript();
    //    $cs->registerScriptFile($baseUrl.'../web/js/bootstrap.min.js');
    //    $cs->registerCssFile($baseUrl.'/css/yourcss.css');
    ?>
    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        <?php include_once('footer.php') ?>
    </div>
    <!-- footer -->

</div>
<!-- page -->

<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</body>
</html>
