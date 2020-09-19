<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-04-27 12:52:20
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   AppController.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-07-02 15:30:18
 */

namespace frontend\controllers;
use Yii; 
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use common\models\User;
use common\models\LoginForm;
use frontend\models\SignupForm;
use frontend\models\PasswordResetRequestForm;
use yii\filters\auth\HttpBearerAuth;
use yii\web\UploadedFile;
class AppController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['verbs'] = [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'index'  => ['post'],
                    'register'  => ['post'],
                    'authenticate'=>['post'],
                    'user'=>['get'],
                ],
        ];
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['authenticate','register','reset-password'],
        ];
        return $behaviors;
    }

    /**
     * Authenticate First User Using username and password.
     * @param string $username Username of a User.
     * @param string $password Password of a User.
     * @return ['status'=>1,'message'=>'Success User Exist','data'=>['username'=>'username','token'=>'token','email'=>'email','status'=>'status','role'=>'role']]
     */
    public function actionAuthenticate()
    {
        $model = new LoginForm();
        if(Yii::$app->request->post()){
            $postData=Yii::$app->request->post();
            if(empty($postData)){
                return ['status'=>0,'message'=>'Empty request','data'=>[]];
            }
            if(isset($postData['username']) && $postData['password']){
                $model->username=$postData['username'];
                $model->password=$postData['password'];
                if($model->login()){
                    $user=Yii::$app->user->identity;
                    return ['status'=>1,'message'=>'User loggined successfully','data'=>['username'=>$user->username,'token'=>$user->auth_key,'email'=>$user->email,'status'=>$user->status]];
                }else{
                    return ['status'=>0,'message'=>'Username or Password Is Invalid','data'=>[]];
                }
            }else{
                return ['status'=>0,'message'=>'Please Enter Username and Password ','data'=>[]];
            }
        }
    }

    /**
     * Get user details.
     * @param string $id id of a User.
     * @return ['status'=>1,'message'=>'Success User Exist','data'=>['username'=>'username','token'=>'token','email'=>'email','status'=>'status','role'=>'role']]
     */

    public function actionUser($id){
        $model=User::findOne($id);
        if(!empty($model)){
            return ['status'=>1,'message'=>'Data exist','data'=>$model];
        }else{
            return ['status'=>0,'message'=>'Data not exist','data'=>[]];
        }
    }

    /**
     * Register Used For Create a new user.
     * @param string $username Username of a User.
     * @param email $email Email of a User.
     * @param string $password Password of a User.
     * @return ['status'=>1,'message'=>'Success User Exist','data'=>['username'=>'username','token'=>'token','email'=>'email','status'=>'status','role'=>'role']]
     */
    public function actionRegister()
    {
        $model = new SignupForm();
        if (Yii::$app->request->post()) {
            $postData=Yii::$app->request->post();
            $model->username=$postData['username'];
            $model->password=$postData['password'];
            $model->email=$postData['email'];
            if($model->validate()){
                if ($user = $model->signup()) {
                    return ['status'=>1,'message'=>'User registered successfully','data'=>['username'=>$user->username,'token'=>$user->auth_key,'email'=>$user->email,'status'=>$user->status]
                  ];
                }else{
                    return ['status'=>0,'message'=>'Sorry the user cannot be register','data'=>[]];
                }
            }else{
                return ['status'=>0,'message'=>'Sorry the user does not exist','data'=>$model->errors];
            }
        }
    }

    /**
     * Register Used For Create a new user.
     * @param string $username Username of a User.
     * @param email $email Email of a User.
     * @param string $password Password of a User.
     * @return ['status'=>1,'message'=>'Success User Exist','data'=>['username'=>'username','token'=>'token','email'=>'email','status'=>'status','role'=>'role']]
     */

    public function actionResetPassword()
    {
        if (Yii::$app->request->post()) {
            $postData=Yii::$app->request->post();
            $model = new PasswordResetRequestForm();
            $model->email=$postData['email'];
            if ($model->validate()) {
                if ($model->sendEmail()) {
                    return ['status'=>1,'message'=>'Check your email for further instructions','data'=>[]];
                } else {
                    return ['status'=>0,'message'=>'Sorry, we are unable to reset password for the provided email address.','data'=>[]];
                }
            }else{
                return ['status'=>0,'message'=>'Sorry the user does not exist','data'=>$model->errors];
            }
        }
    }


    /**
     * Register Used For Create a new user.
     * @param string $username Username of a User.
     * @param email $email Email of a User.
     * @param string $password Password of a User.
     * @return ['status'=>1,'message'=>'Success User Exist','data'=>['username'=>'username','token'=>'token','email'=>'email','status'=>'status','role'=>'role']]
     */

    public function actionChangePassword()
    {
        if (Yii::$app->request->post()) {
            $postData=Yii::$app->request->post();
            $user =Yii::$app->user->identity;
            if (!$user->validatePassword($postData['oldpassword'])) {
                return ['status'=>0,'message'=>'Sorry Old Password Not Match','data'=>[]];
            }else{
                $user->setPassword($postData['newpassword']);
                if($user->save()){
                    return ['status'=>1,'message'=>'Password Changed Successfully','data'=>[]];
                }
            }
        }
    }
}
