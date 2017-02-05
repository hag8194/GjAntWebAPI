<?php

use common\models\Order;
use common\models\Product;
use miloschuman\highcharts\Highcharts;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $report \backend\utils\Report */
/* @var $orders Order[] */
/* @var $products Product[] */

$this->title = Yii::t('backend', 'Dashboard');

$orders = Order::find()->orderBy('created_at DESC')->limit(10)->all();
$products = Product::find()->where(['status' => Product::STATUS_TO_SHOW])->orderBy('created_at DESC')->limit(5)->all();
?>
<div class="site-index">
    <?php if(Yii::$app->user->can('show_dashboard')): ?>
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?= Yii::t('backend', 'Employers') ?></span>
                    <span class="info-box-number"><?= $report->totalEmployers() ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-android-person"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?= Yii::t('backend', 'Clients') ?></span>
                    <span class="info-box-number"><?= $report->totalClients() ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-paper-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?= Yii::t('backend', 'Purchase Orders') ?></span>
                    <span class="info-box-number"><?= $report->totalBuyOrders() ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-box"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?= Yii::t('backend', 'Products') ?></span>
                    <span class="info-box-number"><?= $report->totalProducts() ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('backend', 'Latest Orders') ?></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th><?= Yii::t('backend', 'Code') ?></th>
                                <th><?= Yii::t('backend', 'Type') ?></th>
                                <th><?= Yii::t('backend', 'Status') ?></th>
                                <th><?= Yii::t('backend', 'Client') ?></th>
                                <th><?= Yii::t('backend', 'Vendor') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?= Html::a($order->code, Yii::$app->urlManager->createUrl(['/order/view', 'id' => $order->id])) ?></td>
                                    <td><?= Order::TYPE_LABELS[$order->type] ?></td>
                                    <td><?= Order::STATUS_LABELS[$order->status] ?></td>
                                    <td><?= $order->clientWallet->client->fullname ?></td>
                                    <td><?= $order->clientWallet->employer->name . ' ' . $order->clientWallet->employer->lastname ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="<?= Yii::$app->urlManager->createUrl('/order/index') ?>" class="btn btn-sm btn-default btn-flat pull-right"><?= Yii::t('backend', 'View All Orders') ?></a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col col-md-4">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('backend', 'Recently Added Products') ?></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <?php foreach($products as $product): ?>
                            <li class="item">
                                <div class="product-img"><?= Html::img(!empty($product->productImages) ? Yii::$app->urlManager->createAbsoluteUrl($product->productImages[0]->path) : "") ?></div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <?= Html::a($product->name . '<span class="label label-warning pull-right">'. $product->price .' Bs</span>',
                                            Yii::$app->urlManager->createUrl(['/product/view', 'id' => $product->id])) ?>
                                    </div>
                                    <span class="product-description"><?= empty($product->description) ? Yii::t('backend', 'Has no description') : $product->description ?></span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="<?= Yii::$app->urlManager->createUrl('/product/index') ?>" class="uppercase"><?= Yii::t('backend', 'View All Products') ?></a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('backend', 'Gain Report from Purchase Orders')//Reporte de ganancia a partir de órdenes de compra ?></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body row">
            <div class="col-md-4">
                <?php $bestVendorsByBuyOrderEntry = $report->bestVendorsByBuyOrderEntry(); ?>
                    <?= Highcharts::widget([
                        'scripts' => [
                            'modules/exporting',
                            'themes/grid-light',
                        ],
                        'options' => [
                            'chart' => [
                                'type' => 'column'
                            ],
                            'title' => ['text' => Yii::t('backend', 'Best vendors')],//Mejores vendedores mediante la entrada de ordenes de compra
                            'yAxis' => [
                                'title' => ['text' => Yii::t('backend', 'Bs')]
                            ],
                            'series' => $bestVendorsByBuyOrderEntry['series']
                        ]
                    ]) ?>
            </div>
            <div class="col-md-4">
                <?php $bestClientsByBuyOrderEntry = $report->bestClientsByBuyOrderEntry(); ?>
                    <?= Highcharts::widget([
                        'options' => [
                            'chart' => [
                                'type' => 'column'
                            ],
                            'title' => ['text' => Yii::t('backend', 'Best customers')],//Mejores clientes mediante la entrada de ordenes de compra
                            'yAxis' => [
                                'title' => ['text' => Yii::t('backend', 'Bs')]
                            ],
                            'series' => $bestClientsByBuyOrderEntry['series']
                        ]
                    ]) ?>
            </div>
            <div class="col-md-4">
                <?php $mostBoughtProductsByBuyEntry = $report->mostBoughtProductByBuyOrderEntry() ?>
                    <?= Highcharts::widget([
                        'options' => [
                            'chart' => [
                                'type' => 'column'
                            ],
                            'title' => ['text' => Yii::t('backend', 'Most selled products')],//Productos mas comprados mediante la entrada de ordenes de compra
                            'yAxis' => [
                                'title' => ['text' => Yii::t('backend', 'Bs')]
                            ],
                            'series' => $mostBoughtProductsByBuyEntry['series']
                        ]
                    ]) ?>
            </div>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('backend', 'Report for quantity of purchase orders')//Reportes a partir de la cantidad de órdenes de compra ?></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body row">
            <div class="col-md-4">
                <?php $bestVendorsByBuyOrderQuantity = $report->bestVendorsByBuyOrderQuantity() ?>
                    <?= Highcharts::widget([
                        'options' => [
                            'chart' => [
                                'type' => 'column'
                            ],
                            'title' => ['text' => Yii::t('backend', 'Best vendors')],//Mejores vendedores mediante la cantidad de ordenes de compra
                            'yAxis' => [
                                'title' => ['text' => Yii::t('backend', 'Quantity')]
                            ],
                            'series' => $bestVendorsByBuyOrderQuantity['series']
                        ]
                    ]) ?>
            </div>
            <div class="col-md-4">
                <?php $bestClientsByBuyOrderQuantity = $report->bestClientsByBuyOrderQuantity() ?>
                    <?= Highcharts::widget([
                        'options' => [
                            'chart' => [
                                'type' => 'column'
                            ],
                            'title' => ['text' => Yii::t('backend', 'Best customers')],//Mejores clientes mediante la cantidad de ordenes de compra
                            'yAxis' => [
                                'title' => ['text' => Yii::t('backend', 'Quantity')]
                            ],
                            'series' => $bestClientsByBuyOrderQuantity['series']
                        ]
                    ]) ?>
            </div>
            <div class="col-md-4">
                <?php $mostBoughtProductsByBuyQuantity = $report->mostBoughtProductByBuyOrderQuantity() ?>
                    <?= Highcharts::widget([
                        'options' => [
                            'chart' => [
                                'type' => 'column'
                            ],
                            'title' => ['text' => Yii::t('backend', 'Most selled products')],//Productos mas comprados mediante la cantidad de ordenes de compra
                            'yAxis' => [
                                'title' => ['text' => Yii::t('backend', 'Quantity')]
                            ],
                            'series' => $mostBoughtProductsByBuyQuantity['series']
                        ]
                    ]) ?>
            </div>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('backend', 'Report Purchase Orders by Zone')//Reportes a partir de la cantidad de órdenes de compra ?></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body row">
            <div class="col-md-6">
                <?php $bestZonesByBuyOrderQuantity = $report->bestZonesByBuyOrderQuantity(); ?>
                <?= Highcharts::widget([
                    'options' => [
                        'title' => ['text' => Yii::t('backend', 'By Quantity')],//Mejores Zonas por Cantidad de Pedido de Compra
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => Yii::t('backend', 'Total of buy orders'),
                                'data' => $bestZonesByBuyOrderQuantity['data'],
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ]
                            ]
                        ]
                    ]
                ]) ?>
            </div>
            <div class="col-md-6">
                <?php $bestZonesByBuyOrderEntry = $report->bestZonesByBuyOrderEntry(); ?>
                <?= Highcharts::widget([
                    'options' => [
                        'title' => ['text' => Yii::t('backend', 'By Entry')],//Mejores Zonas por Entrada de Pedido de Compra
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => Yii::t('backend', 'Total of profit'),
                                'data' => $bestZonesByBuyOrderEntry['data'],
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ]
                            ]
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <div class="box-body row">
            <div class="col-lg-12">
                <?php $buyOrdersByStatus = $report->buyOrdersByStatus(); ?>
                <?= Highcharts::widget([
                    'options' => [
                        'title' => ['text' => Yii::t('backend', 'Buy Orders by Status')],//Mejores Zonas por Entrada de Pedido de Compra
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => Yii::t('backend', 'Total of buy orders'),
                                'data' => $buyOrdersByStatus['data'],
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ]
                            ]
                        ]
                    ]
                ]); ?>
            </div>
        </div>
    </div>

    <?php endif; ?>
</div>
