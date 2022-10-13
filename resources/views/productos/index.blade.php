<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
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
        
        <form action="{{route('registrar-producto')}}" method="post">
            
            @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>            
            
            @endif
            
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (Impuesto Incluido)</label>
                <input type="number" step="0.1" class="form-control" name="precio" id="precio">
            </div>
            <div class="mb-3">
                <label for="impuesto" class="form-label">Impuesto</label>
                <input type="number" class="form-control" id="impuesto" name="impuesto">
            </div>
            
            <button type="submit" class="btn btn-primary mb-3">Registrar</button>
            
            
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Impuesto</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($productos as $prod)
                    <tr>
                        <td>{{$prod->id}}</td>
                        <td>{{$prod->nombre}}</td>
                        <td>{{$prod->precio}}</td>
                        <td>{{$prod->impuesto}}</td>
                        <td>
                            <button class="btn btn-warning" onclick="window.location.href = '{{route('producto', $prod->id)}}'">Editar</button>
                        </td>
                        <td>
                            <form action="{{route('producto', $prod->id)}}" method="post">
                                @csrf 
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
</body>
</html>