<?php

namespace App\Models;

use App\Models\FormData;
use App\Models\LastRun;
use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    use HasFactory;

    protected $fillable = [
        'race_id',
        'name',
        'age',
        'sex',
        'color',
    ];

    protected $hidden = [
        'race_id',
        // 'id',
    ];

    public function lastRuns()
    {
        return $this->hasMany(LastRun::class);
    }

    public function formData()
    {
        return $this->hasMany(FormData::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

}
