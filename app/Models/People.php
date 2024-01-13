<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
        'city',
        'postal_code'
    ];

    use HasFactory;
}
