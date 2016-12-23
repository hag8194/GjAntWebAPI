<?php

namespace backend\controllers;

use backend\models\ClientListViewSearch;
use backend\models\EmployerListViewSearch;
use common\models\Employer;
use mdm\admin\components\AccessControl;
use Yii;
use common\models\ClientWallet;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * ClientWalletController implements the CRUD actions for ClientWallet model.
 */
class ClientWalletController extends Controller
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
                    'assign-client' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className()
            ]
        ];
    }

    public function actionIndex()
    {
        $employerSearchModel = new EmployerListViewSearch();
        $employerDataProvider = $employerSearchModel->search(Yii::$app->request->queryParams);

        $clientSearchModel = null;
        $clientDataProvider = null;

        if(($employer =  Yii::$app->request->get('Employer')) &&
                Employer::find()->where('id=' . $employer['id'])->exists())
        {
            $model_employer = Employer::findOne($employer['id']);

            $clientSearchModel = new ClientListViewSearch();
            $clientSearchModel->zone_name = $model_employer->zone->name;

            $clientDataProvider = $clientSearchModel->search(Yii::$app->request->queryParams);

        }

        return $this->render('index', [
            'employerSearchModel' => $employerSearchModel,
            'employerDataProvider' => $employerDataProvider,
            'clientSearchModel' => $clientSearchModel,
            'clientDataProvider' => $clientDataProvider
        ]);
    }

    public function actionAssignClient()
    {
        if(Yii::$app->request->isAjax)
        {
            $client_id = Yii::$app->request->post('client_id');
            $employer_id = Yii::$app->request->post('employer_id');

            $query = ClientWallet::find()->where(['client_id' => $client_id, 'employer_id' => $employer_id]);

            if(!$query->exists()){
                $model = new ClientWallet();
                $model->setAttributes(['client_id' => $client_id, 'employer_id' => $employer_id]);
                return $model->save();
            }
            else
                return $query->one()->delete();
        }
        else
            throw new BadRequestHttpException('The request need to be an Ajax');
    }
}
