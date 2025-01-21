<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Zanrs extends Model
{
    use HasFactory;

    protected $table = 'zanrs';
    protected $primaryKey = 'Z_ID';
    protected $fillable = ['Nosaukums', 'Apraksts'];
    public function subgenre()
    {
        return $this->hasMany(Zanrs::class, 'Apakszanrs', 'Z_ID');
    }

    public function parent()
    {
        return $this->belongsTo(Zanrs::class, 'Apakszanrs', 'Z_ID');
    }
    public function musics()
{
    return $this->belongsToMany(Music::class, 'muzika_zanrs', 'Zanrs', 'Muzika');
}

}
