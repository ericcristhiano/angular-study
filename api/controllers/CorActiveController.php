<?php

namespace app\controllers;

class CorActiveController extends \yii\rest\ActiveController
{
    public function behaviors() {
        return array_merge(parent::behaviors(), [
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Headers' => ['Content-Type', 'Authorization']
                ],
            ]
        ]);
    }

    public function beforeAction($action) {
        $beforeAction = parent::beforeAction($action);
        
        if (\Yii::$app->request->isOptions) {
            \Yii::$app->response->statusCode = 200;
            return false;
        }
        
        return $beforeAction;
    }
}
