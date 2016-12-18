<?php

namespace api\modules\v1\controllers;

use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class BrandController extends ActiveController
{
    public $modelClass = 'common\models\Brand';

    public function behaviors()
    {
        $behaviors =  parent::behaviors();

        /*$behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className()
            ]
        ];*/

        $behaviors['basicAuth'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => function ($username, $password) {
                $user = User::findByUsername($username);
                if ($user && $user->validatePassword($password)) {
                    return $user;
                }
                return null;
            }
        ];

        return $behaviors;
    }
}


