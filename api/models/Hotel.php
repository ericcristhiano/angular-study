<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hotel".
 *
 * @property integer $hotel_id
 * @property string $hotel_name
 * @property string $city_name
 * @property string $description
 * @property integer $price_per_guest
 *
 * @property HotelBooking[] $hotelBookings
 * @property Image[] $images
 * @property RoomType[] $roomTypes
 */
class Hotel extends \yii\db\ActiveRecord
{
    public $room_types = [];
    public $image_urls = [];


//    public function load($data, $formName = null) {
//        $newData = $data;
//        $newData['room_type'=>$data['room_type']];
//        parent::load($newData, $formName);
//    } 
    
     public static function find() 
    { 
        return new HotelQuery(get_called_class()); 
    } 
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_name', 'city_name', 'price_per_guest'], 'required'],
            [['description'], 'string'],
            [['room_types', 'image_urls'], 'safe'],
            [['price_per_guest'], 'integer'],
            [['hotel_name', 'city_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hotel_id' => 'Hotel ID',
            'hotel_name' => 'Hotel Name',
            'city_name' => 'City Name',
            'description' => 'Description',
            'price_per_guest' => 'Price Per Guest',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelBookings()
    {
        return $this->hasMany(HotelBooking::className(), ['hotel_id' => 'hotel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['hotel_id' => 'hotel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMyRoomTypes()
    {
        return $this->hasMany(RoomType::className(), ['hotel_id' => 'hotel_id']);
    }

    public function afterSave($insert, $changedAttributes) {
        foreach ($this->room_types as $roomTypeData) {
            $roomType = new RoomType($roomTypeData);
            $roomType->hotel_id = $this->hotel_id;
            $roomType->save();
        }

        foreach ($this->image_urls as $imageUrl) {
            $image = new Image();
            $image->url = $imageUrl;
            $image->hotel_id = $this->hotel_id;
            $image->save();
        }

        return parent::afterSave($insert, $changedAttributes);
    }
    
    public function getVacancy() {
        $hotelCapacity = $this->getMyRoomTypes()->sum('capacity * quantity');
        $booked = $this->getHotelBookings()->sum('total_guests');
        
        return $hotelCapacity - $booked;
    }
    
    public function fields() {
        $fields = parent::fields();
        $fields['room_types'] = function($model) {
            $roomTypes = [];

            foreach ($model->myRoomTypes as $roomType) {
                $roomTypes[] = $roomType;
            }

            return $roomTypes;
        };
        return $fields;
    }
    
    public function beforeValidate() {
        if ($this->isNewRecord) {
            
        }

        return parent::beforeValidate();
    }
    
    public function beforeSave($insert) {
        if (!$this->isNewRecord) {
            if (count($this->room_types) > 0) {
                $this->unlinkAll('myRoomTypes', true);
            }
        }

        return parent::beforeSave($insert);
    }
}
