<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 19:07:58
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   MenuAssignment.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 14:39:03
 */
namespace backend\modules\menu\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "menu_assignment".
 *
 * @property int $menu_assignment_id
 * @property string $menu_assignment_role
 * @property int $menu_assignment_type
 * @property int $menu_assignment_home
 * @property int $menu_assignment_status
 * @property int $menu_assignment_created
 * @property int $menu_assignment_updated
 * @property int $menu_assignment_created_user
 *
 * @property MenuManagement $menuAssignmentHome
 * @property User $menuAssignmentCreatedUser
 */
class MenuAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_assignment';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'menu_assignment_created',
                'updatedAtAttribute' => 'menu_assignment_updated',
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
            [[ 'menu_assignment_home','menu_assignment_role' ], 'required'],
            [[ 'menu_assignment_home', 'menu_assignment_status', 'menu_assignment_created', 'menu_assignment_updated', 'menu_assignment_created_user'], 'integer'],
            [['menu_assignment_type','menu_assignment_role'], 'string', 'max' => 255],
            [['menu_assignment_type','menu_assignment_role'], 'validateAssignment'],
            [['menu_assignment_home'], 'exist', 'skipOnError' => true, 'targetClass' => MenuManagement::className(), 'targetAttribute' => ['menu_assignment_home' => 'menu_id']],
            [['menu_assignment_created_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['menu_assignment_created_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'menu_assignment_id' => 'Assignment ID',
            'menu_assignment_role' => 'Assignment Role',
            'menu_assignment_type' => 'Assignment Type',
            'menu_assignment_home' => 'Assignment Menu',
            'menu_assignment_status' => 'Assignment Status',
            'menu_assignment_created' => 'Assignment Created',
            'menu_assignment_updated' => 'Assignment Updated',
            'menu_assignment_created_user' => 'Assignment Created User',
        ];
    }

    public function validateAssignment($attribute, $params)
    {
        $model=[];
        if(!empty($this->menu_assignment_type)){
            $model=MenuAssignment::find()->where(['menu_assignment_role'=>$this->menu_assignment_role,'menu_assignment_home'=>$this->menu_assignment_home,'menu_assignment_type'=>$this->menu_assignment_type])->one();
        }else{
            $model=MenuAssignment::findOne(['menu_assignment_role'=>$this->menu_assignment_role,'menu_assignment_home'=>$this->menu_assignment_home]);
        }
        if(!empty($model)){
            $this->addError($attribute, 'This menu already assigned');
        }
        // no real check at the moment to be sure that the error is triggered
        //$this->addError($attribute, Yii::t('user', 'You entered an invalid date format.'));
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuAssignmentHome()
    {
        return $this->hasOne(MenuManagement::className(), ['menu_id' => 'menu_assignment_home']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuAssignmentCreatedUser()
    {
        return $this->hasOne(User::className(), ['id' => 'menu_assignment_created_user']);
    }
}
