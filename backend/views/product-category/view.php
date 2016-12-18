<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategory */

$this->title = $model->product->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Product Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-view">

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'product_id' => $model->product_id, 'category_id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'product_id' => $model->product_id, 'category_id' => $model->category_id], [
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
            [
                'label' => Yii::t('backend', 'Product'),
                'value' => $model->product->name
            ],
            [
                'label' => Yii::t('backend', 'Category'),
                'value' => $model->category->name
            ]
        ],
    ]) ?>

</div>
