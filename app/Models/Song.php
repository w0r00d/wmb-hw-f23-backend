<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = ['Title', 'Type', 'Price', 'ArtistId'];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'ArtistId');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'Song_id');
    }
}
