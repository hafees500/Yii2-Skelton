<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-11 09:02:38
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   DefaultController.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 11:49:57
 */
namespace backend\modules\user\controllers;
use Yii;
use yii\web\Controller;
use backend\modules\user\models\UserDetails;
use backend\modules\user\models\SignupForm;
use yii\data\ActiveDataProvider;
use common\models\User;
use yii\web\UploadedFile;
use yii\imagine\Image;
/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserDetails::find()->joinWith('user')->where(['NOT IN', 'status', [Yii::$app->params['delete']]])->andWhere('id != :admin', [':admin' => Yii::$app->user->identity->id]),
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => ['defaultOrder' => ['ud_id' => SORT_DESC]],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionCreate()
    {
        
        $model=new SignupForm();
        $model->scenario = 'register';
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', "User Created Successfully");
            return $this->redirect(['default/index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        
        $model=$this->findUserDetails($id);
        $profile_pic=$model->ud_profile_pic;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $image = UploadedFile::getInstance($model, 'ud_profile_pic');
            if (!empty($image)) {
                $tmp = explode('.', $image->name);
                $ext = end($tmp);
                // generate a unique file name to prevent duplicate filenames
                $model->ud_profile_pic = Yii::$app->security->generateRandomString().".{$ext}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)                       
                $path = Yii::$app->basePath . '/web/uploads/profile/'.$model->ud_profile_pic;
                $image->saveAs($path);
                $thumbFilesmall = Yii::$app->basePath.'/web/uploads/profile-thumb/'.$model->ud_profile_pic;
                $thumbFilebig = Yii::$app->basePath.'/web/uploads/profile-thumb-big/'.$model->ud_profile_pic;
                Image::thumbnail($path, 128, 128,$mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET )->save($thumbFilesmall, ['quality' => 100]);
                Image::thumbnail($path, 350, 330,$mode = \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET )->save($thumbFilebig, ['quality' => 100]);
                if($profile_pic != ''){
                    if(file_exists(Yii::$app->basePath . '/web/uploads/profile/'.$profile_pic)){
                        unlink(Yii::$app->basePath . '/web/uploads/profile/'.$profile_pic);
                    }
                    if(file_exists(Yii::$app->basePath . '/web/uploads/profile-thumb/'.$profile_pic)){
                        unlink(Yii::$app->basePath . '/web/uploads/profile-thumb/'.$profile_pic);
                    }
                    if(file_exists(Yii::$app->basePath . '/web/uploads/profile-thumb-big/'.$profile_pic)){
                        unlink(Yii::$app->basePath . '/web/uploads/profile-thumb-big/'.$profile_pic);
                    }
                }
            }else{
               $model->ud_profile_pic=$profile_pic;
            }
            $model->save(false);
            Yii::$app->session->setFlash('success', "User Updated Successfully");
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDeleteUser()
    {
        if(Yii::$app->request->post()){
            $userModel=$this->findUser(Yii::$app->request->post('id'));
            $userModel->status=Yii::$app->params['delete'];
            $userModel->save(false);
            Yii::$app->session->setFlash('success', "User Deleted Successfully");
            return $this->redirect(['default/index']);
        }
    }

    public function actionSuspendUser()
    {
        if(Yii::$app->request->post()){
            $userModel=$this->findUser(Yii::$app->request->post('id'));
            $userModel->status=Yii::$app->params['suspend'];
            $userModel->save(false);
            Yii::$app->session->setFlash('success', "User Suspended Successfully");
            return $this->redirect(['default/index']);
        }
    }

    public function actionActivateUser()
    {
        if(Yii::$app->request->post()){
            $userModel=$this->findUser(Yii::$app->request->post('id'));
            $userModel->status=Yii::$app->params['active'];
            $userModel->save(false);
            Yii::$app->session->setFlash('success', "User Activate Successfully");
            return $this->redirect(['default/index']);
        }
    }

    public function actionView($id)
    {
        $model=$this->findUserDetails($id);
        return $this->render('view',['model'=>$model]);
    }

    /**
     * Finds the Cases model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cases the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUser($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findUserDetails($id) {
        if (($model = UserDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
