<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $quantity
 * @property double $price
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property User $updatedBy
 * @property ProductBrand[] $productBrands
 * @property Brand[] $brands
 * @property ProductCategory[] $productCategories
 * @property Category[] $categories
 * @property ProductImage[] $productImages
 * @property RelatedArticles[] $relatedArticles
 * @property RelatedArticles[] $relatedArticles0
 * @property Product[] $children
 * @property Product[] $parents
 */
class Product extends \yii\db\ActiveRecord
{
    public static $STATUS_LABEL = ['No mostrar', 'Mostrar'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
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
            [['id', 'name', 'quantity', 'price', 'created_at', 'updated_at', 'updated_by'], 'required'],
            [['id', 'quantity', 'status', 'created_at', 'updated_at', 'updated_by'], 'integer'],
            [['price'], 'number'],
            [['code', 'name'], 'string', 'max' => 255],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'name' => Yii::t('backend', 'Name'),
            'quantity' => Yii::t('backend', 'Quantity'),
            'price' => Yii::t('backend', 'Price'),
            'status' => Yii::t('backend', 'Status'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductBrands()
    {
        return $this->hasMany(ProductBrand::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasMany(Brand::className(), ['id' => 'brand_id'])->viaTable('product_brand', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('product_category', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedArticles()
    {
        return $this->hasMany(RelatedArticles::className(), ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedArticles0()
    {
        return $this->hasMany(RelatedArticles::className(), ['child' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Product::className(), ['id' => 'child'])->viaTable('related_articles', ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(Product::className(), ['id' => 'parent'])->viaTable('related_articles', ['child' => 'id']);
    }
}
