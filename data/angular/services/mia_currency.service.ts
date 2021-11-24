import { Injectable } from '@angular/core';
import { MiaCurrency } from '../entities/mia_currency';
import { MiaBaseCrudHttpService } from '@agencycoda/mia-core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MiaCurrencyService extends MiaBaseCrudHttpService<MiaCurrency> {

  constructor(
    protected http: HttpClient
  ) {
    super(http);
    this.basePathUrl = environment.baseUrl + 'mia_currency';
  }
 
}