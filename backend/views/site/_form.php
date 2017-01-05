<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\models\User */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php !empty($form) ? : $form = ActiveForm::begin([
    'id' => 'form-profile',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<?= $form->field($model, 'username')->textInput(['disabled' => 'disabled']) ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<?= $form->field($model, 'repeat_password')->passwordInput() ?>

<?= $form->field($model, '_avatar')->widget('kartik\file\FileInput',[]) ?>

<?php if($form->id !== 'employer-update' && $form->id !== 'client-update'): ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('backend', $model->isNewRecord ? 'Register' : 'Update'), ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php endif; ?>