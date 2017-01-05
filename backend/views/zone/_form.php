<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Zone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
        'attributeLatitude' => 'lat',
        'attributeLongitude' => 'lng',
        'googleMapApiKey' => Yii::$app->params['GOOGLE_API_KEY'],
    ]); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
