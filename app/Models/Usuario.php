<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "IDENTIFICACION_USUARIO";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDENTIFICACION_USUARIO',
        'NOMBRES_USUARIO',
        'APELLIDOS_USUARIO',
        'EDAD_USUARIO',
        'EMAIL_USUARIO',
        'TELFCONVENCIONAL_USUARIO',
        'TELFCELULAR_USUARIO',
        'NACIONALIDAD_USUARIO',
        'PARROQUIARES_USUARIO',
        'BARRIORES_USUARIO',
    ];
    
}
