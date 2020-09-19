<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 22:07:12
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   _form.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 16:08:45
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
    	<?= $form->field($model, 'menu_item_title',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
     <div class="col-md-4">
        <?= $form->field($model, 'menu_item_label',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['autofocus' => true,'placeholder'=>'']) ?>
    </div>
    
    <div class="col-md-4">
    	<?= $form->field($model, 'menu_item_link',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['placeholder'=>'']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'menu_item_home',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist(Yii::$app->basic->GetMenuHome(),['prompt'=>'Select Home Menu']) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'menu_item_parent',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist([],['prompt'=>'Select Type']); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'menu_item_attr_class',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput(['placeholder'=>'']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'menu_item_type',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist(['1'=>'Link','2'=>'DropDown','0'=>'No Link','4'=>'Line'],['prompt'=>'Select Type']); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'menu_item_attr_id',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->textInput([]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'menu_item_status',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist(['10'=>'Active','9'=>'Pending'],['prompt'=>'Select Status']); ?>
    </div>
</div>
<div class="row text-center">
 	<?= Html::submitButton('Submit',['class'=>'btn btn-success','id'=>'Submit-button']) ?>
 	<?= Html::resetButton('Reset',['class'=>'btn btn-primary','id'=>'Submit-button']) ?>
</div>
<?php $form::end(); ?>

<?php
$itemMenuList = Url::to(['item/parent-menu-list']);
$script = <<< JS

$(document).ready(function(){
    $(document).on("change","#menuitem-menu_item_home",function(e){
        e.preventDefault();
        var id=$(this).val();
        if(id != ''){
            $.ajax({
                type: 'POST',
                url: '$itemMenuList',
                data:{id:id},
                dataType:'json',
                success: function (response) {
                    if(response.status==1){
                        $("#menuitem-menu_item_parent").html("<option value=''>Select Type</option>");
                        $.each(response.data, function(i, value) {
                            $("#menuitem-menu_item_parent").html("<option value=''>Select Type</option>");
                            $('#menuitem-menu_item_parent').append($('<option>').text(value).attr('value', i));
                        });
                    }else{
                        $("#menuitem-menu_item_parent").html("<option value=''>Select Type</option>");
                    }
                }
            });
        }else{

        }
    });
});
JS;
$this->registerJs($script);
?>




