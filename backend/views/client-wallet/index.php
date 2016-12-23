<?php

/* @var $this yii\web\View */
/* @var $employerSearchModel backend\models\EmployerListViewSearch */
/* @var $employerDataProvider yii\data\ActiveDataProvider */
/* @var $clientSearchModel backend\models\EmployerListViewSearch */
/* @var $clientDataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Client Wallet');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-wallet-index">

    <?= $this->render('_form', [
        'employerSearchModel' => $employerSearchModel,
        'employerDataProvider' => $employerDataProvider,
        'clientSearchModel' => $clientSearchModel,
        'clientDataProvider' => $clientDataProvider
    ]) ?>

</div>
