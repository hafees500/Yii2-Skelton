<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-07-01 18:39:26
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   Request.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-12 22:23:49
 */

namespace common\components;




class Request extends \yii\web\Request {
    public $web;
    public $adminUrl;


    public function getBaseUrl(){
        return str_replace($this->web, "", parent::getBaseUrl()) . $this->adminUrl;
    }


    /*
        If you don't have this function, the admin site will 404 if you leave off
        the trailing slash.


        E.g.:


        Wouldn't work:
        site.com/admin


        Would work:
        site.com/admin/


        Using this function, both will work.
    */
    public function resolvePathInfo(){
        if($this->getUrl() === $this->adminUrl){
            return "";
        }else{
            return parent::resolvePathInfo();
        }
    }
} 
