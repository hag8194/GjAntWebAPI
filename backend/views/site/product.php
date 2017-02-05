<?php
/* @var $model \common\models\Product */
/* @var $key mixed */
/* @var $index int */
/* @var $widget \yii\widgets\ListView */

use yii\bootstrap\Html;

?>

<div class="catalog-item row">
    <?= Html::img(Yii::$app->urlManager->createAbsoluteUrl($model->productImages[0]->path), ['width' => 80, 'height' => 80]) ?>
    <div class="catalog-body">
        <div><?= $model->name ?></div>
        <div><?= $model->price ?></div>
    </div>
</div>

