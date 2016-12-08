<?php

use common\models\Product;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
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

    <?php
        $aux = [];
        foreach ($model->productImages as $productImage)
            array_push($aux, Yii::$app->urlManager->createAbsoluteUrl($productImage->path));
    ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($upload_image_model, 'imageFiles[]')->widget(FileInput::classname(), [
            'options' => ['multiple' => true, 'accept' => 'image/*'],
            'pluginOptions' => [
                'previewFileType' => 'image',
                'initialPreview' => $aux,
                'initialPreviewAsData'=>true,
            ],
            /*'pluginEvents' => [
                'fileclear' => 'function() { alert("dsa1"); }'
            ]*/
        ]); ?>
    <?= Html::submitButton(Yii::t('backend','Save changes'), ['class' => 'btn btn-flat btn-block btn-primary']) ?>
    <?php $form = ActiveForm::end() ?>

</div>
