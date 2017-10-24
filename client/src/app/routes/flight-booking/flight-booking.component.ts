import { Component, OnInit } from '@angular/core';
import {FormArray, FormBuilder, FormGroup, Validators} from '@angular/forms';
import {ActivatedRoute, Router} from '@angular/router';
import {FlightService} from '../../services/flight.service';
import {Flight} from '../../interfaces/flight';

@Component({
  selector: 'app-flight-booking',
  templateUrl: './flight-booking.component.html',
  styleUrls: ['./flight-booking.component.css']
})
export class FlightBookingComponent implements OnInit {
  booking: FormGroup;
  passengers: FormArray;
  categories: Array<{[key: string]: any}> = [
    {
      id: 'economy',
      value: 'Economy'
    },
    {
      id: 'first_class',
      value: 'First Class'
    },
    {
      id: 'business',
      value: 'Business'
    }
  ];

  flight: Flight;

  constructor(private formBuilder: FormBuilder, private activatedRoute: ActivatedRoute, private flightService: FlightService, private router: Router) { }

  ngOnInit() {
    this.passengers = this.formBuilder.array([
        this.createNewPassenger()
      ]
    );

    this.booking = this.formBuilder.group({
      passengers: this.passengers
    });

    this.activatedRoute.params.subscribe(params => {
      this.flightService.getFlight(params.id).subscribe(
        res => this.flight = res.json(),
        error => console.log(error)
      )
    })
  }
  createNewPassenger(): FormGroup {
    return this.formBuilder.group({
      flight_class: ['', Validators.required],
      first_name: ['', Validators.required],
      last_name: ['', Validators.required]
    });
  }
  addPassenger() {
    this.passengers.push(this.createNewPassenger());
  }

  removePassenger(index) {
    this.passengers.removeAt(index);
  }

  onSubmit() {
    this.flightService.saveBooking({...this.booking.value, flight_id: this.flight.flight_id}).subscribe(
      res => this.onSave.bind(this, res.json()),
      error => console.log(error),
    );
  }

  onSave(json){
    this.router.navigate(['/flights/booking', json.flight_booking_id, 'payment']);
  }

}
