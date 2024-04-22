<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $hidden = ['password', 'timestamps', 'email_verified_at','remember_token'];
    protected $fillable = ['username', 'fname', 'lname','address','email','password'];
}
