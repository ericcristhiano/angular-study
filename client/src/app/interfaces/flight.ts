export interface Flight {
  flight_id: number,
  departure_date: string,
  arrival_date: string,
  arrival_time: string,
  flight_code: string,
  departure_time: string,
  duration_of_the_flight: string,
  departure_city_name: string,
  destination_city_name: string,
  airline_id: string,
  logo: string,
  airline: {
    airline_id: number,
    airline_name: string,
    city_name: string,
    logo: string
  },
  fare_price: Array<{flight_class: string, value: string }>
}
