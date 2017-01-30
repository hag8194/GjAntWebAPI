<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 29/01/2017
 * Time: 8:40 PM
 */

namespace backend\utils;

use common\models\Client;
use common\models\ClientWallet;
use common\models\Employer;
use common\models\Order;
use common\models\searchmodels\Product;
use yii\base\Object;

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

    public function bestVendorsByBuyOrderEntry()
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
                    foreach ($order->orderDetails as $orderDetail)
                        if($order->type == Order::TYPE_BUY_ORDER)
                            $acum += $orderDetail->quantity * $orderDetail->product->price;
                }
            }
            array_push($data['series'], ['name' => $employer->name . ' ' . $employer->lastname, 'data' => [$acum]]);
            $acum = 0;
        }

        /*foreach ($employers as $employer)
        {
            foreach ($employer->clientWallets as $clientWallet)
                $acum += count($clientWallet->orders);
            array_push($data['series'], ['name' => $employer->identification, 'data' => [$acum]]);
            $acum = 0;
        }*/

        return $data;
    }

    public function bestClientsByBuyOrderEntry()
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
                    if($order->type == Order::TYPE_BUY_ORDER)
                        $acum += $orderDetail->quantity * $orderDetail->product->price;
                }
            }
            array_push($data['series'], ['name' => $clientWallet->client->fullname, 'data' => [$acum]]);
            $acum = 0.0;
        }

        return $data;
    }

    public function mostBoughtProductByBuyOrderEntry()
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
                if($orderDetail->order['type'] == Order::TYPE_BUY_ORDER)
                    $acum += $product->price * $orderDetail->quantity;
            }
            array_push($data['series'], ['name' => $product->name, 'data' => [$acum]]);
            $acum = 0.0;
        }

        return $data;
    }

    public function bestVendorsByBuyOrderQuantity()
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
                    if($order->type == Order::TYPE_BUY_ORDER)
                        $cont++;
                }
            }
            array_push($data['series'], ['name' => $employer->name . ' ' . $employer->lastname, 'data' => [$cont]]);
            $cont = 0;
        }

        return $data;
    }

    public function bestClientsByBuyOrderQuantity()
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
                if($order->type == Order::TYPE_BUY_ORDER)
                    $cont++;
            }
            array_push($data['series'], ['name' => $clientWallet->client->fullname, 'data' => [$cont]]);
            $cont = 0.0;
        }

        return $data;
    }

    public function mostBoughtProductByBuyOrderQuantity()
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
                if($orderDetail->order['type'] == Order::TYPE_BUY_ORDER)
                    $cont++;
            }
            array_push($data['series'], ['name' => $product->name, 'data' => [$cont]]);
            $cont = 0;
        }

        return $data;
    }
}