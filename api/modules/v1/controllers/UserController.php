<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 06/12/2016
 * Time: 5:37 PM
 */

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
}