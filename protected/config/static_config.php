<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'zPhotos',
    'sourceLanguage' => 'en',
    'language' => 'ru',
    // autoloading model and component classes
    'import'=>array(
        'application.models.original.*',
        'application.models.good.*',
        'application.models.effect.*',
        'application.models.cart_has_good.*',
        'application.models.image_effect.*',
        'application.models.payment.*',
        'application.models.*',
        'application.forms.*',
        'application.components.*',
        'application.controllers.*',
    ),

    // application components
    'components'=>array(
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=zphotos',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'nullConversion' => PDO::NULL_EMPTY_STRING,
            'schemaCachingDuration' => 3600 * 24,
            'enableParamLogging'    => true
        ),
        'cache'=>array(
            'class'=>'system.caching.CFileCache',
            'directoryLevel' =>1,
            'cachePath' => '../cache/core'
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'zymanch@gmail.com',
        'salt' => 'salt',
        'can_use_image_cache' => false,
        'auto_select_payment' => false
    ),
);