<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserDemo extends Model
{
    protected $fillable=[
        'id',
        'login',
        'haslo',
        'osoba_id',
        'konto_id',
    ];
    use HasFactory;
    public function Osoba(){
        return $this->hasOne(Osoba::class,'id','osoba_id');
    }
    public function Konto(){
        return $this->hasOne(Konto::class,'id','konto_id');
    }
}
