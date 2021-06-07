<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <div style="padding: 10px"  >
        <h1>Usted está Registrado?</h1>
        <br><br><br>
        <label for="notificacion" class="form-label">Registrarse por Primera Vez</label>
        <br>
        <a class="btn btn-primary" href="{{ route('usuario.index') }}">Registrarse</a>
        <br><br>
        <form method="GET" action="{{ route('welcome.pasarRegBIcicletas') }}">
            <label for="identificacion" class="form-label">Registrar bicicleta</label>
            <input name="identificacion" placeholder="Ingrese su Identificación" type="text" class="form-control" required>
            <br>
            <button class="btn btn-primary" type="submit" >Registrar Bicicleta</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>