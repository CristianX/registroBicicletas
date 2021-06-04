<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Usted está Registrado?</h1>
    <form method="GET" action="{{ route('usuario.index')}}">
        <label for="identificacion" class="form-label">Registrarse por Primera Vez</label>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    <form>
        <label for="identificacion" class="form-label">Registrar bicicleta</label>
        <input placeholder="Ingrese su Identificación" type="text" class="form-control" name="identificacion" required>
        <button type="submit" class="btn btn-primary">Registrar Bicicleta</button>
    </form>
</body>
</html>