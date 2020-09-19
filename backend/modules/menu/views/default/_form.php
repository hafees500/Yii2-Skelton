<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 22:07:12
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   _form.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-14 13:13:28
 */
?> 
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
    	<?= $form->field($model, 'menu_title',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    <div class="col-md-4">
    	<?= $form->field($model, 'menu_type',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist(['ul'=>'UL','ol'=>'OL'],['prompt'=>'Select Type']); ?>
    </div>
    <div class="col-md-4">
    	<?= $form->field($model, 'menu_attr_class',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    	<?= $form->field($model, 'menu_attr_id',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    <div class="col-md-4">
		<?= $form->field($model, 'menu_status',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist(['10'=>'Active','9'=>'Pending'],['prompt'=>'Select Status']); ?>
    </div>
	</div>
<div class="row text-center">
 	<?= Html::submitButton('Submit',['class'=>'btn btn-success','id'=>'Submit-button']) ?>
 	<?= Html::resetButton('Reset',['class'=>'btn btn-primary','id'=>'Submit-button']) ?>
</div>
<?php $form::end(); ?>

