<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    {{-- CSS personalizado --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
    <link rel = "stylesheet" href = "{{mix ('css/style.css')}}">
    <title>Correo</title>
</head>
<body class="background_image" style="min-height: 100vh">

    <div class="container">
            <div style="text-align: center">
                <h1 style="color: #09D0D6; font-size: 50px; text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;" >CÓDIGO</h1>
                <div style="background-color: #09D0D6; border-radius: 30px">
                    <h3 style="color: #fff;">{{ $bicicleta->CODREGISTRO_BICICLETA }}</h3>
                </div>
                <div style="padding-top: 15px">
                    <img style="border-radius: 20px" src="data:image/png;base64, {!! base64_encode(
                        QrCode::format('png')
                        ->style('dot')
                        ->eyeColor(0, 9, 208, 214, 0, 0, 0)
                        ->eyeColor(1, 9, 208, 214, 0, 0, 0)
                        ->eyeColor(2, 9, 208, 214, 0, 0, 0)
                        ->eye('circle')
                        ->errorCorrection('H')
                        ->merge('\public\assets\IconoQR.png', .2)
                        ->size(300)
                        ->margin(1)
                        ->generate(
                            url("/consultaQR/$bicicleta->CODREGISTRO_BICICLETA")
                        )) !!}">
                </div>
                <div style="background-color: #09D0D6; margin-top: 20px; border-radius: 20px">
                    <p style="font-size: 10px; color: white">
                        El presente código QR sirve como identificación para su bicicleta,
                        donde se mostrarán los datos de su propietario y si esta fue sustraída o no.
                        Usted podrá, si así lo desea, colocar este código en su bicicleta.
                        Recuerde que el QR proporcionado es único e intransferible.
                    </p>
                </div>
            </div>
    </div>

    

</body>

<style type="text/css">
    .background_image {
        /* position: fixed; */
        /* left: 0;
        top: 0;
        width: 100%;
        height: 100%; */
        background-image: url('/assets/FondoCorreo.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

</html>