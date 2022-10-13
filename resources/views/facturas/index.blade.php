<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
</head>
<body>

    @if(Auth::user()->lvl == 0)
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{route('compra')}}">Comprar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('productos')}}">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('facturas')}}">Facturas</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      @endif

    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Cerrar Sesion</button>
      </form>
    
    <div class="container align-center p-5">
        
        <form action="{{route('generar-facturas')}}" method="post">
            @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>            
            
            @endif

            @csrf
            
            <button type="submit" class="btn btn-primary mb-3">Generar Facturas de Compras Pendientes</button>
            
            
        </form>
        
        <h6>Productos Comprados</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Total</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Ver</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($facturas as $com)
                    <tr>
                        <td>{{$com->id}}</td>
                        <td>{{$com->total}}</td>
                        <td>{{$com->created_at}}</td>
                        <td><button class="btn btn-success" onclick="window.location.href= '{{route('factura', $com->id)}}'">Ver Factura</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</body>
</html>