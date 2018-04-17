<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Enterprise */
/* @var $form ActiveForm */

$this->title = Yii::t('backend', 'Updating Enterprise Information');
$this->params['breadcrumbs'][] = Yii::t('backend', 'Enterprise');

?>

<div class="site-enterprise row">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'col-md-5']]); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'rif') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'founded_date') ?>
        <?= $form->field($model, 'address') ?>

    <div class="form-group">
            <?= Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-enterprise -->
