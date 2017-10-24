<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $access_token
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password', 'access_token'], 'required'],
            [['first_name', 'last_name', 'email', 'password', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'access_token' => 'Access Token',
        ];
    }
    
    public static function findByEmail($email) {
        return static::findOne(['email' => $email]);
    }

    public function generateToken() {
        $this->access_token = \Yii::$app->security->generateRandomString();
        $this->save();
    }

    // TODO: CREATE CRYPTED PASSWORD
    public function validatePassword($password) {
        return $password === $this->password;
    }

    public function getAuthKey() {
        
    }

    public function getId() {
        return $this->user_id;
    }

    public function validateAuthKey($authKey) {
        
    }

    public static function findIdentity($id) {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }
    
    public function fields() {
        $fields = parent::fields();
        unset($fields['password']);
        return $fields;
    }

}
