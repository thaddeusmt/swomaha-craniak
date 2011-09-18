<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Craniak',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.commands.*',
        'application.migrations.*',
    ),

    // application components
    'components'=>array(
        'user'=>array(
            'class'=>'CWebUser',
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        /*'authManager'=>array(
            'class'=>'CPhpAuthManager',
        ),*/

        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=swomaha',
            'emulatePrepare' => true,
            'username' => 'swomaha',
            'password' => 'swomaha',
            'charset' => 'utf8',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class'=>'CWebLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            //'caseSensitive'=>false,
            'rules'=>array(
                'gii'=>'gii',
                'gii/<controller:[\w\-]+>'=>'gii/<controller>',
                'gii/<controller:[\w\-]+>/<action:\w+>'=>'gii/<controller>/<action>',
            )
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
              'urlFormat'=>'path',
              'rules'=>array(
                  '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                  '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                  '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
              ),
          ),
          */
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
    ),
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'test',
            'generatorPaths'=>array(
                'application.extensions.gtc',   // Gii Template Collection
            ),
        ),
    ),
);
