<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Edición de Bicicletas</title>
    </head>
    <body>
        <div class="d-none d-sm-none d-md-block contenedorIzquierda">
            <div class="row" style="background-color: #124176">
                <div class="col-md-auto">
                    <img class="imagenIzquierda" src="{{ asset('/assets/bicicleta.png') }}" alt="bicicleta">
                </div>
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Edición de bicicleta marca : {{ $bicicleta->MARCA_BICICLETA }} {{ $bicicleta->MODELO_BICICLETA }}</h1>
                </div>
                <div class="col-md-auto contenedorDerecha">
                    <img src="{{ asset('/assets/bicicleta.png') }}" width="100px" alt="bicicleta">
                </div>
            </div>
        </div>
        <div class="d-block d-sm-block d-md-none">
            <div class="row" style="background-color: #124176">
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Edición de bicicleta {{ $bicicleta->MARCA_BICICLETA }} {{ $bicicleta->MODELO_BICICLETA }}</h1>
                </div>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="container">
            <form method="POST" action="{{ route('bicicletas.update',['bicicleta' => $bicicleta->id]) }}" enctype="multipart/form-data" style="padding: 10px" >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input value="{{ $bicicleta->MARCA_BICICLETA }}" type="text" class="form-control" name="MARCA_BICICLETA" minlength="3" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input value="{{ $bicicleta->MODELO_BICICLETA }}" type="text" class="form-control" name="MODELO_BICICLETA" minlength="4" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="nserie" class="form-label">Número de Serie o chasis de la Bicicleta</label>
                    <input value="{{ $bicicleta->NUMEROSERIE_BICICLETA }}" type="text" class="form-control" name="NUMEROSERIE_BICICLETA" minlength="4" maxlength="40" required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Gama o Categoría</label>
                    <select class="form-select" name="CATEGORIA_BICICLETA" required>
                        <option {{ $bicicleta->CATEGORIA_BICICLETA == 'alta' ? 'selected' : '' }} value="alta">Alta</option>
                        <option {{ $bicicleta->CATEGORIA_BICICLETA == 'media' ? 'selected' : '' }} value="media">Media</option>
                        <option {{ $bicicleta->CATEGORIA_BICICLETA == 'baja' ? 'selected' : '' }} value="baja">Baja</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipoBicicleta" class="form-label">Tipo de Bicicleta</label>
                    <select class="form-select" name="TIPOBICICLETA_BICICLETA" required>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'montania' ? 'selected' : '' }} value="montania">Montaña</option>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'urbana' ? 'selected' : '' }} value="urbana">Urbana</option>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'carretera' ? 'selected' : '' }} value="carretera">Carretera</option>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'freestyle' ? 'selected' : '' }} value="freestyle">Freestyle</option>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'electrica' ? 'selected' : '' }} value="electrica">Eléctrica</option>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'biciCargo' ? 'selected' : '' }} value="biciCargo">Bici Cargo</option>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'plegable' ? 'selected' : '' }} value="plegable">Plegable</option>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'nino' ? 'selected' : '' }} value="nino">Niña/o</option>
                        <option {{ $bicicleta->TIPOBICICLETA_BICICLETA == 'otro' ? 'selected' : '' }} value="otro">Otro</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tamanio" class="form-label">Tamaño</label>
                    <select class="form-select" name="TAMANIO_BICICLETA" required>
                        <option {{ $bicicleta->TAMANIO_BICICLETA == 'large' ? 'selected' : '' }} value="large">Large</option>
                        <option {{ $bicicleta->TAMANIO_BICICLETA == 'medium' ? 'selected' : '' }} value="medium">Medium</option>
                        <option {{ $bicicleta->TAMANIO_BICICLETA == 'small' ? 'selected' : '' }} value="small">Small</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="combColores" class="form-label">Combinación de Colores</label>
                    <input value="{{ $bicicleta->COMBCOLORES_BICICLETA }}" type="text" class="form-control" name="COMBCOLORES_BICICLETA" minlength="4" maxlength="600" required>
                </div>
                <div class="mb-3">
                    <label for="especBicicleta" class="form-label">Especificaciónes de la Bicicleta</label>
                    <textarea type="text" class="form-control" name="ESPEC_BICICLETA" minlength="4" maxlength="600" required>{{ $bicicleta->ESPEC_BICICLETA }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">¿Desea registrar esta bicicleta a nombre de otra persona? (Menor de Edad / Empleado) </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="ocultarCampoHijo()" {{ $bicicleta->APODERADO_BICICLETA == $usuario->NOMBRES_USUARIO.' '.$usuario->APELLIDOS_USUARIO ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexRadioDefault2">
                          No
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="mostrarCampoHijo()" {{ $bicicleta->APODERADO_BICICLETA != $usuario->NOMBRES_USUARIO.' '.$usuario->APELLIDOS_USUARIO ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Si
                        </label>
                    </div>
                </div>
                <div class="mb-3" id="nombreDuenio">
                    <label class="form-label">Nombres completos de la Persona</label>
                    <input id="campoNombreDuenio" value="{{ $bicicleta->APODERADO_BICICLETA }}" type="text" class="form-control" name="APODERADO_BICICLETA" minlength="4" maxlength="400">
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="ACTIVAROBADA_BICICLETA" {{ $bicicleta->ACTIVAROBADA_BICICLETA == 1 ? 'checked' : '' }}  >
                        <label class="form-check-label" for="flexSwitchCheckDefault">
                            <span id="activa">Activa</span>
                            <span id="robada">Robada</span>
                        </label>
                    </div>
                </div>
                <div id="divDenuncia">
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fotoDenuncia" class="form-label">Notificación de la denuncia (Opcional)</label>
                                    <br>
                                    <input type="file" name="FOTODENUNCIA_BICICLETA" id="fotoDenuncia" accept="image/*,application/pdf">
                                    @error('FOTODENUNCIA_BICICLETA')
                                        <br>
                                        <small class="text-danger" >{{'Solo archivos con formato de imagen o pdf que tengan un peso máximo de 2mb'}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary estiloBoton">Editar Bicicleta</button>
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
    #divUsada{
        display: none;
    }
    #robada {
        display: none;
    }
    #divDenuncia {
        display: none;
    }
</style>
<script class="text/javascript">

    function mostrarCampoHijo() {
        document.getElementById('nombreDuenio').style.display = 'block';
    }
    function ocultarCampoHijo() {
        document.getElementById('campoNombreDuenio').value = null;
        document.getElementById('nombreDuenio').style.display = 'none';   
    }
    function ocultarCampoNueva() {
        document.getElementById('tiendaCompra').value = null;
        document.getElementById('factura').value = null;
        document.getElementById('divNueva').style.display = 'none';
    }
    function ocultarCampoUsada() {
        document.getElementById('descripcionBicicleta').value = '';
        document.getElementById('txtPersonaSumnist').value = null;
        document.getElementById('divUsada').style.display = 'none';
    }
    function mostrarCampoNueva() {
        document.getElementById('divNueva').style.display = 'block';
    }
    function mostrarCampoUsada() {
        document.getElementById('divUsada').style.display = 'block';
    }

    //Evento checkbox Nombre Apoderado
    var switchNombreApoderadoOcultar = document.getElementById('flexRadioDefault2');
    switchNombreApoderadoOcultar.addEventListener("change", comprueba, false);
    function comprobarChbApoderado() {
        if(switchNombreApoderadoOcultar.checked) {
            ocultarCampoHijo()
        } else {
            mostrarCampoHijo()
        }
    }

    // Evento del Checkbox Nueva/Usada
    var switchCheckbox = document.getElementById('flexSwitchCheckDefault');

    switchCheckbox.addEventListener("change", comprueba, false);

    function comprueba() {
        if( switchCheckbox.checked ){
            mostrarRobada();
        } else {
            mostrarActiva();
        }
    }

    function mostrarActiva() {
        document.getElementById('robada').style.display = 'none';
        document.getElementById('activa').style.display = 'block';
        document.getElementById('divDenuncia').style.display = 'none';
    }

    function mostrarRobada() {
        document.getElementById('activa').style.display = 'none';
        document.getElementById('robada').style.display = 'block';
        document.getElementById('divDenuncia').style.display = 'block';
    }

    window.onload = function() {
        comprueba();
        comprobarChbApoderado();
    }

</script>
