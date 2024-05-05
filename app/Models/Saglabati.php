<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saglabati extends Model
{
    use HasFactory;

    protected $table = 'saglabati'; // Specify the table name if it's different from the model name

    protected $primaryKey = 'S_ID'; // Specify the primary key if it's different from 'id'

    protected $fillable = ['Lietotaja_ID', 'Me_ID']; // Specify the fillable fields

    public $timestamps = true; // Enable timestamps
}
