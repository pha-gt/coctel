<link href="{{asset('js/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<x-plantilla>
    <img src="{{asset('img/datos.png')}}" class="w-25" alt="">
    @if(session('mensaje')!=null)
    <div class="alert alert-success" role="alert">
        Registrado con exito!
    </div>
    @endif
    @if(session('error')!=null)
    <div class="alert alert-danger" role="alert">
        ocurrio un error!
    </div>
    @endif
    <a class= "btn btn-primary mb-2 btn-sm " href="{{route('equipos.create')}}">Nuevo</a>

    <button type="button" class="btn btn-primary mb-2 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Registrar
    </button>
    
    <nav>
    <div>
        <form class="d-flex" role="search" action="{{route('equipo_search')}}" method="POST">
        @csrf
            <input class="form-control me-2" name="busqueda" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        
    </div>
    </nav>
   
    <table class="table table-striped"  id="dataTable">
        <thead>
        <tr>
            <td scope="col">Nombre</td>
            <td scope="col">Marca</td>
            <td scope="col">Precio</td>
            <td scope="col">N&uacute;mero Serie</td>
            <td scope="col">Especificaciones</td>
            <td scope="col">Operaci&oacute;n</td>

        </tr>
        </thead>
        <tbody>
        @foreach ($listado as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->marca}}</td>
                <td>{{$item->precio}}</td>
                <td>{{$item->ns}}</td>
                <td>{{$item->especificaciones}}</td>
                <td>
                    <a href="{{route('equipos.show', $item)}}"  class="btn btn-sm btn-primary"> Editar</a> 
                
                    <form onsubmit="return confirm('¿Seguro que quieres eliminar?');" action="{{route('equipos.destroy', $item)}}" method="post">
                        @method('DELETE')
                        @csrf
                       <input type="submit" class="btn btn-sm btn-danger" value="Eliminar"> 
                    </form>

                    
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <form action="{{route('equipos.store')}}" method="post">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Equipo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row" >
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tb_nombre" class="form-label">Nombre</label>
                        <input type="text" name= "nombre" class="form-control" id="tb_nombre" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="tb_marca" class="form-label">Marca</label>
                        <input type="text" name= "marca" class="form-control" id="tb_marca" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="tb_modelo" class="form-label">Modelo</label>
                        <input type="text" name= "modelo"  class="form-control" id="tb_modelo" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tb_ns" class="form-label">N&uacute;mero de serie</label>
                        <input type="text" name= "num_serie"  class="form-control" id="tb_ns" >
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="tb_precio" class="form-label">Precio</label>
                        <input type="number"  name= "precio"  class="form-control" id="tb_precio" >
                    
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-grid gap-2">
                    
                    </div>
                </div>
            </div>
    

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input class="btn btn-primary" type="submit" value="Enviar">
        </div>
      </div>
    </div>
    </form>
</div>



    <!-- Page level plugins
    <script src="vendor/datatables/jquery.dataTables.min.js"></script
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    -->

    <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts 
    <script src="js/demo/datatables-demo.js"></script>
    -->
    <script src="{{asset('js/datatables-demo.js')}}"></script>

</x-plantilla>
