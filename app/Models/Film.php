<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $fillable = [
        'title',
        'description',
        'duration_minute',
        'poster_url',
        'release_date',
        'genres_ids',
    ];

    public function genres(): BelongsToMany{
        return $this->belongsToMany(Genre::class);
    }
}
