<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastRun extends Model
{
    use HasFactory;

    protected $fillable = [
        'runner_id',
        'last_race',
        'location',
    ];
}
