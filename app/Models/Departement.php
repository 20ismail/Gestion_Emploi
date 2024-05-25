<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Departement extends Model
{
    use HasFactory;

    protected $table = 'departements';

    protected $fillable = [
        'intitule'
    ];

    // Example of a relationship method if Departement has many Professeurs
    public function professeurs()
    {
        return $this->hasMany(Professeur::class, 'id_departement');
    }
}