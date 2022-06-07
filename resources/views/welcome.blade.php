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
            <div class="col-sm-8 imagen">
            {{-- <img src="{{ asset('/assets/izquierda_inicio.svg') }}" style="width: 60%"> --}}
            </div>
            <div class="col-sm-4 formulario">
                <div class="card cardFormulario">
                    <div class="content-box" style="background-color: #4CBBCE; color: white; width: 100%; text-align: center; padding-top: 10px; padding-bottom: 10px; ">
                        <h4 style="font-weight: bold">Registro de bicicletas</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group" style="text-align: center;">
                            <div class="row align-items-center" style="padding: 5px">
                                <div class="col-sm-2">
                                    <i class="fas fa-id-card fa-2x" style="color: #4CBBCE"></i>
                                </div>
                                <div class="col-sm-10" style="text-align: left">
                                    <label for="notificacion" class="form-label">
                                        Ingresa tu C.I. o Pasaporte
                                    </label>
                                </div>
                            </div>
                            <form method="GET" action="{{ route('welcome.pasarRegBIcicletas') }}">
                                <div class="form-floating mb-3 ">
                                    <input name="identificacion" style="width: 100%;" id="identificacion" placeholder="Ingrese su Identificación" type="text" pattern="\d*" class="form-control" autocomplete="off" maxlength="15" minlength="5" required>
                                    <label for="identificacion" style="color: #bdbdbd; margin-left: 5%">C.I./Pasaporte</label>
                                </div>
                                <button class="btn btn-primary" type="submit" >Registrate/Ingresa</button>
                            </form>
                            <br>
                            <div class="row align-items-center">
                                <div class="col-sm-2">
                                    <i class="fas fa-barcode fa-2x" style="color: #4CBBCE"></i>
                                </div>
                                <div class="col-sm-10" style="text-align: left">
                                    <label for="notificacionCodRegistro" class="form-label">Consulta por Código<br/>de registro</label>
                                </div>
                            </div>
                            {{-- <label style="text-align: start" for="notificacionCodRegistro" class="form-label">o Nº de Serie</label> --}}
                            <div class="form-floating mb-3">
                                <input name="codRegistro" style="width: 100%;" id="codRegistro" placeholder="Ingrese su Identificación" type="text" class="form-control" autocomplete="off" maxlength="40" minlength="10" required>
                                <label for="codRegistro" style="color: #bdbdbd; margin-left: 5%">Código de Registro</label>
                                @if (session('error'))
                                    <small class="text-danger">{{ session('error') }}</small>
                                @endif
                            </div>
                            <a type="button" class="btn openModal" style="background-color: #4CBBCE; border-color: #716dd4; border-radius: 30px; color: white">Consultar</a>
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
    {{-- Modal --}}
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 20px; overflow: hidden; background-color: rgba(255, 255, 255, 0.85);">
                <div class="modal-header" id="cabecera-modal" style="background-color: #4CBBCE;">
                    {{-- <h3 class="col-12 text-center" style="font-weight: bold; color: white">Bicicleta Marca</h3> --}}
                </div>
                <div class="modal-body" id="cuerpo-modal">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>

<style type="text/css">
    .imagen {
        padding-top: 15%;
        text-align: left;
    }
    .formulario {
        
        padding-top: 3%;
        padding-right: 4%;
    }
    .cardFormulario {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        border-radius: 25px;
        /* box-shadow: 5px 5px 10px black; */
        width: 100%;
        height: 100%;
        /* background-color: red; */
        /* background-image:url("{{ asset('/assets/wheel.png') }}"); */
        background-size: contain;
        overflow: hidden;
        background-color: rgba(255, 255, 255, 0.75);
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
        /* position: fixed; */
        /* left: 0;
        top: 0;
        width: 100%;
        height: 100%; */
        background-image: url('/assets/FondoPantallaPrincipal1.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {

        // get_bici_data()

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // // Obtener data de la bicicleta
        // function get_bici_data() {
        //     $.ajax({
        //         url: '{{ route('welcome.consulta') }}',
        //         type: 'GET',
        //         data: { },
        //         success: function (data) {
        //             console.log(data)
        //         }
        //     });
        // }
        $('.openModal').on('click', function () {
            var codigoBicicleta = document.getElementById('codRegistro').value;
            // console.log(JSON.stringify(get_bici_data(codigoBicicleta)));
            get_bici_data(codigoBicicleta);
            document.getElementById('codRegistro').value = null;
        });

        function get_bici_data(codigo) {
            var url = "{{ route('bicicleta.consulta', ['codRegistro' => 'codigoTemp']) }}";
            url = url.replace('codigoTemp', codigo);
            console.log(url);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    MostrarModal(data); 
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    if(codigo != "") {
                        alert('No se encontró ninguna bicicleta con ese código de registro');
                    } else {
                        alert('Debe ingresar un código de registro');
                    }
                }
            });
        };

        function MostrarModal(data) {
            $("#cabecera-modal").html(
                `<h3 class="col-12 text-center" style="font-weight: bold; color: white">Bicicleta Marca ${data.bicicleta.MARCA_BICICLETA}</h3>`
            );

            if (data.bicicleta.ACTIVAROBADA_BICICLETA == 0) {
                $("#cuerpo-modal").html(
                    `<div class="row" style="padding-top: 20px">
                        <div class="col" style="text-align: center; padding-left: 50px; padding-right: 50px">
                            <div class="col">
                                <img src="${data.bicicleta.FOTOCOMPLETA_BICICLETA}" height="220px" alt="bicicleta" style="border-radius: 20px">
                            </div>
                            <div class="col">
                                <h3 style="background-color: green; color: white; border-radius: 20px">
                                    ACTIVA
                                </h3>
                            </div>
                        </div>
                        <div class="col" style="margin-left: 20px">
                            <div class="col">
                                <p>
                                    <b>Registrada con identificación de</b> <br>
                                    <i>${data.usuario.NOMBRES_USUARIO} ${data.usuario.APELLIDOS_USUARIO}</i>
                                </p>
                            </div>
                            <div class="col">
                                <p>
                                    <b>Nombre del Apoderado</b><br>
                                    <i>${data.bicicleta.APODERADO_BICICLETA}</i>
                                </p>
                            </div>
                            <div class="col">
                                <p>
                                    <b>Número de Celular</b><br>
                                    <i>${data.usuario.TELFCELULAR_USUARIO}</i>
                                </p>
                            </div>
                            <div class="col">
                                <p>
                                    <b>Correo Electrónico</b><br>
                                    <i>${data.usuario.EMAIL_USUARIO}</i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-left: 10px; margin-right: 10px">
                    <p style="text-align: center; color: #FF5900">
                        En caso de requerir mayor información, contactarse al <br>
                        correo xxxxxx@xxxxx.com o llamar al 3952300 ext. 14013
                    </p>`
                );  
            } else {
                $("#cuerpo-modal").html(
                    `<div class="row" style="padding-top: 20px">
                        <div class="col" style="text-align: center; padding-left: 50px; padding-right: 50px">
                            <div class="col">
                                <img src="${data.bicicleta.FOTOCOMPLETA_BICICLETA}" height="220px" alt="bicicleta" style="border-radius: 20px">
                            </div>
                            <div class="col">
                                <h3 style="background-color: red; color: white; border-radius: 20px">
                                    ROBADA
                                </h3>
                            </div>
                        </div>
                        <div class="col" style="margin-left: 20px">
                            <div class="col">
                                <p>
                                    <b>Registrada con identificación de</b> <br>
                                    <i>${data.usuario.NOMBRES_USUARIO} ${data.usuario.APELLIDOS_USUARIO}</i>
                                </p>
                            </div>
                            <div class="col">
                                <p>
                                    <b>Nombre del Apoderado</b><br>
                                    <i>${data.bicicleta.APODERADO_BICICLETA}</i>
                                </p>
                            </div>
                            <div class="col">
                                <p>
                                    <b>Número de Celular</b><br>
                                    <i>${data.usuario.TELFCELULAR_USUARIO}</i>
                                </p>
                            </div>
                            <div class="col">
                                <p>
                                    <b>Correo Electrónico</b><br>
                                    <i>${data.usuario.EMAIL_USUARIO}</i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-left: 10px; margin-right: 10px">
                    <p style="text-align: center; color: #FF5900">
                        En caso de requerir mayor información, contactarse al <br>
                        correo xxxxxx@xxxxx.com o llamar al 3952300 ext. 14013
                    </p>`
                );  
                 
            }
            $('#modal-id').modal('show');
        };
    });
</script>
