<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 10/12/2016
 * Time: 1:30 AM
 */

namespace backend\utils;


use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

class ImageHandler
{
    /**
     * @return String Random string
     */
    public static function generateFileName(){
        return Yii::$app->security->generateRandomString();
    }

    /**
     * @param String $path
     * @return void
     */
    public static function resizeImage($path){
        Image::thumbnail($path, 120, 120)->save($path, ['quality' => 100]);
    }
}