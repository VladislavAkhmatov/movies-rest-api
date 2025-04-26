<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hall extends Model
{
    use HasFactory;

    protected $table = 'halls';
    protected $fillable = ['name', 'rows', 'seats_per_row'];

    public function seats(){
        return $this->hasMany(Seat::class);
    }
}
