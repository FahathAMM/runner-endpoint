<?php

namespace App\Models;

use App\Models\Race;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'speaker',
        'date',
    ];

    public function testR()
    {
        return $this->belongsTo(Race::class);
    }
}
