<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 17:41:17
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   ItemController.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 16:17:16
 */
namespace backend\modules\menu\controllers;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use backend\modules\menu\models\MenuManagement;
use backend\modules\menu\models\MenuItem;
use yii\helpers\ArrayHelper;
/**
 * Default controller for the `Menu` module
 */
class ItemController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        print_r(Yii::$app->basic->NavMenu());exit;

        $dataProvider = new ActiveDataProvider([
            'query' => MenuItem::find()->where(['NOT IN', 'menu_item_status', [Yii::$app->params['delete']]]),
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => ['defaultOrder' => ['menu_item_id' => SORT_DESC]],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate(){
    	$model=new MenuItem();
	 	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	 		$model->menu_item_created_user=Yii::$app->user->identity->id;
	 		$model->save();
            Yii::$app->session->setFlash('success', "Menu Created Successfully");
            return $this->redirect(['item/index']);
        }
    	return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete(){
        if (Yii::$app->request->post()) {
            $id=Yii::$app->request->post('id');
            $model=$this->findModel($id);
            $model->menu_status=Yii::$app->params['delete'];
            $model->save();
            Yii::$app->session->setFlash('success', "Menu Deleted Successfully");
            return $this->redirect(['item/index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id){
    	$model=$this->findModel($id);
	 	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	 		$model->save();
            Yii::$app->session->setFlash('success', "Menu Created Successfully");
            return $this->redirect(['item/index']);
        }
    	return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionView($id){
        $model=$this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionParentMenuList(){
	 	if (Yii::$app->request->post()) {
	 		$id=Yii::$app->request->post('id');
	 		$model=MenuItem::find()->where(['menu_item_home'=>$id,'menu_item_status'=>Yii::$app->params['active']])->all();
        	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        	if(!empty($model)){
        		return ['status'=>1,'data'=>ArrayHelper::map($model, 'menu_item_id', 'menu_item_title')];
        	}else{
        		return ['status'=>0,'data'=>[]];
        	}
        }
    }


    protected function findModel($id) {
        if (($model = MenuItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
