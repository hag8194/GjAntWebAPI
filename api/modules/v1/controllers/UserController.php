<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 06/12/2016
 * Time: 5:37 PM
 */

namespace api\modules\v1\controllers;


use common\models\User;
use Yii;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actions(){}

    public function actionLogin()
    {
        if(!empty($username = Yii::$app->request->getBodyParam('username')) &&
            !empty($password = Yii::$app->request->getBodyParam('password')))
        {
            $user = User::findByUsername($username);

            if ($user && $user->validatePassword($password))
                return $user;
        }
        throw new BadRequestHttpException('Missing Body Params');
    }
}