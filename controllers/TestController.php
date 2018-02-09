<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class TestController extends Controller
{

    public function actionTest()
    {
        //return $this->render('test');
        echo 'actionTest() > echo';
    }

        public function actionIndex()
    {
        return $this->render('test');
    }


}

