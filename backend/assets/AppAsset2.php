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
class AppAsset2 extends AssetBundle
{
    // public $basePath = '@webroot';
    // public $baseUrl = '@web';
    public $sourcePath = '@bower/AdminTheme2';
    public $css = [
        'plugins/bootstrap/css/bootstrap.min.css',
        'plugins/bootstrap-select/bootstrap-select.min.css',
        'plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
        'plugins/datatables.net-bs4/css/dataTables.bootstrap4.css',
        'plugins/datatables.net-bs4/css/responsive.dataTables.min.css',
        'plugins/select2/dist/css/select2.min.css',

        'plugins/chartist-js/dist/chartist.min.css',
        'plugins/chartist-js/dist/chartist-init.css',
        'plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css',
        'plugins/c3-master/c3.min.css',
        'css/style.css',
        'css/colors/blue.css',
    ];
    public $js = [
        'plugins/jquery/jquery.min.js',
        'plugins/popper/popper.min.js',
        'plugins/bootstrap/js/bootstrap.min.js',
        'plugins/select2/dist/js/select2.full.min.js',
        'plugins/bootstrap-select/bootstrap-select.min.js',
        'plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
        'plugins/datatables.net/js/jquery.dataTables.min.js',
        'plugins/datatables.net-bs4/js/dataTables.responsive.min.js',
        'js/jquery.slimscroll.js',
        'js/waves.js',
        'js/sidebarmenu.js',
        'plugins/sticky-kit-master/dist/sticky-kit.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'js/custom.min.js',
        'plugins/chartist-js/dist/chartist.min.js',
        'plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js',
        'plugins/d3/d3.min.js',
        'plugins/c3-master/c3.min.js',
        'js/dashboard1.js',
        'plugins/styleswitcher/jQuery.style.switcher.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
