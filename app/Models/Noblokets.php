<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Noblokets extends Model
{
    protected $table = 'noblokets';
    protected $primaryKey = 'B_ID';
    protected $fillable = ['L_ID', 'Blokets_lietotajs', 'Iemesls'];

    public function lietotajs()
    {
        return $this->belongsTo(User::class, 'L_ID');
    }
}
