<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    {{-- CSS personalizado --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
    <title>Consulta</title>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="vertical-align: middle; padding-top: 5%">
    <div class="card cardContenedorForm">
      <div class="content-box" style="background-color: #4CBBCE; color: white; width: 100%; text-align: center; padding-top: 10px; padding-bottom: 10px; ">
        <h3 style="font-weight: bold">Bicicleta Marca {{ $bicicleta->MARCA_BICICLETA }}</h3>
      </div>
      <div class="row" style="padding-top: 20px">
        <div class="col" style="text-align: center; padding-left: 50px; padding-right: 50px">
          <div class="col">
            <img src="{{ asset($bicicleta->FOTOCOMPLETA_BICICLETA) }}" height="220px" alt="bicicleta" style="border-radius: 20px">
          </div>
          <div class="col">
            @if ($bicicleta->ACTIVAROBADA_BICICLETA == 0)
                <h3 style="background-color: green; color: white; border-radius: 20px">
                    ACTIVA
                </h3>
            @else
                <h3 style="background-color: red; color: white; border-radius: 20px">
                    ROBADA
                </h3>
            @endif
          </div>
        </div>
        <div class="col" style="margin-left: 20px">
          <div class="col">
            <p>
              <b>Registrada con identificación de</b> <br>
              <i>{{ $usuario->NOMBRES_USUARIO }} {{ $usuario->APELLIDOS_USUARIO }}</i>
            </p>
          </div>
          <div class="col">
            <p>
              <b>Nombre del Apoderado</b> <br>
              <i>{{ $bicicleta->APODERADO_BICICLETA }}</i>
            </p>
          </div>
          <div class="col">
            <p>
              <b>Número de Celular</b> <br>
              <i>{{ $usuario->TELFCELULAR_USUARIO }}</i>
            </p>
          </div>
          <div class="col">
            <p>
              <b>Correo Electrónico</b> <br>
              <i>{{ $usuario->EMAIL_USUARIO }}</i>
            </p>
          </div>
        </div>
      </div>
      <hr style="margin-left: 10px; margin-right: 10px">
      <p style="text-align: center; color: #FF5900">
        En caso de requerir mayor información, contactarse al <br>
         correo xxxxxx@xxxxx.com o llamar al 3952300 ext. 14013
      </p>
    </div>
  </div>
    {{-- <div class="centrado">
        <h1 style="color: #3C763D">Bicicleta marca {{ $bicicleta->MARCA_BICICLETA }}</h1>
      <div class="cabecera">
        <h3 style="color: #31708F">Estado:
          @if ($bicicleta->ACTIVAROBADA_BICICLETA == 1)
            <span style="color: red" >Robada</span>
          @else
            <span style="color: green" >Activa</span>
          @endif
        </h3>
        <h3 style="color: #31708F">Registrada con identificación de: {{ $usuario->NOMBRES_USUARIO }} {{ $usuario->APELLIDOS_USUARIO }} </h3>
        <h3 style="color: #31708F">Nombre del Apoderado: {{ $bicicleta->APODERADO_BICICLETA }} </h3>
        <h3 style="color: #31708F">Número de Celular: {{ $usuario->TELFCELULAR_USUARIO }} </h3>
        <h3 style="color: #31708F">Correo Electrónico: {{ $usuario->EMAIL_USUARIO }} </h3>
        <h3 style="color: #FA8500">En caso de requerir mayor información, contactarse al correo xxxxxx@xxxxx.com o llamar al 3952300 ext. 14013</h3>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">        
            <a class="btn btn-primary btn-block" style="width: 100%" href="{{ route('welcome') }}">Inicio</a>
          </div>
        </div>
      </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<style type="text/css">

  .cardContenedorForm{
    overflow: hidden;
    /* background-color: bisque;  */
    background-size: contain;
    width: 80%;
    border-radius: 30px;
    background-color: #FFFFF0;
    margin-bottom: 30px;
    box-shadow: 2px 2px 10px #666;
  }


</style>