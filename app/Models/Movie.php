<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        "title",
        "synopsis",
        "year",
        "link",
        "cover",
        "category_id"
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}