<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = "tickets";
    protected $fillable = [
        'user_id',
        'screening_id',
        'seat_id',
        'qr_code',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function screening(){
        return $this->belongsTo(Screening::class);
    }

    public function seat(){
        return $this->belongsTo(Seat::class);
    }
}
