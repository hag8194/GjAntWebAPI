<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zone".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property double $lat
 * @property double $lng
 *
 * @property Employer[] $employers
 * @property OrdersByZone[] $ordersByZone
 */
class Zone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lat', 'lng'], 'required'],
            [['description'], 'string'],
            [['lat', 'lng'], 'number'],
            [['name'], 'string', 'max' => 255],
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
            'description' => Yii::t('backend', 'Description'),
            'lat' => Yii::t('backend', 'Lat'),
            'lng' => Yii::t('backend', 'Lng'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployers()
    {
        return $this->hasMany(Employer::className(), ['zone_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersByZone()
    {
        return $this->hasMany(OrdersByZone::className(), ['zone_id' => 'id']);
    }
}
