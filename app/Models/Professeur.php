<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\NewProfesseurNotification;

class Professeur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'professeurs';

    protected $fillable = [
        'heuresEnseignementAnnee',
        'image',
        'nom',
        'prenom',
        'email',
        'numTelephone',
        'password',
        'type',
        'id_admin',
        'id_departement'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }

    protected static function booted()
    {
        static::created(function ($professeur) {
            \Log::info('New Professeur created: ' . $professeur->nom);
            \Log::info('Admin: ' . $professeur->admin->nom);
            $professeur->admin->notify(new NewProfesseurNotification($professeur));
        });
    }
    
}
