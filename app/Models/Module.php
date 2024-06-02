<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule_module',
        'heuresCours',
        'heuresTD',
        'heuresTP',
        'niveau',
        'id_prof',
        'id_semestre',
        'id_filiere',
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'id_prof');
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'id_semestre');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
}