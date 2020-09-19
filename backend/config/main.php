<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-07-24 23:38:49
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   main.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 19:12:59
 */
/**
 * @Author: Hafees Rahman
 * @Date:   2018-07-01 18:33:03
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   main.php
 * @Last modified by:   hafees
 * @Last modified time: 24-07-2018 23:38:49
 */

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            'class' => 'backend\modules\user\User',
        ],
        'menu' => [
            'class' => 'backend\modules\menu\Menu',
        ],
        'audit-trail' => 'bedezign\yii2\audit\Audit',
        'user-management' => [
            'class' => 'mdm\admin\Module',
            //'layout' => 'left-menu', // it can be '@path/to/your/layout'.
            // 'controllerMap' => [
            //     'assignment' => [
            //         'class' => 'mdm\admin\controllers\AssignmentController',
            //         'userClassName' => 'common\models\User',
            //         'idField' => 'user_id'
            //     ],
            //     'other' => [
            //         'class' => 'path\to\OtherController', // add another controller
            //     ],
            // ],
            // 'menus' => [
            //     'assignment' => [
            //         'label' => 'Grand Access' // change label
            //     ],
            //     //'route' => null, // disable menu route
            // ]
        ],
    ],
    'components' => [
        'basic' => [
            'class' => 'backend\components\Basic',
        ],
        'view' => [
            'class' => '\ogheo\htmlcompress\View',
            'compress' => YII_ENV_DEV ? false : true,
            // ...
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/dashboard'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],

        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/login',
            'site/logout',
            'site/index',
            'site/request-password-reset',
            'user/*',
            'user-management/*',
            'audit-trail/*',
            'gii/*',
        ]
    ]
];
