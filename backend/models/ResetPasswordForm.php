<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-12 13:12:14
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   ResetPasswordForm.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-12 13:35:58
 */

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $old_password;
    public $new_password;
    public $repeat_password;

    /**
     * @var \common\models\User
     */
    private $_user;


    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['old_password','new_password','repeat_password'], 'required'],
            [['old_password','new_password','repeat_password'], 'string', 'min' => 6],
            [['old_password'], 'findPasswords'],
            ['repeat_password', 'compare', 'compareAttribute'=>'new_password'],
        ];
    }

    public function findPasswords($attribute, $params)
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        $validateOldPass = Yii::$app->security->validatePassword($this->old_password,$user->password_hash);
    
        if (!$validateOldPass){
            $this->addError($attribute, 'Old password is incorrect.');
        }
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        $user->setPassword($this->new_password);
        $user->removePasswordResetToken();

        return $user->save(false);
    }
}
