<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Flight;

/**
 * FlightSearch represents the model behind the search form about `app\models\Flight`.
 */
class FlightSearch extends Flight
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flight_id', 'airline_id', 'fare_price_economy', 'fare_price_business', 'fare_price_first_class'], 'integer'],
            [['departure_date', 'arrival_date', 'flight_code', 'departure_time', 'arrival_time', 'duration_of_the_flight', 'departure_city_name', 'destination_city_name'], 'safe'],
            [['departure_date', 'departure_city_name', 'destination_city_name'], 'required'],
            [['departure_date'], 'validatePastDate'],
        ];
    }
    
    public function validatePastdate() {
        $dtNow = new \DateTime();
        $dtNow->setTime(0, 0, 0);
        $dt = \DateTime::createFromFormat('d/m/Y', $this->departure_date);
        $dt->setTime(0, 0, 0);
        
        if ($dtNow > $dt) {
            $this->addError('departure_date', 'Departure date cannot be past');
            return false;
        }
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
        $query = Flight::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $dt = \DateTime::createFromFormat('d/m/Y', $this->departure_date);

        $query->andFilterWhere(['like', 'departure_city_name', $this->departure_city_name])
            ->andFilterWhere(['like', 'destination_city_name', $this->destination_city_name])
            ->andFilterWhere(['like', 'departure_date', $dt->format('Y-m-d')]);

        return $dataProvider;
    }
}
