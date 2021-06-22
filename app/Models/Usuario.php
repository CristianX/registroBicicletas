<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "identificacion_usuario";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identificacion_usuario',
        'nombres_usuario',
        'apellidos_usuario',
        'edad_usuario',
        'email_usuario',
        'telfconvencional_usuario',
        'telfcelular_usuario',
        'nacionalidad_usuario',
        'parroquiares_usuario',
        'bsrriores_usuario',
    ];
    
}
