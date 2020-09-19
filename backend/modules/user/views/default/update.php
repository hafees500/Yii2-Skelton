<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-12 22:12:37
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   update.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 11:18:42
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Update User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text"><?= $this->title ?></h5>
                <div class="f-right">
                    <a href="form-elements-materialize.html" data-toggle="modal" data-target="#form-states-Modal"><i class="icofont icofont-code-alt"></i></a>
                </div>
            </div>
            <div class="card-block">
            	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'id'=>'user-create-form','errorCssClass' => 'has-danger has-error']); ?>
					<div class="row">
					    <div class="col-md-4">
					    	<?= $form->field($model, 'ud_mobile',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
					    </div>
					    <div class="col-md-4">
					    	<?= $form->field($model, 'ud_location',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
					    </div>
					    <div class="col-md-4">
					    	<?= $form->field($model, 'ud_summary',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
					    </div>
					</div>
					<div class="row">
					<div class="col-md-4">
						<?= $form->field($model, 'ud_skype_id',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
					</div>
					 <div class="col-md-4">
						<?= $form->field($model, 'ud_profile_name',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
					</div>
					<div class="col-md-4">
						<?= $form->field($model, 'ud_profile_pic',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->fileInput() ?>
					</div>

					</div>
					<div class="row">
						<div class="col-md-4">
							<?= $form->field($model, 'ud_gender')->dropDownlist(['1'=>'Male','2'=>'Female','3'=>'Other']); ?>
						</div>
					</div>
					<div class="row text-center">
					 	<?= Html::submitButton('Submit',['class'=>'btn btn-success','id'=>'Submit-button']) ?>
					 	<?= Html::resetButton('Reset',['class'=>'btn btn-primary','id'=>'Submit-button']) ?>
					</div>
					</div>
					<?php $form::end(); ?>
                
            </div>
        </div>
    </div>
</div>