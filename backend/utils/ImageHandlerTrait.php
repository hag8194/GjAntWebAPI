<?php
/**
 * Created by PhpStorm.
 * User: hag8194
 * Date: 12/12/2016
 * Time: 19:54
 */

namespace backend\utils;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

trait ImageHandlerTrait
{
    /*
     * @return \yii\db\ActiveRecord | \yii\base\Model
     */
    protected abstract function getIModel();

    /*
     *  @param yii\web\UploadedFile $attribute
     */
    protected abstract function setIAttribute($attribute);

    /*
     *  @return yii\web\UploadedFile
     */
    protected abstract function getIAttribute();

    /*
     *  @return String
     */
    protected abstract function getIAttributeName();

    /*
     * Upload image to the server and return the path
     *
     * @return String | null
     */
    public function upload($resize = true)
    {
        $this->setIAttribute(UploadedFile::getInstance($this->getIModel(), $this->getIAttributeName()));
        if($this->getIAttribute())
        {
            $path = 'img/' . $this->generateFileName() . '.' . $this->getIAttribute()->extension;

            if($this->getIAttribute()->saveAs($path))
            {
                $resize ? $this->resizeImage($path) : null;
                return $path;
            }
            return null;
        }
        return null;
    }

    /*
     * Upload all images to the server and return the paths
     *
     * @return String | null
     */
    public function uploadAll($resize = true)
    {
        $this->setIAttribute(UploadedFile::getInstances($this->getIModel(), $this->getIAttributeName()));
        if($this->getIAttribute())
        {
            $paths = [];
            foreach ($this->getIAttribute() as $attribute)
            {
                $path = 'img/' . $this->generateFileName() . '.' . $attribute->extension;
                if($attribute->saveAs($path))
                {
                    $resize ? $this->resizeImage($path) : null;
                    array_push($paths, $path) ;
                }
                return $paths;
            }
        }
        return null;
    }

    /**
     * @return String Random string
     */
    public static function generateFileName() {
        return Yii::$app->security->generateRandomString();
    }

    /**
     * @param String $path
     * @return void
     */
    public static function resizeImage($path, $width = 120, $height = 120, $quality = 100) {
        Image::thumbnail($path, $width, $height)->save($path, ['quality' => $quality]);
    }
}