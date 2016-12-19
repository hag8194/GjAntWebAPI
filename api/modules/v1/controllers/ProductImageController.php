<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 18/12/2016
 * Time: 10:38 PM
 */

namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class ProductImageController extends ActiveController
{
    public $modelClass = 'common\models\ProductImage';

    public function behaviors()
    {
        $behaviors =  parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }
}