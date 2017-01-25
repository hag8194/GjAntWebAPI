<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 24/12/2016
 * Time: 12:51 PM
 */

namespace api\modules\v1\controllers;

use common\models\ClientWallet;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class ClientWalletController extends ActiveController
{
    public $modelClass = 'common\models\ClientWallet';

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

    public function actionSearch($employer_id)
    {
       return ClientWallet::findAll(['employer_id' => $employer_id]);
    }
}