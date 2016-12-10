<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('backend', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-header'); ?>
<?= $this->title ?> <small><?= Yii::t('backend', 'Please fill out the following fields to create a new user:') ?></small>
<?php $this->endBlock(); ?>

<div class="site-register">

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
                    'id' => 'form-register',
                    'options' => ['enctype' => 'multipart/form-data']
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'role')->dropDownList($model::$ROLE_DATA, ['prompt' => Yii::t('backend', 'Please select a role')]) ?>

                <?= $form->field($model, 'avatar')->widget('kartik\file\FileInput',[]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('backend', 'Register'), ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
