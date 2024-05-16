<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdMaison';
    protected $fillable = ['surface', 'rue'];

    public function quartier()
    {
        return $this->belongsTo(Quartier::class, 'IdQuartier');
    }

    public function habitants()
    {
        return $this->hasMany(Habitant::class, 'IdMaison');
    }
}
