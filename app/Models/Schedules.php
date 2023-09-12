<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $fillble = [
        'user_id',
        'date',
        'isPaied',
       'occurrency'
    ];


    public function report(){
        return $this->hasOne(Report::class);
    }
    public function attest(){
        return $this->hasOne(Atestado::class);
    }
    public function client(){
        return $this->hasOne(User::class);
    }

}
