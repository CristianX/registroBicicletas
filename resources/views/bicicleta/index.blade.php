<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Formulario de Bicicletas</title>
    </head>
    <body>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h1 style="text-align: center" >Registro de Bicicletas de {{ $identificacion->NOMBRES_USUARIO  }} {{ $identificacion->APELLIDOS_USUARIO }} </h1>
        <hr>
        <div class="container">
            <form method="POST" action="{{ route('bicicleta.store',['identificacion' => $registroIdentificacion ]) }}" enctype="multipart/form-data" style="padding: 10px" >
                @csrf
                <div class="mb-3">
                    <label for="nserie" class="form-label">Número de Serie</label>
                    <input placeholder="Ingrese el número de serie de su Bicicleta" type="text" class="form-control" name="NUMEROSERIE_BICICLETA" minlength="4" maxlength="40" required>
                </div>
                <div class="mb-3">
                    <label for="modelo" class="form-label">Marca</label>
                    <input placeholder="Ingrese la marca de su Bicicleta" type="text" class="form-control" name="MARCA_BICICLETA" minlength="3" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input placeholder="Ingrese el modelo de su Bicicleta" type="text" class="form-control" name="MODELO_BICICLETA" minlength="4" maxlength="200" required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Gama o Categoría</label>
                    <select class="form-select" name="CATEGORIA_BICICLETA" required>
                        <option value="" selected disabled>Seleccione una Categoría</option>
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipoBicicleta" class="form-label">Tipo de Bicicleta</label>
                    <select class="form-select" name="TIPOBICICLETA_BICICLETA" required>
                        <option value="" selected disabled>Seleccione un Tipo</option>
                        <option value="montania">Montaña</option>
                        <option value="urbana">Urbana</option>
                        <option value="carretera">Carretera</option>
                        <option value="freestyle">Freestyle</option>
                        <option value="electrica">Eléctrica</option>
                        <option value="biciCargo">Bici Cargo</option>
                        <option value="plegable">Plegable</option>
                        <option value="nino">Niña/o</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tamanio" class="form-label">Tamaño</label>
                    <select class="form-select" name="TAMANIO_BICICLETA" required>
                        <option value="" selected disabled>Seleccione el Tamaño de Bicicleta</option>
                        <option value="large">Large</option>
                        <option value="medium">Medium</option>
                        <option value="small">Small</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="combColores" class="form-label">Combinación de Colores</label>
                    <input placeholder="Ingrese la combinación de colores de su Bicicleta" type="text" class="form-control" name="COMBCOLORES_BICICLETA" minlength="4" maxlength="600" required>
                </div>
                <div class="mb-3">
                    <label for="especBicicleta" class="form-label">Especificaciónes de la Bicicleta</label>
                    <textarea placeholder="Ingrese las Especificaciones de su Bicicleta" type="text" class="form-control" name="ESPEC_BICICLETA" minlength="4" maxlength="600" required></textarea>
                </div>
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="especBicicleta" class="form-label">Foto Frontal de la Bicicleta</label>
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
                                <label for="especBicicleta" class="form-label">Foto del Número de serie de la Bicicleta</label>
                                <br>
                                <input type="file" name="FOTONUMSERIE_BICICLETA" accept="image/*" required>
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
                                <label for="especBicicleta" class="form-label">Foto de los componentes de la Bicicleta</label>
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
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
