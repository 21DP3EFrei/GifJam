<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mem extends Model
{
    protected $table = 'mems';
    protected $primaryKey = 'M_ID';
    protected $fillable = ['Nosaukums', 'Apraksts', 'Fails', 'Autors', 'Autortiesibas', 'Status', 'Kategorija_ID'];

    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class, 'Kategorija_ID');
    }
}

