<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 24/01/2017
 * Time: 9:54 PM
 */

namespace api\modules\v1\controllers;

use common\models\Enterprise;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\rest\Controller;

class EnterpriseController extends Controller
{
    protected function verbs()
    {
        return [
            'get-info' => ['GET']
        ];
    }

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

    public function actionGetInfo()
    {
        return Enterprise::findOne(1);
    }
}