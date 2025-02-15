<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['Nosaukums', 'Apraksts', 'kategorija_id'];
    protected $table = 'Apakskategorija'; // Specify the name of the subcategories table
    
    // Define the relationship with Kategorija model
    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class, 'kategorija_id', 'K_ID');
    }
}
