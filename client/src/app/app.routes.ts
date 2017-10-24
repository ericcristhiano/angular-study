import {Routes} from '@angular/router';
import {DefaultLayoutComponent} from './layouts/default-layout/default-layout.component';
import {LoginComponent} from './routes/login/login.component';
import {HomeComponent} from './routes/home/home.component';
import {FlightComponent} from './routes/flight/flight.component';
import {AuthGuard} from './guards/AuthGuard';
import {FlightListComponent} from './routes/flight-list/flight-list.component';
import {FlightPaymentComponent} from './routes/flight-payment/flight-payment.component';
import {HotelComponent} from './routes/hotel/hotel.component';
import {HotelListComponent} from './routes/hotel-list/hotel-list.component';
import {FlightSummaryComponent} from './routes/flight-summary/flight-summary.component';
import {HotelBookingComponent} from './routes/hotel-booking/hotel-booking.component';
import {HotelPaymentComponent} from './routes/hotel-payment/hotel-payment.component';
import {HotelSummaryComponent} from './routes/hotel-summary/hotel-summary.component';
import {FlightBookingComponent} from './routes/flight-booking/flight-booking.component';

export const appRoutes: Routes = [
  {
    path: '', component: DefaultLayoutComponent, children: [
      {path: 'login', component: LoginComponent, pathMatch: 'full'},
      {path: '', component: HomeComponent, pathMatch: 'full'},
      {path: 'flights', component: FlightComponent, pathMatch: 'full', canActivate: [AuthGuard]},
      {path: 'flights/list', component: FlightListComponent, pathMatch: 'full'},
      {path: 'flights/:id/booking', component: FlightBookingComponent, pathMatch: 'full'},
      {path: 'flights/booking/:booking_id/payment', component: FlightPaymentComponent, pathMatch: 'full'},
      {path: 'flights/summary', component: FlightSummaryComponent, pathMatch: 'full'},
      {path: 'hotels', component: HotelComponent, pathMatch: 'full'},
      {path: 'hotels/list', component: HotelListComponent, pathMatch: 'full'},
      {path: 'hotels/booking', component: HotelBookingComponent, pathMatch: 'full'},
      {path: 'hotels/payment', component: HotelPaymentComponent, pathMatch: 'full'},
      {path: 'hotels/summary', component: HotelSummaryComponent, pathMatch: 'full'},
    ]
  },
];
