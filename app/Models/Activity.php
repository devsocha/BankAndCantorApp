<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'userId',
        'type',
        'currency',
        'inorout',
        'transform',
        'transto',
        'sendTo',
        'sendFrom',
        'money',
        'moneyTransfered',
        'created_at',
    ];
}
