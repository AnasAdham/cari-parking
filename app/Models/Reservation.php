<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservation_user',
        'reservation_parking',
        'reservation_date',
        'reservation_start',
        'reservation_end'
    ];

    public function parking()
    {
        return $this->hasOne(Parking::class, 'id', 'reservation_parking');
    }
}
