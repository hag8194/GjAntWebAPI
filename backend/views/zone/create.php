<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Zone */

$this->title = Yii::t('backend', 'Create Zone');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Zones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
