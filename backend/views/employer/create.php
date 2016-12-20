<?php

/* @var $this yii\web\View */
/* @var $model common\models\Employer */
/* @var $model_address common\models\Address */

$this->title = Yii::t('backend', 'Create Employer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Employers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employer-create">

    <?= $this->render('_form', [
        'model' => $model,
        'model_address' => $model_address
    ]) ?>

</div>
