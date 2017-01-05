<?php

/* @var $this yii\web\View */
/* @var $employerSearchModel backend\models\EmployerListViewSearch */
/* @var $employerDataProvider yii\data\ActiveDataProvider */
/* @var $clientSearchModel backend\models\EmployerListViewSearch */
/* @var $clientDataProvider yii\data\ActiveDataProvider */

?>

<div class="client-wallet-form">
    <div class="row">
        <div class="col col-md-5">
            <div class="box">
                <div class="box-header with-border">
                    <h2><?= Yii::t('backend', 'Employers') ?></h2>
                </div>
                <div class="box-body">
                    <?= $this->render('employer_listview', [
                        'employerSearchModel' => $employerSearchModel,
                        'employerDataProvider' => $employerDataProvider
                    ])?>
                </div>
            </div>
        </div>
        <div class="col col-md-5">
            <div class="box">
                <div class="box-header with-border">
                    <h2><?= Yii::t('backend', 'Available clients') ?></h2>
                </div>
                <div class="box-body">
                    <?= $this->render('client_listview', [
                        'clientSearchModel' => $clientSearchModel,
                        'clientDataProvider' => $clientDataProvider
                    ])?>
                </div>
            </div>
        </div>
    </div>
</div>
