<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Registro Completado</title>
</head>
<body>
    <div class="centrado">
      <div class="cabecera">
        <h1 style="color: #3C763D">Su registro ha entrado en fase de validación.</h1>
        <h3 style="color: #31708F">Pronto nos contactaremos con usted.</h3>
        <div class="card">
          <div class="visible-print text-center">
            {!! 
              QrCode::format('png')->merge("\public\assets\bicicletaQR.png", .3)->size(150)->generate(
                'Marca Bicicleta: '.$bicicleta->MARCA_BICICLETA."\n".
                'Número de Serie: '.$bicicleta->NUMEROSERIE_BICICLETA."\n".
                'Modelo Bicicleta: '.$bicicleta->MODELO_BICICLETA."\n".
                'Categoría Bicicleta: '.$bicicleta->CATEGORIA_BICICLETA."\n".
                'Tipo de Bicicleta:' .$bicicleta->TIPOBICICLETA_BICICLETA."\n".
                'Tamaño de la Bicicleta: '.$bicicleta->TAMANIO_BICICLETA."\n".
                'Combinación de Colores: '.$bicicleta->COMBCOLORES_BICICLETA."\n".
                'Especificaciones: '.$bicicleta->ESPEC_BICICLETA."\n".
                'Apoderado Bicicleta:'. $bicicleta->APODERADO_BICICLETA
              );
            !!}
          </div>
        </div>
        <br>
        <h3 style="color: #31708F">¿Desea ingresar otra bicicleta?</h3>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-6">        
            <a class="btn btn-primary btn-block" style="width: 100%" href="{{ route('bicicleta.index', ['identificacion' => $bicicleta->IDENTIFICACION_USUARIO]) }}">Si</a>
          </div>
          <div class="col-6">
            <a class="btn btn-danger btn-block" style="width: 100%" href="{{ route('bicicleta.mostrarBicicletasPorId', ['identificacion' => $bicicleta->IDENTIFICACION_USUARIO]) }}">No</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<style type="text/css">

  .centrado {
    flex-direction: column;
    background: #DFF0D8;
    height: 250px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 15%;
    margin-right: 7%;
    margin-left: 7%;
    border-radius: 10px;
    box-shadow: 2px 2px 10px #666;
  }
  .cabecera {
    flex-direction: column;
    justify-content: center;
    text-align: center;
    align-items: center;
    padding-bottom: 20px;
  }
  .izquierdo {
    left: 20;
  }


</style>