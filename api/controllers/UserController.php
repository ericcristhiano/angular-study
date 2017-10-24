<?php

namespace app\controllers;

class UserController extends CorActiveController
{
    public $modelClass = 'app\models\User';

    public function actionLogin() {
        $loginForm = new \app\models\LoginForm();
        $loginForm->load(\Yii::$app->getRequest()->getBodyParams(), '');
        if ($loginForm->validate()) {
            $user = $loginForm->getUser();
            $user->generateToken();
            return $user;
        }

        \Yii::$app->getResponse()->statusCode = 401;
        return ['message'=>'Incorrect email or password'];
    }
}
