<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        {{-- CSS personalizado --}}
        <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
        <title>Edición de Usuario</title>
    </head>
    <body class="background_image" style="min-height: 100vh">
        {{-- <div class="d-none d-sm-none d-md-block contenedorIzquierda">
            <div class="row" style="background-color: #124176">
                <div class="col-md-auto">
                    <img class="imagenIzquierda" src="{{ asset('/assets/bicicleta.png') }}" alt="bicicleta">
                </div>
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Edición de datos</h1>
                </div>
                <div class="col-md-auto contenedorDerecha">
                    <img src="{{ asset('/assets/bicicleta.png') }}" width="100px" alt="bicicleta">
                </div>
            </div>
        </div> --}}
        <div class="d-none d-sm-none d-md-block stylePadre">
            <img src="{{ asset('/assets/LogoMunicipioColor.svg') }}" width="auto" height="70px" style="margin-top: 10px">
        </div>
        {{-- <div class="d-block d-sm-block d-md-none">
            <div class="row" style="background-color: #124176">
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Edición de datos</h1>
                </div>
            </div>
        </div> --}}
        
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="container d-flex justify-content-center align-items-center" style="vertical-align: middle; padding-top: 30px">
            <div class="card cardContenedorForm">
                <div class="content-box" style="background-color: #4CBBCE; color: white; width: 100%; text-align: center; padding-top: 10px; padding-bottom: 10px; ">
                    <h3 style="font-weight: bold">EDICIÓN DE DATOS</h3>
                </div>
                <form method="POST" action="{{ route('usuarios.update',['usuario' => $identificacion]) }}" enctype="multipart/form-data" style="padding: 10px" >
                    @csrf
                    @method('PUT')
                    {{-- <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input value="{{ $usuario->EDAD_USUARIO }}" type="number" min="18" max="120" step="1" class="form-control" name="EDAD_USUARIO" required>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input value="{{ $usuario->EMAIL_USUARIO }}" type="email" class="form-control" name="EMAIL_USUARIO" required>
                              </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="telefCelular" class="form-label">Teléfono Celular</label>
                                <input value="{{ $usuario->TELFCELULAR_USUARIO }}" type="tel" pattern="\d*" class="form-control" minlength="10" maxlength="10" name="TELFCELULAR_USUARIO" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="PARROQUIARES_USUARIO" class="form-label">Parroquia donde Reside</label>
                            <select class="form-select" name="PARROQUIARES_USUARIO" required>
                                {{-- <option value="" disabled>Seleccione una Parróquia</option> --}}
                                @foreach ($parroquias as $parroquia)
                                    <option {{ $parroquia == $usuario->PARROQUIARES_USUARIO ? 'selected' : '' }} value="{{$parroquia}}">{{$parroquia}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="barrioDondeReside" class="form-label">Barrio donde Reside</label>
                                <input value="{{ $usuario->BARRIORES_USUARIO }}" type="text" class="form-control" name="BARRIORES_USUARIO" minlength="4" maxlength="600" required>
                            </div>
                        </div>
                        <div class="col" style="display: flex; align-items: center">
                            <button type="submit" style="width: 100%; height: 65%; font-weight: bold" class="btn btn-primary estiloBoton">Actualizar Datos</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- <div class="container">
            <form method="POST" action="{{ route('usuarios.update',['usuario' => $identificacion]) }}" enctype="multipart/form-data" style="padding: 10px" >
                @csrf
                @method('PUT') --}}
                {{-- <div class="mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input value="{{ $usuario->EDAD_USUARIO }}" type="number" min="18" max="120" step="1" class="form-control" name="EDAD_USUARIO" required>
                </div> --}}
                {{-- <div class="mb-3">
                  <label for="email" class="form-label">Correo Electrónico</label>
                  <input value="{{ $usuario->EMAIL_USUARIO }}" type="email" class="form-control" name="EMAIL_USUARIO" required>
                </div>
                <div class="mb-3">
                    <label for="telefCelular" class="form-label">Teléfono Celular</label>
                    <input value="{{ $usuario->TELFCELULAR_USUARIO }}" type="tel" pattern="\d*" class="form-control" minlength="10" maxlength="10" name="TELFCELULAR_USUARIO" required>
                </div>
                <div class="mb-3">
                    <label for="PARROQUIARES_USUARIO" class="form-label">Parroquia donde Reside</label>
                    <select class="form-select" name="PARROQUIARES_USUARIO" required> --}}
                        {{-- <option value="" disabled>Seleccione una Parróquia</option> --}}
                        {{-- @foreach ($parroquias as $parroquia)
                            <option {{ $parroquia == $usuario->PARROQUIARES_USUARIO ? 'selected' : '' }} value="{{$parroquia}}">{{$parroquia}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="barrioDondeReside" class="form-label">Barrio donde Reside</label>
                    <input value="{{ $usuario->BARRIORES_USUARIO }}" type="text" class="form-control" name="BARRIORES_USUARIO" minlength="4" maxlength="600" required>
                </div>
                <button type="submit" class="btn btn-primary estiloBoton">Actualizar Datos</button>
            </form>
        </div> --}}
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <footer>
            <div class="d-none d-sm-none d-md-block" style="padding-top: 50px; text-align: center">
                <img src="{{ asset('/assets/LogoRUBQMonoColor.svg') }}" width="auto" height="50px" style="float: middle; margin-left: 250px">
            </div>
        </footer>
    </body>
</html>

<style class="text/css">
    .contenedorIzquierda {
        justify-content: left;
    }
    .imagenIzquierda {
        padding-left: 20px;
        width: 120px;
    }
    .contenedorCentro{
        justify-content: center;
        padding-right: 10px;
        padding-left: 10px;
    }
    .contenedorDerecha {
        padding-right: 20px;
    }
    .estiloTexto {
        color: white;
    }
    .estiloBoton {
        width: 100%;
        background-color: #124176;
    }
    .stylePadre {
        width: 100%; 
        background-color: white; 
        text-align: center;
    }
    .cardContenedorForm{
        overflow: hidden;
        /* background-color: bisque;  */
        background-size: contain;
        width: 75%;
        border-radius: 30px;
        background-color: rgba(255, 255, 255, 0.75);
    }
    .background_image {
        /* position: fixed; */
        /* left: 0;
        top: 0;
        width: 100%;
        height: 100%; */
        background-image: url('/assets/FondoFormularioRegistro.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<script class="text/javascript">

    // Restriccion fecha
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    var maxYear = year - 18;
    if(month < 10) {
        month = "0" + month.toString();
    }
    if(day < 10) {
        day = "0" + day.toString();
    }

    var maxDate = maxYear + "-" + month + "-" + day;
    var minYear = year - 120;
    var minDate = minYear + "-" + month + "-" + day;
    document.querySelectorAll("#txtDate")[0].setAttribute("max", maxDate);
    document.querySelectorAll("#txtDate")[0].setAttribute("min", minDate);


</script>
