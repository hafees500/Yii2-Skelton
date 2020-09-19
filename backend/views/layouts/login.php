<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-10 17:53:38
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   login.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-10 18:58:57
 */
/**
 * @Author: Hafees Rahman <hafees>
 * @Date:   24-07-2018 23:54:32
 * @Email:  hafees@ndimensionz.com
 * @Project: Nirnaya
 * @Filename:   login.php
 * @Last modified by:   hafees
 * @Last modified time: 24-07-2018 23:59:52
 */




/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
LoginAsset::register($this);
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
<body>
<?php $this->beginBody() ?>
<section id="wrapper">
        <?= $content; ?>
</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
