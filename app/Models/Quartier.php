<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quartier extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdQuartier';

    protected $fillable = ['nomQuartier', 'IdCommune'];

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'IdCommune');
    }

    public function delegueQuartier()
    {
        return $this->hasOne(DelegueQuartier::class, 'IdQuartier');
    }

    public function maisons()
    {
        return $this->hasMany(Maison::class, 'IdQuartier');
    }

    public function habitants()
    {
        return $this->hasMany(Habitant::class, 'IdQuartier');
    }
}
