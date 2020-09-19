<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-07-01 18:33:04
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   view.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-14 13:30:05
 */
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */

$this->title = $model->menu_title;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text"><?= $this->title; ?></h5>
                <div class="f-right">
                    <?= Html::a('Update', ['update-menu', 'id' => $model->menu_id], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="menu-view">
                     
                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'menu_title',
                                [                      // the owner name of the model
						            'label' => 'menu_type',
						            'value' => ucwords($model->menu_type),
						        ],
                                'menu_attr_class',
                                'menu_attr_id',
                                [                      // the owner name of the model
						            'label' => 'menu_status',
						            'format'=>'raw',
						            'value' => function($data){
						            	if($data->menu_status==Yii::$app->params['active']){
                                        return '<label class="label bg-success">Active</label>';
	                                    }elseif($data->menu_status==Yii::$app->params['suspend']){
	                                        return '<label class="label bg-warning">Suspended</label>';
	                                    }else{
	                                        return '<label class="label bg-danger">Deleted</label>';
	                                    }
						            }
						        ],
						        [                      // the owner name of the model
						            'label' => 'menu_created',
						            'value' => function($data){
						            	return date("d-m-Y H:i:s",$data->menu_created);
						            }
						        ],
						        [                      // the owner name of the model
						            'label' => 'menu_updated',
						            'value' => function($data){
						            	return date("d-m-Y H:i:s",$data->menu_updated);
						            }
						        ],
                            ],
                        ])
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>