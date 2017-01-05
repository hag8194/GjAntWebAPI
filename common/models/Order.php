<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $code
 * @property integer $status
 * @property string $description
 * @property integer $type
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $client_wallet_id
 *
 * @property ClientWallet $clientWallet
 * @property OrderDetail[] $orderDetails
 * @property Product[] $products
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'client_wallet_id'], 'required'],
            [['status', 'type', 'created_at', 'updated_at', 'client_wallet_id'], 'integer'],
            [['description'], 'string'],
            [['code'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['client_wallet_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientWallet::className(), 'targetAttribute' => ['client_wallet_id' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientWallet()
    {
        return $this->hasOne(ClientWallet::className(), ['id' => 'client_wallet_id']);
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
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('order_detail', ['order_id' => 'id']);
    }
}
