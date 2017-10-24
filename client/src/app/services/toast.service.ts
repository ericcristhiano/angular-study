import { Injectable } from '@angular/core';
import {BehaviorSubject} from 'rxjs/BehaviorSubject';

@Injectable()
export class ToastService {
  public toastMessage = new BehaviorSubject(null);

  constructor() { }

  sendMessage(msg: string){
    this.toastMessage.next(msg);
  }

}
