<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductTag */

$this->title = Yii::t('backend', 'Create Product Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Product Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-tag-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
