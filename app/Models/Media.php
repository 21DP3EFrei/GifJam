<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Storage;
use App\Models\Model\Favorites;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medija';
    protected $primaryKey = 'Me_ID';
    protected $fillable = ['Nosaukums', 'Apraksts', 'Status', 'Fails', 'Multivides_tips', 'Autors', 'Autortiesibas'];


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

    protected static function booted()
    {
        static::deleted(function ($file) {
            Storage::delete($file->Fails);
        });
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites',  'Multivide', 'Lietotajs');
    }
}

