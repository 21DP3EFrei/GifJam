<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    protected $table = 'kategorija';
    protected $primaryKey = 'K_ID';
    protected $fillable = ['Nosaukums', 'Apraksts'];
}
