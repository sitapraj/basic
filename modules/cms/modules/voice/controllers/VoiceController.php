<?php

namespace app\modules\cms\modules\voice\controllers;

use yii;
use yii\web\Controller;
use yii\mongodb\Query;;
use app\modules\cms\modules\voice\models\VictimInfoForm;

class VoiceController extends Controller
{
    public function actionIndex()
    {    
        return $this->render('index');
    }
    
    public function actionDetails()
    {
        $model = new VictimInfoForm;
       // var_dump($_POST);exit;
        if (isset($_POST['VictimInfoForm'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('details', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUpdate()
    {   
        $model = new VictimInfoForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            var_dump($model);exit;
                if($model->save()){
                    // some other code here.....
                }
        }
    }
}
