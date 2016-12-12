<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductBrand */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Product Brand',
]) . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Product Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'brand_id' => $model->brand_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="product-brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
