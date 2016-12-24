<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 24/12/2016
 * Time: 12:26 PM
 */

namespace api\modules\v1\models;

use common\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Linkable;

class ProductAPI extends Product implements Linkable
{
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