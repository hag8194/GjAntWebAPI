<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 06/12/2016
 * Time: 5:37 PM
 */

namespace api\modules\v1\controllers;

use api\modules\v1\models\UserAPI;
use Yii;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;

class UserController extends Controller
{
    public function actionLogin()
    {
        if(!empty($username = Yii::$app->request->getBodyParam('username')) &&
            !empty($password = Yii::$app->request->getBodyParam('password')))
        {
            $user = UserAPI::findByUsername($username);

            if ($user && $user->validatePassword($password))
                return $user;
        }
        throw new BadRequestHttpException('Missing Body Params');
    }
}