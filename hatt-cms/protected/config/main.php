<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'HATT-CMS',

    // preloading 'log' component
    'preload' => array('log', 'debug'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.service.*'
    ),

    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'hatt-gii',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        )
    ),

    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'viewRenderer' => array(
            'class' => 'ext.ESmartyViewRenderer',
            'fileExtension' => '.tpl',
            //'pluginsDir' => 'application.smartyPlugins',
            //'configDir' => 'application.smartyConfig',
        ),

        'debug' => array(
            'class' => 'ext.yii2-debug-master.Yii2Debug',
            'panels' => array(
                'db' => array(
                    'highlightCode' => false,
                    'insertParamValues' => false,
                ),
            ),
        ),

        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        /*		'db'=>array(
                    'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
                ),*/
        // uncomment the following to use a MySQL database

        'db' => array(
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'connectionString' => 'mysql:host=localhost;dbname=hatt',
            'emulatePrepare' => true,
            'username' => 'hatt',
            'password' => 'qwerty',
            'charset' => 'utf8',
        ),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'enabled' => YII_DEBUG,
            'routes' => array(
                #...
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                )
            ),
        ),
        'cache' => array(
            'class' => 'CFileCache',
//            'class' => 'CMemCache',
            )
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);