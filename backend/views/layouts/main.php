<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

if (class_exists('backend\assets\AppAsset') && class_exists('backend\assets\PluginsAssets')) {
    backend\assets\AppAsset::register($this);
    backend\assets\PluginsAssets::register($this);
}

dmstr\web\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

if($avatar = Yii::$app->user->identity->avatar)
    $avatar = Yii::$app->urlManager->createAbsoluteUrl($avatar);
else
    $avatar = Yii::$app->urlManager->createAbsoluteUrl("img/default-avatar.jpg");

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="fixed <?= \dmstr\helpers\AdminLteHelper::skinClass() ?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset, 'avatar' => $avatar]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset, 'avatar' => $avatar]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset, 'model_enterprise' => \common\models\Enterprise::findOne(1)]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>