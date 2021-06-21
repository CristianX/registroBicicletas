<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Formulario de Usuarios</title>
    </head>
    <body>
        <div class="d-none d-sm-none d-md-block contenedorIzquierda">
            <div class="row" style="background-color: #124176">
                <div class="col-md-auto">
                    <img class="imagenIzquierda" src="{{ asset('/assets/bicicleta.png') }}" alt="bicicleta">
                </div>
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Ingrese sus Datos</h1>
                </div>
                <div class="col-md-auto contenedorDerecha">
                    <img src="{{ asset('/assets/bicicleta.png') }}" width="100px" alt="bicicleta">
                </div>
            </div>
        </div>
        <div class="d-block d-sm-block d-md-none">
            <div class="row" style="background-color: #124176">
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Ingrese sus Datos</h1>
                </div>
            </div>
        </div>
        
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="container">
            <form method="POST" action="{{ route('usuario.store') }}" style="padding: 10px" >
                @csrf
                <div class="mb-3">
                    <label for="identificacion" class="form-label">Identificación</label>
                    <input placeholder="Ingrese su identificación" type="text" pattern="\d*" class="form-control"name="IDENTIFICACION_USUARIO" maxlength="10" minlength="10" required>
                </div>
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input placeholder="Ingrese sus Nombres" type="text" class="form-control" name="NOMBRES_USUARIO" minlength="4" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input placeholder="Ingrese sus Apellidos" type="text" class="form-control" name="APELLIDOS_USUARIO" minlength="4" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad</label>
                    <input placeholder="Ingrese su Edad" type="number" min="18" max="120" step="1" class="form-control" name="EDAD_USUARIO" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Correo Electrónico</label>
                  <input placeholder="Ingrese su Correo Electrónico" type="email" class="form-control" name="EMAIL_USUARIO" required>
                </div>
                <div class="mb-3">
                    <label for="telefCelular" class="form-label">Teléfono Celular</label>
                    <input placeholder="Ingrese su teléfono celular" type="tel" pattern="\d*" class="form-control" minlength="10" maxlength="10" name="TELFCELULAR_USUARIO" required>
                </div>
                <div class="mb-3">
                    <label for="telefConvencional" class="form-label">Teléfono de Emergencia (Opcional)</label>
                    <input placeholder="Ingrese su teléfono convencional" type="tel" pattern="\d*" class="form-control" minlength="7" maxlength="9" name="TELFCONVENCIONAL_USUARIO">
                </div>
                <div class="mb-3">
                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    <input placeholder="Ingrese su Nacionalidad" type="text" class="form-control" name="NACIONALIDAD_USUARIO" minlength="4" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="PARROQUIARES_USUARIO" class="form-label">Porroquia donde Reside</label>
                    <select class="form-select" name="PARROQUIARES_USUARIO" required>
                        <option value="" selected disabled>Seleccione una Parróquia</option>
                        @foreach ($parroquias as $parroquia)
                            <option value="{{$parroquia}}">{{$parroquia}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="barrioDondeReside" class="form-label">Barrio donde Reside</label>
                    <input placeholder="Ingrese el Barrio donde Reside" type="text" class="form-control" name="BARRIORES_USUARIO" minlength="4" maxlength="600" required>
                </div>
                <button type="submit" class="btn btn-primary estiloBoton">Registrar</button>
            </form>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
</style>
