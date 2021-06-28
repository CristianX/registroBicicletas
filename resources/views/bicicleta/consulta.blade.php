<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Consulta</title>
</head>
<body>
    <div class="centrado">
        <h1 style="color: #3C763D">Bicicleta marca {{ $bicicleta->MARCA_BICICLETA }}</h1>
      <div class="cabecera">
        <h3 style="color: #31708F">Estado: {{ $bicicleta->ACTIVAROBADA_BICICLETA == 1 ? 'Robada' : 'Activa' }}</h3>
        <h3 style="color: #31708F">Registrada con identificación de: {{ $usuario->NOMBRES_USUARIO }} {{ $usuario->APELLIDOS_USUARIO }} </h3>
        <h3 style="color: #31708F">Nombre del Apoderado: {{ $bicicleta->APODERADO_BICICLETA }} </h3>
        <h3 style="color: #31708F">Número de Celular: {{ $usuario->TELFCELULAR_USUARIO }} </h3>
        <h3 style="color: #31708F">Correo Electrónico: {{ $usuario->EMAIL_USUARIO }} </h3>
        <h3 style="color: #31708F">Mensaje: </h3>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">        
            <a class="btn btn-primary btn-block" style="width: 100%" href="{{ route('welcome') }}">Inicio</a>
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
    padding-bottom: 40px;
    padding-top: 20px;
  }
  .izquierdo {
    left: 20;
  }


</style>