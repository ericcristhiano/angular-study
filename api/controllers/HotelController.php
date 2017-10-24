<?php

namespace app\controllers;

use app\models\HotelSearch;
use Yii;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\ServerErrorHttpException;

class HotelController extends CorActiveController
{
    public $modelClass = 'app\models\Hotel';
    
    public function actions() {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex() {
        $model = new HotelSearch();
        $model->load(Yii::$app->request->queryParams,'');
        if(!$model->validate())
            return $model;
        return $model->search();
    }
    
    public function actionBook() {
        $model = new \app\models\HotelBooking();

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');

        if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(200);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        
        return $model;
    }
    
    public function actionGetBook($id) {
        $booking = \app\models\HotelBooking::findOne($id);

        if (!$booking) {
            throw new \yii\web\NotFoundHttpException();
        }
        
        return $booking;
    }
}
