<?php

use common\models\Order;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">
    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            [
                'attribute' => 'status',
                'value' => Order::STATUS_LABELS[$model->status]
            ],
            [
                'attribute' => 'description',
                'value' => $model->description ? : Yii::t('backend', 'Has no description')
            ],
            [
                'attribute' => 'type',
                'value' => Order::TYPE_LABELS[$model->type]
            ],
            [
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDateTime($model->created_at, 'full')
            ],
            [
                'attribute' => 'updated_at',
                'value' => Yii::$app->formatter->asDateTime($model->updated_at, 'full')
            ],
            [
                'label' => Yii::t('backend', 'Employer'),
                'value' => $model->clientWallet->employer->name . ' ' . $model->clientWallet->employer->lastname
            ],
            [
                'label' => Yii::t('backend', 'Client'),
                'value' => $model->clientWallet->client->fullname,
            ],
            [
                'label' => Yii::t('backend', 'Total'),
                'value' => $model->getOrderDetails()->joinWith('product')->sum('product.price * order_detail.quantity') . ' ' . Yii::t('backend', 'Bs')
            ]
        ],
    ]) ?>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Yii::t('backend', 'Order Detail') ?></h3>
            </div>
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    <?php foreach($model->orderDetails as $orderDetail): ?>
                        <li class="item">
                            <div class="product-img"><?= Html::img(Yii::$app->urlManager->createAbsoluteUrl($orderDetail->product->productImages[0]->path)) ?></div>
                            <div class="product-info">
                                <div class="product-title">
                                    <?= Html::a($orderDetail->product->name . '<span class="label label-warning pull-right">'.
                                        $orderDetail->quantity . ' UND x ' . $orderDetail->product->price .' Bs/UND = ' . $orderDetail->product->price * $orderDetail->quantity .' Bs</span>',
                                        Yii::$app->urlManager->createUrl(['/product/view', 'id' => $orderDetail->product->id])) ?>
                                </div>
                                <span class="product-description"><?= empty($orderDetail->product->description) ? Yii::t('backend', 'Has no description') : $orderDetail->product->description ?></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
