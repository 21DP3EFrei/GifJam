<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noblokets extends Model
{
    protected $table = 'noblokets';
    protected $primaryKey = 'B_ID';
    protected $fillable = ['L_ID', 'Blokets_lietotajs', 'Iemesls'];

    public function lietotajs()
    {
        return $this->belongsTo(Lietotajs::class, 'L_ID');
    }
}
