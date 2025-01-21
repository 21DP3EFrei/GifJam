<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\MediaController;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'muzika';
    protected $primaryKey = 'Mu_ID';
    protected $fillable = ['Garums', 'Izlaists', 'Bitrate'];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function zanrs()
    {
        return $this->belongsToMany(Zanrs::class, 'muzika_zanrs', 'Muzika', 'Zanrs');
    }
}
