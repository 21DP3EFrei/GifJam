<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mem extends Model
{
    use HasFactory;

    protected $table = 'mems';
    protected $primaryKey = 'M_ID';
    protected $fillable = ['Nosaukums', 'Apraksts', 'Attels', 'Autors', 'Autortiesibas', 'Status', 'Kategorija_ID'];
    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class, 'Kategorija_ID');
    }
}

