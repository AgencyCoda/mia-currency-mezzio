import { MiaModel } from "@agencycoda/mia-core";

export class MiaCurrency extends MiaModel {
    id: number = 0;
    title: string = '';
    code: string = '';
    symbol: string = '';
    val_usd: string = '';
    photo: string = '';

}