<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Screening extends Model
{
    use HasFactory;
    protected $table = 'screenings';
    protected $fillable = ['film_id', 'hall_id', 'start_time', 'price'];
    public function film(): BelongsTo{
        return $this->belongsTo(Film::class);
    }

    public function hall(): BelongsTo{
        return $this->belongsTo(Hall::class);
    }
}
