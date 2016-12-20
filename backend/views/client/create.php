<?php

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $model_address common\models\Address */

$this->title = Yii::t('backend', 'Create Client');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-create">

    <?= $this->render('_form', [
        'model' => $model,
        'model_address' => $model_address
    ]) ?>

</div>
