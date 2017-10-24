<?php

namespace app\controllers;

use Yii;
use yii\filters\Cors;
use yii\rest\ActiveController;

class CityController extends CorActiveController
{
    public $modelClass = 'app\models\flight';
    
    public function actions() {
        $actions = parent::actions();
        unset($actions['index']);

        return $actions;
    }
    
    public function actionIndex() {
        return Yii::$app->db->createCommand('SELECT departure_city_name AS city_name FROM flight UNION SELECT destination_city_name AS city_name FROM flight')->queryAll();
        
//        return array_map(function($city){
//            return ['city_name' => $city['departure_city_name']];
//        }, $result);
    }
}

