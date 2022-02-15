<?php

namespace App\Models;

use App\Models\Meeting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_id',
        'name',
    ];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
}
