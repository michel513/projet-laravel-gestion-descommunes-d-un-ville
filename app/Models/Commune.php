<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdCommune';
    protected $fillable = ['NomCommune'];

    public function quartiers()
    {
        return $this->hasMany(Quartier::class, 'IdCommune');
    }
}
