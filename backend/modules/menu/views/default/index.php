<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-11 09:02:38
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   index.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-14 16:54:41
 */
$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">Menu</h5>
                <div class="f-right">
                    <a href="<?=Url::to(['default/create-menu']);?>"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Create New User">Create New Menu</button></a>
                </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'id'=>'case-list',
                        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover',],
                        'layout'=>'<div class="col-sm-12 table-responsive">{items}<div class="col-sm-5"><div id="case-list_info" class="dataTables_info" role="status" aria-live="polite">{summary}</div></div><div class="col-sm-7"><div id="case-list_paginate" class="pull-right">{pager}</div></div></div>',
                        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute'=>'menu_title',
                                'label'=>'Title',
                                'content'=>function($data){
                                    return Html::encode($data->menu_title);
                                }
                            ],
                            [
                                'attribute'=>'menu_type',
                                'label'=>'Type',
                                'content'=>function($data){
                                    return Html::encode(ucwords($data->menu_type));
                                }
                            ],
                            [
                                'attribute'=>'menu_attr_class',
                                'label'=>'Class',
                                'content'=>function($data){
                                    return Html::encode(($data->menu_attr_class != '') ? $data->menu_attr_class : 'Not Available');
                                }
                            ],
                            [
                                'attribute'=>'menu_attr_id',
                                'label'=>'ID',
                                'content'=>function($data){
                                    return Html::encode(($data->menu_attr_id != '') ? $data->menu_attr_id : 'Not Available');
                                }
                            ],
                            [
                                'attribute'=>'menu_status',
                                'label'=>'Status',
                                'content'=>function($data){
                                    if($data->menu_status==Yii::$app->params['active']){
                                        return '<label class="label bg-success">Active</label>';
                                    }elseif($data->menu_status==Yii::$app->params['suspend']){
                                        return '<label class="label bg-warning">Suspended</label>';
                                    }else{
                                        return '<label class="label bg-danger">Deleted</label>';
                                    }
                                    
                                }
                            ],
                            [
                            'attribute'=>'id',
                            'label'=>'Action',
                            'content'=>function($data){
                                $html='<a href="'.Url::to(['default/view-menu','id'=>$data->menu_id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="View User" class="btn btn-mini btn-success waves-effect waves-light"><i class="icofont icofont-eye "></i></a> ';
                                $html.='<a href="'.Url::to(['default/update-menu','id'=>$data->menu_id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update User" class="btn btn-mini btn-info waves-effect waves-light"><i class="icofont icofont-pencil "></i></a> ';
                                $html.=Html::button('<i class="icofont icofont-plus"></i>', ['value' => Url::to(['default/assignment-menu','id'=>$data->menu_id]), 'data-toggle'=>"tooltip",'data-placement'=>"top",'title'=>"",'data-original-title'=>"Update User", 'class' => 'showModalButton btn btn-mini btn-primary waves-effect waves-light']);
                                $html.='<a href="#" data-id="'.$data->menu_id.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User" class="btn btn-mini btn-danger waves-effect waves-light btn-delete"><i class="icofont icofont-trash "></i></a> ';
                                return $html;
                            }
                            ],
                        
                        ],
                    ]); ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$Filedeleteurl = Url::to(['default/delete-menu']);
$script = <<< JS

$(document).ready(function(){
    $(document).on("click",".btn-delete",function(e){
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


