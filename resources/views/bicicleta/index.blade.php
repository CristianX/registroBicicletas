<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Formulario de Bicicletas</title>
    </head>
    <body onload="cargaInicial()" >
        <div class="d-none d-sm-none d-md-block contenedorIzquierda">
            <div class="row" style="background-color: #124176">
                <div class="col-md-auto">
                    <img class="imagenIzquierda" src="{{ asset('/assets/bicicleta.png') }}" alt="bicicleta">
                </div>
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Registro de bicicletas de {{ $identificacion->NOMBRES_USUARIO  }} {{ $identificacion->APELLIDOS_USUARIO }}</h1>
                </div>
                <div class="col-md-auto contenedorDerecha">
                    <img src="{{ asset('/assets/bicicleta.png') }}" width="100px" alt="bicicleta">
                </div>
            </div>
        </div>
        <div class="d-block d-sm-block d-md-none">
            <div class="row" style="background-color: #124176">
                <div class="col contenedorCentro">
                    <h1 class="estiloTexto" style="text-align: center" >Registro de bicicletas de {{ $identificacion->NOMBRES_USUARIO  }} {{ $identificacion->APELLIDOS_USUARIO }}</h1>
                </div>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="container">
            <form method="POST" action="{{ route('bicicleta.store',['identificacion' => $registroIdentificacion ]) }}" enctype="multipart/form-data" style="padding: 10px" >
                @csrf
                <div class="mb-3">
                    <label for="modelo" class="form-label">Marca</label>
                    <input placeholder="Ingrese la marca de su Bicicleta" type="text" class="form-control" name="MARCA_BICICLETA" minlength="3" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input placeholder="Ingrese el modelo de su Bicicleta" type="text" class="form-control" name="MODELO_BICICLETA" minlength="4" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="nserie" class="form-label">Número de Serie o chasis de la Bicicleta (En caso de no tenerlo registrar como SN)</label>
                    <input placeholder="Ingrese el número de serie de su Bicicleta" type="text" class="form-control" name="NUMEROSERIE_BICICLETA" minlength="3" maxlength="40" required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Gama o Categoría</label>
                    <select class="form-select" name="CATEGORIA_BICICLETA" required>
                        <option value="" selected disabled>Seleccione una Categoría</option>
                        <option value="Alta">Alta</option>
                        <option value="Media">Media</option>
                        <option value="Baja">Baja</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipoBicicleta" class="form-label">Tipo de Bicicleta</label>
                    <select class="form-select" name="TIPOBICICLETA_BICICLETA" required>
                        <option value="" selected disabled>Seleccione un Tipo</option>
                        <option value="Montaña">Montaña</option>
                        <option value="Urbana">Urbana</option>
                        <option value="Carretera">Carretera</option>
                        <option value="Freestyle">Freestyle</option>
                        <option value="Eléctrica">Eléctrica</option>
                        <option value="Bici Cargo">Bici Cargo</option>
                        <option value="Plegable">Plegable</option>
                        <option value="Niña/o">Niña/o</option>
                        <option value="OTRO">OTRO</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tamanio" class="form-label">Tamaño</label>
                    <select class="form-select" name="TAMANIO_BICICLETA" required>
                        <option value="" selected disabled>Seleccione el Tamaño de Bicicleta</option>
                        <option value="Large">Large</option>
                        <option value="Medium">Medium</option>
                        <option value="Small">Small</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="combColores" class="form-label">Combinación de Colores</label>
                    <input placeholder="Ingrese la combinación de colores de su Bicicleta" type="text" class="form-control" name="COMBCOLORES_BICICLETA" minlength="4" maxlength="600" required>
                </div>
                <div class="mb-3">
                    <label for="especBicicleta" class="form-label">Especificaciónes de la Bicicleta (Componentes o personalización)</label>
                    <textarea placeholder="Ingrese las Especificaciones de su Bicicleta" type="text" class="form-control" name="ESPEC_BICICLETA" minlength="4" maxlength="600" required></textarea>
                </div>
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="especBicicleta" class="form-label">Foto Frontal de la Bicicleta (Con Usted)</label>
                                <br>
                                <input type="file" name="FOTOFRONTAL_BICICLETA" accept="image/*" required>
                                @error('FOTOFRONTAL_BICICLETA')
                                    <br>
                                    <small class="text-danger" >{{'No se admiten otro tipo de archivos que no sean imagenes que tengan un peso máximo de 2mb'}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="especBicicleta" class="form-label">Foto Lateral de la Bicicleta</label>
                                <br>
                                <input type="file" name="FOTOCOMPLETA_BICICLETA" accept="image/*" required>
                                @error('FOTOCOMPLETA_BICICLETA')
                                    <br>
                                    <small class="text-danger" >{{'No se admiten otro tipo de archivos que no sean imagenes que tengan un peso máximo de 2mb'}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="especBicicleta" class="form-label">Foto del Número de serie o Chasis de la Bicicleta (Opcional)</label>
                                <br>
                                <input type="file" name="FOTONUMSERIE_BICICLETA" accept="image/*">
                                @error('FOTONUMSERIE_BICICLETA')
                                    <br>
                                    <small class="text-danger" >{{'No se admiten otro tipo de archivos que no sean imagenes que tengan un peso máximo de 2mb'}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="especBicicleta" class="form-label">Foto de algún componente personalizado de la Bicicleta (Opcional)</label>
                                <br>
                                <input type="file" name="FOTOCOMP_BICICLETA" accept="image/*" required>
                                @error('FOTOCOMP_BICICLETA')
                                    <br>
                                    <small class="text-danger" >{{'No se admiten otro tipo de archivos que no sean imagenes que tengan un peso máximo de 2mb'}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">¿Desea registrar esta bicicleta a nombre de otra persona? (Menor de Edad/Préstamo/Empleado) </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="ocultarCampoHijo()" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          No
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="mostrarCampoHijo()">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Si
                        </label>
                    </div>
                </div>
                <div class="mb-3" id="nombreDuenio">
                    <label class="form-label">Nombres completos de la Persona</label>
                    <input id="campoNombreDuenio" placeholder="Ingrese los nombres completos de la persona apoderada de la bicicleta" type="text" class="form-control" name="APODERADO_BICICLETA" minlength="4" maxlength="400">
                </div>
                <div class="mb-3">
                    <label class="form-label">¿La bicicleta es nueva o usada?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault2" onclick="ocultarCampoUsada(); mostrarCampoNueva()" checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                          Nueva
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" onclick="mostrarCampoUsada(); ocultarCampoNueva()">
                        <label class="form-check-label" for="flexRadioDefault4">
                          Usada
                        </label>
                    </div>
                </div>
                <div id="divNueva">
                    <div class="mb-3">
                        <label class="form-label">RUC Indicado en la Factura</label>
                        <input id="razonSocial" placeholder="Ingrese el RUC indicado en la factura" type="text" class="form-control" pattern="\d*" name="RAZONSOCIAL_BICICLETA" minlength="13" maxlength="13">
                    </div>
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="especBicicleta" class="form-label">Foto de la Factura de la Bicicleta</label>
                                    <br>
                                    <input type="file" name="FOTOFACTURA_BICICLETA" id="fotoFactura" accept="image/*" required>
                                    @error('FOTOFACTURA_BICICLETA')
                                        <br>
                                        <small class="text-danger" >{{'No se admiten otro tipo de archivos que no sean imagenes que tengan un peso máximo de 2mb'}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="divUsada">
                    <div class="mb-3">
                        <label for="DESCUSADA_BICICLETA" class="form-label">Descripción</label>
                        <select class="form-select" id="descripcionBicicleta" name="DESCUSADA_BICICLETA">
                            <option value="" selected disabled>Seleccione una descripción</option>
                            <option value="Prestada">Prestada</option>
                            <option value="Regalada">Regalada</option>
                            <option value="Comprada">Comprada</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombres completos de la persona que le suministró esta bicicleta</label>
                        <input id="txtPersonaSumnist" placeholder="Nombres completos de la persona que le suministró la bicicleta" type="text" class="form-control" name="NOMBUSADA_BICICLETA" minlength="4" maxlength="400">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="ACTIVAROBADA_BICICLETA"  >
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
                <button type="submit" class="btn btn-primary estiloBoton">Registrar Bicicleta</button>
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
    #nombreDuenio{
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
        document.getElementById('razonSocial').value = null;
        document.getElementById('fotoFactura').value = null;
        document.getElementById('divNueva').style.display = 'none';
        document.getElementById('razonSocial').required = false;
        document.getElementById('fotoFactura').required = false;
    }
    function ocultarCampoUsada() {
        document.getElementById('descripcionBicicleta').value = '';
        document.getElementById('txtPersonaSumnist').value = null;
        document.getElementById('divUsada').style.display = 'none';
        document.getElementById('descripcionBicicleta').required = false;
        document.getElementById('txtPersonaSumnist').required = false;
        
    }
    function mostrarCampoNueva() {
        document.getElementById('divNueva').style.display = 'block';
        document.getElementById('razonSocial').required = true;
        document.getElementById('fotoFactura').required = true;
    }
    function mostrarCampoUsada() {
        document.getElementById('divUsada').style.display = 'block';
        document.getElementById('descripcionBicicleta').required = true;
        document.getElementById('txtPersonaSumnist').required = true;
    }

    function switchActiva() {
        document.getElementById('activa').style.display = 'block';
        document.getElementById('robada').style.display = 'none';
    }
    
    // Evento del Checkbox
    var switchCheckbox = document.getElementById('flexSwitchCheckDefault');

    switchCheckbox.addEventListener("change", comprueba, false);

    function comprueba() {
        if( switchCheckbox.checked ){
            document.getElementById('activa').style.display = 'none';
            document.getElementById('robada').style.display = 'block';
            document.getElementById('divDenuncia').style.display = 'block';
        } else {
            document.getElementById('robada').style.display = 'none';
            document.getElementById('activa').style.display = 'block';
            document.getElementById('divDenuncia').style.display = 'none';
            document.getElementById('fotoDenuncia').value = null;
        }
    }

    function cargaInicial() {
        mostrarCampoNueva();
        ocultarCampoUsada();
    }

</script>
