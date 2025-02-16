<?php

namespace App\Models;

use App\Http\Controllers\MuzikaController;
use App\Http\Controllers\SkanasController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medija';
    protected $primaryKey = 'Me_ID';
    protected $fillable = ['Nosaukums', 'Apraksts', 'Status', 'Fails', 'Failu tips', 'Augsupielades tips' , 'Autors', 'Autortiesibas'];


    public function kategorijas()
    {
        return $this->belongsToMany(Kategorija::class, 'medija_kategorija', 'Medija_id', 'Kategorija_id');
    }
    public function skana()
    {
        return $this->hasOne(Skana::class, 'Medija', 'Me_ID'); 
    }

    public function music()
    {
        return $this->hasOne(Music::class, 'Medija', 'Me_ID'); 
    }
    
    public function user()
    { 
        return $this->belongsTo(User::class, 'Lietotajs', 'id' );
    }

}

