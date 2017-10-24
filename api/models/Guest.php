<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guest".
 *
 * @property integer $guest_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $hotel_booking_id
 *
 * @property HotelBooking $hotelBooking
 */
class Guest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'hotel_booking_id'], 'required'],
            [['hotel_booking_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['hotel_booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => HotelBooking::className(), 'targetAttribute' => ['hotel_booking_id' => 'hotel_booking_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guest_id' => 'Guest ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'hotel_booking_id' => 'Hotel Booking ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelBooking()
    {
        return $this->hasOne(HotelBooking::className(), ['hotel_booking_id' => 'hotel_booking_id']);
    }
}
