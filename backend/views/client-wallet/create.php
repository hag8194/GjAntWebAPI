<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ClientWallet */

$this->title = Yii::t('backend', 'Create Client Wallet');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Client Wallets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-wallet-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
