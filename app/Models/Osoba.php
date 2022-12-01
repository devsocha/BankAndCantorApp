<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osoba extends Model
{
    protected $fillable=[
        'imie',
        'nazwisko',
        'miasto',
    ];
    use HasFactory;
    public function UserDemo(){
        return $this->belongsTo(UserDemo::class,'osoba_id','id');
    }
}
