<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $transaction_id
 * @property string $users_title
 * @property string $users_first_name
 * @property string $users_last_name
 * @property string $email_address
 * @property string $phone_number
 * @property string $payment_method
 * @property string $credit_cards_name
 * @property string $credit_cards_number
 * @property string $ccv
 * @property integer $hotel_booking_id
 * @property integer $flight_booking_id
 *
 * @property FlightBooking $flightBooking
 * @property HotelBooking $hotelBooking
 */
class Transaction extends \yii\db\ActiveRecord
{
    public $booking_type;
    public $booking_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['users_title', 'users_first_name', 'users_last_name', 'email_address', 'phone_number', 'payment_method', 'booking_type', 'booking_id'], 'required'],
            [['credit_cards_name', 'credit_cards_number', 'ccv'], 'required', 'when' => function($model) {
                return $model->payment_method == 'credit_card';
            }],
            [['payment_method'], 'string'],
            [['hotel_booking_id', 'flight_booking_id'], 'integer'],
            [['users_title', 'users_first_name', 'users_last_name', 'email_address', 'phone_number', 'credit_cards_name', 'credit_cards_number', 'ccv'], 'string', 'max' => 255],
            [['flight_booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => FlightBooking::className(), 'targetAttribute' => ['flight_booking_id' => 'flight_booking_id']],
            [['hotel_booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => HotelBooking::className(), 'targetAttribute' => ['hotel_booking_id' => 'hotel_booking_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => 'Transaction ID',
            'users_title' => 'Users Title',
            'users_first_name' => 'Users First Name',
            'users_last_name' => 'Users Last Name',
            'email_address' => 'Email Address',
            'phone_number' => 'Phone Number',
            'payment_method' => 'Payment Method',
            'credit_cards_name' => 'Credit Cards Name',
            'credit_cards_number' => 'Credit Cards Number',
            'ccv' => 'Ccv',
            'hotel_booking_id' => 'Hotel Booking ID',
            'flight_booking_id' => 'Flight Booking ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlightBooking()
    {
        return $this->hasOne(FlightBooking::className(), ['flight_booking_id' => 'flight_booking_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelBooking()
    {
        return $this->hasOne(HotelBooking::className(), ['hotel_booking_id' => 'hotel_booking_id']);
    }
    
    public function beforeSave($insert) {
        if ($this->booking_type == 'hotels') {
            $this->hotel_booking_id = $this->booking_id;
        }
        
        if ($this->booking_type == 'flights') {
            $this->flight_booking_id = $this->booking_id;
        }

        return parent::beforeSave($insert);
    }
    
    public function fields() {
        $fields = parent::fields();
        unset($fields['hotel_booking_id']);
        unset($fields['flight_booking_id']);
        $fields['booking_type'] = function($model) {
            return ($model->hotel_booking_id) ? 'hotels' : 'flights';
        };
        
        return $fields;
    }
}
