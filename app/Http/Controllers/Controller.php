<?php

namespace App\Http\Controllers;


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
}
