<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RelatedArticles */

$this->title = Yii::t('backend', 'Create Related Articles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Related Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="related-articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
