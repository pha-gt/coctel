<script>


{{--var lista = @json($listado);--}}

var lista=[];
var cuentahabienteSeleccionado = null;
function buscar_cuantahabiente(){
    //let declararar un variable local
    let palabra = $('#tb_buscar').val();
    let resultados = [];
    //alert(palabra);
    lista.forEach(element => {
        if(element.nombre.includes(palabra))
        {
            resultados.push(element);
        } 
    });
   
    dibujar_tabla(resultados);
}



function dibujar_tabla(resultados)
{
    let html_tabla= `<div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">email</th>
                    <th scope="col">Opcion</th>
                </tr>
            </thead>
            <tbody>`;
    resultados.forEach(element => {
        html_tabla= html_tabla+
                `<tr id ="tr`+element.id+`">
                    <td scope="row">`+element.nombre+`</td>
                    <td>`+element.correo+`</td>
                    <td><button class='btn btn-primary' onclick="seleccionar(`+element.id+`,'`+element.nombre+`')" >seleccionar</button></td>
                </tr>`
    });

    html_tabla = html_tabla+`</tbody>
        </table>
    </div>`;

    $('#div_resultado').html(html_tabla);
    

}



function seleccionar(id, nombre)
{
    $('#cuentahabiente_id').val(id);
    $('#cuentahabiente_nombre').val(nombre);
    
    $('#exampleModal').modal('hide');
    $('#msg_cuentahabiente').show();


}

function buscar_cuentahabiente_asyn(){
    
    let palabra = $('#tb_buscar').val();
    let resultados = [];
    $.ajax({
        type:'POST',
        url: "{{route('cuentahabientes_search')}}",
        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
        "_token": "{{ csrf_token() }}",
        "palabra": palabra
        }
        }).done(function( msg ) {
            console.log(msg);
            resultados = JSON.parse(msg);
            dibujar_tabla(resultados);
            
            
        }).fail(function() {
            alert( "error" );
        })
        .always(function() {
            //alert( "finished" );
        });
        
    
}



</script>

<x-plantilla>
    <h6>Tarjeta</h6>
    <form action="{{route('equipos.store')}}" method="post">
        @csrf
        <div class="row" >
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tb_numero" class="form-label">N&uacute;mero</label>
                    <input type="text" name= "numero" class="form-control" id="tb_numero" >
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="tb_vigencia" class="form-label">Vigencia</label>
                    <input type="text" name= "vigencia" class="form-control" id="tb_vigencia" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="select_cuentahabiente" class="form-label">Cuentahabiente</label>
                    
                    {{---
                    <select class="form-select" aria-label="Default select example" id= "select_cuentahabiente" name="cuentahabiente_id">
                        <option selected></option>
                        @foreach ($listado as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    --}}
                    <input type="hidden" name= "cuentahabiente_id" class="form-control" id="cuentahabiente_id" >
                    <input type="text" name= "cuentahabiente_nombre" class="form-control" id="cuentahabiente_nombre" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-primary" role="alert" id="msg_cuentahabiente">
                    <strong>Excelente</strong> Elegiste una victima
                </div>
                
            </div>
        </div>
    </form>
    <br>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>
    

    <div class="modal" tabindex="-1" id="exampleModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Buscar Usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="tb_buscar" class="form-label">Buscar</label>
                                <input type="text" lass="form-control" id="tb_buscar" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3" id="div_resultado">
                                
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"  onclick="buscar_cuantahabiente();" >Buscar</button>
              <button type="button" class="btn btn-primary"  onclick="buscar_cuentahabiente_asyn();" >Buscar 2</button>
              <button type="button" class="btn btn-primary"  onclick="$('#tr1').hide();" >Buscar 3</button>
              <button type="button" class="btn btn-primary"  onclick="$('#tr1').show();" >Buscar 4</button>
              
            </div>
          </div>
        </div>
      </div>

    <script>
        $('#msg_cuentahabiente').hide();
    </script>
</x-plantilla>