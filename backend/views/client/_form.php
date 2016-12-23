<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $model_address common\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php !empty($form) ? : $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_limit')->textInput() ?>

    <?= $form->field($model_address, 'name', [
        'options' => [
            'class' => 'form-group box box-primary'
        ],
        'template' => '<div class="box-header with-border">
                            <h3 class="box-title">Address</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                       </div>
                       <div class="box-body">
                            {label}{input}
                       </div>'
        ])
        ->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
            'attributeLatitude' => 'lat',
            'attributeLongitude' => 'lng',
            'googleMapApiKey' => Yii::$app->params['GOOGLE_API_KEY']]); ?>

    <?php if($form->id !== 'client-update'): ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php endif; ?>
</div>
