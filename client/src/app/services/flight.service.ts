import { Injectable } from '@angular/core';
import {RequestService} from './request.service';
import {Observable} from 'rxjs/Observable';
import {Flight} from '../interfaces/flight';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import 'rxjs/add/observable/throw';

@Injectable()
export class FlightService {

  constructor(private requestService: RequestService) { }
  getFlights(params?: object): Observable<Flight[]>{
    return this.requestService
      .request('flights', 'GET', null, {params})
      .map(res => res.json())
      .catch(err => {
        return Observable.throw(err.json())
      });
  }

  getFlight(id: number, params?: object): Observable<any>{
    return this.requestService.request(`flights/${id}`, 'GET', null, {params});
  }

  saveBooking(booking) {
    return this.requestService.request(`flights/bookings`, 'POST', booking);
  }

}
