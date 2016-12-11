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

                <?= $form->field($model, 'avatar')->widget('kartik\file\FileInput',[
                        'pluginOptions' => [
                            'overwriteInitial' => true,
                            'maxFileSize' => 1500,
                            'showClose' => false,
                            'showCaption' => false,
                            'browseLabel' => '',
                            'removeLabel' => '',
                            'browseIcon' => '<i class="glyphicon glyphicon-folder-open"></i>',
                            'removeIcon' => '<i class="glyphicon glyphicon-remove"></i>',
                            'removeTitle' => 'Cancel or reset changes',
                            'elErrorContainer' => '#kv-avatar-errors-1',
                            'msgErrorClass' => 'alert alert-block alert-danger',
                            'defaultPreviewContent' => '<img src="' . Yii::$app->urlManager->createAbsoluteUrl('img/default-avatar.gif') . '" alt="Your Avatar" style="width:160px">',
                            'layoutTemplates' => ['main2' => '{preview} {remove} {browse}'],
                            'allowedFileExtensions' => ["jpg", "png", "gif"]
                        ]
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('backend', 'Register'), ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
