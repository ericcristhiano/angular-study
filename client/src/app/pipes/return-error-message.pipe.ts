import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'returnErrorMessage'
})
export class ReturnErrorMessagePipe implements PipeTransform {

  transform(value: string, fieldname: string): any {
    const messages = {
      'required': `${fieldname} is required`,
      'email': `${fieldname} is not an email`,
      'integer': `${fieldname} is not an intege`,
      'mistmatch': ``
    };

    return messages[value];
  }
}
