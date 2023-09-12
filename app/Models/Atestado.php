<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atestado extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedules_id',
        'fidelity',
        'days',
        'condition',
    ];

    public function schedule() {
        $this->belongsToMany(Schedule::class);

    }
}
