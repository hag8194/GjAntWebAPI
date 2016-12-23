<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 21/12/2016
 * Time: 11:53 AM
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Employer */
/* @var $key mixed */
/* @var $index integer */
/* @var $widget \yii\widgets\ListView */

$avatar = $model->user->avatar;

?>
<div class="employer row" style="padding: 15px;">
    <div class="col col-md-3">
        <?= Html::img(!$avatar ? Yii::$app->urlManager->createAbsoluteUrl("img/default-avatar.gif") :
            Yii::$app->urlManager->createAbsoluteUrl($avatar), ['class' => 'img-circle img-responsive']) ?>
    </div>
    <div class="col col-md-7">
        <h4><?= Html::encode($model->name . ' ' . $model->lastname) ?></h4>
        <h5><?= Html::encode($model->identification) ?></h5>
    </div>
    <div class="col col-md-1">
        <?php $form = ActiveForm::begin(['id' => 'employer-' . $index, 'method' => 'get']); ?>

        <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

        <?= Html::submitButton('<i class="fa fa-arrow-right"></i>', ['class' => 'btn btn-flat bg-olive']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>