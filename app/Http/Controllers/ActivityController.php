<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\UserDemo;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function addSendMoneyInformation($userSenderAccountNumber,$money,$idUser,$currency){
        $user = UserDemo::where('konto_id',$userSenderAccountNumber)->first();
        $userSenderId = $user->id;
        switch($currency){
            case'kontoEUR':
                $currencyType = 'Euro';
                break;
            case'kontoPLN':
                $currencyType = 'złotych';
                break;
            case'kontoUSD':
                $currencyType = 'Dolarów';
                break;
        }
        $addActivities = Activity::create([
            'userId' => $idUser,
            'type'=> 'Przelew',
            'inorout'=>'wychodzący',
            'currency'=>$currencyType,

            'sendTo'=> $userSenderId,
            'money'=>$money,
        ]);
    }
    public function addGetMoneyInformation($userSenderAccountNumber,$money,$idUser,$currency){
        $user = UserDemo::where('konto_id',$userSenderAccountNumber)->first();
        $userSenderId = $user->id;
        switch($currency){
            case'kontoEUR':
                $currencyType = 'Euro';
                break;
            case'kontoPLN':
                $currencyType = 'złotych';
                break;
            case'kontoUSD':
                $currencyType = 'Dolarów';
                break;
            }
        $addActivities = Activity::create([
            'userId' => $userSenderId,
            'type'=> 'Przelew',
            'inorout'=>'przychodzący',
            'currency'=>$currencyType,
            'sendFrom'=> $idUser,
            'money'=>$money,
        ]);
    }
    public function showActivitySender($idUser){
        return $activities = Activity::where('userId',$idUser)->get();
    }
}
