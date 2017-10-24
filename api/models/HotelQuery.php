<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Hotel]].
 *
 * @see Hotel
 */
class HotelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/
    public function availables($quantity){
        return $this
                ->select([
                    'hotel.*',
                    'SUM(room_type.capacity * room_type.quantity - (SELECT COALESCE( SUM(total_guests), 0 ) FROM hotel_booking WHERE hotel.hotel_id = hotel_booking.hotel_id) ) AS availableRooms'
                ])
                ->leftJoin('room_type','hotel.hotel_id = room_type.hotel_id')
                ->groupBy('hotel.hotel_id')
                ->having('availableRooms > '.$quantity);
    }

    /**
     * @inheritdoc
     * @return Hotel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Hotel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
