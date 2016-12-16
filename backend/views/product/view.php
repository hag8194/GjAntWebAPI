<?php

use common\models\Product;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $upload_image_model backend\models\UploadProductImagesForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#upload-img">Upload Image</button>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code',
            'name',
            'quantity',
            'price',
            [
              'attribute' => 'state',
              'value' => Product::$STATUS_LABEL[$model->status]
            ],
            [
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDateTime($model->created_at, 'full')
            ],
            [
                'attribute' => 'updated_at',
                'value' => Yii::$app->formatter->asDateTime($model->updated_at, 'full')
            ],
            [
                'attribute' => 'updated_by',
                'value' => $model->updatedBy->username
            ]
        ],
    ]) ?>

    <div>
        <?php
            if(!empty($model->productImages))
            {
                foreach ($model->productImages as $productImage)
                    echo Html::img(Yii::$app->urlManager->createAbsoluteUrl($productImage->path));
            }
            else
            {
                echo '
                <div class="panel panel-default">
                    <div class="panel-body">
                        El producto no tiene imagenes
                    </div>
                </div>';
            }
        ?>
    </div>

    <?php Modal::begin([
        'id' => 'upload-img',
        'header' => '<h2>' . Yii::t('backend', 'Upload Image') . '</h2>',
    ]) ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($upload_image_model, 'imageFiles[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true, 'accept' => 'image/*'],
        'pluginOptions' => [
            'previewFileType' => 'image',
            'initialPreviewAsData' => true,
        ]
    ]); ?>
    <?= Html::submitButton(Yii::t('backend','Save changes'), ['class' => 'btn btn-primary']) ?>
    <?php $form = ActiveForm::end() ?>
    <?php Modal::end(); ?>
</div>
