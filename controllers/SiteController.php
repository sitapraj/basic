<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\mongodb\Connection;

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
        $mongoCommand = Yii::$app->mongodb->getCollection('blog');
       
       
        $mongoCommand->insert( 
                [
                    'title' => 'blog name',
                    "comment" => [  
                                    ["name" => 'sita1',  "value" => 100 ], 
                                    ["name" => 'sita2',  "value" => 20 ] 
                                 ] 
                ]
                    );
            //['multiple' => 'multiple', 'timeout' => 'dsgsdfg']
       
//        $fields = array(
//            'victim name',
//            'victim_phone_no',
//            'victim_address',
//            'victim_district',
//        );
//        $collection = Yii::$app->mongodb->getCollection('fields');
//        $collection->insert(['type' => 'victim_info', 'field_name' => serialize($fields)]);
//        $collection = Yii::$app->mongodb->getCollection('customer');
//        $collection->insert(['name' => 'John Smith', 'status' => 1]);
        
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
}
