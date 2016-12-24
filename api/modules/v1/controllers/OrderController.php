<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 24/12/2016
 * Time: 12:51 PM
 */

namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class OrderController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\OrderAPI';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors =  parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }
}