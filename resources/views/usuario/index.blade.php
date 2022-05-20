<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
        <link rel = "stylesheet" href = "{{mix ('css/style.css')}}">
        <title>Formulario de Usuarios</title>
    </head>
    <body class="background_image" style="min-height: 100vh">
        <div class="d-none d-sm-none d-md-block stylePadre">
            <img src="{{ asset('/assets/LogoFormularioRegistro.svg') }}" width="auto" height="50px" style="margin-top: 5px; margin-bottom: 5px">
        </div>
        <div class="d-block d-sm-block d-md-none">
            <div class="row" style="background-color: #124176">
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Ingresa tus Datos</h1>
                </div>
            </div>
        </div>
        
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="container d-flex justify-content-center align-items-center" style="vertical-align: middle; padding-top: 30px">
            <div class="card cardContenedorForm">
                <div class="content-box" style="background-color: #4CBBCE; color: white; width: 100%; text-align: center; padding-top: 10px; padding-bottom: 10px; ">
                    <h3 style="font-weight: bold">Ingresa tus Datos</h3>
                </div>
                <form method="POST" action="{{ route('usuario.store') }}" style="padding: 10px" >
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-user fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="nombres" class="form-label">Nombres</label>
                                    </div>
                                </div>
                                <input placeholder="Ingrese sus Nombres" value="{{ $primerNombre }} {{ $segundoNombre }}" type="text" class="form-control" name="NOMBRES_USUARIO" minlength="4" maxlength="200" required readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-user fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                    </div>
                                </div>
                                <input placeholder="Ingrese sus Apellidos" value="{{ $apellidoPaterno }} {{ $apellidoMaterno }}" type="text" class="form-control" name="APELLIDOS_USUARIO" minlength="4" maxlength="200" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-id-card fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="identificacion" class="form-label">C.I./Pasaporte</label>
                                    </div>
                                </div>
                                <input placeholder="Ingrese su identificación" value="{{ $cedula }}" type="text" pattern="\d*" class="form-control"name="IDENTIFICACION_USUARIO" maxlength="15" minlength="5" required readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-user fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="FECHANACIMIENTO_USUARIO" class="form-label">Fecha de Nacimiento</label>
                                    </div>
                                </div>
                                <input type="date" value="{{ date('Y-m-d', strtotime($fechaNacimiento)) }}" class="form-control" id="txtDate" name="FECHANACIMIENTO_USUARIO" required readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-id-card fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                    </div>
                                </div>
                                <input placeholder="Ingrese su Nacionalidad" value="{{ $nacionalidad }}" type="text" class="form-control" name="NACIONALIDAD_USUARIO" minlength="4" maxlength="200" required readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-id-card fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="email" class="form-label">Correo Electrónico</label>
                                    </div>
                                </div>
                                <input placeholder="Ingrese su Correo Electrónico" type="email" class="form-control" name="EMAIL_USUARIO" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-id-card fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="telefCelular" class="form-label">Teléfono Celular</label>
                                    </div>
                                </div>
                                <input placeholder="Ingrese su teléfono celular" type="tel" pattern="\d*" class="form-control" minlength="10" maxlength="10" name="TELFCELULAR_USUARIO" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-id-card fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="telefConvencional" class="form-label">Teléfono de Emergencia</label>
                                    </div>
                                </div>
                                <input placeholder="Ingrese su teléfono convencional" type="tel" pattern="\d*" class="form-control" minlength="7" maxlength="10" name="TELFCONVENCIONAL_USUARIO" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-id-card fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="PARROQUIARES_USUARIO" class="form-label">Parroquia donde Reside</label>
                                    </div>
                                </div>
                                <select class="form-select" name="PARROQUIARES_USUARIO" required>
                                    <option value="" selected disabled>Seleccione una Parróquia</option>
                                    @foreach ($parroquias as $parroquia)
                                        <option value="{{$parroquia}}">{{$parroquia}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="row align-items-center" style="padding: 5px">
                                    <div class="col-sm-2">
                                        <i class="fas fa-id-card fa-2x" style="color: #4CBBCE"></i>
                                    </div>
                                    <div class="col-sm-10">
                                        <label for="barrioDondeReside" class="form-label">Barrio donde Reside</label>
                                    </div>
                                </div>
                                <input placeholder="Ingrese el Barrio donde Reside" type="text" class="form-control" name="BARRIORES_USUARIO" minlength="4" maxlength="600" required>
                            </div>
                        </div>
                        <div class="col contenedorBoton">
                            <button type="submit" class="btn btn-primary btn-lg estiloBoton">Registrar</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
        <footer>
            <div class="d-none d-sm-none d-md-block styleFooter">
                <img src="{{ asset('/assets/LogoRUBQMonoColor.svg') }}" width="auto" height="50px" style="float: middle; margin-left: 250px">
                <img src="{{ asset('/assets/LogoQuitoBlanco.svg') }}" width="auto" height="50px" style="float: right; margin-right: 30px">
            </div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>

<style class="text/css">
    .abs-center {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
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

    /* Nuevos */
    .cardContenedorForm{
        overflow: hidden;
        /* background-color: bisque;  */
        background-size: contain;
        width: 75%;
        border-radius: 30px;
        background-color: rgba(255, 255, 255, 0.75);
    }

    .contenedorBoton {
        display: flex;
        align-items: center;
    }
    .estiloBoton {
        width: 100%;
        height: 65%;
        font-weight: bold;
        
    }

    .estiloBoton:hover{
        background-color: #4a44e4;
        border-color: #716dd4;
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
    .stylePadre {
        width: 100%; 
        background-color: white; 
        text-align: center;
        padding-bottom: 5px;
    }

    .styleFooter {
        width: 100%; 
        /* background-color: white;  */
        text-align: center;
        padding-bottom: 5px;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

</style>

<script class="text/javascript">

    // Restriccion fecha
    // var dtToday = new Date();
    // var month = dtToday.getMonth() + 1;
    // var day = dtToday.getDate();
    // var year = dtToday.getFullYear();
    // var maxYear = year - 18;
    // if(month < 10) {
    //     month = "0" + month.toString();
    // }
    // if(day < 10) {
    //     day = "0" + day.toString();
    // }

    // var maxDate = maxYear + "-" + month + "-" + day;
    // var minYear = year - 120;
    // var minDate = minYear + "-" + month + "-" + day;
    // document.querySelectorAll("#txtDate")[0].setAttribute("max", maxDate);
    // document.querySelectorAll("#txtDate")[0].setAttribute("min", minDate);


</script>
