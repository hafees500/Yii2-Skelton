<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 19:07:44
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   MenuItem.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 16:08:15
 */
namespace backend\modules\menu\models;

use Yii; 
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "menu_item".
 *
 * @property int $menu_item_id
 * @property string $menu_item_title
 * @property int $menu_item_type 0 = UL,1 = OL
 * @property string $menu_item_link
 * @property int $menu_item_parent
 * @property int $menu_item_home
 * @property string $menu_item_attr_class
 * @property string $menu_item_attr_id
 * @property int $menu_item_status
 * @property int $menu_item_created
 * @property int $menu_item_updated
 * @property int $menu_item_created_user
 *
 * @property MenuManagement $menuItemHome
 * @property User $menuItemCreatedUser
 */
class MenuItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_item';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'menu_item_created',
                'updatedAtAttribute' => 'menu_item_updated',
               // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_item_title','menu_item_label','menu_item_status','menu_item_type'],'required'],
            ['menu_item_link', 'required', 'when' => function ($model) {
                return $model->menu_item_type == '1';
            }, 'whenClient' => "function (attribute, value) {
                return $('#menuitem-menu_item_type').val() == '1';
            }"],
            [['menu_item_type', 'menu_item_parent', 'menu_item_home', 'menu_item_status', 'menu_item_created', 'menu_item_updated', 'menu_item_created_user'], 'integer'],
            [['menu_item_title', 'menu_item_link', 'menu_item_attr_class', 'menu_item_attr_id','menu_item_label'], 'string', 'max' => 255],
            [['menu_item_home'], 'exist', 'skipOnError' => true, 'targetClass' => MenuManagement::className(), 'targetAttribute' => ['menu_item_home' => 'menu_id']],
            [['menu_item_created_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['menu_item_created_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'menu_item_id' => 'Item ID',
            'menu_item_title' => 'Item Title',
            'menu_item_type' => 'Item Type',
            'menu_item_link' => 'Item Link',
            'menu_item_parent' => 'Item Parent',
            'menu_item_home' => 'Item Home',
            'menu_item_attr_class' => 'Item Class',
            'menu_item_attr_id' => 'Item ID',
            'menu_item_status' => 'Item Status',
            'menu_item_created' => 'Item Created',
            'menu_item_updated' => 'Item Updated',
            'menu_item_created_user' => 'Item Created User',
            'menu_item_label'=>'Item Label',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItemHome()
    {
        return $this->hasOne(MenuManagement::className(), ['menu_id' => 'menu_item_home']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuParent()
    {
        return $this->hasOne(MenuItem::className(), ['menu_item_id' => 'menu_item_home']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItemCreatedUser()
    {
        return $this->hasOne(User::className(), ['id' => 'menu_item_created_user']);
    }
}
