import { Injectable } from '@angular/core';
import {RequestService} from './request.service';
import {API_TOKEN_NAME} from '../config/config.prod';

@Injectable()
export class AuthService {
  constructor(private requestService: RequestService) { }

  login(email: string, password: string): Promise<any> {
    return new Promise((resolve, reject) => {
      this.requestService.request('login', 'POST', {email, password})
        .subscribe(
          res => {
            localStorage.setItem(API_TOKEN_NAME, JSON.stringify(res.json()));
            resolve(res);
          },
          err => {
            reject(err);
          }
        )
    });
  }

  getUser(): {any: any} {
    return JSON.parse(localStorage.getItem(API_TOKEN_NAME));
  }

}
