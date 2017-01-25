<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "enterprise".
 *
 * @property integer $id
 * @property string $name
 * @property string $rif
 * @property string $phone
 * @property string $address
 * @property string $founded_date
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enterprise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'rif', 'phone', 'founded_date'], 'required'],
            [['founded_date'], 'date', 'format' => 'yyyy-MM-dd'],
            [['name', 'rif', 'phone', 'address'], 'string', 'max' => 45],
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
            'rif' => Yii::t('backend', 'Rif'),
            'phone' => Yii::t('backend', 'Phone'),
            'address' => Yii::t('backend', 'Address'),
            'founded_date' => Yii::t('backend', 'Founded Date'),
        ];
    }
}
