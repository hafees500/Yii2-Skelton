<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 19:04:03
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   MenuManagement.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 23:56:31
 */
namespace backend\modules\menu\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "menu_management".
 *
 * @property int $menu_id
 * @property string $menu_title
 * @property string $menu_type
 * @property string $menu_attr_class
 * @property string $menu_attr_id
 * @property int $menu_status
 * @property int $menu_created
 * @property int $menu_updated
 * @property int $menu_created_user
 *
 * @property MenuAssignment[] $menuAssignments
 * @property MenuItem[] $menuItems
 * @property User $menuCreatedUser
 */
class MenuManagement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_management';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'menu_created',
                'updatedAtAttribute' => 'menu_updated',
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
            [['menu_title', 'menu_type','menu_status'], 'required'],
            [['menu_status', 'menu_created', 'menu_updated', 'menu_created_user'], 'integer'],
            [['menu_title', 'menu_type', 'menu_attr_class', 'menu_attr_id'], 'string', 'max' => 255],
            [['menu_created_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['menu_created_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'menu_title' => 'Menu Title',
            'menu_type' => 'Menu Type',
            'menu_attr_class' => 'Menu Attr Class',
            'menu_attr_id' => 'Menu Attr ID',
            'menu_status' => 'Menu Status',
            'menu_created' => 'Menu Created',
            'menu_updated' => 'Menu Updated',
            'menu_created_user' => 'Menu Created User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuAssignments()
    {
        return $this->hasMany(MenuAssignment::className(), ['menu_assignment_home' => 'menu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItems()
    {
        return $this->hasMany(MenuItem::className(), ['menu_item_home' => 'menu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuCreatedUser()
    {
        return $this->hasOne(User::className(), ['id' => 'menu_created_user']);
    }
}
