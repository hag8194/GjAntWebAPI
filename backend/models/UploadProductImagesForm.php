<?php
/**
 * Created by PhpStorm.
 * User: hag8194
 * Date: 05/12/2016
 * Time: 21:39
 */

namespace backend\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadProductImagesForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [
                ['imageFiles'], 'image',
                'extensions' => 'png, jpg',
                'minWidth' => 100, 'maxWidth' => 1000,
                'minHeight' => 100, 'maxHeight' => 1000,
                'maxFiles' => 2,
                'skipOnEmpty' => false
            ],

        ];
    }

    /**
     * @var UploadedFile $file
     */
    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        }
        return false;
    }
}