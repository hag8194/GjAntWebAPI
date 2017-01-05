<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\ListView;

/* @var $employerSearchModel backend\models\EmployerListViewSearch */
/* @var $employerDataProvider yii\data\ActiveDataProvider */

?>

<div class="employer-list-view-search-form">
    <?php $form = ActiveForm::begin(['method' => 'get', 'layout' => 'inline']); ?>

    <?= $form->field($employerSearchModel, 'query', [
        'inputTemplate' => '<div class="input-group">{input}
                                <div class="input-group-btn">' . Html::submitButton('<i class="fa fa-search" ></i>', ['class' => 'btn btn-flat']) . '</div></div>'])
        ->textInput(['placeholder' => $employerSearchModel->getAttributeLabel('query')])
        ->label(false) ?>

    <?php ActiveForm::end(); ?>
</div>

<?= ListView::widget([
    'id' => 'employer-list-view',
    'dataProvider' => $employerDataProvider,
    'itemView' => '_employer'
])?>