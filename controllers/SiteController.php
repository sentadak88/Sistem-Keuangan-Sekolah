<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['logout'],
                        'rules' => [
                            [
                                'actions' => ['logout'],
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                        ],
            ],
        
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
            'logout' => ['post'],
            ],
        ],
        ];
    }

    public function actions()
    {
        return [
        'error' => [
        'class' => 'yii\web\ErrorAction',
        ],
        'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
        ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
                ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($value='')
    {
        return $this->render('say', ['msg'=>$value]);
    }

    public function actionSignup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save(false);

        // the following three lines were added:
            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole('author');
            $auth->assign($authorRole, $user->getId());

            return $user;
        }

        return null;
    }

}
