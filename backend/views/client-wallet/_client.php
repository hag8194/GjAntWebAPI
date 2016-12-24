<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 21/12/2016
 * Time: 11:53 AM
 */

use common\models\ClientWallet;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $key mixed */
/* @var $index integer */
/* @var $widget \yii\widgets\ListView */
/* @var $employer_id integer */

$avatar = $model->user->avatar;

$selected = ClientWallet::find()->where(['employer_id' => $employer_id, 'client_id' => $model->id])->exists();

?>
<div class="employer row" style="padding: 15px;">
    <div class="col col-md-3">
        <?= Html::img(!$avatar ? Yii::$app->urlManager->createAbsoluteUrl("img/default-avatar.gif") :
            Yii::$app->urlManager->createAbsoluteUrl($avatar), ['class' => 'img-circle img-responsive']) ?>
    </div>
    <div class="col col-md-7">
        <h4><?= Html::encode($model->fullname) ?></h4>
        <h5><?= Html::encode($model->address->name) ?></h5>
    </div>
    <div class="col col-md-1">
        <?= Html::checkbox('client-' . $model->id, $selected, ['class' => 'available-client',
            'id' => $model->id, 'employer_id' => $employer_id]) ?>
    </div>
</div>