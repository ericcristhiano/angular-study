<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "airline".
 *
 * @property integer $airline_id
 * @property string $airline_name
 * @property string $city_name
 * @property string $logo
 *
 * @property Flight[] $flights
 */
class Airline extends ActiveRecord
{
    public $logo_of_the_company;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'airline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['airline_name', 'logo', 'logo_of_the_company'], 'required'],
            [['logo_of_the_company'], 'image', 'extensions' => ['jpg'], 'maxSize' => 1024 * 500, 'skipOnEmpty' => false],
            [['airline_name', 'city_name', 'logo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'airline_id' => 'Airline ID',
            'logo_of_the_company' => 'Logo of the company',
            'airline_name' => 'Airline Name',
            'city_name' => 'City Name',
            'logo' => 'Logo',
        ];
    }
    
    public function fields() {
        $fields = parent::fields();
        $fields['logo'] = function($model){
            return Url::to('@web/',true).$model->logo;
        };
        return $fields;
    }

    /**
     * @return ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flight::className(), ['airline_id' => 'airline_id']);
    }

    public function beforeValidate() {
        $this->logo_of_the_company = UploadedFile::getInstanceByName('logo_of_the_company');
        $this->logo = 'logo';

        if (!is_null($this->logo_of_the_company)) {
            $this->logo = 'uploads/' . md5(uniqid() . mt_rand()) . '.' . $this->logo_of_the_company->getExtension();
        }

        return parent::beforeValidate();
    }

    public function afterSave($insert, $changedAttributes) {
        if (!is_null($this->logo_of_the_company)) {
            $this->logo_of_the_company->saveAs($this->logo);
        }

        return parent::afterSave($insert, $changedAttributes);
    }
}
