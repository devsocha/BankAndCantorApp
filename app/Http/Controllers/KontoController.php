<?php

namespace App\Http\Controllers;

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
    public  function  checkMoneyOnAccount($idUser,$howMuchMoney,$currency){
        $accountId = $this->getAccount($idUser);
        switch($currency){
            case 'USD':
                $check = Konto::where('id',$accountId)->where('kontoUSD','>',$howMuchMoney)->exists();
                if($check){
                    return true;
                }else{
                    return false;
                }
                break;
            case 'PLN':
                $check = Konto::where('id',$accountId)->where('kontoPLN','>',$howMuchMoney)->exists();
                if($check){
                    return true;
                }else{
                    return false;
                }
                break;
            case 'EUR':
                $check = Konto::where('id',$accountId)->where('kontoEUR','>',$howMuchMoney)->exists();
                if($check){
                    return true;
                }else{
                    return false;
                }
                break;
        }
    }
    public function checkAccount($numberAccount){
        $exists = Konto::where('id',$numberAccount)->exists();
        if($exists){
            return true;
        }else{
            return false;
        }
    }
    public function sendMoneyToAccont($money,$numberAccount,$currency){
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
        $account = Konto::where('id',$numberAccount)->update([
            $currency => $newMoney,
            ]);
        $user = UserDemo::where('konto_id',$numberAccount)->first();
        $userSenderId = $user->id;
        $addActivities = Activity::create([
            'user_demo_id' => session()->get('idUser'),
            'type'=> 'Przelew',
            'inorout'=>'wychodzący',
            'sendTo'=> $userSenderId,
            'money'=>$money,
        ]);
    }
}
