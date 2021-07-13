<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel = "stylesheet" href = "{{mix ('css/style.css')}}">
    <title>Bicicletas</title>
</head>
<body>
    <div class="container" style="padding-bottom: 20px">
        <div class="row">
            <div class="col-md-11">
                <h2>Identificación: {{ $identificacion->NOMBRES_USUARIO }} {{ $identificacion->APELLIDOS_USUARIO }}</h2>
                <h2>Bicicletas Registradas:</h2>
            </div>
            <div class="col-md-1" style="padding-top: 40px">
                <a href="{{ route('usuarios.edit', [$regIdentificacion]) }}" type="button" class="btn btn-warning" style="float: right">
                    <i style="color:#515054 " class="fas fa-edit"></i>
                </a>
            </div>
        </div>
        <hr>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <a href="{{ route('welcome') }}" type="button" class="btn btn-danger" style="float: right">
            <i class="fas fa-sign-out-alt"></i>
        </a>
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
                  <th style="color: white" colspan="2"></th>
              </tr> 
            </thead>
            <tbody>
                @foreach ($bicicletas as $bicicleta)
                    @if ($bicicleta->ESTADO_BICICLETA != 0)
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
                              <a type="button" class="btn btn-outline-warning" href="{{ route('bicicletas.edit', ['bicicleta' => $bicicleta->id]) }}" style="color: black" onclick="editarBicicleta(event)">
                                  <i class="fas fa-edit" style="color:#515054"></i>
                              </a>
                            </td>
                            <td>
                              <a type="button" class="btn btn-outline-danger" style="color: black" onclick="eliminarBicicleta({{$bicicleta->id}})">
                                  <i class="fas fa-trash-alt" style="color:#515054"></i>
                              </a>
                            </td>
                        </tr>
                    @endif
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
                    <span>En caso de requerir mayor información, contactarse al correo xxxxxx@xxxxx.com o llamar al 3952300 ext. 14013</span>
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

    function eliminarBicicleta(id) {
        var url = "{{ route('bicicletas.delete', ['bicicleta' => 'idTemp']) }}";
        url = url.replace('idTemp', id);
        console.log(url)
        Swal.fire({
            title: 'Eliminar',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            confirmButtonColor: '#FF0000',
            cancelButtonText: 'Cancelar',
            // showLoaderOnConfirm: true,
            html: `
                <form method="POST" name="formularioEliminar" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="FECHANACIMIENTO_USUARIO" class="form-label">Ingrese su fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="txtDate" name="FECHANACIMIENTO_USUARIO">
                </form>
            `,
            didOpen: function() {

                var dtToday = new Date();
                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if(month < 10) {
                    month = "0" + month.toString();
                }
                if(day < 10) {
                    day = "0" + day.toString();
                }
                var date = year + "-" + month + "-" + day;
                document.getElementById('txtDate').value = date;

            },
        }).then((result)=>{
            document.formularioEliminar.action = url;
            if(result.isConfirmed) {
                document.formularioEliminar.submit();
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