<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-10 18:02:51
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   login.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-12 22:09:40
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
    <div class="login-box card">
        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options'=>['class'=>'form-horizontal form-material'],
                'errorCssClass' => 'error'
            ]); ?>
                <h3 class="box-title m-b-20">Sign In</h3>
                <?= $form->field($model, 'username',['template' => '<div class="form-group "><div class="col-xs-12">{label}{input}{error}</div>'])->textInput(['autofocus' => true,'class'=>'form-control','placeholder'=>'Username'])->label(false) ?>
                <?= $form->field($model, 'password',['template' => '<div class="form-group "><div class="col-xs-12">{label}{input}{error}</div>'])->passwordInput(['autofocus' => true,'class'=>'form-control','placeholder'=>'Password'])->label(false) ?>
                <div class="form-group">
                    <div class="d-flex no-block align-items-center">
                        <div class="checkbox checkbox-primary p-t-0">
                            <?= Html::checkbox('LoginForm[rememberMe]', ['id' => 'checkbox-login']); ?>
                            <label for="checkbox-login"> Remember me </label>
                        </div>
                        <div class="ml-auto">
                            <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <?= Html::submitButton('Log In', ['class' => 'btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light', 'name' => 'login-button']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
            <form class="form-horizontal" id="recoverform" action="index.html">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email"> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
