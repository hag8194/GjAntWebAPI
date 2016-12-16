<?php
/**
 * Created by PhpStorm.
 * User: hag8194
 * Date: 05/12/2016
 * Time: 21:39
 */

namespace backend\models;


use backend\utils\ImageHandler;
use backend\utils\ImageHandlerTrait;
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
}