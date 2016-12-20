<?php

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $model_address common\models\Address */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Client',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="client-update">

    <?= $this->render('_form', [
        'model' => $model,
        'model_address' => $model_address
    ]) ?>

</div>
