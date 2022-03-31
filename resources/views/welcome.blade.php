<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   {{-- CSS personalizado --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
    <link rel = "stylesheet" href = "{{mix ('css/style.css')}}">
    <title>Inicio</title>
</head>
{{-- vh Altura de la ventana gráfica --}}
<body class="background_image" style="min-height: 100vh">
    <div>
        <div class="d-none d-sm-none d-md-block contenedorIzquierda">
            <div class="row" style="background-color: #FFFFFF; width: 100%; margin: 0%; padding-top: 5px">
                <div class="col-sm-4">
                    <img src="{{ asset('/assets/logo_secretariaBN.png') }}" width="auto" height="50px">
                </div>
                <div class="col-sm-4" style="text-align: center">
                    {{-- <img src="{{ asset('/assets/sello_quito.png') }}" width="auto" height="60px" style="padding-bottom: 5px"> --}}
                </div>
                <div class="col-sm-4" style="text-align: right">
                    <img src="{{ asset('/assets/CabeceraInicio.svg') }}" width="auto" height="60px">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-7 imagen">
                <img src="{{ asset('/assets/Bicentenario.png') }}" style="width: 90%">
                </div>
                <div class="col-sm-5 formulario">
                    <div class="card cardFormulario">
                        <div class="content-box" style="background-color: #09D7DF; color: white; width: 100%; text-align: center; padding-top: 10px; padding-bottom: 10px; ">
                            <h3 style="font-weight: bold">Registro de bicicletas</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group" style="text-align: center;">
                                <i class="fas fa-id-card fa-2x" style="color: #09D7DF; padding: 10px; vertical-align: middle"></i>
                                <label style="text-align: start; te;" for="notificacion" class="form-label">
                                    Ingresa tu C.I. o Pasaporte
                                </label>
                                <br>
                                <form method="GET" action="{{ route('welcome.pasarRegBIcicletas') }}">
                                    <div class="form-floating mb-3">
                                        <input name="identificacion" style="width: 100%;" id="identificacion" placeholder="Ingrese su Identificación" type="text" pattern="\d*" class="form-control" maxlength="15" minlength="5" required>
                                        <label for="identificacion" style="color: #bdbdbd; margin-left: 5%">C.I./Pasaporte</label>
                                    </div>
                                    <button class="btn btn-primary" type="submit" >Registrate/Ingresa</button>
                                </form>
                                <br>
                                <i class="fas fa-barcode fa-2x" style="color: #09D7DF; padding: 10px; vertical-align: middle"></i>
                                <label style="text-align: start" for="notificacionCodRegistro" class="form-label">Consulta por Código de Registro</label>
                                {{-- <label style="text-align: start" for="notificacionCodRegistro" class="form-label">o Nº de Serie</label> --}}
                                <form method="GET" action="{{ route('welcome.consulta') }}">
                                    <div class="form-floating mb-3">
                                        <input name="codRegistro" style="width: 100%;" id="codRegistro" placeholder="Ingrese su Identificación" type="text" class="form-control" maxlength="40" minlength="10" required>
                                        <label for="codRegistro" style="color: #bdbdbd; margin-left: 5%">Código de Registro</label>
                                        @if (session('error'))
                                            <small class="text-danger">{{ session('error') }}</small>
                                        @endif
                                    </div>
                                    <button class="btn btn-primary" type="submit" >Consultar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer style="position: fixed; bottom: 0; width: 100%; background-color: #FFFFFF; overflow: hidden">
        <div style="text-align: center; margin: 7px">
            <img src="{{ asset('/assets/SecretariaMovilidad.svg') }}" width="auto" height="40px">
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>

<style type="text/css">
    .imagen {
        padding-top: 12%;
    }
    .formulario {
        
        padding-top: 6%;
        padding-right: 4%;
    }
    .cardFormulario {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        border-radius: 10%;
        /* box-shadow: 5px 5px 10px black; */
        width: 80%;
        height: 100%;
        /* background-color: red; */
        /* background-image:url("{{ asset('/assets/wheel.png') }}"); */
        background-size: contain;
        overflow: hidden;
        background-color: rgba(255, 255, 255, 0.6);
    }
    /* .background_image {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-image: url('/assets/Fondo_1.png');
    } */
    .background_image {
        background-image: url("{{ asset('/assets/iconografia.png') }}");
        /* background-color: red; */
        background-repeat: no-repeat;
        background-position: bottom right;
        background-size: 80%;
    }
</style>