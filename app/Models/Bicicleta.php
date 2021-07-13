<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{

    use HasFactory;
    public $timestamps = false;
    // public $incrementing = false;
    // protected $primaryKey = "NUMEROSERIE_BICICLETA";
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
        'APODERADO_BICICLETA',
        'RAZONSOCIAL_BICICLETA',
        'RUC_BICICLETA',
        'FOTOFACTURA_BICICLETA',
        'DESCUSADA_BICICLETA',
        'NOMBUSADA_BICICLETA',
        'ACTIVAROBADA_BICICLETA',
        'FOTODENUNCIA_BICICLETA',
        'CODREGISTRO_BICICLETA',
        'ESTADO_BICICLETA',
    ];
}
