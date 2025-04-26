<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seat extends Model
{
    use HasFactory;
    protected $table = 'seats';
    protected $fillable = ['hall_id', 'row', 'number'];

    public function hall(): BelongsTo{
        return $this->belongsTo(Hall::class);
    }
}
