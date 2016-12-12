<?php

namespace backend\controllers;

use backend\models\UploadProductImagesForm;
use common\models\Product;
use common\models\ProductImage;
use common\models\searchmodels\Product as ProductSearch;
use mdm\admin\components\AccessControl;
use Yii;
use yii\db\Exception;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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

        if($upload_image_model->load(Yii::$app->request->post()))
        {
            $upload_image_model->imageFiles = UploadedFile::getInstances($upload_image_model, 'imageFiles');
            if(!empty($upload_image_model->imageFiles))
            {
                if($upload_image_model->upload($id))
                    Yii::$app->session->setFlash('success', 'Imagenes guardadas exitosamente');
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
            }
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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
