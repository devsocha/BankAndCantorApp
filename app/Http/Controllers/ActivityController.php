<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\UserDemo;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function addSendMoneyInformation($userSenderAccountNumber, $money){
        $user = UserDemo::where('konto_id',$userSenderAccountNumber)->first();
        $userSenderId = $user->id;
        $addActivities = Activity::create([
            'user_demo_id' => session()->get('idUser'),
            'type'=> 'Przelew',
            'inorout'=>'wychodzący',
            'sendTo'=> $userSenderId,
            'money'=>$money,
        ]);
    }
    public function addGetMoneyInformation($userSenderAccountNumber, $money){
        $user = UserDemo::where('konto_id',$userSenderAccountNumber)->first();
        $userSenderId = $user->id;
        $addActivities = Activity::create([
            'user_demo_id' => $userSenderId,
            'type'=> 'Przelew',
            'inorout'=>'przychodzący',
            'sendFrom'=> session()->get('idUser'),
            'money'=>$money,
        ]);
    }
}
