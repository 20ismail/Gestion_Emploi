<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Professeur extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'professeurs';
    /**
     * The attributes that are mass assignable.
     *
     
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numTelephone',
        'password',
        'type',
        'heuresEnseignementAnnee',
        'profileimage',
        'idDepartement',
        'idCoordonateur',
    ];

    /**
     * Get the departement that owns the professeur.
     */
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'idDepartement');
    }

    /**
     * Get the coordonateur that owns the professeur.
     */
    public function coordonateur()
    {
        return $this->belongsTo(Cordonateur::class, 'idCoordonateur');
    }
}