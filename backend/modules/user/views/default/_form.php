<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-11 10:45:29
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   _form.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 11:02:38
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

	<?php $form = ActiveForm::begin(['id'=>'user-create-form','errorCssClass' => 'has-danger has-error']); ?>
    <div class="row">
    <div class="col-md-4">
    	<?= $form->field($model, 'username',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    <div class="col-md-4">
    	<?= $form->field($model, 'email',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    <div class="col-md-4">
    	<?= $form->field($model, 'password',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    	<?= $form->field($model, 'mobile',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    <div class="col-md-4">
    	<?= $form->field($model, 'location',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    <div class="col-md-4">
    	<?= $form->field($model, 'summary',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    	<?= $form->field($model, 'skype',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
     <div class="col-md-4">
    	<?= $form->field($model, 'profile_name',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    <div class="col-md-4">

    	<?= $form->field($model, 'profile_pic',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->fileInput() ?>
    </div>

    </div>
    <div class="row">
    	<div class="col-md-4">
			<?= $form->field($model, 'gender')->dropDownlist(['1'=>'Male','2'=>'Female','3'=>'Other']); ?>
    	</div>
    	<div class="col-md-4">
			<?= $form->field($model, 'role')->dropDownlist(Yii::$app->basic->GetRolesList(),['prompt'=>'Select Role']); ?>
    	</div>
    	<div class="col-md-4">
			<?= $form->field($model, 'status')->dropDownlist(['10'=>'Active','9'=>'Suspend']); ?>
    	</div>
    </div>
    <div class="row text-center">
     	<?= Html::submitButton('Submit',['class'=>'btn btn-success','id'=>'Submit-button']) ?>
     	<?= Html::resetButton('Reset',['class'=>'btn btn-primary','id'=>'Submit-button']) ?>
	</div>

    <?php $form::end(); ?>
</div>
