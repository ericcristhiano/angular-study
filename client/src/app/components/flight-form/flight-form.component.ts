import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {CityService} from '../../services/city.service';
import {matchValidator} from '../../validators/matchValidator';
import {Router} from '@angular/router';
import {ToastService} from '../../services/toast.service';

@Component({
  selector: 'app-flight-form',
  templateUrl: './flight-form.component.html',
  styleUrls: ['./flight-form.component.css']
})
export class FlightFormComponent implements OnInit {
  flight: FormGroup;

  cities: Array<any> = [];

  constructor(private formBuilder: FormBuilder, private cityService: CityService, private router: Router, private toastService: ToastService) { }

  ngOnInit() {
    const DepartureCityNameControl = new FormControl('');
    const DestinationCityNameControl = new FormControl('');
    DepartureCityNameControl.setValidators([matchValidator(DestinationCityNameControl, false), Validators.required]);
    DestinationCityNameControl.setValidators([matchValidator(DepartureCityNameControl, false), Validators.required]);

    this.flight = this.formBuilder.group({
      departure_city_name: DepartureCityNameControl,
      destination_city_name: DestinationCityNameControl,
      departure_date: new FormControl('', Validators.required)
    });
    this.cityService.getCities()
      .subscribe(
        res => {this.cities = res.json()},
        err => {throw new Error(err.message)}
      )
  }

  onSubmit() {
    const queryParams = this.flight.value;
    queryParams.departure_date = queryParams.departure_date.split('-').reverse().join('/');
    this.router.navigate(['flights/list'], {'queryParams': queryParams});
  }
}
