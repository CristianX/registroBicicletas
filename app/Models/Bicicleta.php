<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "numeroserie_bicicleta";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numeroserie_bicicleta',
        'identificacion_usuario',
        'marca_bicicleta',
        'modelo_bicicleta',
        'categoria_bicicleta',
        'tipobicicleta_bicicleta',
        'tamanio_bicicleta',
        'combcolores_bicicleta',
        'espec_bicicleta',
        'fotofrontal_bicicleta',
        'fotocompleta_bicicleta',
        'fotonumserie_bicicleta',
        'fotocomp_bicicleta',
        'apoderado_bicicleta',
        'ructienda_bicicleta',
        'direcciontienda_bicicleta'
    ];
}
