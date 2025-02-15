<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Kategorija extends Model
{
    protected $fillable = ['Nosaukums', 'Apraksts', 'Apakskategorija']; 
    protected $table = 'kategorija'; 
    protected $primaryKey = 'K_ID';

    // This sets up the relationship for child categories
    public function subcategories()
    {
        return $this->hasMany(Kategorija::class, 'Apakskategorija', 'K_ID'); // Foreign key is Apakskategorija and local key is K_ID
    }

    // This sets up the relationship for parent category
    public function parent()
    {
        return $this->belongsTo(Kategorija::class, 'Apakskategorija', 'K_ID'); // Apakskategorija is the foreign key, K_ID is the local key
    }

    // Many-to-many relationship with Media
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'medija_kategorija', 'Kategorija_id', 'Medija_id');
    }

use HasFactory;
}
