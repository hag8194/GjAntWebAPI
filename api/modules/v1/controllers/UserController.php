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
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionLogin()
    {
        if(!empty($username = Yii::$app->request->getBodyParam('username')) &&
            !empty($password = Yii::$app->request->getBodyParam('password')))
        {
            $user = User::findByUsername($username);

            if ($user && $user->validatePassword($password))
                return $user;
            else
                throw new NotFoundHttpException(Yii::t('backend', 'Invalid username or password'));
        }
        throw new BadRequestHttpException('Missing Body Params');
    }
}