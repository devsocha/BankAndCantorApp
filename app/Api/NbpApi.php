<?php
namespace App\Api;
use Illuminate\Support\Facades\Http;
use App\Interfaces\CurrencyApiIntefaces;



class NbpApi implements CurrencyApiIntefaces
{
    private const USD = 'http://api.nbp.pl/api/exchangerates/rates/a/usd/?format=json';
    private const EUR = 'http://api.nbp.pl/api/exchangerates/rates/a/eur/?format=json';
    public function fetch($currency){
        switch($currency){
            case 'eur':
                try{
                    $response = Http::get(self::EUR);
                    $content = $response->json();
                    return [
                        'status'=>$response->status(),
                        'content'=>$content['rates'],
                    ];
                }catch(\Exception $e){
                    return 'Błąd';
                }
                break;
            case 'usd':
                try{
                    $response = Http::get(self::USD);
                    $content = $response->json();
                    return [
                        'status'=>$response->status(),
                        'content'=>$content['rates'],
                    ];
                }catch(\Exception $e){
                    return 'Błąd';
                }
                break;
        }

    }
}
