<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeroSemestre',
        'saison',
        'nbrSemaine',
    ];

    public function filieres()
    {
        return $this->hasMany(Filiere::class, 'idSemestre');
    }

    public function modules()
    {
        return $this->hasMany(Module::class, 'id_semestre');
    }
}