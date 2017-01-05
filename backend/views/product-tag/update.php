<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductTag */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Product Tag',
]) . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Product Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'tag_id' => $model->tag_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="product-tag-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
