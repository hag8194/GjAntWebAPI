<?php
/**
 * Created by PhpStorm.
 * User: hag8194
 * Date: 05/12/2016
 * Time: 21:39
 */

namespace backend\models;


use backend\utils\ImageHandler;
use common\models\ProductImage;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use yii\web\UploadedFile;

class UploadProductImagesForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles = [];

    public function rules()
    {
        return [
            [
                ['imageFiles'], 'image',
                'extensions' => 'png, jpg',
                'maxFiles' => 6,
                //'skipOnEmpty' => false
            ]];
    }

    /**
     * @var UploadedFile $file
     * @return True | False True if the file was stored successfully and saved in the DB
     */
    public function upload($id)
    {
        if ($this->validate())
        {
            foreach ($this->imageFiles as $file)
            {
                $model = new ProductImage();
                $path = 'img/' . ImageHandler::generateFileName() . '.' . $file->extension;
                $model->setAttributes(['product_id' => $id, 'path' =>  '/' . $path]);

                if(!$file->saveAs($path) || !$model->save()){
                    return false;
                }
                ImageHandler::resizeImage($path);
            }
            return true;
        }
        return false;
    }


}