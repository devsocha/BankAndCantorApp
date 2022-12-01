<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konto extends Model
{
    protected $fillable =[
        'id',
        'kontoEUR',
        'kontoUSD',
        'kontoPLN',
    ];
    use HasFactory;
    public function UserDemo(){
        return $this->belongsTo(UserDemo::class,'konto_id','id');
    }
}
