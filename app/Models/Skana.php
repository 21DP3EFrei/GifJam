<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Skana extends Model
{
    use HasFactory;

    protected $table = 'skana';
    protected $primaryKey = 'Sk_ID';
    protected $fillable = ['Bitrate'];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function skanaKategorija()
    {
        return $this->belongsToMany(Skana_kategorija::class, 'skana_un_kategorija', 'Skana', 'Kategorija');
    }
    public $timestamps = false;

}
