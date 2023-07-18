<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    protected $table = 'students'; 
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // ...
}
