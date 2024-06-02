<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulePrefere extends Model
{
    use HasFactory;

    protected $table = 'moduleprefere';

    protected $fillable = [
        'professeur_id',
        'semestre',
        'filiere',
        'module',
        'activity_type',
        'groupes',
        'heureassigne',
        'heureannee',
        'groupesRester',
    ];

   
}