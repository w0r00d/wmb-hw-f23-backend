<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{    use HasApiTokens;
    use HasFactory;
    protected $hidden = ['password', 'timestamps', 'email_verified_at','remember_token'];
    protected $fillable = ['username', 'fname', 'lname','address','email','password'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'Customer_Id');
    }
}
