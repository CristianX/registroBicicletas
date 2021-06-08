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
    <div class="container">
        <div class="row">
            <div class="col-sm-8 imagen">
            <img src="http://localhost/registrobicicletas2/public/assets/bici.png" style="width: 100%">
            </div>
            <div class="col-sm-4 formulario">
                <div class="card cardFormulario">
                    <div class="card-body">
                        <div class="form-group" style="text-align: center">
                            <h5>Registro de bicicletas</h5>
                            <label for="notificacion" class="form-label">¿Es un nuevo usuario?</label>
                            <a class="btn btn-link" href="{{ route('usuario.index') }}">Registrarse</a>
                            <br><br>
                            <form method="GET" action="{{ route('welcome.pasarRegBIcicletas') }}">
                                <div class="form-floating mb-3">
                                    <input name="identificacion" id="identificacion" placeholder="Ingrese su Identificación" type="text" pattern="\d*" class="form-control" maxlength="10" minlength="10" required>
                                    <label for="identificacion" style="color: #bdbdbd">Identificación</label>
                                </div>
                                <button class="btn btn-primary" type="submit" >Registrar Bicicleta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<style type="text/css">
    .imagen {
        padding-top: 8%;
    }
    .formulario {
        
        padding-top: 8%;
        padding-right: 4%;
    }
    .cardFormulario {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: 5px 5px 10px #bdbdbd;
    }
</style>