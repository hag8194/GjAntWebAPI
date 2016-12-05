<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_brand".
 *
 * @property integer $product_id
 * @property integer $brand_id
 *
 * @property Brand $brand
 * @property Product $product
 */
class ProductBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'brand_id'], 'required'],
            [['product_id', 'brand_id'], 'integer'],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('backend', 'Product ID'),
            'brand_id' => Yii::t('backend', 'Brand ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
