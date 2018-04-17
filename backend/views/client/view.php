<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Client */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-view">

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullname',
            'identification',
            'phone1',
            [
                'label' => $model->getAttributeLabel('phone2'),
                'value' => !$model->phone2 ? Yii::t('backend', 'Don´t has second phone') : $model->phone2
            ],
            'credit_limit',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'label' => $model->getAttributeLabel('address_id'),
                'value' => $model->address->name
            ],
            'user.username',

        ],
    ]) ?>

</div>
