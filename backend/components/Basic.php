<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-12 22:21:47
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   Basic.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-16 14:49:58
 */

namespace backend\components;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use backend\modules\menu\models\MenuManagement;
use backend\modules\menu\models\MenuItem;
class Basic extends Component{
    public function GenderMapping($id){
        $gender=['1'=>'Male','2'=>'Female','3'=>'Other'];
        return $gender[$id];
    }
    public function MenuItemType($id){
        $menu=['1'=>'Link','2'=>'DropDown','0'=>'No Link','4'=>'Line'];
        return $menu[$id];
    }
    public function GetRolesList(){
        $roles = Yii::$app->db->createCommand('select * from auth_item where type=1')->queryAll();
        return ArrayHelper::map($roles, 'name', 'name');
    }

    public function GetMenuHome(){
        $roles = MenuManagement::find()->where(['NOT IN', 'menu_status', [Yii::$app->params['delete']]])->all();
        return ArrayHelper::map($roles, 'menu_id', 'menu_title');
    }
    public function NavMenu(){
        $menus=MenuItem::find()->where(['menu_item_status'=>10])->orderBy(['menu_item_parent'=>'ASC'])->all();
        $menusGeneratedParent=[];
        $menusGeneratedchild=[];
        foreach ($menus as $key => $menu) {
            $menusGeneratedParent[$menu->menu_item_id]=['menu_item_id'=>$menu['menu_item_id'],'menu_item_title'=>$menu['menu_item_title'],'menu_item_type'=>$menu['menu_item_type'],'menu_item_link'=>$menu['menu_item_link'],'menu_item_parent'=>$menu['menu_item_parent'],'menu_item_home'=>$menu['menu_item_home'],'menu_item_attr_class'=>$menu['menu_item_attr_class'],'menu_item_attr_id'=>$menu['menu_item_attr_id'],'menu_item_label'=>$menu['menu_item_label'],'menu_item_parent'=>$menu->menu_item_parent];

            // if($menu->menu_item_parent == NULL){
            //     $menusGeneratedParent[$menu->menu_item_id]=['menu_item_id'=>$menu['menu_item_id'],'menu_item_title'=>$menu['menu_item_title'],'menu_item_type'=>$menu['menu_item_type'],'menu_item_link'=>$menu['menu_item_link'],'menu_item_parent'=>$menu['menu_item_parent'],'menu_item_home'=>$menu['menu_item_home'],'menu_item_attr_class'=>$menu['menu_item_attr_class'],'menu_item_attr_id'=>$menu['menu_item_attr_id'],'menu_item_label'=>$menu['menu_item_label'],'menu_item_parent'=>$menu->menu_item_parent];
            // }else{
            //     $menusGeneratedchild[$menu->menu_item_id]=['menu_item_id'=>$menu['menu_item_id'],'menu_item_title'=>$menu['menu_item_title'],'menu_item_type'=>$menu['menu_item_type'],'menu_item_link'=>$menu['menu_item_link'],'menu_item_parent'=>$menu['menu_item_parent'],'menu_item_home'=>$menu['menu_item_home'],'menu_item_attr_class'=>$menu['menu_item_attr_class'],'menu_item_attr_id'=>$menu['menu_item_attr_id'],'menu_item_label'=>$menu['menu_item_label'],'menu_item_parent'=>$menu->menu_item_parent];
            // }
        }
        //print_r($menusGeneratedParent);
        $sort=arsort($menusGeneratedParent);
        //print_r($menusGeneratedParent);
        foreach ($menusGeneratedParent as $key => $menu) {
            if($menu['menu_item_parent'] != NULL){
                $menusGeneratedParent[$menu['menu_item_parent']]['childs'][$menu['menu_item_id']]=['menu_item_id'=>$menu['menu_item_id'],'menu_item_title'=>$menu['menu_item_title'],'menu_item_type'=>$menu['menu_item_type'],'menu_item_link'=>$menu['menu_item_link'],'menu_item_parent'=>$menu['menu_item_parent'],'menu_item_home'=>$menu['menu_item_home'],'menu_item_attr_class'=>$menu['menu_item_attr_class'],'menu_item_attr_id'=>$menu['menu_item_attr_id'],'menu_item_label'=>$menu['menu_item_label'],'menu_item_parent'=>$menu['menu_item_parent']];
                unset($menusGeneratedParent[$menu['menu_item_id']]);
            }
        }

        print_r($menusGeneratedParent);
        //print_r($menusGeneratedchild);
        exit;
        return $menusGenerated;
    }
    public function NavMenus(){
        $menus=MenuItem::find()->where(['menu_item_status'=>10])->all();
        $menusGeneratedParent=[];
        $menusGeneratedchild=[];
        foreach ($menus as $key => $menu) {
            if($menu->menu_item_parent == NULL){
                $menusGeneratedParent[$menu->menu_item_id]=['menu_item_id'=>$menu['menu_item_id'],'menu_item_title'=>$menu['menu_item_title'],'menu_item_type'=>$menu['menu_item_type'],'menu_item_link'=>$menu['menu_item_link'],'menu_item_parent'=>$menu['menu_item_parent'],'menu_item_home'=>$menu['menu_item_home'],'menu_item_attr_class'=>$menu['menu_item_attr_class'],'menu_item_attr_id'=>$menu['menu_item_attr_id'],'menu_item_label'=>$menu['menu_item_label'],'menu_item_parent'=>$menu->menu_item_parent];
            }else{
                $menusGeneratedchild[$menu->menu_item_id]=['menu_item_id'=>$menu['menu_item_id'],'menu_item_title'=>$menu['menu_item_title'],'menu_item_type'=>$menu['menu_item_type'],'menu_item_link'=>$menu['menu_item_link'],'menu_item_parent'=>$menu['menu_item_parent'],'menu_item_home'=>$menu['menu_item_home'],'menu_item_attr_class'=>$menu['menu_item_attr_class'],'menu_item_attr_id'=>$menu['menu_item_attr_id'],'menu_item_label'=>$menu['menu_item_label'],'menu_item_parent'=>$menu->menu_item_parent];
            }
        }
        foreach ($menusGeneratedchild as $key => $menu) {
        if(!array_key_exists($menu['menu_item_parent'], $menusGeneratedParent)){
            if($menusGeneratedchild[$menu['menu_item_parent']]['menu_item_parent']){
                if($menu['menu_item_parent']!=NULL){
                    $menusGeneratedParent[$menusGeneratedchild[$menu['menu_item_parent']]['menu_item_parent']]['childs'][$menu['menu_item_parent']]['childs']=$menu;
                }else{

                }
            }
        }else{
            $menusGeneratedParent[$menu['menu_item_parent']]['childs'][$menu['menu_item_id']]=$menu;
        }
            
        }
        print_r($menusGeneratedParent);
        //print_r($menusGeneratedchild);
        exit;
        return $menusGenerated;
    }
} 
