<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\searchmodels\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a(Yii::t('backend', 'Create Client'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'value' => function($model){
                    $src = Yii::$app->urlManager->createAbsoluteUrl(
                        !empty($model->user->avatar) ?
                            $model->user->avatar : 'img/default-avatar.jpg');
                    return Html::img($src, ['class' => 'img-circle', 'width' => 45]);
                },
                'format' => 'html'
            ],

            'fullname',
            'identification',
            'phone1',
             'created_at:datetime',
             'updated_at:datetime',
            // 'employer_id',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
