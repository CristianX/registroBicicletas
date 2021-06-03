<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NUMEROSERIE_BICICLETA',
        'IDENTIFICACION_USUARIO',
        'MARCA_BICICLETA',
        'MODELO_BICICLETA',
        'CATEGORIA_BICICLETA',
        'TIPOBICICLETA_BICICLETA',
        'TAMANIO_BICICLETA',
        'COMBCOLORES_BICICLETA',
        'ESPEC_BICICLETA',
        'FOTOFRONTAL_BICICLETA',
        'FOTOCOMPLETA_BICICLETA',
        'FOTONUMSERIE_BICICLETA',
        'FOTOCOMP_BICICLETA',
        'RUCTIENDA_BICICLETA',
        'DIRECCIONTIENDA_BICICLETA'
    ];
}
