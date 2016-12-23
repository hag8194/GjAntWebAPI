<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model_user common\models\User */
/* @var $model_employer common\models\Employer */
/* @var $model_client common\models\Client */

$this->title = Yii::t('backend', 'Profile');
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $this->beginBlock('content-header'); ?>
<?= $this->title ?> <small><?= Yii::t('backend', 'Please fill out the following fields to create a new user:') ?></small>
<?php $this->endBlock(); ?>

<div class="row">
    <div class="col-md-5">
        <?= $this->render('_form', [
                'model' => $model_user
        ]) ?>
    </div>
    <div class="col-md-6">
        <?php
        if($model_employer)
        {
            echo $this->render('/employer/_form', [
                'model' => $model_employer,
                'model_address' => $model_employer->address
            ]);
        }
        else if($model_client)
        {
            echo $this->render('/client/_form', [
                'model' => $model_client
            ]);
        } ?>
    </div>
</div>


