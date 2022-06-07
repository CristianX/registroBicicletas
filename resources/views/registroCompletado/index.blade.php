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

  <div class="container d-flex justify-content-center align-items-center" style="vertical-align: middle; padding-top: 5%">
    <div class="card cardContenedorForm">
      <div class="content-box" style="background-color: #4CBBCE; color: white; width: 100%; text-align: center; padding-top: 10px; padding-bottom: 10px; ">
        <h1 style="font-weight: bold">REGISTRO COMPLETADO</h1>
      </div>
      <div class="row" style="text-align: center; padding-top: 20px">
        <h2>Su registro ha sido existoso, pronto recibirá un correo con el QR de su bicicleta!</h2>
      </div>
      <div class="row" style="text-align: center; padding-top: 20px">
        <h3 style="color: #606060">¿Desea registrar otra bicicleta?</h3>
      </div>
      <div class="row" style="padding-top: 20px; padding-bottom: 30px; text-align: center">
        <div class="col">
          <a class="btn btn-block" style="width: 50%; border-radius: 30px; background-color: #4CBBCE" href="{{ route('bicicleta.index', ['identificacion' => $bicicleta->IDENTIFICACION_USUARIO]) }}">
            <h3 style="font-weight: bold; color: white">SI</h3>
          </a>
        </div>
        <div class="col">
          <a class="btn btn-danger btn-block" style="width: 50%; border-radius: 30px; background-color: #FF0000" href="{{ route('bicicleta.mostrarBicicletasPorId', ['identificacion' => $bicicleta->IDENTIFICACION_USUARIO]) }}">
            <h3 style="font-weight: bolt; color: white">NO</h3>
          </a>
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
  .cardContenedorForm{
    overflow: hidden;
    /* background-color: bisque;  */
    background-size: contain;
    width: 100%;
    border-radius: 30px;
    background-color: #FFFFF0;
    margin-bottom: 30px;
    box-shadow: 2px 2px 10px #666;
  }


</style>