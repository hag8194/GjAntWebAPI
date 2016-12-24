<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 24/12/2016
 * Time: 12:45 PM
 */

namespace api\modules\v1\models;

use common\models\Order;
use yii\helpers\ArrayHelper;

class OrderAPI extends Order
{
    /**
     * @inheritdoc
     */
    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [

        ]);
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