import { Injectable } from '@angular/core';
import {Http, RequestOptionsArgs, Headers} from '@angular/http';
import {Observable} from 'rxjs/Observable';
import {API_TOKEN_NAME, API_URL} from '../config/config.prod';

@Injectable()
export class RequestService {
  headers = new Headers();

  constructor(private http: Http) {
    this.headers.append('Content-type', 'application/json');
  }

  request(url: string, verb: string = 'GET', body?: {[key: string]: any}, options: RequestOptionsArgs = {} ): Observable<any> {
    const {get, post, put} = this.http;

    verb = verb.toLowerCase().trim();

    const verbActions = {
      get, post, put, delete: this.http.delete
    };

    if (!options.headers) {
      const token = (localStorage.getItem(API_TOKEN_NAME)) ? JSON.parse(localStorage.getItem(API_TOKEN_NAME)).access_token : '';
      options.headers = this.headers;
      options.headers.set('Authorization', 'Bearer ' + token);
    }

    if (verb === 'get' || verb === 'delete') {
      return verbActions[verb].bind(this.http)(API_URL + url, options);
    }

    return verbActions[verb].bind(this.http)(API_URL + url, body, options);
  }
}
