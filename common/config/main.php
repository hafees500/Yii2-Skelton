<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-06-22 17:12:39
 * @Email:   hafees@ndimensionz.com
 * @Project:   cft
 * @Filename:   main.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-06-22 18:16:53
 */

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
