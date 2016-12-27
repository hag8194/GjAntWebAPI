<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_wallet".
 *
 * @property integer $id
 * @property integer $assigned
 * @property integer $employer_id
 * @property integer $client_id
 *
 * @property Client $client
 * @property Employer $employer
 * @property Order[] $orders
 */
class ClientWallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assigned', 'employer_id', 'client_id'], 'integer'],
            [['employer_id', 'client_id'], 'required'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employer::className(), 'targetAttribute' => ['employer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'assigned' => Yii::t('backend', 'Assigned'),
            'employer_id' => Yii::t('backend', 'Employer ID'),
            'client_id' => Yii::t('backend', 'Client ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Employer::className(), ['id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['client_wallet_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            'id',
            'client'
        ];
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return [

        ];
    }
}
