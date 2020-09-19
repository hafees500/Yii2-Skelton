<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 17:41:17
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   DefaultController.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 15:49:46
 */
namespace backend\modules\menu\controllers;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use backend\modules\menu\models\MenuManagement;
use backend\modules\menu\models\MenuAssignment;
use yii\widgets\ActiveForm;
/**
 * Default controller for the `Menu` module
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
            'query' => MenuManagement::find()->where(['NOT IN', 'menu_status', [Yii::$app->params['delete']]]),
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => ['defaultOrder' => ['menu_id' => SORT_DESC]],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateMenu(){
    	$model=new MenuManagement();
	 	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	 		$model->menu_created_user=Yii::$app->user->identity->id;
	 		$model->save();
            Yii::$app->session->setFlash('success', "Menu Created Successfully");
            return $this->redirect(['default/index']);
        }
    	return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDeleteMenu(){
        if (Yii::$app->request->post()) {
            $id=Yii::$app->request->post('id');
            $model=$this->findModel($id);
            $model->menu_status=Yii::$app->params['delete'];
            $model->save();
            Yii::$app->session->setFlash('success', "Menu Deleted Successfully");
            return $this->redirect(['default/index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdateMenu($id){
    	$model=$this->findModel($id);
	 	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	 		$model->save();
            Yii::$app->session->setFlash('success', "Menu Created Successfully");
            return $this->redirect(['default/index']);
        }
    	return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionViewMenu($id){
        $model=$this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    protected function findModel($id) {
        if (($model = MenuManagement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAssignmentMenu($id){
        $model=new MenuAssignment();
        $dataProvider = new ActiveDataProvider([
            'query' => MenuAssignment::find()->where(['NOT IN', 'menu_assignment_status', [Yii::$app->params['delete']]]),
            'pagination' => [
                'pageSize' => 15,
            ],
            //'sort' => ['defaultOrder' => ['menu_id' => SORT_DESC]],
        ]);
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                $model->menu_assignment_created_user=Yii::$app->user->identity->id;
                $model->save();
                Yii::$app->session->setFlash('success', "Menu Assigned Successfully");
                return $this->redirect(['default/index']);
            }else{
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['status' => Yii::$app->params['delete'], 'message' => ActiveForm::validate($model)];
            }
        }
        return $this->renderAjax('_assignmenu',['model'=>$model,'dataProvider'=>$dataProvider]);
    }

    public function actionDeleteAssignmentMenu(){
        if (Yii::$app->request->post('id')) {
            $id=Yii::$app->request->post('id');
            $model=MenuAssignment::findOne($id);
            $model->delete(false);
            Yii::$app->session->setFlash('success', "Menu delete Successfully");
            return $this->redirect(['default/index']);
        }
    }


}
