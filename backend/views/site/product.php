<?php
/* @var $model \common\models\Product */
/* @var $key mixed */
/* @var $index int */
/* @var $widget \yii\widgets\ListView */

use yii\bootstrap\Html;

?>
<?= Html::a(Html::img(Yii::$app->urlManager->createAbsoluteUrl($model->productImages[0]->path), ['width' => 80, 'height' => 80]) .
    "
    <div class='catalog-body'>
        <div>" . $model->name . "</div>
        <div>" . $model->price . " " . Yii::t('backend', 'Bs') . "</div>
    </div>
    ", Yii::$app->urlManager->createUrl(['/product/view', 'id' => $model->id]), ['class' => 'catalog-item row']) ?>
