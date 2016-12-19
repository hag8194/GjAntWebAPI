<?php

namespace common\models;

use backend\utils\MapTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "employer".
 *
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $identification
 * @property string $address
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 *
 * @property ClientWallet[] $clientWallets
 * @property User $user
 */
class Employer extends \yii\db\ActiveRecord
{
    use MapTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employer';
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
    public function beforeSave($insert)
    {
        $user = User::findOne($this->user_id);
        $user->status = User::STATUS_ACTIVE;
        $user->save(false);
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'identification', 'address', 'user_id'], 'required'],
            [['created_at', 'updated_at', 'user_id'], 'integer'],
            [['name', 'lastname', 'identification', 'address'], 'string', 'max' => 255],
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
            'name' => Yii::t('backend', 'Name'),
            'lastname' => Yii::t('backend', 'Lastname'),
            'identification' => Yii::t('backend', 'Identification'),
            'address' => Yii::t('backend', 'Address'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'user_id' => Yii::t('backend', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientWallets()
    {
        return $this->hasMany(ClientWallet::className(), ['employer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
