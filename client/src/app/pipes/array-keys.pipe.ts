import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'arrayKeys'
})
export class ArrayKeysPipe implements PipeTransform {

  transform(value: any, args?: any): any {
    return Object.keys(value);
  }

}
