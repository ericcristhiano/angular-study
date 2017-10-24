<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room_type".
 *
 * @property integer $room_type_id
 * @property string $name
 * @property integer $capacity
 * @property integer $quantity
 * @property integer $hotel_id
 *
 * @property Hotel $hotel
 */
class RoomType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'capacity', 'quantity', 'hotel_id'], 'required'],
            [['capacity', 'quantity', 'hotel_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotel::className(), 'targetAttribute' => ['hotel_id' => 'hotel_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'room_type_id' => 'Room Type ID',
            'name' => 'Name',
            'capacity' => 'Capacity',
            'quantity' => 'Quantity',
            'hotel_id' => 'Hotel ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotel::className(), ['hotel_id' => 'hotel_id']);
    }
}
