<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <div class="background_image">
        <img src="{{ asset('/assets/Cabecera.png') }}" width="100%" height="80px" alt="">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 imagen">
                <img src="{{ asset('/assets/Bicentenario.png') }}" style="width: 90%">
                </div>
                <div class="col-sm-4 formulario">
                    <div class="card cardFormulario">
                        <div class="card-body">
                            <div class="form-group" style="text-align: center">
                                <h5>Registro de bicicletas</h5>
                                <label style="text-align: start" for="notificacion" class="form-label">Ingrese su C.I. o Pasaporte</label>
                                <br>
                                <form method="GET" action="{{ route('welcome.pasarRegBIcicletas') }}">
                                    <div class="form-floating mb-3">
                                        <input name="identificacion" id="identificacion" placeholder="Ingrese su Identificación" type="text" pattern="\d*" class="form-control" maxlength="15" minlength="5" required>
                                        <label for="identificacion" style="color: #bdbdbd">C.I./Pasaporte</label>
                                    </div>
                                    <button class="btn btn-primary" type="submit" >Registrarse/Ingresar</button>
                                </form>
                                <br>
                                <label style="text-align: start" for="notificacionCodRegistro" class="form-label">Consulta por Código de Registro</label>
                                <label style="text-align: start" for="notificacionCodRegistro" class="form-label">O Número de Serie</label>
                                <form method="GET" action="{{ route('welcome.consulta') }}">
                                    <div class="form-floating mb-3">
                                        <input name="codRegistro" id="codRegistro" placeholder="Ingrese su Identificación" type="text" class="form-control" maxlength="10" minlength="10" required>
                                        <label for="codRegistro" style="color: #bdbdbd">Código de Registro</label>
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
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<style type="text/css">
    .imagen {
        padding-top: 12%;
    }
    .formulario {
        
        padding-top: 8%;
        padding-right: 4%;
    }
    .cardFormulario {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: 5px 5px 10px black;
    }
    .background_image {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-image: url('/assets/Fondo_1.png');
    }
</style>