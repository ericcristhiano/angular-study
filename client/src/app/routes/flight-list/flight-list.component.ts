import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Route, Router} from '@angular/router';
import {FlightService} from '../../services/flight.service';
import {Flight} from '../../interfaces/flight';

@Component({
  selector: 'app-flight-list',
  templateUrl: './flight-list.component.html',
  styleUrls: ['./flight-list.component.css']
})
export class FlightListComponent implements OnInit {
  currentPage = 1;
  flightsPerPage= 5;
  queryParams: {
    departure_city_name: string,
    destination_city_name: string,
    departure_date: string,
    page?: number
  };

  oldQueryParams: {
    departure_city_name: string,
    destination_city_name: string,
    departure_date: string,
    page?: number
  };

  flightList: Array<Flight>= [];

  constructor(private router: Router, private activatedRoute: ActivatedRoute, private flightService: FlightService) { }

  onUrlChange(queryParams) {
      this.queryParams = queryParams;
      let searchChanged = true;
      for (const key in this.queryParams){
        if (key === 'page' || !this.oldQueryParams) {
          continue;
        }
        searchChanged = this.queryParams[key] !== this.oldQueryParams[key] && searchChanged;
      }

      if (searchChanged) {
        this.flightService.getFlights(this.queryParams).subscribe(
          flights => {this.flightList = flights},
          this.onError.bind(this)
          // err => console.log(err)
        )
      }

      this.currentPage = this.queryParams.page || this.currentPage;
      this.oldQueryParams = queryParams;
  }

  ngOnInit() {
    this.activatedRoute.queryParams.subscribe(
      this.onUrlChange.bind(this),
      this.onError.bind(this)
    )
  }

  onError(error: Response) {
    if (error.status === 401 || error.status === 403) {
      this.router.navigate(['/login']);
    }
  }

  changePage(page: number) {
    const queryParams = {
      ...this.queryParams,
      page
    };
    this.router.navigate(['flights/list'], {'queryParams': queryParams});
  }

  getFlightsOnCurrentPage() {
    const index = (this.currentPage - 1) * this.flightsPerPage;
    return this.flightList.slice(index, index + this.flightsPerPage);
  }

  getPaginationArrayNumber(): Array<number>{

    const number = Math.floor(this.flightList.length / this.flightsPerPage) + 1;
    const ar = [];
    for (let i = 0; i < number; i++) {
      ar.push(i + 1);
    }
    return ar;
  }
}
