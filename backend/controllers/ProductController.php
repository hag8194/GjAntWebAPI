<?php

namespace backend\controllers;

use backend\models\UploadProductImagesForm;
use common\models\Product;
use common\models\ProductImage;
use common\models\searchmodels\Product as ProductSearch;
use mdm\admin\components\AccessControl;
use Yii;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
                    'delete-product-image' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className()
            ]
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $upload_image_model = new UploadProductImagesForm();

        if($upload_image_model->load(Yii::$app->request->post()) && !$upload_image_model->saveUploadedImages($id))
        {
            print_r($upload_image_model->errors);
            /*if(!empty($paths = $upload_image_model->uploadAll()) && !empty($upload_image_model->imageFiles))
            {
                foreach ($paths as $path)
                {
                    $model = new ProductImage();
                    $model->setAttributes(['product_id' => $id, 'path' =>  '/' . $path]);

                    if(!$model->save()){
                        return false;
                    }
                }
            }
            else
            {
                $productImages = ProductImage::find()->where(['product_id' => $id])->all();
                $transaction = Yii::$app->db->beginTransaction();
                try{
                    foreach ($productImages as $productImage) {
                        $productImage->delete();
                        //Problema al eliminar las imagenes...
                        //unlink(Yii::$app->urlManager->createAbsoluteUrl($productImage->getAttribute('path')));
                    }
                    $transaction->commit();
                    Yii::$app->session->setFlash('info', 'Se han eliminado las imagenes');
                }catch (Exception $e){
                    $transaction->rollBack();
                }
            }*/
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'upload_image_model' => $upload_image_model
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            $model->setAttribute('updated_by', Yii::$app->user->id);
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->setAttribute('updated_by', Yii::$app->user->id);
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing ProductImage model.
     * @param integer $id
     * @return false|int
     * @throws BadRequestHttpException
     */
    public function actionDeleteProductImage()
    {
        if(Yii::$app->request->isAjax && $id = Yii::$app->request->post('id'))
            return ProductImage::findOne($id)->delete();
        else
            throw new BadRequestHttpException('The request need to be an Ajax');
    }

    public function actionDeleteProductImages()
    {
        if(Yii::$app->request->isAjax && $id = Yii::$app->request->post('id'))
            return ProductImage::deleteAll(['product_id' => $id]);
        else
            throw new BadRequestHttpException('The request need to be an Ajax');
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
