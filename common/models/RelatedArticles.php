<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "related_articles".
 *
 * @property integer $parent
 * @property integer $child
 *
 * @property Product $parent0
 * @property Product $child0
 */
class RelatedArticles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'related_articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'integer'],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['parent' => 'id']],
            [['child'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['child' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('backend', 'Parent Article'),
            'child' => Yii::t('backend', 'Child Article'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Product::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0()
    {
        return $this->hasOne(Product::className(), ['id' => 'child']);
    }
}
