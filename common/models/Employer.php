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
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $zone_id
 * @property integer $user_id
 * @property integer $address_id
 *
 * @property ClientWallet[] $clientWallets
 * @property Address $address
 * @property User $user
 * @property Zone $zone
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
            [['name', 'lastname', 'identification', 'zone_id', 'user_id', 'address_id'], 'required'],
            [['created_at', 'updated_at', 'zone_id', 'user_id', 'address_id'], 'integer'],
            [['name', 'lastname', 'identification'], 'string', 'max' => 255],
            [['identification'], 'unique'],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zone::className(), 'targetAttribute' => ['zone_id' => 'id']],
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
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'address_id' => Yii::t('backend', 'Address'),
            'user_id' => Yii::t('backend', 'User'),
            'zone_id' => Yii::t('backend', 'Zone')
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
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(Zone::className(), ['id' => 'zone_id']);
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['user_id'], $fields['address_id'], $fields['zone_id']);

        array_push($fields, 'address');
        array_push($fields, 'zone');

        return $fields;
    }
}
