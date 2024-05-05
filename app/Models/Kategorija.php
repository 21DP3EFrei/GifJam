<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    protected $fillable = ['Nosaukums', 'Apraksts']; 
    protected $table = 'kategorija'; // Ensure table name matches the actual table name in your database

    // Specify the custom primary key
    protected $primaryKey = 'K_ID';

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'kategorija_ID');
    }
}
