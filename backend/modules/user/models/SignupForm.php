<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-06-22 17:12:39
 * @Email:   hafees@ndimensionz.com
 * @Project:   cft
 * @Filename:   SignupForm.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 11:23:56
 */

namespace backend\modules\user\models;

use yii\base\Model;
use common\models\User;
use backend\modules\user\models\UserDetails;
use yii\rbac\DbManager;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $gender;
    public $mobile;
    public $location;
    public $summary;
    public $skype;
    public $profile_name;
    public $profile_pic;
    public $role;
    public $status;


    public function behaviors()
    {
        return [
            'bedezign\yii2\audit\AuditTrailBehavior'
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required', 'on' => 'register'],
            ['password', 'string', 'min' => 6],

            [['profile_name','status'], 'required'],
            [['gender','status'],'integer'],
            [['mobile',],'number'],
            [['location','summary','skype','profile_name','profile_pic','role'],'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $userDetails = new UserDetails();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $userDetails->ud_gender=$this->gender;
        $userDetails->ud_mobile=$this->mobile;
        $userDetails->ud_location=$this->location;
        $userDetails->ud_summary=$this->summary;
        $userDetails->ud_skype_id=$this->skype;
        $userDetails->ud_profile_name=$this->profile_name;
        $userDetails->ud_profile_pic=$this->profile_pic;
        $userDetails->ud_role=$this->role;
        $userDetails->ud_status=$this->status;
        if($user->save()){
            $userDetails->ud_user_id=$user->id;
            $userDetails->save();
            if(!empty($this->role)){
                $auth = new DbManager;
                $auth->init();
                $role = $auth->getRole($this->role);
                $auth->assign($role, $user->id);
                $user->role = $this->role;
                $user->save(false);
            }
            
        }
        return $user->save() ? $user : null;
    }
}
