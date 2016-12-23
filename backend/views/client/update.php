<?php

/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $model common\models\Client */
/* @var $model_address common\models\Address */
/* @var $model_user common\models\User */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Client',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="client-update">

    <?php $form = ActiveForm::begin([
        'id' => 'client-update',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#client-form" data-toggle="tab" aria-expanded="true"><?= Yii::t('backend', 'Client') ?></a>
            </li>
            <li>
                <a href="#user-form" data-toggle="tab" aria-expanded="true"><?= Yii::t('backend', 'User') ?></a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="client-form" class="tab-pane active">
                <?= $this->render('_form', [
                    'model' => $model,
                    'model_address' => $model_address,
                    'form' => $form
                ]) ?>
            </div>
            <div id="user-form" class="tab-pane">
                <?= $this->render('/site/_form', [
                    'model' => $model_user,
                    'form' => $form
                ]) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
