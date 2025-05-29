<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fontana extends Model
{
    protected $table = 'fontane';
    protected $fillable = ['nome', 'lat', 'lon', 'img'];
    public $timestamps = false;
}