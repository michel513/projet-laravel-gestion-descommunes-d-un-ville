<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelegueQuartier extends Model
{
    use HasFactory;

    protected $primaryKey = 'IdDelegue';
    protected $fillable = ['IdHabitant'];

    public function habitant()
    {
        return $this->belongsTo(Habitant::class, 'IdHabitant');
    }
}
