<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'balance'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}
