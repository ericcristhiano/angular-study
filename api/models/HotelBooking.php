<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hotel_booking".
 *
 * @property integer $hotel_booking_id
 * @property integer $total_guests
 * @property integer $cost
 * @property integer $hotel_id
 *
 * @property Guest[] $guests
 * @property Hotel $hotel
 * @property Transaction[] $transactions
 */
class HotelBooking extends \yii\db\ActiveRecord
{
    public $_guests = [];
    public $guests;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel_booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_guests', 'hotel_id', 'guests'], 'required'],
            [['total_guests', 'cost', 'hotel_id'], 'integer'],
            [['guests'], 'safe'],
            [['hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotel::className(), 'targetAttribute' => ['hotel_id' => 'hotel_id']],
        ];
    }
    
    public function load($data, $formName = null) {
        if (isset($data['guests'])) {
            foreach ($data['guests'] as $guestData) {
                $this->_guests[] = new Guest($guestData);
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
            'hotel_booking_id' => 'Hotel Booking ID',
            'total_guests' => 'Total Guests',
            'cost' => 'Cost',
            'hotel_id' => 'Hotel ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMyGuests()
    {
        return $this->hasMany(Guest::className(), ['hotel_booking_id' => 'hotel_booking_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotel::className(), ['hotel_id' => 'hotel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['hotel_booking_hotel_booking_id' => 'hotel_booking_id']);
    }
    
    public function beforeValidate() {
        if ($this->hotel) {
            $this->cost = $this->total_guests * $this->hotel->price_per_guest;
        }

        return parent::beforeValidate();
    }
    
    public function afterSave($insert, $changedAttributes) {
        foreach ($this->_guests as $guest) {
            $guest->hotel_booking_id = $this->hotel_booking_id;
            $guest->save();
        }

        return parent::afterSave($insert, $changedAttributes);
    }
    
    public function fields() {
        $fields = parent::fields();
        $fields['guests'] = function($model) {
            $guests = [];
            foreach ($model->myGuests as $guest) {
                $guests[] = $guest;
            }
            return $guests;
        };
        return $fields;
    }
}
