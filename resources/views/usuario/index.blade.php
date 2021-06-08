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
        <h1 style="text-align: center" >Registro de Usuarios</h1>
        <hr>
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
                    <label for="telefConvencional" class="form-label">Teléfono Convencional</label>
                    <input placeholder="Ingrese su teléfono convencional" type="tel" pattern="\d*" class="form-control" minlength="7" maxlength="9" name="TELFCONVENCIONAL_USUARIO" required>
                </div>
                <div class="mb-3">
                    <label for="telefCelular" class="form-label">Teléfono Celular</label>
                    <input placeholder="Ingrese su teléfono celular" type="tel" pattern="\d*" class="form-control" minlength="10" maxlength="10" name="TELFCELULAR_USUARIO" required>
                </div>
                <div class="mb-3">
                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    <input placeholder="Ingrese su Nacionalidad" type="text" class="form-control" name="NACIONALIDAD_USUARIO" minlength="4" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="parroquiaReside" class="form-label">Parroquia donde Reside</label>
                    <input placeholder="Ingrese la Parroquia donde Reside" type="text" class="form-control" name="PARROQUIARES_USUARIO" minlength="4" maxlength="600" required>
                </div>
                <div class="mb-3">
                    <label for="barrioDondeReside" class="form-label">Barrio donde Reside</label>
                    <input placeholder="Ingrese el Barrio donde Reside" type="text" class="form-control" name="BARRIORES_USUARIO" minlength="4" maxlength="600" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
