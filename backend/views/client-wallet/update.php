<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClientWallet */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Client Wallet',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Client Wallets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="client-wallet-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
