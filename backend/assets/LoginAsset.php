<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-10 17:42:42
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   LoginAsset.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-10 18:48:22
 */





namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    //public $sourcePath = '@bower/AdminTheme';
    public $sourcePath = '@bower/AdminTheme2';
    public $css = [
        'plugins/bootstrap/css/bootstrap.min.css',
        'css/style.css',
        'css/colors/blue.css',
    ];
    public $js = [
        //'js/jquery.min.js',
        'plugins/popper/popper.min.js',
        'plugins/bootstrap/js/bootstrap.min.js',
        'js/jquery.slimscroll.js',
        'js/waves.min.js',
        'js/sidebarmenu.js',
        'plugins/sticky-kit-master/dist/sticky-kit.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'js/custom.min.js',
        'plugins/styleswitcher/jQuery.style.switcher.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
