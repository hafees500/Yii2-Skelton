<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-11 10:03:48
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   UserDetails.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-12 22:17:32
 */
namespace common\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "user_details".
 *
 * @property int $ud_id
 * @property int $ud_user_id
 * @property int $ud_gender 1 = Male,2 = Female, 3 = Other
 * @property string $ud_mobile
 * @property string $ud_location
 * @property string $ud_summary
 * @property string $ud_skype_id
 * @property string $ud_profile_name
 * @property string $ud_profile_pic
 * @property string $ud_role User Defined Roles
 * @property int $ud_status 10 = Active,0 = Deleted, 9 = Suspended
 * @property int $ud_created_at
 * @property int $ud_updated_at
 *
 * @property User $udUser
 */
class UserDetails extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_SUSPEND = 9;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_details';
    }


    public function behaviors()
    {
        return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'ud_created_at',
            'updatedAtAttribute' => 'ud_updated_at',
            'value' => new Expression('NOW()'),
        ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ud_user_id', 'ud_status'], 'required'],
            [['ud_user_id', 'ud_gender', 'ud_status', 'ud_created_at', 'ud_updated_at'], 'integer'],
            [['ud_summary'], 'string'],
            [['ud_mobile', 'ud_location', 'ud_skype_id', 'ud_profile_name', 'ud_profile_pic', 'ud_role'], 'string', 'max' => 255],
            [['ud_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ud_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ud_id' => 'ID',
            'ud_user_id' => 'User ID',
            'ud_gender' => 'Gender',
            'ud_mobile' => 'Mobile',
            'ud_location' => 'Location',
            'ud_summary' => 'Summary',
            'ud_skype_id' => 'Skype ID',
            'ud_profile_name' => 'Profile Name',
            'ud_profile_pic' => 'Profile Pic',
            'ud_role' => 'Role',
            'ud_status' => 'Status',
            'ud_created_at' => 'Created At',
            'ud_updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'ud_user_id']);
    }
}
