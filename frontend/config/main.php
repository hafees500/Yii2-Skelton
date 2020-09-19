<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-07-24 23:35:49
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   main.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-10 23:36:33
 */
/**
 * @Author: Hafees Rahman
 * @Date:   2018-06-22 17:12:39
 * @Email:   hafees@ndimensionz.com
 * @Project:   cft
 * @Filename:   main.php
 * @Last modified by:   hafees
 * @Last modified time: 24-07-2018 23:35:49
 */

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'audit' => 'bedezign\yii2\audit\Audit',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'common\components\Request',
            'web'=> '/frontend/web',
        ],
        'view' => [
            'class' => '\ogheo\htmlcompress\View',
            'compress' => YII_ENV_DEV ? false : true,
            // ...
        ],
        // 'user' => [
        //     'identityClass' => 'mdm\admin\models\User',
        //     //'loginUrl' => ['admin/user/login'],
        // ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
                    '<controller:\w+>/<action:\w+(-\w+)*>/<id:\d+>' => '<controller>/<action>',
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
            'site/index',
            'site/login',
            'site/signup',
            'site/logout',
            'app/*',
            'dashboard/*',
        ]
    ]
];
