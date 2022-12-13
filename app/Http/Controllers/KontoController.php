<?php

namespace App\Http\Controllers;

use App\Api\NbpApi;
use App\Models\Activity;
use App\Models\Konto;
use App\Models\UserDemo;
use Illuminate\Http\Request;

class KontoController extends Controller
{
    public function getAccount($idUser){
         $user = UserDemo::where('id',$idUser)->first();
         return $user->konto_id;
    }

    public function checkAccount($numberAccount){


    }
    public function addMoneyToAccount($money,$numberAccount,$currency){

        $account = Konto::where('id',$numberAccount)->first();
        switch($currency){
            case'kontoUSD':
                $oldMoney = $account->kontoUSD;
                break;
            case 'kontoPLN':
                $oldMoney = $account->kontoPLN;
                break;
            case 'kontoEUR':
                $oldMoney = $account->kontoEUR;
                break;

        }
        $newMoney = $oldMoney+$money;
        $accountUpdate = Konto::where('id',$numberAccount)->update([
            $currency => $newMoney,
            ]);
    }
    public function takeMoneyFromAccount($money,$idUser,$currency){
        $idAccount = $this->getAccount($idUser);
        $account = Konto::where('id',$idAccount)->first();
        switch($currency){
            case'kontoUSD':
                $oldMoney = $account->kontoUSD;
                break;
            case 'kontoPLN':
                $oldMoney = $account->kontoPLN;
                break;
            case 'kontoEUR':
                $oldMoney = $account->kontoEUR;
                break;

        }
        $newMoney = $oldMoney-$money;
        $accountUpdate = Konto::where('id',$idAccount)->update([
            $currency => $newMoney,
        ]);
    }
    public function transactionCurrencyFromPlnToOther($currency,$money){
        $idUser = session()->get('idUser');
        $idAccount = $this->getAccount($idUser);
        $NbpApi = new NbpApi();
        $currencyUsd = $NbpApi->fetch('usd');
        $currencyEur = $NbpApi->fetch('eur');
        $euro = round($currencyEur['content'][0]['mid'],4);
        $dolar = round($currencyUsd['content'][0]['mid'],4);
        $pln = $money;
        switch($currency){
            case'kontoUSD':
                $money = $pln/$dolar;
                $this->takeMoneyFromAccount($pln,$idUser,'kontoPLN');
                $this->addMoneyToAccount($money,$idAccount,$currency);
            break;
            case 'kontoEUR':
                $money = $pln/$euro;
                $this->takeMoneyFromAccount($pln,$idUser,'kontoPLN');
                $this->addMoneyToAccount($money,$idAccount,$currency);
                break;
        }

    }
    public function transactionCurrencyFromOtherToPln($currency,$money){
        $idUser = session()->get('idUser');
        $idAccount = $this->getAccount($idUser);
        $NbpApi = new NbpApi();
        $currencyUsd = $NbpApi->fetch('usd');
        $currencyEur = $NbpApi->fetch('eur');
        $euro = round($currencyEur['content'][0]['mid'],4);
        $dolar = round($currencyUsd['content'][0]['mid'],4);
        switch($currency){
            case'kontoUSD':
                $pln = $money*$dolar;
                $this->takeMoneyFromAccount($money,$idUser,$currency);
                $this->addMoneyToAccount($pln,$idAccount,'kontoPLN');
                break;
            case 'kontoEUR':
                $pln = $money*$euro;
                $this->takeMoneyFromAccount($money,$idUser,$currency);
                $this->addMoneyToAccount($pln,$idAccount,'kontoPLN');
                break;
        }
    }

}
