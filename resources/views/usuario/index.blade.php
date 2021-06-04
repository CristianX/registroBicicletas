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
        <form style="padding: 10px" >
            <div class="mb-3">
                <label for="identificacion" class="form-label">Identificación</label>
                <input placeholder="Ingrese su identificación" type="text" class="form-control" id="identificacion">
            </div>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input placeholder="Ingrese sus Nombres" type="text" class="form-control" id="nombres">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input placeholder="Ingrese su Correo Electrónico" type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="telefConvencional" class="form-label">Teléfono Convencional</label>
                <input placeholder="Ingrese su teléfono convencional" type="number" class="form-control" id="telefConvencional">
            </div>
            <div class="mb-3">
                <label for="telefCelular" class="form-label">Teléfono Celular</label>
                <input placeholder="Ingrese su teléfono celular" type="number" class="form-control" id="telefCelular">
            </div>
            <div class="mb-3">
                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                <input placeholder="Ingrese su Nacionalidad" type="text" class="form-control" id="nacionalidad">
            </div>
            <div class="mb-3">
                <label for="parroquiaReside" class="form-label">Parroquia donde Reside</label>
                <input placeholder="Ingrese la Parroquia donde Reside" type="text" class="form-control" id="parroquiaReside">
            </div>
            <div class="mb-3">
                <label for="barrioDondeReside" class="form-label">Barrio donde Reside</label>
                <input placeholder="Ingrese el Barrio donde Reside" type="text" class="form-control" id="barrioDondeReside">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
          <table>
              <thead>Datos de Usuarios</thead>
              <tbody></tbody>
          </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
