<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Kategorija extends Model
{
    protected $fillable = ['Nosaukums', 'Apraksts', 'Apakskategorija']; 
    protected $table = 'kategorija'; 
    protected $primaryKey = 'K_ID';

    public function subcategories()
    {
        return $this->hasMany(Kategorija::class, 'Apakskategorija', 'K_ID');
    }

    public function parent()
    {
        return $this->belongsTo(Kategorija::class, 'Apakskategorija', 'K_ID');
    }
    public function medias()
{
    return $this->belongsToMany(Media::class, 'medija_kategorija', 'Kategorija_id', 'Medija_id');
}

use HasFactory;
}
