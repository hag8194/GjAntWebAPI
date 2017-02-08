<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders_by_zone".
 *
 * @property integer $id
 * @property string $code
 * @property integer $status
 * @property string $description
 * @property integer $type
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $client_wallet_id
 * @property string $zone_name
 *
 * @property OrderDetail[] $orderDetails
 * @property Order $order
 */
class OrdersByZone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_by_zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'type', 'created_at', 'updated_at', 'client_wallet_id'], 'integer'],
            [['code', 'client_wallet_id'], 'required'],
            [['description'], 'string'],
            [['code', 'zone_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'code' => Yii::t('backend', 'Code'),
            'status' => Yii::t('backend', 'Status'),
            'description' => Yii::t('backend', 'Description'),
            'type' => Yii::t('backend', 'Type'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'client_wallet_id' => Yii::t('backend', 'Client Wallet ID'),
            'zone_name' => Yii::t('backend', 'Zone Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getZone()
    {
        return $this->hasMany(Zone::className(), ['id' => 'order_id'])->viaTable('order_detail', ['order_id' => 'id']);
    }*/

}
