<?php

namespace App\Http\Controllers;


use App\Models\Konto;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request){
        return view('choiceAccount',[
            'tittle'=>'application'
        ]);

    }
    public function accountView(Request $request, $id){
        $request->session()->put('idUser',$id);
        $userDemo = new UserDemoController();
        $demo = $userDemo->getInformation();
        $idUser = session()->get('idUser');
        return view('app',[
            'demo'=>$demo,
            'idUser'=>$idUser,
            'tittle'=>'panel'

            ]);
    }
    public function sendMoney (){
        $userDemo = new UserDemoController();
        $demo = $userDemo->getInformation();
        $idUser = session()->get('idUser');
        return view('sendMoney',[
            'demo'=>$demo,
            'idUser'=>$idUser,
            'tittle'=> 'przelew bankowy',
        ]);
    }
    public function transformValue (){
        $userDemo = new UserDemoController();
        $demo = $userDemo->getInformation();
        $idUser = session()->get('idUser');
        return view('transformValue',[
            'demo'=>$demo,
            'idUser'=>$idUser,
            'tittle'=> 'kantor',
        ]);
    }
    public function listTransaction (){
        $userDemo = new UserDemoController();
        $demo = $userDemo->getInformation();
        $idUser = session()->get('idUser');
        return view('listTransaction',[
            'demo'=>$demo,
            'idUser'=>$idUser,
            'tittle'=> 'lista transakcji',
            'text'=>'Przelew wychodzący na numer konta bankowego xyz na kwote 111 zł'
        ]);
    }
    public function moneySender(Request $request){
        $idUser = session()->get('idUser');
        $kontoController = new KontoController();
        $money = $request->input('money');
        $currency = $request->input('currency');
        $userSenderAccountNumber = $request->input('numberAccount');
        // sprawdzenie czy ma takie fundusze
        $accountId = $kontoController->getAccount($idUser);
        $check = Konto::where('id',$accountId)->where($currency,'>',$money)->exists();
        $exists = Konto::where('id',$userSenderAccountNumber)->exists();
//        $existsMoney = $kontoController->checkMoneyOnAccount($idUser,$money,$currency);
        // sprawdzenie czy konto do przelewu istnieje
//        $existsAccount = $kontoController->checkAccount($userSenderAccountNumber);
        if($check && $exists){
            // dodawanie czynnosci 1
            $activity = new ActivityController();
            $activity->addSendMoneyInformation($userSenderAccountNumber,$money,$idUser,$currency);
            // dodawanie czynnosci 2
            $activity->addGetMoneyInformation($userSenderAccountNumber,$money,$idUser,$currency);
            // odejmowanie od konta
            $kontoController->takeMoneyFromAccount($money,$idUser,$currency);
            // dodawanie do konta
            $kontoController->addMoneyToAccount($money,$userSenderAccountNumber,$currency);

        }
        return back();

    }
}
