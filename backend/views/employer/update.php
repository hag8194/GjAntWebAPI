<?php

/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $model common\models\Employer */
/* @var $model_address common\models\Address */
/* @var $model_user common\models\User */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Employer',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Employers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="employer-update">

    <?php $form = ActiveForm::begin([
            'id' => 'employer-update',
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#employer-form" data-toggle="tab" aria-expanded="true"><?= Yii::t('backend', 'Employer') ?></a>
            </li>
            <li>
                <a href="#user-form" data-toggle="tab" aria-expanded="true"><?= Yii::t('backend', 'User') ?></a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="employer-form" class="tab-pane active">
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
