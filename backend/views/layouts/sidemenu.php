<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-10 19:01:35
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   sidemenu.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-14 16:31:25
 */
?>
<!-- <aside class="main-sidebar hidden-print ">
    <section class="sidebar" id="sidebar-scroll">
        <div class="user-panel">
            <div class="f-left image"><img src="<?= (Yii::$app->user->identity->userDetails->ud_profile_pic != NULL) ? Yii::$app->request->baseUrl.Yii::$app->params['profileImagePathBig'].Yii::$app->user->identity->userDetails->ud_profile_pic  : Yii::$app->request->baseUrl.'/images/avatar-male.png' ;  ?>" alt="User Image" class="img-circle"></div>
            <div class="f-left info">
                <p><?= Yii::$app->user->identity->username ?></p>
                <p class="designation"><?= Yii::$app->user->identity->email ?> <i class="icofont icofont-caret-down m-l-5"></i></p>
            </div>
        </div>
        <ul class="nav sidebar-menu extra-profile-list">
            <li>
                <a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['index/my-profile']);?>">
                <i class="icon-user"></i>
                <span class="menu-text">View Profile</span>
                <span class="selected"></span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['index/my-settings']);?>">
                <i class="icon-settings"></i>
                <span class="menu-text">Settings</span>
                <span class="selected"></span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['site/logout']);?>">
                <i class="icon-logout"></i>
                <span class="menu-text">Logout</span>
                <span class="selected"></span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="nav-level">Navigation</li>
            <li class="active treeview">
                <a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['index/index']);?>">
                <i class="icon-speedometer"></i><span> Dashboard</span>
                </a>
            </li>
            <li class="nav-level">Components</li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="#"><i class="icon-briefcase"></i><span> Menu 1</span><i class="icon-arrow-down"></i></a>
                <ul class="treeview-menu">
                    <li><a class="waves-effect waves-dark" href="#"><i class="icon-arrow-right"></i> Sub menu 1</a></li>
              </ul>
            </li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="#">
                <i class="icon-list"></i><span> Menu 2</span>
                </a>
            </li>
            <li class="nav-level">More</li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="javascript:void(0);"><i class="icofont icofont-users"></i><span>User Management</span><i class="icon-arrow-down"></i></a>
                <ul class="treeview-menu">
                    <li><a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['user']);?>"><i class="icon-arrow-right"></i> Users</a></li>
                    <li><a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['user-management/assignment']);?>"><i class="icon-arrow-right"></i> Assignment</a></li>
                    <li><a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['user-management/role']);?>"><i class="icon-arrow-right"></i> Roles</a></li>
                    <li><a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['user-management/permission']);?>"><i class="icon-arrow-right"></i> Permissions</a></li>
                    <li><a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['user-management/route']);?>"><i class="icon-arrow-right"></i> Routes</a></li>
                    <li></li>
                    <li class="treeview">
                        <a class="waves-effect waves-dark" href="javascript:void(0);"><i class="icon-arrow-right"></i> Menu Management</a>
                        <ul class="treeview-menu">
                            <li><a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['menu/']);?>"><i class="icon-arrow-right"></i> Menus</a></li>
                            <li><a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['menu/item']);?>"><i class="icon-arrow-right"></i> Menu Items</a></li>
                      </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['audit-trail']);?>">
                    <i class="icofont icofont-ui-search"></i><span> Audit Trail</span>
                </a>
            </li>

        </ul>
    </section>
</aside> -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url(../assets/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="../assets/images/users/profile.png" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="index.html#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                    role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe</a>
                <div class="dropdown-menu animated flipInY"> <a href="index.html#" class="dropdown-item"><i class="ti-user"></i>
                        My Profile</a> <a href="index.html#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <a href="index.html#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div> <a href="index.html#" class="dropdown-item"><i class="ti-settings"></i>
                        Account Setting</a>
                    <div class="dropdown-divider"></div> <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i>
                        Logout</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">Access Links</li>
                <li> <a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['index/index']);?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span
                            class="hide-menu">Dashboard </span></a>

                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-open"></i><span
                            class="hide-menu">Posts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?=Yii::$app->urlManager->createUrl(['post/add-new']);?>">Add Post</a></li>
                        <li><a href="<?=Yii::$app->urlManager->createUrl(['post/index']);?>">All Posts</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span
                            class="hide-menu">Pages</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Add Page</a></li>
                        <li><a href="#">All Pages</a></li>
                    </ul>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?=Yii::$app->urlManager->createUrl(['category/index']);?>" aria-expanded="false"><i class="mdi mdi-apps"></i><span
                            class="hide-menu">Categories </span></a>

                </li>
                <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-flag-outline-variant"></i><span
                            class="hide-menu">Tags </span></a>

                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span
                            class="hide-menu">Apps</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html">Calendar</a></li>
                        <li><a href="app-chat.html">Chat app</a></li>
                        <li><a href="app-ticket.html">Support Ticket</a></li>
                        <li><a href="app-contact.html">Contact / Employee</a></li>
                        <li><a href="app-contact2.html">Contact Grid</a></li>
                        <li><a href="app-contact-detail.html">Contact Detail</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-email"></i><span
                            class="hide-menu">Inbox</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Mailbox</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                            class="hide-menu">Ui Elements</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-user-card.html">User Cards</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-tab.html">Tab</a></li>
                        <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
                        <li><a href="ui-tooltip-stylish.html">Tooltip stylish</a></li>
                        <li><a href="ui-sweetalert.html">Sweet Alert</a></li>
                        <li><a href="ui-notification.html">Notification</a></li>
                        <li><a href="ui-progressbar.html">Progressbar</a></li>
                        <li><a href="ui-nestable.html">Nestable</a></li>
                        <li><a href="ui-range-slider.html">Range slider</a></li>
                        <li><a href="ui-timeline.html">Timeline</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
                        <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                        <li><a href="ui-session-ideal-timeout.html">Session Ideal Timeout</a></li>
                        <li><a href="ui-bootstrap.html">Bootstrap Ui</a></li>
                        <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                        <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
                        <li><a href="ui-list-media.html">List Media</a></li>
                        <li><a href="ui-ribbons.html">Ribbons</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-date-paginator.html">Date-paginator</a></li>
                        <li><a href="ui-dragable-portlet.html">Dragable Portlet</a></li>
                        <li><a href="ui-scrollspy.html">Scrollspy</a></li>
                        <li><a href="ui-toasts.html">Toasts</a></li>
                        <li><a href="ui-spinner.html">Spinner</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">FORMS, TABLE &amp; WIDGETS</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-file"></i><span
                            class="hide-menu">Forms</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="form-basic.html">Basic Forms</a></li>
                        <li><a href="form-layout.html">Form Layouts</a></li>
                        <li><a href="form-addons.html">Form Addons</a></li>
                        <li><a href="form-material.html">Form Material</a></li>
                        <li><a href="form-float-input.html">Floating Lable</a></li>
                        <li><a href="form-pickers.html">Form Pickers</a></li>
                        <li><a href="form-upload.html">File Upload</a></li>
                        <li><a href="form-mask.html">Form Mask</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-dropzone.html">File Dropzone</a></li>
                        <li><a href="form-icheck.html">Icheck control</a></li>
                        <li><a href="form-img-cropper.html">Image Cropper</a></li>
                        <li><a href="form-bootstrapwysihtml5.html">HTML5 Editor</a></li>
                        <li><a href="form-typehead.html">Form Typehead</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-xeditable.html">Xeditable Editor</a></li>
                        <li><a href="form-summernote.html">Summernote Editor</a></li>
                        <li><a href="form-tinymce.html">Tinymce Editor</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-table"></i><span
                            class="hide-menu">Tables</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="table-basic.html">Basic Tables</a></li>
                        <li><a href="table-layout.html">Table Layouts</a></li>
                        <li><a href="table-data-table.html">Data Tables</a></li>
                        <li><a href="table-footable.html">Footable</a></li>
                        <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                        <li><a href="table-responsive.html">Responsive Table</a></li>
                        <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
                        <li><a href="table-editable-table.html">Editable Table</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span
                            class="hide-menu">Widgets</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="widget-apps.html">Widget Apps</a></li>
                        <li><a href="widget-data.html">Widget Data</a></li>
                        <li><a href="widget-charts.html">Widget Charts</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">EXTRA COMPONENTS</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span
                            class="hide-menu">Page Layout</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="layout-single-column.html">1 Column</a></li>
                        <li><a href="layout-fix-header.html">Fix header</a></li>
                        <li><a href="layout-fix-sidebar.html">Fix sidebar</a></li>
                        <li><a href="layout-fix-header-sidebar.html">Fixe header &amp; Sidebar</a></li>
                        <li><a href="layout-boxed.html">Boxed Layout</a></li>
                        <li><a href="layout-logo-center.html">Logo in Center</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span
                            class="hide-menu">Sample Pages</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="starter-kit.html">Starter Kit</a></li>
                        <li><a href="pages-blank.html">Blank page</a></li>
                        <li><a href="index.html#" class="has-arrow">Authentication <span class="label label-rounded label-success">6</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages-login.html">Login 1</a></li>
                                <li><a href="pages-login-2.html">Login 2</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-register2.html">Register 2</a></li>
                                <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                                <li><a href="pages-recover-password.html">Recover password</a></li>
                            </ul>
                        </li>
                        <li><a href="pages-profile.html">Profile page</a></li>
                        <li><a href="pages-animation.html">Animation</a></li>
                        <li><a href="pages-fix-innersidebar.html">Sticky Left sidebar</a></li>
                        <li><a href="pages-fix-inner-right-sidebar.html">Sticky Right sidebar</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-treeview.html">Treeview</a></li>
                        <li><a href="pages-utility-classes.html">Helper Classes</a></li>
                        <li><a href="pages-search-result.html">Search result</a></li>
                        <li><a href="pages-scroll.html">Scrollbar</a></li>
                        <li><a href="pages-pricing.html">Pricing</a></li>
                        <li><a href="pages-lightbox-popup.html">Lighbox popup</a></li>
                        <li><a href="pages-gallery.html">Gallery</a></li>
                        <li><a href="pages-faq.html">Faqs</a></li>
                        <li><a href="index.html#" class="has-arrow">Error Pages</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages-error-400.html">400</a></li>
                                <li><a href="pages-error-403.html">403</a></li>
                                <li><a href="pages-error-404.html">404</a></li>
                                <li><a href="pages-error-500.html">500</a></li>
                                <li><a href="pages-error-503.html">503</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-file-chart"></i><span
                            class="hide-menu">Charts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="chart-morris.html">Morris Chart</a></li>
                        <li><a href="chart-chartist.html">Chartis Chart</a></li>
                        <li><a href="chart-echart.html">Echarts</a></li>
                        <li><a href="chart-flot.html">Flot Chart</a></li>
                        <li><a href="chart-knob.html">Knob Chart</a></li>
                        <li><a href="chart-chart-js.html">Chartjs</a></li>
                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                        <li><a href="chart-extra-chart.html">Extra chart</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-brush"></i><span
                            class="hide-menu">Icons</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-linea.html">Linea Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-simple-lineicon.html">Simple Lineicons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span
                            class="hide-menu">Maps</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="map-google.html">Google Maps</a></li>
                        <li><a href="map-vector.html">Vector Maps</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="index.html#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span
                            class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="index.html#">item 1.1</a></li>
                        <li><a href="index.html#">item 1.2</a></li>
                        <li> <a class="has-arrow" href="index.html#" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html#">item 1.3.1</a></li>
                                <li><a href="index.html#">item 1.3.2</a></li>
                                <li><a href="index.html#">item 1.3.3</a></li>
                                <li><a href="index.html#">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="index.html#">item 1.4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="index.html" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="index.html" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item--><a href="index.html" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
