<?php
namespace backend\controllers;

use backend\models\MapModel;
use backend\models\RegisterForm;
use common\models\Client;
use common\models\Employer;
use Yii;
//use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use mdm\admin\components\AccessControl;

use common\models\LoginForm;
use yii\web\UploadedFile;

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
            'access' => [
                'class' => AccessControl::className(),
                /*'rules' => [
                    [
                        'actions' => ['login', 'error', 'example', 'signup'],
                        'allow' => true
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],*/
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
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
        return $this->render('index');
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
     * Signs user up.
     *
     * @return mixed
     */
    public function actionRegister()
    {
        $model = new RegisterForm();

        if ($model->load(Yii::$app->request->post()) && $model->toRegister()) {
            $id = Yii::$app->db->lastInsertID;
            if($model->role === 0){
                $employer = new Employer();
                $employer->setAttribute('user_id', $id);
                return $this->render('/employer/create', ['model' => $employer]);
            }
            else{
                $client = new Client();
                $client->setAttribute('user_id', $id);
                return $this->render('/client/create', ['model' => $client]);
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionExample()
    {
        $model = new MapModel();
        return $this->render('example',[
            'model' => $model
        ]);
    }
}
