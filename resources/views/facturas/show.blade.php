<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info Factura</title>
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
        
    <h3>ID Factura: {{$factura->id}}</h3>
    <h6>Productos de la factura</h6>        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Impuesto</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($productos as $prod)
                    <tr>
                        <td>{{$prod->id}}</td>
                        <td>{{$prod->nombre}}</td>
                        <td>{{$prod->precio}}</td>
                        <td>{{$prod->impuesto}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Neto: {{number_format($total-$impuestos, 2)}}</h4>
        <h4>Impuestos: {{number_format($impuestos, 2)}}</h4>
        <h3>Total: {{number_format($total, 2)}}</h3>

    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</body>
</html>