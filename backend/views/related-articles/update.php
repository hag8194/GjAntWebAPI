<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelatedArticles */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Related Articles',
]) . $model->parent;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Related Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="related-articles-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
