<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>

    <div class="container align-center p-5">

    <form action="{{route('iniciar-sesion')}}" method="post">
    
        @csrf

        @error('email')
            <h6 class="alert alert-danger">{{$message}}</h6>            
        @enderror

        @error('password')
            <h6 class="alert alert-danger">{{$message}}</h6>            
        @enderror

        @if (session('error'))
        <h6 class="alert alert-danger">{{session('error')}}</h6>            

        @endif

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input required type="email" class="form-control" name="email" id="email" placeholder="hola@hola.com">
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input required type="password" name="password" class="form-control" id="Password" placeholder="**********" minlength="8" maxlength="16">
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="sesionactiva">
            <label class="form-check-label" for="sesionactiva" name="sesionactiva">
              Mantener Sesion Activa
            </label>
          </div>
          
          <button type="submit" class="btn btn-primary mb-3">Iniciar Sesion</button>
                    
          <p>Si aun no tienes una cuenta <a href="{{route('registro')}}">Registrate</a></p>
    
    </form>

</div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>