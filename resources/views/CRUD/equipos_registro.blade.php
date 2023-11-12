<x-plantilla>
    Formulario
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


    <form action="{{route('equipos.store')}}" method="post">
        @csrf
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
                <input class="btn mt-4 btn-primary" type="submit" value="Enviar">
                </div>
            </div>
        </div>
    </form>
    <a class="btn btn-secondary btn-sm" href="{{route('equipos.index')}}"> Regresar</a>

</x-plantilla>