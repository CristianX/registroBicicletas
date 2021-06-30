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
    <div class="container" style="padding-bottom: 20px">
        <h1>Bicicletas con indentificación de {{ $identificacion->NOMBRES_USUARIO }} {{ $identificacion->APELLIDOS_USUARIO }}</h1>
        <hr>
        <a href="{{ route('welcome') }}" type="button" class="btn btn-danger" style="float: right">Salir</a>
        <br><br>
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
                  <th style="color: white">Registro</th>
                  <th style="color: white">Estado</th>
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
                          <td>{{ $bicicleta->CODREGISTRO_BICICLETA }}</td>
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
    <footer>
        <div class="d-none d-sm-none d-md-block">
            <div class="row">
                <div class="col-1">
                    <img src="{{ asset('/assets/LogoSecretaria.png') }}" width="150px" style="padding-left: 10px" alt="bicicleta">
                </div>
                <div class="col-11 contenedorCentro">
                    <span>En caso de necesitar mayor información comunicarse al: xxxxx@xxxxx.com</span>
                </div>
            </div>
        </div>
        
    </footer>
</body>
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
            confirmButtonText: 'Editar',
            confirmButtonColor: '#124176',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.value) {
                window.location.href=url;
            }
        })
    }
</script>
</html>

<style class="text/css">
    .estiloCabecera {
        color: #212529;
        text-decoration: none;
    }
    .estiloFooter {
        align-items: flex-start;
        text-align: center
    }
    .contenedorCentro{
        justify-content: center;
        text-align: center;
        padding-top: 12px;
        color: white;

    }

    html {
      min-height: 100%;
      position: relative;
    }

    body {
      margin: 0;
      margin-bottom: 40px;
    }

    footer {
        background-color: #124176;
        position: fixed;
        bottom: 0;
        width: 100%;
        color: white;
    }

</style>