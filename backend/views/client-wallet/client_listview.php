<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\ListView;

/* @var $clientSearchModel backend\models\EmployerListViewSearch */
/* @var $clientDataProvider yii\data\ActiveDataProvider */
?>

<?php if($clientDataProvider): ?>

<div class="client-list-view-search-form">
    <?php $form = ActiveForm::begin(['method' => 'get', 'layout' => 'inline']); ?>

    <?= $form->field($clientSearchModel, 'query', [
        'inputTemplate' => '<div class="input-group">{input}
                                <div class="input-group-btn">' . Html::submitButton('<i class="fa fa-search" ></i>', ['class' => 'btn btn-flat']) . '</div></div>'])
        ->textInput(['placeholder' => $clientSearchModel->getAttributeLabel('query')])
        ->label(false) ?>

    <?php ActiveForm::end(); ?>
</div>

<?= ListView::widget([
    'dataProvider' => $clientDataProvider,
    'itemView' => '_client',
    'viewParams' => [
        'employer_id' => Yii::$app->request->getQueryParam('Employer')['id']
    ]
])?>

<?php else: ?>
    <h4><?= Yii::t('backend', 'Select an Employee') ?></h4>
<?php endif; ?>
