<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'administrateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numTelephone',
        'password',
        'type'
    ];
}
