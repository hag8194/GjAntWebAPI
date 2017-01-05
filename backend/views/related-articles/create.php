<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RelatedArticles */

$this->title = Yii::t('backend', 'Create Related Articles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Related Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="related-articles-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
