<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 17/01/2017
 * Time: 2:50 PM
 */

namespace api\modules\v1\controllers;


use yii\rest\ActiveController;

class ClientController extends ActiveController
{
    public $modelClass = 'common\models\Client';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create'], $actions['update'], $actions['delete'], $actions['index']);

        return $actions;
    }
}