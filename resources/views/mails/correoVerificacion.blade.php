<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo prueba</title>
</head>
<body>

    <div class="container">
        <h1>{{ $bicicleta->IDENTIFICACION_USUARIO }}</h1>
        <hr>
        <p>El correo de prueba ha sido enviado</p>
        <p>No responder</p>
        <img src="data:image/png;base64, {!! base64_encode(
            QrCode::format('png')
            ->errorCorrection('H')
            ->gradient(255, 51, 51, 0, 7, 233, 'horizontal')
            ->merge('\public\assets\bicicletaQR(1).png', .3)
            ->size(200)
            ->generate(
              'Marca Bicicleta: '.$bicicleta->MARCA_BICICLETA."\n".
              'Número de Serie: '.$bicicleta->NUMEROSERIE_BICICLETA."\n".
              'Modelo Bicicleta: '.$bicicleta->MODELO_BICICLETA."\n".
              'Categoría Bicicleta: '.$bicicleta->CATEGORIA_BICICLETA."\n".
              'Tipo de Bicicleta:' .$bicicleta->TIPOBICICLETA_BICICLETA."\n".
              'Tamaño de la Bicicleta: '.$bicicleta->TAMANIO_BICICLETA."\n".
              'Combinación de Colores: '.$bicicleta->COMBCOLORES_BICICLETA."\n".
              'Especificaciones: '.$bicicleta->ESPEC_BICICLETA."\n".
              'Apoderado Bicicleta:'. $bicicleta->APODERADO_BICICLETA
            )) !!}">
    </div>

    

</body>
</html>