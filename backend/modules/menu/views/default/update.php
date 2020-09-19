<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 22:07:50
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   update.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 22:19:40
 */
$this->title = 'Update Menu';
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
            	<?= $this->render('_form',['model'=>$model]) ?>
                
            </div>
        </div>
    </div>
</div>