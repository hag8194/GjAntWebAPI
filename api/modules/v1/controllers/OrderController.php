<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 24/12/2016
 * Time: 12:51 PM
 */

namespace api\modules\v1\controllers;

use common\models\Order;
use common\models\OrderDetail;
use Yii;
use yii\db\Exception;
use yii\filters\auth\QueryParamAuth;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;

class OrderController extends Controller
{
    protected function verbs()
    {
        return [
            'create-order' => ['POST']
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors =  parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }

    public function actionCreateOrder()
    {
        $bodyParams = Yii::$app->request->bodyParams;

        if(isset($bodyParams['code'], $bodyParams['description'], $bodyParams['type'],
            $bodyParams['clientwallet_id'], $bodyParams['products']))
        {
            $model = new Order();
            $model->setAttributes([
                'code' => $bodyParams['code'],
                'description' => $bodyParams['description'],
                'type' => $bodyParams['type'],
                'client_wallet_id' => $bodyParams['clientwallet_id']
            ]);

            $transaction = Yii::$app->db->beginTransaction();
            try
            {
                if($model->save())
                {
                    $order_id = Yii::$app->db->lastInsertID;
                    $products = json_decode($bodyParams['products']);
                    foreach ($products as $product)
                    {
                        $model = new OrderDetail();
                        $model->setAttributes([
                            'order_id' => $order_id,
                            'product_id' => $product->key,
                            'quantity' => $product->quantity
                        ]);
                        if(!$model->save())
                            throw new BadRequestHttpException($this->getErrorString($model->getErrors()));
                    }
                }
                else
                    throw new BadRequestHttpException($this->getErrorString($model->getErrors()));

                $transaction->commit();
                $response = Yii::$app->getResponse();
                $response->setStatusCode(201);
                return ['message' => Yii::t('backend', 'Order created successfully')];
            }
            catch (Exception $e)
            {
                $transaction->rollBack();
                throw $e;
            }
        }
        else
            throw new BadRequestHttpException(Yii::t('backend', 'Missing Body Params'));
    }

    private function getErrorString($errorArray)
    {
        $aux = '';
        foreach ($errorArray as $value) {
            $aux .= array_pop($value) . ' ';
        }
        return $aux;
    }
}