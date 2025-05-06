<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skana_kategorija extends Model
{
    protected $table = 'skanas_kategorija';
    protected $primaryKey = 'SKat_ID';
    protected $fillable = ['Nosaukums', 'Apraksts', 'Apakskategorija'];
    public function subcategory()
    {
        return $this->hasMany(Skana_kategorija::class, 'Apakskategorija', 'SKat_ID');
    }

    public function parent()
    {
        return $this->belongsTo(Skana_kategorija::class, 'Apakskategorija', 'SKat_ID');
    }
    public function sounds()
    {
        return $this->belongsToMany(Skana::class, 'skana_un_kategorija', 'Kategorija', 'Skana');
    }

use HasFactory;
}
