import {Component, Input, OnInit} from '@angular/core';
import {FormGroup} from '@angular/forms';

@Component({
  selector: 'app-form-group-input',
  templateUrl: './form-group-input.component.html',
  styleUrls: ['./form-group-input.component.css']
})
export class FormGroupInputComponent implements OnInit {
  @Input() formGroup: FormGroup;
  @Input() label: string;
  @Input() name: string;
  @Input() type: string;

  constructor() { }

  ngOnInit() {
  }

}
