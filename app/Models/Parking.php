<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;
    protected $fillable = [
        'parking_name',
        'parking_status',
    ];

    public function reservation()
    {
        return $this->belongsTo(Parking::class)->withDefault();
    }
}
