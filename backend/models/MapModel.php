<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 04/12/2016
 * Time: 11:44 AM
 */

namespace backend\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;

class MapModel extends Model
{
    public $coordinates;

    public function rules()
    {
        return [
            [['coordinates'], 'safe']
        ];
    }

}