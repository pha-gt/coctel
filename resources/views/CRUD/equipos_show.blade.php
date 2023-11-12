<x-plantilla>
    Editar
    <form action="{{route('equipos.update',$equipo)}}" method="post">
        @method("PUT")
        @csrf
        <div class="row" >
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tb_nombre" class="form-label">Nombre</label>
                    <input type="text" name= "nombre" class="form-control" id="tb_nombre" value="{{$equipo->nombre}}" > 
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="tb_marca" class="form-label">Marca</label>
                    <input type="text" name= "marca" class="form-control" id="tb_marca" value="{{$equipo->marca}}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="tb_modelo" class="form-label">Modelo</label>
                    <input type="text" name= "modelo"  class="form-control" id="tb_modelo"  value="{{$equipo->modelo}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tb_ns" class="form-label">N&uacute;mero de serie</label>
                    <input type="text" name= "num_serie"  class="form-control" id="tb_ns" value="{{$equipo->ns}}">
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="tb_precio" class="form-label">Precio</label>
                    <input type="number"  name= "precio"  class="form-control" id="tb_precio" value="{{$equipo->precio}}">
                
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-grid gap-2">
                <input class="btn mt-4 btn-success" type="submit" value="Actualizar">
                </div>
            </div>
        </div>
    </form>

</x-plantilla>