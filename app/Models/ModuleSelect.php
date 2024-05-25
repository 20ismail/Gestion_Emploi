<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleSelect extends Model
{
    use HasFactory;

    protected $table = 'moduleselect';

    protected $fillable = [
        'professeur_id',
        'semestre',
        'filiere',
        'module',
        'activity_type',
        'groupes',
    ];

    protected $casts = [
        'groupes' => 'array',
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
}



}
