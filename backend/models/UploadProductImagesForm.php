<?php
/**
 * Created by PhpStorm.
 * User: hag8194
 * Date: 05/12/2016
 * Time: 21:39
 */

namespace backend\models;

use backend\utils\ImageHandlerTrait;
use common\models\ProductImage;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadProductImagesForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles = [];

    use ImageHandlerTrait;

    /** Trait Implementation **/
    protected  function getIModel()
    {
        return $this;
    }

    protected  function getIAttributeName()
    {
        return 'imageFiles';
    }

    protected function getIAttribute()
    {
        return $this->imageFiles;
    }

    protected  function setIAttribute($attribute)
    {
        $this->imageFiles = $attribute;
    }

    public function saveUploadedImages($product_id)
    {
        if($paths = $this->uploadAll())
        {
            foreach ($paths as $path)
            {
                $model = new ProductImage();
                $model->setAttributes(['product_id' => $product_id, 'path' =>  $path]);

                if(!$model->save())
                    return false;
            }
            return true;
        }
        return false;
    }

    public function rules()
    {
        return [
            ['imageFiles', 'image', 'extensions' => 'png, jpg','maxFiles' => 6]
        ];
    }
}