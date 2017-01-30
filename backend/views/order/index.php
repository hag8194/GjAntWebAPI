<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchmodels\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a(Yii::t('backend', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'status',
            [
                'attribute' => 'type',
                'value' => function($model){
                    return \common\models\Order::TYPE_LABELS[$model->type];
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model){
                    return Yii::$app->formatter->asDatetime($model->created_at, 'short');
                }
            ],
            // 'updated_at',
            // 'client_wallet_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
