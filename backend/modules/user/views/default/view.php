<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-11 14:58:16
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   view.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-11 15:15:40
 */
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card faq-left">
            <div class="social-profile">
                <img class="img-fluid" src="<?= Yii::$app->request->baseUrl ?>/images/social/profile.jpg" alt="">
                <div class="profile-hvr m-t-15">
                    <i class="icofont icofont-ui-edit p-r-10 c-pointer"></i>
                </div>
            </div>
            <div class="card-block">
                <h4 class="f-18 f-normal m-b-10 txt-primary"><?= $model->ud_profile_name ?></h4>
                <h5 class="f-14"><?= $model->ud_location ?></h5>
                <p class="m-b-15"><?= $model->ud_summary ?></p>
                <ul>
                    <li class="faq-contact-card">
                        <i class="icofont icofont-telephone"></i>
                        <?= ($model->ud_mobile != NULL ) ? $model->ud_mobile : 'Not Available' ; ?>
                    </li>
                    <li class="faq-contact-card">
                        <i class="icofont icofont-user"></i>
                        <?= $model->user->username ?>
                    </li>
                    <li class="faq-contact-card">
                        <i class="icofont icofont-email"></i>
                        <?= $model->user->email ?>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="tab-header">
            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="profile.html#personal" role="tab" aria-expanded="true">Personal Info</a>
                    <div class="slide"></div>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="personal" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">About </h5>
                        <a href="<?=Url::to(['default/update','id'=>$model->user->id]);?>"><button id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right">
                        <i class="icofont icofont-edit"></i>
                        </button></a>
                    </div>
                    <div class="card-block">
                        <div class="view-info" style="display: block;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-6">
                                                <table class="table m-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Profile Name</th>
                                                            <td><?= $model->ud_profile_name ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Gender</th>
                                                            <td><?= $model->ud_gender ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td><?= $model->user->email ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Username</th>
                                                            <td><?= $model->user->username ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Location</th>
                                                            <td><?= ($model->ud_location) ? $model->ud_location : 'Not Available' ; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Skype</th>
                                                            <td><?= ($model->ud_skype_id != NULL) ? $model->ud_skype_id : 'Not Available';  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Mobile Number</th>
                                                            <td><?= ($model->ud_mobile != NULL) ? $model->ud_mobile : 'Not Available';  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Role</th>
                                                            <td>$model->user->role</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Status</th>
                                                            <td><?= ($model->user->status == 10) ? '<label class="label bg-success">Active</label>' : '<label class="label bg-warning">Suspended</label>' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Created</th>
                                                            <td><?= date("d-m-Y H:i:s",$model->user->created_at); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>