<?php

use common\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RelatedArticles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="related-articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'child')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'))  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
