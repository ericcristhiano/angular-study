<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "passenger".
 *
 * @property integer $passenger_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $flight_booking_id
 * @property string $flight_class
 *
 * @property FlightBooking $flightBooking
 */
class Passenger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'passenger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'flight_booking_id', 'flight_class'], 'required'],
            [['flight_booking_id'], 'integer'],
            [['flight_class'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['flight_booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => FlightBooking::className(), 'targetAttribute' => ['flight_booking_id' => 'flight_booking_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'passenger_id' => 'Passenger ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'flight_booking_id' => 'Flight Booking ID',
            'flight_class' => 'Flight Class',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlightBooking()
    {
        return $this->hasOne(FlightBooking::className(), ['flight_booking_id' => 'flight_booking_id']);
    }
}
