import { Injectable } from '@angular/core';
import {RequestService} from './request.service';
import {Observable} from 'rxjs/Observable';

@Injectable()
export class CityService {

  constructor(private requestService: RequestService) {  }

  getCities(params?: object): Observable<any> {
    return this.requestService.request('cities', 'GET', params);
  }
}
