<?php
namespace backend\controllers;

use backend\models\MapModel;
use backend\models\ProfileForm;
use backend\models\RegisterForm;
use common\models\Client;
use common\models\Employer;
use common\models\User;
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
        $model = new MapModel();
        return $this->render('example',[
            'model' => $model
        ]);
    }

    public function actionProfile()
    {
        $model_user = User::findOne(Yii::$app->user->id);
        $model_employer = Employer::findOne(['user_id' => Yii::$app->user->id]);
        $model_client = Client::findOne(['user_id' => Yii::$app->user->id]);

        $model_user->scenario = User::SCENARIO_UPDATE;

        if($model_user->load(Yii::$app->request->post()) && $model_user->save())
            Yii::$app->session->addFlash('success', Yii::t('backend', 'User updated'));

        if($model_employer)
        {
           if($model_employer->load(Yii::$app->request->post()) && $model_employer->save()){
               Yii::$app->session->addFlash('success', Yii::t('backend', 'Employer updated'));
           }
        }

        if($model_client)
        {
            if($model_client->load(Yii::$app->request->post()) && $model_client->save()){
                Yii::$app->session->addFlash('success', Yii::t('backend', 'Client updated'));
            }
        }

        return $this->render('profile', [
            'model_user' => $model_user,
            'model_employer' => $model_employer,
            'model_client' => $model_client
        ]);
    }
}
