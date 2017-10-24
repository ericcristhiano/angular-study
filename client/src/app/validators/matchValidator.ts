import {FormControl, FormGroup} from '@angular/forms';
import {Error} from 'tslint/lib/error';

export function matchValidator(control2: FormControl, equals: boolean = true) {
  return (control1: FormControl): {[key: string]: any} => {
    if (!control2) {
        throw new Error('This control doesn\'t  exist');
    }

    if (!control1.touched && !control2.touched) {
      return null;
    }

    const notvalid = (equals) ? control1.value !== control2.value : control1.value === control2.value;

    if (notvalid) {
      control2.setErrors({mismatch: true});
      return {mismatch: true};
    }

    let errors = control2.errors;

    if (errors) {
      delete errors['mismatch'];
      errors = (Object.keys(errors).length) ? errors : null;
    }

    control2.setErrors(errors);
    return null;
  }
}

