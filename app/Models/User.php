<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Update the table name to match your database table
    protected $table = 'users';

    // Update the fillable attributes to match your database columns
    protected $fillable = ['Vards', 'E_pasts', 'Parole', 'Adminastrators'];

    // Any additional model methods can be added here
}
