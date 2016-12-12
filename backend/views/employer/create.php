<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Employer */

$this->title = Yii::t('backend', 'Create Employer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Employers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
