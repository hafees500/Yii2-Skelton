<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-10 19:00:19
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   header.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-12 23:50:50
 */
?>
<!-- <header class="main-header-top hidden-print">
    <a href="index.html" class="logo"><img class="img-fluid able-logo" src="<?= Yii::$app->request->baseUrl ?>/images/logo.png" alt="Theme-logo"></a>
    <nav class="navbar navbar-static-top">
        <a href="index.html#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
        <div class="navbar-custom-menu f-right">

            <ul class="top-nav">
                <li class="dropdown pc-rheader-submenu message-notification search-toggle">
                    <a href="index.html#!" id="morphsearch-search" class="drop icon-circle txt-white">
                    <i class="icofont icofont-search-alt-1"></i>
                    </a>
                </li>
                <li class="dropdown notification-menu">
                    <a href="#" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <i class="icon-bell"></i>
                    <span class="badge badge-danger header-badge">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="not-head">You have <b class="text-primary">1</b> new notifications.</li>
                        <li class="bell-notification">
                            <a href="javascript:;" class="media">
                                <span class="media-left media-icon">
                                <img class="img-circle" src="<?= Yii::$app->request->baseUrl ?>/images/avatar-1.png" alt="User Image">
                                </span>
                                <div class="media-body"><span class="block">Sample Notification</span><span class="text-muted block-time">2min ago</span></div>
                            </a>
                        </li>
                        <li class="not-footer">
                            <a href="#">See all notifications.</a>
                        </li>
                    </ul>
                </li>

                <li class="pc-rheader-submenu">
                    <a href="#" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                    <i class="icon-size-fullscreen"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                    <span><img class="img-circle " src="<?= (Yii::$app->user->identity->userDetails->ud_profile_pic != NULL) ? Yii::$app->request->baseUrl.Yii::$app->params['profileImagePathBig'].Yii::$app->user->identity->userDetails->ud_profile_pic  : Yii::$app->request->baseUrl.'/images/avatar-male.png' ;  ?>" style="width:40px;" alt="User Image"></span>
                    <span><b><?= Yii::$app->user->identity->username ?></b> <i class=" icofont icofont-simple-down"></i></span>
                    </a>
                    <ul class="dropdown-menu settings-menu">
                        <li><a href="<?=Yii::$app->urlManager->createUrl(['index/my-profile']);?>"><i class="icon-settings"></i> Settings</a></li>
                        <li><a href="<?=Yii::$app->urlManager->createUrl(['index/my-settings']);?>"><i class="icon-user"></i> Profile</a></li>
                        <li class="p-0">
                            <div class="dropdown-divider m-0"></div>
                        </li>
                        <li><a href="<?=Yii::$app->urlManager->createUrl(['site/logout']);?>"><i class="icon-logout"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <div id="morphsearch" class="morphsearch">
                <form class="morphsearch-form">
                    <input class="morphsearch-input" type="search" placeholder="Search..." />
                    <button class="morphsearch-submit" type="submit">Search</button>
                </form>
                <div class="morphsearch-content">
                    <div class="dummy-column">
                        <h2>People</h2>
                        <a class="dummy-media-object" href="index.html#!">
                            <img class="round" src="https://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan" />
                            <h3>Sara Soueidan</h3>
                        </a>
                        <a class="dummy-media-object" href="index.html#!">
                            <img class="round" src="https://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona" />
                            <h3>Shaun Dona</h3>
                        </a>
                    </div>
                    <div class="dummy-column">
                        <h2>Popular</h2>
                        <a class="dummy-media-object" href="index.html#!">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/avatar-1.png" alt="PagePreloadingEffect" />
                            <h3>Page Preloading Effect</h3>
                        </a>
                        <a class="dummy-media-object" href="index.html#!">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/avatar-1.png" alt="DraggableDualViewSlideshow" />
                            <h3>Draggable Dual-View Slideshow</h3>
                        </a>
                    </div>
                    <div class="dummy-column">
                        <h2>Recent</h2>
                        <a class="dummy-media-object" href="index.html#!">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/avatar-1.png" alt="TooltipStylesInspiration" />
                            <h3>Tooltip Styles Inspiration</h3>
                        </a>
                        <a class="dummy-media-object" href="index.html#!">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/avatar-1.png" alt="NotificationStyles" />
                            <h3>Notification Styles Inspiration</h3>
                        </a>
                    </div>
                </div>
                <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
            </div>
        </div>
    </nav>
</header> -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                    <!-- dark Logo text -->
                    <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                        href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i
                                class="ti-close"></i></a> </form>
                </li>
                <!-- ============================================================== -->

                <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="index.html"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="index.html#">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new
                                                admin!</span> <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="index.html#">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that
                                                you have event</span> <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="index.html#">
                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Settings</h5> <span class="mail-desc">You can customize this
                                                template as you want</span> <span class="time">9:08 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="index.html#">
                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all
                                        notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="index.html" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user"
                            class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                    <div class="u-text">
                                        <h4>Steave Jobs</h4>
                                        <p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View
                                            Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="index.html#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="index.html#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="index.html#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="index.html#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="index.html#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- Language -->
                <!-- ============================================================== -->
                
            </ul>
        </div>
    </nav>
</header>
