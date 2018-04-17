<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 29/01/2017
 * Time: 8:40 PM
 */

namespace backend\utils;

use backend\models\DateTimeModel;
use common\models\Client;
use common\models\ClientWallet;
use common\models\Employer;
use common\models\Order;
use common\models\OrdersByZone;
use common\models\searchmodels\Product;
use common\models\Zone;
use Yii;
use yii\base\Object;
use yii\helpers\ArrayHelper;

class Report extends Object
{
    /**
     * Report constructor.
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    public function init()
    {

    }

    public function totalEmployers()
    {
        return Employer::find()->count();
    }

    public function totalClients()
    {
        return Client::find()->count();
    }

    public function totalBuyOrders()
    {
        return Order::find()->where(['type' => Order::TYPE_BUY_ORDER])->count();
    }

    public function totalProducts()
    {
        return Product::find()->count();
    }

    public function bestVendorsByBuyOrderEntry(DateTimeModel $model_datetime)
    {
        /* @var $employers Employer[] */
        $employers = Employer::find()->all();
        $data = [];
        $data['series'] = [];
        $acum = 0.0;

        foreach ($employers as $employer)
        {
            foreach ($employer->clientWallets as $clientWallet)
            {
                foreach ($clientWallet->orders as $order)
                {
                    foreach ($order->orderDetails as $orderDetail){
                        if($order->type == Order::TYPE_BUY_ORDER && $order->status != Order::STATUS_CANCELED &&
                        $order->created_at > Yii::$app->formatter->asTimestamp($model_datetime->since) &&
                        $order->created_at < Yii::$app->formatter->asTimestamp($model_datetime->to))
                            $acum += $orderDetail->quantity * $orderDetail->product->price;
                    }

                }
            }
            array_push($data['series'], ['name' => $employer->name . ' ' . $employer->lastname, 'data' => [$acum]]);
            $acum = 0;
        }

        return $data;
    }

    public function bestClientsByBuyOrderEntry(DateTimeModel $model_datetime)
    {
        /* @var $client_wallets ClientWallet[] */
        $client_wallets = ClientWallet::find()->all();
        $data = [];
        $data['series'] = [];
        $acum = 0.0;

        foreach ($client_wallets as $clientWallet)
        {
            foreach ($clientWallet->orders as $order)
            {
                foreach ($order->orderDetails as $orderDetail){
                    if($order->type == Order::TYPE_BUY_ORDER && $order->status != Order::STATUS_CANCELED &&
                        $order->created_at > Yii::$app->formatter->asTimestamp($model_datetime->since) &&
                        $order->created_at < Yii::$app->formatter->asTimestamp($model_datetime->to))

                        $acum += $orderDetail->quantity * $orderDetail->product->price;
                }
            }
            array_push($data['series'], ['name' => $clientWallet->client->fullname, 'data' => [$acum]]);
            $acum = 0.0;
        }

        return $data;
    }

    public function mostBoughtProductByBuyOrderEntry(DateTimeModel $model_datetime)
    {
        /* @var $products Product[] */
        $products = Product::find()->all();
        $data = [];
        $data['series'] = [];
        $acum = 0.0;

        foreach ($products as $product)
        {
            foreach ($product->orderDetails as $orderDetail)
            {
                if($orderDetail->order['type'] == Order::TYPE_BUY_ORDER && $orderDetail->order['status'] != Order::STATUS_CANCELED &&
                    $orderDetail->order['created_at'] > Yii::$app->formatter->asTimestamp($model_datetime->since) &&
                    $orderDetail->order['created_at'] < Yii::$app->formatter->asTimestamp($model_datetime->to))
                    $acum += $product->price * $orderDetail->quantity;
            }
            array_push($data['series'], ['name' => $product->name, 'data' => [$acum]]);
            $acum = 0.0;
        }

        return $data;
    }

    public function bestVendorsByBuyOrderQuantity(DateTimeModel $model_datetime)
    {
        /* @var $employers Employer[] */
        $employers = Employer::find()->all();
        $data = [];
        $data['series'] = [];
        $cont = 0;

        foreach ($employers as $employer)
        {
            foreach ($employer->clientWallets as $clientWallet)
            {
                foreach ($clientWallet->orders as $order)
                {
                    if($order->type == Order::TYPE_BUY_ORDER && $order->status != Order::STATUS_CANCELED &&
                        $order->created_at > Yii::$app->formatter->asTimestamp($model_datetime->since) &&
                        $order->created_at < Yii::$app->formatter->asTimestamp($model_datetime->to))
                        $cont++;
                }
            }
            array_push($data['series'], ['name' => $employer->name . ' ' . $employer->lastname, 'data' => [$cont]]);
            $cont = 0;
        }

        return $data;
    }

    public function bestClientsByBuyOrderQuantity(DateTimeModel $model_datetime)
    {
        /* @var $client_wallets ClientWallet[] */
        $client_wallets = ClientWallet::find()->all();
        $data = [];
        $data['series'] = [];
        $cont = 0.0;

        foreach ($client_wallets as $clientWallet)
        {
            foreach ($clientWallet->orders as $order)
            {
                if($order->type == Order::TYPE_BUY_ORDER && $order->status != Order::STATUS_CANCELED &&
                    $order->created_at > Yii::$app->formatter->asTimestamp($model_datetime->since) &&
                    $order->created_at < Yii::$app->formatter->asTimestamp($model_datetime->to))
                    $cont++;
            }
            array_push($data['series'], ['name' => $clientWallet->client->fullname, 'data' => [$cont]]);
            $cont = 0.0;
        }

        return $data;
    }

    public function mostBoughtProductByBuyOrderQuantity(DateTimeModel $model_datetime)
    {
        /* @var $products Product[] */
        $products = Product::find()->all();
        $data = [];
        $data['series'] = [];
        $cont = 0;

        foreach ($products as $product)
        {
            foreach ($product->orderDetails as $orderDetail)
            {
                if($orderDetail->order['type'] == Order::TYPE_BUY_ORDER && $orderDetail->order['status'] != Order::STATUS_CANCELED &&
                    $orderDetail->order['created_at'] > Yii::$app->formatter->asTimestamp($model_datetime->since) &&
                    $orderDetail->order['created_at'] < Yii::$app->formatter->asTimestamp($model_datetime->to))
                    $cont++;
            }
            array_push($data['series'], ['name' => $product->name, 'data' => [$cont]]);
            $cont = 0;
        }

        return $data;
    }

    public function bestZonesByBuyOrderQuantity(DateTimeModel $model_datetime)
    {
        /* @var $zones Zone[] */
        $zones = Zone::find()->all();

        $data = [];
        $data['data'] = [];
        $count = 0;

        foreach ($zones as $zone)
        {
            foreach ($zone->ordersByZone as $orderByZone)
                if($orderByZone->type == Order::TYPE_BUY_ORDER && $orderByZone->status != Order::STATUS_CANCELED &&
                    $orderByZone->created_at > Yii::$app->formatter->asTimestamp($model_datetime->since) &&
                    $orderByZone->created_at < Yii::$app->formatter->asTimestamp($model_datetime->to))
                    $count++;

            array_push($data['data'], [
                'name' => $zone->name,
                'y' => $count,
            ]);
            $count = 0;
        }

        return $data;
    }

    public function bestZonesByBuyOrderEntry(DateTimeModel $model_datetime)
    {
        /* @var $zones Zone[] */
        $zones = Zone::find()->all();

        /*$test = Zone::find()->joinWith('ordersByZone')
            ->where(['orders_by_zone.type' => Order::TYPE_BUY_ORDER])
            ->andWhere(['!=', 'orders_by_zone.status', Order::STATUS_CANCELED])
            ->andWhere(['between', 'orders_by_zone.created_at', Yii::$app->formatter->asTimestamp($model_datetime->since),
                Yii::$app->formatter->asTimestamp($model_datetime->to)])
            ->limit(10)
            ->count();*/

        $data = [];
        $data['data'] = [];
        $acum = 0.0;

        foreach ($zones as $zone){
            foreach ($zone->ordersByZone as $item) {
                foreach ($item->orderDetails as $orderDetail)
                    if($orderDetail->order['type'] == Order::TYPE_BUY_ORDER && $orderDetail->order['status'] != Order::STATUS_CANCELED &&
                        $orderDetail->order['created_at'] > Yii::$app->formatter->asTimestamp($model_datetime->since) &&
                        $orderDetail->order['created_at'] < Yii::$app->formatter->asTimestamp($model_datetime->to))
                        $acum += $orderDetail->product->price * $orderDetail->quantity;
            }
            array_push($data['data'], [
                'name' => $zone->name,
                'y' => doubleval($acum)
            ]);
            $acum = 0.0;
        }


        return $data;
    }

    public function buyOrdersByStatus(DateTimeModel $model_datetime)
    {
        $data = [];
        $data['data'] = [];

        $data['data'][] = [
            'name' => Order::STATUS_LABELS[Order::STATUS_STANDBY],
            'y' => intval(Order::find()->where(['status' => Order::STATUS_STANDBY, 'type' => Order::TYPE_BUY_ORDER])
                ->andWhere(['between', 'order.created_at', Yii::$app->formatter->asTimestamp($model_datetime->since), Yii::$app->formatter->asTimestamp($model_datetime->to)])
                ->count())
        ];

        $data['data'][] = [
            'name' => Order::STATUS_LABELS[Order::STATUS_PROCESSING],
            'y' => intval(Order::find()->where(['status' => Order::STATUS_PROCESSING, 'type' => Order::TYPE_BUY_ORDER])
                ->andWhere(['between', 'order.created_at', Yii::$app->formatter->asTimestamp($model_datetime->since), Yii::$app->formatter->asTimestamp($model_datetime->to)])
                ->count())
        ];

        $data['data'][] = [
            'name' => Order::STATUS_LABELS[Order::STATUS_PROCESSED],
            'y' => intval(Order::find()->where(['status' => Order::STATUS_PROCESSED, 'type' => Order::TYPE_BUY_ORDER])
                ->andWhere(['between', 'order.created_at', Yii::$app->formatter->asTimestamp($model_datetime->since), Yii::$app->formatter->asTimestamp($model_datetime->to)])
                ->count())
        ];

        $data['data'][] =  [
            'name' => Order::STATUS_LABELS[Order::STATUS_CANCELED],
            'y' => intval(Order::find()->where(['status' => Order::STATUS_CANCELED, 'type' => Order::TYPE_BUY_ORDER])
                ->andWhere(['between', 'order.created_at', Yii::$app->formatter->asTimestamp($model_datetime->since), Yii::$app->formatter->asTimestamp($model_datetime->to)])
                ->count())
        ];

        return $data;
    }
}