<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['Customer_Id', 'Date', 'Total', 'CreditCard'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'Customer_Id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'Invoice_id');
    }
}
