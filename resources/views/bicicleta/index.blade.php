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
        <h1 style="text-align: center" >Registro de Bicicletas</h1>
        <hr>
        <form style="padding: 10px" >
            <div class="mb-3">
                <label for="nserie" class="form-label">Número de Serie</label>
                <input placeholder="Ingrese el número de serie de su Bicicleta" type="text" class="form-control" id="nserie">
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input placeholder="Ingrese el modelo de su Bicicleta" type="text" class="form-control" id="modelo">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Gama o Categoría</label>
                <select class="form-select">
                    <option selected>Seleccione una Categoría</option>
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                    <option value="baja">Baja</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tipoBicicleta" class="form-label">Tipo de Bicicleta</label>
                <select class="form-select">
                    <option selected>Seleccione un Tipo</option>
                    <option value="montania">Montaña</option>
                    <option value="urbana">Urbana</option>
                    <option value="carretera">Carretera</option>
                    <option value="freestyle">Freestyle</option>
                    <option value="electrica">Eléctrica</option>
                    <option value="biciCargo">Bici Cargo</option>
                    <option value="plegable">Plegable</option>
                    <option value="nino">Niña/o</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tamanio" class="form-label">Tamaño</label>
                <select class="form-select">
                    <option selected>Seleccione el Tamaño de Bicicleta</option>
                    <option value="alta">Large</option>
                    <option value="media">Medium</option>
                    <option value="baja">Small</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="combColores" class="form-label">Combinación de Colores</label>
                <input placeholder="Ingrese la combinación de colores de su Bicicleta" type="text" class="form-control" id="combColores">
            </div>
            <div class="mb-3">
                <label for="especBicicleta" class="form-label">Especificaciónes de la Bicicleta</label>
                <textarea placeholder="Ingrese las Especificaciones de su Bicicleta" type="text" class="form-control" id="especBicicleta"></textarea>
            </div>
          </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
