<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'intitule',
        'nbr_groupes',
        'idfiliere',
        'idsemestre',
        'RestGroupe',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($composant) {
            $composant->RestGroupe = $composant->intitule; // Set RestGroupe to the value of intitule
        });
    }
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'idfiliere');
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'idsemestre');
    }
}