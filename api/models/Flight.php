<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flight".
 *
 * @property integer $flight_id
 * @property string $departure_date
 * @property string $arrival_date
 * @property string $flight_code
 * @property string $departure_time
 * @property string $arrival_time
 * @property string $duration_of_the_flight
 * @property string $departure_city_name
 * @property string $destination_city_name
 * @property integer $airline_id
 * @property integer $fare_price_economy
 * @property integer $fare_price_business
 * @property integer $fare_price_first_class
 *
 * @property Airline $airline
 * @property FlightBooking[] $flightBookings
 */
class Flight extends \yii\db\ActiveRecord
{
    public $fare_price = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departure_date', 'arrival_date', 'flight_code', 'departure_time', 'arrival_time', 'duration_of_the_flight', 'departure_city_name', 'destination_city_name', 'airline_id', 'fare_price_economy', 'fare_price_business', 'fare_price_first_class'], 'required'],
            [['departure_date', 'arrival_date'], 'safe'],
            [['airline_id', 'fare_price_economy', 'fare_price_business', 'fare_price_first_class'], 'integer'],
            [['flight_code', 'departure_time', 'arrival_time', 'duration_of_the_flight', 'departure_city_name', 'destination_city_name'], 'string', 'max' => 255],
            [['airline_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airline::className(), 'targetAttribute' => ['airline_id' => 'airline_id']],
            [['fare_price'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'flight_id' => 'Flight ID',
            'departure_date' => 'Departure Date',
            'arrival_date' => 'Arrival Date',
            'flight_code' => 'Flight Code',
            'departure_time' => 'Departure Time',
            'arrival_time' => 'Arrival Time',
            'duration_of_the_flight' => 'Duration Of The Flight',
            'departure_city_name' => 'Departure City Name',
            'destination_city_name' => 'Destination City Name',
            'airline_id' => 'Airline ID',
            'fare_price_economy' => 'Fare Price Economy',
            'fare_price_business' => 'Fare Price Business',
            'fare_price_first_class' => 'Fare Price First Class',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAirline()
    {
        return $this->hasOne(Airline::className(), ['airline_id' => 'airline_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlightBookings()
    {
        return $this->hasMany(FlightBooking::className(), ['flight_id' => 'flight_id']);
    }
    
    public function beforeValidate() {
        foreach ($this->fare_price as $fare_price) {
            $key = "fare_price_".$fare_price['flight_class'];

            try {
                $this->{$key} = $fare_price['value'];
            } catch(\yii\base\UnknownPropertyException $e) {
                $this->addError('fare_price', 'Value not accepted');
            }
        }

        return parent::beforeValidate();
    }
    
    public function beforeSave($insert) {
        $dtDeparture = \DateTime::createFromFormat('d/m/Y', $this->departure_date);
        if ($dtDeparture) {
            $this->departure_date = $dtDeparture->format('Y-m-d');
        }
        
        $dtArrival = \DateTime::createFromFormat('d/m/Y', $this->arrival_date);
        
        if ($dtArrival) {
            $this->arrival_date = $dtArrival->format('Y-m-d');
        }

        return parent::beforeSave($insert);
    }
    
    public function fields() {
        $fields = parent::fields();
        unset($fields['fare_price_economy']);
        unset($fields['fare_price_business']);
        unset($fields['fare_price_first_class']);
        $fields['fare_price'] = function($model) {
            return [
                [
                    'flight_class' => 'economy',
                    'value' => $model->fare_price_economy
                ],
                [
                    'flight_class' => 'business',
                    'value' => $model->fare_price_business
                ],
                [
                    'flight_class' => 'first_class',
                    'value' => $model->fare_price_first_class
                ],
            ];
        };
        
        $fields['departure_date'] = function($model) {
            $dt = \DateTime::createFromFormat('Y-m-d', $model->departure_date);
            return $dt->format('d/m/Y');
        };
        
        $fields['arrival_date'] = function($model) {
            $dt = \DateTime::createFromFormat('Y-m-d', $model->arrival_date);
            return $dt->format('d/m/Y');
        };
        
        $fields['airline'] = function($model) {
            return $model->airline;
        };
        
        return $fields;
    }
}
