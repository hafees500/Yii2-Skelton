<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-11 09:02:38
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   index.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 11:51:18
 */
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">Users</h5>
                <div class="f-right">
                    <a href="<?=Url::to(['default/create']);?>"><button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Create New User">Create New User</button></a>
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
                            'attribute'=>'username',
                            'label'=>'Username',
                            'content'=>function($data){
                                return Html::encode($data->user->username);
                            }
                        ],
                        [
                            'attribute'=>'email',
                            'label'=>'Email',
                            'content'=>function($data){
                                return Html::encode($data->user->email);
                            }
                        ],
                        [
                            'attribute'=>'ud_profile_name',
                            'label'=>'Profile Name',
                            'content'=>function($data){
                                return Html::encode($data->ud_profile_name);
                            }
                        ],
                        [
                            'attribute'=>'role',
                            'label'=>'Role',
                            'content'=>function($data){
                                return Html::encode(($data->user->role != '') ? $data->user->role : 'Not Assigned');
                            }
                        ],
                        [
                            'attribute'=>'status',
                            'label'=>'Status',
                            'content'=>function($data){
                                if($data->user->status==Yii::$app->params['active']){
                                    return '<label class="label bg-success">Active</label>';
                                }elseif($data->user->status==Yii::$app->params['suspend']){
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
                            $html='<a href="'.Url::to(['default/view','id'=>$data->ud_id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="View User" class="btn btn-mini btn-success waves-effect waves-light"><i class="icofont icofont-eye "></i></a> ';
                            $html.='<a href="'.Url::to(['default/update','id'=>$data->user->id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update User" class="btn btn-mini btn-info waves-effect waves-light"><i class="icofont icofont-pencil "></i></a> ';
                            if($data->user->status==Yii::$app->params['active']){
                                $html.='<a data-id="'.$data->user->id.'" href="'.Url::to(['default/suspend','id'=>$data->user->id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Suspend User"  class="btn btn-mini btn-primary waves-effect waves-light btn-suspend"><i class="icofont icofont-ui-lock "></i></a> ';
                            }elseif($data->user->status==Yii::$app->params['suspend']){
                                $html.='<a data-id="'.$data->user->id.'" href="'.Url::to(['default/activate','id'=>$data->user->id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Activate User" class="btn btn-mini btn-warning waves-effect waves-light btn-activate"><i class="icofont icofont-ui-unlock "></i></a> ';
                            }else{
                                $html.='';
                            }
                            $html.='<a href="#" data-id="'.$data->user->id.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete User" class="btn btn-mini btn-danger waves-effect waves-light btn-delete"><i class="icofont icofont-trash "></i></a> ';
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
$Filedeleteurl = Url::to(['default/delete-user']);
$Activateurl = Url::to(['default/activate-user']);
$Suspendurl = Url::to(['default/suspend-user']);
$script = <<< JS

$(document).ready(function(){
    $(document).on("click",".btn-delete",function(e){
        var id=$(this).data('id');
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this user!",
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
                            swal("Deleted!", "User has been deleted.", "success");
                        }else{
                            swal("Cancelled", "User is safe :)", "error");
                        }
                     }
                });

            } else {
                swal("Cancelled", "User is safe :)", "error");
            }
        });
    });
    $(document).on("click",".btn-activate",function(e){
        var id=$(this).data('id');
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this user!",
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
                     url: '$Activateurl',
                     data:{id:id},
                     dataType:'json',
                     success: function (response) {
                        if(response.status==1){
                            swal("Deleted!", "User has been deleted.", "success");
                        }else{
                            swal("Cancelled", "User is safe :)", "error");
                        }
                     }
                });

            } else {
                swal("Cancelled", "User is safe :)", "error");
            }
        });
    });
    $(document).on("click",".btn-suspend",function(e){
        var id=$(this).data('id');
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this user!",
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
                     url: '$Suspendurl',
                     data:{id:id},
                     dataType:'json',
                     success: function (response) {
                        if(response.status==1){
                            swal("Deleted!", "User has been deleted.", "success");
                        }else{
                            swal("Cancelled", "User is safe :)", "error");
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


