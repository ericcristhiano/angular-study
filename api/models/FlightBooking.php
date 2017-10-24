<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight_booking".
 *
 * @property integer $flight_booking_id
 * @property integer $cost
 * @property integer $flight_id
 *
 * @property Flight $flight
 * @property Passenger[] $passengers
 * @property Transaction[] $transactions
 */
class FlightBooking extends \yii\db\ActiveRecord
{
    public $_passengers = [];
    public $passengers;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight_booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost', 'flight_id', 'passengers'], 'required'],
            [['cost', 'flight_id'], 'integer'],
            [['passengers', 'passengersObject'], 'safe'],
            [['flight_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flight::className(), 'targetAttribute' => ['flight_id' => 'flight_id']],
        ];
    }
    
    public function load($data, $formName = null) {
        if (isset($data['passengers'])) {
            foreach ($data['passengers'] as $passengerData) {
                $this->_passengers[] = new Passenger($passengerData);
            }
        }

        return parent::load($data, $formName);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'flight_booking_id' => 'Flight Booking ID',
            'cost' => 'Cost',
            'flight_id' => 'Flight ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlight()
    {
        return $this->hasOne(Flight::className(), ['flight_id' => 'flight_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMyPassengers()
    {
        return $this->hasMany(Passenger::className(), ['flight_booking_id' => 'flight_booking_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['flight_booking_flight_booking_id' => 'flight_booking_id']);
    }
    
    public function beforeValidate() {
        $cost = 0;

        foreach ($this->_passengers as $passenger) {
            if ($passenger->flight_class == 'economy') {
                $cost += $this->flight->fare_price_economy;
            }
            
            if ($passenger->flight_class == 'business') {
                $cost += $this->flight->fare_price_business;
            }
            
            if ($passenger->flight_class == 'first_class') {
                $cost += $this->flight->fare_price_first_class;
            }
        }
        
        $this->cost = $cost;

        return parent::beforeValidate();
    }
    
    public function afterSave($insert, $changedAttributes) {
        foreach ($this->_passengers as $passenger) {
            $passenger->flight_booking_id = $this->flight_booking_id;
            $passenger->save();
        }

        return parent::afterSave($insert, $changedAttributes);
    }
    
    public function fields() {
        $fields = parent::fields();
        $fields['passengers'] = function($model) {
            $passengers = [];

            foreach ($model->myPassengers as $passenger) {
                $passengers[] = $passenger;
            }
            
            return $passengers;
        };
        $fields['flight_data'] = function($model) {
            return $model->flight;
        };
        
        return $fields;
    }
}
