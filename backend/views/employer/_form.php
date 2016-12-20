<?php

use common\models\Zone;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Employer */
/* @var $model_address common\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zone_id')->dropDownList(ArrayHelper::map(Zone::find()->all(), 'id', 'name'),['prompt' => Yii::t('backend', 'Assign a Zone')]) ?>

    <?= $form->field($model_address, 'name', [
            'options' => [
                'class' => 'form-group box',
                'style' => 'padding:0px 15px 15px;'
            ],
            'template' => '<h3>Address</h3>{label}{input}'
        ])
        ->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
            'attributeLatitude' => 'lat',
            'attributeLongitude' => 'lng',
            'googleMapApiKey' => Yii::$app->params['GOOGLE_API_KEY']]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
