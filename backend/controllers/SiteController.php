<?php
namespace backend\controllers;

use backend\models\DateTimeModel;
use backend\utils\Report;
use common\models\Enterprise;
use backend\models\CatalogSearch;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use mdm\admin\components\AccessControl;
use common\models\LoginForm;
/**
 * Site controller
 */
class SiteController extends Controller
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
                    'logout' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model_datetime = new DateTimeModel();
        $model_datetime->load(Yii::$app->request->post());

        return $this->render('index', [
            'report' => new Report(),
            'model_datetime' => $model_datetime
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $this->layout = '//main-login';

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Register user.
     *
     * @return mixed
     */
    public function actionRegister()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $authManager = Yii::$app->authManager;
            $user_id = Yii::$app->db->lastInsertID;
            if($model->role == 0)
            {
                $authManager->assign($authManager->getRole('vendor'), $user_id);
                return $this->redirect(['/employer/create', 'user_id' => $user_id]);
            }
            else
            {
                $authManager->assign($authManager->getRole('client'), $user_id);
                return $this->redirect(['/client/create', 'user_id' => $user_id]);
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionExample()
    {
        return $this->render('example');
    }

    public function actionProfile()
    {
        /* @var $model_user \common\models\User */
        $model_user = Yii::$app->user->identity;
        $model_employer = $model_user->employer;
        $model_client = $model_user->client;

        $model_user->scenario = User::SCENARIO_UPDATE;

        if($model_user->load(Yii::$app->request->post()) && $model_user->save())
            Yii::$app->session->setFlash('success', Yii::t('backend', 'User updated'));

        if($model_employer)
        {
            $model_address = $model_employer->address;
           if($model_employer->load(Yii::$app->request->post()) && $model_employer->save() &&
                $model_address->load(Yii::$app->request->post()) && $model_address->save())
               Yii::$app->session->setFlash('success', Yii::t('backend', 'Employer updated'));
        }

        if($model_client)
        {
            $model_address = $model_client->address;
            if($model_client->load(Yii::$app->request->post()) && $model_client->save() &&
                    $model_address->load(Yii::$app->request->post()) && $model_address->save())
                Yii::$app->session->setFlash('success', Yii::t('backend', 'Client updated'));
        }

        return $this->render('profile', [
            'model_user' => $model_user,
            'model_employer' => $model_employer,
            'model_client' => $model_client
        ]);
    }


    public function actionEnterprise()
    {
        $model = Enterprise::findOne(1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('enterprise', [
            'model' => $model,
        ]);
    }

    public function actionCatalog()
    {
        $searchModel = new CatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('catalog', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
}
