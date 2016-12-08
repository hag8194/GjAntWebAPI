<?php

use common\models\Product;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\searchmodels\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'name',
            'quantity',
            'price',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return Product::$STATUS_LABEL[$model->status];
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model){
                    return Yii::$app->formatter->asDatetime($model->created_at, 'short');
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function($model){
                    return Yii::$app->formatter->asDatetime($model->updated_at, 'short');
                }
            ],
            [
                'label' => 'Usuario',
                'value' => function($model){
                    return $model->updatedBy->username;
                },
                //'attribute' => 'updated_by'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
