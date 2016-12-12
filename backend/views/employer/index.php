<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\searchmodels\EmployerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Employers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employer-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a(Yii::t('backend', 'Create Employer'), ['create'], ['class' => 'btn btn-success']) ?>
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
                            $model->user->avatar : 'img/default-avatar.gif');
                    return Html::img($src, ['class' => 'img-circle', 'width' => 45]);
                },
                'format' => 'html'
            ],
            'name',
            'lastname',
            'identification',
            'address',
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
