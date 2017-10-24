<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hotel;

/**
 * HotelSearch represents the model behind the search form about `app\models\Hotel`.
 */
class HotelSearch extends Hotel
{
    public $quantity_of_guests;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_id', 'price_per_guest'], 'integer'],
            [['hotel_name', 'city_name', 'description'], 'safe'],
            [['city_name', 'quantity_of_guests'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search()
    {
        $query = Hotel::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        // grid filtering conditions
        $query->availables($this->quantity_of_guests);
        $query->andFilterWhere([
            'hotel_id' => $this->hotel_id,
            'price_per_guest' => $this->price_per_guest,
        ]);
        $query->andFilterWhere(['like', 'city_name', $this->city_name]);
        return $dataProvider;
        
    }
}
