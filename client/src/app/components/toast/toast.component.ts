import { Component, OnInit } from '@angular/core';
import {ToastService} from '../../services/toast.service';
import {Observable} from 'rxjs/Observable';
import 'rxjs/add/observable/throw';

@Component({
  selector: 'app-toast',
  templateUrl: './toast.component.html',
  styleUrls: ['./toast.component.css']
})
export class ToastComponent implements OnInit {
  message = 'exemplo';
  toastList = [];

  constructor(private toastService: ToastService) { }

  ngOnInit() {
    this.toastService.toastMessage.subscribe(
      msg => {
        if (msg) {
          const msgObj = {message: msg};
          (msgToDelete => {
            setTimeout(_ => {
              const index = this.toastList.indexOf(msgToDelete);
              this.toastList.splice(index, 1);
            }, 3000);
          })(msgObj);
          return this.toastList.push(msgObj)
        }
      },
      err => Observable.throw(err)
    )
  }

}
