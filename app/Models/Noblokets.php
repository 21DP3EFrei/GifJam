<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Noblokets extends Model
{
    use HasFactory;

    protected $table = 'noblokets';
    protected $primaryKey = 'B_ID';
    protected $fillable = ['L_ID', 'Blokets', 'Iemesls'];

    public function lietotajs()
    {
        return $this->belongsTo(User::class, 'L_ID');
    }
}