import {Component, Input, OnInit} from '@angular/core';
import {FormGroup} from '@angular/forms';

@Component({
  selector: 'app-form-group-select',
  templateUrl: './form-group-select.component.html',
  styleUrls: ['./form-group-select.component.css']
})
export class FormGroupSelectComponent implements OnInit {
  @Input() formGroup: FormGroup;
  @Input() label: string;
  @Input() name: string;
  @Input() list: Array<any>;
  @Input() key: string;
  @Input() value: string;
  @Input() emptyState: string;

  constructor() { }

  ngOnInit() {

  }

}
