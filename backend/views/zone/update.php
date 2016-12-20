<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Zone */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Zone',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Zones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="zone-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
