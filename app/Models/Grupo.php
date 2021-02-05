<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable=[
        'curso',
        'letra',
        'nombre',
        'tutor',
        'anyoescolar',
        'nivel',
        'verificado',
        'creador'
    ];

    /**
     * Devuelve el nivel al que pertenece un grupo.
     */
    public function nivelEstudios()
    {
        return $this->belongsTo(Nivel::class, 'nivel');
    }

    /**
     * Los usarios matriculadores en un determinado grupo.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'matriculas', 'grupo', 'alumno'); // Intercambiamos el orden de grupo y alumno. Aquí es grupo - alumno y en user es alumno - grupo.
    }

}
