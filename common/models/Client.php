<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $identification
 * @property string $address
 * @property string $phone1
 * @property string $phone2
 * @property double $credit_limit
 * @property double $credit_use
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 *
 * @property User $user
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'identification', 'address', 'phone1', 'user_id'], 'required'],
            [['credit_limit', 'credit_use'], 'number'],
            [['created_at', 'updated_at', 'user_id'], 'integer'],
            [['fullname', 'address'], 'string', 'max' => 255],
            [['identification', 'phone1', 'phone2'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'fullname' => Yii::t('backend', 'Fullname'),
            'identification' => Yii::t('backend', 'Identification'),
            'address' => Yii::t('backend', 'Address'),
            'phone1' => Yii::t('backend', 'Phone1'),
            'phone2' => Yii::t('backend', 'Phone2'),
            'credit_limit' => Yii::t('backend', 'Credit Limit'),
            'credit_use' => Yii::t('backend', 'Credit Use'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'user_id' => Yii::t('backend', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
