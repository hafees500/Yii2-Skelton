<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-07-01 18:33:03
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   main.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 11:09:53
 */
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset2 as AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?= Yii::$app->request->baseUrl ?>/images/favicon.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="fix-header fix-sidebar card-no-border">
<?php $this->beginBody() ?>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <?= $this->render('header'); ?>
        <?= $this->render('sidemenu'); ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"><?= Html::encode($this->title) ?></h3>

                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">

                            <?= Breadcrumbs::widget([
                                'options'=>['class'=>'breadcrumb'],
                                'tag'=>'ol',
                                'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
                                'activeItemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n",
                                'homeLink' => [
                                      'label' => "",
                                      'url' => Yii::$app->homeUrl,
                                      'template' => "<li class='breadcrumb-item'>{link} Home</li>",
                                 ],
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]) ?>
                        </div>
                    </div>
                </div>
                <?= $content; ?>
                <footer class="footer">
                    © 2019 Material Pro Admin by wrappixel.com
                </footer>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div class="main-header" style="margin-top: 0px;">
                        <!-- <h4><? Html::encode($this->title) ?></h4> -->
                        <? Breadcrumbs::widget([
                            'options'=>['class'=>'breadcrumb breadcrumb-title breadcrumb-arrow'],
                            'tag'=>'ol',
                            'itemTemplate' => "<li class='breadcrumb-item'><i>{link}</i></li>\n",
                            'homeLink' => [
                                  'label' => "",
                                  'url' => Yii::$app->homeUrl,
                                  'template' => "<li>{link}<i class='icofont icofont-home'></i></li>",
                             ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $this->endBody() ?>
<?php
yii\bootstrap\Modal::begin([
    //'header'=>'<button class="close" data-dismiss="modal">×</button>',
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'><div style='text-align:center'></div>";
yii\bootstrap\Modal::end();
?>
<script type="text/javascript">
    function notifymessage(message, type){
        $.growl({
            message: message
        },{
            type: type,
            allow_dismiss: false,
            label: 'Cancel',
            className: 'btn-xs btn-inverse',
            placement: {
                from: 'top',
                align: 'right'
            },
            delay: 2500,
            animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
            },
            offset: {
                x: 30,
                y: 30
            }
        });
    };
</script>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <script type="text/javascript">
        notifymessage("<?= Yii::$app->session->getFlash('success'); ?>", 'success');
    </script>
<?php endif;?>
<?php if (Yii::$app->session->hasFlash('warning')): ?>
    <script type="text/javascript">
        notifymessage("<?= Yii::$app->session->getFlash('warning'); ?>", 'warning');
    </script>
<?php endif;?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <script type="text/javascript">
        notifymessage("<?= Yii::$app->session->getFlash('error'); ?>", 'danger');
    </script>
<?php endif;?>
</body>
</html>
<?php $this->endPage() ?>
