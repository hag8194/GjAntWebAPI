<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 27/11/2016
 * Time: 10:50 AM
 */

use voime\GoogleMaps\MapInput;

//use voime\GoogleMaps\Map;

/* @var $this yii\web\View */
/* @var $model backend\models\MapModel */
$this->params['breadcrumbs'][] = 'About';

$this->beginBlock('content-header');
$model->setAttributes(['latitude' => 10.1803, 'longitude' => -67.9377]); ?>

About <small>static page</small>
<?php $this->endBlock(); ?>

<div class="site-about">
    <p> This is the About page. You may modify the following file to customize its content: </p>
    <code><?= __FILE__ ?></code>

    <?php
    $form = \yii\widgets\ActiveForm::begin();

    echo $form->field($model, 'address')->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
        'attributeLatitude' => 'latitude',
        'attributeLongitude' => 'longitude',
        'googleMapApiKey' => Yii::$app->params['GOOGLE_API_KEY'],
    ]);

    \yii\widgets\ActiveForm::end();
    ?>
</div>