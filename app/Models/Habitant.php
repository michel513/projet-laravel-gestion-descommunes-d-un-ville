<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitant extends Model
{
    protected $primaryKey = 'IdHabitant';
    protected $fillable = ['nomHabitant', 'PrenomHabitant', 'telephone', 'IdMaison'];

    public function maison()
    {
        return $this->belongsTo(Maison::class, 'IdMaison');
    }

    public function quartier()
    {
        return $this->belongsTo(Quartier::class, 'IdQuartier');
    }

    public function delegueQuartier()
    {
        return $this->hasOne(DelegueQuartier::class, 'IdHabitant');
    }
}
