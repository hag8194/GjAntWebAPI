<?php

namespace backend\controllers;

use common\models\Address;
use common\models\User;
use mdm\admin\components\AccessControl;
use Yii;
use common\models\Client;
use common\models\searchmodels\ClientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends Controller
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
     * Lists all Client models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Client model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($user_id)
    {
        if(empty($user_id) || !User::find()->where('id='. $user_id)->exists() || Client::find()->where('user_id='. $user_id)->exists()){
            throw new NotFoundHttpException(Yii::t('backend', 'Invalid user'));
        }

        $model = new Client();
        $model_address = new Address();

        if ($model->load(Yii::$app->request->post()) && $model_address->load(Yii::$app->request->post()))
        {
            if($model_address->save())
            {
                $model->setAttribute('address_id', Yii::$app->db->lastInsertID);
                $model->setAttribute('user_id', $user_id);
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'model_address' => $model_address
        ]);
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_address = $model->address;
        $model_user = $model->user;
        $model_user->scenario = User::SCENARIO_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model_address->load(Yii::$app->request->post()) && $model_user->load(Yii::$app->request->post())
            && $model->save() && $model_address->save() && $model_user->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'model_address' => $model_address,
            'model_user' => $model_user
        ]);
    }

    /**
     * Deletes an existing Client model.
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
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Client::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
