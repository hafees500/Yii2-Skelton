<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-10 18:33:44
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   requestPasswordResetToken.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-10 18:41:45
 */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="login-card card-block">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form','options'=>['class'=>'md-float-material']]); ?>
            <form class="md-float-material">
                <div class="text-center">
                    <img src="assets/images/logo-blue.png" alt="logo">
                </div>
                <h3 class="text-primary text-center m-b-25">Recover your password</h3>
                <?= $form->field($model, 'email',['template' => '<div class="md-group"><div class="md-input-wrapper">{label}{input}{error}</div></div>'])->textInput(['autofocus' => true,'class'=>'md-form-control']) ?>
                <div class="btn-forgot">
                    <?= Html::submitButton('SEND RESET LINK', ['class' => 'btn btn-primary btn-md waves-effect waves-light text-center', 'name' => 'login-button']) ?>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center m-t-25">
                        <?= Html::a('Sign In Here', ['site/login'],['class'=>'f-w-600 p-l-5']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

