<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-15 10:56:12
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   _assignmenu.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 15:49:02
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
$this->title="Assign Menu";
?>
<?php $form = ActiveForm::begin(['id'=>'user-assignment-form','errorCssClass' => 'has-danger has-error']); ?>

<div class="row">
    <div class="col-md-4">
    	<?= $form->field($model, 'menu_assignment_role',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist(Yii::$app->basic->GetRolesList(),['prompt'=>'Select Type']); ?>
    </div>
    <div class="col-md-4">
    	<?= $form->field($model, 'menu_assignment_home',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist(Yii::$app->basic->GetMenuHome(),['prompt'=>'Select Type']); ?>
    </div>
    <div class="col-md-4">
    	<?= $form->field($model, 'menu_assignment_type',['template' => '{label}{input}{error}','labelOptions' => [ 'class' => 'form-control-label' ],'errorOptions' => [ 'class' => 'form-control-feedback' ]])->dropDownlist(['leftMenu'=>'Left Menu','rightMenu'=>'Right Menu','topMenu'=>'Top Menu','bottomMenu'=>'Bottom Menu','innerMenu'=>'Inner Menu'],['prompt'=>'Select Type']); ?>
    </div>
</div>
<div class="row text-center">
 	<?= Html::submitButton('Submit',['class'=>'btn btn-success','id'=>'Submit-button']) ?>
 	<?= Html::resetButton('Reset',['class'=>'btn btn-primary','id'=>'Submit-button']) ?>
</div>
<?php $form::end(); ?>
<br>
<div class="row">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'id'=>'case-list',
                        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover',],
                        'layout'=>'<div class="col-sm-12 table-responsive">{items}<div class="col-sm-5"><div id="case-list_info" class="dataTables_info" role="status" aria-live="polite">{summary}</div></div><div class="col-sm-7"><div id="case-list_paginate" class="pull-right">{pager}</div></div></div>',
                        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'menu_assignment_role',
                                'label'=>'Role',
                                'content'=>function($data){
                                    return Html::encode($data->menu_assignment_role);
                                }
                            ],
                            
                            [
                                'attribute'=>'menu_title',
                                'label'=>'Title',
                                'content'=>function($data){
                                    return Html::encode(ucwords($data->menuAssignmentHome->menu_title));
                                }
                            ],
                            
                     
                            [
                                'attribute'=>'menu_assignment_type',
                                'label'=>'Type',
                                'content'=>function($data){
                                    return Html::encode(($data->menu_assignment_type != '') ? $data->menu_assignment_type : 'Not Available');
                                }
                            ],
                            [
                                'attribute'=>'menu_assignment_status',
                                'label'=>'Status',
                                'content'=>function($data){
                                    if($data->menu_assignment_status==Yii::$app->params['active']){
                                        return '<label class="label bg-success">Active</label>';
                                    }elseif($data->menu_assignment_status==Yii::$app->params['suspend']){
                                        return '<label class="label bg-warning">Suspended</label>';
                                    }else{
                                        return '<label class="label bg-danger">Deleted</label>';
                                    }
                                    
                                }
                            ],
                            [
                            'attribute'=>'menu_assignment_id',
                            'label'=>'Action',
                            'content'=>function($data){
                                $html='<a href="#" data-id="'.$data->menu_assignment_id.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User" class="btn btn-mini btn-danger waves-effect waves-light btn-delete-assign"><i class="icofont icofont-trash "></i></a> ';
                                return $html;
                            }
                            ],
                        
                        ],
                        
                    ]); ?>
                    
                </div>
<?php
$Filedeleteurl = Url::to(['default/delete-assignment-menu']);
$script = <<< JS
$( document ).ready(function() {
    $('#user-assignment-form').on('beforeSubmit', function(event, jqXHR, settings) {
        //$('#Submit-button').prop('disabled', true);
        var form = $(this);
        var formData = new FormData(this);
        // return false if form still have some validation errors
        if (form.find('.has-error').length) {
            $('#Submit-button').prop('disabled', false);
            return false;
        }
        // submit form
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: formData,
            async: false,
            success: function(response) {
                if (response.status == 1) {
                    
                } else {
                    $('#user-assignment-form').yiiActiveForm('updateMessages',
                        response.message, true);
                    $('#Submit-button').prop('disabled', false);
                }
            },
            error: function() {
                console.log('internal server error');
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    });
    $(document).on("click",".btn-delete-assign",function(e){
        var id=$(this).data('id');
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this menu!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel pls!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                $.ajax({
                     type: 'POST',
                     url: '$Filedeleteurl',
                     data:{id:id},
                     dataType:'json',
                     success: function (response) {
                        if(response.status==1){
                            swal("Deleted!", "Menu has been deleted.", "success");
                        }else{
                            swal("Cancelled", "Menu is safe :)", "error");
                        }
                     }
                });

            } else {
                swal("Cancelled", "User is safe :)", "error");
            }
        });
    });
});
JS;
$this->registerJs($script);
?>
