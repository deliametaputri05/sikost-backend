<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'room_id', 'quantity', 'total', 'status', 'payment_url', 'dateBooking'
    ];

    public function room()
    {
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)->getPreciseTimestamp(3);
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::parse($updated_at)->getPreciseTimestamp(3);
    }
}
