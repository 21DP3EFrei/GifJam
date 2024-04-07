<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lietotajs extends Model
{
    protected $table = 'lietotaji';
    protected $primaryKey = 'L_ID';
    protected $fillable = ['Vards', 'E_pasts', 'Parole', 'Adminastrators'];
    // Any additional model methods can be added here
}
