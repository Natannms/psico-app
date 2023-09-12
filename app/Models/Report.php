<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'report'
    ];


    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
}
