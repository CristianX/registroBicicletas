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
              <th>Número de Serie</th>
              <th>Identiicación</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Categoría</th>
              <th>Tipo</th>
              <th>Tamaño</th>
              <th>Combinación de Colores</th>
              <th>Especificacíones</th>
          </tr> 
        </thead>
        <tbody>
            @foreach ($bicicletas as $bicicleta)
                  <tr>
                      <td>{{ $bicicleta->numeroserie_bicicleta }}</td>
                      <td>{{ $bicicleta->identificacion_usuario }}</td>
                      <td>{{ $bicicleta->marca_bicicleta }}</td>
                      <td>{{ $bicicleta->modelo_bicicleta }}</td>
                      <td>{{ $bicicleta->categoria_bicicleta }}</td>
                      <td>{{ $bicicleta->tipobicicleta_bicicleta }}</td>
                      <td>{{ $bicicleta->tamanio_bicicleta }}</td>
                      <td>{{ $bicicleta->combcolores_bicicleta }}</td>
                      <td>{{ $bicicleta->espec_bicicleta }}</td>
                  </tr>
            @endforeach
            
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>