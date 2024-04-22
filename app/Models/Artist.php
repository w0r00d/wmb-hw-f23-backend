<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = ['Fname', 'Lname', 'gender', 'country'];

    public function songs()
    {
        return $this->hasMany(Song::class, 'ArtistId');
    }
}
