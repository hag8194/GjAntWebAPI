<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Linkable;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $quantity
 * @property double $price
 * @property double $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $brand_id
 *
 * @property OrderDetail[] $orderDetails
 * @property Order[] $orders
 * @property Brand $brand
 * @property User $updatedBy
 * @property ProductImage[] $productImages
 * @property ProductTag[] $productTags
 * @property Tag[] $tags
 * @property RelatedArticles[] $relatedArticles
 * @property RelatedArticles[] $relatedArticles0
 * @property Product[] $children
 * @property Product[] $parents
 */
class Product extends \yii\db\ActiveRecord implements Linkable
{
    const STATUS_NO_SHOW = 0;
    const STATUS_TO_SHOW = 1;

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
            [['name', 'quantity', 'price', 'updated_by', 'brand_id'], 'required'],
            [['quantity', 'status', 'created_at', 'updated_at', 'updated_by', 'brand_id'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['code', 'name'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
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
            'description' => Yii::t('backend', 'Description'),
            'status' => Yii::t('backend', 'Status'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'brand_id' => Yii::t('backend', 'Brand'),
            'productImages' => Yii::t('backend', 'Product Images'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])->viaTable('order_detail', ['product_id' => 'id']);
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
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
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('product_tag', ['product_id' => 'id']);
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

    public function getLinks()
    {
        $images = $this->productImages;
        $url = $images ? Url::to('GjAntWebAPI/backend/web' . $images[0]->path, true) : null;
        return [
            'poster' => $url
        ];
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['brand_id']);

        return ArrayHelper::merge($fields, [
            'brand'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return [
            'tags',
            'children',
            'productImages'
        ];
    }
}
