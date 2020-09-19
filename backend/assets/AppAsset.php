<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-07-01 18:33:03
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   AppAsset.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-14 16:34:41
 */
namespace backend\assets;

use yii\web\AssetBundle;

/** 
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    // public $basePath = '@webroot';
    // public $baseUrl = '@web';
    public $sourcePath = '@bower/AdminTheme';
    public $css = [
        'css/fonts_googleapis.css',
        'icon/icofont/css/icofont.css',
        'icon/simple-line-icons/css/simple-line-icons.css',
        'css/bootstrap.min.css',
        'css/svg-weather.css',
        'css/main.css',
        'css/responsive.css',
        'css/color/color-1.min.css',
        'css/site.css',
        'css/sweet-alert.css'
    ];
    public $js = [
        'plugins/charts/echarts/js/echarts-all.js',
        'js/jquery-ui.min.js',
        'js/tether.min.js',
        'js/bootstrap.min.js',
        'js/waves.min.js',
        'plugins/jquery-slimscroll/jquery.slimscroll.js',
        'plugins/jquery.nicescroll/jquery.nicescroll.min.js',
        'plugins/classie/classie.js',
        'plugins/notification/js/bootstrap-growl.min.js',
        'plugins/d3/d3.js',
        'plugins/rickshaw/rickshaw.js',
        'plugins/jquery-sparkline/dist/jquery.sparkline.js',
        'plugins/waypoints/jquery.waypoints.min.js',
        'plugins/countdown/js/jquery.counterup.js',
        'js/main.min.js',
        'pages/dashboard.js',
        'pages/notification.js',
        'pages/elements.js',
        'js/menu.min.js',
        'js/sweet-alert.min.js',
        'js/ajax-modal-popup.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
