<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Employer */
/* @var $model_address common\models\Address */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Employer',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Employers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="employer-update">

    <?= $this->render('_form', [
        'model' => $model,
        'model_address' => $model_address
    ]) ?>

</div>
