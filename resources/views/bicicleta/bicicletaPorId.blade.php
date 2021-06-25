<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Bicicletas</title>
</head>
<body>
    <div class="container">
        <h1>Bicicletas con indentificación de {{ $identificacion->NOMBRES_USUARIO }} {{ $identificacion->APELLIDOS_USUARIO }}</h1>
        <hr>
        <table class="table table table-bordered table-hover sortable">
            <thead style="background-color: #124176">
              <tr>
                  <th style="color: white">Apoderado</th>
                  <th style="color: white">Marca</th>
                  <th style="color: white">Modelo</th>
                  <th style="color: white">Categoría</th>
                  <th style="color: white">Tipo</th>
                  <th style="color: white">Tamaño</th>
                  <th style="color: white">Colores</th>
                  <th style="color: white">Especificaciones</th>
                  <th style="color: white">Activa/Robada</th>
                  <th style="color: white"></th>
              </tr> 
            </thead>
            <tbody>
                @foreach ($bicicletas as $bicicleta)
                      <tr>
                          <td>{{ $bicicleta->APODERADO_BICICLETA }}</td>
                          <td>{{ $bicicleta->MARCA_BICICLETA }}</td>
                          <td>{{ $bicicleta->MODELO_BICICLETA }}</td>
                          <td>{{ $bicicleta->CATEGORIA_BICICLETA }}</td>
                          <td>{{ $bicicleta->TIPOBICICLETA_BICICLETA }}</td>
                          <td>{{ $bicicleta->TAMANIO_BICICLETA }}</td>
                          <td>{{ $bicicleta->COMBCOLORES_BICICLETA }}</td>
                          <td>{{ $bicicleta->ESPEC_BICICLETA }}</td>
                          <td>
                              @if ($bicicleta->ACTIVAROBADA_BICICLETA == 0)
                                  <span style="color: green" >Activa</span>
                              @else
                                  <span style="color: red" >Robada</span>
                              @endif
                          </td>
                          <td>
                              <a type="button" class="btn btn-outline-warning" href="{{ route('bicicletas.edit', ['bicicleta' => $bicicleta->id]) }}" style="color: black" onclick="editarBicicleta(event)">Editar</a>
                          </td>
                      </tr>
                @endforeach
                
            </tbody>
        </table>
        <a type="button" class="btn btn-success float-right" href="{{ route('bicicleta.index', [$regIdentificacion]) }}">Nuevo Registro</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="/js/sorttable.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function editarBicicleta(e) {
        
            e.preventDefault();
            var url = e.currentTarget.getAttribute('href');

            Swal.fire({
                title: 'Editar',
                text: '¿Está seguro que desea editar la información de esta bicicleta?',
                icon: 'warning',
                showCancelButton: true,
                // html: `
                //     <select class="form-select" id="descripcionBicicleta" name="PREGUNTA_SEGURIDAD">
                //         <option value="" selected disabled>Seleccione una PREGUNTA</option>
                //         <option value="pregunta1">Pregunta 1</option>
                //         <option value="pregunta2">Pregunta 2</option>
                //         <option value="pregunta3">Pregunta 3</option>
                //     </select>
                //     <br>
                //     <input type="password" id="password" class="form-control" placeholder="Password">
                //     `,
                confirmButtonText: 'Editar',
                confirmButtonColor: '#124176',
                cancelButtonText: 'Cancelar'
                // TODO: SI ES NECESARIO ELIMINAR ;
            }).then((result) => {
                if(result.value) {
                    window.location.href=url;
                }
            })
            // .then((result)=>{
            //     if(result.isConfirmed) {
            //         Swal.fire(
            //             document.getElementById('descripcionBicicleta').value,
            //         )
            //     } else if (result.dismiss === Swal.DismissReason.cancel) {
            //         Swal.fire(
            //             'Cancelado',
            //             'Your imaginary file is safe',
            //             'error'
            //         )
            //     }
            // })
        }
    </script>
</body>
</html>

<style class="text/css">
    .estiloCabecera {
        color: #212529;
        text-decoration: none;
    }
</style>