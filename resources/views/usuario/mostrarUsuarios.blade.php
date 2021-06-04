<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Mostrar Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <hr>
    <table>
        <thead class="thead-light">
          <tr>
              <th>Identificación</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Edad</th>
              <th>Correo Electrónico</th>
              <th>Teléfono Convencional</th>
              <th>Teléfono Celular</th>
              <th>Nacionalidad</th>
              <th>Parroquia de Residencia</th>
              <th>Barrio de Residencia</th>
          </tr> 
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                  <tr>
                      <td>{{ $usuario->IDENTIFICACION_USUARIO }}</td>
                      <td>{{ $usuario->NOMBRES_USUARIO }}</td>
                      <td>{{ $usuario->APELLIDOS_USUARIO }}</td>
                      <td>{{ $usuario->EDAD_USUARIO }}</td>
                      <td>{{ $usuario->EMAIL_USUARIO }}</td>
                      <td>{{ $usuario->TELFCONVENCIONAL_USUARIO }}</td>
                      <td>{{ $usuario->TELFCELULAR_USUARIO }}</td>
                      <td>{{ $usuario->NACIONALIDAD_USUARIO }}</td>
                      <td>{{ $usuario->PARROQUIARES_USUARIO }}</td>
                      <td>{{ $usuario->BARRIORES_USUARIO }}</td>
                  </tr>
            @endforeach
            
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>