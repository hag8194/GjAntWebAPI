<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductTag */

$this->title = Yii::t('backend', 'Assigned detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Product Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-tag-view">

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'product_id' => $model->product_id, 'tag_id' => $model->tag_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'product_id' => $model->product_id, 'tag_id' => $model->tag_id], [
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
                'label' => $model->getAttributeLabel('product_id'),
                'value' => $model->product->name
            ],
            [
                'label' => $model->getAttributeLabel('tag_id'),
                'value' => $model->tag->name
            ]
        ],
    ]) ?>

</div>
