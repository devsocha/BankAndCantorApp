<?php

namespace App\Http\Controllers;

use App\Models\UserDemo;
use Illuminate\Http\Request;

class UserDemoController extends Controller
{
    public function getInformation(){
        $idUser = session()->get('idUser');
        $user = UserDemo::where('id',$idUser)->first();
        return $user;
    }
}
