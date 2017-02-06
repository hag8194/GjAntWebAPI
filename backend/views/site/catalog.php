<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel \common\models\searchmodels\CatalogSearch*/
/* @var $dataProvider \yii\data\ActiveDataProvider*/

$this->title = Yii::t('backend', 'Catalog');
$this->params['breadcrumbs'][] = Yii::t('backend', 'Catalog');

?>
<div class="row">
    <div class="col-md-5">
        <div class="catalog-list-view-search-form">
            <?php $form = ActiveForm::begin(['method' => 'get', 'layout' => 'inline']); ?>

            <?= $form->field($searchModel, 'query', [
                'inputTemplate' => '<div class="input-group">{input}
                                <div class="input-group-btn">' . Html::submitButton('<i class="fa fa-search" ></i>', ['class' => 'btn btn-flat btn-primary']) . '</div></div>'])
                ->textInput(['placeholder' => $searchModel->getAttributeLabel('query')])
                ->label(false) ?>

            <?php ActiveForm::end(); ?>
        </div>

        <?= ListView::widget([
            'id' => 'catalog-list-view',
            'dataProvider' => $dataProvider,
            'itemView' => 'product',
            'layout' => '{items}{pager}'
        ]) ?>
    </div>
    <div class="col-md-4">
        <h3><?= Yii::t('backend', 'Smart Search') ?></h3>
        <?php $form = ActiveForm::begin(['method' => 'get']); ?>

        <?= $form->field($searchModel, 'code')->textInput() ?>

        <?= $form->field($searchModel, 'quantity')->textInput() ?>

        <?= $form->field($searchModel, 'price')->input('number') ?>

        <?= $form->field($searchModel, 'min')->input("number") ?>

        <?= $form->field($searchModel, 'max')->input("number") ?>

        <?= Html::submitButton( Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>
