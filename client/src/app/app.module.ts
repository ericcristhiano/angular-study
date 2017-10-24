import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app.component';
import {HttpModule} from '@angular/http';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { DefaultLayoutComponent } from './layouts/default-layout/default-layout.component';
import { HomeComponent } from './routes/home/home.component';
import { LoginComponent } from './routes/login/login.component';

import { FlightComponent } from './routes/flight/flight.component';
import { FlightSummaryComponent } from './routes/flight-summary/flight-summary.component';
import { FlightListComponent } from './routes/flight-list/flight-list.component';
import { FlightPaymentComponent } from './routes/flight-payment/flight-payment.component';
import { FlightBookingComponent } from './routes/flight-booking/flight-booking.component';

import { HotelComponent } from './routes/hotel/hotel.component';
import { HotelListComponent } from './routes/hotel-list/hotel-list.component';
import { HotelPaymentComponent } from './routes/hotel-payment/hotel-payment.component';
import { HotelSummaryComponent } from './routes/hotel-summary/hotel-summary.component';
import { HotelBookingComponent } from './routes/hotel-booking/hotel-booking.component';
import { FlightFormComponent } from './components/flight-form/flight-form.component';
import { HotelFormComponent } from './components/hotel-form/hotel-form.component';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {RequestService} from './services/request.service';
import {CityService} from './services/city.service';
import {FormGroupSelectComponent} from './components/form-group-select/form-group-select.component';
import {FormGroupInputComponent} from './components/form-group-input/form-group-input.component';
import { ArrayKeysPipe } from './pipes/array-keys.pipe';
import { ReturnErrorMessagePipe } from './pipes/return-error-message.pipe';
import {FlightService} from './services/flight.service';
import {AuthService} from './services/auth.service';
import {AuthGuard} from './guards/AuthGuard';
import { ToastComponent } from './components/toast/toast.component';
import {ToastService} from './services/toast.service';
import {appRoutes} from './app.routes';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    DefaultLayoutComponent,
    HomeComponent,
    LoginComponent,
    FlightComponent,
    FlightSummaryComponent,
    FlightListComponent,
    FlightPaymentComponent,
    HotelComponent,
    HotelListComponent,
    HotelPaymentComponent,
    HotelSummaryComponent,
    FlightBookingComponent,
    HotelBookingComponent,
    FlightFormComponent,
    HotelFormComponent,
    FormGroupSelectComponent,
    FormGroupInputComponent,
    ArrayKeysPipe,
    ReturnErrorMessagePipe,
    ToastComponent
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(appRoutes),
    HttpModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [
    AuthService,
    RequestService,
    CityService,
    FlightService,
    ToastService,
    AuthGuard
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
