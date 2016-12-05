<?php

namespace backend\controllers;

use common\models\ProductBrand;
use common\models\searchmodels\ProductBrand as ProductBrandSearch;
use mdm\admin\components\AccessControl;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductBrandController implements the CRUD actions for ProductBrand model.
 */
class ProductBrandController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className()
            ]
        ];
    }

    /**
     * Lists all ProductBrand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductBrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductBrand model.
     * @param integer $product_id
     * @param integer $brand_id
     * @return mixed
     */
    public function actionView($product_id, $brand_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id, $brand_id),
        ]);
    }

    /**
     * Creates a new ProductBrand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductBrand();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'brand_id' => $model->brand_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductBrand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param integer $brand_id
     * @return mixed
     */
    public function actionUpdate($product_id, $brand_id)
    {
        $model = $this->findModel($product_id, $brand_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'brand_id' => $model->brand_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductBrand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param integer $brand_id
     * @return mixed
     */
    public function actionDelete($product_id, $brand_id)
    {
        $this->findModel($product_id, $brand_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductBrand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param integer $brand_id
     * @return ProductBrand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $brand_id)
    {
        if (($model = ProductBrand::findOne(['product_id' => $product_id, 'brand_id' => $brand_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
