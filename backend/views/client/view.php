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
            'address',
            'phone1',
            'phone2',
            'credit_limit',
            'credit_use',
            'created_at:datetime',
            'updated_at:datetime',
            'user_id',
        ],
    ]) ?>

</div>
