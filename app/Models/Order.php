<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['Song_id', 'Invoice_id'];

    public function song()
    {
        return $this->belongsTo(Song::class, 'Song_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'Invoice_id');
    }
}
